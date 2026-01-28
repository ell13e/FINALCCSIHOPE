<?php
/**
 * Centralized Schema.org Functions
 * 
 * Provides reusable functions for generating consistent schema markup across the site
 *
 * @package CTA_Theme
 */

/**
 * Get organization schema data
 * Used across all pages for consistent organization information
 */
function cta_get_organization_schema() {
    $contact = cta_get_contact_info();
    $site_url = home_url();
    
    // Get rating from theme customizer (default 4.6)
    $rating_value = get_theme_mod('cta_trustpilot_rating', '4.6');
    $review_count = get_theme_mod('cta_trustpilot_review_count', '20');
    
    // Get social media URLs from theme customizer
    $facebook_url = get_theme_mod('cta_facebook_url', 'https://www.facebook.com/continuitytraining');
    $linkedin_url = get_theme_mod('cta_linkedin_url', 'https://www.linkedin.com/company/continuity-training-academy-cta');
    $instagram_url = get_theme_mod('cta_instagram_url', 'https://www.instagram.com/continuitytrainingacademy');
    $trustpilot_url = get_theme_mod('cta_trustpilot_url', 'https://www.trustpilot.com/review/continuitytrainingacademy.co.uk');
    
    $same_as = [];
    if (!empty($trustpilot_url)) $same_as[] = $trustpilot_url;
    if (!empty($facebook_url)) $same_as[] = $facebook_url;
    if (!empty($linkedin_url)) $same_as[] = $linkedin_url;
    if (!empty($instagram_url)) $same_as[] = $instagram_url;
    
    return [
        '@type' => 'EducationalOrganization',
        '@id' => $site_url . '/#organization',
        'name' => 'Continuity Training Academy',
        'url' => $site_url . '/',
        'logo' => [
            '@type' => 'ImageObject',
            'url' => get_template_directory_uri() . '/assets/img/logo/long_logo-400w.webp',
            'width' => 400,
            'height' => 100,
        ],
        'description' => 'Professional care sector training in Kent. CQC-compliant, CPD-accredited courses since 2020.',
        'address' => [
            '@type' => 'PostalAddress',
            'streetAddress' => 'The Maidstone Studios, New Cut Road',
            'addressLocality' => 'Maidstone',
            'addressRegion' => 'Kent',
            'postalCode' => 'ME14 5NZ',
            'addressCountry' => 'GB',
        ],
        'geo' => [
            '@type' => 'GeoCoordinates',
            'latitude' => '51.264494',
            'longitude' => '0.545844',
        ],
        'telephone' => $contact['phone'],
        'email' => $contact['email'],
        'priceRange' => '££',
        'sameAs' => $same_as,
        'aggregateRating' => [
            '@type' => 'AggregateRating',
            'ratingValue' => $rating_value,
            'reviewCount' => $review_count,
            'bestRating' => '5',
            'worstRating' => '5',
        ],
    ];
}

/**
 * Get page featured image URL for schema
 * Checks for custom schema image first, then falls back to featured image
 */
function cta_get_page_schema_image($post_id = null) {
    if (!$post_id) {
        $post_id = get_the_ID();
    }
    
    // Check for custom schema image (meta field)
    $schema_image_id = get_post_meta($post_id, '_cta_schema_image', true);
    
    if ($schema_image_id) {
        $image_url = wp_get_attachment_image_url($schema_image_id, 'full');
        if ($image_url) {
            return $image_url;
        }
    }
    
    // Fall back to featured image
    if (has_post_thumbnail($post_id)) {
        return get_the_post_thumbnail_url($post_id, 'full');
    }
    
    // Fall back to default image
    return get_template_directory_uri() . '/assets/img/default-og-image.jpg';
}

/**
 * Get breadcrumb schema
 */
function cta_get_breadcrumb_schema($items = []) {
    $site_url = home_url();
    $page_url = get_permalink();
    
    if (empty($items)) {
        // Default breadcrumb
        $items = [
            ['name' => 'Home', 'url' => $site_url . '/'],
            ['name' => get_the_title(), 'url' => $page_url],
        ];
    }
    
    $list_items = [];
    foreach ($items as $index => $item) {
        $list_items[] = [
            '@type' => 'ListItem',
            'position' => $index + 1,
            'name' => $item['name'],
            'item' => $item['url'],
        ];
    }
    
    return [
        '@type' => 'BreadcrumbList',
        '@id' => $page_url . '#breadcrumb',
        'itemListElement' => $list_items,
    ];
}

