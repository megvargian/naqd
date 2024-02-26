<?php
/**
 * Template Name: Homepage
 */
get_header();
?>
<?php
	while ( have_posts() ) : the_post();
        the_content();
	endwhile;
?>
<script>
    jQuery(document).ready(function($) {
        var swiper = new Swiper(".mainSwiper", {
            slidesPerView: 3,
            spaceBetween: 20,
            pagination: {
                el: '.swiper-pagination',
                type: 'bullets',
                clickable: true,
            },
        });
        var swiper = new Swiper(".secondMainSwiper", {
            slidesPerView: 3,
            spaceBetween: 20,
            pagination: {
                el: '.swiper-pagination',
                type: 'bullets',
                clickable: true,
            },
        });
        var swiper = new Swiper(".FirstSwiperMobile", {
            slidesPerView: 1.5,
            spaceBetween: 20,
            pagination: {
                el: '.swiper-pagination',
                type: 'bullets',
                clickable: true,
            },
        });

    })
</script>
<?
get_footer();
