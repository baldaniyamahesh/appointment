<?php
/**
 * Dentaris Theme Customizer
 *
 * @package Dentaris
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function dentaris_customize_register( $wp_customize ) {
	
function dentaris_sanitize_checkbox( $checked ) {
	// Boolean check.
	return ( ( isset( $checked ) && true == $checked ) ? true : false );
}
	
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
		
	$wp_customize->add_setting('color_scheme', array(
		'default' => '#00bcd4',
		'sanitize_callback'	=> 'sanitize_hex_color',
	));
	
	$wp_customize->add_control(
		new WP_Customize_Color_Control($wp_customize,'color_scheme',array(
			'label' => __('Color Scheme','dentaris'),
			'description'	=> __('Select color from here.','dentaris'),
			'section' => 'colors',
			'settings' => 'color_scheme'
		))
	);
	
	$wp_customize->add_setting('footer_color', array(
		'default' => '#282a2b',
		'sanitize_callback'	=> 'sanitize_hex_color',
	));
	
	$wp_customize->add_control(
		new WP_Customize_Color_Control($wp_customize,'footer_color',array(
			'label' => __('Footer Color','dentaris'),
			'description'	=> __('Select background color for footer.','dentaris'),
			'section' => 'colors',
			'settings' => 'footer_color'
		))
	);
	
	// Slider Section Start		
	$wp_customize->add_section(
        'slider_section',
        array(
            'title' => __('Slider Settings', 'dentaris'),
            'priority' => null,
			'description'	=> __('Recommended image size (1420x567). Slider will be visible only when you select static front page.','dentaris'),	
        )
    );
	
	$wp_customize->add_setting('page-setting7',array(
			'default' => '0',
			'capability' => 'edit_theme_options',
			'sanitize_callback'	=> 'absint'
	));
	
	$wp_customize->add_control('page-setting7',array(
			'type'	=> 'dropdown-pages',
			'label'	=> __('Select page for slide one:','dentaris'),
			'section'	=> 'slider_section'
	));	
	
	$wp_customize->add_setting('page-setting8',array(
			'default' => '0',
			'capability' => 'edit_theme_options',	
			'sanitize_callback'	=> 'absint'
	));
	
	$wp_customize->add_control('page-setting8',array(
			'type'	=> 'dropdown-pages',
			'label'	=> __('Select page for slide two:','dentaris'),
			'section'	=> 'slider_section'
	));	
	
	$wp_customize->add_setting('page-setting9',array(
			'default' => '0',
			'capability' => 'edit_theme_options',	
			'sanitize_callback'	=> 'absint'
	));
	
	$wp_customize->add_control('page-setting9',array(
			'type'	=> 'dropdown-pages',
			'label'	=> __('Select page for slide three:','dentaris'),
			'section'	=> 'slider_section'
	));	
	
	$wp_customize->add_setting('slide_text',array(
		'default'	=> __('Read More','dentaris'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('slide_text',array(
		'label'	=> __('Add slider link button text.','dentaris'),
		'section'	=> 'slider_section',
		'setting'	=> 'slide_text',
		'type'	=> 'text'
	));
	
	$wp_customize->add_setting('hide_slider',array(
			'default' => true,
			'sanitize_callback' => 'dentaris_sanitize_checkbox',
			'capability' => 'edit_theme_options',
	));	 

	$wp_customize->add_control( 'hide_slider', array(
		   'settings' => 'hide_slider',
    	   'section'   => 'slider_section',
    	   'label'     => __('Check this to hide slider','dentaris'),
    	   'type'      => 'checkbox'
     ));	
	
	// Slider Section End
	
	
	 // Contact		
	$wp_customize->add_section(
        'contact_section',
        array(
            'title' => __('Contact Details', 'dentaris'),
            'priority' => null,
			'description'	=> __('Add content for contact section.','dentaris'),	
        )
    );
	
	$wp_customize->add_setting('address',array(
			'default' => null,
			'capability' => 'edit_theme_options',
			'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('address',array(
			'type'	=> 'text',
			'label'	=> __('Add address here.','dentaris'),
			'section'	=> 'contact_section'
	));
	
	$wp_customize->add_setting('phone',array(
			'default' => null,
			'capability' => 'edit_theme_options',
			'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('phone',array(
			'type'	=> 'text',
			'label'	=> __('Add phone number here.','dentaris'),
			'section'	=> 'contact_section'
	));	
	
	$wp_customize->add_setting('timing',array(
			'default' => null,
			'capability' => 'edit_theme_options',
			'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('timing',array(
			'type'	=> 'text',
			'label'	=> __('Add timing here.','dentaris'),
			'section'	=> 'contact_section'
	));
	
	$wp_customize->add_setting('email',array(
			'default' => null,
			'capability' => 'edit_theme_options',
			'sanitize_callback'	=> 'sanitize_email'
	));
	
	$wp_customize->add_control('email',array(
			'type'	=> 'text',
			'label'	=> __('Add email address.','dentaris'),
			'section'	=> 'contact_section'
	));
	
	$wp_customize->add_setting('hide_contact',array(
			'default' => true,
			'sanitize_callback' => 'dentaris_sanitize_checkbox',
			'capability' => 'edit_theme_options',
	));	 

	$wp_customize->add_control( 'hide_contact', array(
		   'settings' => 'hide_contact',
    	   'section'   => 'contact_section',
    	   'label'     => __('Check this to hide contact section','dentaris'),
    	   'type'      => 'checkbox'
     ));		
	
}
	
	
add_action( 'customize_register', 'dentaris_customize_register' );	

function dentaris_css(){
		?>
        <style>
				a, 
				.tm_client strong,
				.postmeta a:hover,
				#sidebar ul li a:hover,
				.blog-post h3.entry-title,
				.home-section .home-left h3{
					color:<?php echo esc_html(get_theme_mod('color_scheme','#00bcd4')); ?>;
				}
				a.blog-more:hover,
				#commentform input#submit,
				input.search-submit,
				.nivo-controlNav a.active,
				.blog-date .date,
				a.read-more,
				.header-top,
				.nivo-caption a.button,
				.home-section .home-left a.ReadMore,
				.main-nav ul li a:hover,
				.sitenav ul li a:hover, 
				.sitenav ul li.current_page_item a, 
				.sitenav ul li:hover a.parent,
				.sitenav ul li ul.sub-menu li a:hover, 
				.sitenav ul li.current_page_item ul.sub-menu li a:hover, 
				.sitenav ul li ul.sub-menu li.current_page_item a,
				.sitenav ul li:hover > ul{
					background-color:<?php echo esc_html(get_theme_mod('color_scheme','#00bcd4')); ?>;
				}
				a.morebutton{
					border-color:<?php echo esc_html(get_theme_mod('color_scheme','#00bcd4')); ?>;
				}
				.copyright-wrapper{background-color:<?php echo esc_html(get_theme_mod('footer_color','#282a2b')); ?>;}
		</style>
	<?php }
add_action('wp_head','dentaris_css');

function dentaris_customize_preview_js() {
	wp_enqueue_script( 'dentaris-customize-preview', get_template_directory_uri() . '/js/customize-preview.js', array( 'customize-preview' ), '20141216', true );
}
add_action( 'customize_preview_init', 'dentaris_customize_preview_js' );