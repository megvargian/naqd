<?php
/**
 * Block9 Block Template
 */
$block9_fields = get_fields();
$tab_1 = $block9_fields['tab_1'];
$tab_2 = $block9_fields['tab_2'];
$tab_1_custom_fields = get_fields($tab_1['main_post'] -> ID);
$tab_2_custom_fields = get_fields($tab_2['main_post'] -> ID);
$tab_1_get_title = get_the_title($tab_1['main_post'] -> ID);
$tab_2_get_title = get_the_title($tab_2['main_post'] -> ID);
?>
<section class="bg-black py-2">
    <div class="container">
        <div class="row">
            <div class="col-12 text-white">
                <ul class="nav nav-pills mb-3 justify-content-center" id="pills-tab" role="tablist">
                    <li class="cursor-pointer" role="presentation">
                        <h2 class="nav-link active" id="pills-tab1-tab" data-bs-toggle="pill" data-bs-target="#pills-tab1" type="button" role="tab" aria-controls="pills-tab1" aria-selected="true"><?php echo $tab_1['title']; ?></h2>
                    </li>
                    <span></span>
                    <li class="cursor-pointer" role="presentation">
                        <h2 class="nav-link" id="pills-tab2-tab" data-bs-toggle="pill" data-bs-target="#pills-tab2" type="button" role="tab" aria-controls="pills-tab2" aria-selected="false"><?php echo $tab_2['title']; ?></h2>
                    </li>
                </ul>
            </div>
        </div>
        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-tab1" role="tabpanel" aria-labelledby="pills-tab1-tab">
                <div class="row mt-5">
                    <div class="col-sm-6 col-12">
                        <?php if($tab_1_custom_fields['youtube_url']){ ?>
                            <div class="position-relative">
                                <a href="<?php echo $tab_1_custom_fields['youtube_url'] ?>">
                                    <img class="w-100 h-100 d-none d-lg-block image-darker" src="<?php echo $tab_1_custom_fields['images']['desktop_image']; ?>" alt="<?php echo $tab_2_get_title; ?>">
                                    <img class="w-100 h-100 d-none d-sm-block d-lg-none image-darker" src="<?php echo $tab_1_custom_fields['images']['tablet_image']; ?>" alt="<?php echo $tab_2_get_title; ?>">
                                    <img class="w-100 h-100 d-block d-sm-none image-darker" src="<?php echo $tab_1_custom_fields['images']['mobile_image']; ?>" alt="<?php echo $tab_2_get_title; ?>">
                                    <img class="play" src="<?php echo get_template_directory_uri(); ?>/inc/assets/images/play-48.ico" alt="play">
                                </a>
                            </div>
                        <?php } else{ ?>
                            <a href="<?php echo get_permalink($tab_1['main_post'] -> ID); ?>">
                                <img class="w-100 h-100 d-none d-lg-block " src="<?php echo $tab_1_custom_fields['images']['desktop_image']; ?>" alt="<?php echo $tab_2_get_title; ?>">
                                <img class="w-100 h-100 d-none d-sm-block d-lg-none" src="<?php echo $tab_1_custom_fields['images']['tablet_image']; ?>" alt="<?php echo $tab_2_get_title; ?>">
                                <img class="w-100 h-100 d-block d-sm-none" src="<?php echo $tab_1_custom_fields['images']['mobile_image']; ?>" alt="<?php echo $tab_2_get_title; ?>">
                            </a>
                        <?php } ?>
                    </div>
                    <div class="col-sm-6 col-12">
                        <a href="<?php echo get_permalink($tab_1['main_post'] -> ID); ?>">
                            <h2 class="text-white"><?php echo $tab_1['main_post'] -> post_title; ?></h2>
                        </a>
                        <p class="text-white d-sm-block d-none"><?php echo $tab_1['main_post'] -> post_excerpt; ?></p>
                        <a class="text-white" href="<?php echo get_permalink($tab_1_custom_fields['author'] -> ID); ?>">
                            <?php echo get_the_title($tab_1_custom_fields['author'] -> ID); ?>
                        </a>
                    </div>
                </div>
                <div class="row my-3 gx-0">
                    <div class="white_seperator w-100"></div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="swiper mainSwiper">
                            <div class="swiper-wrapper">
                                <?php foreach($tab_1['posts'] as $post) {
                                        $get_custom_field = get_fields($post['post'] -> ID);
                                        $get_title = get_the_title($post['post'] -> ID);
                                ?>
                                    <div class="swiper-slide">
                                        <?php if($get_custom_field['youtube_url']){ ?>
                                            <div class="position-relative">
                                                <a href="<?php echo $get_custom_field['youtube_url'] ?>">
                                                    <img class="w-100 h-100 d-none d-lg-block image-darker" src="<?php echo $get_custom_field['images']['desktop_image']; ?>" alt="<?php echo $get_title; ?>">
                                                    <img class="w-100 h-100 d-none d-sm-block d-lg-none image-darker" src="<?php echo $get_custom_field['images']['tablet_image']; ?>" alt="<?php echo $get_title; ?>">
                                                    <img class="w-100 h-100 d-block d-sm-none image-darker" src="<?php echo $get_custom_field['images']['mobile_image']; ?>" alt="<?php echo $get_title; ?>">
                                                    <img class="play" src="<?php echo get_template_directory_uri(); ?>/inc/assets/images/play-48.ico" alt="play">
                                                </a>
                                            </div>
                                        <?php } else{ ?>
                                            <a href="<?php echo get_permalink($post['post'] -> ID); ?>">
                                                <img class="w-100 h-100 main_image d-none d-lg-block" src="<?php echo $get_custom_field['images']['desktop_image']; ?>" alt="<?php echo $get_title; ?>">
                                                <img class="w-100 h-100 main_image d-none d-sm-block d-lg-none" src="<?php echo $get_custom_field['images']['tablet_image']; ?>" alt="<?php echo $get_title; ?>">
                                                <img class="w-100 h-100 main_image d-block d-sm-none" src="<?php echo $get_custom_field['images']['mobile_image']; ?>" alt="<?php echo $get_title; ?>">
                                            </a>
                                        <?php } ?>
                                    </div>
                                <?php } ?>
                            </div>
                            <div class="swiper-pagination"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="pills-tab2" role="tabpanel" aria-labelledby="pills-tab2-tab">
                <div class="row mt-5">
                    <div class="col-sm-6 col-12">
                        <?php if($tab_2_custom_fields['youtube_url']){ ?>
                            <div class="position-relative">
                                <a href="<?php echo $tab_2_custom_fields['youtube_url'] ?>">
                                    <img class="w-100 h-100 d-none d-lg-block image-darker" src="<?php echo $tab_2_custom_fields['images']['desktop_image']; ?>" alt="<?php echo $tab_2_get_title; ?>">
                                    <img class="w-100 h-100 d-none d-sm-block d-lg-none image-darker" src="<?php echo $tab_2_custom_fields['images']['tablet_image']; ?>" alt="<?php echo $tab_2_get_title; ?>">
                                    <img class="w-100 h-100 d-block d-sm-none image-darker" src="<?php echo $tab_2_custom_fields['images']['mobile_image']; ?>" alt="<?php echo $tab_2_get_title; ?>">
                                    <img class="play" src="<?php echo get_template_directory_uri(); ?>/inc/assets/images/play-48.ico" alt="play">
                                </a>
                            </div>
                        <?php } else{ ?>
                            <a href="<?php echo get_permalink($tab_2['main_post'] -> ID); ?>">
                                <img class="w-100 h-100 d-none d-lg-block " src="<?php echo $tab_2_custom_fields['images']['desktop_image']; ?>" alt="<?php echo $tab_2_get_title; ?>">
                                <img class="w-100 h-100 d-none d-sm-block d-lg-none" src="<?php echo $tab_2_custom_fields['images']['tablet_image']; ?>" alt="<?php echo $tab_2_get_title; ?>">
                                <img class="w-100 h-100 d-block d-sm-none" src="<?php echo $tab_2_custom_fields['images']['mobile_image']; ?>" alt="<?php echo $tab_2_get_title; ?>">
                            </a>
                        <?php } ?>
                    </div>
                    <div class="col-sm-6 col-12">
                        <a href="<?php echo get_permalink($tab_2['main_post'] -> ID); ?>">
                            <h2 class="text-white"><?php echo $tab_2['main_post'] -> post_title; ?></h2>
                        </a>
                        <p class="text-white d-sm-block d-none"><?php echo $tab_2['main_post'] -> post_excerpt; ?></p>
                        <a class="text-white" href="<?php echo get_permalink($tab_2_custom_fields['author'] -> ID); ?>">
                            <?php echo get_the_title($tab_2_custom_fields['author'] -> ID); ?>
                        </a>
                    </div>
                </div>
                <div class="row my-3 gx-0">
                    <div class="white_seperator w-100"></div>
                </div>
                <div class="row" style="align-items: center;">
                    <?php foreach($tab_2['programs'] as $program) {
                    ?>
                        <div class="col-4">
                            <a href="<?php echo $program['url']; ?>">
                                <img class="w-100 h-100 main_image " src="<?php echo $program['image']; ?>" alt="main_image">
                            </a>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</section>