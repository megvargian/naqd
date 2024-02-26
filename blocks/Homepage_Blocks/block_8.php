<?php
/**
 * Block8 Block Template
 */
$block8_fields = get_fields();
$posts = $block8_fields['posts'];
$post_0 = $posts[0]['post'];
$post_1 = $posts[1]['post'];
$post_2 = $posts[2]['post'];
$post_custom_fields_0 = get_fields($post_0 -> ID);
$post_custom_fields_1 = get_fields($post_1 -> ID);
$post_custom_fields_2 = get_fields($post_2 -> ID);
?>
<section class="pt-0">
    <div class="container">
        <div class="row pb-3 mb-2 pb-lg-5 mb-lg-4">
            <div class="col-12">
                <a href="<?= $block8_fields['title_url']; ?>">
                    <h2 class="text-center"><?php echo $block8_fields['title']; ?></h2>
                </a>
            </div>
        </div>
        <div class="row gx-5 d-none d-lg-flex">
            <div class="col-8">
                <img class="w-100 h-auto" src="<?php echo $post_custom_fields_0['images']['desktop_image']; ?>" alt="<?php echo $post_0 -> post_title ?>">
                <a href="<?php echo get_permalink($post_0 -> ID); ?>">
                    <h2 class="mt-3"><?php echo $post_0 -> post_title ?></h2>
                </a>
                <p><?php echo $post_0 -> post_excerpt; ?></p>
                <a class="mt-4" href="<?php echo get_permalink($post_custom_fields_0['author'] -> ID); ?>">
                    <?php echo get_the_title($post_custom_fields_0['author'] -> ID); ?>
                </a>
            </div>
            <div class="col-4">
                <div class="row gx-5">
                    <div class="col-12 mb-4 horizontal-saperator-right-side">
                        <img class="w-100 h-auto" src="<?php echo $post_custom_fields_1['images']['desktop_image']; ?>" alt="<?php echo $post_1 -> post_title ?>">
                        <a href="<?php echo get_permalink($post_1 -> ID); ?>">
                            <h5 class="mt-2"><?php echo $post_1 -> post_title ?></h5>
                        </a>
                        <a class="mt-2" href="<?php echo get_permalink($post_custom_fields_1['author'] -> ID); ?>" style="font-size: 1rem;">
                            <?php echo get_the_title($post_custom_fields_1['author'] -> ID); ?>
                        </a>
                        <div class="saperator_black mt-3"></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <img class="w-100 h-auto" src="<?php echo $post_custom_fields_2['images']['desktop_image']; ?>" alt="<?php echo $post_2 -> post_title; ?>">
                        <a href="<?php echo get_permalink($post_2 -> ID); ?>">
                            <h5 class="mt-2"><?php echo $post_2 -> post_title; ?></h5>
                        </a>
                        <a class="mt-2" href="<?php echo get_permalink($post_custom_fields_2['author'] -> ID); ?>" style="font-size: 1rem;">
                            <?php echo get_the_title($post_custom_fields_2['author'] -> ID); ?>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row d-block d-lg-none">
            <div class="swiper FirstSwiperMobile">
                <div class="swiper-wrapper">
                    <?php foreach($posts as $post){
                        $get_field = get_fields($post['post'] -> ID)
                    ?>
                        <div class="swiper-slide">
                            <div>
                                <a href="<?php echo get_permalink($post['post'] -> ID); ?>">
                                    <img class="w-100 h-100 d-none d-sm-block d-lg-none" src="<?php echo $get_field['images']['tablet_image']; ?>" alt="<?php echo $post['post'] -> post_title; ?>">
                                    <img class="w-100 h-100 d-block d-sm-none" src="<?php echo $get_field['images']['mobile_image']; ?>" alt="<?php echo $post['post'] -> post_title; ?>">
                                    <h5 class="mb-3"><?php echo $post['post'] -> post_title; ?></h5>
                                </a>
                                <a href="<?php echo get_permalink($get_field['author'] -> ID) ;?>">
                                    <?php echo get_the_title($get_field['author'] -> ID); ?>
                                </a>
                            </div>
                        </div>
                    <?php } ?>
                </div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </div>
</section>