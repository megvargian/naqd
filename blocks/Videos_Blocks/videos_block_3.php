<?php
/**
 * Video3 Block Block Template
 */
$block3_fields = get_fields();
$programs = $block3_fields['programs'];
?>
<section class="py-0 d-none d-lg-block">
    <div class="container">
        <div class="row saperator_black"></div>
    </div>
</section>

<section>
    <div class="container">
        <div class="row text-center pb-5">
            <a href="<?=$block3_fields['title_url'] ?>">
                <h2>
                    <?php echo $block3_fields['title']; ?>
                </h2>
            </a>
        </div>
        <div class="row">
            <div class="swiper programsSwiper">
                <div class="swiper-wrapper" style="align-items: center;">
                    <?php foreach($programs as $program) {
                    ?>
                        <div class="swiper-slide">
                            <a href="<?php echo $program['url']; ?>">
                                <img class="w-100 h-100 main_image " src="<?php echo $program['image']; ?>" alt="main_image">
                            </a>
                        </div>
                    <?php } ?>
                </div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </div>
</section>
