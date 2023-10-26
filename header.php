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
							<img src="./assets/image/Logo.png" alt="">
						</div>
						<div class="header__burger">
							<span></span>
						</div>
						<nav class="header__menu">
							<ul class="header__list">
								<li><a class="header__link" href="">Home</a></li>
								<li><a class="header__link" href="">About us</a></li>
								<li><a class="header__link" href="">Destination</a></li>
								<li><a class="header__link" href="">Tips</a></li>
								<li><a class="header__link" href="">Contact</a></li>
							</ul>
						</nav>
					</div>
					<div class="header_content">
						<h3>THE COUNTER: <span>70</span> Countries <span>1036</span> Cities</h3>
						<h1>Leave your mark on all
							over the world</h1>
						<div class="header_content__button ">
							<a href="">Read More</a>
						</div>
					</div>
					<div class="header_bottom">
						<div class="header_bottom__text">Scroll Down to Continue</div>
						<img src="./assets/image/header-arrow.png" alt="">
					</div>
				</div>
			</div>
		</div>
	</header>