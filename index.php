<?php
/*
* Template name: Inicio
*/
get_header('secondary'); ?>

<div class="container">
    <?php get_header('head2'); ?>
    <?php if (is_front_page()): ?>
        <section class="row">
            <?php if (have_posts()): ?>
                <?php while (have_posts()): ?>
                    <?php the_post(); ?>
                    <article class=" articulo col-md-3 col-sm-6">
                        <picture class="thumbnail">
                            <?php if (has_post_thumbnail()): ?>
                                <?php the_post_thumbnail(array(242, 200)); ?>
                            <?php else: ?>
                                <img width="200" height="200" src="https://img.interempresas.net/fotos/2733357.png"
                                     alt="">
                            <?php endif ?>
                            <div class="caption">
                                <a href="<?php the_permalink(); ?>">
                                    <h3 class="justify-center">
                                        <?php the_title(); ?>
                                    </h3>
                                </a>
                            </div>
                            <p class="text-center">
                                <?php substr(the_excerpt(), 0, 200) ?></p>
                            <p><a href="#" class="btn btn-primary">Leer más</a></p>
                        </picture>
                    </article>
                <?php endwhile ?>
            <?php else:
                __("Lo sentimos. No hay posts disponibles", "openwebinarsthemeone");
                ?>

            <?php endif ?>
        </section>
    <?php elseif ( is_singular() || is_page() ): ?>

        <?php get_single_template(); ?>

    <?php else: ?>

        <?php __("Lo sentimos. No hay posts disponibles", "openwebinarsthemeone"); ?>



    <?php endif; ?>
    <?php get_sidebar(); ?>
    <?php get_page_template('2'); ?>


    <?php get_footer(); ?>
