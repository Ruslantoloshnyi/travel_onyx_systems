<?php

/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package Travel_onyx_systems
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function tos_body_classes($classes)
{
	// Adds a class of hfeed to non-singular pages.
	if (!is_singular())
	{
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if (!is_active_sidebar('sidebar-1'))
	{
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter('body_class', 'tos_body_classes');

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function tos_pingback_header()
{
	if (is_singular() && pings_open())
	{
		printf('<link rel="pingback" href="%s">', esc_url(get_bloginfo('pingback_url')));
	}
}
add_action('wp_head', 'tos_pingback_header');

/**
 * Add customizer fields.
 */
function tos_customize_custom_register($wp_customize)
{
	// header -----------------------------------------------
	$wp_customize->add_section('tos_custom_head_section', array(
		'title' => __('Header content'),
		'priority' => 30,
	));

	$wp_customize->add_setting('tos_custom_head_code', array(
		'default' => '',
		'sanitize_callback' => 'wp_kses_post',
	));

	$wp_customize->add_control('tos_custom_head_code', array(
		'type' => 'textarea',
		'section' => 'tos_custom_head_section',
		'label' => __('HTML', 'travel-onyx-systems'),
		'description' => __('add heading', 'travel-onyx-systems'),
	));

	$wp_customize->add_setting('tos_custom_subhead_code', array(
		'default' => '',
		'sanitize_callback' => 'wp_kses_post',
	));

	$wp_customize->add_control('tos_custom_subhead_code', array(
		'type' => 'textarea',
		'section' => 'tos_custom_head_section',
		'label' => __('HTML_2', 'travel-onyx-systems'),
		'description' => __('add subhead', 'travel-onyx-systems'),
	));

	$wp_customize->add_setting('tos_custom_button_code', array(
		'default' => '',
		'sanitize_callback' => 'wp_kses_post',
	));

	$wp_customize->add_control('tos_custom_button_code', array(
		'type' => 'text',
		'section' => 'tos_custom_head_section',
		'label' => __('Button', 'travel-onyx-systems'),
		'description' => __('add button text', 'travel-onyx-systems'),
	));

	$wp_customize->add_setting('tos_custom_button_link', array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw',
	));

	$wp_customize->add_control('tos_custom_button_link', array(
		'type' => 'url',
		'section' => 'tos_custom_head_section',
		'label' => __('Header button link', 'travel-onyx-systems'),
	));

	$wp_customize->add_setting('tos_custom_bottom_code', array(
		'default' => '',
		'sanitize_callback' => 'wp_kses_post',
	));

	$wp_customize->add_control('tos_custom_bottom_code', array(
		'type' => 'text',
		'section' => 'tos_custom_head_section',
		'label' => __('Bottom text', 'travel-onyx-systems'),
		'description' => __('add bottom text', 'travel-onyx-systems'),
	));

	$wp_customize->add_setting('tos_custom_image', array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw',
	));

	$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'tos_custom_image', array(
		'section' => 'tos_custom_head_section',
		'label'   => __('Image', 'travel-onyx-systems'),
		'description' => __('Download image', 'travel-onyx-systems'),
	)));

	//footer -----------------------------------------
	$wp_customize->add_section('tos_custom_footer_section', array(
		'title' => __('Footer'),
		'priority' => 31,
	));

	$wp_customize->add_setting('tos_custom_footer_image', array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw',
	));

	$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'tos_custom_footer_image', array(
		'section' => 'tos_custom_footer_section',
		'label'   => __('Image', 'travel-onyx-systems'),
		'description' => __('Download image', 'travel-onyx-systems'),
	)));

	$wp_customize->add_setting('tos_custom_social_footer_image', array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw',
	));

	$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'tos_custom_social_footer_image', array(
		'section' => 'tos_custom_footer_section',
		'label'   => __('Image', 'travel-onyx-systems'),
		'description' => __('Download social image', 'travel-onyx-systems'),
	)));

	$wp_customize->add_setting('footer_social_link', array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw',
	));

	$wp_customize->add_control('footer_social_link', array(
		'type' => 'url',
		'section' => 'tos_custom_footer_section',
		'label' => __('Footer social Link', 'travel-onyx-systems'),
	));

	$wp_customize->add_setting('footer_copyright', array(
		'default' => '',
		'sanitize_callback' => 'wp_kses_post',
	));

	$wp_customize->add_control('footer_copyright', array(
		'type' => 'textarea',
		'description' => __('add copyright text', 'travel-onyx-systems'),
		'section' => 'tos_custom_footer_section',
		'label' => __('Footer copyright', 'travel-onyx-systems'),
	));
}
add_action('customize_register', 'tos_customize_custom_register');

