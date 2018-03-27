<?php
/**
 * Understrap Theme Customizer
 *
 * @package understrap
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
if ( ! function_exists( 'understrap_customize_register' ) ) {
	/**
	 * Register basic customizer support.
	 *
	 * @param object $wp_customize Customizer reference.
	 */
	function understrap_customize_register( $wp_customize ) {
		$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
		$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
		$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
	}
}
add_action( 'customize_register', 'understrap_customize_register' );

if ( ! function_exists( 'understrap_theme_customize_register' ) ) {
	/**
	 * Register individual settings through customizer's API.
	 *
	 * @param WP_Customize_Manager $wp_customize Customizer reference.
	 */
	function understrap_theme_customize_register( $wp_customize ) {

		// Theme layout settings.
		$wp_customize->add_section( 'understrap_theme_layout_options', array(
			'title'       => __( 'Theme Layout Settings', 'understrap' ),
			'capability'  => 'edit_theme_options',
			'description' => __( 'Container width and sidebar defaults', 'understrap' ),
			'priority'    => 160,
		) );

		 //select sanitization function
        function understrap_theme_slug_sanitize_select( $input, $setting ){
         
            //input must be a slug: lowercase alphanumeric characters, dashes and underscores are allowed only
            $input = sanitize_key($input);
 
            //get the list of possible select options 
            $choices = $setting->manager->get_control( $setting->id )->choices;
                             
            //return input if valid or return default option
            return ( array_key_exists( $input, $choices ) ? $input : $setting->default );                
             
        }

		$wp_customize->add_setting( 'understrap_container_type', array(
			'default'           => 'container',
			'type'              => 'theme_mod',
			'sanitize_callback' => 'understrap_theme_slug_sanitize_select',
			'capability'        => 'edit_theme_options',
		) );

		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'understrap_container_type', array(
					'label'       => __( 'Container Width', 'understrap' ),
					'description' => __( "Choose between Bootstrap's container and container-fluid", 'understrap' ),
					'section'     => 'understrap_theme_layout_options',
					'settings'    => 'understrap_container_type',
					'type'        => 'select',
					'choices'     => array(
						'container'       => __( 'Fixed width container', 'understrap' ),
						'container-fluid' => __( 'Full width container', 'understrap' ),
					),
					'priority'    => '10',
				)
			) );

		$wp_customize->add_setting( 'understrap_sidebar_position', array(
			'default'           => 'right',
			'type'              => 'theme_mod',
			'sanitize_callback' => 'sanitize_text_field',
			'capability'        => 'edit_theme_options',
		) );

		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'understrap_sidebar_position', array(
					'label'       => __( 'Sidebar Positioning', 'understrap' ),
					'description' => __( "Set sidebar's default position. Can either be: right, left, both or none. Note: this can be overridden on individual pages.",
					'understrap' ),
					'section'     => 'understrap_theme_layout_options',
					'settings'    => 'understrap_sidebar_position',
					'type'        => 'select',
					'sanitize_callback' => 'understrap_theme_slug_sanitize_select',
					'choices'     => array(
						'right' => __( 'Right sidebar', 'understrap' ),
						'left'  => __( 'Left sidebar', 'understrap' ),
						'both'  => __( 'Left & Right sidebars', 'understrap' ),
						'none'  => __( 'No sidebar', 'understrap' ),
					),
					'priority'    => '20',
				)
			) );
	}
} // endif function_exists( 'understrap_theme_customize_register' ).
add_action( 'customize_register', 'understrap_theme_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
if ( ! function_exists( 'understrap_customize_preview_js' ) ) {
	/**
	 * Setup JS integration for live previewing.
	 */
	function understrap_customize_preview_js() {
		wp_enqueue_script( 'understrap_customizer', get_template_directory_uri() . '/js/customizer.js',
			array( 'customize-preview' ), '20130508', true );
	}
}
add_action( 'customize_preview_init', 'understrap_customize_preview_js' );


if ( ! function_exists( 'customize_contact_register' ) ) {
    function customize_contact_register($wp_customize)
    {
        $wp_customize->add_section(
            'contact_text_section', array(
            'title' => __('Contact', 'ContactPage'),
            'description' => __('Contact information')
        ));

        $wp_customize->add_setting('title_email', array(
            'default' => ''
        ));

        $wp_customize->add_control(
            new WP_Customize_Control(
                $wp_customize,
                'title_email', array(
                'type' => 'text',
                'label' => __("Custom title name", 'ContactPage'),
                'description' => __("This is a contact title name"),
                'section' => 'contact_text_section',
                'settings' => 'title_email',
            )));


        $wp_customize->add_setting('email_text', array(
            'default' => '',
        ));

        $wp_customize->add_control(
            new WP_Customize_Control(
                $wp_customize,
                'email_text', array(
                'type' => 'text',
                'label' => __('Custom email', 'ContactPage'),
                'description' => __('This is a custom text box for email'),
                'section' => 'contact_text_section',
                'settings' => 'email_text',
            )));


        $wp_customize->add_setting('title_phone', array(
            'default' => ''
        ));

        $wp_customize->add_control(
            new WP_Customize_Control(
                $wp_customize,
                'title_phone', array(
                'type' => 'text',
                'label' => __("Custom title name", 'ContactPage'),
                'description' => __("This is a contact title phone"),
                'section' => 'contact_text_section',
                'settings' => 'title_phone',
            )));

        $wp_customize->add_setting('phone_number', array(
            'default' => ' '
        ));

        $wp_customize->add_control(
            new WP_Customize_Control(
                $wp_customize,
                'phone_number', array(
                'type' => 'text',
                'label' => __('Custom phone number', 'ContactPage'),
                'description' => __("This is a phone number"),
                'section' => 'contact_text_section',
                'settings' => 'phone_number',
            )));

        $wp_customize->add_setting('career_text', array(
            'default' => ' '
        ));

        $wp_customize->add_control(
            new WP_Customize_Control(
                $wp_customize,
                'career_text', array(
                'type' => 'text',
                'label' => __('Custom career text', 'ContactPage'),
                'description' => __("This is a career text"),
                'section' => 'contact_text_section',
                'settings' => 'career_text',
            )));

        $wp_customize->add_setting('social_icon', array(
            'default' => ' '
        ));
    }
}
add_action('customize_register', 'customize_contact_register');

if ( ! function_exists( 'customize_social_icon_register' ) ) {
    function customize_social_icon_register($wp_customize)
    {
        $wp_customize->add_section(
            'social_text_section', array(
            'title' => __('Social icon', 'Footer'),
            'description' => __('Footer information')
        ));


        $wp_customize->add_setting('social_facebook', array(
            'default' => '',
        ));

        $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'social_facebook', array(
            'type' => 'text',
            'label' => __('Social icon', 'Footer'),
            'description' => __('This is a custom text box for facebook'),
            'section' => 'social_text_section',
            'settings' => 'social_facebook',
        )));

        $wp_customize->add_setting('social_twitter', array(
            'default' => '',
        ));

        $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'social_twitter', array(
            'type' => 'text',
            'label' => __('Social icon', 'Footer'),
            'description' => __('This is a custom text box for twitter'),
            'section' => 'social_text_section',
            'settings' => 'social_twitter',
        )));

        $wp_customize->add_setting('social_instagram', array(
            'default' => '',
        ));

        $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'social_instagram', array(
            'type' => 'text',
            'label' => __('Social icon', 'Footer'),
            'description' => __('This is a custom text box for instagram'),
            'section' => 'social_text_section',
            'settings' => 'social_instagram',
        )));

        $wp_customize->add_setting('social_linkedin', array(
            'default' => '',
        ));

        $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'social_linkedin', array(
            'type' => 'text',
            'label' => __('Social icon', 'Footer'),
            'description' => __('This is a custom text box for linkedin'),
            'section' => 'social_text_section',
            'settings' => 'social_linkedin',
        )));

        $wp_customize->add_setting('social_google_plus', array(
            'default' => '',
        ));

        $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'social_google_plus', array(
            'type' => 'text',
            'label' => __('Social icon', 'Footer'),
            'description' => __('This is a custom text box for google plus'),
            'section' => 'social_text_section',
            'settings' => 'social_google_plus',
        )));
    }
}
add_action('customize_register', 'customize_social_icon_register');

