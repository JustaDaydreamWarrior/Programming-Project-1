// Group 54 employer_matchmaking .js for matching Job Seekers to Job Postings/Listings

// Function to print a matched Job Seeker to panel in employer_matches view
function printJobSeeker(id, name, email, state, city, percentageMatch) {
    //Building the contents of the div to display a particular Job Seeker
    let display = document.getElementById("jobseeker");

    let panel = document.createElement("div");
    panel.className = "panel panel-default";

    let heading = document.createElement("div");
    heading.className = "panel-heading";
    heading.innerHTML += name + " - ";

    let match = document.createElement("strong");
    match.innerHTML = percentageMatch + "&#37; Match";

    let body = document.createElement("div");
    body.className = "panel-body";

    let p1 = document.createElement("p");
    p1.innerHTML = email;

    let hr1 = document.createElement("hr");

    let p2 = document.createElement("p");
    let p2Title = document.createElement("strong");

    let p3 = document.createElement("p");
    let p3Title = document.createElement("strong");

    let p4 = document.createElement("p");
    let p4Title = document.createElement("strong");
    p4.innerHTML = city;

    if (state === "VIC") {
        p4.innerHTML += ", Victoria";
    } else if (state === "NSW") {
        p4.innerHTML += ", New South Wales";
    } else if (state === "QLD") {
        p4.innerHTML += ", Queensland";
    } else if (state === "WA") {
        p4.innerHTML += ", Western Australia";
    } else if (state === "SA") {
        p4.innerHTML += ", South Australia";
    } else if (state === "TAS") {
        p4.innerHTML += ", Tasmania";
    } else if (state === "ACT") {
        p4.innerHTML += ", Australian Capital Territory";
    } else if (state === "NT") {
        p4.innerHTML += ", Northern Territory";
    }

    p4Title.innerHTML = "Location: ";

    panel.appendChild(heading);
    panel.appendChild(body);
    heading.append(match);
    body.append(p1);
    body.append(hr1);
    body.append(p2);
    p2.prepend(p2Title);
    body.append(p3);
    p3.prepend(p3Title);
    body.append(p4);
    p4.prepend(p4Title);
    display.appendChild(panel);

    document.getElementById("employer_loading").style.display = "none";
}

// Function to perform matchmaking
function matchJobSeeker() {
        var users = "/api/users/";

        // Parameters entered
        var parameterDetails;

        // Array of user indices.
        var user = [];

        // Bitwise integers to compare.
        var userMatch = [];

        // Percentage matches.
        var percentageMatch = [];

        // Retrieve the employer_match preferred skillset
            // convert binary sequence of the employer preferenced skillset to integer ex. ( 01010010101110 )
            parameterDetails = parseInt(""
                + (document.getElementById("java").checked + 0)
                + (document.getElementById("c").checked + 0)
                + (document.getElementById("csharp").checked+ 0)
                + (document.getElementById("cplus").checked+ 0)
                + (document.getElementById("php").checked + 0)
                + (document.getElementById("html").checked + 0)
                + (document.getElementById("css").checked + 0)
                + (document.getElementById("python").checked + 0)
                + (document.getElementById("javascript").checked + 0)
                + (document.getElementById("sql").checked + 0)
                + (document.getElementById("unix").checked + 0)
                + (document.getElementById("windows10").checked + 0)
                + (document.getElementById("windows7").checked + 0)
                + (document.getElementById("windowsOld").checked + 0)
                + (document.getElementById("windowsServer").checked + 0)
                + (document.getElementById("macOS").checked + 0)
                + (document.getElementById("linux").checked + 0)
                + (document.getElementById("bash").checked + 0)
                + (document.getElementById("android").checked + 0)
                + (document.getElementById("ciscoSystems").checked + 0)
                + (document.getElementById("microsoftOffice").checked + 0)
                + (document.getElementById("ruby").checked + 0)
                + (document.getElementById("powershell").checked + 0)
                + (document.getElementById("rust").checked + 0)
                + (document.getElementById("iOS").checked + 0)
                + (document.getElementById("adobe").checked + 0)
                + (document.getElementById("cloud").checked + 0), 2);

            // Populate values into jobPostIndex, jobPostMatch and percentageMatch arrays.
            $.getJSON(users, function (data) {

                for (let i = 0; i < data.length; i++) {
                    user[i] = i;
                    // convert binary sequence of a Job Postings required skillset to integer ex. ( 01010010101110 )
                    userMatch[i] = parseInt("" + data[i].java + data[i].c + data[i].csharp + data[i].cplus + data[i].php + data[i].html + data[i].css + data[i].python + data[i].javascript + data[i].sql + data[i].unix + data[i].windows10 + data[i].windows7 + data[i].windowsOld + data[i].windowsServer + data[i].macOS + data[i].linux + data[i].bash + data[i].android + data[i].ciscoSystems + data[i].microsoftOffice + data[i].ruby + data[i].powershell + data[i].rust + data[i].iOS + data[i].adobe + data[i].cloud, 2);

                    // Find the amount of comparisons
                    let noOfComp = parameterDetails | userMatch[i];
                    let bitComp = (noOfComp).toString(2);

                    //Final number of comparisons
                    let comparisonCount = bitComp.replace(/[^1]/g, "").length;

                    let matchCalc = parameterDetails & userMatch[i];

                    let toBinary = (matchCalc).toString(2);

                    //Final no. of matched skills (remove all zeros and count string length)
                    let matchedSkills = toBinary.replace(/[^1]/g, "").length;

                    // Calculate percentage match ( matched skills/amount of skills x 100 )
                    percentageMatch[i] = (matchedSkills / comparisonCount) * 100;

                    // Lastly, deal with any cases where percentage matches are over 100%, set those to 100%
                    let bitJob = "" + data[i].java + data[i].c + data[i].csharp + data[i].cplus + data[i].php + data[i].html + data[i].css + data[i].python + data[i].javascript + data[i].sql + data[i].unix + data[i].windows10 + data[i].windows7 + data[i].windowsOld + data[i].windowsServer + data[i].macOS + data[i].linux + data[i].bash + data[i].android + data[i].ciscoSystems + data[i].microsoftOffice + data[i].ruby + data[i].powershell + data[i].rust + data[i].iOS + data[i].adobe + data[i].cloud;

                    let countUser = bitJob.replace(/[^1]/g, "").length;
                    //Check length of the binary string with 0s removed. If they are both the same length, all skills match.
                    if (matchedSkills === countUser) {
                        percentageMatch[i] = 100;
                    }
                }

                // Perform a bubble sort on the results; 100% matches at the top of the page.
                // https://www.geeksforgeeks.org/bubble-sort/
                var swap;

                do {
                    swap = false;

                    for (let i = 0; i < user.length - 1; i++) {
                        if (percentageMatch[i] < percentageMatch[i + 1]) {

                            let tmpPercent = percentageMatch[i];
                            percentageMatch[i] = percentageMatch[i + 1];
                            percentageMatch[i + 1] = tmpPercent;

                            let tmpUserId = user[i];
                            user[i] = user[i + 1];
                            user[i + 1] = tmpUserId;

                            let tmpJobPost = userMatch[i];
                            userMatch[i] = userMatch[i + 1];
                            userMatch[i + 1] = tmpJobPost;

                            swap = true;
                        }
                    }
                }
                while (swap);
            })
                .then(function () {

                    $.getJSON(users, function (data) {
                        if (data.length > 0) {

                            for (let i = 0; i < data.length; i++) {
                                let order = user[i];
                                printJobSeeker(data[order].id, data[order].name, data[order].email, data[order].state, data[order].city, Math.round(percentageMatch[i]));
                            }
                        } else {
                            document.getElementById("employer_loading").style.display = "none";
                            document.getElementById("employer_nomatch").style.display = "block";
                        }
                    })
                    //Display any relevant errors on failure
                        .fail(function () {
                            document.getElementById("employer_loading").style.display = "none";
                            document.getElementById("employer_error").style.display = "block";

                        });
                })

}

