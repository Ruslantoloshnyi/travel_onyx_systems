<?php

/**
 * The header for our theme
 * 
 * @package Travel_onyx_systems
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>

	<header class="header">
		<div class="header_background">
			<div class="header_container">
				<div class="header">
					<div class="header__body">
						<div class="header__logo">
							<?php the_custom_logo(); ?>
						</div>
						<div class="header__burger">
							<span></span>
						</div>
						<nav class="header__menu">
							<?php
							wp_nav_menu([
								'theme_location'  => 'menu-1',
								'menu'            => '',
								'container'       => 'ul',
								'container_class' => '',
								'container_id'    => '',
								'menu_class'      => 'header__list',
							]);
							?>
						</nav>
					</div>
					<div class="header_content">
						<h3><?php echo get_theme_mod('tos_custom_head_code', ''); ?>
						</h3>
						<h1><?php echo get_theme_mod('tos_custom_subhead_code', ''); ?></h1>
						<div class="header_content__button ">
							<?php
							$header_link = get_theme_mod('tos_custom_button_link', '');
							if (!empty($header_link))
							{
								$link = esc_url($header_link);
							}
							?>
							<a href="<?php echo $link; ?>"><?php echo get_theme_mod('tos_custom_button_code', ''); ?></a>
						</div>
					</div>
					<div class="header_bottom">
						<div class="header_bottom__text"><?php echo get_theme_mod('tos_custom_bottom_code', ''); ?></div>
						<?php
						$image_url = get_theme_mod('tos_custom_image', '');
						if ($image_url)
						{
							echo '<img src="' . esc_url($image_url) . '">';
						}
						?>
					</div>
				</div>
			</div>
		</div>
	</header>