$.js = function (el) {
	return $('[data-js=' + el + ']')
};

function carousel() {
$.js('timeline-carousel').slick({
	infinite: false,
	arrows: true,
	 arrows: true,
	prevArrow: '<div class="slick-prev"> <div class="btn mr-3 d-flex justify-content-center align-items-center"> <div>Previous</div><svg class="ml-1" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 24 24" style="enable-background:new 0 0 24 24;" xml:space="preserve" fill="#ffffff"> <path d="M10.1,19.1l1.5-1.5L7,13h14.1v-2H7l4.6-4.6l-1.5-1.5L3,12L10.1,19.1z" stroke="#ffffff"/> </svg></div></div>',
	nextArrow: '<div class="slick-next"> <div class="btn d-flex justify-content-center align-items-center"> <svg class="mr-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="#ffffff"> <path d="M 14 4.9296875 L 12.5 6.4296875 L 17.070312 11 L 3 11 L 3 13 L 17.070312 13 L 12.5 17.570312 L 14 19.070312 L 21.070312 12 L 14 4.9296875 z" stroke="#ffffff"/> </svg> <div>Next</div></div></div>',
	dots: true,
	autoplay: false,
	speed: 1100,
	slidesToShow: 3,
	slidesToScroll: 3,
	responsive: [
		{
			breakpoint: 800,
			settings: {
				slidesToShow: 1,
				slidesToScroll: 1
			}
		}]
});
}

carousel();