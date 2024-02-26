<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package WP_Bootstrap_Starter
 */

get_header(); ?>

	<section class="page_404">
		<div class="container">
			<div class="text-center">
				<div class="title_404">
					<span class="k_helvetica">404</span>  |  <?php echo __('LOOKS LIKE YOU\'RE LOST', '404')?>
				</div>
				<div class=" text_404 kh_light">
					<?php echo __('The page you are looking for is not availble!', '404')?>
				</div>
				<a href="<?php echo esc_url( home_url( '/' )); ?>">
					<div class="main_btn btn_404">
						<?php echo __('Go Back to Homepage', '404')?>
					</div>
				</a>
			</div>	
		</div>
	</section>

<?php
get_footer();
