<?php
get_header();
?>

<main>
    <div class="container">
        <div class="wrapper">

            <?php
            while (have_posts()) :
                the_post();

                get_template_part('template-parts/content', get_post_type());
            ?>
                <div>
                    <?php
                    if (comments_open() || get_comments_number())
                    {
                        comments_template();
                    }
                    ?>

                </div>
            <?php endwhile ?>

        </div>
    </div>
</main>
<?php
get_footer();
