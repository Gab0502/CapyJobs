function checkWindowWidth() {
    var windowWidth = window.innerWidth;
    var banner1Element = document.getElementById("banner1");

    if (windowWidth <= 1290) {
        document.getElementById("banner2").style.display = "none";
        banner1Element.classList.remove("col-xl-6");
        banner1Element.classList.add("col-xl-12");
        banner1Element.classList.add("banner-animation")
        document.getElementById("barradepesquisa").style.width = "99%";
    } else {
        document.getElementById("banner2").style.display = "block";
        banner1Element.classList.add("col-xl-6");
        banner1Element.classList.remove("col-xl-12");
        banner1Element.classList.remove("banner-animation")
        banner1Element.style = ""
    }
}

checkWindowWidth();

setInterval(checkWindowWidth, 1000);
