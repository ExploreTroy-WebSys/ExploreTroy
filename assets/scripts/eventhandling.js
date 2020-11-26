// Function which applies or removes a sticky footer tag based on whether or not there is enough content on the page to fill the page
function repositionFooter () {
    var height = 0;
    height += document.getElementsByTagName("nav")[0].clientHeight;
    height += document.getElementsByTagName("main")[0].clientHeight;
    height += document.getElementsByTagName("footer")[0].clientHeight;

    if (window.innerHeight > height) document.getElementsByTagName("footer")[0].classList.add("sticky-footer");
    else if (document.getElementsByTagName("footer")[0].classList.contains("sticky-footer")) document.getElementsByTagName("footer")[0].classList.remove("sticky-footer");
}

// Function which introduced a margin-top to the main tag in order to not be obscured by the navbar
function mainMargin() {
    var height = document.getElementById("nav-bar").clientHeight;
    document.getElementsByTagName("main")[0].style.marginTop = height + 'px';
    console.log(height);
}

// Wrapper function which handles all styling updates based on window resizing
function resizeEvents() {
    repositionFooter();
    mainMargin();
}

// Add resize event listener to body
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
      // Reposition footer as needed based on element removal/addition
      resizeEvents();
    }
  }


$(document).ready(function() {
  $(".grid-item").each(function() {
    var gridItem = this;
    gridItem.addEventListener("click", function() {
      var attrid = $(this).find(".hidden-attrid").html();
      window.location.href = "./listing.php?" + attrid;
    });
  });
});

function showComments(review_id) {
  if ($("#review-comments-" + review_id).css("display") == "block") {
    $("#review-comments-" + review_id).css("display", "none");
    $("#review-" + review_id).css("border-radius", "8px");
    $("#review-" + review_id).css("margin-bottom", "20px");
  } else {
    $("#review-comments-" + review_id).css("display", "block");
    $("#review-" + review_id).css("border-radius", "8px 8px 0 0");
    $("#review-" + review_id).css("margin-bottom", "0");
  }
}