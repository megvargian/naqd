<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WP_Bootstrap_Starter
 */

get_header();
$current_author_id = 0;
$get_current_post_category = get_the_category(get_the_ID());
$args = array(
    'post_type'      => 'post',
    'posts_per_page' =>  10,
    'meta_key'       => 'post_views_count',
    'order'          => 'DESC',
    'post_status'    => 'publish',
    'orderby'        => 'meta_value_num',
);
$query = new WP_Query($args);
$count = 0;
$tags = get_the_tags(get_the_ID());
$current_language = apply_filters('wpml_current_language', NULL);
?>
<section class="single-post-page pt-3">
    <div class="container">
        <div class="row gx-sm-5 gx-0">
            <div class="col-lg-8 col-12 px-sm-5 px-0">
                <?php
                if (have_posts()) :
                    while ( have_posts() ) : the_post();
                        $get_all_single_post_fields = get_fields(get_the_ID());
                        $current_post_id = get_the_ID();
                        $current_author_id = $get_all_single_post_fields['author'] -> ID;
                    ?>
                        <div class="row">
                            <div class="px-0" style="position: relative;">
                                    <?php if($get_all_single_post_fields['youtube_url']){ ?>
                                        <div class="position-relative">
                                            <a href="<?php echo $get_all_single_post_fields['youtube_url'] ?>">
                                                <img class="w-100 h-100 d-none d-lg-block image-darker" style="height: 550px;" src="<?php echo $get_all_single_post_fields['images']['desktop_image']; ?>" alt="<?php the_title(); ?>">
                                                <img class="w-100 h-100 d-none d-sm-block d-lg-none image-darker" src="<?php echo $get_all_single_post_fields['images']['tablet_image']; ?>" alt="<?php the_title(); ?>">
                                                <img class="w-100 h-100 d-block d-sm-none image-darker" src="<?php echo $get_all_single_post_fields['images']['mobile_image']; ?>" alt="<?php the_title(); ?>">
                                                <img class="play" src="<?php echo get_template_directory_uri(); ?>/inc/assets/images/play-48.ico" alt="play">
                                            </a>
                                        </div>
                                    <?php } else{ ?>
                                        <img class="w-100 h-100 d-none d-lg-block" style="height: 550px;" src="<?php echo $get_all_single_post_fields['images']['desktop_image']; ?>" alt="<?php the_title(); ?>">
                                        <img class="w-100 h-100 d-none d-sm-block d-lg-none" src="<?php echo $get_all_single_post_fields['images']['tablet_image']; ?>" alt="<?php the_title(); ?>">
                                        <img class="w-100 h-100 d-block d-sm-none" src="<?php echo $get_all_single_post_fields['images']['mobile_image']; ?>" alt="<?php the_title(); ?>">
                                    <?php } ?>
                                    <?php if($get_all_single_post_fields['author'] -> ID){ ?>
                                        <div class="inner-author">
                                            <?php echo get_the_post_thumbnail($get_all_single_post_fields['author'] -> ID); ?>
                                            <a href="<?php echo get_permalink($get_all_single_post_fields['author'] -> ID); ?>">
                                                <?php echo get_the_title($get_all_single_post_fields['author'] -> ID); ?>
                                            </a>
                                        </div>
                                    <?php } ?>
                            </div>
                        </div>
                        <div class="row py-5 pb-3 mt-2">
                            <h1><?php the_title();?></h1>
                        </div>
                        <div class="row pb-3">
                            <a class="text-black" href="<?php echo get_category_link($get_current_post_category[0] -> term_id); ?>">
                                <?php echo $get_current_post_category[0] -> name; ?>
                            </a>
                        </div>
                        <div class="row pb-3">
                            <p><?php echo get_the_date(); ?></p>
                        </div>
                        <div class="row pb-3">
                            <div id="content" class="content">
                                <?php the_content(); ?>
                            </div>
                        </div>
                    <?
                    endwhile; // End of the loop.
                    wp_reset_postdata();
                endif;
                ?>
                <div class="row">
                    <div class="w-100 single-post-subscriptions">
                        <?php echo do_shortcode('[contact-form-7 id="4b7188c" title="Subscription"]') ?>
                    </div>
                </div>
                <div class="row tags pt-4 pb-mt-0 pb-4">
                    <?php  foreach($tags as $tag){ ?>
                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-6 mt-5">
                            <a href="<?php echo get_tag_link($tag -> term_id); ?>">
                                <?php echo $tag -> name ?>
                            </a>
                        </div>
                    <?php } ?>
                </div>
            </div>
            <div class="col-lg-4 px-5 pt-4 col-12">
                <div>
                    <h2 class="text-black mb-md-5 mb-2 border-right-custom">
                        <?php echo ($current_language == 'ar') ? 'الأكثر قراءة' : 'Most read?'; ?>
                    </h2>
                    <ol id="order-list-podcast" class="pb-3">
                        <?php
                            if ( $query -> have_posts() ) :
                                while ( $query -> have_posts() ) :  $query -> the_post();
                                    $post_custom_fields = get_fields(get_the_ID());
                                    $get_post_category = get_the_category(get_the_ID());
                                    if( $post_custom_fields['author'] -> ID &&
                                        $count < 4 &&
                                        $get_current_post_category[0] -> term_id == $get_post_category[0] -> term_id
                                    ):
                                    $count++;
                         ?>
                            <li>
                                <a class="mt-2 text-black a-h3" href="<?php echo get_permalink( get_the_ID()); ?>">
                                    <?php the_title(); ?>
                                </a>
                                <?php if($post_custom_fields['author'] -> ID != null){ ?>
                                    <a class="mt-2" href="<?php echo get_permalink($post_custom_fields['author'] -> ID) ?>" style="font-size: 1rem;">
                                        <?php echo get_the_title($post_custom_fields['author'] -> ID); ?>
                                    </a>
                                <?php } ?>
                            </li>
                        <?php
                                    endif;
                                endwhile;
                                wp_reset_postdata();
                            endif;
                        ?>
                    </ol>
                    <?php if($current_author_id != 0){ ?>
                        <div class="pb-3 saperator_black"></div>
                        <h5 class="py-3">
                            <?php echo ($current_language == 'ar') ? 'اقرأوا المزيد من المقالات لهذا الكاتب' : 'Read more articles by this author'; ?>
                        </h5>
                        <div class="current_author">
                            <?php echo get_the_post_thumbnail($current_author_id); ?>
                            <a href="<?php echo get_permalink($current_author_id); ?>">
                                <?php echo get_the_title($current_author_id); ?>
                            </a>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    jQuery(document).ready(function($) {
        const progressBar = $("#progress-bar");
        const content = $("#content");

        // Calculate the total scroll height
        console.log(content.prop("scrollHeight"));
        const totalHeight = content.prop("scrollHeight")
        console.log(totalHeight);

        // Initialize Intersection Observer
        const observer = new IntersectionObserver((entries) => {
            entries.forEach((entry) => {
                // If content is in view, start the progress bar
                if (entry.isIntersecting) {
                    startProgressBar();
                    observer.disconnect(); // Stop observing once triggered
                }
            });
        });

        // Observe the content element
        observer.observe(content[0]);

        // Function to start the progress bar
        function startProgressBar() {
            // Update the progress bar width as the user scrolls
            $(window).scroll(function () {
                const progress = ($(window).scrollTop() / totalHeight) * 100;
                progressBar.css("width", progress + "%");
            });
        }
    });

</script>
<?php
get_footer();
