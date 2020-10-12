// window.onscroll = function() {scrollFunction()};

// function scrollFunction() {
//     var tron = document.getElementsByClassName("jumbotron");
//   if (document.body.scrollTop > 50 || document.documentElement.scrollTop > 50) {
//     tron[0].style.height = "100px";
//   } else {
//     tron[0].style.height = "200px";
//   }
// }

function repositionFooter () {
    var height = 0;
    height += 2 * document.getElementsByTagName("nav")[0].clientHeight;
    height += document.getElementsByTagName("main")[0].clientHeight;
    height += document.getElementsByTagName("footer")[0].clientHeight;

    if (window.innerHeight > height) document.getElementsByTagName("footer")[0].classList.add("sticky-footer");
    else if (document.getElementsByTagName("footer")[0].classList.contains("sticky-footer")) document.getElementsByTagName("footer")[0].classList.remove("sticky-footer");
}

function mainMargin() {
    var height = document.getElementsByTagName("nav")[0].clientHeight;
    document.getElementsByTagName("main")[0].style.marginTop = 2 * height + 'px';
}

function resizeEvents() {
    repositionFooter();
    mainMargin();
}