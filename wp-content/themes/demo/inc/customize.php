<?php
function my_register_additional_customizer_settings( $wp_customize ) {
    $wp_customize->add_setting('my_company_name');

    $wp_customize->add_control( new WP_Customize_Image_Control(
        $wp_customize,
        'my_company_name',
        array(
            'label'      => 'Company name',
            'settings'   => 'my_company_name',
            'priority'   => 9,
            'section'    => 'title_tagline',
            'type'       => 'image',
        )
    ) );
}
add_action( 'customize_register', 'my_register_additional_customizer_settings' );