<?php
/**
 * ACF Field Definitions
 * 
 * Works with the FREE version of Advanced Custom Fields.
 * No PRO features (Repeaters, Options Pages) are used.
 *
 * @package CTA_Theme
 */

defined('ABSPATH') || exit;

/**
 * Check if ACF is active
 */
function cta_acf_is_active() {
    return class_exists('ACF');
}

/**
 * Show admin notice if ACF is not installed
 */
function cta_acf_admin_notice() {
    if (!cta_acf_is_active()) {
        ?>
        <div class="notice notice-warning is-dismissible">
            <p><strong>Continuity Training Academy Theme:</strong> For the best experience, install the free <a href="https://wordpress.org/plugins/advanced-custom-fields/" target="_blank">Advanced Custom Fields</a> plugin. The theme will work without it, but you'll have more control over course and page content with ACF installed.</p>
        </div>
        <?php
    }
}
add_action('admin_notices', 'cta_acf_admin_notice');

/**
 * Register ACF field groups programmatically
 * These all work with the FREE version of ACF
 */
function cta_register_acf_fields() {
    if (!function_exists('acf_add_local_field_group')) {
        return;
    }

    // =========================================
    // COURSE FIELDS - Main Details
    // =========================================
    acf_add_local_field_group([
        'key' => 'group_course_details',
        'title' => 'Course Details',
        'fields' => [
            [
                'key' => 'field_course_level',
                'label' => 'Level',
                'name' => 'course_level',
                'type' => 'text',
                'instructions' => 'e.g., Level 2, Level 3',
            ],
            [
                'key' => 'field_course_duration',
                'label' => 'Duration',
                'name' => 'course_duration',
                'type' => 'text',
                'instructions' => 'e.g., 1 Day, 2 Days, 3 Hours',
            ],
            [
                'key' => 'field_course_hours',
                'label' => 'Hours',
                'name' => 'course_hours',
                'type' => 'number',
                'instructions' => 'Total training hours (e.g., 6, 7.5)',
                'step' => 0.5,
            ],
            [
                'key' => 'field_course_trainer',
                'label' => 'Trainer',
                'name' => 'course_trainer',
                'type' => 'text',
                'instructions' => 'Primary trainer name',
            ],
            [
                'key' => 'field_course_price',
                'label' => 'Price',
                'name' => 'course_price',
                'type' => 'number',
                'instructions' => 'Price in GBP (e.g., 150.00)',
                'min' => 0,
                'step' => 0.01,
            ],
        ],
        'location' => [
            [
                [
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'course',
                ],
            ],
        ],
        'menu_order' => 0,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'left',
        'instruction_placement' => 'field',
    ]);

    // Course Content (for accordions)
    acf_add_local_field_group([
        'key' => 'group_course_content',
        'title' => 'Course Content',
        'fields' => [
            [
                'key' => 'field_course_description',
                'label' => 'Full Description',
                'name' => 'course_description',
                'type' => 'textarea',
                'instructions' => 'Course description',
                'rows' => 6,
                'placeholder' => 'Enter the full course description...',
            ],
            [
                'key' => 'field_generate_course_description',
                'label' => '',
                'name' => 'generate_course_description',
                'type' => 'message',
                'message' => '<button type="button" id="cta-generate-course-description" class="button button-small" style="margin-top: 6px;">✨ Generate with AI</button> <span id="cta-generate-description-status" style="margin-left: 10px; font-size: 12px;"></span>',
            ],
            [
                'key' => 'field_course_suitable_for',
                'label' => 'Who Should Attend',
                'name' => 'course_suitable_for',
                'type' => 'textarea',
                'instructions' => 'Target audience',
                'rows' => 4,
            ],
            [
                'key' => 'field_course_prerequisites',
                'label' => 'Requirements / Prerequisites',
                'name' => 'course_prerequisites',
                'type' => 'textarea',
                'instructions' => 'Prerequisites (optional)',
                'rows' => 3,
            ],
        ],
        'location' => [
            [
                [
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'course',
                ],
            ],
        ],
        'menu_order' => 1,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'top',
    ]);

    // Course Accreditation & Certification
    acf_add_local_field_group([
        'key' => 'group_course_accreditation',
        'title' => 'Accreditation & Certification',
        'fields' => [
            [
                'key' => 'field_course_accreditation',
                'label' => 'Accreditation',
                'name' => 'course_accreditation',
                'type' => 'text',
                'instructions' => 'e.g., "CPD Certified", "Skills for Care endorsed"',
                'wrapper' => ['width' => '50%'],
            ],
            [
                'key' => 'field_course_certificate',
                'label' => 'Certificate Info',
                'name' => 'course_certificate',
                'type' => 'text',
                'instructions' => 'e.g., "Certificate valid for 3 years"',
                'wrapper' => ['width' => '50%'],
            ],
        ],
        'location' => [
            [
                [
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'course',
                ],
            ],
        ],
        'menu_order' => 2,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'top',
    ]);

    // Course Learning Outcomes - NOW A TEXTAREA (one outcome per line)
    acf_add_local_field_group([
        'key' => 'group_course_outcomes',
        'title' => 'Learning Outcomes',
        'fields' => [
            [
                'key' => 'field_course_outcomes',
                'label' => 'What You Will Learn',
                'name' => 'course_outcomes',
                'type' => 'textarea',
                'instructions' => 'Enter learning outcomes, one per line. These show in the "What You\'ll Learn" accordion.',
                'rows' => 8,
                'placeholder' => "Understand the principles of person-centred care\nRecognise signs and symptoms of common conditions\nApply safe moving and handling techniques\nCommunicate effectively with service users",
            ],
        ],
        'location' => [
            [
                [
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'course',
                ],
            ],
        ],
        'menu_order' => 3,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'top',
    ]);

    // Course SEO Fields - User-friendly SEO section (optional overrides)
    acf_add_local_field_group([
        'key' => 'group_course_seo',
        'title' => 'SEO & Content Settings (Optional Overrides)',
        'fields' => [
            [
                'key' => 'field_course_seo_h1',
                'label' => 'Custom H1 Title',
                'name' => 'course_seo_h1',
                'type' => 'text',
                'instructions' => '',
                'placeholder' => 'e.g., Professional Care Training Course',
                'maxlength' => 100,
            ],
            [
                'key' => 'field_course_seo_meta_title',
                'label' => 'Meta Title (SEO)',
                'name' => 'course_seo_meta_title',
                'type' => 'text',
                'instructions' => '50-60 chars (optional, defaults to title)',
                'placeholder' => 'e.g., Professional Care Training Course | CPD Accredited',
                'maxlength' => 60,
            ],
            [
                'key' => 'field_course_seo_meta_description',
                'label' => 'Meta Description (SEO)',
                'name' => 'course_seo_meta_description',
                'type' => 'textarea',
                'instructions' => 'Optional: Custom description for search engines. If left blank, uses site-wide meta description template from Customizer → SEO Settings. Recommended: 150-160 characters.',
                'rows' => 3,
                'maxlength' => 160,
                'placeholder' => 'e.g., Professional CPD-accredited care training course in Maidstone, Kent. Learn essential skills for care sector professionals.',
            ],
            [
                'key' => 'field_generate_course_meta_description',
                'label' => '',
                'name' => 'generate_course_meta_description',
                'type' => 'message',
                'message' => '<button type="button" id="cta-generate-course-meta-description" class="button button-small" style="margin-top: 6px;">✨ Generate with AI</button> <span id="cta-generate-meta-description-status" style="margin-left: 10px; font-size: 12px;"></span>',
            ],
            [
                'key' => 'field_course_seo_excerpt',
                'label' => 'Page Excerpt',
                'name' => 'course_seo_excerpt',
                'type' => 'textarea',
                'instructions' => 'Optional: Short description for course cards and search results. If left blank, WordPress excerpt will be used.',
                'rows' => 4,
                'placeholder' => 'Brief overview of the course content and who it\'s for...',
            ],
            [
                'key' => 'field_course_seo_section_heading',
                'label' => 'Section Heading Text',
                'name' => 'course_seo_section_heading',
                'type' => 'text',
                'instructions' => '',
                'placeholder' => 'e.g., Course Overview, What This Course Covers',
            ],
        ],
        'location' => [
            [
                [
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'course',
                ],
            ],
        ],
        'menu_order' => 4,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'top',
    ]);

    // =========================================
    // COURSE EVENT (SCHEDULED SESSION) FIELDS
    // =========================================
    acf_add_local_field_group([
        'key' => 'group_course_event_details',
        'title' => 'Event Details',
        'fields' => [
            [
                'key' => 'field_linked_course',
                'label' => 'Related Course',
                'name' => 'linked_course',
                'type' => 'post_object',
                'instructions' => 'Select the course this event is for',
                'required' => 1,
                'post_type' => ['course'],
                'return_format' => 'object',
                'ui' => 1,
            ],
            [
                'key' => 'field_event_date',
                'label' => 'Event Date',
                'name' => 'event_date',
                'type' => 'date_picker',
                'instructions' => 'Date of the training event',
                'required' => 1,
                'display_format' => 'd/m/Y',
                'return_format' => 'Y-m-d',
                'first_day' => 1,
            ],
            [
                'key' => 'field_start_time',
                'label' => 'Start Time',
                'name' => 'start_time',
                'type' => 'time_picker',
                'instructions' => 'Start time of the event',
                'display_format' => 'H:i',
                'return_format' => 'H:i',
                'wrapper' => ['width' => '50%'],
            ],
            [
                'key' => 'field_end_time',
                'label' => 'End Time',
                'name' => 'end_time',
                'type' => 'time_picker',
                'instructions' => 'End time of the event',
                'display_format' => 'H:i',
                'return_format' => 'H:i',
                'wrapper' => ['width' => '50%'],
            ],
            [
                'key' => 'field_event_location',
                'label' => 'Venue',
                'name' => 'event_location',
                'type' => 'text',
                'instructions' => 'Training venue location',
                'default_value' => 'The Maidstone Studios',
            ],
            [
                'key' => 'field_total_spaces',
                'label' => 'Total Capacity',
                'name' => 'total_spaces',
                'type' => 'number',
                'instructions' => 'Maximum number of spaces for this event',
                'min' => 1,
                'default_value' => 12,
                'required' => 1,
                'wrapper' => ['width' => '50%'],
            ],
            [
                'key' => 'field_spaces_available',
                'label' => 'Spaces Available',
                'name' => 'spaces_available',
                'type' => 'number',
                'instructions' => 'Number of spaces currently available (starts equal to Total Capacity = 0 booked)',
                'min' => 0,
                'default_value' => 12,
                'wrapper' => ['width' => '50%'],
            ],
            [
                'key' => 'field_event_price',
                'label' => 'Custom Price',
                'name' => 'event_price',
                'type' => 'number',
                'instructions' => '',
                'min' => 0,
                'step' => 0.01,
            ],
            [
                'key' => 'field_event_active',
                'label' => 'Event Status',
                'name' => 'event_active',
                'type' => 'true_false',
                'instructions' => 'Uncheck to hide this event from the website',
                'default_value' => 1,
                'ui' => 1,
                'ui_on_text' => 'Active',
                'ui_off_text' => 'Hidden',
                'message' => 'Active (show on website)',
            ],
            [
                'key' => 'field_event_featured',
                'label' => 'Featured Event',
                'name' => 'event_featured',
                'type' => 'true_false',
                'instructions' => '',
                'default_value' => 0,
                'ui' => 1,
                'message' => 'Feature this event in hero section',
            ],
            [
                'key' => 'field_event_image',
                'label' => 'Event Image',
                'name' => 'event_image',
                'type' => 'image',
                'instructions' => 'Custom image for this event. If not set, will use the linked course image.',
                'return_format' => 'array',
                'preview_size' => 'thumbnail',
                'library' => 'all',
            ],
        ],
        'location' => [
            [
                [
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'course_event',
                ],
            ],
        ],
        'menu_order' => 0,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'left',
        'instruction_placement' => 'field',
    ]);

    // Course Event SEO Fields - User-friendly SEO section (optional overrides)
    acf_add_local_field_group([
        'key' => 'group_course_event_seo',
        'title' => 'SEO & Content Settings (Optional Overrides)',
        'fields' => [
            [
                'key' => 'field_event_seo_h1',
                'label' => 'Custom H1 Title',
                'name' => 'event_seo_h1',
                'type' => 'text',
                'instructions' => '',
                'placeholder' => 'e.g., Epilepsy & Emergency Medication Training',
                'maxlength' => 100,
            ],
            [
                'key' => 'field_event_seo_meta_title',
                'label' => 'Meta Title (SEO)',
                'name' => 'event_seo_meta_title',
                'type' => 'text',
                'instructions' => '50-60 chars (optional, defaults to title)',
                'placeholder' => 'e.g., Epilepsy Training Course | Book Now | Maidstone',
                'maxlength' => 60,
            ],
            [
                'key' => 'field_event_seo_meta_description',
                'label' => 'Meta Description (SEO)',
                'name' => 'event_seo_meta_description',
                'type' => 'textarea',
                'instructions' => 'Optional: Custom description for search engines. If left blank, uses site-wide meta description template from Customizer → SEO Settings. Recommended: 150-160 characters.',
                'rows' => 3,
                'maxlength' => 160,
                'placeholder' => 'e.g., Book your place on our Epilepsy & Emergency Medication training course in Maidstone. CPD-accredited, expert-led sessions.',
            ],
            [
                'key' => 'field_event_seo_excerpt',
                'label' => 'Page Excerpt',
                'name' => 'event_seo_excerpt',
                'type' => 'textarea',
                'instructions' => 'Optional: Short description for event cards and search results. If left blank, WordPress excerpt will be used.',
                'rows' => 4,
                'placeholder' => 'Brief overview of the training session...',
            ],
            [
                'key' => 'field_event_seo_section_heading',
                'label' => 'Section Heading Text',
                'name' => 'event_seo_section_heading',
                'type' => 'text',
                'instructions' => '',
                'placeholder' => 'e.g., Event Overview, Training Details',
            ],
        ],
        'location' => [
            [
                [
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'course_event',
                ],
            ],
        ],
        'menu_order' => 1,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'top',
    ]);

    // =========================================
    // HOMEPAGE FIELDS - Comprehensive editable text areas
    // =========================================
    acf_add_local_field_group([
        'key' => 'group_homepage_content',
        'title' => 'Homepage Content',
        'fields' => [
            // Tab: Hero Section
            [
                'key' => 'field_homepage_tab_hero',
                'label' => 'Hero Section',
                'name' => '',
                'type' => 'tab',
                'placement' => 'top',
            ],
            [
                'key' => 'field_hero_headline',
                'label' => 'Headline',
                'name' => 'hero_headline',
                'type' => 'text',
                'default_value' => 'CQC-Compliant Care Training in Kent',
                'wrapper' => ['width' => '100%'],
            ],
            [
                'key' => 'field_hero_subheadline',
                'label' => 'Subheadline',
                'name' => 'hero_subheadline',
                'type' => 'textarea',
                'default_value' => 'Expert-led accredited training courses designed to keep your team compliant, confident, and care-focused.',
                'rows' => 2,
            ],
            [
                'key' => 'field_hero_cta_text',
                'label' => 'Primary Button Text',
                'name' => 'hero_cta_text',
                'type' => 'text',
                'default_value' => 'Find My Course',
                'wrapper' => ['width' => '50%'],
            ],
            [
                'key' => 'field_hero_cta_link',
                'label' => 'Primary Button Link',
                'name' => 'hero_cta_link',
                'type' => 'page_link',
                'post_type' => ['page', 'course'],
                'wrapper' => ['width' => '50%'],
            ],
            
            // Tab: Partners Section
            [
                'key' => 'field_homepage_tab_partners',
                'label' => 'Partners Section',
                'name' => '',
                'type' => 'tab',
                'placement' => 'top',
            ],
            [
                'key' => 'field_partners_title',
                'label' => 'Partners Section Title',
                'name' => 'partners_title',
                'type' => 'text',
                'default_value' => 'Trusted by Care Providers Across the United Kingdom',
                'instructions' => 'Use {focus} to wrap text that should be highlighted (e.g., "Trusted by Care Providers Across the {focus}United Kingdom{/focus}")',
            ],
            
            // Tab: Why Us Section
            [
                'key' => 'field_homepage_tab_why_us',
                'label' => 'Why Us Section',
                'name' => '',
                'type' => 'tab',
                'placement' => 'top',
            ],
            [
                'key' => 'field_why_us_eyebrow',
                'label' => 'Eyebrow Text',
                'name' => 'why_us_eyebrow',
                'type' => 'text',
                'default_value' => 'Why us?',
            ],
            [
                'key' => 'field_why_us_title',
                'label' => 'Section Title',
                'name' => 'why_us_title',
                'type' => 'text',
                'default_value' => 'Experience the Difference',
            ],
            [
                'key' => 'field_why_us_subtitle',
                'label' => 'Section Subtitle',
                'name' => 'why_us_subtitle',
                'type' => 'textarea',
                'default_value' => 'Discover the benefits that make our platform the first choice for teams striving for excellence.',
                'rows' => 2,
            ],
            // Card 1
            [
                'key' => 'field_why_us_card1_title',
                'label' => 'Card 1: Title',
                'name' => 'why_us_card1_title',
                'type' => 'text',
                'default_value' => 'DBS-checked trainers',
                'wrapper' => ['width' => '50%'],
            ],
            [
                'key' => 'field_why_us_card1_description',
                'label' => 'Card 1: Description',
                'name' => 'why_us_card1_description',
                'type' => 'textarea',
                'default_value' => 'Trusted professionals you can safely invite into your setting with complete peace of mind',
                'rows' => 2,
                'wrapper' => ['width' => '50%'],
            ],
            [
                'key' => 'field_why_us_card1_list',
                'label' => 'Card 1: List Items',
                'name' => 'why_us_card1_list',
                'type' => 'textarea',
                'default_value' => "Enhanced DBS clearance\nProfessional indemnity insurance\nRegular background updates",
                'instructions' => 'Enter one item per line',
                'rows' => 3,
            ],
            // Card 2
            [
                'key' => 'field_why_us_card2_title',
                'label' => 'Card 2: Title',
                'name' => 'why_us_card2_title',
                'type' => 'text',
                'default_value' => 'Accredited certificates',
                'wrapper' => ['width' => '50%'],
            ],
            [
                'key' => 'field_why_us_card2_description',
                'label' => 'Card 2: Description',
                'name' => 'why_us_card2_description',
                'type' => 'textarea',
                'default_value' => 'No waiting for paperwork. Stay audit-ready instantly with immediate proof of competency',
                'rows' => 2,
                'wrapper' => ['width' => '50%'],
            ],
            [
                'key' => 'field_why_us_card2_list',
                'label' => 'Card 2: List Items',
                'name' => 'why_us_card2_list',
                'type' => 'textarea',
                'default_value' => "Digital & physical certificates\nEmail certificate delivery\nAutomatic renewal reminders",
                'instructions' => 'Enter one item per line',
                'rows' => 3,
            ],
            // Card 3
            [
                'key' => 'field_why_us_card3_title',
                'label' => 'Card 3: Title',
                'name' => 'why_us_card3_title',
                'type' => 'text',
                'default_value' => 'Flexible delivery',
                'wrapper' => ['width' => '50%'],
            ],
            [
                'key' => 'field_why_us_card3_description',
                'label' => 'Card 3: Description',
                'name' => 'why_us_card3_description',
                'type' => 'textarea',
                'default_value' => 'Train at your location or ours, whatever works for your team\'s schedule without disrupting care',
                'rows' => 2,
                'wrapper' => ['width' => '50%'],
            ],
            [
                'key' => 'field_why_us_card3_list',
                'label' => 'Card 3: List Items',
                'name' => 'why_us_card3_list',
                'type' => 'textarea',
                'default_value' => "On-site training available\nModern classroom facilities\nFlexible scheduling options",
                'instructions' => 'Enter one item per line',
                'rows' => 3,
            ],
            
            // Tab: Course Categories Section
            [
                'key' => 'field_homepage_tab_courses',
                'label' => 'Course Categories Section',
                'name' => '',
                'type' => 'tab',
                'placement' => 'top',
            ],
            [
                'key' => 'field_courses_title',
                'label' => 'Section Title',
                'name' => 'courses_title',
                'type' => 'text',
                'default_value' => 'Care Sector Training',
            ],
            [
                'key' => 'field_courses_subtitle',
                'label' => 'Section Subtitle',
                'name' => 'courses_subtitle',
                'type' => 'text',
                'default_value' => 'Essential to specialist care skills',
            ],
            
            // Tab: Testimonials Section
            [
                'key' => 'field_homepage_tab_testimonials',
                'label' => 'Testimonials Section',
                'name' => '',
                'type' => 'tab',
                'placement' => 'top',
            ],
            [
                'key' => 'field_testimonials_title',
                'label' => 'Section Title',
                'name' => 'testimonials_title',
                'type' => 'text',
                'default_value' => 'What Our Learners Say',
            ],
            [
                'key' => 'field_testimonials_subtitle',
                'label' => 'Section Subtitle',
                'name' => 'testimonials_subtitle',
                'type' => 'textarea',
                'default_value' => 'Real feedback from care professionals who have completed our training courses and experienced the difference in their practice.',
                'rows' => 2,
            ],
        ],
        'location' => [
            [
                [
                    'param' => 'page_type',
                    'operator' => '==',
                    'value' => 'front_page',
                ],
            ],
        ],
        'menu_order' => 0,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'top',
    ]);

    // =========================================
    // ABOUT PAGE FIELDS - Comprehensive content editor
    // =========================================
    acf_add_local_field_group([
        'key' => 'group_about_page',
        'title' => 'About Page Content',
        'fields' => [
            // Tab: Hero Section
            [
                'key' => 'field_about_tab_hero',
                'label' => 'Hero Section',
                'name' => '',
                'type' => 'tab',
                'placement' => 'top',
            ],
            [
                'key' => 'field_about_hero_title',
                'label' => 'Hero Title (H1)',
                'name' => 'hero_title',
                'type' => 'text',
                'default_value' => 'About Our Care Training in Kent',
                'placeholder' => 'e.g., About Our Care Training in Kent',
            ],
            [
                'key' => 'field_about_hero_subtitle',
                'label' => 'Hero Subtitle',
                'name' => 'hero_subtitle',
                'type' => 'textarea',
                'default_value' => 'CQC-compliant, CPD-accredited care sector training in Kent since 2020',
                'rows' => 2,
            ],
            
            // Tab: Mission Section
            [
                'key' => 'field_about_tab_mission',
                'label' => 'Mission Section',
                'name' => '',
                'type' => 'tab',
                'placement' => 'top',
            ],
            [
                'key' => 'field_about_mission_title',
                'label' => 'Mission Title (H2)',
                'name' => 'mission_title',
                'type' => 'text',
                'default_value' => 'Our Care Training Approach',
            ],
            [
                'key' => 'field_about_mission_text',
                'label' => 'Mission Content',
                'name' => 'mission_text',
                'type' => 'repeater',
                'instructions' => 'Add paragraphs for the mission section. Each paragraph will be displayed separately.',
                'layout' => 'block',
                'button_label' => 'Add Paragraph',
                'min' => 0,
                'sub_fields' => [
                    [
                        'key' => 'field_about_mission_paragraph',
                        'label' => 'Paragraph',
                        'name' => 'paragraph',
                        'type' => 'wysiwyg',
                        'tabs' => 'visual',
                        'toolbar' => 'basic',
                        'media_upload' => 0,
                    ],
                ],
            ],
            [
                'key' => 'field_about_mission_image',
                'label' => 'Mission Image',
                'name' => 'mission_image',
                'type' => 'image',
                'instructions' => 'Image displayed alongside the mission content',
                'return_format' => 'url',
                'preview_size' => 'medium',
                'library' => 'all',
            ],
            
            // Tab: Values Section
            [
                'key' => 'field_about_tab_values',
                'label' => 'Values Section',
                'name' => '',
                'type' => 'tab',
                'placement' => 'top',
            ],
            [
                'key' => 'field_about_values_title',
                'label' => 'Values Title (H2)',
                'name' => 'values_title',
                'type' => 'text',
                'default_value' => 'Core Care Training Values',
            ],
            [
                'key' => 'field_about_values_subtitle',
                'label' => 'Values Subtitle',
                'name' => 'values_subtitle',
                'type' => 'textarea',
                'default_value' => 'These principles guide everything we do and shape the experience we provide to our learners.',
                'rows' => 2,
            ],
            [
                'key' => 'field_about_values',
                'label' => 'Values',
                'name' => 'values',
                'type' => 'repeater',
                'instructions' => 'Add value cards displayed in the values grid',
                'layout' => 'block',
                'button_label' => 'Add Value',
                'min' => 0,
                'sub_fields' => [
                    [
                        'key' => 'field_about_value_icon',
                        'label' => 'Icon Class',
                        'name' => 'icon',
                        'type' => 'text',
                        'instructions' => 'Font Awesome icon class (e.g., fas fa-hands-helping)',
                        'placeholder' => 'fas fa-hands-helping',
                    ],
                    [
                        'key' => 'field_about_value_title',
                        'label' => 'Value Title',
                        'name' => 'title',
                        'type' => 'text',
                        'required' => 1,
                    ],
                    [
                        'key' => 'field_about_value_description',
                        'label' => 'Value Description',
                        'name' => 'description',
                        'type' => 'textarea',
                        'required' => 1,
                        'rows' => 3,
                    ],
                ],
            ],
            
            // Tab: Statistics
            [
                'key' => 'field_about_tab_stats',
                'label' => 'Statistics',
                'name' => '',
                'type' => 'tab',
                'placement' => 'top',
            ],
            [
                'key' => 'field_about_stats',
                'label' => 'Statistics',
                'name' => 'stats',
                'type' => 'repeater',
                'instructions' => 'Add statistics displayed on the page',
                'layout' => 'table',
                'button_label' => 'Add Statistic',
                'min' => 0,
                'sub_fields' => [
                    [
                        'key' => 'field_about_stat_number',
                        'label' => 'Number',
                        'name' => 'number',
                        'type' => 'text',
                        'required' => 1,
                        'placeholder' => 'e.g., 40+, 2020, 4.6/5',
                    ],
                    [
                        'key' => 'field_about_stat_label',
                        'label' => 'Label',
                        'name' => 'label',
                        'type' => 'text',
                        'required' => 1,
                        'placeholder' => 'e.g., Courses Offered',
                    ],
                ],
            ],
            
            // Tab: Team Section
            [
                'key' => 'field_about_tab_team',
                'label' => 'Team Section',
                'name' => '',
                'type' => 'tab',
                'placement' => 'top',
            ],
            [
                'key' => 'field_about_team_title',
                'label' => 'Team Title (H2)',
                'name' => 'team_title',
                'type' => 'text',
                'default_value' => 'Expert Care Training Team',
            ],
            [
                'key' => 'field_about_team_subtitle',
                'label' => 'Team Subtitle',
                'name' => 'team_subtitle',
                'type' => 'textarea',
                'default_value' => 'Experienced professionals dedicated to your development',
                'rows' => 2,
            ],
            [
                'key' => 'field_about_team_note',
                'label' => 'Note',
                'name' => '',
                'type' => 'message',
                'message' => 'Team members are managed separately via the Team Members post type. This section will automatically display directors from that post type.',
            ],
            
            // Tab: CTA Section
            [
                'key' => 'field_about_tab_cta',
                'label' => 'Call to Action',
                'name' => '',
                'type' => 'tab',
                'placement' => 'top',
            ],
            [
                'key' => 'field_about_cta_title',
                'label' => 'CTA Title',
                'name' => 'cta_title',
                'type' => 'text',
                'default_value' => 'Start Your Care Training Today',
            ],
            [
                'key' => 'field_about_cta_text',
                'label' => 'CTA Text',
                'name' => 'cta_text',
                'type' => 'textarea',
                'default_value' => 'Join hundreds of care professionals who trust us for their training needs. Get expert CQC compliance training with CPD-accredited certificates.',
                'rows' => 3,
            ],
        ],
        'location' => [
            [
                [
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'page-templates/page-about.php',
                ],
            ],
        ],
        'menu_order' => 0,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'top',
    ]);

    // =========================================
    // NEWS/BLOG POST FIELDS - Introduction (Separate Section)
    // =========================================
    acf_add_local_field_group([
        'key' => 'group_news_article_intro',
        'title' => '📖 Article Introduction',
        'fields' => [
            [
                'key' => 'field_news_intro',
                'label' => 'Introduction / Lead Paragraph',
                'name' => 'news_intro',
                'type' => 'wysiwyg',
                'instructions' => 'Write a compelling introduction that appears at the start of your article. This will be styled prominently as the lead paragraph, separate from the main article content below.',
                'tabs' => 'visual',
                'toolbar' => 'basic',
                'media_upload' => 0,
                'delay' => 0,
                'placeholder' => 'Write a compelling introduction that summarizes the key points of your article and hooks the reader...',
                'required' => 0,
            ],
        ],
        'location' => [
            [
                [
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'post',
                ],
            ],
        ],
        'menu_order' => 0,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'top',
        'hide_on_screen' => '',
    ]);

    // =========================================
    // NEWS/BLOG POST FIELDS - Main Content Fields
    // =========================================
    acf_add_local_field_group([
        'key' => 'group_news_article_content',
        'title' => '📝 Article Content',
        'fields' => [
            [
                'key' => 'field_news_sections',
                'label' => 'Article Sections',
                'name' => 'news_sections',
                'type' => 'repeater',
                'instructions' => 'Add sections to organize your article content. Each section has a title and content. This is the main body of your article, separate from the introduction above.',
                'layout' => 'block',
                'button_label' => 'Add Section',
                'min' => 0,
                'sub_fields' => [
                    [
                        'key' => 'field_news_section_title',
                        'label' => 'Section Title',
                        'name' => 'section_title',
                        'type' => 'text',
                        'instructions' => 'The heading for this section (e.g., "What You Need to Know", "Key Changes")',
                        'required' => 1,
                        'placeholder' => 'Enter section title...',
                    ],
                    [
                        'key' => 'field_news_section_content',
                        'label' => 'Section Content',
                        'name' => 'section_content',
                        'type' => 'wysiwyg',
                        'instructions' => 'The main content for this section. Use H2 for main headings, H3 for subheadings. H1 is not available (post title is already H1).',
                        'required' => 1,
                        'tabs' => 'all',
                        'toolbar' => 'full',
                        'media_upload' => 1,
                        'delay' => 0,
                    ],
                ],
            ],
        ],
        'location' => [
            [
                [
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'post',
                ],
            ],
        ],
        'menu_order' => 1,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'top',
        'hide_on_screen' => '',
    ]);

    // Article Settings (Sidebar)
    acf_add_local_field_group([
        'key' => 'group_news_article',
        'title' => '⚙️ Article Settings',
        'fields' => [
            [
                'key' => 'field_news_featured',
                'label' => 'Featured Article',
                'name' => 'news_featured',
                'type' => 'true_false',
                'instructions' => 'Mark this as a featured article to highlight it on the news page',
                'ui' => 1,
                'ui_on_text' => 'Featured',
                'ui_off_text' => 'Normal',
                'default_value' => 0,
            ],
            [
                'key' => 'field_news_subtitle',
                'label' => 'Subtitle / Standfirst',
                'name' => 'news_subtitle',
                'type' => 'textarea',
                'instructions' => 'A brief summary that appears below the title (optional - excerpt will be used if empty)',
                'rows' => 2,
                'new_lines' => '',
            ],
            [
                'key' => 'field_news_author',
                'label' => 'Author Display Name',
                'name' => 'news_author',
                'type' => 'text',
                'instructions' => 'Override the author name displayed on the article (leave blank to use WordPress author)',
                'placeholder' => 'e.g., CTA Team, Jennifer Boorman',
            ],
        ],
        'location' => [
            [
                [
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'post',
                ],
            ],
        ],
        'menu_order' => 1,
        'position' => 'side',
        'style' => 'default',
        'label_placement' => 'top',
    ]);

    // =========================================
    // GENERAL PAGE CONTENT - For all pages (not posts, not homepage, not about)
    // Comprehensive tabbed interface matching homepage style
    // =========================================
    acf_add_local_field_group([
        'key' => 'group_page_content',
        'title' => 'Page Content',
        'fields' => [
            // Tab: Hero Section
            [
                'key' => 'field_page_tab_hero',
                'label' => 'Hero Section',
                'name' => '',
                'type' => 'tab',
                'placement' => 'top',
            ],
            [
                'key' => 'field_page_hero_title',
                'label' => 'Hero Title (H1)',
                'name' => 'hero_title',
                'type' => 'text',
                'instructions' => 'The main H1 heading for the page. Leave blank to use the page title.',
                'placeholder' => 'e.g., Professional Group Training Solutions',
                'maxlength' => 100,
                'wrapper' => ['width' => '100%'],
            ],
            [
                'key' => 'field_page_hero_subtitle',
                'label' => 'Hero Subtitle / Introduction',
                'name' => 'hero_subtitle',
                'type' => 'textarea',
                'instructions' => 'A subtitle or introduction paragraph that appears below the H1 in the hero section.',
                'rows' => 3,
                'placeholder' => 'e.g., Train your entire team together. Flexible scheduling, accredited certificates...',
            ],
            
            // Tab: Section Headings & Titles
            [
                'key' => 'field_page_tab_sections',
                'label' => 'Section Headings',
                'name' => '',
                'type' => 'tab',
                'placement' => 'top',
            ],
            [
                'key' => 'field_page_section_how_it_works_title',
                'label' => 'How It Works Section - Title (H2)',
                'name' => 'section_how_it_works_title',
                'type' => 'text',
                'instructions' => 'Title for the "How It Works" section (used on Group Training page)',
                'placeholder' => 'e.g., How It Works',
            ],
            [
                'key' => 'field_page_section_testimonials_title',
                'label' => 'Testimonials Section - Title (H2)',
                'name' => 'section_testimonials_title',
                'type' => 'text',
                'instructions' => 'Title for the testimonials section',
                'placeholder' => 'e.g., Trusted by Care Teams Across Kent',
            ],
            [
                'key' => 'field_page_section_benefits_title',
                'label' => 'Benefits Section - Title (H2)',
                'name' => 'section_benefits_title',
                'type' => 'text',
                'instructions' => 'Title for the benefits section',
                'placeholder' => 'e.g., Why Choose Group Training?',
            ],
            [
                'key' => 'field_page_section_benefits_subtitle',
                'label' => 'Benefits Section - Subtitle',
                'name' => 'section_benefits_subtitle',
                'type' => 'textarea',
                'instructions' => 'Subtitle text below the benefits section title',
                'rows' => 2,
                'placeholder' => 'e.g., Maximise value while maintaining quality training standards',
            ],
            [
                'key' => 'field_page_section_form_title',
                'label' => 'Form Section - Title (H2)',
                'name' => 'section_form_title',
                'type' => 'text',
                'instructions' => 'Title for the contact/booking form section',
                'placeholder' => 'e.g., Get Your Custom Training Quote in 24 Hours',
            ],
            [
                'key' => 'field_page_section_form_description',
                'label' => 'Form Section - Description',
                'name' => 'section_form_description',
                'type' => 'textarea',
                'instructions' => 'Description text above the form',
                'rows' => 2,
                'placeholder' => 'e.g., Tell us about your team and training needs...',
            ],
            [
                'key' => 'field_page_section_faq_title',
                'label' => 'FAQ Section - Title (H2)',
                'name' => 'section_faq_title',
                'type' => 'text',
                'instructions' => 'Title for the FAQ section',
                'placeholder' => 'e.g., Frequently Asked Questions',
            ],
            
            // Tab: Content Sections
            [
                'key' => 'field_page_tab_content',
                'label' => 'Content Sections',
                'name' => '',
                'type' => 'tab',
                'placement' => 'top',
            ],
            [
                'key' => 'field_page_content_sections',
                'label' => 'Page Sections',
                'name' => 'page_content_sections',
                'type' => 'repeater',
                'instructions' => 'Add content sections to your page. Each section has an H2 heading and rich text content (paragraphs, lists, etc.).',
                'layout' => 'block',
                'button_label' => 'Add Content Section',
                'min' => 0,
                'sub_fields' => [
                    [
                        'key' => 'field_page_section_heading',
                        'label' => 'Section Heading (H2)',
                        'name' => 'section_heading',
                        'type' => 'text',
                        'instructions' => 'The H2 heading for this section',
                        'required' => 1,
                        'placeholder' => 'e.g., How It Works, Our Services, What We Offer',
                    ],
                    [
                        'key' => 'field_page_section_content',
                        'label' => 'Section Content',
                        'name' => 'section_content',
                        'type' => 'wysiwyg',
                        'instructions' => 'The main content for this section. Use H3 for subheadings, paragraphs, lists, etc. H1 and H2 are not available here (use H2 for the section heading above, H3 for subheadings within content).',
                        'required' => 1,
                        'tabs' => 'all',
                        'toolbar' => 'full',
                        'media_upload' => 1,
                        'delay' => 0,
                    ],
                ],
            ],
            
            // Tab: Testimonials
            [
                'key' => 'field_page_tab_testimonials',
                'label' => 'Testimonials',
                'name' => '',
                'type' => 'tab',
                'placement' => 'top',
            ],
            [
                'key' => 'field_page_testimonials',
                'label' => 'Testimonials',
                'name' => 'testimonials',
                'type' => 'repeater',
                'instructions' => 'Add testimonials to display on the page',
                'layout' => 'block',
                'button_label' => 'Add Testimonial',
                'min' => 0,
                'sub_fields' => [
                    [
                        'key' => 'field_page_testimonial_quote',
                        'label' => 'Quote',
                        'name' => 'quote',
                        'type' => 'textarea',
                        'required' => 1,
                        'rows' => 3,
                    ],
                    [
                        'key' => 'field_page_testimonial_author',
                        'label' => 'Author',
                        'name' => 'author',
                        'type' => 'text',
                        'required' => 1,
                    ],
                    [
                        'key' => 'field_page_testimonial_icon',
                        'label' => 'Icon Class',
                        'name' => 'icon',
                        'type' => 'text',
                        'instructions' => 'Font Awesome icon class (e.g., fas fa-building, fas fa-user)',
                        'placeholder' => 'fas fa-user',
                    ],
                ],
            ],
            
            // Tab: FAQs
            [
                'key' => 'field_page_tab_faq',
                'label' => 'FAQs',
                'name' => '',
                'type' => 'tab',
                'placement' => 'top',
            ],
            [
                'key' => 'field_page_faqs',
                'label' => 'Frequently Asked Questions',
                'name' => 'faqs',
                'type' => 'repeater',
                'instructions' => 'Add FAQ items. Categories: general, pricing, scheduling, policies',
                'layout' => 'block',
                'button_label' => 'Add FAQ',
                'min' => 0,
                'sub_fields' => [
                    [
                        'key' => 'field_page_faq_category',
                        'label' => 'Category',
                        'name' => 'category',
                        'type' => 'select',
                        'choices' => [
                            'general' => 'General Questions',
                            'pricing' => 'Pricing',
                            'scheduling' => 'Scheduling',
                            'policies' => 'Policies',
                        ],
                        'default_value' => 'general',
                        'required' => 1,
                    ],
                    [
                        'key' => 'field_page_faq_question',
                        'label' => 'Question',
                        'name' => 'question',
                        'type' => 'text',
                        'required' => 1,
                    ],
                    [
                        'key' => 'field_page_faq_answer',
                        'label' => 'Answer',
                        'name' => 'answer',
                        'type' => 'textarea',
                        'required' => 1,
                        'rows' => 3,
                    ],
                ],
            ],
        ],
        'location' => [
            [
                [
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'page',
                ],
                [
                    'param' => 'page_type',
                    'operator' => '!=',
                    'value' => 'front_page',
                ],
                [
                    'param' => 'page_template',
                    'operator' => '!=',
                    'value' => 'page-templates/page-about.php',
                ],
                // Exclude resources pages that have their own tailored editor panels.
                [
                    'param' => 'page_template',
                    'operator' => '!=',
                    'value' => 'page-templates/page-news.php',
                ],
                [
                    'param' => 'page_template',
                    'operator' => '!=',
                    'value' => 'page-templates/page-faqs.php',
                ],
                [
                    'param' => 'page_template',
                    'operator' => '!=',
                    'value' => 'page-templates/page-cqc-hub.php',
                ],
                [
                    'param' => 'page_template',
                    'operator' => '!=',
                    'value' => 'page-templates/page-training-guides.php',
                ],
                [
                    'param' => 'page_template',
                    'operator' => '!=',
                    'value' => 'page-templates/page-downloadable-resources.php',
                ],
            ],
        ],
        'menu_order' => 5,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'top',
    ]);

    // =========================================
    // RESOURCES: News & Articles (page template)
    // =========================================
    acf_add_local_field_group([
        'key' => 'group_resources_news_page',
        'title' => 'News Page Settings',
        'fields' => [
            [
                'key' => 'field_resources_news_note',
                'label' => 'Note',
                'name' => '',
                'type' => 'message',
                'message' => 'This page lists your Posts. Use the fields below only to control the hero heading text.',
            ],
            [
                'key' => 'field_resources_news_hero_title',
                'label' => 'Hero Title (H1)',
                'name' => 'hero_title',
                'type' => 'text',
                'maxlength' => 100,
            ],
            [
                'key' => 'field_resources_news_hero_subtitle',
                'label' => 'Hero Subtitle',
                'name' => 'hero_subtitle',
                'type' => 'textarea',
                'rows' => 3,
            ],
        ],
        'location' => [
            [
                [
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'page-templates/page-news.php',
                ],
            ],
        ],
        'menu_order' => 0,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'top',
    ]);

    // =========================================
    // RESOURCES: FAQs (page template)
    // =========================================
    acf_add_local_field_group([
        'key' => 'group_resources_faqs_page',
        'title' => 'FAQs Page Content',
        'fields' => [
            [
                'key' => 'field_resources_faqs_tab_hero',
                'label' => 'Hero',
                'name' => '',
                'type' => 'tab',
                'placement' => 'top',
            ],
            [
                'key' => 'field_resources_faqs_hero_title',
                'label' => 'Hero Title (H1)',
                'name' => 'hero_title',
                'type' => 'text',
                'maxlength' => 100,
            ],
            [
                'key' => 'field_resources_faqs_hero_subtitle',
                'label' => 'Hero Subtitle',
                'name' => 'hero_subtitle',
                'type' => 'textarea',
                'rows' => 3,
            ],
            [
                'key' => 'field_resources_faqs_tab_items',
                'label' => 'FAQ Items',
                'name' => '',
                'type' => 'tab',
                'placement' => 'top',
            ],
            [
                'key' => 'field_resources_faqs_items',
                'label' => 'FAQs',
                'name' => 'faqs',
                'type' => 'repeater',
                'layout' => 'block',
                'button_label' => 'Add FAQ',
                'min' => 0,
                'sub_fields' => [
                    [
                        'key' => 'field_resources_faqs_item_category',
                        'label' => 'Category',
                        'name' => 'category',
                        'type' => 'select',
                        'choices' => [
                            'general' => 'General',
                            'booking' => 'Booking & Scheduling',
                            'certification' => 'Certification & Accreditation',
                            'course-specific' => 'Course-Specific',
                            'payment' => 'Payment & Funding',
                            'group-training' => 'Group Training & Employers',
                        ],
                        'default_value' => 'general',
                        'required' => 1,
                    ],
                    [
                        'key' => 'field_resources_faqs_item_question',
                        'label' => 'Question',
                        'name' => 'question',
                        'type' => 'text',
                        'required' => 1,
                    ],
                    [
                        'key' => 'field_resources_faqs_item_answer',
                        'label' => 'Answer',
                        'name' => 'answer',
                        'type' => 'textarea',
                        'rows' => 4,
                        'required' => 1,
                    ],
                ],
            ],
        ],
        'location' => [
            [
                [
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'page-templates/page-faqs.php',
                ],
            ],
        ],
        'menu_order' => 0,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'top',
    ]);

    // =========================================
    // RESOURCES: CQC Compliance Hub (page template)
    // =========================================
    acf_add_local_field_group([
        'key' => 'group_resources_cqc_hub_page',
        'title' => 'CQC Hub Content',
        'fields' => [
            [
                'key' => 'field_resources_cqc_tab_hero',
                'label' => 'Hero',
                'name' => '',
                'type' => 'tab',
                'placement' => 'top',
            ],
            [
                'key' => 'field_resources_cqc_hero_title',
                'label' => 'Hero Title (H1)',
                'name' => 'hero_title',
                'type' => 'text',
                'maxlength' => 100,
            ],
            [
                'key' => 'field_resources_cqc_hero_subtitle',
                'label' => 'Hero Subtitle',
                'name' => 'hero_subtitle',
                'type' => 'textarea',
                'rows' => 3,
            ],
            [
                'key' => 'field_resources_cqc_intro_text',
                'label' => 'Intro Text',
                'name' => 'intro_text',
                'type' => 'textarea',
                'rows' => 4,
            ],
            [
                'key' => 'field_resources_cqc_tab_content_sources',
                'label' => 'Content Sources',
                'name' => '',
                'type' => 'tab',
                'placement' => 'top',
            ],
            [
                'key' => 'field_resources_cqc_post_categories',
                'label' => 'Post Categories to Show',
                'name' => 'cqc_post_categories',
                'type' => 'taxonomy',
                'taxonomy' => 'category',
                'field_type' => 'multi_select',
                'add_term' => 0,
                'save_terms' => 0,
                'load_terms' => 0,
                'return_format' => 'id',
                'instructions' => 'Optional. If empty, the hub shows the latest posts as a fallback.',
            ],
            [
                'key' => 'field_resources_cqc_tab_faqs',
                'label' => 'FAQs',
                'name' => '',
                'type' => 'tab',
                'placement' => 'top',
            ],
            [
                'key' => 'field_resources_cqc_faqs',
                'label' => 'FAQs',
                'name' => 'faqs',
                'type' => 'repeater',
                'layout' => 'block',
                'button_label' => 'Add FAQ',
                'min' => 0,
                'sub_fields' => [
                    [
                        'key' => 'field_resources_cqc_faq_category',
                        'label' => 'Category',
                        'name' => 'category',
                        'type' => 'select',
                        'choices' => [
                            'general' => 'General',
                            'training' => 'Training',
                            'inspection' => 'Inspection Preparation',
                        ],
                        'default_value' => 'general',
                        'required' => 1,
                    ],
                    [
                        'key' => 'field_resources_cqc_faq_question',
                        'label' => 'Question',
                        'name' => 'question',
                        'type' => 'text',
                        'required' => 1,
                    ],
                    [
                        'key' => 'field_resources_cqc_faq_answer',
                        'label' => 'Answer',
                        'name' => 'answer',
                        'type' => 'textarea',
                        'rows' => 4,
                        'required' => 1,
                    ],
                ],
            ],
            [
                'key' => 'field_resources_cqc_tab_downloads',
                'label' => 'Downloadable Resources',
                'name' => '',
                'type' => 'tab',
                'placement' => 'top',
            ],
            [
                'key' => 'field_resources_cqc_downloads',
                'label' => 'Resources',
                'name' => 'downloadable_resources',
                'type' => 'repeater',
                'instructions' => 'Add downloadable resources that will appear on this page. Select from your existing resources.',
                'layout' => 'block',
                'button_label' => 'Add Resource',
                'min' => 0,
                'sub_fields' => [
                    [
                        'key' => 'field_resources_cqc_download_resource',
                        'label' => 'Select Resource',
                        'name' => 'resource',
                        'type' => 'post_object',
                        'post_type' => ['cta_resource'],
                        'return_format' => 'object',
                        'ui' => 1,
                        'required' => 1,
                        'instructions' => 'Choose a resource from your Resources library',
                    ],
                    [
                        'key' => 'field_resources_cqc_download_icon',
                        'label' => 'Custom Icon (Optional)',
                        'name' => 'custom_icon',
                        'type' => 'text',
                        'instructions' => 'Override the resource icon. E.g., fas fa-clipboard-check',
                        'placeholder' => 'fas fa-file',
                    ],
                ],
            ],
        ],
        'location' => [
            [
                [
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'page-templates/page-cqc-hub.php',
                ],
            ],
        ],
        'menu_order' => 0,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'top',
    ]);

    // =========================================
    // RESOURCES: Training Guides & Tools (page template)
    // =========================================
    acf_add_local_field_group([
        'key' => 'group_resources_training_guides_page',
        'title' => 'Training Guides Page Content',
        'fields' => [
            [
                'key' => 'field_resources_guides_tab_hero',
                'label' => 'Hero',
                'name' => '',
                'type' => 'tab',
                'placement' => 'top',
            ],
            [
                'key' => 'field_resources_guides_hero_title',
                'label' => 'Hero Title (H1)',
                'name' => 'hero_title',
                'type' => 'text',
                'maxlength' => 100,
            ],
            [
                'key' => 'field_resources_guides_hero_subtitle',
                'label' => 'Hero Subtitle',
                'name' => 'hero_subtitle',
                'type' => 'textarea',
                'rows' => 3,
            ],
            [
                'key' => 'field_resources_guides_cta_label',
                'label' => 'Hero CTA Label',
                'name' => 'hero_cta_label',
                'type' => 'text',
                'default_value' => 'Download Training Planning Guide',
            ],
            [
                'key' => 'field_resources_guides_cta_link',
                'label' => 'Hero CTA Link',
                'name' => 'hero_cta_link',
                'type' => 'page_link',
                'post_type' => ['page'],
                'allow_null' => 1,
                'instructions' => 'Optional. Defaults to the Downloadable Resources page.',
            ],
            [
                'key' => 'field_resources_guides_tab_custom',
                'label' => 'Custom Sections (Optional)',
                'name' => '',
                'type' => 'tab',
                'placement' => 'top',
            ],
            [
                'key' => 'field_resources_guides_use_custom',
                'label' => 'Use custom sections on the frontend',
                'name' => 'use_custom_sections',
                'type' => 'true_false',
                'ui' => 1,
                'default_value' => 0,
            ],
            [
                'key' => 'field_resources_guides_sections',
                'label' => 'Sections',
                'name' => 'guide_sections',
                'type' => 'repeater',
                'layout' => 'block',
                'button_label' => 'Add Section',
                'min' => 0,
                'sub_fields' => [
                    [
                        'key' => 'field_resources_guides_section_title',
                        'label' => 'Section Title (H2)',
                        'name' => 'title',
                        'type' => 'text',
                        'required' => 1,
                    ],
                    [
                        'key' => 'field_resources_guides_section_content',
                        'label' => 'Section Content',
                        'name' => 'content',
                        'type' => 'wysiwyg',
                        'tabs' => 'all',
                        'toolbar' => 'full',
                        'media_upload' => 1,
                        'required' => 1,
                    ],
                ],
                'conditional_logic' => [
                    [
                        [
                            'field' => 'field_resources_guides_use_custom',
                            'operator' => '==',
                            'value' => '1',
                        ],
                    ],
                ],
            ],
            [
                'key' => 'field_resources_guides_tab_downloads',
                'label' => 'Downloadable Resources',
                'name' => '',
                'type' => 'tab',
                'placement' => 'top',
            ],
            [
                'key' => 'field_resources_guides_downloads',
                'label' => 'Resources',
                'name' => 'downloadable_resources',
                'type' => 'repeater',
                'instructions' => 'Add downloadable resources that will appear on this page. Select from your existing resources.',
                'layout' => 'block',
                'button_label' => 'Add Resource',
                'min' => 0,
                'sub_fields' => [
                    [
                        'key' => 'field_resources_guides_download_resource',
                        'label' => 'Select Resource',
                        'name' => 'resource',
                        'type' => 'post_object',
                        'post_type' => ['cta_resource'],
                        'return_format' => 'object',
                        'ui' => 1,
                        'required' => 1,
                        'instructions' => 'Choose a resource from your Resources library',
                    ],
                    [
                        'key' => 'field_resources_guides_download_icon',
                        'label' => 'Custom Icon (Optional)',
                        'name' => 'custom_icon',
                        'type' => 'text',
                        'instructions' => 'Override the resource icon. E.g., fas fa-file-pdf',
                        'placeholder' => 'fas fa-file',
                    ],
                ],
            ],
        ],
        'location' => [
            [
                [
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'page-templates/page-training-guides.php',
                ],
            ],
        ],
        'menu_order' => 0,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'top',
    ]);

    // =========================================
    // RESOURCES: Downloadable Resources (page template)
    // =========================================
    acf_add_local_field_group([
        'key' => 'group_resources_downloadable_page',
        'title' => 'Downloadable Resources Content',
        'fields' => [
            [
                'key' => 'field_resources_dl_tab_hero',
                'label' => 'Hero',
                'name' => '',
                'type' => 'tab',
                'placement' => 'top',
            ],
            [
                'key' => 'field_resources_dl_hero_title',
                'label' => 'Hero Title (H1)',
                'name' => 'hero_title',
                'type' => 'text',
                'maxlength' => 100,
            ],
            [
                'key' => 'field_resources_dl_hero_subtitle',
                'label' => 'Hero Subtitle',
                'name' => 'hero_subtitle',
                'type' => 'textarea',
                'rows' => 3,
            ],
            [
                'key' => 'field_resources_dl_tab_library',
                'label' => 'Resource Library',
                'name' => '',
                'type' => 'tab',
                'placement' => 'top',
            ],
            [
                'key' => 'field_resources_dl_library_title',
                'label' => 'Library Title (H2)',
                'name' => 'resource_library_title',
                'type' => 'text',
                'default_value' => 'Resource Library',
            ],
            [
                'key' => 'field_resources_dl_library_subtitle',
                'label' => 'Library Subtitle',
                'name' => 'resource_library_subtitle',
                'type' => 'textarea',
                'rows' => 2,
                'default_value' => 'Filter resources by category',
            ],
            [
                'key' => 'field_resources_dl_categories',
                'label' => 'Category Headings',
                'name' => 'resource_categories',
                'type' => 'repeater',
                'layout' => 'table',
                'button_label' => 'Add / Override Category',
                'min' => 0,
                'sub_fields' => [
                    [
                        'key' => 'field_resources_dl_category_key',
                        'label' => 'Category Key',
                        'name' => 'key',
                        'type' => 'select',
                        'choices' => [
                            'quick-reference' => 'Quick Reference Cards',
                            'templates' => 'Templates & Tools',
                            'policies' => 'Policy Templates',
                            'infographics' => 'Infographics & Posters',
                            'checklists' => 'Checklists',
                        ],
                        'required' => 1,
                    ],
                    [
                        'key' => 'field_resources_dl_category_title',
                        'label' => 'Title',
                        'name' => 'title',
                        'type' => 'text',
                        'required' => 1,
                    ],
                    [
                        'key' => 'field_resources_dl_category_subtitle',
                        'label' => 'Subtitle',
                        'name' => 'subtitle',
                        'type' => 'textarea',
                        'rows' => 2,
                    ],
                ],
            ],
            [
                'key' => 'field_resources_dl_items',
                'label' => 'Resources',
                'name' => 'resource_items',
                'type' => 'repeater',
                'layout' => 'block',
                'button_label' => 'Add Resource',
                'min' => 0,
                'sub_fields' => [
                    [
                        'key' => 'field_resources_dl_item_category',
                        'label' => 'Category',
                        'name' => 'category',
                        'type' => 'select',
                        'choices' => [
                            'quick-reference' => 'Quick Reference Cards',
                            'templates' => 'Templates & Tools',
                            'policies' => 'Policy Templates',
                            'infographics' => 'Infographics & Posters',
                            'checklists' => 'Checklists',
                        ],
                        'required' => 1,
                    ],
                    [
                        'key' => 'field_resources_dl_item_icon',
                        'label' => 'Icon Class',
                        'name' => 'icon',
                        'type' => 'text',
                        'instructions' => 'Font Awesome class (e.g., "fas fa-file-pdf")',
                        'default_value' => 'fas fa-file',
                    ],
                    [
                        'key' => 'field_resources_dl_item_title',
                        'label' => 'Title',
                        'name' => 'title',
                        'type' => 'text',
                        'required' => 1,
                    ],
                    [
                        'key' => 'field_resources_dl_item_description',
                        'label' => 'Description',
                        'name' => 'description',
                        'type' => 'textarea',
                        'rows' => 3,
                        'required' => 1,
                    ],
                    [
                        'key' => 'field_resources_dl_item_file',
                        'label' => 'File',
                        'name' => 'file',
                        'type' => 'file',
                        'return_format' => 'url',
                        'instructions' => 'Upload the file to download. If you prefer, leave empty and provide a URL below.',
                    ],
                    [
                        'key' => 'field_resources_dl_item_url',
                        'label' => 'URL (optional)',
                        'name' => 'url',
                        'type' => 'url',
                    ],
                    [
                        'key' => 'field_resources_dl_item_button_label',
                        'label' => 'Button Label',
                        'name' => 'button_label',
                        'type' => 'text',
                        'default_value' => 'Download',
                    ],
                ],
            ],
        ],
        'location' => [
            [
                [
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'page-templates/page-downloadable-resources.php',
                ],
            ],
        ],
        'menu_order' => 0,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'top',
    ]);

    // News Article SEO Fields
    acf_add_local_field_group([
        'key' => 'group_news_seo',
        'title' => 'SEO Settings',
        'fields' => [
            [
                'key' => 'field_news_meta_title',
                'label' => 'Meta Title',
                'name' => 'news_meta_title',
                'type' => 'text',
                'instructions' => '50-60 chars (optional)',
                'maxlength' => 60,
                'placeholder' => 'Max 60 characters recommended',
            ],
            [
                'key' => 'field_news_meta_description',
                'label' => 'Meta Description',
                'name' => 'news_meta_description',
                'type' => 'textarea',
                'instructions' => 'Custom description for search engines (leave blank to use excerpt)',
                'maxlength' => 160,
                'rows' => 2,
                'placeholder' => 'Max 160 characters recommended',
            ],
        ],
        'location' => [
            [
                [
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'post',
                ],
            ],
        ],
        'menu_order' => 1,
        'position' => 'side',
        'style' => 'default',
        'label_placement' => 'top',
    ]);
}
add_action('acf/init', 'cta_register_acf_fields');

