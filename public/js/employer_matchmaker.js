// Group 54 employer_matchmaking .js for matching Job Seekers to Job Postings/Listings

// Function to print a matched Job Seeker to panel in employer_matches view
function printJobSeeker(id, name, email, state, city, percentageMatch, totalMatchedSkills, totalSkills) {
    //Building the contents of the div to display a particular Job Seeker
    let display = document.getElementById("jobseeker");

    let panel = document.createElement("div");
    panel.className = "panel panel-default";

    let heading = document.createElement("div");

    heading.className = "panel-heading";
    heading.innerHTML += name + " - ";

    let match = document.createElement("strong");
    if (percentageMatch === 100) {
        match.innerHTML = "&#11088;" + percentageMatch + "&#37; Match";
    } else {
        match.innerHTML = percentageMatch + "&#37; Match";
    }


    let body = document.createElement("div");
    body.className = "panel-body";

    let p0 = document.createElement("p");
    if (totalMatchedSkills > 0) {
        p0.innerHTML = totalMatchedSkills + " out of " + totalSkills;
    } else {
        p0.innerHTML = "None, or not applicable";
    }
    let p0Title = document.createElement("strong");
    p0Title.innerHTML = "Matched Skills: ";

    let p1 = document.createElement("p");
    p1.innerHTML = email;
    let p1Title = document.createElement("strong");
    p1Title.innerHTML = "Contact E-mail: ";

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
    body.append(p0);
    p0.prepend(p0Title);
    body.append(p1);
    p1.prepend(p1Title);
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
    var users;
    var eduPref = 0;
    var expPref = 0;
    var eduWeight = 0.1;
    var expWeight = 0.2;


    // Check state and city filter on employer_matches page
    if (document.getElementById("state").value !== "" && document.getElementById("city").value !== "") {
        users = "/api/users/state/" + document.getElementById("state").value + "/city/" + document.getElementById("city").value;
    } else if (document.getElementById("state").value !== "") {
        users = "/api/users/state/" + document.getElementById("state").value;
    } else if (document.getElementById("city").value !== "") {
        users = "/api/users/city/" + document.getElementById("city").value;
    }
    //If there are no filters, get all users for matchmaking
    else {
        users = "/api/users/";
    }


    // Check experience/education preferences on matches page
    if (document.getElementById("education").value !== "") {
        eduPref = parseInt(document.getElementById("education").value);
    }
    if (document.getElementById("experience").value !== "") {
        expPref = parseInt(document.getElementById("experience").value);
    }


    // Parameters entered as a binary string
    var parameterBinaryString;

    //Parameter binary string converted to int
    var parameterInt;

    // Array of user indices.
    var user = [];

    // integers to compare.
    var userMatch = [];

    // Percentage matches.
    var percentageMatch = [];

    //No. matched skills
    var totalMatchedSkills = [];

    //No. total skills required
    var totalSkills;

    // Retrieve the current user's data
    // Retrieve the employer_match preferred skillset
    // convert binary sequence of the employer preferenced skillset to integer ex. ( 01010010101110 )
    parameterBinaryString =
        +parseInt(document.getElementById("java").checked + 0) + "" +
        +parseInt(document.getElementById("c").checked + 0) + "" +
        +parseInt(document.getElementById("csharp").checked + 0) + "" +
        +parseInt(document.getElementById("cplus").checked + 0) + "" +
        +parseInt(document.getElementById("php").checked + 0) + "" +
        +parseInt(document.getElementById("html").checked + 0) + "" +
        +parseInt(document.getElementById("css").checked + 0) + "" +
        +parseInt(document.getElementById("python").checked + 0) + "" +
        +parseInt(document.getElementById("javascript").checked + 0) + "" +
        +parseInt(document.getElementById("sql").checked + 0) + "" +
        +parseInt(document.getElementById("unix").checked + 0) + "" +
        +parseInt(document.getElementById("windows10").checked + 0) + "" +
        +parseInt(document.getElementById("windows7").checked + 0) + "" +
        +parseInt(document.getElementById("windowsOld").checked + 0) + "" +
        +parseInt(document.getElementById("windowsServer").checked + 0) + "" +
        +parseInt(document.getElementById("macOS").checked + 0) + "" +
        +parseInt(document.getElementById("linux").checked + 0) + "" +
        +parseInt(document.getElementById("android").checked + 0) + "" +
        +parseInt(document.getElementById("iOS").checked + 0) + "" +
        +parseInt(document.getElementById("bash").checked + 0) + "" +
        +parseInt(document.getElementById("ciscoSystems").checked + 0) + "" +
        +parseInt(document.getElementById("microsoftOffice").checked + 0) + "" +
        +parseInt(document.getElementById("ruby").checked + 0) + "" +
        +parseInt(document.getElementById("powershell").checked + 0) + "" +
        +parseInt(document.getElementById("rust").checked + 0) + "" +
        +parseInt(document.getElementById("adobe").checked + 0) + "" +
        +parseInt(document.getElementById("cloud").checked + 0);

    parameterInt = parseInt("" + parameterBinaryString, 2);

    // Populate values into jobPostIndex, jobPostMatch and percentageMatch arrays.
    $.getJSON(users, function (data) {

        for (let i = 0; i < data.length; i++) {
            user[i] = i;
            // convert binary sequence of a Job Postings required skillset to integer ex. ( 01010010101110 )
            userMatch[i] = parseInt("" + data[i].java + data[i].c + data[i].csharp + data[i].cplus + data[i].php + data[i].html + data[i].css + data[i].python + data[i].javascript + data[i].sql + data[i].unix + data[i].windows10 + data[i].windows7 + data[i].windowsOld + data[i].windowsServer + data[i].macOS + data[i].linux + data[i].android + data[i].iOS + data[i].bash + data[i].ciscoSystems + data[i].microsoftOffice + data[i].ruby + data[i].powershell + data[i].rust + data[i].adobe + data[i].cloud, 2);

            let matchCalc = parameterInt & userMatch[i];

            let toBinary = (matchCalc).toString(2);

            //Final no. of matched skills (remove all zeros and count string length)
            let matchedSkills = toBinary.replace(/[^1]/g, "").length;
            totalMatchedSkills[i] = matchedSkills;

            // Calculate percentage match ( matched skills/amount of skills x 100 )
            let countEmployer = parameterBinaryString.replace(/[^1]/g, "").length;
            totalSkills = countEmployer;
            percentageMatch[i] = (matchedSkills / countEmployer) * 100;

            //Check length of the binary string with 0s removed. If they are both the same length, all skills match.
            if (matchedSkills === countEmployer) {
                percentageMatch[i] = 100;
            }

            //Calculate weighted percentage value, if required
            var weighting = 1;
            if (eduPref !== 0) {
                if (data[i].education >= eduPref) {
                    weighting += eduWeight
                } else if (data[i].education < eduPref) {
                    weighting -= eduWeight
                }
            }

            if (expPref !== 0) {
                if (data[i].experience >= expPref) {
                    weighting += expWeight
                } else if (data[i].education < expPref) {
                    weighting -= expWeight
                }
            }
            percentageMatch[i] = percentageMatch[i] * weighting;

            //When percentage matches are over 100 for whatever reason, set those matches to 100
            if (percentageMatch[i] > 100) {
                percentageMatch[i] = 100;
            }
        }

        // Perform a bubble sort on the results; 100% matches at the top of the page.
        // https://www.geeksforgeeks.org/bubble-sort/
        let swap;

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
                        printJobSeeker(data[order].id, data[order].name, data[order].email, data[order].state, data[order].city, Math.round(percentageMatch[i]), totalMatchedSkills[order], totalSkills);
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
        });
}

// Initialise HTML elements and call matchmaker
function emp_init() {
    //Parameters should be taken from employer_matches page, to be utilized in the matchmaker

    document.getElementById("matchNow").addEventListener('click', start);
    document.getElementById("employer_noscript").style.display = "none";
    document.getElementById("employer_nomatch").style.display = "block";

}

function start() {
    document.getElementById("jobseeker").innerHTML = "";
    document.getElementById("employer_noscript").style.display = "none";
    document.getElementById("employer_nomatch").style.display = "none";
    document.getElementById("employer_error").style.display = "none";
    document.getElementById("employer_loading").style.display = "block";
    matchJobSeeker();
}

document.addEventListener('DOMContentLoaded', emp_init);