// Initialise HTML elements and call matchmaker
function emp_init() {
    //Parameters should be taken from employer_matches page, to be utilized in the matchmaker


        // document.getElementById("state").addEventListener('change', init);
        // document.getElementById("education").addEventListener('change', init);
        // document.getElementById("experience").addEventListener('change', init);
        // document.getElementById("bash").addEventListener('change', init);
        // document.getElementById("c").addEventListener('change', init);
        // document.getElementById("csharp").addEventListener('change', init);
        // document.getElementById("cplus").addEventListener('change', init);
        // document.getElementById("css").addEventListener('change', init);
        // document.getElementById("html").addEventListener('change', init);
        // document.getElementById("java").addEventListener('change', init);
        // document.getElementById("javascript").addEventListener('change', init);
        // document.getElementById("powershell").addEventListener('change', init);
        // document.getElementById("php").addEventListener('change', init);
        // document.getElementById("python").addEventListener('change', init);
        // document.getElementById("ruby").addEventListener('change', init);
        // document.getElementById("rust").addEventListener('change', init);
        // document.getElementById("sql").addEventListener('change', init);
        // document.getElementById("linux").addEventListener('change', init);
        // document.getElementById("macOS").addEventListener('change', init);
        // document.getElementById("android").addEventListener('change', init);
        // document.getElementById("iOS").addEventListener('change', init);
        // document.getElementById("unix").addEventListener('change', init);
        // document.getElementById("windows10").addEventListener('change', init);
        // document.getElementById("windows7").addEventListener('change', init);
        // document.getElementById("windowsOld").addEventListener('change', init);
        // document.getElementById("windowsServer").addEventListener('change', init);
        // document.getElementById("microsoftOffice").addEventListener('change', init);
        // document.getElementById("adobe").addEventListener('change', init);
        // document.getElementById("ciscoSystems").addEventListener('change', init);
        // document.getElementById("cloud").addEventListener('change', init);
        document.getElementById("matchNow").addEventListener('click', emp_init);

    document.getElementById("jobseeker").innerHTML = "";
    document.getElementById("employer_noscript").style.display = "none";
    document.getElementById("employer_nomatch").style.display = "none";
    document.getElementById("employer_error").style.display = "none";
    document.getElementById("employer_loading").style.display = "block";
    matchJobSeeker();
}

document.addEventListener('DOMContentLoaded', emp_init);