/**
 * Get default values for page fields based on template or slug
 */
function cta_get_page_defaults($post_id) {
    $post = get_post($post_id);
    if (!$post || $post->post_type !== 'page') {
        return [];
    }
    
    $template = get_page_template_slug($post_id);
    $slug = $post->post_name;
    
    $defaults = [
        'hero_title' => $post->post_title,
        'hero_subtitle' => '',
        'section_how_it_works_title' => '',
        'section_testimonials_title' => '',
        'section_benefits_title' => '',
        'section_benefits_subtitle' => '',
        'section_form_title' => '',
        'section_form_description' => '',
        'section_faq_title' => '',
    ];
    
    // Map templates and slugs to default values
    $template_defaults = [
        'page-templates/page-group-training.php' => [
            'hero_title' => 'Group Training for Care Teams in Kent',
            'hero_subtitle' => 'Train your entire team together. Flexible scheduling, accredited certificates, and group rates that make quality training affordable.',
            'section_how_it_works_title' => 'How It Works',
            'section_testimonials_title' => 'Trusted by Care Teams Across Kent',
            'section_benefits_title' => 'Why Choose Group Training?',
            'section_benefits_subtitle' => 'Maximise value while maintaining quality training standards',
            'section_form_title' => 'Get Your Custom Training Quote in 24 Hours',
            'section_form_description' => "Tell us about your team and training needs. We'll send you a custom quote within 24 hours - no obligation, no hassle.",
            'section_faq_title' => 'Frequently Asked Questions',
        ],
        'page-templates/page-contact.php' => [
            'hero_title' => 'Contact Us for Care Training in Kent',
            'hero_subtitle' => "Whether you're booking a course, need group training, or have questions about compliance, we're here to help.",
            'section_form_title' => 'Send Us a Message',
        ],
        'page-templates/page-news.php' => [
            'hero_title' => 'News & Updates',
            'hero_subtitle' => 'Stay informed with the latest care sector news, CQC updates, and training insights.',
        ],
        'page-templates/page-about.php' => [
            'hero_title' => 'About Our Care Training in Kent',
            'hero_subtitle' => 'CQC-compliant, CPD-accredited care sector training in Kent since 2020',
        ],
        'page-templates/page-location.php' => [
            // These are refined below with location-specific defaults when possible.
            'section_testimonials_title' => 'What People Say',
            'section_faq_title' => 'Frequently Asked Questions',
        ],
    ];
    
    // Check template first
    if (!empty($template) && isset($template_defaults[$template])) {
        $defaults = array_merge($defaults, $template_defaults[$template]);
    }
    // Fallback to slug-based defaults
    elseif (!empty($slug)) {
        $slug_defaults = [
            'group-training' => [
                'hero_title' => 'Group Training for Care Teams in Kent',
                'hero_subtitle' => 'Train your entire team together. Flexible scheduling, accredited certificates, and group rates that make quality training affordable.',
                'section_how_it_works_title' => 'How It Works',
                'section_testimonials_title' => 'Trusted by Care Teams Across Kent',
                'section_benefits_title' => 'Why Choose Group Training?',
                'section_benefits_subtitle' => 'Maximise value while maintaining quality training standards',
                'section_form_title' => 'Get Your Custom Training Quote in 24 Hours',
                'section_form_description' => "Tell us about your team and training needs. We'll send you a custom quote within 24 hours - no obligation, no hassle.",
                'section_faq_title' => 'Frequently Asked Questions',
            ],
            'contact' => [
                'hero_title' => 'Contact Us for Care Training in Kent',
                'hero_subtitle' => "Whether you're booking a course, need group training, or have questions about compliance, we're here to help.",
                'section_form_title' => 'Send Us a Message',
            ],
            'news' => [
                'hero_title' => 'News & Updates',
                'hero_subtitle' => 'Stay informed with the latest care sector news, CQC updates, and training insights.',
            ],
            'about' => [
                'hero_title' => 'About Our Care Training in Kent',
                'hero_subtitle' => 'CQC-compliant, CPD-accredited care sector training in Kent since 2020',
            ],
        ];
        
        if (isset($slug_defaults[$slug])) {
            $defaults = array_merge($defaults, $slug_defaults[$slug]);
        }
    }

    // Location pages: make defaults feel page-specific (pull from location data)
    if ($template === 'page-templates/page-location.php') {
        $location_slug = function_exists('get_field') ? get_field('location_slug', $post_id) : '';
        if (empty($location_slug) && !empty($slug)) {
            $location_slug = $slug;
        }
        $location_data = function_exists('cta_get_location_data') ? cta_get_location_data((string) $location_slug) : null;
        if (is_array($location_data)) {
            // Keep hero_title as the page title by default, but make subtitle helpful.
            if (empty($defaults['hero_subtitle']) && !empty($location_data['description'])) {
                $defaults['hero_subtitle'] = (string) $location_data['description'];
            }
        }
    }
    
    return $defaults;
}

