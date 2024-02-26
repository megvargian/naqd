<?php
/**
 * Template Name: Videos
 */
get_header();

while ( have_posts() ) : the_post();
	the_content();
endwhile;
?>
<script>
(function($) {
	var swiper = new Swiper(".videosSwiper", {
		slidesPerView: 3,
		spaceBetween: 20,
		pagination: {
			el: '.swiper-pagination',
			type: 'bullets',
			clickable: true,
		},
		breakpoints: {
			// when window width is >= 320px
			320: {
				slidesPerView: 1,
				spaceBetween: 20
			},
			480: {
				slidesPerView: 1.2,
				spaceBetween: 20
			},
			640: {
				slidesPerView: 1.5,
				spaceBetween: 30
			},
			991: {
				slidesPerView: 2,
				spaceBetween: 30
			},
			1200: {
				slidesPerView: 3,
				spaceBetween: 30
			}
		}
	});
	var swiper = new Swiper(".programsSwiper", {
		slidesPerView: 3,
		spaceBetween: 20,
		pagination: {
			el: '.swiper-pagination',
			type: 'bullets',
			clickable: true,
		},
		breakpoints: {
			// when window width is >= 320px
			320: {
				slidesPerView: 1,
				spaceBetween: 20
			},
			480: {
				slidesPerView: 1.2,
				spaceBetween: 20
			},
			640: {
				slidesPerView: 1.5,
				spaceBetween: 30
			},
			991: {
				slidesPerView: 2,
				spaceBetween: 30
			},
			1200: {
				slidesPerView: 3,
				spaceBetween: 30
			}
		}
	});
})(jQuery);
</script>
<?php
get_footer();