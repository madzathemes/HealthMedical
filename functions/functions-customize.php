<?php

function themename_customize_register($wp_customize){


	 $wp_customize->add_section('themename_header', array(
        'title'    => 'Header',
        'priority' => 124,
    ));

	class Example_Customize_Textarea_Control extends WP_Customize_Control {
    public $type = 'textarea';
 
    public function render_content() {
	        ?>
	        <label>
	        <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
	        <textarea rows="5" style="width:100%;" <?php $this->link(); ?>><?php echo esc_textarea( $this->value() ); ?></textarea>
	        </label>
	        <?php
	    }
	}
	
	//	==================================================
    //  =============================
    //  = ==== General Options    
    //  =============================
      
    $wp_customize->add_section('themename_general_mt', array(
        'title'    => 'General Options',
        'priority' => 121,
    ));
    
    
    //  =============================
    //  = Favicon             =
    //  =============================
    $wp_customize->add_setting('themename_theme_options[mt_favicon]', array(
        'capability'        => 'edit_theme_options',
        'type'           => 'option',
        'sanitize_callback' => 'esc_url',
 
    ));
 
    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'mt_favicon', array(
        'label'    => __('Upload Favicon (16px x 16px Png/Gif image)', 'themename'),
        'section'  => 'themename_general_mt',
        'settings' => 'themename_theme_options[mt_favicon]',
    )));



	
	//  =============================
    //  = Breadcrumb  
    //  =============================
    $wp_customize->add_setting('themename_theme_options[mt_breadcrumb]', array(
        'capability' => 'edit_theme_options',
        'default'        => "1",
        'type'       => 'option',
        'sanitize_callback' => 'esc_attr',
    ));
 
    $wp_customize->add_control('mt_breadcrumb', array(
        'settings' => 'themename_theme_options[mt_breadcrumb]',
        'label'    => 'Display Breadcrumb',
        'section'  => 'themename_general_mt',
       'type'    => 'select',
        'choices'    => array(
        	'1' => 'On',
            '2' => 'Off',
        ),
    ));
    
    
    //  =============================
    //  = Custom Css  
    //  =============================
    $wp_customize->add_setting('themename_theme_options[mt_css]', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
        'sanitize_callback' => 'balanceTags',
        
 
    ));
 
    $wp_customize->add_control( new Example_Customize_Textarea_Control( $wp_customize, 'mt_css', array(
        'label'      => 'Custom CSS',
        'section'    => 'themename_general_mt',
        'settings'   => 'themename_theme_options[mt_css]',
    )));
    




	//	==================================================
    //  =============================
    //  = ==== Logo Options    
    //  =============================
      
    $wp_customize->add_section('themename_logo', array(
        'title'    => 'Logo',
        'priority' => 123,
    ));
    
    
    //  =============================
    //  = Logo             =
    //  =============================
    $wp_customize->add_setting('themename_theme_options[mt_logo]', array(
        'capability'        => 'edit_theme_options',
        'type'           => 'option',
        'default' => get_template_directory_uri().'/images/logo.png',
        'sanitize_callback' => 'esc_url',
 
    ));
 
    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'mt_logo', array(
        'label'    => __('Upload Logo', 'themename'),
        'section'  => 'themename_logo',
        'settings' => 'themename_theme_options[mt_logo]',
    )));
    
    //  =============================
    //  = Logo Responsive            =
    //  =============================
    $wp_customize->add_setting('themename_theme_options[mt_logo_r]', array(
        'capability'        => 'edit_theme_options',
        'type'           => 'option',
        'default' => get_template_directory_uri().'/images/logo.png',
        'sanitize_callback' => 'esc_url',
 
    ));
 
    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'mt_logo_r', array(
        'label'    => __('Upload Responsive Logo', 'themename'),
        'section'  => 'themename_logo',
        'settings' => 'themename_theme_options[mt_logo_r]',
    )));
    
    //  =============================
    //  = Logo Widht   
    //  =============================
    $wp_customize->add_setting('themename_theme_options[mt_logo_w]', array(
        'default'        => '171',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
        'sanitize_callback' => 'esc_attr',
        
 
    ));
 
    $wp_customize->add_control('mt_logo_w', array(
        'label'      => 'Logo Width (px)',
        'section'    => 'themename_logo',
        'settings'   => 'themename_theme_options[mt_logo_w]',
    ));
    
    //  =============================
    //  = Logo Height   
    //  =============================
    $wp_customize->add_setting('themename_theme_options[mt_logo_h]', array(
        'default'        => '70',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
        'sanitize_callback' => 'esc_attr',
        
 
    ));
 
    $wp_customize->add_control('mt_logo_h', array(
        'label'      => 'Logo Height (px)',
        'section'    => 'themename_logo',
        'settings'   => 'themename_theme_options[mt_logo_h]',
    ));
    
    //  =============================
    //  = Logo margin Top   
    //  =============================
    $wp_customize->add_setting('themename_theme_options[mt_logo_t]', array(
        'default'        => '0',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
        'sanitize_callback' => 'esc_attr',
        
 
    ));
 
    $wp_customize->add_control('mt_logo_t', array(
        'label'      => 'Logo Margin Top (px)',
        'section'    => 'themename_logo',
        'settings'   => 'themename_theme_options[mt_logo_t]',
    ));
    
    //  =============================
    //  = Logo margin Bottom   
    //  =============================
    $wp_customize->add_setting('themename_theme_options[mt_logo_b]', array(
        'default'        => '0',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
        'sanitize_callback' => 'esc_attr',
        
 
    ));
 
    $wp_customize->add_control('mt_logo_b', array(
        'label'      => 'Logo Margin Bottom (px)',
        'section'    => 'themename_logo',
        'settings'   => 'themename_theme_options[mt_logo_b]',
    ));
    
    
    
    
    
    //	==================================================
    //  =============================
    //  = ==== Header Options    
    //  =============================
      
    $wp_customize->add_section('themename_header', array(
        'title'    => 'Header Options',
        'priority' => 124,
    ));
    
    //  =============================
    //  = Menu fixed 
    //  =============================
    $wp_customize->add_setting('themename_theme_options[mt_menu_fix]', array(
    	'default'        => "1",
        'capability' => 'edit_theme_options',
        'type'       => 'option',
        'sanitize_callback' => 'esc_attr',
    ));
 
    $wp_customize->add_control('mt_menu_fix', array(
        'settings' => 'themename_theme_options[mt_menu_fix]',
        'label'    => 'Fixed Menu',
        'priority'   => 1,
        'section'  => 'themename_header',
        'type'     => 'checkbox',
    ));
    
    
    
 
    //  =============================
    //  = Show top area area   
    //  =============================
    $wp_customize->add_setting('themename_theme_options[mt_header_ep]', array(
    	'default'        => "1",
        'capability' => 'edit_theme_options',
        'type'       => 'option',
        'sanitize_callback' => 'esc_attr',
    ));
 
    $wp_customize->add_control('mt_header_ep', array(
        'settings' => 'themename_theme_options[mt_header_ep]',
        'label'    => 'Display Header Top',
        'section'  => 'themename_header',
        'priority'   => 2,
        'type'     => 'checkbox',
    ));
    

    
    //  =============================
    //  = Top area  
    //  =============================
    $wp_customize->add_setting('themename_theme_options[mt_header_phone]', array(
        'default'        => '<i class="fa fa-phone"></i>  Call Us +371 2 200 055 99  <i class="fa fa-envelope-o"></i>  info@lawyersx.com',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
        'sanitize_callback' => 'balanceTags',
        
 
    ));
 
    $wp_customize->add_control( new Example_Customize_Textarea_Control( $wp_customize, 'mt_header_phone', array(
        'label'      => 'Top text area',
        'section'    => 'themename_header',
        'priority'   => 3,
        'settings'   => 'themename_theme_options[mt_header_phone]',
    )));
        
    
    
    
    
    
     //	==================================================
    //  =============================
    //  = ==== Header Columns    
    //  =============================
      
    $wp_customize->add_section('themename_header_columns', array(
        'title'    => __('Homepage Header Columns', 'themename'),
        'priority' => 129,
    ));
	
	
	//  =============================
    //  = Column On
    //  =============================
    $wp_customize->add_setting('themename_theme_options[mt_header_column_on]', array(
    	'default'        => "1",
        'capability' => 'edit_theme_options',
        'type'       => 'option',
        'sanitize_callback' => 'esc_attr',
    ));
 
    $wp_customize->add_control('mt_header_column_on', array(
        'settings' => 'themename_theme_options[mt_header_column_on]',
        'label'    => 'On/Off',
        'priority'   => 1,
        'section'  => 'themename_header_columns',
        'type'     => 'checkbox',
    ));
    
    
	//  =============================
    //  = Column Style 	=
    //  =============================
     $wp_customize->add_setting('themename_theme_options[mt_header_column_style]', array(
        'default'        => 'mt_column_style_1',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
        'sanitize_callback' => 'esc_attr',
 
    ));
    $wp_customize->add_control( 'mt_header_column_style', array(
        'settings' => 'themename_theme_options[mt_header_column_style]',
        'label'   => 'Columns',
        'section' => 'themename_header_columns',
        'priority'   => 9,
        'type'    => 'select',
        'choices'    => array(
        	'mt_column_style_1' => '3 Columns',
            'mt_column_style_2' => '2 Columns',
        ),
    ));
    
   

 
 
    //  =============================
    //  = Image Upload  1            =
    //  =============================
    $wp_customize->add_setting('themename_theme_options[mt_header_column_image_1]', array(
        'capability'        => 'edit_theme_options',
        'type'           => 'option',
        'sanitize_callback' => 'esc_url',
 
    ));
 
    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'mt_header_column_image_1', array(
        'label'    => __('Column 1 Background Image:', 'themename'),
        'section'  => 'themename_header_columns',
        'priority'   => 10,
        'settings' => 'themename_theme_options[mt_header_column_image_1]',
    )));
    
    
     //  =============================
    //  = Color Picker  1            =
    //  =============================
    $wp_customize->add_setting('mt_header_column_color_1', array(
        'default'           => '#41AEDF',
        'sanitize_callback' => 'sanitize_hex_color',
        'capability'        => 'edit_theme_options',
        'type'           => 'option',
        'sanitize_callback' => 'sanitize_hex_color',
 
    ));
 
    $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'mt_header_column_color_1', array(
        'label'    => __('Column 1 Color:', 'themename'),
        'section'  => 'themename_header_columns',
        'priority'   => 11,
        'settings' => 'mt_header_column_color_1',
    )));
 
 
    
     //  =============================
    //  == Color Opacity  	1    
    //  =============================
     $wp_customize->add_setting('themename_theme_options[mt_header_column_opacity_1]', array(
        'default'        => '0.4',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
        'sanitize_callback' => 'esc_attr',
 
    ));
    $wp_customize->add_control( 'mt_header_column_opacity_1', array(
        'settings' => 'themename_theme_options[mt_header_column_opacity_1]',
        'label'   => 'Column 1 color Opacity:',
        'section' => 'themename_header_columns',
        'type'    => 'select',
        'priority'   => 12,
        'choices'    => array(
        	'0.1' => '0.1',
        	'0.2' => '0.2',
        	'0.3' => '0.3',
        	'0.4' => '0.4',
        	'0.5' => '0.5',
        	'0.6' => '0.6',
        	'0.7' => '0.7',
        	'0.8' => '0.8',
        	'0.9' => '0.9',
        ),
    ));
    
    
    //  =============================
    //  = Image Upload  2            =
    //  =============================
    $wp_customize->add_setting('themename_theme_options[mt_header_column_image_2]', array(
        'capability'        => 'edit_theme_options',
        'type'           => 'option',
        'sanitize_callback' => 'esc_url',
 
    ));
 
    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'mt_header_column_image_2', array(
        'label'    => __('Column 2 Background Image:', 'themename'),
        'section'  => 'themename_header_columns',
        'priority'   => 20,
        'settings' => 'themename_theme_options[mt_header_column_image_2]',
    )));
    
    
     //  =============================
    //  = Color Picker  2            =
    //  =============================
    $wp_customize->add_setting('mt_header_column_color_2', array(
        'default'           => '#27a5db',
        'sanitize_callback' => 'sanitize_hex_color',
        'capability'        => 'edit_theme_options',
        'type'           => 'option',
        'sanitize_callback' => 'sanitize_hex_color',
 
    ));
 
    $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'mt_header_column_color_2', array(
        'label'    => __('Column 2 Color:', 'themename'),
        'section'  => 'themename_header_columns',
        'priority'   => 21,
        'settings' => 'mt_header_column_color_2',
    )));
 
 
    
     //  =============================
    //  == Color Opacity  	2    
    //  =============================
     $wp_customize->add_setting('themename_theme_options[mt_header_column_opacity_2]', array(
        'default'        => '0.4',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
        'sanitize_callback' => 'esc_attr',
 
    ));
    $wp_customize->add_control( 'mt_header_column_opacity_2', array(
        'settings' => 'themename_theme_options[mt_header_column_opacity_2]',
        'label'   => 'Column 2 color Opacity:',
        'section' => 'themename_header_columns',
        'type'    => 'select',
        'priority'   => 22,
        'choices'    => array(
        	'0.1' => '0.1',
        	'0.2' => '0.2',
        	'0.3' => '0.3',
        	'0.4' => '0.4',
        	'0.5' => '0.5',
        	'0.6' => '0.6',
        	'0.7' => '0.7',
        	'0.8' => '0.8',
        	'0.9' => '0.9',
        ),
    ));
    
    
    
     //  =============================
    //  = Image Upload  3            =
    //  =============================
    $wp_customize->add_setting('themename_theme_options[mt_header_column_image_3]', array(
        'capability'        => 'edit_theme_options',
        'type'           => 'option',
        'sanitize_callback' => 'esc_url',
 
    ));
 
    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'mt_header_column_image_3', array(
        'label'    => __('Column 3 Background Image:', 'themename'),
        'section'  => 'themename_header_columns',
        'priority'   => 30,
        'settings' => 'themename_theme_options[mt_header_column_image_3]',
    )));
    
    
     //  =============================
    //  = Color Picker  3            =
    //  =============================
    $wp_customize->add_setting('mt_header_column_color_3', array(
        'default'           => '#157eb2',
        'sanitize_callback' => 'sanitize_hex_color',
        'capability'        => 'edit_theme_options',
        'type'           => 'option',
        'sanitize_callback' => 'sanitize_hex_color',
 
    ));
 
    $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'mt_header_column_color_3', array(
        'label'    => __('Column 3 Color:', 'themename'),
        'section'  => 'themename_header_columns',
        'priority'   => 31,
        'settings' => 'mt_header_column_color_3',
    )));
 
 
    
     //  =============================
    //  == Color Opacity  	3    
    //  =============================
     $wp_customize->add_setting('themename_theme_options[mt_header_column_opacity_3]', array(
        'default'        => '0.4',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
        'sanitize_callback' => 'esc_attr',
 
    ));
    $wp_customize->add_control( 'mt_header_column_opacity_3', array(
        'settings' => 'themename_theme_options[mt_header_column_opacity_3]',
        'label'   => 'Column 3 color Opacity:',
        'section' => 'themename_header_columns',
        'type'    => 'select',
        'priority'   => 32,
        'choices'    => array(
        	'0.1' => '0.1',
        	'0.2' => '0.2',
        	'0.3' => '0.3',
        	'0.4' => '0.4',
        	'0.5' => '0.5',
        	'0.6' => '0.6',
        	'0.7' => '0.7',
        	'0.8' => '0.8',
        	'0.9' => '0.9',
        ),
    ));
    
     //  =============================
    //  = Custom Text 1  
    //  =============================
    $wp_customize->add_setting('themename_theme_options[mt_header_column_text_1]', array(
        'default'        => '<h3>Emergency Case</h3>
<p>I am text block. Edit this text from Appearance / Customize / Homepage header columns. Lorem ipsum dolor sit amet, consectetur adipiscing elit. </p>
<a href="#" class="mt-button-boxy">READ MORE</a>',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
        'sanitize_callback' => 'balanceTags',
        
 
    ));
 
    $wp_customize->add_control( new Example_Customize_Textarea_Control( $wp_customize, 'mt_header_column_text_1', array(
        'label'      => 'Column 1 text',
        'section'    => 'themename_header_columns',
        'priority'   => 13,
        'settings'   => 'themename_theme_options[mt_header_column_text_1]',
    )));
    
     //  =============================
    //  = Custom Text 2  
    //  =============================
    $wp_customize->add_setting('themename_theme_options[mt_header_column_text_2]', array(
        'default'        => '<h3>Emergency Case</h3>
<p>I am text block. Edit this text from Appearance / Customize / Homepage header columns. Lorem ipsum dolor sit amet, consectetur adipiscing elit. </p>
<a href="#" class="mt-button-boxy">READ MORE</a>',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
        'sanitize_callback' => 'balanceTags',
        
 
    ));
 
    $wp_customize->add_control( new Example_Customize_Textarea_Control( $wp_customize, 'mt_header_column_text_2', array(
        'label'      => 'Column 2 text',
        'section'    => 'themename_header_columns',
        'priority'   => 23,
        'settings'   => 'themename_theme_options[mt_header_column_text_2]',
    )));
    
     //  =============================
    //  = Custom Text 3  
    //  =============================
    $wp_customize->add_setting('themename_theme_options[mt_header_column_text_3]', array(
        'default'        => '<h3>Opening Hours</h3>
<table>
<tbody>
<tr>
<td>Monday - Friday</td>
<td>8.00 - 17.00</td>
</tr>
<tr>
<td>Saturday</td>
<td>9.30 - 17.30</td>
</tr>
<tr>
<td>Sunday</td>
<td>9.30 - 15.00</td>
</tr>
</tbody>
</table>',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
        'sanitize_callback' => 'balanceTags',
 
    ));
 
    $wp_customize->add_control( new Example_Customize_Textarea_Control( $wp_customize, 'mt_header_column_text_3', array(
        'label'      => 'Column 3 text',
        'section'    => 'themename_header_columns',
        'priority'   => 33,
        'settings'   => 'themename_theme_options[mt_header_column_text_3]',
    )));
    
   









    
    
    $wp_customize->add_section('themename_color_scheme', array(
        'title'    => __('Style Options', 'themename'),
        'priority' => 125,
    ));
 
 
 
     //  =============================
    //  = Color Picker              =
    //  =============================
    $wp_customize->add_setting('default_color', array(
        'default'           => '#41AEDF',
        'sanitize_callback' => 'sanitize_hex_color',
        'capability'        => 'edit_theme_options',
        'type'           => 'option',
        'sanitize_callback' => 'sanitize_hex_color',
 
    ));
 
    $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'default_color', array(
        'label'    => __('Default Color', 'themename'),
        'section'  => 'themename_color_scheme',
        'settings' => 'default_color',
    )));
    
    
   
 
 
 
    //  =============================
    //  = Radio Input               =
    //  =============================
    $wp_customize->add_setting('layout_style', array(
        'default'        => 'full',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
        'sanitize_callback' => 'esc_attr',
    ));
 
    $wp_customize->add_control('themename_layout_style', array(
        'label'      => __('Layout Style', 'themename'),
        'section'    => 'themename_color_scheme',
        'settings'   => 'layout_style',
        'type'       => 'radio',
        'choices'    => array(
            'full' => 'Full Width',
            'box' => 'Boxed',
        ),
    ));
 
 
 
 
 
 
   //  =============================
    //  = Color Picker              =
    //  =============================
    $wp_customize->add_setting('bg_default_color', array(
        'default'           => '#ffffff',
        'sanitize_callback' => 'sanitize_hex_color',
        'capability'        => 'edit_theme_options',
        'type'           => 'option',
        'sanitize_callback' => 'sanitize_hex_color',
 
    ));
 
    $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'bg_default_color', array(
        'label'    => __('Background Color', 'themename'),
        'section'  => 'themename_color_scheme',
        'settings' => 'bg_default_color',
    )));
 
 

 
 
    //  =============================
    //  = Image Upload              =
    //  =============================
    $wp_customize->add_setting('themename_theme_options[image_upload_test]', array(
        'capability'        => 'edit_theme_options',
        'type'           => 'option',
        'sanitize_callback' => 'esc_url',
 
    ));
 
    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'image_upload_test', array(
        'label'    => __('Upload Background Image', 'themename'),
        'section'  => 'themename_color_scheme',
        'settings' => 'themename_theme_options[image_upload_test]',
    )));
 
    
 
    
    //  =============================
    //  = Background Repeat  	    =
    //  =============================
     $wp_customize->add_setting('themename_theme_options[background_repeat]', array(
        'default'        => 'none',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
        'sanitize_callback' => 'esc_attr',
 
    ));
    $wp_customize->add_control( 'example_select_box', array(
        'settings' => 'themename_theme_options[background_repeat]',
        'label'   => 'Background Repeat:',
        'section' => 'themename_color_scheme',
        'type'    => 'select',
        'choices'    => array(
        	'none' => 'Select',
            'full' => 'Full',
            'no-repeat' => 'No Repeat',
            'repeat' => 'Repeat',
            'repeat-x' => 'Repeat Horizontally',
            'repeat-y' => 'Repeat Vertically',
            'inherit' => 'Inherit',
        ),
    ));
    
    //  =============================
    //  = Background Attachment  	    =
    //  =============================
     $wp_customize->add_setting('themename_theme_options[background_attachment]', array(
        'default'        => 'none',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
        'sanitize_callback' => 'esc_attr',
 
    ));
    $wp_customize->add_control( 'example_select_box2', array(
        'settings' => 'themename_theme_options[background_attachment]',
        'label'   => 'Background Attachment:',
        'section' => 'themename_color_scheme',
        'type'    => 'select',
        'choices'    => array(
        	'none' => 'Select',
            'fixed' => 'Fixed',
            'scroll' => 'Scroll',
            'inherit' => 'Inherit',
        ),
    ));
    
    //  =============================
    //  = Background Position  	    =
    //  =============================
     $wp_customize->add_setting('themename_theme_options[background_position]', array(
        'default'        => 'none',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
        'sanitize_callback' => 'esc_attr',
 
    ));
    $wp_customize->add_control( 'example_select_box3', array(
        'settings' => 'themename_theme_options[background_position]',
        'label'   => 'Background Position:',
        'section' => 'themename_color_scheme',
        'type'    => 'select',
        'choices'    => array(
        	'none' => 'Select',
            'left top' => 'Left Top',
            'left center' => 'Left Center',
            'left bottom' => 'Left Bottom',
            'center top' => 'Center Top',
            'center center' => 'Center Center',
            'center bottom' => 'Center Bottom',
            'right top' => 'Right Top',
            'right center' => 'Right Center',
            'right bottom' => 'Right Bottom',
        ),
    ));
    

    
    
    
    //	==================================================
    //  =============================
    //  = ==== Title    
    //  =============================
      
    $wp_customize->add_section('themename_title', array(
        'title'    => __('Title', 'themename'),
        'priority' => 129,
    ));
	
	
	//  =============================
    //  = Title Style 	=
    //  =============================
     $wp_customize->add_setting('themename_theme_options[title_style]', array(
        'default'        => 'none',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
        'sanitize_callback' => 'esc_attr',
        
 
    ));
    $wp_customize->add_control( 'example_select_box23', array(
        'settings' => 'themename_theme_options[title_style]',
        'label'   => 'Title Style',
        'priority' => 1,
        'section' => 'themename_title',
        'type'    => 'select',
        'choices'    => array(
        	'mt_title_style_1' => 'Style 1',
            'mt_title_style_2' => 'Style 2',
            'mt_title_style_3' => 'Style 3',
        ),
    ));
    
    //  =============================
    //  = Color Picker              =
    //  =============================
    $wp_customize->add_setting('bg_default_color_title', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_hex_color',
        'capability'        => 'edit_theme_options',
        'type'           => 'option',
        'sanitize_callback' => 'sanitize_hex_color',
 
    ));
 
    $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'bg_default_color_title', array(
        'label'    => __('Title Background Color', 'themename'),
        'section'  => 'themename_title',
        'settings' => 'bg_default_color_title',
        'priority' => 2,
    )));
 
 

 
 
    //  =============================
    //  = Image Upload              =
    //  =============================
    $wp_customize->add_setting('themename_theme_options[image_upload_test_title]', array(
        'capability'        => 'edit_theme_options',
        'type'           => 'option',
        'sanitize_callback' => 'esc_url',
 
    ));
 
    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'image_upload_test_title', array(
        'label'    => __('Default Title Background Image', 'themename'),
        'section'  => 'themename_title',
        'settings' => 'themename_theme_options[image_upload_test_title]',
        
        'priority' => 3,
    )));
    
    
     //  =============================
    //  = Image Upload  2            =
    //  =============================
    $wp_customize->add_setting('themename_theme_options[image_upload_test_title2]', array(
        'capability'        => 'edit_theme_options',
        'type'           => 'option',
        'sanitize_callback' => 'esc_url',
 
    ));
 
    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'image_upload_test_title2', array(
        'label'    => __('(Turn On Animation) Second Image', 'themename'),
        'section'  => 'themename_title',
        'settings' => 'themename_theme_options[image_upload_test_title2]',
        'priority' => 8,
    )));
    
    
    
    //  =============================
    //  = Background Repeat  	    =
    //  =============================
     $wp_customize->add_setting('themename_theme_options[background_repeat_title]', array(
        'default'        => 'none',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
        'sanitize_callback' => 'esc_attr',
 
    ));
    
    
    $wp_customize->add_control( 'example_select_box', array(
        'settings' => 'themename_theme_options[background_repeat_title]',
        'label'   => 'Background Repeat:',
        'section' => 'themename_title',
        'type'    => 'select',
        'choices'    => array(
        	'none' => 'Select',
            'no-repeat' => 'No Repeat',
            'repeat' => 'Repeat',
            'repeat-x' => 'Repeat Horizontally',
            'repeat-y' => 'Repeat Vertically',
            'inherit' => 'Inherit',
        ),
        
        'priority' => 5,
    ));
    
    //  =============================
    //  = Background Attachment  	    =
    //  =============================
     $wp_customize->add_setting('themename_theme_options[background_attachment_title]', array(
        'default'        => 'none',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
        'sanitize_callback' => 'esc_attr',
 
    ));
    $wp_customize->add_control( 'example_select_box2', array(
        'settings' => 'themename_theme_options[background_attachment_title]',
        'label'   => 'Background Attachment:',
        'section' => 'themename_title',
        'type'    => 'select',
        'choices'    => array(
        	'none' => 'Select',
            'fixed' => 'Fixed',
            'scroll' => 'Scroll',
            'inherit' => 'Inherit',
        ),
        
        'priority' => 6,
    ));
    
    //  =============================
    //  = Background Position  	    =
    //  =============================
     $wp_customize->add_setting('themename_theme_options[background_position_title]', array(
        'default'        => 'none',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
        'sanitize_callback' => 'esc_attr',
 
    ));
    $wp_customize->add_control( 'example_select_box3', array(
        'settings' => 'themename_theme_options[background_position_title]',
        'label'   => 'Background Position:',
        'section' => 'themename_title',
        'type'    => 'select',
        'choices'    => array(
        	'none' => 'Select',
            'left top' => 'Left Top',
            'left center' => 'Left Center',
            'left bottom' => 'Left Bottom',
            'center top' => 'Center Top',
            'center center' => 'Center Center',
            'center bottom' => 'Center Bottom',
            'right top' => 'Right Top',
            'right center' => 'Right Center',
            'right bottom' => 'Right Bottom',
        ),
        
        'priority' => 7,
    ));
    
     //  =============================
    //  = Background Width  	    =
    //  =============================
     $wp_customize->add_setting('themename_theme_options[mt_background_width]', array(
        'default'        => '1500px',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
        'sanitize_callback' => 'esc_attr',
 
    ));
    $wp_customize->add_control( 'mt_background_width', array(
        'settings' => 'themename_theme_options[mt_background_width]',
        'label'   => 'Animation Background Width:',
        'section' => 'themename_title',
        'priority' => 10,
    ));
 

  
    //	==================================================
    //  =============================
    //  = ==== Fonts    
    //  =============================
      
    $wp_customize->add_section('themename_fonts', array(
        'title'    => __('Fonts', 'themename'),
        'priority' => 130,
    ));
	
	
	//  =============================
    //  = Google Font name    
    //  =============================
    $wp_customize->add_setting('themename_theme_options[font_name]', array(
        'default'        => 'Open+Sans:300,400,600,700',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
        'sanitize_callback' => 'balanceTags',
        
 
    ));
 
    $wp_customize->add_control('mt_google_font_name', array(
        'label'      => 'Google Font Name',
        'section'    => 'themename_fonts',
        'settings'   => 'themename_theme_options[font_name]',
    ));
 
    
    //  =============================
    //  = Google Font name    
    //  =============================
    $wp_customize->add_setting('themename_theme_options[font_css]', array(
        'default'        => "",
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
        'sanitize_callback' => 'balanceTags',
 
    ));
 
    $wp_customize->add_control('mt_google_font_css', array(
        'label'      => 'Google Font CSS',
        'section'    => 'themename_fonts',
        'settings'   => 'themename_theme_options[font_css]',
    ));
    
    
    
    //	==================================================
    //  =============================
    //  = ==== Footer    
    //  =============================
      
    $wp_customize->add_section('themename_footer', array(
        'title'    => 'Footer',
        'priority' => 131,
    ));
	
	
	//  =============================
    //  = Footer Background             =
    //  =============================
    $wp_customize->add_setting('themename_theme_options[mt_footer_bg]', array(
        'capability'        => 'edit_theme_options',
        'type'           => 'option',
        'sanitize_callback' => 'esc_url',
 
    ));
 
    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'mt_footer_bg', array(
        'label'    => __('Upload Background Image', 'themename'),
        'section'  => 'themename_footer',
        'settings' => 'themename_theme_options[mt_footer_bg]',
    )));   
    
	//  =============================
    //  = Footer Top   
    //  =============================
    $wp_customize->add_setting('themename_theme_options[footer_top]', array(
    	'default'        => "1",
        'capability' => 'edit_theme_options',
        'type'       => 'option',
        'sanitize_callback' => 'esc_attr',
    ));
 
    $wp_customize->add_control('mt_footer_top', array(
        'settings' => 'themename_theme_options[footer_top]',
        'label'    => 'Display Top Footer',
        'section'  => 'themename_footer',
        'type'     => 'checkbox',
    ));
    
    
    //  =============================
    //  = Footer Bottom   
    //  =============================
    $wp_customize->add_setting('themename_theme_options[footer_bottom]', array(
        'capability' => 'edit_theme_options',
        'default'        => "1",
        'type'       => 'option',
        'sanitize_callback' => 'esc_attr',
    ));
 
    $wp_customize->add_control('mt_footer_bottom', array(
        'settings' => 'themename_theme_options[footer_bottom]',
        'label'    => 'Display Bottom Footer',
        'section'  => 'themename_footer',
        'type'     => 'checkbox',
    ));
    
    
    //  =============================
    //  = Footer Top Columns  	    =
    //  =============================
     $wp_customize->add_setting('themename_theme_options[footer_columns]', array(
        'default'        => '2_4',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
        'sanitize_callback' => 'esc_attr',
 
    ));
    $wp_customize->add_control( 'mt_footer_columns', array(
        'settings' => 'themename_theme_options[footer_columns]',
        'label'   => 'Footer Columns:',
        'section' => 'themename_footer',
        'type'    => 'select',
        'choices'    => array(
       		'1_1' => '1/1',
        	'1_2' => '1/2',
            '1_3' => '1/3',
            '1_4' => '1/4',
            '2_4' => '2/4',
            '4_2' => '4/2',
        ),
    ));
    
	
	//  =============================
    //  = Copyright   
    //  =============================
    $wp_customize->add_setting('themename_theme_options[copyright_text]', array(
        'default'        => 'Copyright 2013. Powered by WordPress Theme. By M.Bitenieks',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
        'sanitize_callback' => 'balanceTags',
        
 
    ));
 
    $wp_customize->add_control( new Example_Customize_Textarea_Control( $wp_customize, 'mt_copyright_text', array(
        'label'      => 'Copyright Text',
        'section'    => 'themename_footer',
        'settings'   => 'themename_theme_options[copyright_text]',
    )));
    
    
    
	//	==================================================
    //  =============================
    //  = ==== Social Icons    
    //  =============================
      
    $wp_customize->add_section('themename_icons', array(
        'title'    => __('Social Icons', 'themename'),
        'priority' => 140,
    ));
	
	
	//  =============================
    //  = Google Font name    
    //  =============================
    $wp_customize->add_setting('themename_theme_options[mt_icon_facebook]', array(
        'default'        => '#',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
        'sanitize_callback' => 'esc_url',
    ));
	$wp_customize->add_control('mt_icon_facebook', array(
        'label'      => 'Facebook icon link',
        'section'    => 'themename_icons',
        'settings'   => 'themename_theme_options[mt_icon_facebook]',
    ));
    
    $wp_customize->add_setting('themename_theme_options[mt_icon_intagram]', array(
        'default'        => '#',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
	$wp_customize->add_control('mt_icon_intagram', array(
        'label'      => 'Instagram icon link',
        'section'    => 'themename_icons',
        'settings'   => 'themename_theme_options[mt_icon_intagram]',
    ));

    $wp_customize->add_setting('themename_theme_options[mt_icon_twitter]', array(
        'default'        => '#',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
        'sanitize_callback' => 'esc_url',
    ));
	$wp_customize->add_control('mt_icon_twitter', array(
        'label'      => 'Twitter icon link',
        'section'    => 'themename_icons',
        'settings'   => 'themename_theme_options[mt_icon_twitter]',
    ));
    
    $wp_customize->add_setting('themename_theme_options[mt_icon_vimeo]', array(
        'default'        => '#',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
        'sanitize_callback' => 'esc_url',
    ));
	$wp_customize->add_control('mt_icon_vimeo', array(
        'label'      => 'Vimeo icon link',
        'section'    => 'themename_icons',
        'settings'   => 'themename_theme_options[mt_icon_vimeo]',
    ));
    
    $wp_customize->add_setting('themename_theme_options[mt_icon_youtube]', array(
        'default'        => '#',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
        'sanitize_callback' => 'esc_url',
    ));
	$wp_customize->add_control('mt_icon_youtube', array(
        'label'      => 'Youtube icon link',
        'section'    => 'themename_icons',
        'settings'   => 'themename_theme_options[mt_icon_youtube]',
    ));
    
    $wp_customize->add_setting('themename_theme_options[mt_icon_linkedin]', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
        'sanitize_callback' => 'esc_url',
    ));
	$wp_customize->add_control('mt_icon_linkedin', array(
        'label'      => 'LinkedIn icon link',
        'section'    => 'themename_icons',
        'settings'   => 'themename_theme_options[mt_icon_linkedin]',
    ));
    
    $wp_customize->add_setting('themename_theme_options[mt_icon_gplus]', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
        'sanitize_callback' => 'esc_url',
    ));
	$wp_customize->add_control('mt_icon_gplus', array(
        'label'      => 'Google Plus icon link',
        'section'    => 'themename_icons',
        'settings'   => 'themename_theme_options[mt_icon_gplus]',
    ));
    
    $wp_customize->add_setting('themename_theme_options[mt_icon_dribble]', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
        'sanitize_callback' => 'esc_url',
    ));
	$wp_customize->add_control('mt_icon_dribble', array(
        'label'      => 'Dribble icon link',
        'section'    => 'themename_icons',
        'settings'   => 'themename_theme_options[mt_icon_dribble]',
    ));
    
    $wp_customize->add_setting('themename_theme_options[mt_icon_skype]', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
        'sanitize_callback' => 'esc_url',
    ));
	$wp_customize->add_control('mt_icon_skype', array(
        'label'      => 'Skype icon link',
        'section'    => 'themename_icons',
        'settings'   => 'themename_theme_options[mt_icon_skype]',
    ));
    

  
    $wp_customize->add_setting('themename_theme_options[mt_icon_pinterest]', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
        'sanitize_callback' => 'esc_url',
    ));
	$wp_customize->add_control('mt_icon_pinterest', array(
        'label'      => 'Pinterest icon link',
        'section'    => 'themename_icons',
        'settings'   => 'themename_theme_options[mt_icon_pinterest]',
    ));
    
    $wp_customize->add_setting('themename_theme_options[mt_icon_rss]', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
        'sanitize_callback' => 'esc_url',
    ));
	$wp_customize->add_control('mt_icon_rss', array(
        'label'      => 'Rss icon link',
        'section'    => 'themename_icons',
        'settings'   => 'themename_theme_options[mt_icon_rss]',
    ));
    
    
    
    //	==================================================
    //  =============================
    //  = ==== Rewrite CPT    
    //  =============================
      
    $wp_customize->add_section('themename_rewrite', array(
        'title'    => __('Rewrite CPT', 'themename'),
        'priority' => 141,
    ));
	
	
	//  =============================
    //  = CPT doctor    
    //  =============================
    $wp_customize->add_setting('themename_theme_options[mt_rewrite_doctor]', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
        'sanitize_callback' => 'esc_attr',
    ));
	$wp_customize->add_control('mt_rewrite_doctor', array(
        'label'      => 'Rewrite Doctor CPT slug',
        'section'    => 'themename_rewrite',
        'settings'   => 'themename_theme_options[mt_rewrite_doctor]',
    ));
    
    //  =============================
    //  = CPT Services    
    //  =============================
    $wp_customize->add_setting('themename_theme_options[mt_rewrite_services]', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
        'sanitize_callback' => 'esc_attr',
    ));
	$wp_customize->add_control('mt_rewrite_services', array(
        'label'      => 'Rewrite Services CPT slug',
        'section'    => 'themename_rewrite',
        'settings'   => 'themename_theme_options[mt_rewrite_services]',
    ));

	//  =============================
    //  = CPT Portfolio    
    //  =============================
    $wp_customize->add_setting('themename_theme_options[mt_rewrite_portfolio]', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
        'sanitize_callback' => 'esc_attr',
    ));
	$wp_customize->add_control('mt_rewrite_portfolio', array(
        'label'      => 'Rewrite Portfolio CPT slug',
        'section'    => 'themename_rewrite',
        'settings'   => 'themename_theme_options[mt_rewrite_portfolio]',
    ));
    
    
	//  =============================
    //  = CPT Causes    
    //  =============================
    $wp_customize->add_setting('themename_theme_options[mt_rewrite_causes]', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
        'sanitize_callback' => 'esc_attr',
    ));
	$wp_customize->add_control('mt_rewrite_causes', array(
        'label'      => 'Rewrite Causes CPT slug',
        'section'    => 'themename_rewrite',
        'settings'   => 'themename_theme_options[mt_rewrite_causes]',
    ));


 

   
 
}
 
add_action('customize_register', 'themename_customize_register');

?>