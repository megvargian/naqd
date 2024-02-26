<?php
/**
 * Template Name: Contact Us
 */

get_header();
?>
<section  class="contact_us py-5">
	<div class="container">
		<div class="row pb-5">
			<h1><?php The_title(); ?></h1>
		</div>
	</div>
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-xl-8 col-lg-12 col-md-12 col-12">
				<div class="form_validation_parent">
					<?php echo do_shortcode('[contact-form-7 id="c298fb7" title="Contact Us"]') ?>
					<div class="contact_success_message">
						<?php //echo __('All right reserved Your message has been sent and we will contact you as soon as possible. Thank you!', 'contactuspage')?>
					</div>
					<div class="contact_fail_message">
						<?php //echo __('An error has occurred. Please try again!', 'contactuspage')?>
					</div>
				</div>
			</div>
		</div>
	</div>

</section>
<script>
	jQuery(document).ready(function($) {
		var cf7form = $('.wpcf7');
		if (cf7form) {
			$(cf7form).each(function(index, el) {
			if (el) {
			$(el).find('form').submit(function(event) {
				$(el).find('form').find('.wpcf7-submit').addClass('disabled');
				$(el).parents('.form_validation_parent').find('.contact_success_message').hide();
				$(el).parents('.form_validation_parent').find('.contact_fail_message').hide();
			});
			el.addEventListener( 'wpcf7mailsent', function( event ) {
				$(el).parents('.form_validation_parent').find('.contact_success_message').slideDown(300);
				$(el).parents('.form_validation_parent').find('.wpcf7-response-output').slideDown(300);

			}, false );
			el.addEventListener( 'wpcf7mailfailed', function( event ) {
				$(el).find('form').find('.wpcf7-submit').removeClass('disabled');
				$(el).parents('.form_validation_parent').find('.contact_fail_message').slideDown(300);
			}, false );
			el.addEventListener( 'wpcf7spam', function( event ) {
				$(el).find('form').find('.wpcf7-submit').removeClass('disabled');
				$(el).parents('.form_validation_parent').find('.contact_fail_message').slideDown(300);
			}, false );
			el.addEventListener( 'wpcf7invalid', function( event ) {
				$(el).find('form').find('.wpcf7-submit').removeClass('disabled');
				$(el).parents('.form_validation_parent').find('.contact_fail_message').slideDown(300);
			}, false );
			}
	});
	}
});
</script>

<?php
get_footer();