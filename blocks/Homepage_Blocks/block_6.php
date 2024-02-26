<?php
/**
 * Block6 Block Template
 */
$block6_fields = get_fields();
?>
<div class="container d-none d-lg-block">
    <div class="row saperator_black"></div>
</div>
<section>
    <div class="container">
        <div class="row pb-3 mb-2 pb-lg-5 mb-lg-4">
            <div class="col-12">
                <h2 class="text-center"><?php echo $block6_fields['title']; ?></h2>
            </div>
        </div>
        <div class="row d-md-flex d-none">
            <div class="col-md-4 col-12 horizontal-saperator-left-side">
                <div class="text-center">
                    <div class="d-flex justify-content-center align-items-center w-100 mb-4">
                        <img class="author-profile-pic" src="<?php echo get_the_post_thumbnail_url($block6_fields['authors'][0]['author'] -> ID)?>" alt="">
                    </div>
                    <a class="mb-4" href="<?php echo get_permalink($block6_fields['authors'][0]['author'] -> ID); ?>">
                        <?php echo get_the_title($block6_fields['authors'][0]['author'] -> ID); ?>
                    </a>
                    <a href="<?php echo get_the_permalink($block6_fields['authors'][0]['post']); ?>">
                        <h5>
                            <?php echo get_the_title($block6_fields['authors'][0]['post']); ?>
                        </h5>
                    </a>
                </div>
            </div>
            <div class="col-md-4 col-12 horizontal-saperator-left-side">
                <div class="text-center">
                    <div class="d-flex justify-content-center align-items-center w-100 mb-4">
                        <img class="author-profile-pic" src="<?php echo get_the_post_thumbnail_url($block6_fields['authors'][1]['author'] -> ID)?>" alt="">
                    </div>
                    <a class="mb-4" href="<?php echo get_permalink($block6_fields['authors'][1]['author'] -> ID); ?>">
                        <?php echo get_the_title($block6_fields['authors'][1]['author'] -> ID); ?>
                    </a>
                    <a href="<?php echo get_the_permalink($block6_fields['authors'][1]['post']); ?>">
                        <h5>
                            <?php echo get_the_title($block6_fields['authors'][1]['post']); ?>
                        </h5>
                    </a>
                </div>
            </div>
            <div class="col-md-4 col-12">
                <div class="text-center">
                    <div class="d-flex justify-content-center align-items-center w-100 mb-4">
                        <img class="author-profile-pic" src="<?php echo get_the_post_thumbnail_url($block6_fields['authors'][2]['author'] -> ID)?>" alt="">
                    </div>
                    <a class="mb-4" href="<?php echo get_permalink($block6_fields['authors'][2]['author'] -> ID); ?>">
                        <?php echo get_the_title($block6_fields['authors'][2]['author'] -> ID); ?>
                    </a>
                    <a href="<?php echo get_the_permalink($block6_fields['authors'][2]['post']); ?>">
                        <h5>
                            <?php echo get_the_title($block6_fields['authors'][2]['post']); ?>
                        </h5>
                    </a>
                </div>
            </div>
        </div>
        <div class="row d-md-none d-flex">
            <div class="col-md-4 col-12 horizontal-saperator-left-side">
                <div class="text-right">
                    <div class="d-flex justify-content-between align-items-center w-100 mb-4">
                        <div class="d-block mx-3">
                            <a class="mb-4" href="<?php echo get_permalink($block6_fields['authors'][0]['author'] -> ID); ?>">
                                <?php echo get_the_title($block6_fields['authors'][0]['author'] -> ID); ?>
                            </a>
                            <a href="<?php echo get_the_permalink($block6_fields['authors'][0]['post']); ?>">
                                <h5 class="d-block">
                                    <?php echo get_the_title($block6_fields['authors'][0]['post']); ?>
                                </h5>
                            </a>
                        </div>
                        <img class="author-profile-pic" src="<?php echo get_the_post_thumbnail_url($block6_fields['authors'][0]['author'] -> ID)?>" alt="">
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-12 horizontal-saperator-left-side">
                <div class="text-right">
                    <div class="d-flex justify-content-between align-items-center w-100 my-4">
                        <div class="d-block mx-3">
                            <a class="mb-4" href="<?php echo get_permalink($block6_fields['authors'][1]['author'] -> ID); ?>">
                                <?php echo get_the_title($block6_fields['authors'][1]['author'] -> ID); ?>
                            </a>
                            <a href="<?php echo get_the_permalink($block6_fields['authors'][1]['post']); ?>">
                                <h5 class="d-block">
                                    <?php echo get_the_title($block6_fields['authors'][1]['post']); ?>
                                </h5>
                            </a>
                        </div>
                        <img class="author-profile-pic" src="<?php echo get_the_post_thumbnail_url($block6_fields['authors'][1]['author'] -> ID)?>" alt="">
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-12">
                <div class="text-right">
                    <div class="d-flex justify-content-between align-items-center w-100 my-4">
                        <div class="d-block mx-3">
                            <a class="mb-4" href="<?php echo get_permalink($block6_fields['authors'][2]['author'] -> ID); ?>">
                                <?php echo get_the_title($block6_fields['authors'][2]['author'] -> ID); ?>
                            </a>
                            <a href="<?php echo get_the_permalink($block6_fields['authors'][2]['post']); ?>">
                                <h5 class="d-block">
                                    <?php echo get_the_title($block6_fields['authors'][2]['post']); ?>
                                </h5>
                            </a>
                        </div>
                        <img class="author-profile-pic" src="<?php echo get_the_post_thumbnail_url($block6_fields['authors'][2]['author'] -> ID)?>" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>