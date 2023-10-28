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
					<p>We are location independent bloggers, digital influencers, small group tour organizers and
						world
						travelers with a
						serious passion for the sun, the sea and adventure.
					</p>
					<p>Eight years and 60-something countries later and we are still on the road.</p>
				</div>
				<div>
					<p>Add: 221B John hope
						Street, Lekki, Lagos,
						Nigeria.</p>
					<p>T: +234 706 507 8544</p>
					<p>E: info@redexplorers.com</p>
					<p>W: www. redexplorers.com</p>
				</div>
				<div>
					<p>My List</p>
					<p>My Requests</p>
					<p>My Credits</p>
					<p>My Info</p>
					<p>Contact</p>
				</div>
				<div>
					<p>Travel</p>
					<p>Why Travel</p>
					<p>Become a Traveler</p>
					<p>How Its Works</p>
					<p>Traveling FAQs</p>
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
					© 2021 RedExplorers. All rights reserved | Terms |
					Privacy |
					Site Map
				</div>
			</div>
		</div>
	</div>
</footer>

<?php wp_footer(); ?>

</body>

</html>