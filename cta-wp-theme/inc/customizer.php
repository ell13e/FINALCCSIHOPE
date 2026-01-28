<?php
/**
 * Theme Customizer Settings
 * 
 * Replaces ACF PRO Options Pages with WordPress Customizer
 * This works with the FREE version of ACF
 *
 * @package CTA_Theme
 */

defined('ABSPATH') || exit;

/**
 * Register Customizer settings and controls
 */
function cta_customize_register($wp_customize) {
    
    // =========================================
    // CONTACT INFORMATION SECTION
    // =========================================
    $wp_customize->add_section('cta_contact_info', [
        'title' => __('Contact Information', 'cta-theme'),
        'priority' => 30,
        'description' => __('Your business contact details used across the site.', 'cta-theme'),
    ]);
    
    // Phone Number
    $wp_customize->add_setting('cta_contact_phone', [
        'default' => '01622 587343',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ]);
    $wp_customize->add_control('cta_contact_phone', [
        'label' => __('Phone Number', 'cta-theme'),
        'section' => 'cta_contact_info',
        'type' => 'text',
    ]);
    
    // Email Address
    $wp_customize->add_setting('cta_contact_email', [
        'default' => 'enquiries@continuitytrainingacademy.co.uk',
        'sanitize_callback' => 'sanitize_email',
        'transport' => 'postMessage',
    ]);
    $wp_customize->add_control('cta_contact_email', [
        'label' => __('Email Address', 'cta-theme'),
        'section' => 'cta_contact_info',
        'type' => 'email',
    ]);
    
    // Address Line 1
    $wp_customize->add_setting('cta_address_line1', [
        'default' => 'Continuity Training Academy',
        'sanitize_callback' => 'sanitize_text_field',
    ]);
    $wp_customize->add_control('cta_address_line1', [
        'label' => __('Address Line 1', 'cta-theme'),
        'section' => 'cta_contact_info',
        'type' => 'text',
    ]);
    
    // Address Line 2
    $wp_customize->add_setting('cta_address_line2', [
        'default' => 'The Maidstone Studios, New Cut Road',
        'sanitize_callback' => 'sanitize_text_field',
    ]);
    $wp_customize->add_control('cta_address_line2', [
        'label' => __('Address Line 2', 'cta-theme'),
        'section' => 'cta_contact_info',
        'type' => 'text',
    ]);
    
    // City
    $wp_customize->add_setting('cta_address_city', [
        'default' => 'Maidstone, Kent',
        'sanitize_callback' => 'sanitize_text_field',
    ]);
    $wp_customize->add_control('cta_address_city', [
        'label' => __('City/Town', 'cta-theme'),
        'section' => 'cta_contact_info',
        'type' => 'text',
    ]);
    
    // Postcode
    $wp_customize->add_setting('cta_address_postcode', [
        'default' => 'ME14 5NZ',
        'sanitize_callback' => 'sanitize_text_field',
    ]);
    $wp_customize->add_control('cta_address_postcode', [
        'label' => __('Postcode', 'cta-theme'),
        'section' => 'cta_contact_info',
        'type' => 'text',
    ]);
    
    // =========================================
    // SOCIAL MEDIA SECTION
    // =========================================
    $wp_customize->add_section('cta_social_media', [
        'title' => __('Social Media Links', 'cta-theme'),
        'priority' => 35,
    ]);
    
    // Facebook
    $wp_customize->add_setting('cta_social_facebook', [
        'default' => 'https://facebook.com/continuitytraining',
        'sanitize_callback' => 'esc_url_raw',
    ]);
    $wp_customize->add_control('cta_social_facebook', [
        'label' => __('Facebook URL', 'cta-theme'),
        'section' => 'cta_social_media',
        'type' => 'url',
    ]);
    
    // Instagram
    $wp_customize->add_setting('cta_social_instagram', [
        'default' => 'https://instagram.com/continuitytrainingacademy',
        'sanitize_callback' => 'esc_url_raw',
    ]);
    $wp_customize->add_control('cta_social_instagram', [
        'label' => __('Instagram URL', 'cta-theme'),
        'section' => 'cta_social_media',
        'type' => 'url',
    ]);
    
    // LinkedIn
    $wp_customize->add_setting('cta_social_linkedin', [
        'default' => 'https://www.linkedin.com/company/continuitytrainingacademy/',
        'sanitize_callback' => 'esc_url_raw',
    ]);
    $wp_customize->add_control('cta_social_linkedin', [
        'label' => __('LinkedIn URL', 'cta-theme'),
        'section' => 'cta_social_media',
        'type' => 'url',
    ]);
    
    // Twitter/X
    $wp_customize->add_setting('cta_social_twitter', [
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    ]);
    $wp_customize->add_control('cta_social_twitter', [
        'label' => __('X (Twitter) URL', 'cta-theme'),
        'section' => 'cta_social_media',
        'type' => 'url',
    ]);
    
    // =========================================
    // SEO SETTINGS SECTION
    // =========================================
    $wp_customize->add_section('cta_seo_settings', [
        'title' => __('SEO Settings', 'cta-theme'),
        'priority' => 40,
        'description' => __('Search engine optimisation settings.', 'cta-theme'),
    ]);
    
    // Default Site Description
    $wp_customize->add_setting('cta_seo_site_description', [
        'default' => 'Professional care sector training in Maidstone, Kent. CQC-compliant, CPD-accredited courses for healthcare professionals.',
        'sanitize_callback' => 'sanitize_textarea_field',
    ]);
    $wp_customize->add_control('cta_seo_site_description', [
        'label' => __('Default Meta Description', 'cta-theme'),
        'description' => __('Used for homepage and pages without a custom description. Max 160 characters.', 'cta-theme'),
        'section' => 'cta_seo_settings',
        'type' => 'textarea',
    ]);
    
    // Organisation Name
    $wp_customize->add_setting('cta_seo_org_name', [
        'default' => 'Continuity Training Academy',
        'sanitize_callback' => 'sanitize_text_field',
    ]);
    $wp_customize->add_control('cta_seo_org_name', [
        'label' => __('Organisation Name', 'cta-theme'),
        'description' => __('Used in structured data for Google.', 'cta-theme'),
        'section' => 'cta_seo_settings',
        'type' => 'text',
    ]);
    
    // Organisation Description
    $wp_customize->add_setting('cta_seo_org_description', [
        'default' => 'Professional care sector training provider in Maidstone, Kent. CQC-compliant, CPD-accredited courses since 2020.',
        'sanitize_callback' => 'sanitize_textarea_field',
    ]);
    $wp_customize->add_control('cta_seo_org_description', [
        'label' => __('Organisation Description', 'cta-theme'),
        'section' => 'cta_seo_settings',
        'type' => 'textarea',
    ]);
    
    // Founding Year
    $wp_customize->add_setting('cta_seo_founding_year', [
        'default' => '2020',
        'sanitize_callback' => 'sanitize_text_field',
    ]);
    $wp_customize->add_control('cta_seo_founding_year', [
        'label' => __('Founded Year', 'cta-theme'),
        'section' => 'cta_seo_settings',
        'type' => 'text',
    ]);
    
    // Latitude
    $wp_customize->add_setting('cta_seo_geo_lat', [
        'default' => '51.2795',
        'sanitize_callback' => 'sanitize_text_field',
    ]);
    $wp_customize->add_control('cta_seo_geo_lat', [
        'label' => __('Latitude', 'cta-theme'),
        'description' => __('For local SEO map placement.', 'cta-theme'),
        'section' => 'cta_seo_settings',
        'type' => 'text',
    ]);
    
    // Longitude
    $wp_customize->add_setting('cta_seo_geo_lng', [
        'default' => '0.5467',
        'sanitize_callback' => 'sanitize_text_field',
    ]);
    $wp_customize->add_control('cta_seo_geo_lng', [
        'label' => __('Longitude', 'cta-theme'),
        'section' => 'cta_seo_settings',
        'type' => 'text',
    ]);
    
    // Google Verification
    $wp_customize->add_setting('cta_seo_google_verification', [
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field',
    ]);
    $wp_customize->add_control('cta_seo_google_verification', [
        'label' => __('Google Site Verification', 'cta-theme'),
        'description' => __('Content value from Google Search Console.', 'cta-theme'),
        'section' => 'cta_seo_settings',
        'type' => 'text',
    ]);
    
    // Bing Verification
    $wp_customize->add_setting('cta_seo_bing_verification', [
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field',
    ]);
    $wp_customize->add_control('cta_seo_bing_verification', [
        'label' => __('Bing Site Verification', 'cta-theme'),
        'description' => __('Content value from Bing Webmaster Tools.', 'cta-theme'),
        'section' => 'cta_seo_settings',
        'type' => 'text',
    ]);
    
    // Twitter Handle
    $wp_customize->add_setting('cta_seo_twitter_handle', [
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field',
    ]);
    $wp_customize->add_control('cta_seo_twitter_handle', [
        'label' => __('Twitter/X Handle', 'cta-theme'),
        'description' => __('Without the @ symbol.', 'cta-theme'),
        'section' => 'cta_seo_settings',
        'type' => 'text',
    ]);
    
    // Default H1 Pattern
    $wp_customize->add_setting('cta_seo_default_h1_pattern', [
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field',
    ]);
    $wp_customize->add_control('cta_seo_default_h1_pattern', [
        'label' => __('Default H1 Pattern', 'cta-theme'),
        'description' => __('Pattern for H1 titles (use {title} for page name). Leave blank to use page title. Example: "{title} | Training Course"', 'cta-theme'),
        'section' => 'cta_seo_settings',
        'type' => 'text',
        'placeholder' => 'e.g., {title} | Professional Training',
    ]);
    
    // Default Meta Title Pattern
    $wp_customize->add_setting('cta_seo_default_meta_title_pattern', [
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field',
    ]);
    $wp_customize->add_control('cta_seo_default_meta_title_pattern', [
        'label' => __('Default Meta Title Pattern', 'cta-theme'),
        'description' => __('Pattern for meta titles (use {title} for page name). Leave blank to use page title. Example: "{title} | CPD Accredited | Maidstone"', 'cta-theme'),
        'section' => 'cta_seo_settings',
        'type' => 'text',
        'placeholder' => 'e.g., {title} | CPD Accredited Training',
    ]);
    
    // Default Meta Description Template
    $wp_customize->add_setting('cta_seo_default_meta_description_template', [
        'default' => '',
        'sanitize_callback' => 'sanitize_textarea_field',
    ]);
    $wp_customize->add_control('cta_seo_default_meta_description_template', [
        'label' => __('Default Meta Description Template', 'cta-theme'),
        'description' => __('Template for meta descriptions (use {title} and {excerpt}). Leave blank to use excerpt. Example: "Professional {title} training in Maidstone, Kent. {excerpt}"', 'cta-theme'),
        'section' => 'cta_seo_settings',
        'type' => 'textarea',
        'rows' => 3,
        'placeholder' => 'e.g., Professional {title} training in Maidstone, Kent. {excerpt}',
    ]);
    
    // Default Section Heading Text
    $wp_customize->add_setting('cta_seo_default_section_heading', [
        'default' => 'Course Overview',
        'sanitize_callback' => 'sanitize_text_field',
    ]);
    $wp_customize->add_control('cta_seo_default_section_heading', [
        'label' => __('Default Section Heading', 'cta-theme'),
        'description' => __('Default heading text for course/event overview sections. Can be overridden per course/event.', 'cta-theme'),
        'section' => 'cta_seo_settings',
        'type' => 'text',
    ]);
    
    // Courses Archive SEO
    $wp_customize->add_setting('cta_seo_courses_title', [
        'default' => 'Professional Training Courses',
        'sanitize_callback' => 'sanitize_text_field',
    ]);
    $wp_customize->add_control('cta_seo_courses_title', [
        'label' => __('Courses Page Title', 'cta-theme'),
        'description' => __('Meta title for the courses archive page.', 'cta-theme'),
        'section' => 'cta_seo_settings',
        'type' => 'text',
    ]);
    
    $wp_customize->add_setting('cta_seo_courses_description', [
        'default' => 'Browse our range of CQC-compliant, CPD-accredited care sector training courses in Maidstone, Kent.',
        'sanitize_callback' => 'sanitize_textarea_field',
    ]);
    $wp_customize->add_control('cta_seo_courses_description', [
        'label' => __('Courses Page Description', 'cta-theme'),
        'description' => __('Meta description for the courses archive page.', 'cta-theme'),
        'section' => 'cta_seo_settings',
        'type' => 'textarea',
        'rows' => 2,
    ]);
    
    // Events Archive SEO
    $wp_customize->add_setting('cta_seo_events_title', [
        'default' => 'Upcoming Training Courses',
        'sanitize_callback' => 'sanitize_text_field',
    ]);
    $wp_customize->add_control('cta_seo_events_title', [
        'label' => __('Events Page Title', 'cta-theme'),
        'description' => __('Meta title for the upcoming courses archive page.', 'cta-theme'),
        'section' => 'cta_seo_settings',
        'type' => 'text',
    ]);
    
    $wp_customize->add_setting('cta_seo_events_description', [
        'default' => 'Book your place on our scheduled training sessions in Maidstone, Kent. View dates and availability.',
        'sanitize_callback' => 'sanitize_textarea_field',
    ]);
    $wp_customize->add_control('cta_seo_events_description', [
        'label' => __('Events Page Description', 'cta-theme'),
        'description' => __('Meta description for the upcoming courses archive page.', 'cta-theme'),
        'section' => 'cta_seo_settings',
        'type' => 'textarea',
        'rows' => 2,
    ]);
    
    // =========================================
    // GENERAL SETTINGS SECTION
    // =========================================
    $wp_customize->add_section('cta_general_settings', [
        'title' => __('Theme Settings', 'cta-theme'),
        'priority' => 25,
    ]);
    
    // Trustpilot URL
    $wp_customize->add_setting('cta_trustpilot_url', [
        'default' => 'https://uk.trustpilot.com/review/continuitytrainingacademy.co.uk',
        'sanitize_callback' => 'esc_url_raw',
    ]);
    $wp_customize->add_control('cta_trustpilot_url', [
        'label' => __('Trustpilot Review Page URL', 'cta-theme'),
        'section' => 'cta_general_settings',
        'type' => 'url',
    ]);
    
    // Trustpilot Rating
    $wp_customize->add_setting('cta_trustpilot_rating', [
        'default' => '4.6/5',
        'sanitize_callback' => 'sanitize_text_field',
    ]);
    $wp_customize->add_control('cta_trustpilot_rating', [
        'label' => __('Trustpilot Rating', 'cta-theme'),
        'description' => __('Rating in format "4.6/5" or just "4.6"', 'cta-theme'),
        'section' => 'cta_general_settings',
        'type' => 'text',
    ]);
    
    // Trustpilot Review Count
    $wp_customize->add_setting('cta_trustpilot_review_count', [
        'default' => '20',
        'sanitize_callback' => 'absint',
    ]);
    $wp_customize->add_control('cta_trustpilot_review_count', [
        'label' => __('Trustpilot Review Count', 'cta-theme'),
        'description' => __('Total number of reviews on Trustpilot (used for schema markup)', 'cta-theme'),
        'section' => 'cta_general_settings',
        'type' => 'number',
        'input_attrs' => [
            'min' => 0,
            'step' => 1,
        ],
    ]);
    
    // Default Course Location
    $wp_customize->add_setting('cta_default_course_location', [
        'default' => 'The Maidstone Studios',
        'sanitize_callback' => 'sanitize_text_field',
    ]);
    $wp_customize->add_control('cta_default_course_location', [
        'label' => __('Default Course Location', 'cta-theme'),
        'section' => 'cta_general_settings',
        'type' => 'text',
    ]);
    
    // Booking Email
    $wp_customize->add_setting('cta_booking_email', [
        'default' => 'enquiries@continuitytrainingacademy.co.uk',
        'sanitize_callback' => 'sanitize_email',
    ]);
    $wp_customize->add_control('cta_booking_email', [
        'label' => __('Booking Notification Email', 'cta-theme'),
        'description' => __('Where booking enquiries should be sent.', 'cta-theme'),
        'section' => 'cta_general_settings',
        'type' => 'email',
    ]);
    
}
add_action('customize_register', 'cta_customize_register');

