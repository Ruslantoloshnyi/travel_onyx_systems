<?php
/*
Template Name: Destination page
Template Post Type: page
*/

get_header('dest');
?>
<section>
    <div class="container">
        <div class="to_go">
            <h2 class="to_go__head"><span>Where do</span> you want to
                go?</h2>
            <div class="to_go__text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed mor mattis nec
                etiam
                ac. Bibendum tellus mi imperdiet amet
                maecenas magna tortor nulla. Nec tortor ut cursus ornare nibh vivamus. Quam elementum at velit
                viverra
                mattis.
            </div>
        </div>
    </div>
</section>

<!-- destination content section -->
<section>
    <div class="container">
        <div class="destination_content">
            <div class="destination_content_head">
                <?php
                $terms = get_terms(array(
                    'taxonomy' => 'local',
                    'hide_empty' => false,
                ));

                foreach ($terms as $term)
                {
                    $term_link = get_term_link($term);
                    echo '<a href="' . esc_url($term_link) . '">' . $term->name . '</a>';
                }
                ?>
            </div>
            <div class="destination_content_grid">
                <?php
                $destination_posts_args = [
                    'post_type' => 'dest-cpt',
                    'posts_per_page' => -1,
                    'orderby' => 'date',
                    'order' => 'DESC'
                ];

                $destination_posts = new WP_Query($destination_posts_args);

                if ($destination_posts->have_posts()) :
                    while ($destination_posts->have_posts()) : $destination_posts->the_post();
                ?>
                        <div class="destination_content_card shadow">
                            <div>
                                <a href="<?php the_permalink(); ?>"> <?php the_post_thumbnail('custom-destination', ['class' => 'image-cov']) ?></a>
                            </div>
                            <div class="destination_content_card_info">
                                <div class="destination_content_card_info__date"><?php echo get_the_date('F j, Y') ?></div>
                                <div class="destination_content_card_info__name"><?php the_title(); ?></div>
                                <div class="destination_content_card_info__line"></div>
                                <div class="destination_content_card_info_bottom">
                                    <div class="destination_content_card_info_bottom_place">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="19" height="25" viewBox="0 0 19 25" fill="none">
                                            <path d="M8.41152 24.4956C1.31689 14.2105 0 13.1549 0 9.375C0 4.19731 4.19731 0 9.375 0C14.5527 0 18.75 4.19731 18.75 9.375C18.75 13.1549 17.4331 14.2105 10.3385 24.4956C9.8729 25.1682 8.87705 25.1681 8.41152 24.4956ZM9.375 13.2812C11.5324 13.2812 13.2812 11.5324 13.2812 9.375C13.2812 7.21763 11.5324 5.46875 9.375 5.46875C7.21763 5.46875 5.46875 7.21763 5.46875 9.375C5.46875 11.5324 7.21763 13.2812 9.375 13.2812Z" fill="#FFA500" />
                                        </svg>
                                        <?php
                                        $tags = get_the_tags();
                                        if ($tags)
                                        {
                                            echo '<div class="destination_content_card_info_bottom_place__text">';
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
                                    <div class="destination_content_card_info_bottom_place">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="16" viewBox="0 0 24 16" fill="none">
                                            <path d="M16.802 5.71453C16.802 2.55739 13.0418 0.000244141 8.40102 0.000244141C3.76026 0.000244141 0 2.55739 0 5.71453C0 6.93953 0.569492 8.0681 1.5348 9.00024C0.993582 10.0788 0.100974 10.936 0.088857 10.9467C0 11.0288 -0.0242337 11.1502 0.0282727 11.2574C0.0807791 11.3645 0.19387 11.4288 0.323116 11.4288C1.80137 11.4288 3.02518 10.9895 3.90567 10.536C5.20621 11.0967 6.74505 11.4288 8.40102 11.4288C13.0418 11.4288 16.802 8.87167 16.802 5.71453ZM21.7296 13.5717C22.6949 12.6431 23.2644 11.511 23.2644 10.286C23.2644 7.89667 21.1035 5.85024 18.042 4.99667C18.0784 5.23239 18.0945 5.47167 18.0945 5.71453C18.0945 9.49667 13.7446 12.5717 8.40102 12.5717C7.96481 12.5717 7.54072 12.5431 7.12067 12.5038C8.39294 14.5574 11.3818 16.0002 14.8633 16.0002C16.5193 16.0002 18.0582 15.6717 19.3587 15.1074C20.2392 15.561 21.463 16.0002 22.9413 16.0002C23.0705 16.0002 23.1876 15.9324 23.2361 15.8288C23.2886 15.7252 23.2644 15.6038 23.1755 15.5181C23.1634 15.5074 22.2708 14.6538 21.7296 13.5717Z" fill="#FFA500" />
                                        </svg>
                                        <div class="destination_content_card_info_bottom_place__text"><a href="<?php echo get_comments_link(); ?>">Comment (<?php echo get_comments_number(); ?>)</a></div>
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
<?php
get_footer();