/**
 * Auto-populate hero_title from page defaults if empty
 */
function cta_populate_hero_title($value, $post_id, $field) {
    if ($value !== null && $value !== '') {
        return $value;
    }
    
    if ($field['name'] === 'hero_title') {
        $defaults = cta_get_page_defaults($post_id);
        if (!empty($defaults['hero_title'])) {
            return $defaults['hero_title'];
        }
    }
    
    return $value;
}
add_filter('acf/load_value/name=hero_title', 'cta_populate_hero_title', 10, 3);

/**
 * Auto-populate hero_subtitle from page defaults if empty
 */
function cta_populate_hero_subtitle($value, $post_id, $field) {
    if ($value !== null && $value !== '') {
        return $value;
    }
    
    if ($field['name'] === 'hero_subtitle') {
        $defaults = cta_get_page_defaults($post_id);
        if (!empty($defaults['hero_subtitle'])) {
            return $defaults['hero_subtitle'];
        }
    }
    
    return $value;
}
add_filter('acf/load_value/name=hero_subtitle', 'cta_populate_hero_subtitle', 10, 3);

/**
 * Auto-populate section heading fields from page defaults if empty
 */
function cta_populate_section_headings($value, $post_id, $field) {
    if ($value !== null && $value !== '') {
        return $value;
    }
    
    $defaults = cta_get_page_defaults($post_id);
    $field_name = $field['name'];
    
    if (isset($defaults[$field_name]) && !empty($defaults[$field_name])) {
        return $defaults[$field_name];
    }
    
    return $value;
}
add_filter('acf/load_value/name=section_how_it_works_title', 'cta_populate_section_headings', 10, 3);
add_filter('acf/load_value/name=section_testimonials_title', 'cta_populate_section_headings', 10, 3);
add_filter('acf/load_value/name=section_benefits_title', 'cta_populate_section_headings', 10, 3);
add_filter('acf/load_value/name=section_benefits_subtitle', 'cta_populate_section_headings', 10, 3);
add_filter('acf/load_value/name=section_form_title', 'cta_populate_section_headings', 10, 3);
add_filter('acf/load_value/name=section_form_description', 'cta_populate_section_headings', 10, 3);
add_filter('acf/load_value/name=section_faq_title', 'cta_populate_section_headings', 10, 3);

