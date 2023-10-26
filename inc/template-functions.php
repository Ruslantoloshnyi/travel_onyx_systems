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
 * Add header customizer fields.
 */
function tos_customize_custom_register($wp_customize)
{
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
}
add_action('customize_register', 'tos_customize_custom_register');
