<?php

function openwebinarasthemeone_put_styles_and_scripts()
{

    wp_enqueue_style( 'style', get_stylesheet_uri() );

    wp_enqueue_style(
        'bootstrap',
        'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css'
    );

    wp_enqueue_script(
        'bootstrap-js',
        'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js',
    );

    if (is_singular() && comments_open() && get_option('thread_comments')){
        wp_enqueue_script(
            'comment-reply',
        );
    }

}

//add_action('wp_enqueue_scripts', 'openwebinarasthemeone_put_styles_and_scripts');
add_action('wp_enqueue_scripts', 'openwebinarasthemeone_put_styles_and_scripts');

include_once('wp_bootstrap_navwalker.php');

function register_my_nav_menu(){
    //register_nav_menu('header-menu', __('Menú de la cabecera'));
    register_nav_menus( array(
        'primary' => __( 'Primary Menu', 'openwebinarsthemeone' ),
    ) );
}
add_action('init', 'register_my_nav_menu');


/**
 * Register Custom Navigation Walker
 */
function register_navwalker(){
    require_once get_template_directory() . '/wp-bootstrap-navwalker.php';
}
add_action( 'after_setup_theme', 'register_navwalker' );

function register_sidebars_openwebinars() {
    register_sidebar(
      array(
        'name'=>__('Blog Feed', 'openwebinarsthemeone'),
          'id'=> 'sidebar-blog',
          'before-widget'=>'<aside class="col-md-4"',
          'after-widget'=>'</aside>',
          'before-title'=>'<h3>',
          'after-title'=>'</h3>',
      ),
    );

    register_sidebar(
        array(
            'name'=>__('Footer', 'openwebinarsthemeone'),
            'id'=> 'sidebar-footer',
            'before-widget'=>'<aside class="col-md-12"',
            'after-widget'=>'</aside>',
            'before-title'=>'<h3>',
            'after-title'=>'</h3>',
        ),
    );
}
add_action( 'widgets_init', 'register_sidebars_openwebinars' );
add_action( 'after_setup_theme', 'register_theme_support_openwebinars' );

function register_theme_support_openwebinars()
{
    add_theme_support('post-thumbnails');
    add_theme_support('home_thumbnails');
    the_post_thumbnail('150', '150');
    set_post_thumbnail_size('150', '150');
    add_image_size('miniatura', '242', '200');
    add_image_size('miniatura6', '242', '200', $crop=false);
    add_image_size('miniatura7', '242', '200', $crop=true);
}


function ow_register_apatment_custom_tax()
{
    register_post_type(
      'inmueble',
      array(
        'labels'=>array(
            'name'=> 'Inmuebles',
            'singular_name'=> 'Inmueble',
        ),
          'public' => true,
          'has_archive' => true,
      ),
    );
}

add_action('init', 'ow_register_apatment_custom_tax');


function ow_register_apartment_custom_tax()
{
    $labels = array(
        'name' => _x('Apartamentos', 'taxonomy general name'),
        'singular_name' => _x('Apartamento', 'taxonomy general name'),
        'search_items' => __('Buscar Apartamentos'),
        'popular_items' => __('Apartamentos Populares'),
        'all_items' => __('Todos los Apartamentos'),
        'parent_item' => null,
        'parent_item_colon' => null,
        'edit_item' => __('Editar Apartamentos'),
        'update_item' => __('Actualizar los Apartamentos'),
        'add_new_item' => __('Añadir Apartamentos'),
        'new_item_name' => __('Añadir nuevo nombre Apartamentos'),
        'separate_items_with_comas' => __('Separar apartamentos por comas'),
        'add_or_remove_items' => __('Añadir o eliminar Apartamentos'),
        'choose_from_most_used' => __('Elegir los apooaratamentos más usados'),
        'not_found' => __('No se encontraron Apartamentos'),
        'menu_name' => __('Apartamentos'),
    );

    $args = array(
        'hiperachical' => false,
        'labels' => $labels,
        'show_ui' => true,
        'show_admin_column' => true,
        'update_count_callback' => '_update_post_term_count',
        'query_var' => true,
        'rewrite' => array(
            'slug' => 'writer',
        ),

    );

    register_taxonomy('apartment', 'inmueble', $args);

}

add_action('init', 'ow_register_apartment_custom_tax');

?>