if ( ! function_exists( 'customize_bg_frontpage_carousel_register' ) ) {
    function customize_bg_frontpage_carousel_register($wp_customize)
    {
        $wp_customize->add_section(
            'bg_front_page_section', array(
            'title' => __('Bg-Front-Page-Section', 'Blog'),
            'description' => __('Front-Page information')
        ));

        $wp_customize->add_setting('bg_front_page');
                $wp_customize->add_control(
                    new WP_Customize_Image_Control(
                        $wp_customize,
                        'bg_front_page',
                        array(
                            'label' => 'Add background image for section home',
                            'section' => 'bg_front_page_section',
                            'settings' => 'bg_front_page'
                        )
                    ));
            }
        }
add_action('customize_register', 'customize_bg_frontpage_carousel_register');

if ( ! function_exists( 'customize_bg_blog_register' ) ) {
    function customize_bg_blog_register($wp_customize)
    {
        $wp_customize->add_section(
            'bg_blog_section', array(
            'title' => __('Bg-Blog-Section', 'Blog'),
            'description' => __('Blog information')
        ));

        $wp_customize->add_setting('back_image');
                $wp_customize->add_control(
                    new WP_Customize_Image_Control(
                        $wp_customize,
                        'back_image',
                        array(
                            'label' => 'Add background image for section home',
                            'section' => 'bg_blog_section',
                            'settings' => 'back_image'
                        )
                    ));
            }
        }

