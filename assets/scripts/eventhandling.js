// window.onscroll = function() {scrollFunction()};

// function scrollFunction() {
//     var tron = document.getElementsByClassName("jumbotron");
//   if (document.body.scrollTop > 50 || document.documentElement.scrollTop > 50) {
//     tron[0].style.height = "100px";
//   } else {
//     tron[0].style.height = "200px";
//   }
// }

function repositionFooter (multiplier) {
    var height = 0;
    height += multiplier * document.getElementsByTagName("nav")[0].clientHeight;
    height += document.getElementsByTagName("main")[0].clientHeight;
    height += document.getElementsByTagName("footer")[0].clientHeight;

    if (window.innerHeight > height) document.getElementsByTagName("footer")[0].classList.add("sticky-footer");
    else if (document.getElementsByTagName("footer")[0].classList.contains("sticky-footer")) document.getElementsByTagName("footer")[0].classList.remove("sticky-footer");
}

function mainMargin(multiplier) {
    var height = document.getElementsByTagName("nav")[0].clientHeight;
    document.getElementsByTagName("main")[0].style.marginTop = multiplier * height + 'px';
}

function resizeEvents() {
    var path = window.location.pathname;
    var page = path.split("/").pop();
    var multiplier = 0;

    if (!(page == "index.php")) {
        multiplier = 1.25
    }

    repositionFooter(multiplier);
    mainMargin(multiplier);
}

function searchListings() {
    // Declare variables
    var input, filter, list, listings, p, i, txtValue;
    input = document.getElementById('exploreSearch');
    filter = input.value.toUpperCase();
    list = document.getElementById("listingGrid");
    listings = list.getElementsByClassName('grid-item');
  
    // Loop through all list items, and hide those who don't match the search query
    for (i = 0; i < listings.length; i++) {
      p = listings[i].getElementsByTagName("p")[0];
      txtValue = p.textContent || p.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        listings[i].style.display = "";
      } else {
        listings[i].style.display = "none";
      }
    }
  }