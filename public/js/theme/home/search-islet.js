$(document).ready(function () {
	$(".control-button").on("click", function () {
		var sectionId = $(this).attr("class").split(" ")[1];
		showSection(sectionId);

		// Add 'active' class to the clicked button and remove it from others
		$(".control-button").removeClass("active"); // Remove 'active' from all buttons
		$(this).addClass("active");
	});
});

function showSection(sectionId) {
	$(".about-content > div, .about-content > section").each(function () {
		if ($(this).attr("id") === sectionId) {
			$(this).removeClass("d-none").addClass("d-block");
		} else {
			$(this).removeClass("d-block").addClass("d-none");
		}
	});
}

new Swiper('.mySwiper', {
	speed: 600,
	loop: true,
	autoplay: {
		delay: 5000,
		disableOnInteraction: false
	},
	// If we need pagination
	pagination: {
		el: '.swiper-pagination',
	},

	// Navigation arrows
	navigation: {
		nextEl: '.swiper-button-next',
		prevEl: '.swiper-button-prev',
	},
});

let portfolioInitialized = false;

$(document).ready(function() {
	$("#portfolioButton").click(function(e) {
		if (!portfolioInitialized) {
			initializePortfolio();
			portfolioInitialized = true;
		}
	})
})

function initializePortfolio() {
	$('.portfolio-container').isotope({
		itemSelector: '.portfolio-item',
		layoutMode: 'masonry'
	});
}
