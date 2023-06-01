<?php
/*
* Template name: Home
*/
get_header('secondary'); ?>
<?php get_header('head2'); ?>
<?php if (have_posts()): ?>
    <?php while (have_posts()): ?>
        <?php the_post(); ?>

        <section class="row">
            <article class="col-md-12">
                <h1>
                    <?php the_title() ?>
                </h1>
                <?php the_content() ?>
            </article>
        </section>
        <?php get_sidebar(); ?>

    <?php endwhile; ?>
<?php endif; ?>

<?php get_footer(); ?>