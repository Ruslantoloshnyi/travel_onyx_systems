<?php

/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Travel_onyx_systems
 */

?>







<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>single</title>
	<link rel="stylesheet" href="./assets/css/style.css">
	<link rel="stylesheet" href="./assets/css/slick.css">
</head>

<body>

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

</body>

</html>