<?php
/*
Template Name: Tips page
Template Post Type: page
*/

get_header('tips');
?>

<section>
    <div class="container">
        <div class="to_go travel-to-go">
            <h2 class="to_go__head travel-head">Maintaining your
                <span>privacy</span> during
                travels.
            </h2>
            <div class="to_go__text travel-text">Molestie aliquam sit lacus, sem vulputate sed magnis eu. Non nec at
                lobortis
                enim, feugiat fermentum lobortis gravida
                in. Tellus tincidunt amet, egestas sit. Feugiat faucibus eu magna dolor, turpis dignissim. Facilisis
                purus nibh vitae
                arcu. In tellus in amet nulla. Rutrum orci purus neque blandit cursus volutpat nisl morbi egestas.
                Adipiscing porta quis
                turpis ut nulla morbi. Varius id tempor, ipsum leo.
                vivamus rhoncus, augue risus. Ornare posuere scelerisque a at. Ut nunc neque at commodo nulla
                egestas eros. Ullamcorper
                a eu nulla diam nec pulvinar sit dui nec. Mauris sed vestibulum vitae massa. Ac morbi ut velit ac
                suscipit id. Venenatis
                scelerisque ut nam ultrices tortor integer. Odio ullamcorper rutrum <span>read more</span>
            </div>
        </div>
    </div>
</section>

<!-- travel posts section -->
<section>
    <div class="container">
        <div class="travel_posts">
            <?php
            $tips_posts_args = [
                'post_type' => 'tips-cpt',
                'posts_per_page' => -1,
                'orderby' => 'date',
                'order' => 'DESC'
            ];

            $tips_posts = new WP_Query($tips_posts_args);

            if ($tips_posts->have_posts()) :
                while ($tips_posts->have_posts()) : $tips_posts->the_post();
            ?>
                    <div class="travel_posts_card hvr-float">
                        <div class="travel_posts_card_container">
                            <div class="travel_posts_card__image">
                                <a href="<?php the_permalink(); ?>"> <?php the_post_thumbnail('custom-tips', ['class' => 'image-cov']) ?></a>
                            </div>
                            <div class="travel_posts_card__date"><?php echo get_the_date('F j, Y') ?></div>
                            <div class="travel_posts_card__title"><?php the_title(); ?></div>
                            <div class="travel_posts_card_bottom">
                                <div class="travel_posts_card_bottom_block">
                                    <img src="<?php echo get_template_directory_uri() . './assets/image/Marker-travel.png'; ?>" alt="marker">

                                    <div>North Pole</div>
                                </div>
                                <div class="travel_posts_card_bottom_block">
                                    <?php echo wp_get_attachment_image(get_field('tips_card_image_2')); ?>
                                    <img src="<?php echo get_template_directory_uri() . './assets/image/Communication-travel.png'; ?>" alt="marker">
                                </div>
                                <div class="travel_posts_card_bottom_block">
                                    <img src="<?php echo get_template_directory_uri() . './assets/image/Star-travel.png'; ?>" alt="marker">
                                    <div>4.8 of 5</div>
                                </div>
                            </div>
                        </div>
                    </div>
            <?php
                endwhile;
                wp_reset_postdata();
            endif;
            ?>
        </div>
    </div>
</section>

<?php
get_footer();
