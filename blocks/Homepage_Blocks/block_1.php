<?php
/**
 * Block1 Block Template
 */
$block1_fields = get_fields();
$customFields_main_post = get_fields($block1_fields['main_post'] -> ID);
if($customFields_main_post['youtube_url']){
    $isYoutube = true;
} else{
    $isYoutube = false;
}
?>
<section class="d-block d-lg-none mobile_view">
    <div class="container-fluid gx-0">
        <div class="row gx-0">
            <?php if($isYoutube){ ?>
                <a class="position-relative" href="<?php echo $customFields_main_post['youtube_url']; ?>">
                    <!-- <h2><?php //echo $block1_fields['main_post'] -> post_title; ?></h2> -->
                    <img class="w-100 h-100 d-none d-sm-block d-lg-none image-darker" src="<?php echo $customFields_main_post['images']['tablet_image'] ?>" alt="">
                    <img class="w-100 h-100 d-block d-sm-none image-darker" src="<?php echo $customFields_main_post['images']['mobile_image'] ?>" alt="">
                    <img class="play" src="<?php echo get_template_directory_uri(); ?>/inc/assets/images/play-48.ico" alt="play">
                </a>
            <?php }else{?>
                <a class="position-relative" href="<?php echo get_permalink($block1_fields['main_post'] -> ID) ?>">
                    <!-- <h2><?php // echo $block1_fields['main_post'] -> post_title; ?></h2> -->
                    <img class="w-100 h-100 d-none d-sm-block d-lg-none" src="<?php echo $customFields_main_post['images']['tablet_image'] ?>" alt="">
                    <img class="w-100 h-100 d-block d-sm-none" src="<?php echo $customFields_main_post['images']['mobile_image'] ?>" alt="">
                </a>
            <?php } ?>
        </div>
    </div>
</section>
<section class="BlockOne_Homepage d-none d-lg-block">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-12 order-2 order-lg-1">
                <?php if($isYoutube){ ?>
                    <a class="position-relative w-100 h-100 d-block" href="<?php echo $customFields_main_post['youtube_url']; ?>">
                        <img class="w-100 h-100 main_image image-darker" src="<?php echo $customFields_main_post['images']['desktop_image'] ?>" alt="main_image">
                        <img class="play" src="<?php echo get_template_directory_uri(); ?>/inc/assets/images/play-48.ico" alt="play">
                    </a>
                <?php }else{?>
                    <a class="position-relative w-100 h-100 d-block" href="<?php echo get_permalink($block1_fields['main_post'] -> ID) ?>">
                        <img class="w-100 h-100 main_image" src="<?php echo $customFields_main_post['images']['desktop_image'] ?>" alt="main_image">
                    </a>
                <?php } ?>
            </div>
            <div class="col-lg-6 col-12 order-1 order-lg-2">
                <a href="<?php echo get_permalink($block1_fields['main_post'] -> ID) ?>">
                    <h2><?php echo $block1_fields['main_post'] -> post_title ?></h2>
                </a>
                <p><?php echo $block1_fields['main_post'] -> post_excerpt ?></p>
                <a href="<?php echo get_permalink($customFields_main_post['author'] -> ID); ?>">
                    <?php echo get_the_title($customFields_main_post['author'] -> ID); ?>
                </a>
            </div>
        </div>
    </div>
</section>