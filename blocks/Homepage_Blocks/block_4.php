<?php
/**
 * Block4 Block Template
 */
$block4_fields = get_fields();
$posts = $block4_fields['posts'];
$title = $block4_fields['title'];
$post_custom_fields_0 = get_fields($posts[0]['post'] -> ID);
$post_custom_fields_1 = get_fields($posts[1]['post'] -> ID);
?>
<section>
    <div class="container">
        <div class="row pb-3 mb-2 pb-lg-5 mb-lg-4">
            <div class="col-12">
                <a href="<?=$block4_fields['title_url']; ?>">
                    <h2 class="text-center"><?php echo $title; ?></h2>
                </a>
            </div>
        </div>
        <div class="row gx-md-5 gx-2 position-relative">
            <div class="col-lg-6 col-12">
                <div class="inner-post">
                    <div class="position-relative">
                        <a href="<?php echo get_permalink($posts[0]['post'] -> ID); ?>">
                            <img class="w-100 h-100 d-none d-lg-block " src="<?php echo $post_custom_fields_0['images']['desktop_image']; ?>">
                            <img class="w-100 h-100 d-none d-sm-block d-lg-none" src="<?php echo $post_custom_fields_0['images']['tablet_image']; ?>" alt="">
                            <img class="w-100 h-100 d-block d-sm-none" src="<?php echo $post_custom_fields_0['images']['mobile_image']; ?>" alt="">
                        </a>
                        <div class="inner-author">
                            <?php echo get_the_post_thumbnail($post_custom_fields_0['author'] -> ID); ?>
                            <a href="<?php echo get_permalink($post_custom_fields_0['author'] -> ID); ?>">
                                <?php echo get_the_title($post_custom_fields_0['author'] -> ID); ?>
                            </a>
                        </div>
                    </div>
                    <a href="<?php echo get_permalink($posts[0]['post'] -> ID); ?>">
                        <h4 class="mt-10 mb-lg-0 mb-4"><?php echo $posts[0]['post'] -> post_title; ?></h4>
                    </a>
                </div>
            </div>
            <div class="horizontal-saperator d-none d-lg-block"></div>
            <div class="col-lg-6 col-12">
                <div class="inner-post">
                    <div class="position-relative">
                        <a href="<?php echo get_permalink($posts[1]['post'] -> ID); ?>">
                            <img class="w-100 h-100 d-none d-lg-block " src="<?php echo $post_custom_fields_1['images']['desktop_image']; ?>">
                            <img class="w-100 h-100 d-none d-sm-block d-lg-none" src="<?php echo $post_custom_fields_1['images']['tablet_image']; ?>" alt="">
                            <img class="w-100 h-100 d-block d-sm-none" src="<?php echo $post_custom_fields_1['images']['mobile_image']; ?>" alt="">
                        </a>
                        <div class="inner-author">
                            <?php echo get_the_post_thumbnail($post_custom_fields_1['author'] -> ID); ?>
                            <a href="<?php echo get_permalink($post_custom_fields_1['author'] -> ID); ?>">
                                <?php echo get_the_title($post_custom_fields_1['author'] -> ID); ?>
                            </a>
                        </div>
                    </div>
                    <a href="<?php echo get_permalink($posts[1]['post'] -> ID); ?>">
                        <h4 class="mt-10 mb-lg-0 mb-4"><?php echo $posts[1]['post'] -> post_title; ?></h4>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>