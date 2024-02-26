<?php
/**
 * Block5 Block Template
 */
$block5_fields = get_fields();
$post_custom_fields = get_fields($block5_fields['post'] -> ID);
?>
<section>
    <div class="container-fluid gx-0">
        <div class="row gx-0">
            <div class="col-md-6 col-12">
                <img class="w-100 h-100 d-none d-lg-block " src="<?php echo $post_custom_fields['images']['desktop_image']; ?>">
                <img class="w-100 h-100 d-none d-sm-block d-lg-none" src="<?php echo $post_custom_fields['images']['tablet_image']; ?>" alt="">
                <img class="w-100 h-100 d-block d-sm-none" src="<?php echo $post_custom_fields['images']['mobile_image']; ?>" alt="">
            </div>
            <div class="col-md-6 col-12 bg-black">
                <div class="p-5">
                    <a href="<?php echo get_permalink( $block5_fields['post'] -> ID ); ?>">
                        <h3><?php echo $block5_fields['post'] -> post_title; ?></h3>
                    </a>
                    <p class="text-white" style="max-width: 30rem;">
                    <?php echo $block5_fields['post'] -> post_excerpt; ?>
                    </p>
                    <a class="text-white" href="<?php echo get_permalink($post_custom_fields['author'] -> ID); ?>">
                        <?php echo get_the_title($post_custom_fields['author'] -> ID); ?>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>