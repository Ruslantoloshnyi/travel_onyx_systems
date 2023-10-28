<?php
/*
Template Name: Home page
Template Post Type: page
*/
?>

<?php get_header(); ?>

<section>
    <div class="container">
        <div class="wrapper">
            <div class="front">
                <aside class="front_aside">
                    <div class="aside_wrapper">
                        <div class="front_aside_about front-card shadow">
                            <h3 class="front_aside_about__head front-head"><?php echo get_field('about_me_title'); ?></h3>
                            <div class="front_aside_about__image">
                                <?php echo wp_get_attachment_image(get_field('about_me_image'), 'full', false, ['class' => 'image-cov']); ?>
                            </div>
                            <div class="front_aside_about__text"><?php echo get_field('about_me_content'); ?></div>
                            <div class="front_aside_about__button">
                                <a class="button" href="<?php echo get_field('about_me_button_url'); ?>"><?php echo get_field('about_me_button_value'); ?></a>
                            </div>
                        </div>
                    </div>
                    <div class="aside_wrapper">
                        <div class="front_aside_categories front-card shadow">
                            <h3 class="front_aside_categories__head front-head">Categories</h3>
                            <div class="front_aside_categories_content">
                                <?php
                                $categories = get_categories();

                                if (!empty($categories)) :


                                    foreach ($categories as $category) :
                                        $category_link = get_category_link($category->cat_ID);
                                ?>

                                        <div>
                                            <a href="<?php echo esc_url($category_link); ?>">
                                                <div class="front_aside_categories_content__name"><?php echo $category->name; ?></div>
                                            </a>
                                            <div class="front_aside_categories_content__quantity">(<?php echo $category->count; ?>)</div>
                                        </div>
                                <?php

                                    endforeach;
                                endif;
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="aside_wrapper">
                        <div class="front_aside_posts__heading front-card front-head shadow">Popular Post</div>
                    </div>
                    <div class="aside_wrapper">
                        <div class="front_aside_slider carousel shadow">
                            <?php
                            $popular_posts_args = array(
                                'post_type' => 'post',
                                'posts_per_page' => 3,
                                'orderby' => 'comment_count',
                                'order' => 'DESC'
                            );

                            $popular_posts = new WP_Query($popular_posts_args);

                            if ($popular_posts->have_posts()) :
                                while ($popular_posts->have_posts()) : $popular_posts->the_post();
                            ?>
                                    <div class="front_aside_slider_block">
                                        <?php the_post_thumbnail('custom-slider', ['class' => 'image-cov']) ?>
                                        <div class="front_aside_slider_block__date"><?php echo get_the_date('F j, Y') ?></div>
                                        <div class="front_aside_slider_block__name"><?php the_title(); ?></div>
                                    </div>
                            <?php
                                endwhile;
                                wp_reset_postdata();
                            endif;
                            ?>
                        </div>
                    </div>
                    <div class="aside_wrapper">
                        <div class="front_aside_posts__heading front-card front-head shadow">Recent Posts</div>
                    </div>


                    <div class="aside_wrapper">
                        <?php
                        $recent_posts_args = array(
                            'post_type'      => 'post',
                            'posts_per_page' =>  3,
                            'orderby'        => 'date',
                            'order'          => 'DESC'
                        );

                        $recent_posts = new WP_Query($recent_posts_args);

                        if ($recent_posts->have_posts()) :
                            while ($recent_posts->have_posts()) : $recent_posts->the_post();
                        ?>
                                <div class="aside_wrapper">
                                    <div class="front_aside_recent">
                                        <?php the_post_thumbnail('custom-recent'); ?>
                                        <div class="front_aside_recent_content">
                                            <div class="front_aside_recent_content__date"><?php echo get_the_date('F j, Y') ?></div>
                                            <div class="front_aside_recent_content__text"><?php the_title(); ?></div>
                                        </div>
                                    </div>
                                </div>
                        <?php
                            endwhile;
                            wp_reset_postdata();
                        endif;
                        ?>
                    </div>
                    <div class="aside_wrapper">
                        <div class="front_aside_posts__heading front-card front-head shadow">Get In Tuch</div>
                    </div>
                    <div class="front_aside_social">
                        <a href="<?php echo get_field('social_facebook_link'); ?>">
                            <div class="front_aside_social_link">
                                <div class="front_aside_social_link__image">
                                    <?php echo wp_get_attachment_image(get_field('social_facebook_image'), 'custom-social'); ?>
                                </div>
                                <div class="front_aside_social_link__text"><?php echo get_field('social_facebook_text'); ?></div>
                            </div>
                        </a>
                        <a href="<?php echo get_field('social_twitter_link'); ?>">
                            <div class="front_aside_social_link twitter-color">
                                <div class="front_aside_social_link__image">
                                    <?php echo wp_get_attachment_image(get_field('social_twitter_image'), 'custom-social'); ?>
                                </div>
                                <div class="front_aside_social_link__text"><?php echo get_field('social_twitter_text'); ?></div>
                            </div>
                        </a>
                    </div>
                    <div class="front_aside_social">
                        <a href="<?php echo get_field('social_youtube_link'); ?>">
                            <div class="front_aside_social_link youtube-color">
                                <div class="front_aside_social_link__image">
                                    <?php echo wp_get_attachment_image(get_field('social_youtube_image'), 'custom-social'); ?>
                                </div>
                                <div class="front_aside_social_link__text"><?php echo get_field('social_youtube_text'); ?></div>
                            </div>
                        </a>
                        <a href="<?php echo get_field('social_instagramm_link'); ?>">
                            <div class="front_aside_social_link inst-color">
                                <div class="front_aside_social_link__image">
                                    <?php echo wp_get_attachment_image(get_field('social_instagramm_image'), 'custom-social'); ?>
                                </div>
                                <div class="front_aside_social_link__text"><?php echo get_field('social_instagramm_value'); ?></div>
                            </div>
                        </a>
                    </div>
                </aside>

                <div class="front_content">
                    <div class="grid-container">
                        <?php
                        $posts_args = array(
                            'post_type'      => 'post',
                            'posts_per_page' =>  12,
                            'orderby'        => 'date',
                            'order'          => 'DESC'
                        );

                        $posts = new WP_Query($posts_args);

                        if ($posts->have_posts()) :
                            $count = 0;
                            while ($posts->have_posts()) : $posts->the_post();
                                $count++;
                                $post_class = 'grid-item' . $count;

                                if ($count == 12)
                                {
                                    if (get_field('banner_image', 'option'))
                                    {
                                        echo '<div class="' . $post_class . '">
                                        <div class="front_content_banner">
                                        ' . wp_get_attachment_image(get_field('banner_image', 'option'), 'custom-posts', 'false', ['class' => 'image-cov']) . '
                                        <div class="front_content_banner__text">' . get_field('banner_text', 'option') . '</div>
                                        <div class="front_content_banner__button">
                                        <a class="button" href="' . get_field('banner_button_url', 'option') . '">' . get_field('banner_button_value', 'option') . '</a>
                                        </div>
                                        </div>
                                        </div>';
                                    }
                                }
                                else
                                {
                        ?>
                                    <div class="<?php echo $post_class; ?>">
                                        <div class="front_content_card shadow">
                                            <div class="front-card__image">
                                                <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('custom-posts', ['class' => 'image-cov']) ?></a>
                                                <div class="front-card__image-bottom">
                                                    <div class="front-card__date"><?php echo get_the_date('F j, Y'); ?></div>
                                                    <div class="front-card__head"><?php the_title(); ?></div>
                                                    <div class="front-card__text"><?php
                                                                                    if ($count == 1 or $count == 4 or $count == 9)
                                                                                    {
                                                                                        the_excerpt();
                                                                                    }
                                                                                    ?></div>
                                                </div>
                                                <div class="front-card_bottom">
                                                    <div class="front-card_bottom_place">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="19" height="25" viewBox="0 0 19 25" fill="none">
                                                            <path d="M8.41152 24.4956C1.31689 14.2105 0 13.1549 0 9.375C0 4.19731 4.19731 0 9.375 0C14.5527 0 18.75 4.19731 18.75 9.375C18.75 13.1549 17.4331 14.2105 10.3385 24.4956C9.8729 25.1682 8.87705 25.1681 8.41152 24.4956ZM9.375 13.2812C11.5324 13.2812 13.2812 11.5324 13.2812 9.375C13.2812 7.21763 11.5324 5.46875 9.375 5.46875C7.21763 5.46875 5.46875 7.21763 5.46875 9.375C5.46875 11.5324 7.21763 13.2812 9.375 13.2812Z" fill="#FFA500" />
                                                        </svg>
                                                        <?php
                                                        $tags = get_the_tags();
                                                        if ($tags)
                                                        {
                                                            echo '<div class="front-card_bottom_place__text">';
                                                            $tag_count = count($tags);
                                                            $i = 0;
                                                            foreach ($tags as $tag)
                                                            {
                                                                $i++;
                                                                echo $tag->name;
                                                                if ($i < $tag_count)
                                                                {
                                                                    echo ', ';
                                                                }
                                                            }
                                                            echo '</div>';
                                                        }
                                                        ?>
                                                    </div>
                                                    <div class="front-card_bottom_place">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="16" viewBox="0 0 24 16" fill="none">
                                                            <path d="M16.802 5.71453C16.802 2.55739 13.0418 0.000244141 8.40102 0.000244141C3.76026 0.000244141 0 2.55739 0 5.71453C0 6.93953 0.569492 8.0681 1.5348 9.00024C0.993582 10.0788 0.100974 10.936 0.088857 10.9467C0 11.0288 -0.0242337 11.1502 0.0282727 11.2574C0.0807791 11.3645 0.19387 11.4288 0.323116 11.4288C1.80137 11.4288 3.02518 10.9895 3.90567 10.536C5.20621 11.0967 6.74505 11.4288 8.40102 11.4288C13.0418 11.4288 16.802 8.87167 16.802 5.71453ZM21.7296 13.5717C22.6949 12.6431 23.2644 11.511 23.2644 10.286C23.2644 7.89667 21.1035 5.85024 18.042 4.99667C18.0784 5.23239 18.0945 5.47167 18.0945 5.71453C18.0945 9.49667 13.7446 12.5717 8.40102 12.5717C7.96481 12.5717 7.54072 12.5431 7.12067 12.5038C8.39294 14.5574 11.3818 16.0002 14.8633 16.0002C16.5193 16.0002 18.0582 15.6717 19.3587 15.1074C20.2392 15.561 21.463 16.0002 22.9413 16.0002C23.0705 16.0002 23.1876 15.9324 23.2361 15.8288C23.2886 15.7252 23.2644 15.6038 23.1755 15.5181C23.1634 15.5074 22.2708 14.6538 21.7296 13.5717Z" fill="#FFA500" />
                                                        </svg>
                                                        <div class="front-card_bottom_place__text"><a href="<?php echo get_comments_link(); ?>">Comment (<?php echo get_comments_number(); ?>)</a></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php
                                }
                                ?>
                        <?php
                            endwhile;
                            wp_reset_postdata();
                        endif;
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Instagram section -->
<section>

    <div class="instagram">
        <div class="instagram_slider">
            <?php
            if (have_rows('instagram_repeater', 'option')) :
                while (have_rows('instagram_repeater', 'option')) : the_row();

                    echo wp_get_attachment_image(get_sub_field('instagram_repeater_image', 'option'), 'custom-insta');
                endwhile;
            endif; ?>
        </div>
        <div class="instagram__button">
            <a class="button" href="<?php echo get_field('instagram_button_link', 'option'); ?>"><?php echo get_field('instagram_button_value', 'option'); ?></a>
        </div>
    </div>

</section>

<!-- Email section -->
<section>
    <div class="container">
        <div class="email">
            <div class="email__head"><?php echo get_field('form_text', 'option'); ?></div>
            <!-- <div class="email__form"> -->
            <?php echo do_shortcode('[contact-form-7 id="6be531a" title="Contact form 1"]'); ?>
            <!-- </div> -->
        </div>
    </div>

</section>


<?php get_footer(); ?>