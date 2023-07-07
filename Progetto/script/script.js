document.addEventListener("scroll", function (event) {
    if (window.scrollY != 0)
        document.getElementById("GoOnTop").style.display = "inline";
    else
        document.getElementById("GoOnTop").style.display = "none";
})