/**
 * Get WebPage schema
 */
function cta_get_webpage_schema($args = []) {
    $site_url = home_url();
    $page_url = get_permalink();
    
    $defaults = [
        'name' => get_the_title() . ' | Continuity Training Academy',
        'description' => get_the_excerpt() ?: wp_trim_words(get_the_content(), 30),
    ];
    
    $args = wp_parse_args($args, $defaults);
    
    $schema = [
        '@type' => 'WebPage',
        '@id' => $page_url . '#webpage',
        'url' => $page_url,
        'name' => $args['name'],
        'description' => $args['description'],
        'isPartOf' => ['@id' => $site_url . '/#website'],
        'about' => ['@id' => $site_url . '/#organization'],
        'breadcrumb' => ['@id' => $page_url . '#breadcrumb'],
    ];
    
    // Add primary image if available
    $image_url = cta_get_page_schema_image();
    if ($image_url) {
        $schema['primaryImageOfPage'] = [
            '@type' => 'ImageObject',
            'url' => $image_url,
        ];
    }
    
    return $schema;
}

/**
 * Output schema JSON-LD in head
 */
function cta_output_schema_json($schema_graph) {
    if (empty($schema_graph)) {
        return;
    }
    
    $schema_data = [
        '@context' => 'https://schema.org',
        '@graph' => $schema_graph,
    ];
    
    echo "\n<!-- Schema.org Structured Data -->\n";
    echo '<script type="application/ld+json">' . "\n";
    echo json_encode($schema_data, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    echo "\n</script>\n";
}

/**
 * Add schema image meta box to page editor
 */
function cta_add_schema_image_meta_box() {
    add_meta_box(
        'cta_schema_image',
        'Schema.org Featured Image',
        'cta_schema_image_meta_box_callback',
        ['page', 'post', 'course'],
        'side',
        'low'
    );
}
add_action('add_meta_boxes', 'cta_add_schema_image_meta_box');

/**
 * Schema image meta box callback
 */
function cta_schema_image_meta_box_callback($post) {
    wp_nonce_field('cta_schema_image_nonce', 'cta_schema_image_nonce');
    
    $image_id = get_post_meta($post->ID, '_cta_schema_image', true);
    $image_url = $image_id ? wp_get_attachment_image_url($image_id, 'medium') : '';
    
    ?>
    <div class="cta-schema-image-wrapper">
        <p class="description">This image will be used in Schema.org markup for SEO. If not set, the featured image will be used.</p>
        
        <div class="cta-schema-image-preview" style="margin: 10px 0;">
            <?php if ($image_url) : ?>
                <img src="<?php echo esc_url($image_url); ?>" style="max-width: 100%; height: auto; display: block;" />
            <?php else : ?>
                <p style="color: #666; font-style: italic;">No schema image set</p>
            <?php endif; ?>
        </div>
        
        <input type="hidden" id="cta_schema_image_id" name="cta_schema_image_id" value="<?php echo esc_attr($image_id); ?>" />
        
        <p>
            <button type="button" class="button cta-upload-schema-image">
                <?php echo $image_id ? 'Change Image' : 'Set Schema Image'; ?>
            </button>
            <?php if ($image_id) : ?>
                <button type="button" class="button cta-remove-schema-image">Remove Image</button>
            <?php endif; ?>
        </p>
    </div>
    
    <script>
    jQuery(document).ready(function($) {
        var mediaUploader;
        
        $('.cta-upload-schema-image').on('click', function(e) {
            e.preventDefault();
            
            if (mediaUploader) {
                mediaUploader.open();
                return;
            }
            
            mediaUploader = wp.media({
                title: 'Choose Schema Image',
                button: {
                    text: 'Use this image'
                },
                multiple: false
            });
            
            mediaUploader.on('select', function() {
                var attachment = mediaUploader.state().get('selection').first().toJSON();
                $('#cta_schema_image_id').val(attachment.id);
                $('.cta-schema-image-preview').html('<img src="' + attachment.url + '" style="max-width: 100%; height: auto; display: block;" />');
                $('.cta-upload-schema-image').text('Change Image');
                if ($('.cta-remove-schema-image').length === 0) {
                    $('.cta-upload-schema-image').after('<button type="button" class="button cta-remove-schema-image">Remove Image</button>');
                }
            });
            
            mediaUploader.open();
        });
        
        $(document).on('click', '.cta-remove-schema-image', function(e) {
            e.preventDefault();
            $('#cta_schema_image_id').val('');
            $('.cta-schema-image-preview').html('<p style="color: #666; font-style: italic;">No schema image set</p>');
            $('.cta-upload-schema-image').text('Set Schema Image');
            $(this).remove();
        });
    });
    </script>
    <?php
}

/**
 * Save schema image meta
 */
function cta_save_schema_image_meta($post_id) {
    // Check nonce
    if (!isset($_POST['cta_schema_image_nonce']) || !wp_verify_nonce($_POST['cta_schema_image_nonce'], 'cta_schema_image_nonce')) {
        return;
    }
    
    // Check autosave
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }
    
    // Check permissions
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }
    
    // Save or delete meta
    if (isset($_POST['cta_schema_image_id']) && !empty($_POST['cta_schema_image_id'])) {
        update_post_meta($post_id, '_cta_schema_image', intval($_POST['cta_schema_image_id']));
    } else {
        delete_post_meta($post_id, '_cta_schema_image');
    }
}
add_action('save_post', 'cta_save_schema_image_meta');