add_action('customize_register', 'customize_bg_blog_register');

if ( ! function_exists( 'customize_blog_subtitle_register' ) ) {
    function customize_blog_subtitle_register($wp_customize)
    {
        $wp_customize->add_section(
            'blog_text_section', array(
            'title' => __('Blog', 'Blog'),
            'description' => __('Blog subtitle information')
        ));


        $wp_customize->add_setting('blog_subtitle', array(
            'default' => '',
        ));

        $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'blog_subtitle', array(
            'type' => 'text',
            'label' => __('Blog subtitle', 'Blog'),
            'description' => __('This is a custom text box for blog subtitle'),
            'section' => 'blog_text_section',
            'settings' => 'blog_subtitle',
        )));
    }
}
add_action('customize_register', 'customize_blog_subtitle_register');

if ( ! function_exists( 'customize_slider_front_page_register' ) ) {
    function customize_slider_front_page_register($wp_customize)
    {
        $wp_customize->add_section(
            'industry_slider_text_section', array(
            'title' => __('Industry slider', 'Industry slider Front page'),
            'description' => __('Industry slider subtitle information')
        ));


        $wp_customize->add_setting('industry_slider_subtitle', array(
            'default' => '',
        ));

        $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'industry_slider_subtitle', array(
            'type' => 'text',
            'label' => __('Industry slider subtitle', 'Blog'),
            'description' => __('This is a custom text box for Industry slider subtitle'),
            'section' => 'industry_slider_text_section',
            'settings' => 'industry_slider_subtitle',
        )));

        $wp_customize->add_setting('industry_slider_title', array(
                    'default' => '',
                ));

                $wp_customize->add_control(
                new WP_Customize_Control(
                    $wp_customize,
                    'industry_slider_title', array(
                    'type' => 'text',
                    'label' => __('Industry slider title', 'Blog'),
                    'description' => __('This is a custom text box for Industry slider title'),
                    'section' => 'industry_slider_text_section',
                    'settings' => 'industry_slider_title',
                )));
    }
}
add_action('customize_register', 'customize_slider_front_page_register');