/**
 * Get default content sections for pages based on template
 */
function cta_get_page_content_sections($post_id) {
    $post = get_post($post_id);
    if (!$post || $post->post_type !== 'page') {
        return [];
    }
    
    $template = get_page_template_slug($post_id);
    $slug = $post->post_name;
    
    $sections = [];
    
    // Location page sections (SEO landing pages)
    if ($template === 'page-templates/page-location.php') {
        // Try to infer location from ACF location_slug, otherwise page slug.
        $location_slug = function_exists('get_field') ? get_field('location_slug', $post_id) : '';
        if (empty($location_slug) && !empty($slug)) {
            $location_slug = $slug;
        }
        $location_data = function_exists('cta_get_location_data') ? cta_get_location_data((string) $location_slug) : null;
        $location_name = is_array($location_data) ? ($location_data['display_name'] ?? $post->post_title) : $post->post_title;

        $sections = [
            [
                'section_heading' => 'Professional Care Training in ' . $location_name,
                'section_content' => '<p>We provide CQC-compliant, CPD-accredited care training for teams across ' . esc_html($location_name) . ' and the surrounding area.</p>
<p>Choose face-to-face sessions at our Maidstone Studios or book on-site training at your service to keep your team confident, compliant, and inspection-ready.</p>
<h3>On-site training for your team</h3>
<p>We can deliver training at your location and tailor examples to your policies, service user needs, and real-world scenarios.</p>',
            ],
            [
                'section_heading' => 'What training can you book?',
                'section_content' => '<p>Our most popular courses for care providers include:</p>
<ul>
<li>Moving &amp; Handling</li>
<li>Safeguarding Adults</li>
<li>Medication Competency</li>
<li>Emergency First Aid at Work</li>
<li>Infection Prevention &amp; Control</li>
<li>Care Certificate support</li>
</ul>
<p>Browse our full course list and upcoming dates, or contact us for a tailored training plan for your service.</p>',
            ],
        ];

        return $sections;
    }

    // Group Training page sections
    if ($template === 'page-templates/page-group-training.php' || $slug === 'group-training') {
        $sections = [
            [
                'section_heading' => 'How It Works',
                'section_content' => '<p>Our simple three-step process makes it easy to get your team trained:</p><h3>1. Request a quote</h3><p>Fill in the form or call us with your team size and training needs.</p><h3>2. Book your dates</h3><p>We\'ll send a quote within 24 hours. Choose dates that suit your team.</p><h3>3. Train your team</h3><p>We deliver the training and your team receives accredited certificates.</p>',
            ],
            [
                'section_heading' => 'Why Choose Group Training?',
                'section_content' => '<p>Maximise value while maintaining quality training standards:</p><h3>Train on your schedule</h3><p>Evenings, weekends, or during shifts - we work around your operations and staff availability.</p><h3>Consistent team training</h3><p>No knowledge gaps - everyone receives the same high-quality training to the same professional standards.</p><h3>Compliant & Accredited</h3><p>Keep your team inspection-ready with CPD accredited training that meets CQC-compliance.</p>',
            ],
        ];
    }
    // Contact page sections
    elseif ($template === 'page-templates/page-contact.php' || $slug === 'contact') {
        $sections = [
            [
                'section_heading' => 'Get in Touch',
                'section_content' => '<p>Whether you\'re booking a course, need group training, or have questions about compliance, we\'re here to help.</p><p>Fill out the form below and we\'ll get back to you as soon as possible.</p>',
            ],
        ];
    }
    // News page sections
    elseif ($template === 'page-templates/page-news.php' || $slug === 'news') {
        $sections = [
            [
                'section_heading' => 'Latest Updates',
                'section_content' => '<p>Stay informed with the latest care sector news, CQC updates, and training insights from our expert team.</p>',
            ],
        ];
    }
    
    return $sections;
}

