<?php

/**
 * WP Bootstrap Starter functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WP_Bootstrap_Starter
 */

if (!function_exists('wp_bootstrap_starter_setup')) :
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function wp_bootstrap_starter_setup()
    {
        /*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on WP Bootstrap Starter, use a find and replace
	 * to change 'wp-bootstrap-starter' to the name of your theme in all the template files.
	 */
        load_theme_textdomain('wp-bootstrap-starter', get_template_directory() . '/languages');

        // Add default posts and comments RSS feed links to head.
        add_theme_support('automatic-feed-links');

        /*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
        add_theme_support('title-tag');

        /*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
        add_theme_support('post-thumbnails');

        // This theme uses wp_nav_menu() in one location.
        register_nav_menus(array(
            'primary' => esc_html__('Primary', 'wp-bootstrap-starter'),
        ));

        /*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
        add_theme_support('html5', array(
            'comment-form',
            'comment-list',
            'caption',
        ));

        // Set up the WordPress core custom background feature.
        add_theme_support('custom-background', apply_filters('wp_bootstrap_starter_custom_background_args', array(
            'default-color' => 'ffffff',
            'default-image' => '',
        )));

        // Add theme support for selective refresh for widgets.
        add_theme_support('customize-selective-refresh-widgets');

        function wp_boostrap_starter_add_editor_styles()
        {
            add_editor_style('custom-editor-style.css');
        }
        add_action('admin_init', 'wp_boostrap_starter_add_editor_styles');
    }
endif;
add_action('after_setup_theme', 'wp_bootstrap_starter_setup');


/**
 * Add Welcome message to dashboard
 */
function wp_bootstrap_starter_reminder()
{
    $theme_page_url = 'https://afterimagedesigns.com/wp-bootstrap-starter/?dashboard=1';

    if (!get_option('triggered_welcomet')) {
        $message = sprintf(
            __('Welcome to WP Bootstrap Starter Theme! Before diving in to your new theme, please visit the <a style="color: #fff; font-weight: bold;" href="%1$s" target="_blank">theme\'s</a> page for access to dozens of tips and in-depth tutorials.', 'wp-bootstrap-starter'),
            esc_url($theme_page_url)
        );

        printf(
            '<div class="notice is-dismissible" style="background-color: #6C2EB9; color: #fff; border-left: none;">
                        <p>%1$s</p>
                    </div>',
            $message
        );
        add_option('triggered_welcomet', '1', '', 'yes');
    }
}
add_action('admin_notices', 'wp_bootstrap_starter_reminder');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function wp_bootstrap_starter_content_width()
{
    $GLOBALS['content_width'] = apply_filters('wp_bootstrap_starter_content_width', 1170);
}
add_action('after_setup_theme', 'wp_bootstrap_starter_content_width', 0);


/**
 * Enqueue scripts and styles.
 */
function wp_bootstrap_starter_scripts()
{
    // load bootstrap css
    wp_enqueue_style('wp-bootstrap-starter-bootstrap-css', get_template_directory_uri() . '/inc/assets/css/bootstrap.min.css');

    // fontawesome cdn
    wp_enqueue_style('wp-bootstrap-pro-fontawesome-cdn', get_template_directory_uri() . '/inc/assets/css/font-awsome.css');
    // load bootstrap css

    // load WP Bootstrap Starter styles
    wp_enqueue_style('wp-bootstrap-starter-style', get_stylesheet_uri());

    // ============= Load Custom stylesheets =============

    wp_enqueue_style('swiper', get_template_directory_uri() . '/inc/assets/css/swiper.min.css');

    if (is_front_page()) {
        // wp_enqueue_style( 'animate_headlines', get_template_directory_uri() . '/inc/assets/css/animate_headlines.css' );
    }
    $current_language = apply_filters('wpml_current_language', NULL);
    if($current_language === 'ar'){
        wp_enqueue_style('custom_style_rtl', get_template_directory_uri() . '/inc/assets/css/rtl.css', array(), '1.39');
        wp_enqueue_style('responsive_style_rtl', get_template_directory_uri() . '/inc/assets/css/responsive_rtl.css', array(), '1.41');

    } else{
        wp_enqueue_style('custom_style', get_template_directory_uri() . '/inc/assets/css/custom_style.css', array(), '1.39');
        wp_enqueue_style('responsive_style', get_template_directory_uri() . '/inc/assets/css/responsive.css', array(), '1.41');
    }

    wp_enqueue_script('jquery');

    // Internet Explorer HTML5 support
    wp_enqueue_script('html5hiv', get_template_directory_uri() . '/inc/assets/js/html5.js', array(), '3.7.0', false);
    wp_script_add_data('html5hiv', 'conditional', 'lt IE 9');

    // load bootstrap js
    wp_enqueue_script('wp-bootstrap-starter-popper', get_template_directory_uri() . '/inc/assets/js/popper.min.js', array(), '', false);
    wp_enqueue_script('wp-bootstrap-starter-bootstrapjs', get_template_directory_uri() . '/inc/assets/js/bootstrap.min.js', array(), '', false);

    // ========================================================================
    // Add all custom js libraries here
	wp_enqueue_script('swiper', get_template_directory_uri() . '/inc/assets/js/swiper.min.js', array(), '1', false);

    // query loader
    // wp_enqueue_script('queryloader2-js', get_template_directory_uri() . '/inc/assets/js/queryloader2.min.js', array(), '1', true);
    // jquery visibale
    // wp_enqueue_script('queryvisible-js', get_template_directory_uri() . '/inc/assets/js/jquery.visible.js', array(), '1', true);
    // wp_enqueue_script('wp-bootstrap-starter-themejs', get_template_directory_uri() . '/inc/assets/js/theme-script.js', array(), '', true );
    wp_enqueue_script('wp-bootstrap-starter-skip-link-focus-fix', get_template_directory_uri() . '/inc/assets/js/skip-link-focus-fix.min.js', array(), '20151215', true);
}
add_action('wp_enqueue_scripts', 'wp_bootstrap_starter_scripts');


function wp_bootstrap_starter_password_form()
{
    global $post;
    $label = 'pwbox-' . (empty($post->ID) ? rand() : $post->ID);
    $o = '<form action="' . esc_url(site_url('wp-login.php?action=postpass', 'login_post')) . '" method="post">
    <div class="d-block mb-3">' . __("To view this protected post, enter the password below:", "wp-bootstrap-starter") . '</div>
    <div class="form-group form-inline"><label for="' . $label . '" class="mr-2">' . __("Password:", "wp-bootstrap-starter") . ' </label><input name="post_password" id="' . $label . '" type="password" size="20" maxlength="20" class="form-control mr-2" /> <input type="submit" name="Submit" value="' . esc_attr__("Submit", "wp-bootstrap-starter") . '" class="btn btn-primary"/></div>
    </form>';
    return $o;
}
add_filter('the_password_form', 'wp_bootstrap_starter_password_form');

function my_myme_types($mime_types)
{
    $mime_types['svg'] = 'image/svg+xml'; //Adding svg extension
    return $mime_types;
}
add_filter('upload_mimes', 'my_myme_types', 1, 1);



// PHP Check if time is between two times regardless of date
function TimeIsBetweenTwoTimes($from, $till, $input)
{
    $f = DateTime::createFromFormat('H:i', $from);
    $t = DateTime::createFromFormat('H:i', $till);
    $i = DateTime::createFromFormat('H:i', $input);
    if ($f > $t) $t->modify('+1 day');
    return ($f <= $i && $i <= $t) || ($f <= $i->modify('+1 day') && $i <= $t);
}
function wpb_custom_new_menu()
{
    register_nav_menus(array(
        'main-menu' => __('Main-Menu'),
    ));
}
add_action('init', 'wpb_custom_new_menu');
function add_additional_class_on_li($classes, $item, $args)
{
    if (isset($args->add_li_class)) {
        $classes[] = $args->add_li_class;
    }
    return $classes;
}
add_filter('nav_menu_css_class', 'add_additional_class_on_li', 1, 3);
function overrideSubmenuClasses($classes)
{
    $classes[] = 'dropdown-menu';
    $classes[] = '';

    return $classes;
}
add_action('nav_menu_submenu_css_class', 'overrideSubmenuClasses');

if (function_exists('acf_add_options_page')) {
    acf_add_options_page(
        array(
            'page_title' => 'Website Settings',
            'menu_title' => 'Website Settings',
            'menu_slug' => 'website-settings',
            'capabality' => 'edit_posts'
        )
    );
}

add_image_size('main_homepage_img', 1903, 690, true);
add_image_size('main_img_company_services', 1903, 300, true);
add_image_size('services_img', 656, 580, true);
add_image_size('footer_img', 1903, 340, true);


// Add backend styles for Gutenberg.
add_action('enqueue_block_editor_assets', 'gutenberg_editor_assets');

function gutenberg_editor_assets()
{
    // Load the theme styles within Gutenberg.
    wp_enqueue_style('my-gutenberg-editor-styles', get_theme_file_uri('/assets/gutenberg-editor-styles.css'), FALSE);
}
add_action('acf/init', 'my_acf_init_block_types');
function my_acf_init_block_types()
{
    // Check function exists.
    if (function_exists('acf_register_block_type')) {
        // register a testimonial block.
        acf_register_block_type(
            array(
                'name'              => 'Block1',
                'title'             => __('Block1'),
                'description'       => __('This is the first Block of Homepage'),
                'render_template'   => 'blocks/Homepage_Blocks/block_1.php',
                'category'          => 'formatting',
                'icon'              => 'admin-comments',
                'keywords'          => array('testimonial', 'quote'),
            )
        );
        acf_register_block_type(
            array(
                'name'              => 'Block2',
                'title'             => __('Block2'),
                'description'       => __('This is the second Block of Homepage'),
                'render_template'   => 'blocks/Homepage_Blocks/block_2.php',
                'category'          => 'formatting',
                'icon'              => 'admin-comments',
                'keywords'          => array('testimonial', 'quote'),
            )
        );
        acf_register_block_type(
            array(
                'name'              => 'Block3',
                'title'             => __('Block3'),
                'description'       => __('This is the third Block of Homepage'),
                'render_template'   => 'blocks/Homepage_Blocks/block_3.php',
                'category'          => 'formatting',
                'icon'              => 'admin-comments',
                'keywords'          => array('testimonial', 'quote'),
            )
        );
        acf_register_block_type(
            array(
                'name'              => 'Block4',
                'title'             => __('Block4'),
                'description'       => __('This is the fourth Block of Homepage'),
                'render_template'   => 'blocks/Homepage_Blocks/block_4.php',
                'category'          => 'formatting',
                'icon'              => 'admin-comments',
                'keywords'          => array('testimonial', 'quote'),
            )
        );
        acf_register_block_type(
            array(
                'name'              => 'Block5',
                'title'             => __('Block5'),
                'description'       => __('This is the fifth Block of Homepage'),
                'render_template'   => 'blocks/Homepage_Blocks/block_5.php',
                'category'          => 'formatting',
                'icon'              => 'admin-comments',
                'keywords'          => array('testimonial', 'quote'),
            )
        );
        acf_register_block_type(
            array(
                'name'              => 'Block6',
                'title'             => __('Block6'),
                'description'       => __('This is the sixth Block of Homepage'),
                'render_template'   => 'blocks/Homepage_Blocks/block_6.php',
                'category'          => 'formatting',
                'icon'              => 'admin-comments',
                'keywords'          => array('testimonial', 'quote'),
            )
        );
        acf_register_block_type(
            array(
                'name'              => 'Block7',
                'title'             => __('Block7'),
                'description'       => __('This is the seventh Block of Homepage'),
                'render_template'   => 'blocks/Homepage_Blocks/block_7.php',
                'category'          => 'formatting',
                'icon'              => 'admin-comments',
                'keywords'          => array('testimonial', 'quote'),
            )
        );
        acf_register_block_type(
            array(
                'name'              => 'Block8',
                'title'             => __('Block8'),
                'description'       => __('This is the eighth Block of Homepage'),
                'render_template'   => 'blocks/Homepage_Blocks/block_8.php',
                'category'          => 'formatting',
                'icon'              => 'admin-comments',
                'keywords'          => array('testimonial', 'quote'),
            )
        );
        acf_register_block_type(
            array(
                'name'              => 'Block9',
                'title'             => __('Block9'),
                'description'       => __('This is the ninth Block of Homepage'),
                'render_template'   => 'blocks/Homepage_Blocks/block_9.php',
                'category'          => 'formatting',
                'icon'              => 'admin-comments',
                'keywords'          => array('testimonial', 'quote'),
            )
        );
        acf_register_block_type(
            array(
                'name'              => 'Block10',
                'title'             => __('Block10'),
                'description'       => __('This is the tenth Block of Homepage'),
                'render_template'   => 'blocks/Homepage_Blocks/block_10.php',
                'category'          => 'formatting',
                'icon'              => 'admin-comments',
                'keywords'          => array('testimonial', 'quote'),
            )
        );
        acf_register_block_type(
            array(
                'name'              => 'Block11',
                'title'             => __('Block11'),
                'description'       => __('This is the eleventh Block of Homepage'),
                'render_template'   => 'blocks/Homepage_Blocks/block_11.php',
                'category'          => 'formatting',
                'icon'              => 'admin-comments',
                'keywords'          => array('testimonial', 'quote'),
            )
        );
        acf_register_block_type(
            array(
                'name'              => 'video_Block2',
                'title'             => __('video_Block2'),
                'description'       => __('This is the second Block of videos'),
                'render_template'   => 'blocks/Videos_Blocks/videos_block_2.php',
                'category'          => 'formatting',
                'icon'              => 'admin-comments',
                'keywords'          => array('testimonial', 'quote'),
            )
        );
        acf_register_block_type(
            array(
                'name'              => 'video_Block3',
                'title'             => __('video_Block3'),
                'description'       => __('This is the second Block of videos'),
                'render_template'   => 'blocks/Videos_Blocks/videos_block_3.php',
                'category'          => 'formatting',
                'icon'              => 'admin-comments',
                'keywords'          => array('testimonial', 'quote'),
            )
        );
        acf_register_block_type(
            array(
                'name'              => 'about_us_block1',
                'title'             => __('about_us_block1'),
                'description'       => __('This is the first Block of About us'),
                'render_template'   => 'blocks/AboutUs_Blocks/about_us_block_1.php',
                'category'          => 'formatting',
                'icon'              => 'admin-comments',
                'keywords'          => array('testimonial', 'quote'),
            )
        );
    }
}

function load_more_posts() {
    $page = $_POST['page'];
    $category_id = $_POST['category_id'];

    $args = array(
        'cat' => $category_id,
        'post_type' => 'post',
        'posts_per_page' => 6,
        'paged' => $page,
        'order'             =>      'DSC',
        'orderby'           =>      'date',
    );

    $query = new WP_Query($args);
    $count = 0;
    if ($query->have_posts()) :
        while ($query->have_posts()) : $query->the_post();
                $post_custom_fields = get_fields(get_the_ID());
                $count++;
           ?>
            <div class=" col-xl-4 col-lg-6 col-md-6 col-12 mb-4 custom-class <?php echo $count % 3 != 0 ? 'horizontal-saperator-left-side' : ''?>">
                <div class="inner-post">
                    <a href="<?php echo get_permalink(get_the_ID()); ?>">
                       <div class="" style="position: relative;">
                            <?php if($post_custom_fields['images']['desktop_image'] == ''){ ?>
                                <img class="w-100 h-100" src="<?php echo get_template_directory_uri(); ?>/inc/assets/images/lebanese-economics.jpg" alt="<?php the_title(); ?>">
                            <?php } else { ?>
                                <?php if($post_custom_fields['youtube_url']){ ?>
                                    <div class="position-relative">
                                        <a href="<?php echo $post_custom_fields['youtube_url'] ?>">
                                            <img class="w-100 h-100 d-none d-lg-block image-darker" src="<?php echo $post_custom_fields['images']['desktop_image']; ?>" alt="<?php the_title(); ?>">
                                            <img class="w-100 h-100 d-none d-sm-block d-lg-none image-darker" src="<?php echo $post_custom_fields['images']['tablet_image']; ?>" alt="<?php the_title(); ?>">
                                            <img class="w-100 h-100 d-block d-sm-none image-darker" src="<?php echo $post_custom_fields['images']['mobile_image']; ?>" alt="<?php the_title(); ?>">
                                            <img class="play" src="<?php echo get_template_directory_uri(); ?>/inc/assets/images/play-48.ico" alt="play">
                                        </a>
                                    </div>
                                <?php } else{ ?>
                                    <a href="<?php echo get_permalink(get_the_ID()); ?>">
                                        <img class="w-100 h-100 d-none d-lg-block " src="<?php echo $post_custom_fields['images']['desktop_image']; ?>" alt="<?php the_title(); ?>">
                                        <img class="w-100 h-100 d-none d-sm-block d-lg-none" src="<?php echo $post_custom_fields['images']['tablet_image']; ?>" alt="<?php the_title(); ?>">
                                        <img class="w-100 h-100 d-block d-sm-none" src="<?php echo $post_custom_fields['images']['mobile_image']; ?>" alt="<?php the_title(); ?>">
                                    </a>
                                <?php } ?>
                            <?php } ?>
                            <?php if($post_custom_fields['author'] -> ID){ ?>
                                <div class="inner-author">
                                    <?php echo get_the_post_thumbnail($post_custom_fields['author'] -> ID); ?>
                                    <a href="<?php echo get_permalink($post_custom_fields['author'] -> ID); ?>">
                                        <?php echo get_the_title($post_custom_fields['author'] -> ID); ?>
                                    </a>
                                </div>
                            <?php } ?>
                       </div>
                    </a>
                    <a href="<?php echo get_permalink(get_the_ID()); ?>">
                        <h4 class="mt-10 mb-lg-0 mb-4"><?php the_title(); ?></h4>
                    </a>
                </div>
            </div>
           <?php
        endwhile;
    endif;
    wp_die();
}

add_action('wp_ajax_load_more_posts', 'load_more_posts');
add_action('wp_ajax_nopriv_load_more_posts', 'load_more_posts');

function load_more_tag_posts() {
    $page = $_POST['page'];
    $tag_id = $_POST['tag_id'];
    $args = array(
        'tag_id' => $tag_id,
        'post_type' => 'post',
        'posts_per_page' => 6,
        'paged' => $page,
        'order'             =>      'DSC',
        'orderby'           =>      'date',
    );

    $query = new WP_Query($args);
    if ($query->have_posts()) :
        while ($query->have_posts()) : $query->the_post();
                $post_custom_fields = get_fields(get_the_ID());
                $count++;
           ?>
            <div class=" col-xl-4 col-lg-6 col-md-6 col-12 mb-4 custom-class <?php echo $count % 3 != 0 ? 'horizontal-saperator-left-side' : ''?>">
                <div class="inner-post">
                    <a href="<?php echo get_permalink(get_the_ID()); ?>">
                       <div class="" style="position: relative;">
                            <?php if($post_custom_fields['images']['desktop_image'] == ''){ ?>
                                <img class="w-100 h-100" src="<?php echo get_template_directory_uri(); ?>/inc/assets/images/lebanese-economics.jpg" alt="<?php the_title(); ?>">
                            <?php } else { ?>
                                <?php if($post_custom_fields['youtube_url']){ ?>
                                    <div class="position-relative">
                                        <a href="<?php echo $post_custom_fields['youtube_url'] ?>">
                                            <img class="w-100 h-100 d-none d-lg-block image-darker" src="<?php echo $post_custom_fields['images']['desktop_image']; ?>" alt="<?php the_title(); ?>">
                                            <img class="w-100 h-100 d-none d-sm-block d-lg-none image-darker" src="<?php echo $post_custom_fields['images']['tablet_image']; ?>" alt="<?php the_title(); ?>">
                                            <img class="w-100 h-100 d-block d-sm-none image-darker" src="<?php echo $post_custom_fields['images']['mobile_image']; ?>" alt="<?php the_title(); ?>">
                                            <img class="play" src="<?php echo get_template_directory_uri(); ?>/inc/assets/images/play-48.ico" alt="play">
                                        </a>
                                    </div>
                                <?php } else{ ?>
                                    <a href="<?php echo get_permalink(get_the_ID()); ?>">
                                        <img class="w-100 h-100 d-none d-lg-block " src="<?php echo $post_custom_fields['images']['desktop_image']; ?>" alt="<?php the_title(); ?>">
                                        <img class="w-100 h-100 d-none d-sm-block d-lg-none" src="<?php echo $post_custom_fields['images']['tablet_image']; ?>" alt="<?php the_title(); ?>">
                                        <img class="w-100 h-100 d-block d-sm-none" src="<?php echo $post_custom_fields['images']['mobile_image']; ?>" alt="<?php the_title(); ?>">
                                    </a>
                                <?php } ?>
                            <?php } ?>
                            <?php if($post_custom_fields['author'] -> ID){ ?>
                                <div class="inner-author">
                                    <?php echo get_the_post_thumbnail($post_custom_fields['author'] -> ID); ?>
                                    <a href="<?php echo get_permalink($post_custom_fields['author'] -> ID); ?>">
                                        <?php echo get_the_title($post_custom_fields['author'] -> ID); ?>
                                    </a>
                                </div>
                            <?php } ?>
                       </div>
                    </a>
                    <a href="<?php echo get_permalink(get_the_ID()); ?>">
                        <h4 class="mt-10 mb-lg-0 mb-4"><?php the_title(); ?></h4>
                    </a>
                </div>
            </div>
           <?php
        endwhile;
    endif;
    wp_die();
}

add_action('wp_ajax_load_more_tag_posts', 'load_more_tag_posts');
add_action('wp_ajax_nopriv_load_more_tag_posts', 'load_more_tag_posts');

function load_more_posts_search() {
    $page = $_POST['page'];
    $search_name = $_POST['search_name'];

    $args = array(
        's' => $search_name,
        'post_type' => 'post',
        'posts_per_page' => 6,
        'paged' => $page,
        'order'             =>      'DSC',
        'orderby'           =>      'date',
    );

    $query = new WP_Query($args);
    $count = 0;
    if ($query->have_posts()) :
        while ($query->have_posts()) : $query->the_post();
                $post_custom_fields = get_fields(get_the_ID());
                $count++;
           ?>
            <div class=" col-xl-4 col-lg-6 col-md-6 col-12 mb-4 custom-class <?php echo $count % 3 != 0 ? 'horizontal-saperator-left-side' : ''?>">
                <div class="inner-post">
                    <a href="<?php echo get_permalink(get_the_ID()); ?>">
                       <div class="" style="position: relative;">
                            <?php if($post_custom_fields['images']['desktop_image'] == ''){ ?>
                                <img class="w-100 h-100" src="<?php echo get_template_directory_uri(); ?>/inc/assets/images/lebanese-economics.jpg" alt="<?php the_title(); ?>">
                            <?php } else { ?>
                            <img class="w-100 h-100 d-none d-lg-block " src="<?php echo $post_custom_fields['images']['desktop_image']; ?>" alt="<?php the_title(); ?>">
                            <img class="w-100 h-100 d-none d-sm-block d-lg-none" src="<?php echo $post_custom_fields['images']['tablet_image']; ?>" alt="<?php the_title(); ?>">
                            <img class="w-100 h-100 d-block d-sm-none" src="<?php echo $post_custom_fields['images']['mobile_image']; ?>" alt="<?php the_title(); ?>">
                            <?php } ?>
                            <?php if($post_custom_fields['author'] -> ID){ ?>
                                <div class="inner-author">
                                    <?php echo get_the_post_thumbnail($post_custom_fields['author'] -> ID); ?>
                                    <a href="<?php echo get_permalink($post_custom_fields['author'] -> ID); ?>">
                                        <?php echo get_the_title($post_custom_fields['author'] -> ID); ?>
                                    </a>
                                </div>
                            <?php } ?>
                       </div>
                    </a>
                    <a href="<?php echo get_permalink(get_the_ID()); ?>">
                        <h4 class="mt-10 mb-lg-0 mb-4"><?php the_title(); ?></h4>
                    </a>
                </div>
            </div>
           <?php
        endwhile;
    endif;
    wp_die();
}

add_action('wp_ajax_load_more_posts_search', 'load_more_posts_search');
add_action('wp_ajax_nopriv_load_more_posts_search', 'load_more_posts_search');

function load_more_author_posts() {

    $page = $_POST['page'];
    $posts = array(json_decode($_POST['nextChunck']));
    $count = 0;
    foreach($posts[0][$page] as $post_id){
        $post_custom_fields = get_fields($post_id);
        $count++;
?>
<div class="col-lg-4 col-md-6 col-12 mb-4 <?php echo $count % 3 != 0 ? 'horizontal-saperator-left-side' : ''?>">
    <div class="inner-post">
        <a href="<?php echo get_permalink($post_id); ?>">
            <div class="" style="position: relative;">
                <?php if($post_custom_fields['images']['desktop_image'] == ''){ ?>
                    <img class="w-100 h-100" src="<?php echo get_template_directory_uri(); ?>/inc/assets/images/lebanese-economics.jpg" alt="<?php the_title(); ?>">
                <?php } else { ?>
                    <img class="w-100 h-100 d-none d-lg-block " src="<?php echo $post_custom_fields['images']['desktop_image']; ?>" alt="<?php the_title(); ?>">
                    <img class="w-100 h-100 d-none d-sm-block d-lg-none" src="<?php echo $post_custom_fields['images']['tablet_image']; ?>" alt="<?php the_title(); ?>">
                    <img class="w-100 h-100 d-block d-sm-none" src="<?php echo $post_custom_fields['images']['mobile_image']; ?>" alt="<?php the_title(); ?>">
                <?php } ?>
                <?php if($post_custom_fields['author'] -> ID){ ?>
                    <div class="inner-author">
                        <?php echo get_the_post_thumbnail($post_custom_fields['author'] -> ID); ?>
                        <a href="<?php echo get_permalink($post_custom_fields['author'] -> ID); ?>">
                            <?php echo get_the_title($post_custom_fields['author'] -> ID); ?>
                        </a>
                    </div>
                <?php } ?>
            </div>
        </a>
        <a href="<?php echo get_permalink($post_id); ?>">
            <h4 class="mt-10 mb-lg-0 mb-4"><?php echo get_the_title($post_id); ?></h4>
        </a>
    </div>
</div>
    <?php
    }
    wp_die();
}

add_action('wp_ajax_load_more_author_posts', 'load_more_author_posts');
add_action('wp_ajax_nopriv_load_more_author_posts', 'load_more_author_posts');

function set_post_views($postID) {
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    }else{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}
//To keep the count accurate, lets get rid of prefetching
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);

function track_post_views ($post_id) {
    if ( !is_single() ) return;
    if ( empty ( $post_id) ) {
        global $post;
        $post_id = $post->ID;
    }
    set_post_views($post_id);
}
add_action( 'wp_head', 'track_post_views');

function get_post_views($postID){
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "0 View";
    }
    return $count.' Views';
}