<?php
/**
 * Declaring widgets
 *
 * @package understrap
 */

/**
 * Count number of widgets in a sidebar
 * Used to add classes to widget areas so widgets can be displayed one, two, three or four per row
 */
if ( ! function_exists( 'understrap_slbd_count_widgets' ) ) {
	function understrap_slbd_count_widgets( $sidebar_id ) {
		// If loading from front page, consult $_wp_sidebars_widgets rather than options
		// to see if wp_convert_widget_settings() has made manipulations in memory.
		global $_wp_sidebars_widgets;
		if ( empty( $_wp_sidebars_widgets ) ) :
			$_wp_sidebars_widgets = get_option( 'sidebars_widgets', array() );
		endif;

		$sidebars_widgets_count = $_wp_sidebars_widgets;

		if ( isset( $sidebars_widgets_count[ $sidebar_id ] ) ) :
			$widget_count = count( $sidebars_widgets_count[ $sidebar_id ] );
			$widget_classes = 'widget-count-' . count( $sidebars_widgets_count[ $sidebar_id ] );
			if ( $widget_count % 4 == 0 || $widget_count > 6 ) :
				// Four widgets per row if there are exactly four or more than six
				$widget_classes .= ' col-md-3';
			elseif ( 6 == $widget_count ) :
				// If two widgets are published
				$widget_classes .= ' col-md-2';
			elseif ( $widget_count >= 3 ) :
				// Three widgets per row if there's three or more widgets 
				$widget_classes .= ' col-md-4';
			elseif ( 2 == $widget_count ) :
				// If two widgets are published
				$widget_classes .= ' col-md-6';
			elseif ( 1 == $widget_count ) :
				// If just on widget is active
				$widget_classes .= ' col-md-12';
			endif; 
			return $widget_classes;
		endif;
	}
}

if ( ! function_exists( 'understrap_widgets_init' ) ) {
	/**
	 * Initializes themes widgets.
	 */
	function understrap_widgets_init() {
		register_sidebar( array(
            'name'          => __( 'Footer-top-left', 'understrap' ),
            'id'            => 'footer-top-left',
            'description'   => __( 'Footer top-left sidebar widget area', 'understrap'),
            'before_widget' => '',
            'after_widget'  => '',
            'before_title'  => '',
            'after_title'   => '',
        ) );
        register_sidebar( array(
            'name'          => __( 'Footer-top-navigation', 'understrap' ),
            'id'            => 'footer-top-navigation',
            'description'   => __( 'Footer top navigation sidebar widget area', 'understrap'),
            'before_widget' => '',
            'after_widget'  => '',
            'before_title'  => '',
            'after_title'   => '',
        ) );
        register_sidebar( array(
            'name'          => __( 'Footer-top-industry', 'understrap' ),
            'id'            => 'footer-top-industry',
            'description'   => __( 'Footer top industry sidebar widget area', 'understrap'),
            'before_widget' => '',
            'after_widget'  => '',
            'before_title'  => '',
            'after_title'   => '',
        ) );
        register_sidebar( array(
                    'name'          => __( 'Footer-top-follow-us', 'understrap' ),
                    'id'            => 'footer-top-follow-us',
                    'description'   => __( 'Footer top follow-us sidebar widget area', 'understrap'),
                    'before_widget' => '',
                    'after_widget'  => '',
                    'before_title'  => '',
                    'after_title'   => '',
                ) );
        register_sidebar( array(
            'name'          => __( 'Footer-bottom', 'understrap' ),
            'id'            => 'footer-bottom',
            'description'   => __( 'Footer top right sidebar widget area', 'understrap'),
            'before_widget' => '',
            'after_widget'  => '',
            'before_title'  => '',
            'after_title'   => '',
        ) );

        register_sidebar( array(
            'name'          => __( 'Sidebar-sone-single-search', 'understrap' ),
            'id'            => 'sidebar-sone-single-search',
            'description'   => __( 'Single search sidebar widget area', 'understrap' ),
            'before_widget' => '<div id="%1$s" class="widget %2$s blog-section-aside blog-section-aside-search blog-section-categories archive">',
            'after_widget'  => '</div>',
            'before_title'  => ' <h3 class="blog-section-categories-title"> ',
            'after_title'   => '</h3>',
        ) );

	}
}
add_action( 'widgets_init', 'understrap_widgets_init' );