/**
 * Get default testimonials for pages based on template
 */
function cta_get_page_testimonials($post_id) {
    $post = get_post($post_id);
    if (!$post || $post->post_type !== 'page') {
        return [];
    }
    
    $template = get_page_template_slug($post_id);
    $slug = $post->post_name;
    
    $testimonials = [];
    
    // Group Training page testimonials
    if ($template === 'page-templates/page-group-training.php' || $slug === 'group-training') {
        $testimonials = [
            [
                'quote' => 'Jen is a fantastic trainer and leaves you feeling confident in your new learnt abilities!',
                'author' => 'Expertise Homecare',
                'icon' => 'fas fa-building',
            ],
            [
                'quote' => "It's much easier to learn when a trainer is passionate and excited about the topics they teach.",
                'author' => 'Inga',
                'icon' => 'fas fa-user',
            ],
            [
                'quote' => "Jen's training style is very much centred around each individual and is delivered in a very personable manner.",
                'author' => 'Melvyn',
                'icon' => 'fas fa-user',
            ],
        ];
    }
    
    return $testimonials;
}

/**
 * Get default FAQs for pages based on template
 */
function cta_get_page_faqs($post_id) {
    $post = get_post($post_id);
    if (!$post || $post->post_type !== 'page') {
        return [];
    }
    
    $template = get_page_template_slug($post_id);
    $slug = $post->post_name;
    
    $faqs = [];
    
    // Location page FAQs (lightweight, customisable per page)
    if ($template === 'page-templates/page-location.php') {
        $location_slug = function_exists('get_field') ? get_field('location_slug', $post_id) : '';
        if (empty($location_slug) && !empty($slug)) {
            $location_slug = $slug;
        }
        $location_data = function_exists('cta_get_location_data') ? cta_get_location_data((string) $location_slug) : null;
        $location_name = is_array($location_data) ? ($location_data['display_name'] ?? $post->post_title) : $post->post_title;

        $faqs = [
            [
                'category' => 'general',
                'question' => 'Do you deliver care training in ' . $location_name . '?',
                'answer' => 'Yes. We deliver training for care teams in ' . $location_name . ' and nearby areas. You can attend scheduled sessions or book on-site training at your service.',
            ],
            [
                'category' => 'scheduling',
                'question' => 'Can you train our whole team on-site?',
                'answer' => 'Yes. On-site training is ideal for groups and can be scheduled around shifts where possible. Contact us with your team size and preferred dates.',
            ],
            [
                'category' => 'pricing',
                'question' => 'Do you offer group rates?',
                'answer' => 'Yes. Group and multi-course bookings are often more cost-effective than booking individual places. We’ll provide a quote based on your requirements.',
            ],
            [
                'category' => 'general',
                'question' => 'Are your courses CQC-compliant and accredited?',
                'answer' => 'Our training is designed for the care sector and aligns with CQC expectations. Many courses are CPD-accredited and include certificates for your records.',
            ],
        ];

        return $faqs;
    }

    // Group Training page FAQs
    if ($template === 'page-templates/page-group-training.php' || $slug === 'group-training') {
        $faqs = [
            [
                'category' => 'general',
                'question' => 'How many people can attend a group training session?',
                'answer' => 'Our standard group training sessions accommodate up to 12 staff members per session. For larger groups, we can organise multiple sessions or arrange a custom training programme to suit your needs.',
            ],
            [
                'category' => 'pricing',
                'question' => "What's included in the group training price?",
                'answer' => 'All group training sessions include an expert trainer with all necessary equipment, workbooks and handouts for each attendee, practical assessments, and digital certificates upon successful completion. For on-site training, we bring everything to you - you just need to provide a suitable training room.',
            ],
            [
                'category' => 'scheduling',
                'question' => 'How far in advance should we book group training?',
                'answer' => "We recommend booking at least 2-3 weeks in advance to secure your preferred date. However, we understand that training needs can be urgent, so we'll do our best to accommodate shorter notice bookings when possible. Contact us to discuss your timeline.",
            ],
            [
                'category' => 'general',
                'question' => 'Can we combine multiple courses into one group training session?',
                'answer' => 'Yes! Our custom package option is perfect for organisations that need multiple courses. We can create a tailored training programme that combines several courses into a streamlined schedule, delivered either on-site or at our Maidstone Studios. This is ideal for larger groups and can offer additional savings.',
            ],
            [
                'category' => 'policies',
                'question' => 'What if we need to reschedule or cancel a booking?',
                'answer' => 'We understand that plans can change. Please contact us as soon as possible if you need to reschedule. We offer flexible cancellation and rescheduling policies - typically, changes made more than 7 days in advance incur no charges. Contact us to discuss your specific situation.',
            ],
            [
                'category' => 'scheduling',
                'question' => 'Do you offer training on evenings or weekends?',
                'answer' => "Absolutely! We offer flexible scheduling to work around your operations. This includes evening sessions, weekend training, and training during shift patterns. When you request a quote, let us know your preferred dates and times, and we'll work with you to find a schedule that minimises disruption to your care services.",
            ],
        ];
    }
    
    return $faqs;
}

