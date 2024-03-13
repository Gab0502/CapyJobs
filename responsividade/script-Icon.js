function checkWindowWidthIcon() {
    var windowWidth = window.innerWidth;
    var icone = document.getElementById("capyIcon");

    if (windowWidth <= 916) {
        icone.width = 100;
        icone.src = "images/capyIcon.png";
    } else {
        icone.width = 300;
        icone.src = "images/logofull.png";
    }
}

checkWindowWidthIcon();

setInterval(checkWindowWidthIcon, 1000);

