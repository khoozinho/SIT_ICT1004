$(document).ready(clicklistener());

function clicklistener() {
    $(".image-thumbnail").click(popup);
}

function popup() {
    var srcname = $(this).attr("src");
    var bigfile = srcname.replace("small", "large");
    var bigimg = document.getElementsByClassName("big-img");

    if (bigimg.length === 0) {
        $(this).after("<img class=\"big-img\" src=\"" + bigfile + "\"/>");
    }
    else {
        console.log("hello!");
        if (bigimg.length > 0) {
            bigimg[0].parentNode.removeChild(bigimg[0]);
        }
    }
}