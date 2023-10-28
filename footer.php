<?php

/**
 * The template for displaying the footer
 * 
 * @package Travel_onyx_systems
 */

?>

<footer>
	<div class="footer_menu_background">
		<div class="container">
			<div class="footer_menu">
				<div class="footer_menu__logo">
					<?php the_custom_logo(); ?>
				</div>
				<nav class="footer_menu__nav">
					<?php
					wp_nav_menu([
						'theme_location'  => 'footer-menu',
						'menu'            => '',
						'container'       => 'ul',
						'container_class' => '',
						'container_id'    => '',
					]);
					?>
				</nav>
			</div>
		</div>
	</div>
	<div class="footer_background">
		<div class="container">
			<div class="footer_content">
				<div class="footer_content_first">
					<?php dynamic_sidebar('footer-content-first'); ?>
				</div>
				<div class="footer_content_second">
					<?php dynamic_sidebar('footer-content-second'); ?>
				</div>
				<div class="footer_content_second">
					<?php dynamic_sidebar('footer-content-third'); ?>
				</div>
				<div class="footer_content_second">
					<?php dynamic_sidebar('footer-content-fourth'); ?>
				</div>
			</div>
			<div class="footer_bottom">
				<div class="footer_bottom__logo">
					<?php
					$image_url = get_theme_mod('tos_custom_footer_image', '');
					if ($image_url)
					{
						echo '<img src="' . esc_url($image_url) . '">';
					}
					?>
				</div>
				<div class="footer_bottom__social">
					<?php
					$footer_link = get_theme_mod('footer_social_link', '');
					if (!empty($footer_link))
					{
						$link = esc_url($footer_link);
					}
					?>
					<a href="<?php echo $link; ?>">
						<?php
						$image_social = get_theme_mod('tos_custom_social_footer_image', '');
						if ($image_url)
						{
							echo '<img src="' . esc_url($image_social) . '">';
						}
						?>
					</a>

				</div>
				<div class="footer_bottom_copyright">
					<?php $copyright = get_theme_mod('footer_copyright', '');
					if ($copyright)
					{
						echo esc_html($copyright);
					}
					?>
				</div>
			</div>
		</div>
	</div>
</footer>

<?php wp_footer(); ?>

</body>

</html>