<?php
/**
 * Enqueue scripts and styles
 */
function wpdocs_theme_name_scripts() {
    wp_enqueue_style( 'main', get_template_directory_uri() . '/assets/css/main.css' );
    wp_enqueue_script( 'jquery', get_template_directory_uri() . '/assets/js/jquery-3.5.1.min.js', array(), '3.5.1', true );
    wp_enqueue_script( 'main', get_template_directory_uri() . '/assets/js/main.js', array(), '1.0.0', true );
}
add_action( 'wp_enqueue_scripts', 'wpdocs_theme_name_scripts' );

/**
 * Register Menus
 */
function register_menu_locations()
{
  register_nav_menus(
    array(
      'header' => __('Header Menu'),
      'footer' => __('Footer Menu')
    )
  );
}
add_action('init', 'register_menu_locations');

/**
 * Custom excerpt lenght
 */
function trim_custom_excerpt($excerpt) {
    if (has_excerpt()) {
        $excerpt = wp_trim_words(get_the_excerpt(), apply_filters("excerpt_length", 20));
    }

    return $excerpt;
}

add_filter("the_excerpt", "trim_custom_excerpt", 999);

/**
 * Change the read more text with dots
 */
function new_excerpt_more( $more ) {
	return '...';
}
add_filter('excerpt_more', 'new_excerpt_more');

/**
 * Register Sidebar
 */
if ( function_exists('register_sidebar') )
  register_sidebar(array(
    'name' => 'Sidebar',
    'before_widget' => '<div class="widget">',
    'after_widget' => '</div>',
    'before_title' => '<h3>',
    'after_title' => '</h3>',
  )
);

function wpsn_pagination( \WP_Query $wp_query = null, $echo = true, $params = [] ) {
    if ( null === $wp_query ) {
        global $wp_query;
    }

    $add_args = [];

    $pages = paginate_links( array_merge( [
            'base'         => str_replace( 999999999, '%#%', esc_url( get_pagenum_link( 999999999 ) ) ),
            'format'       => '?paged=%#%',
            'current'      => max( 1, get_query_var( 'paged' ) ),
            'total'        => $wp_query->max_num_pages,
            'type'         => 'array',
            'show_all'     => false,
            'end_size'     => 3,
            'mid_size'     => 1,
            'prev_next'    => true,
            'prev_text'    => __( '« Prev' ),
            'next_text'    => __( 'Next »' ),
            'add_args'     => $add_args,
            'add_fragment' => ''
        ], $params )
    );

    if ( is_array( $pages ) ) {
        $pagination = '<div class="pagination"><ul class="pagination">';

        foreach ( $pages as $page ) {
            $pagination .= '<li class="page-item' . (strpos($page, 'current') !== false ? ' active' : '') . '"> ' . str_replace('page-numbers', 'page-link', $page) . '</li>';
        }

        $pagination .= '</ul></div>';

        if ( $echo ) {
            echo $pagination;
        } else {
            return $pagination;
        }
    }

    return null;
}
