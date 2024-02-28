<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package WP_Bootstrap_Starter
 */

get_header();
$count = 0;
$query_default_args = array(
	'posts_per_page'    =>        6,
	'post_type'         =>       'post',
	's'                 =>       get_search_query(),
	'order'             =>      'DSC',
    'orderby'           =>      'date',
);
$query_default_projects = new WP_Query($query_default_args);
$current_language = apply_filters('wpml_current_language', NULL);
?>
<section class="single_search">
	<div class="container">
		<div class="row text-center pb-5">
			<h1 class="page-title"><?php echo esc_html__(get_search_query()); ?></h1>
		</div>
        <div id="post-container" class="row gx-md-5">
			<?php
				if ( have_posts() ) :
					while ( $query_default_projects -> have_posts() ) : $query_default_projects -> the_post();
					$post_custom_fields = get_fields(get_the_ID());
					$count++;
			?>
			<div class="col-lg-4 col-md-6 col-12 mb-4 <?php echo $count % 3 != 0 ? 'horizontal-saperator-left-side' : ''?>">
				<div class="inner-post">
					<a href="<?php echo get_permalink(get_the_ID()); ?>">
						<div class="" style="position: relative;">
							<?php if($post_custom_fields['images']['desktop_image'] == ''){ ?>
								<img class="w-100 h-100" src="<?php echo get_template_directory_uri(); ?>/inc/assets/images/lebanese-economics.jpg" alt="<?php the_title(); ?>">
							<?php } else { ?>
							<img class="w-100 h-100 d-none d-lg-block " src="<?php echo $post_custom_fields['images']['desktop_image']; ?>" alt="<?php the_title(); ?>">
							<img class="w-100 h-100 d-none d-sm-block d-lg-none" src="<?php echo $post_custom_fields['images']['tablet_image']; ?>" alt="<?php the_title(); ?>">
							<img class="w-100 h-100 d-block d-sm-none" src="<?php echo $post_custom_fields['images']['mobile_image']; ?>" alt="<?php the_title(); ?>">
							<?php } ?>
							<?php if($post_custom_fields['author'] -> ID){ ?>
								<div class="inner-author">
									<?php echo get_the_post_thumbnail($post_custom_fields['author'] -> ID); ?>
									<a href="<?php echo get_permalink($post_custom_fields['author'] -> ID); ?>">
										<?php echo get_the_title($post_custom_fields['author'] -> ID); ?>
									</a>
								</div>
							<?php } ?>
						</div>
					</a>
					<a href="<?php echo get_permalink(get_the_ID()); ?>">
						<h4 class="mt-10 mb-lg-0 mb-4"><?php the_title(); ?></h4>
					</a>
				</div>
			</div>
			<?php
				endwhile;
				endif;
			?>
		</div>
		<div class="row text-center justify-content-center d-flex pt-5">
            <button id="load-more-button">
                <?php echo $current_language == 'ar' ? 'المزيد' : 'Read More'; ?>
            </button>
        </div>
	</div>
</section>
<script>
jQuery(document).ready(function($) {
    var page = 2; // Set the initial page number
    var search_name = '<?php echo get_search_query() ?>'; // Get the current category ID

    <?php if($count < 6 ){ ?>
        $('#load-more-button').hide();
    <?php } ?>

    // Function to load more posts via AJAX
    function loadMorePosts() {
        $.ajax({
            type: 'POST',
            url: '<?php echo admin_url('admin-ajax.php'); ?>',
            data: {
                action: 'load_more_posts_search',
                page: page,
                search_name: search_name,
            },
            success: function(response) {
                if (response === ''){
                    $('#load-more-button').hide();
                }
                if (response) {
                    $('#post-container').append(response);
                    page++;
                } else {
                    // No more posts to load
                    $('#load-more-button').hide();
                }
            },
        });
    }

    // Trigger the AJAX call when the button is clicked
    $('#load-more-button').click(function() {
        loadMorePosts();
    });
});
</script>
<?php
get_footer();
