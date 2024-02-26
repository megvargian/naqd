<?php
/**
 * Block3 Block Template
 */
$block3_fields = get_fields();
?>
<section style="background-color: #FD4400;">
    <div class="container">
        <div class="row">
            <div class="col-12 mb-md-5 mb-sm-4 mb-2">
                <h3><?php echo $block3_fields['title']; ?></h3>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="w-100">
					<?php echo do_shortcode('[contact-form-7 id="4b7188c" title="Subscription"]') ?>
                </div>
            </div>
        </div>
    </div>
</section>