/**
 * Auto-populate page_content_sections from page defaults if empty
 */
function cta_populate_page_content_sections($value, $post_id, $field) {
    if ($value !== null && $value !== false && !empty($value)) {
        return $value;
    }
    
    if ($field['name'] === 'page_content_sections') {
        $default_sections = cta_get_page_content_sections($post_id);
        if (!empty($default_sections)) {
            return $default_sections;
        }
    }
    
    return $value;
}
add_filter('acf/load_value/name=page_content_sections', 'cta_populate_page_content_sections', 10, 3);

/**
 * Auto-populate testimonials from page defaults if empty
 */
function cta_populate_page_testimonials($value, $post_id, $field) {
    if ($value !== null && $value !== false && !empty($value)) {
        return $value;
    }
    
    if ($field['name'] === 'testimonials') {
        $default_testimonials = cta_get_page_testimonials($post_id);
        if (!empty($default_testimonials)) {
            return $default_testimonials;
        }
    }
    
    return $value;
}
add_filter('acf/load_value/name=testimonials', 'cta_populate_page_testimonials', 10, 3);

/**
 * Auto-populate FAQs from page defaults if empty
 */
function cta_populate_page_faqs($value, $post_id, $field) {
    if ($value !== null && $value !== false && !empty($value)) {
        return $value;
    }
    
    if ($field['name'] === 'faqs') {
        $default_faqs = cta_get_page_faqs($post_id);
        if (!empty($default_faqs)) {
            return $default_faqs;
        }
    }
    
    return $value;
}
add_filter('acf/load_value/name=faqs', 'cta_populate_page_faqs', 10, 3);