/**
 * Get contact info from Customizer settings
 * This replaces the ACF Options version
 */
function cta_get_contact_info_from_customizer() {
    $phone = get_theme_mod('cta_contact_phone', '01622 587343');
    
    return [
        'phone' => $phone,
        'phone_link' => 'tel:' . preg_replace('/[^0-9]/', '', $phone),
        'email' => get_theme_mod('cta_contact_email', 'enquiries@continuitytrainingacademy.co.uk'),
        'address' => [
            'line1' => get_theme_mod('cta_address_line1', 'Continuity Training Academy'),
            'line2' => get_theme_mod('cta_address_line2', 'The Maidstone Studios, New Cut Road'),
            'city' => get_theme_mod('cta_address_city', 'Maidstone, Kent'),
            'postcode' => get_theme_mod('cta_address_postcode', 'ME14 5NZ'),
        ],
        'social' => [
            'facebook' => get_theme_mod('cta_social_facebook', ''),
            'instagram' => get_theme_mod('cta_social_instagram', ''),
            'linkedin' => get_theme_mod('cta_social_linkedin', ''),
            'twitter' => get_theme_mod('cta_social_twitter', ''),
        ],
    ];
}

/**
 * Get SEO settings from Customizer
 */
function cta_get_seo_setting($key, $default = '') {
    $settings = [
        'site_description' => 'cta_seo_site_description',
        'org_name' => 'cta_seo_org_name',
        'org_description' => 'cta_seo_org_description',
        'founding_date' => 'cta_seo_founding_year',
        'geo_lat' => 'cta_seo_geo_lat',
        'geo_lng' => 'cta_seo_geo_lng',
        'google_verification' => 'cta_seo_google_verification',
        'bing_verification' => 'cta_seo_bing_verification',
        'twitter_handle' => 'cta_seo_twitter_handle',
    ];
    
    if (isset($settings[$key])) {
        return get_theme_mod($settings[$key], $default);
    }
    
    return $default;
}

/**
 * Live preview JS for Customizer
 */
function cta_customize_preview_js() {
    wp_enqueue_script(
        'cta-customizer-preview',
        CTA_THEME_URI . '/assets/js/customizer-preview.js',
        ['customize-preview'],
        CTA_THEME_VERSION,
        true
    );
}
add_action('customize_preview_init', 'cta_customize_preview_js');

