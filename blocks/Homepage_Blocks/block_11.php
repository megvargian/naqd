<?php
/**
 * Block11 Block Template
 */
$block11_fields = get_fields();
?>
<section class="pt-0">
    <div class="container-fluid">
        <div class="row pb-3 mb-2 pb-lg-5 mb-lg-4">
            <div class="col-12">
                <h2 class="text-center"><?php echo $block11_fields['title']; ?></h2>
            </div>
        </div>
        <div class="row gx-1">
            <?php foreach($block11_fields['posts'] as $key => $post){
                $get_custom_fields = get_fields($post['post'] -> ID);
            ?>
                <div class="col <?php if($key > 0){ echo 'pr-1'; }?>">
                    <a href="<?php echo get_permalink($post['post'] -> ID); ?>">
                        <img class="w-100 h-auto d-none d-lg-block" src="<?php echo $get_custom_fields['images']['desktop_image'] ?>" alt="">
                        <img class="w-100 h-100 d-none d-sm-block d-lg-none" src="<?php echo $get_custom_fields['images']['tablet_image']; ?>" alt="">
                        <img class="w-100 h-100 d-block d-sm-none" src="<?php echo $get_custom_fields['images']['mobile_image']; ?>" alt="">
                    </a>
                </div>
            <?php } ?>
        </div>
    </div>
</section>