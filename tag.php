<?php
/**
* A Simple tag Template
*/

get_header();
$count = 0;
$current_tag = get_queried_object();
if ($current_tag) {
    $tag_id = $current_tag->term_id;
}
$args = array(
    'tag_id' => $tag_id,
    'post_type' => 'post',
    'posts_per_page' => 6,
    'order'             =>      'DSC',
    'orderby'           =>      'date',
);
$query = new WP_Query($args);
$current_language = apply_filters('wpml_current_language', NULL);
?>
<section class="single_category">
    <div class="container">
        <div class="row text-center pb-5">
            <h1><?php echo single_tag_title(); ?></h1>
        </div>
        <div id="post-container" class="row gx-md-5">
            <?php
                if ( $query -> have_posts() ) :
                    while ( $query -> have_posts() ) :  $query -> the_post();
                        $post_custom_fields = get_fields(get_the_ID());
                        $count++;
            ?>
                    <div class=" col-xl-4 col-lg-6 col-md-6 col-12 mb-4  <?php echo $count % 3 != 0 ? 'horizontal-saperator-left-side' : ''?>">
                        <div class="inner-post">
                            <a href="<?php echo get_permalink(get_the_ID()); ?>">
                               <div class="" style="position: relative;">
                                    <?php if($post_custom_fields['images']['desktop_image'] == ''){ ?>
                                        <img class="w-100 h-100" src="<?php echo get_template_directory_uri(); ?>/inc/assets/images/lebanese-economics.jpg" alt="<?php the_title(); ?>">
                                    <?php } else { ?>
                                        <?php if($post_custom_fields['youtube_url']){ ?>
                                            <div class="position-relative">
                                                <a href="<?php echo $post_custom_fields['youtube_url'] ?>">
                                                    <img class="w-100 h-100 d-none d-lg-block image-darker" src="<?php echo $post_custom_fields['images']['desktop_image']; ?>" alt="<?php the_title(); ?>">
                                                    <img class="w-100 h-100 d-none d-sm-block d-lg-none image-darker" src="<?php echo $post_custom_fields['images']['tablet_image']; ?>" alt="<?php the_title(); ?>">
                                                    <img class="w-100 h-100 d-block d-sm-none image-darker" src="<?php echo $post_custom_fields['images']['mobile_image']; ?>" alt="<?php the_title(); ?>">
                                                    <img class="play" src="<?php echo get_template_directory_uri(); ?>/inc/assets/images/play-48.ico" alt="play">
                                                </a>
                                            </div>
                                        <?php } else{ ?>
                                            <a href="<?php echo get_permalink(get_the_ID()); ?>">
                                                <img class="w-100 h-100 d-none d-lg-block " src="<?php echo $post_custom_fields['images']['desktop_image']; ?>" alt="<?php the_title(); ?>">
                                                <img class="w-100 h-100 d-none d-sm-block d-lg-none" src="<?php echo $post_custom_fields['images']['tablet_image']; ?>" alt="<?php the_title(); ?>">
                                                <img class="w-100 h-100 d-block d-sm-none" src="<?php echo $post_custom_fields['images']['mobile_image']; ?>" alt="<?php the_title(); ?>">
                                            </a>
                                        <?php } ?>
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
    var tag_id = <?php echo $tag_id ?>; // Get the current category ID
    <?php if($count < 6 ){ ?>
        $('#load-more-button').hide();
    <?php } ?>

    // Function to load more posts via AJAX
    function loadMorePosts() {
        $.ajax({
            type: 'POST',
            url: '<?php echo admin_url('admin-ajax.php'); ?>',
            data: {
                action: 'load_more_tag_posts',
                page: page,
                tag_id: tag_id,
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
<?php get_footer(); ?>