<?php
/**
 * Template Name: about us
 */
get_header();
$company_main_fields = get_fields();
?>

<section class="about-us py-5">
	<div class="container">
		<div class="row pb-5">
			<h1><?php the_title(); ?></h1>
		</div>
	</div>
	<div class="container">
		<div class="row">
			<?php the_content(); ?>
		</div>
	</div>
</section>
<script>
    jQuery(document).ready(function($) {
        var swiper = new Swiper(".authorsSwiper", {
            slidesPerView: 4,
            spaceBetween: 20,
            pagination: {
                el: '.swiper-pagination',
                type: 'bullets',
                clickable: true,
            },
			autoplay: {
				delay: 3500,
				disableOnInteraction: true,
				stopOnLastSlide: true,
			},
			breakpoints: {
				// when window width is >= 320px
				320: {
					slidesPerView: 1.5,
					spaceBetween: 20
				},
				// when window width is >= 480px
				480: {
					slidesPerView: 1.5,
					spaceBetween: 30
				},
				// when window width is >= 640px
				640: {
					slidesPerView: 2,
					spaceBetween: 40
				},
				991: {
					slidesPerView: 4,
					spaceBetween: 20
				}
			}
        });
    })
</script>
<?php
get_footer();