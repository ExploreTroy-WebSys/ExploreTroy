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
    var height = document.getElementsByTagName("header")[0].scrollHeight + document.getElementsByTagName("main")[0].scrollHeight + document.getElementsByTagName("footer")[0].scrollHeight;
    var modHeight = window.innerHeight - (document.getElementsByTagName("header")[0].scrollHeight + document.getElementsByTagName("main")[0].scrollHeight);
    modHeight = document.body.scrollHeight - document.getElementsByTagName("footer")[0].scrollHeight;

    if (window.innerHeight > height) document.getElementsByTagName("main")[0].style.minHeight = modHeight + "px";
}