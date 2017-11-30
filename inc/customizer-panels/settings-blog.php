<?php

// ---------------------------------------------
// Blog Section
// ---------------------------------------------
$wp_customize->add_section( 'tyros_blog_section', array(
    'title'                 => __( 'Blog Layout', 'tyros'),
    'description'           => __( 'Customize the Blog of your site', 'tyros' ),
    'priority'              => 10
) );

    // Blog Layout - Include Left Sidebar?
    $wp_customize->add_setting( 'tyros[sc_blog_layout_left]', array(
        'default'               => 'col1',
        'transport'             => 'refresh',
        'sanitize_callback'     => 'tyros_sanitize_col_sidebar_left',
        'type'                  => 'option'
    ) );
    $wp_customize->add_control( 'tyros[sc_blog_layout_left]', array(
        'label'   => __( 'Include the left sidebar on the blog?', 'tyros' ),
        'section' => 'tyros_blog_section',
        'type'    => 'radio',
        'choices'    => array(
            'col1'      => __( 'No Sidebar', 'tyros' ),
            'col2l'     => __( 'Left Sidebar', 'tyros' ),
        )
    ));
    
    // Blog Layout - Include Sidebar?
    $wp_customize->add_setting( 'tyros[sc_blog_layout]', array(
        'default'               => 'col2r',
        'transport'             => 'refresh',
        'sanitize_callback'     => 'tyros_sanitize_col_sidebar',
        'type'                  => 'option'
    ) );
    $wp_customize->add_control( 'tyros[sc_blog_layout]', array(
        'label'   => __( 'Include the right sidebar on the blog?', 'tyros' ),
        'section' => 'tyros_blog_section',
        'type'    => 'radio',
        'choices'    => array(
            'col1'      => __( 'No Sidebar', 'tyros' ),
            'col2r'     => __( 'Right Sidebar', 'tyros' ),
        )
    ));

    // Show / Hide Post images on the Blog?
    $wp_customize->add_setting( 'tyros[sc_blog_featured]', array(
         'default'               => 'on',
         'transport'             => 'refresh',
         'sanitize_callback'     => 'tyros_sanitize_on_off',
         'type'                  => 'option'
    ) );
    $wp_customize->add_control( 'tyros[sc_blog_featured]', array(
        'label'   => __( 'Show or Hide the Post images on the blog page?', 'tyros' ),
        'section' => 'tyros_blog_section',
        'type'    => 'radio',
        'choices'    => array(
            'on'    => __( 'Show', 'tyros' ),
            'off'   => __( 'Hide', 'tyros' ),
        )
    ));

    
    