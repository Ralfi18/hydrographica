<?php
// Customizer File

function business_customize_register($wp_customize){

	// Boxes Section
   $wp_customize->add_section('boxes', array(
		'title'          => __('Boxes', 'business'),
		'description'    => sprintf( __('Options for homepage boxes', 'business')
		),
		'priority'       => 130,
 	));

   // BOX 1
    // box 1 image
    $wp_customize->add_setting('customizer_setting_one', array(
        'transport'         => 'refresh',
        'type'                 => 'theme_mod',
        'height'         => 325,
    ));
    // Add Controls
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'customizer_setting_one', array(
        'label'             => __('Slider Image #1', 'martins-shop'),
        'section'           => 'boxes',
        'settings'          => 'customizer_setting_one',  
        'priority' => 20,
    )));
	// Box 1 Heading Setting
	$wp_customize->add_setting( 'box1_heading', array(
		'default'   => _x('Box 1 Heading', 'business'),
		'type'      => 'theme_mod'
	));

	// Box 1 Heading Control
	$wp_customize->add_control( 'box1_heading', array(
		'label'    => __('Box 1 Heading', 'business'),
		'section'  => 'boxes',
		'priority' => 20,
	));

    // Box 1 Text Setting
 	$wp_customize->add_setting( 'box1_text', array(
 		'default'              => _x('Maecenas sed diam eget risus varius blandit sit amet non magna.', 'business'),
 		'type'                 => 'theme_mod'
 	));

 	// Box 1 Text Control
 	$wp_customize->add_control( 'box1_text', array(
 		'label'    => __('Box 1 Text', 'business'),
 		'section'  => 'boxes',
 		'priority' => 20,
		'type' => 'textarea',
 	));

 	// BOX 2

    // BOX 2 image
    $wp_customize->add_setting('customizer_setting_two', array(
        'transport'         => 'refresh',
        'type'                 => 'theme_mod',
        'height'         => 325,
    ));
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'customizer_setting_two', array(
        'label'             => __('Slider Image #2', 'martins-shop'),
        'section'           => 'boxes',
        'settings'          => 'customizer_setting_two',
        'priority' => 20,
    )));    
 	// Box 2 Heading Setting
 	$wp_customize->add_setting( 'box2_heading', array(
 		'default'              => _x('Box 2 Heading', 'business'),
 		'type'                 => 'theme_mod'
 	));

 	// Box 2 Heading Control
 	$wp_customize->add_control( 'box2_heading', array(
 		'label'    => __('Box 2 Heading', 'business'),
 		'section'  => 'boxes',
 		'priority' => 20,
 	));

    // Box 2 Text Setting
 	$wp_customize->add_setting( 'box2_text', array(
 		'default'              => _x('Maecenas sed diam eget risus varius blandit sit amet non magna.', 'business'),
 		'type'                 => 'theme_mod'
 	));

 	// Box 2 Text Control
 	$wp_customize->add_control( 'box2_text', array(
 		'label'    => __('Box 2 Text', 'business'),
 		'section'  => 'boxes',
		'type' => 'textarea',
		'priority' => 20
 	));


	// BOX 3
	
	// BOX 3 image
    $wp_customize->add_setting('customizer_setting_three', array(
        'transport'         => 'refresh',
        'type'                 => 'theme_mod',
        'height'         => 325,
    ));
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'customizer_setting_three', array(
        'label'             => __('Slider Image #3', 'martins-shop'),
        'section'           => 'boxes',
        'settings'          => 'customizer_setting_three',
        'priority' => 20,
    )));  
	// Box 3 Heading Setting
	$wp_customize->add_setting( 'box3_heading', array(
		'default'              => _x('Box 3 Heading', 'business'),
		'type'                 => 'theme_mod'
	));

	// Box 3 Heading Control
	$wp_customize->add_control( 'box3_heading', array(
		'label'    => __('Box 3 Heading', 'business'),
		'section'  => 'boxes',
		'priority' => 20,
	));

    // Box 3 Text Setting
	$wp_customize->add_setting( 'box3_text', array(
		'default'              => _x('Maecenas sed diam eget risus varius blandit sit amet non magna.', 'business'),
		'type'                 => 'theme_mod'
	));

	// Box 3 Text Control
	$wp_customize->add_control( 'box3_text', array(
		'label'    => __('Box 3 Text', 'business'),
		'section'  => 'boxes',
		'type' => 'textarea',
		'priority' => 20
	));


    // Images

    // Add Section
    // $wp_customize->add_section('slideshow', array(
    //     'title'             => __('Slider Images', 'martins-shop'), 
    //     'priority'          => 70,
    // ));    
    
    // Add Settings
    // $wp_customize->add_setting('customizer_setting_one', array(
    //     'transport'         => 'refresh',
    //     'type'                 => 'theme_mod',
    //     'height'         => 325,
    // ));
    // $wp_customize->add_setting('customizer_setting_two', array(
    //     'transport'         => 'refresh',
    //     'type'                 => 'theme_mod',
    //     'height'         => 325,
    // ));
    // $wp_customize->add_setting('customizer_setting_three', array(
    //     'transport'         => 'refresh',
    //     'type'                 => 'theme_mod',
    //     'height'         => 325,
    // ));

    // // Add Controls
    // $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'customizer_setting_one', array(
    //     'label'             => __('Slider Image #1', 'martins-shop'),
    //     'section'           => 'boxes',
    //     'settings'          => 'customizer_setting_one',  
    //     'priority' => 20,
    // )));
    // $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'customizer_setting_two', array(
    //     'label'             => __('Slider Image #2', 'martins-shop'),
    //     'section'           => 'boxes',
    //     'settings'          => 'customizer_setting_two',
    //     'priority' => 20,
    // )));    
    // $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'customizer_setting_three', array(
    //     'label'             => __('Slider Image #2', 'martins-shop'),
    //     'section'           => 'boxes',
    //     'settings'          => 'customizer_setting_three',
    //     'priority' => 20,
    // )));    
    
    // Select OPtions
    
    $wp_customize->add_section( 'parsmizban_options', 
     array(
        'title'       => __( 'Theme Options', 'parsmizban' ), //Visible title of section
        'priority'    => 20, //Determines what order this appears in
        'capability'  => 'edit_theme_options', //Capability needed to tweak
        'description' => __('Allows you to customize settings for Theme.', 'parsmizban'), //Descriptive tooltip
     ) 
    );
    $wp_customize->add_setting( 'bootstrap_theme_name', //No need to use a SERIALIZED name, as `theme_mod` settings already live under one db record
     array(
        'default'    => 'default', //Default setting/value to save
        'type'       => 'theme_mod', //Is this an 'option' or a 'theme_mod'?
        'capability' => 'edit_theme_options', //Optional. Special permissions for accessing this setting.
        //'transport'  => 'postMessage', //What triggers a refresh of the setting? 'refresh' or 'postMessage' (instant)?
     ) 
    );
    //3. Finally, we define the control itself (which links a setting to a section and renders the HTML controls)...
    $wp_customize->add_control( new WP_Customize_Control(
     $wp_customize, //Pass the $wp_customize object (required)
     'parsmizban_theme_name', //Set a unique ID for the control
     array(
        'label'      => __( 'Select Theme Name', 'parsmizban' ), //Admin-visible name of the control
        'description' => __( 'Using this option you can change the theme colors' ),
        'settings'   => 'bootstrap_theme_name', //Which setting to load and manipulate (serialized is okay)
        'priority'   => 10, //Determines the order this control appears in for the specified section
        'section'    => 'parsmizban_options', //ID of the section this control should render in (can be one of yours, or a WordPress default section)
        'type'    => 'select',
        'choices' => array(
            'default' => 'Default',
            'cerulean' => 'Cerulean',
            'cosmo' => 'Cosmo',
            'cyborg' => 'cyborg',
        )
    )
    ) );
    
    
    //your section
    $wp_customize->add_section( 
        'theme_slug_customizer_your_section', 
        array(
            'title' => esc_html__( 'Your Section', 'theme_slug' ),
            'priority' => 150
        )
    );      
     
     
     
    //radio box sanitization function
    function theme_slug_sanitize_radio( $input, $setting ){
     
        //input must be a slug: lowercase alphanumeric characters, dashes and underscores are allowed only
        $input = sanitize_key($input);

        //get the list of possible radio box options 
        $choices = $setting->manager->get_control( $setting->id )->choices;
                         
        //return input if valid or return default option
        return ( array_key_exists( $input, $choices ) ? $input : $setting->default );                
         
    }
     
     
    //add setting to your section
        $wp_customize->add_setting( 
            'boxes_active_state',
            array(
                'capability' => 'edit_theme_options',
                'default' => 'disable',
                'sanitize_callback' => 'theme_slug_sanitize_radio'
            )
        );
         
        $wp_customize->add_control( 
            'boxes_active_state', 
            array(
                'label' => esc_html__( 'Enable or disable field', 'theme_slug' ),
                'section' => 'boxes',
                'type' => 'radio',
                'choices' => array(
                    'enable' => esc_html__('Enable','theme_slug'),
                    'disable' => esc_html__('Disable','theme_slug')
                )
            )
        );      
} // Closing


add_action('customize_register', 'business_customize_register');