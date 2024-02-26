<?php
get_header();
$count = 0;
$args = array(
    'post_type'         =>      'post',
    'posts_per_page'    =>      -1,
    'order'             =>      'DSC',
    'orderby'           =>      'date',
);

$query = new WP_Query($args);
$current_language = apply_filters('wpml_current_language', NULL);
$author_id = get_the_ID();
$current_author_posts = array();

if ( $query -> have_posts() ) :
    while ( $query -> have_posts() ) : $query -> the_post();
        $post_custom_fields = get_fields(get_the_ID());
        if($post_custom_fields['author'] -> ID == $author_id ):
            array_push($current_author_posts, get_the_ID());
        endif;
    endwhile;
    wp_reset_postdata();// Restore original Post Data
endif;
$divided_author_posts_chuncks = array();
$divided_author_posts_chuncks = array_chunk($current_author_posts, 6);
$next_chunck = 0;
$jsObject = json_encode($divided_author_posts_chuncks);
?>
<section class="single_author">
	<div class="container">
		<div class="row text-center pb-5">
			<h1 class="page-title"><?php the_title();?></h1>
		</div>
        <div id="post-container" class="row gx-md-5">
			<?php
                foreach($divided_author_posts_chuncks[$next_chunck] as $post_id){
                    $post_custom_fields = get_fields($post_id);
                    $count++;
            ?>
			<div class="col-lg-4 col-md-6 col-12 mb-4 <?php echo $count % 3 != 0 ? 'horizontal-saperator-left-side' : ''?>">
				<div class="inner-post">
					<a href="<?php echo get_permalink($post_id); ?>">
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
					<a href="<?php echo get_permalink($post_id); ?>">
						<h4 class="mt-10 mb-lg-0 mb-4"><?php echo get_the_title($post_id); ?></h4>
					</a>
				</div>
			</div>
			<?php
                }
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
    var page = 1; // Set the initial page number
    var author = <?php echo $author_id; ?>; // Get the current category ID
    var posts = JSON.stringify(<?php echo $jsObject; ?>)
    <?php if($count < 6 ){ ?>
        $('#load-more-button').hide();
    <?php } ?>

    // Function to load more posts via AJAX
    function loadMorePosts() {
        $.ajax({
            type: 'POST',
            url: '<?php echo admin_url('admin-ajax.php'); ?>',
            data: {
                action: 'load_more_author_posts',
                page: page,
                nextChunck: posts,
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