/**
 * Add theme customizer settings for schema
 */
function cta_schema_customizer_settings($wp_customize) {
    // Add Schema Section
    $wp_customize->add_section('cta_schema_settings', [
        'title' => 'Schema & SEO Settings',
        'priority' => 30,
    ]);
    
    // Trustpilot Rating
    $wp_customize->add_setting('cta_trustpilot_rating', [
        'default' => '4.6',
        'sanitize_callback' => 'sanitize_text_field',
    ]);
    
    $wp_customize->add_control('cta_trustpilot_rating', [
        'label' => 'Trustpilot Rating',
        'description' => 'Your current Trustpilot rating (e.g., 4.6)',
        'section' => 'cta_schema_settings',
        'type' => 'text',
    ]);
    
    // Review Count
    $wp_customize->add_setting('cta_trustpilot_review_count', [
        'default' => '20',
        'sanitize_callback' => 'sanitize_text_field',
    ]);
    
    $wp_customize->add_control('cta_trustpilot_review_count', [
        'label' => 'Trustpilot Review Count',
        'description' => 'Number of Trustpilot reviews',
        'section' => 'cta_schema_settings',
        'type' => 'text',
    ]);
    
    // Social Media URLs
    $wp_customize->add_setting('cta_facebook_url', [
        'default' => 'https://www.facebook.com/continuitytraining',
        'sanitize_callback' => 'esc_url_raw',
    ]);
    
    $wp_customize->add_control('cta_facebook_url', [
        'label' => 'Facebook URL',
        'section' => 'cta_schema_settings',
        'type' => 'url',
    ]);
    
    $wp_customize->add_setting('cta_linkedin_url', [
        'default' => 'https://www.linkedin.com/company/continuity-training-academy-cta',
        'sanitize_callback' => 'esc_url_raw',
    ]);
    
    $wp_customize->add_control('cta_linkedin_url', [
        'label' => 'LinkedIn URL',
        'section' => 'cta_schema_settings',
        'type' => 'url',
    ]);
    
    $wp_customize->add_setting('cta_instagram_url', [
        'default' => 'https://www.instagram.com/continuitytrainingacademy',
        'sanitize_callback' => 'esc_url_raw',
    ]);
    
    $wp_customize->add_control('cta_instagram_url', [
        'label' => 'Instagram URL',
        'section' => 'cta_schema_settings',
        'type' => 'url',
    ]);
    
    $wp_customize->add_setting('cta_trustpilot_url', [
        'default' => 'https://www.trustpilot.com/review/continuitytrainingacademy.co.uk',
        'sanitize_callback' => 'esc_url_raw',
    ]);
    
    $wp_customize->add_control('cta_trustpilot_url', [
        'label' => 'Trustpilot URL',
        'section' => 'cta_schema_settings',
        'type' => 'url',
    ]);
}
add_action('customize_register', 'cta_schema_customizer_settings');
