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
function match() {
    //TODO
}

// Initialise HTML elements and call matchmaker
function init() {
    //Parameters should be taken from employer_matches page, to be utilized in the matchmaker

    if (document.getElementById("parameters") !== null) {
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
        document.getElementById("matchNow").addEventListener('onclick', init);
    }


    document.getElementById("jobseekers").innerHTML = "";
    document.getElementById("employer_noscript").style.display = "none";
    document.getElementById("employer_nomatch").style.display = "none";
    document.getElementById("employer_error").style.display = "none";
    document.getElementById("employer_loading").style.display = "block";
    match();
}

document.addEventListener('DOMContentLoaded', init);


