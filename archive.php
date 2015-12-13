<?php
    get_header();

    $banner = (object) array(
        'title' => get_the_archive_title(),
        'subtitle' => get_the_archive_description()
    );

    include_once('templates/tpl_page_banner.php');
?>

    <section id="primary" class="content-area">
        <main id="main" class="site-main" role="main">

        <?php if ( have_posts() ) : ?>

            <?php
            // Start the Loop.
            while ( have_posts() ) : the_post();

                get_template_part( 'content', 'postinfobox' );

            // End the loop.
            endwhile;


            // Previous/next page navigation.
            the_posts_pagination( array(
                'mid_size'          => 3,
                'prev_text'          => '&#9668;<span class="screen-reader-text"> Previous page</span>',
                'next_text'          => '&#9658;<span class="screen-reader-text"> Next page</span>',
            ) );



        // If no content, include the "No posts found" template.
        else :
            get_template_part( 'content', 'none' );

        endif;
        ?>

        </main><!-- .site-main -->
    </section><!-- .content-area -->

<?php get_footer(); ?>
