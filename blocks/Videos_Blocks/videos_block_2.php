<?php
/**
 * Video2 Block Block Template
 */
$block2_fields = get_fields();
$all_posts = $block2_fields['posts'];
?>
<section class="py-0 d-none d-lg-block">
    <div class="container">
        <div class="row saperator_black"></div>
    </div>
</section>

<section>
    <div class="container">
        <div class="row text-center pb-5">
            <a href="<?=$block2_fields['title_url'] ?>">
                <h1>
                    <?php echo $block2_fields['title']; ?>
                </h1>
            </a>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="swiper videosSwiper">
                    <div class="swiper-wrapper">
                        <?php foreach($all_posts as $post) {
                                $get_custom_field = get_fields($post['post'] -> ID);
                        ?>
                            <div class="swiper-slide">
                                <?php if($get_custom_field['youtube_url']){ ?>
                                    <div class="position-relative">
                                        <img class="w-100 h-100 main_image d-none d-lg-block image-darker" src="<?php echo $get_custom_field['images']['desktop_image']; ?>" alt="main_image">
                                        <img class="w-100 h-100 main_image d-none d-sm-block d-lg-none image-darker" src="<?php echo $get_custom_field['images']['tablet_image']; ?>" alt="main_image">
                                        <img class="w-100 h-100 main_image d-block d-sm-none image-darker" src="<?php echo $get_custom_field['images']['mobile_image']; ?>" alt="main_image">
                                        <img class="play" src="<?php echo get_template_directory_uri(); ?>/inc/assets/images/play-48.ico" alt="play">
                                    </div>
                                <?php }else { ?>
                                    <img class="w-100 h-100 main_image d-none d-lg-block" src="<?php echo $get_custom_field['images']['desktop_image']; ?>" alt="main_image">
                                    <img class="w-100 h-100 main_image d-none d-sm-block d-lg-none" src="<?php echo $get_custom_field['images']['tablet_image']; ?>" alt="main_image">
                                    <img class="w-100 h-100 main_image d-block d-sm-none" src="<?php echo $get_custom_field['images']['mobile_image']; ?>" alt="main_image">
                                <?php } ?>
                                <div class="inner-content pt-4">
                                    <p><?php echo get_the_excerpt($post['post'] -> ID); ?></p>
                                    <a href="<?php echo get_permalink( $get_custom_field['author'] -> ID); ?>">
                                        <?php echo get_the_title($get_custom_field['author'] -> ID); ?>
                                    </a>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                    <div class="swiper-pagination"></div>
                </div>
            </div>
        </div>
    </div>
</section>