/**
 * Add custom image size.
 */
add_image_size('custom-slider', 400, 270, true);
add_image_size('custom-recent', 100, 80, true);
add_image_size('custom-posts', 780, 450, true);
add_image_size('custom-insta', 261, 296, true);
add_image_size('custom-social', 32, 32, true);
add_image_size('custom-destination', 380, 360, true);
add_image_size('custom-tips', 374, 221, true);

/**
 * Add option page.
 */
if (function_exists('acf_add_options_page'))
{

	acf_add_options_page(array(
		'page_title'    => 'Global field',
		'menu_title'    => 'Global fields',
		'menu_slug'     => 'theme-general-settings',
		'capability'    => 'edit_posts',
		'redirect'      => false
	));
};

/**
 * Add a destination post type.
 */
function tos_destination_post_type()
{
	$args = array(
		'public' => true,
		'show_in_rest' => true,
		'label'  => 'Destination',
		'supports' => array('title', 'editor', 'thumbnail', 'comments',),
		'has_archive' => true,
		'menu_position' => 5,
		'taxonomies' => array('post_tag'),

	);
	register_post_type('dest-cpt', $args);
}
add_action('init', 'tos_destination_post_type');

/**
 * Add a tips post type.
 */
function tos_tips_post_type()
{
	$args = array(
		'public' => true,
		'show_in_rest' => true,
		'label'  => 'Tips',
		'supports' => array('title', 'editor', 'thumbnail'),
		'has_archive' => true,
		'menu_position' => 5,

	);
	register_post_type('tips-cpt', $args);
}
add_action('init', 'tos_tips_post_type');

/**
 * Registed location taxonomy.
 */
function tos_create_location_taxonomy()
{
	$labels = array(
		'name'              => 'Location',
		'singular_name'     => 'location',
		'search_items'      => 'Search location',
		'all_items'         => 'All locations',
		'edit_item'         => 'Edit location',
		'update_item'       => 'Update location',
		'add_new_item'      => 'Add new location',
		'new_item_name'     => 'new location name',
		'menu_name'         => 'Location'
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array('slug' => 'local')
	);

	register_taxonomy('local', 'dest-cpt', $args);
}
add_action('init', 'tos_create_location_taxonomy');

/**
 * Registed widgets.
 */
function custom_theme_widgets_init()
{
	register_sidebar(array(
		'name' => __('Footer Content First', 'travel-onyx-systems'),
		'id' => 'footer-content-first',
		'description' => __('Widgets in this area will be shown in the first column of the footer.', 'travel-onyx-systems'),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '',
		'after_title' => '',
	));

	register_sidebar(array(
		'name' => __('Footer Content Second', 'travel-onyx-systems'),
		'id' => 'footer-content-second',
		'description' => __('Widgets in this area will be shown in the second column of the footer.', 'travel-onyx-systems'),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
	));

	register_sidebar(array(
		'name' => __('Footer Content Third', 'travel-onyx-systems'),
		'id' => 'footer-content-third',
		'description' => __('Widgets in this area will be shown in the third column of the footer.', 'travel-onyx-systems'),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
	));

	register_sidebar(array(
		'name' => __('Footer Content Fourth', 'travel-onyx-systems'),
		'id' => 'footer-content-fourth',
		'description' => __('Widgets in this area will be shown in the fourth column of the footer.', 'travel-onyx-systems'),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
	));
}
add_action('widgets_init', 'custom_theme_widgets_init');

/**
 * change the_excerpt settings
 */
add_filter('excerpt_more', function ($more)
{
	return ' ...';
});
