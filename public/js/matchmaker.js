// Initialise HTML elements and call matchmaker function
function init() {
    if (document.getElementById("filters") !== null) {
        document.getElementById("state").addEventListener('change', init);
    }
    document.getElementById("jobposts").innerHTML = "";
    document.getElementById("noscript").style.display = "none";
    document.getElementById("nomatch").style.display = "none";
    document.getElementById("error").style.display = "none";
    document.getElementById("loading").style.display = "block";
    match();
}

// Function to perform matchmaking. Using bitwise
//https://www.w3schools.com/js/js_bitwise.asp
function match() {

    //used to determine what filters are being used, if any
    let filter;

    let jobPosts;
    // Check filter on matches page
    if (document.getElementById("filters") !== null) {

        if (document.getElementById("state").value !== "") {
            jobPosts = "/api/jobPosts/state/" + document.getElementById("state").value;
            filter = "state"
        } else jobPosts = "/api/jobPosts/";
    }

    // Current user information
    let userDetails;

    // Job posting indices.
    let jobPost = [];

    // Bitwise integers to compare.
    let jobPostMatch = [];

    // Percentage matches.
    let percentageMatch = [];

    //User's location (for weighting)
    let userLocation;

    //Job's location (for weighting)
    let jobLocation;

    //No. matched skills
    let totalMatchedSkills = [];

    //No. total skills required
    let totalSkills = [];

    // Retrieve the current user's data
    $.getJSON("/api/user/", function (data) {
        userLocation = data.location;
        //Create Binary sequence of current user's skill ( 01010010101110 )
        userDetails = parseInt("" +
            data.java +
            data.c +
            data.csharp +
            data.cplus +
            data.php +
            data.html +
            data.css +
            data.python +
            data.javascript +
            data.sql +
            data.unix +
            data.windows10 +
            data.windows7 +
            data.windowsOld +
            data.windowsServer +
            data.macOS +
            data.linux +
            data.bash +
            data.android +
            data.ciscoSystems +
            data.microsoftOffice +
            data.ruby +
            data.powershell +
            data.rust +
            data.iOS +
            data.adobe +
            data.cloud, 2);
    }).then(function () {

        //Get the jobposts from the URL specified by filter
        $.getJSON(jobPosts, function (data) {

            for (let i = 0; i < data.length; i++) {
                jobPost[i] = i;
                jobLocation = jobPost[i].location;
                // convert binary sequence of a Job Postings required skillset to integer ex. ( 01010010101110 )
                jobPostMatch[i] = parseInt("" +
                    data[i].java +
                    data[i].c +
                    data[i].csharp +
                    data[i].cplus +
                    data[i].php +
                    data[i].html +
                    data[i].css +
                    data[i].python +
                    data[i].javascript +
                    data[i].sql +
                    data[i].unix +
                    data[i].windows10 +
                    data[i].windows7 +
                    data[i].windowsOld +
                    data[i].windowsServer +
                    data[i].macOS +
                    data[i].linux +
                    data[i].bash +
                    data[i].android +
                    data[i].ciscoSystems +
                    data[i].microsoftOffice +
                    data[i].ruby +
                    data[i].powershell +
                    data[i].rust +
                    data[i].iOS +
                    data[i].adobe +
                    data[i].cloud, 2);


                //AND the two binary strings
                let matchCalc = userDetails & jobPostMatch[i];

                let toBinary = (matchCalc).toString(2);

                //Final no. of matched skills (remove all zeros and count string length)
                let matchedSkills = toBinary.replace(/[^1]/g, "").length;
                //Count the amount of matched skills
                totalMatchedSkills[i] = matchedSkills;

                //Count the amount of preferred skills
                let bitJob = "" + data[i].java + data[i].c + data[i].csharp + data[i].cplus + data[i].php + data[i].html + data[i].css + data[i].python + data[i].javascript + data[i].sql + data[i].unix + data[i].windows10 + data[i].windows7 + data[i].windowsOld + data[i].windowsServer + data[i].macOS + data[i].linux + data[i].bash + data[i].android + data[i].ciscoSystems + data[i].microsoftOffice + data[i].ruby + data[i].powershell + data[i].rust + data[i].iOS + data[i].adobe + data[i].cloud;
                let countJob = bitJob.replace(/[^1]/g, "").length;
                totalSkills[i] = countJob;
                // Calculate percentage match ( matched skills/amount of skills x 100 )
                percentageMatch[i] = (matchedSkills / countJob) * 100;

                //Basic weighting adjustments, can be added to with additional weighted values later on. For now, state is the only weighted increase for JobSeeker to job postings
                //Increase match percentage by 5% if the states match. This will NOT apply when a state filter is selected.
                if (jobLocation === userLocation && filter !== "state") percentageMatch[i] = percentageMatch[i] * 1.05;

                //Check length of the binary string with 0s removed. If they are both the same length, all skills match.
                if (matchedSkills === countJob) {
                    percentageMatch[i] = 100;
                }
            }

            //Bubble sort results; 100% matches at the top of the page.
            //https://medium.com/javascript-algorithms/javascript-algorithms-bubble-sort-3d27f285c3b2
            var swap;

            do {
                swap = false;

                for (let i = 0; i < jobPost.length - 1; i++) {
                    if (percentageMatch[i] < percentageMatch[i + 1]) {

                        let tmpPercent = percentageMatch[i];
                        percentageMatch[i] = percentageMatch[i + 1];
                        percentageMatch[i + 1] = tmpPercent;

                        let tmpPostId = jobPost[i];
                        jobPost[i] = jobPost[i + 1];
                        jobPost[i + 1] = tmpPostId;

                        let tmpJobPost = jobPostMatch[i];
                        jobPostMatch[i] = jobPostMatch[i + 1];
                        jobPostMatch[i + 1] = tmpJobPost;

                        swap = true;
                    }
                }
            }
            while (swap);
        })
            .then(function () {

                $.getJSON(jobPosts, function (data) {
                    if (data.length > 0) {

                        for (let i = 0; i < data.length; i++) {
                            printJob(
                                data[jobPost[i]].id,
                                data[jobPost[i]].company_name,
                                data[jobPost[i]].title,
                                data[jobPost[i]].description,
                                data[jobPost[i]].estSalary,
                                data[jobPost[i]].state,
                                data[jobPost[i]].city,
                                Math.round(percentageMatch[i]),
                                totalMatchedSkills[jobPost[i]],
                                totalSkills[jobPost[i]]);
                        }
                    } else {
                        document.getElementById("loading").style.display = "none";
                        document.getElementById("nomatch").style.display = "block";
                    }
                })
                //Display any relevant errors on failure
                    .fail(function () {
                        document.getElementById("loading").style.display = "none";
                        document.getElementById("error").style.display = "block";
                    });
            })
            .fail(function () {
                document.getElementById("loading").style.display = "none";
                document.getElementById("error").style.display = "block";

            });
    });
}

