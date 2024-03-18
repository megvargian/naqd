<?php
/**
 * About1 Block Block Template
 */
$block1_fields = get_fields();
$first_two_members = $block1_fields['first_two_members'];
$four_members = $block1_fields['four_memebers'];

$args = array(
    'post_type' => 'authors',
    'posts_per_page' => -1,
);
$query = new WP_Query($args);
?>
<section class="pb-0 d-none d-lg-block">
    <div class="container">
        <div class="row saperator_black"></div>
    </div>
</section>
<section>
    <div class="container">
        <div class="row justify-content-center py-5 mb-5">
            <?php foreach( $first_two_members as $member){ ?>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12 mb-3">
                    <div class="member">
                        <img src="<?php echo $member['image']; ?>" alt="<?php echo $member['title']; ?>">
                        <h5><?php echo $member['title']; ?></h5>
                        <p class="pt-3 mb-0"><?php echo $member['description']; ?></p>
                    </div>
                </div>
            <?php } ?>
        </div>
        <div class="row justify-content-center pb-5 mb-5">
            <?php foreach( $four_members as $member){ ?>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12 mb-3">
                    <div class="member">
                        <img src="<?php echo $member['image']; ?>" alt="<?php echo $member['title']; ?>">
                        <h5><?php echo $member['title']; ?></h5>
                        <p class="pt-3 mb-0"><?php echo $member['description']; ?></p>
                    </div>
                </div>
            <?php } ?>
        </div>
        <div class="row pt-4">
            <div class="col-12">
                <div class="swiper authorsSwiper">
                    <div class="swiper-wrapper">
                        <?php
                            if ( $query -> have_posts() ) :
                                while ( $query -> have_posts() ) :  $query -> the_post();
                                $single_post_id = get_the_ID();
                                $title = get_the_title($single_post_id);
                            ?>
                                <div class="swiper-slide">
                                    <div class="author">
                                        <a href="<?php echo get_permalink($single_post_id) ?>">
                                            <img src="<?php echo get_the_post_thumbnail_url($single_post_id) ?>" alt="<?php echo $title ?>" loading="lazy">
                                            <h5><?php echo $title; ?></h5>
                                        </a>
                                    </div>
                                </div>
                            <?php
                            endwhile;
                        endif;?>
                    </div>
                    <div class="swiper-pagination d-md-block d-none"></div>
                </div>
            </div>
        </div>
    </div>
</section>