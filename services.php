<?php
/**
 * Template Name: Service Page
 */

get_header(); 

$services_main_fields = get_fields();
?>
<section class="main_sevices_section">
	<div class="background_img main_service_img" style="background-image: url(<?php echo $services_main_fields['image']['sizes']['main_img_company_services'] ?>);">
		<div class="container">
			<div class="row">
				<h1 class="h1_style"><?php echo $services_main_fields['title'] ?></h1>
			</div>
		</div>
	</div>
</section>
<?php
    while ( have_posts() ) : the_post();
        the_content();
    endwhile; 
?>
<?php
get_footer();