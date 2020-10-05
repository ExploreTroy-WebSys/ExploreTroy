window.onscroll = function() {scrollFunction()};

function scrollFunction() {
    var tron = document.getElementsByClassName("jumbotron");
  if (document.body.scrollTop > 50 || document.documentElement.scrollTop > 50) {
    tron[0].style.padding = ".5%";
  } else {
    tron[0].style.padding = "5%";
  }
}