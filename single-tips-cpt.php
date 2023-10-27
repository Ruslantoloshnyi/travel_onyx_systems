<?php get_header(); ?>

<main>
    <div class="container">
        <div class="travel_posts">
            <?php
            while (have_posts()) :
                the_post();
            ?>
                <div class="travel_posts_card">
                    <div class="travel_posts_card_container">
                        <div class="travel_posts_card__image">
                            <a href="#"> <?php the_post_thumbnail('custom-tips', ['class' => 'image-cov']) ?></a>
                        </div>
                        <div class="travel_posts_card__date"><?php echo get_the_date('F j, Y') ?></div>
                        <div class="travel_posts_card__title"><?php the_title(); ?></div>
                        <div class="travel_posts_card_bottom">
                            <div class="travel_posts_card_bottom_block">
                                <?php echo wp_get_attachment_image(get_field('tips_card_image_1')); ?>

                                <div>North Pole</div>
                            </div>
                            <div class="travel_posts_card_bottom_block">
                                <?php echo wp_get_attachment_image(get_field('tips_card_image_2')); ?>
                                <div><?php echo get_comments_number(); ?> Comment</div>
                            </div>
                            <div class="travel_posts_card_bottom_block">
                                <?php echo wp_get_attachment_image(get_field('tips_card_image_3')); ?>
                                <div>4.8 of 5</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div><?php the_content(); ?></div>
            <?php endwhile; ?>
        </div>
    </div>
</main>
<?php
get_footer();