/**
 * Helper function to safely get ACF field with fallback
 */
function cta_get_field($field_name, $post_id = false, $default = '') {
    if (!function_exists('get_field')) {
        return $default;
    }
    
    $value = get_field($field_name, $post_id);
    return $value !== null && $value !== '' ? $value : $default;
}

/**
 * Use custom excerpt field if available, otherwise fall back to WordPress excerpt
 */
function cta_get_custom_excerpt($post_id = false) {
    if (!$post_id) {
        $post_id = get_the_ID();
    }
    
    $post_type = get_post_type($post_id);
    
    // Check for custom excerpt fields
    if ($post_type === 'course') {
        $custom_excerpt = cta_get_field('course_seo_excerpt', $post_id, '');
        if (!empty($custom_excerpt)) {
            return $custom_excerpt;
        }
    } elseif ($post_type === 'course_event') {
        $custom_excerpt = cta_get_field('event_seo_excerpt', $post_id, '');
        if (!empty($custom_excerpt)) {
            return $custom_excerpt;
        }
    }
    
    // Fall back to WordPress excerpt
    $excerpt = get_the_excerpt($post_id);
    return !empty($excerpt) ? $excerpt : '';
}

/**
 * Filter get_the_excerpt to use custom excerpt fields when available
 */
function cta_filter_excerpt($excerpt, $post = null) {
    if (!$post) {
        $post = get_post();
    }
    
    if (!$post) {
        return $excerpt;
    }
    
    $post_type = get_post_type($post->ID);
    
    // Check for custom excerpt fields
    if ($post_type === 'course') {
        $custom_excerpt = cta_get_field('course_seo_excerpt', $post->ID, '');
        if (!empty($custom_excerpt)) {
            return $custom_excerpt;
        }
    } elseif ($post_type === 'course_event') {
        $custom_excerpt = cta_get_field('event_seo_excerpt', $post->ID, '');
        if (!empty($custom_excerpt)) {
            return $custom_excerpt;
        }
    }
    
    return $excerpt;
}
add_filter('get_the_excerpt', 'cta_filter_excerpt', 10, 2);

