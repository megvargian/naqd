<?php
$social_media = get_fields('options');
?>
<div class="copyright_cont bg-black">
    <div class="container py-4">
        <div class="row">
            <div class="col-6 col-md-6">
                <div class="social_links">
                    <a href="<?php echo $social_media['facebook_url'] ?>">
                        <img src="<?php echo get_template_directory_uri() ?>/inc/assets/images/social_icons/facebook.svg" alt="facebook">
                    </a>
                    <a href="<?php echo $social_media['twitterx_url'] ?>">
                        <img src="<?php echo get_template_directory_uri() ?>/inc/assets/images/social_icons/twitter.svg" alt="twitter">
                    </a>
                    <a href="<?php echo $social_media['youtube_url'] ?>">
                        <img src="<?php echo get_template_directory_uri() ?>/inc/assets/images/social_icons/youtube.svg" alt="youtube">
                    </a>
                    <a href="<?php echo $social_media['instagram_url'] ?>">
                        <img src="<?php echo get_template_directory_uri() ?>/inc/assets/images/social_icons/insta.svg" alt="insta">
                    </a>
                    <a href="<?php echo $social_media['tiktok_url'] ?>">
                        <img src="<?php echo get_template_directory_uri() ?>/inc/assets/images/social_icons/tiktok.svg" alt="tiktok">
                    </a>
                    <a href="<?php echo $social_media['linkedin_url'] ?>">
                        <img src="<?php echo get_template_directory_uri() ?>/inc/assets/images/social_icons/linkedin.svg" alt="linkedin">
                    </a>
                </div>
            </div>
            <div class="col-6 col-md-6">
                <div class="copyright_text">
                </div>
            </div>
        </div>
    </div>
</div>