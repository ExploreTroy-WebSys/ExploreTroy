function repositionFooter (multiplier) {
    var height = 0;
    height += multiplier * document.getElementsByTagName("nav")[0].clientHeight;
    height += document.getElementsByTagName("main")[0].clientHeight;
    height += document.getElementsByTagName("footer")[0].clientHeight;

    if (window.innerHeight > height) document.getElementsByTagName("footer")[0].classList.add("sticky-footer");
    else if (document.getElementsByTagName("footer")[0].classList.contains("sticky-footer")) document.getElementsByTagName("footer")[0].classList.remove("sticky-footer");
}

function mainMargin(multiplier) {
    var height = document.getElementById("nav-bar").clientHeight;
    document.getElementsByTagName("main")[0].style.marginTop =  multiplier * height + 'px';
    console.log(height);
}

function resizeEvents() {
    var path = window.location.pathname;
    var page = path.split("/").pop();
    var multiplier = 1;

    repositionFooter(multiplier);
    mainMargin(multiplier);
}

function assignResizeEvents() {
  document.body.onresize = resizeEvents();
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