// Function to print a matched jobPosting to panel in matches view
function printJob(id, companyname, title, description, estSalary, state, city, percentageMatch, totalMatchedSkills, totalSkills) {
    //Building the contents of the div to display a particular posting
    let display = document.getElementById("jobposts");

    let panel = document.createElement("div");
    panel.className = "panel panel-default";

    let heading = document.createElement("div");
    heading.className = "panel-heading";
    heading.innerHTML += title + " - ";

    let match = document.createElement("strong");
    if (percentageMatch === 100) {
        match.innerHTML = "&#11088;" + percentageMatch + "&#37; Match";
    } else {
        match.innerHTML = percentageMatch + "&#37; Match";
    }

    let body = document.createElement("div");
    body.className = "panel-body";

    let p = document.createElement("p");
    let pTitle = document.createElement("strong");

    p.innerHTML = companyname;

    pTitle.innerHTML = "Employer: ";

    let hr1 = document.createElement("hr");

    let p1 = document.createElement("p");
    p1.innerHTML = description;

    let hr2 = document.createElement("hr");

    let p2 = document.createElement("p");
    let p2Title = document.createElement("strong");

    let p3 = document.createElement("p");
    let p3Title = document.createElement("strong");

    p3.innerHTML = "$" + estSalary;

    p3.innerHTML += " per year";

    p3Title.innerHTML = "Salary: ";

    let p4 = document.createElement("p");
    let p4Title = document.createElement("strong");

    let p5 = document.createElement("p");
    let p5Title = document.createElement("strong");
    p5.innerHTML = city;

    if (state === "VIC") {
        p5.innerHTML += ", Victoria";
    } else if (state === "NSW") {
        p5.innerHTML += ", New South Wales";
    } else if (state === "QLD") {
        p5.innerHTML += ", Queensland";
    } else if (state === "WA") {
        p5.innerHTML += ", Western Australia";
    } else if (state === "SA") {
        p5.innerHTML += ", South Australia";
    } else if (state === "TAS") {
        p5.innerHTML += ", Tasmania";
    } else if (state === "ACT") {
        p5.innerHTML += ", Australian Capital Territory";
    } else if (state === "NT") {
        p5.innerHTML += ", Northern Territory";
    }

    p5Title.innerHTML = "Location: ";

    let p6 = document.createElement("p");
    if (totalMatchedSkills > 0) {
        p6.innerHTML = totalMatchedSkills + " out of " + totalSkills;
    } else {
        p6.innerHTML = "None, or not applicable";
    }
    let p6Title = document.createElement("strong");
    p6Title.innerHTML = "Matched Skills: ";

    let hr3 = document.createElement("hr");

    panel.appendChild(heading);
    panel.appendChild(body);
    heading.append(match);
    body.append(p);
    p.prepend(pTitle);
    body.append(hr3);
    body.append(p6);
    p6.prepend(p6Title);
    body.append(hr1);
    body.append(p1);
    body.append(hr2);
    body.append(p2);
    p2.prepend(p2Title);
    body.append(p3);
    p3.prepend(p3Title);
    body.append(p4);
    p4.prepend(p4Title);
    body.append(p5);
    p5.prepend(p5Title);
    display.appendChild(panel);

    document.getElementById("loading").style.display = "none";
}

document.addEventListener('DOMContentLoaded', init);