/**
 * Helper function to get learning outcomes as array
 * Parses the textarea (one outcome per line) into an array
 */
function cta_get_outcomes($post_id = false) {
    $outcomes_text = cta_get_field('course_outcomes', $post_id, '');
    
    if (empty($outcomes_text)) {
        return [];
    }
    
    // Split by newlines and filter empty lines
    $lines = preg_split('/\r\n|\r|\n/', $outcomes_text);
    $outcomes = [];
    
    foreach ($lines as $line) {
        $line = trim($line);
        if (!empty($line)) {
            $outcomes[] = ['outcome_text' => $line];
        }
    }
    
    return $outcomes;
}

/**
 * Helper function to get stats as array
 * Parses the textarea (format: "Number | Label" per line) into an array
 */
function cta_get_stats($post_id = false) {
    $stats_text = cta_get_field('about_stats', $post_id, '');
    
    if (empty($stats_text)) {
        return [];
    }
    
    // Split by newlines and filter empty lines
    $lines = preg_split('/\r\n|\r|\n/', $stats_text);
    $stats = [];
    
    foreach ($lines as $line) {
        $line = trim($line);
        if (!empty($line) && strpos($line, '|') !== false) {
            $parts = explode('|', $line, 2);
            $stats[] = [
                'number' => trim($parts[0]),
                'label' => trim($parts[1] ?? ''),
            ];
        }
    }
    
    return $stats;
}

/**
 * Legacy compatibility: cta_get_repeater now works with textarea format
 */
function cta_get_repeater($field_name, $post_id = false) {
    // Handle outcomes field
    if ($field_name === 'course_outcomes') {
        return cta_get_outcomes($post_id);
    }
    
    // Handle stats field
    if ($field_name === 'about_stats') {
        return cta_get_stats($post_id);
    }
    
    // For any other field, try to get as array
    if (!function_exists('get_field')) {
        return [];
    }
    
    $value = get_field($field_name, $post_id);
    return is_array($value) ? $value : [];
}

/**
 * Add Eventbrite-specific fields to course_event ACF
 */
function cta_add_eventbrite_acf_fields() {
    if (!function_exists('acf_add_local_field_group')) {
        return;
    }
    
    acf_add_local_field_group([
        'key' => 'group_eventbrite_fields',
        'title' => 'Eventbrite Settings',
        'fields' => [
            [
                'key' => 'field_eventbrite_description',
                'label' => 'Eventbrite Description',
                'name' => 'eventbrite_description',
                'type' => 'wysiwyg',
                'instructions' => 'HTML-formatted description shown on Eventbrite. Leave empty to auto-generate with AI. Click "Regenerate" to create a new AI description.',
                'tabs' => 'visual',
                'toolbar' => 'full',
                'media_upload' => 0,
                'delay' => 0,
                'default_value' => '',
            ],
            [
                'key' => 'field_eventbrite_summary',
                'label' => 'Eventbrite Summary (140 chars)',
                'name' => 'eventbrite_summary',
                'type' => 'text',
                'instructions' => 'Short summary for Eventbrite search/discovery. Auto-generated if empty.',
                'maxlength' => 140,
            ],
            [
                'key' => 'field_generate_eventbrite_summary',
                'label' => '',
                'name' => 'generate_eventbrite_summary',
                'type' => 'message',
                'message' => '<button type="button" id="cta-generate-eventbrite-summary" class="button button-small" style="margin-top: 6px;">✨ Generate with AI</button> <span id="cta-generate-summary-status" style="margin-left: 10px; font-size: 12px;"></span>',
            ],
            [
                'key' => 'field_eventbrite_custom_name',
                'label' => 'Custom Eventbrite Event Name (75 chars max)',
                'name' => 'eventbrite_custom_name',
                'type' => 'text',
                'instructions' => 'Optional: Override auto-generated event name for Eventbrite. Maximum 75 characters (2026 best practice). Format: [Event Type] + [Descriptor] + [Location].',
                'placeholder' => 'Leave empty to use auto-generated name',
                'maxlength' => 75,
            ],
            [
                'key' => 'field_generate_eventbrite_custom_name',
                'label' => '',
                'name' => 'generate_eventbrite_custom_name',
                'type' => 'message',
                'message' => '<button type="button" id="cta-generate-eventbrite-name" class="button button-small" style="margin-top: 6px;">✨ Generate with AI</button> <span id="cta-generate-name-status" style="margin-left: 10px; font-size: 12px;"></span>',
            ],
            [
                'key' => 'field_regenerate_eventbrite_description',
                'label' => 'Regenerate Description',
                'name' => 'regenerate_eventbrite_description',
                'type' => 'message',
                'message' => '<button type="button" id="cta-regenerate-eventbrite-desc" class="button button-secondary">🔄 Regenerate AI Description</button> <span id="cta-regenerate-status" style="margin-left: 10px;"></span>',
            ],
            [
                'key' => 'field_eventbrite_faqs',
                'label' => 'Eventbrite FAQ Suggestions',
                'name' => 'eventbrite_faqs',
                'type' => 'repeater',
                'instructions' => 'FAQ suggestions for Eventbrite listing (+8% search visibility boost). Click "Generate with AI" to auto-generate.',
                'layout' => 'block',
                'button_label' => 'Add FAQ',
                'min' => 0,
                'sub_fields' => [
                    [
                        'key' => 'field_eventbrite_faq_question',
                        'label' => 'Question',
                        'name' => 'question',
                        'type' => 'text',
                        'required' => 1,
                    ],
                    [
                        'key' => 'field_eventbrite_faq_answer',
                        'label' => 'Answer',
                        'name' => 'answer',
                        'type' => 'textarea',
                        'rows' => 3,
                        'required' => 1,
                    ],
                ],
            ],
            [
                'key' => 'field_generate_eventbrite_faqs',
                'label' => '',
                'name' => 'generate_eventbrite_faqs',
                'type' => 'message',
                'message' => '<button type="button" id="cta-generate-eventbrite-faqs" class="button button-small" style="margin-top: 6px;">✨ Generate FAQs with AI</button> <span id="cta-generate-faqs-status" style="margin-left: 10px; font-size: 12px;"></span>',
            ],
            [
                'key' => 'field_eventbrite_tag_suggestions',
                'label' => 'Eventbrite Tag Suggestions',
                'name' => 'eventbrite_tag_suggestions',
                'type' => 'textarea',
                'instructions' => 'AI-generated tag suggestions for Eventbrite. Copy these into Eventbrite\'s tag field when creating/editing the event.',
                'rows' => 4,
                'readonly' => 0,
            ],
            [
                'key' => 'field_generate_eventbrite_tags',
                'label' => '',
                'name' => 'generate_eventbrite_tags',
                'type' => 'message',
                'message' => '<button type="button" id="cta-generate-eventbrite-tags" class="button button-small" style="margin-top: 6px;">✨ Generate Tags with AI</button> <span id="cta-generate-tags-status" style="margin-left: 10px; font-size: 12px;"></span>',
            ],
        ],
        'location' => [
            [
                [
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'course_event',
                ],
            ],
        ],
        'menu_order' => 2,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'top',
    ]);
}
add_action('acf/init', 'cta_add_eventbrite_acf_fields');
