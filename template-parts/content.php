<?php

/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Travel_onyx_systems
 */

?>

<div class="single front">
	<div class="front_content">
		<div class="grid_container">
			<div class="grid-item1">
				<div class="front_content_card shadow">
					<div class="front-card__image">
						<?php the_post_thumbnail('custom-posts', ['class' => 'image-cov']) ?>
						<div class="front-card__image-bottom">
							<div class="front-card__date"><?php echo get_the_date('F j, Y'); ?></div>
							<div class="front-card__head"><?php the_title(); ?></div>
							<div class="front-card__text"><?php the_content(); ?></div>
						</div>

					</div>
				</div>
			</div>
		</div>
	</div>
</div>