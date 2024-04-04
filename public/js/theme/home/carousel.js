var carouselWidth = $(".carousel-inner")[0].scrollWidth;

var cardWidth = $(".carousel-item").width();

var scrollPosition = 0;

$(".carousel-control-next").on("click", function () {
  if (scrollPosition < (carouselWidth - cardWidth * 4)) { //check if you can go any further
    scrollPosition += cardWidth;  //update scroll position
    $(".carousel-inner").animate({ scrollLeft: scrollPosition },600); //scroll left
  }
});

$(".carousel-control-prev").on("click", function () {
  if (scrollPosition > 0) {
    scrollPosition -= cardWidth;
    $(".carousel-inner").animate(
      { scrollLeft: scrollPosition },
      600
    );
  }
});

var multipleCardCarousel = document.querySelector(
  "#carouselExampleControls"
);
if (window.matchMedia("(min-width: 768px)").matches) {
  //rest of the code
  var carousel = new bootstrap.Carousel(multipleCardCarousel, {
    interval: false
  });
} else {
  // For mobile devices, ensure the first image is visible initially
  scrollPosition = 0; // Reset scroll position to 0
  $(".carousel-inner").scrollLeft(scrollPosition);
  $(multipleCardCarousel).addClass("slide");
}

var carousel = new bootstrap.Carousel(multipleCardCarousel, {
  interval: false,
  wrap: false,
});
