<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WP_Bootstrap_Starter
 */
?>
</div><!-- #content -->
<?php  get_template_part('template-parts/footer', 'before'); ?>
<?php
$getGeneralFields = get_fields('options');
$footer_fields = $getGeneralFields['footer_menu_items'];
$footer_logo = $getGeneralFields['footer_logo'];
?>
<footer>
    <div class="main_footer_section bg-black">
        <div class="container">
           <div class="row d-flex justify-content-center align-center py-4">
                <a class="fit-content" href="<?php echo home_url(); ?>">
                    <img class="logo" src="<?php echo $footer_logo; ?>" alt="naqd-logo">
                </a>
           </div>
           <div class="row">
                <div class="white_seperator w-100"></div>
           </div>
           <div class="row py-4">
                <div class="col-lg-6 col-12">
                    <div class="row">
                        <div class="col-lg-6 col-12 pb-lg-0 pb-3">
                            <ul class="fit-content first-section d-flex d-lg-block">
                                <?php foreach($footer_fields[0]['child_items'] as $items){ ?>
                                    <li>
                                        <a href="<?php echo $items['url']; ?>">
                                            <?php echo $items['label']; ?>
                                        </a>
                                    </li>
                                <?php } ?>
                            </ul>
                        </div>
                        <div class="col-lg-6 col-12 pb-lg-0 pb-3">
                            <ul class="fit-content first-section d-flex d-lg-block">
                                <?php foreach($footer_fields[1]['child_items'] as $items){ ?>
                                    <li>
                                        <a href="<?php echo $items['url']; ?>">
                                            <?php echo $items['label']; ?>
                                        </a>
                                    </li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-12">
                    <div class="row d-block d-lg-none">
                        <div class="white_seperator w-100"></div>
                    </div>
                    <div class="row pt-lg-0 pt-4">
                        <div class="col-lg-3 col-0"></div>
                        <div class="col-lg-9 col-12">
                            <div class="subscription">
                                <h5 class="text-white pb-3">
                                    <?php echo $getGeneralFields['subscription_on_youtube']['title']; ?>
                                </h5>
                                <a href="<?php echo $getGeneralFields['subscription_on_youtube']['button_url']; ?>" class="main_button">
                                    <?php echo $getGeneralFields['subscription_on_youtube']['button_text']; ?>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
           </div>
           <div class="row">
                <div class="white_seperator w-100"></div>
           </div>
           <div class="row py-4">
                <div class="col-12">
                    <ul class="d-flex justify-content-start align-content-start second-section">
                        <?php foreach($footer_fields[2]['child_items'] as $items){ ?>
                            <li>
                                <a href="<?php echo $items['url']; ?>">
                                    <?php echo $items['label']; ?>
                                </a>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
           </div>
           <div class="row">
                <div class="white_seperator w-100"></div>
           </div>
           <div class="row">

           </div>
        </div>
    </div>
    <?php  get_template_part('template-parts/footer', 'after'); ?>
</footer>
</div><!-- #page -->
<script>
    jQuery(document).ready(function($) {
        // $("body").queryLoader2({
		// 		onProgress: function(percentage, imagesLoaded, totalImages){
		// 			$('.progress-bar').css('width', percentage + '%');
		// 			$('.progress-bar').attr('aria-valuenow', percentage);
		// 			$(document).load().scrollTop(0);
		// 		},
		// 		onComplete: function(){
		// 			setTimeout(function(){
		// 				$('.page_loader').slideUp(700, function() {
		// 				});
		// 				$('.second_color').slideUp(900, function() {

		// 				});

		// 			}, 500);

		// 			setTimeout(function(){
		// 				if ($(window).width() > 991) {
		// 					$('.page_loader').remove();
		// 				}
		// 			}, 1200);
		// 			setTimeout(function(){
		// 				// home();
		// 				$('.animate_part_0').removeClass('animate_part_0_active');
		// 				$('.animate_part_0_2').removeClass('animate_part_0_2_active');
		// 				$('.animate_part_0_3').removeClass('animate_part_0_3_active');
		// 				$('.nav-bar').removeClass('nav-bar-slide');
		// 			}, 1400);
		// 			setTimeout(function(){
		// 				$('.nav-bar').css('transition', '0s');
		// 			}, 1700);

		// 		},
		// });
        // // if($('.first_section').visibale(true)) {
        // //     $('.animate_part_0').removeClass('animate_part_0_active');
        // // }
		// $('.mouse_icon').click(function(event) {
		// 	// Preventing default action of the event
		// 	event.preventDefault();
		// 	var n = $(document).height();
		// 	$('html, body').animate({ scrollTop: 800 }, 300);
		// });
    });
</script>
<?php wp_footer(); ?>
</body>
</html>