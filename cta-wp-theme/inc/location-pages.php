<?php
/**
 * Location Pages Helper Functions
 * 
 * Provides data structure and helper functions for location-specific landing pages
 *
 * @package CTA_Theme
 */

defined('ABSPATH') || exit;

/**
 * Get available locations data
 * 
 * @return array Location data with keys, names, coordinates, and descriptions
 */
function cta_get_locations_data() {
    return [
        'maidstone' => [
            'name' => 'Maidstone',
            'display_name' => 'Maidstone, Kent',
            'slug' => 'maidstone',
            'coordinates' => [
                'lat' => 51.2795,
                'lng' => 0.5467,
            ],
            'description' => 'Professional care training courses in Maidstone, Kent. Face-to-face training at our Maidstone Studios training centre.',
            'service_area' => true,
            'is_primary' => true, // Main location
        ],
        'canterbury' => [
            'name' => 'Canterbury',
            'display_name' => 'Canterbury, Kent',
            'slug' => 'canterbury',
            'coordinates' => [
                'lat' => 51.2802,
                'lng' => 1.0789,
            ],
            'description' => 'Care training courses available in Canterbury, Kent. We provide on-site training for care providers in the Canterbury area.',
            'service_area' => true,
            'is_primary' => false,
        ],
        'ashford' => [
            'name' => 'Ashford',
            'display_name' => 'Ashford, Kent',
            'slug' => 'ashford',
            'coordinates' => [
                'lat' => 51.1468,
                'lng' => 0.8738,
            ],
            'description' => 'CQC-compliant care training courses in Ashford, Kent. On-site training available for care homes and healthcare providers.',
            'service_area' => true,
            'is_primary' => false,
        ],
        'medway' => [
            'name' => 'Medway',
            'display_name' => 'Medway & Chatham, Kent',
            'slug' => 'medway',
            'coordinates' => [
                'lat' => 51.4044,
                'lng' => 0.5269,
            ],
            'description' => 'Care sector training courses in Medway and Chatham, Kent. Serving care providers across the Medway towns.',
            'service_area' => true,
            'is_primary' => false,
        ],
        'tonbridge' => [
            'name' => 'Tonbridge',
            'display_name' => 'Tonbridge, Kent',
            'slug' => 'tonbridge',
            'coordinates' => [
                'lat' => 51.1953,
                'lng' => 0.2734,
            ],
            'description' => 'Professional care training in Tonbridge, Kent. Face-to-face and on-site training options available.',
            'service_area' => true,
            'is_primary' => false,
        ],
    ];
}

/**
 * Get location data by slug
 * 
 * @param string $location_slug Location slug (e.g., 'maidstone')
 * @return array|false Location data or false if not found
 */
function cta_get_location_data($location_slug) {
    $locations = cta_get_locations_data();
    return isset($locations[$location_slug]) ? $locations[$location_slug] : false;
}

/**
 * Get location data from current page
 * 
 * Checks ACF field first, then page slug, then URL parameter
 * 
 * @return array|false Location data or false if not found
 */
function cta_get_current_location_data() {
    global $post;
    
    // Check ACF field first
    if (function_exists('get_field') && $post) {
        $location_slug = get_field('location_slug', $post->ID);
        if ($location_slug) {
            return cta_get_location_data($location_slug);
        }
    }
    
    // Check page slug
    if ($post && $post->post_type === 'page') {
        $page_slug = $post->post_name;
        $location_data = cta_get_location_data($page_slug);
        if ($location_data) {
            return $location_data;
        }
    }
    
    // Check URL parameter
    if (isset($_GET['location'])) {
        $location_slug = sanitize_text_field($_GET['location']);
        return cta_get_location_data($location_slug);
    }
    
    return false;
}

/**
 * Get courses available for a specific location
 * 
 * @param string $location_slug Location slug
 * @param int $limit Number of courses to return (0 for all)
 * @return WP_Query Query object with courses
 */
function cta_get_location_courses($location_slug, $limit = 0) {
    $args = [
        'post_type' => 'course',
        'posts_per_page' => $limit > 0 ? $limit : -1,
        'post_status' => 'publish',
        'orderby' => 'title',
        'order' => 'ASC',
    ];
    
    // All courses are available at all locations (on-site training)
    // In the future, this could filter by location-specific meta fields
    
    return new WP_Query($args);
}

/**
 * Get upcoming course events for a location
 * 
 * @param string $location_slug Location slug
 * @param int $limit Number of events to return
 * @return WP_Query Query object with course events
 */
function cta_get_location_events($location_slug, $limit = 6) {
    $location_data = cta_get_location_data($location_slug);
    
    $args = [
        'post_type' => 'course_event',
        'posts_per_page' => $limit,
        'post_status' => 'publish',
        'meta_key' => 'event_date',
        'orderby' => 'meta_value',
        'order' => 'ASC',
        'meta_query' => [
            [
                'key' => 'event_active',
                'value' => '1',
                'compare' => '=',
            ],
            [
                'key' => 'event_date',
                'value' => date('Y-m-d'),
                'compare' => '>=',
            ],
        ],
    ];
    
    // If location is Maidstone, filter by Maidstone Studios location
    // For other locations, show events that could be on-site
    if ($location_data && $location_data['is_primary']) {
        $args['meta_query'][] = [
            'key' => 'event_location',
            'value' => 'Maidstone',
            'compare' => 'LIKE',
        ];
    }
    
    return new WP_Query($args);
}

/**
 * Generate location-specific schema markup
 * 
 * @param array $location_data Location data array
 * @return array Schema.org LocalBusiness schema
 */
function cta_get_location_schema($location_data) {
    if (!$location_data) {
        return [];
    }
    
    $contact = function_exists('cta_get_contact_info') ? cta_get_contact_info() : [];
    $org_name = cta_safe_get_field('seo_org_name', 'option', get_bloginfo('name'));
    
    $schema = [
        '@context' => 'https://schema.org',
        '@type' => 'LocalBusiness',
        'name' => $org_name . ' - ' . $location_data['name'],
        'description' => $location_data['description'],
        'address' => [
            '@type' => 'PostalAddress',
            'addressLocality' => $location_data['name'],
            'addressRegion' => 'Kent',
            'addressCountry' => 'GB',
        ],
        'geo' => [
            '@type' => 'GeoCoordinates',
            'latitude' => $location_data['coordinates']['lat'],
            'longitude' => $location_data['coordinates']['lng'],
        ],
        'telephone' => $contact['phone'] ?? '01622 587343',
        'email' => $contact['email'] ?? 'enquiries@continuitytrainingacademy.co.uk',
    ];
    
    // Add service area
    if ($location_data['service_area']) {
        $schema['areaServed'] = [
            '@type' => 'City',
            'name' => $location_data['name'],
        ];
    }
    
    return $schema;
}

/**
 * Get SEO-optimized title for location page
 * 
 * @param array $location_data Location data
 * @param string $type Type of page ('training', 'first-aid', 'care-certificate')
 * @return string SEO-optimized title
 */
function cta_get_location_seo_title($location_data, $type = 'training') {
    if (!$location_data) {
        return '';
    }
    
    $templates = [
        'training' => 'Care Training Courses in {location} | Continuity Training Academy',
        'first-aid' => 'First Aid Training {location} | HSE-Approved Courses',
        'care-certificate' => 'Care Certificate Training {location} | CQC-Compliant',
    ];
    
    $template = $templates[$type] ?? $templates['training'];
    return str_replace('{location}', $location_data['display_name'], $template);
}

/**
 * Get SEO-optimized description for location page
 * 
 * @param array $location_data Location data
 * @param string $type Type of page
 * @return string SEO-optimized description
 */
function cta_get_location_seo_description($location_data, $type = 'training') {
    if (!$location_data) {
        return '';
    }
    
    $base_description = $location_data['description'];
    
    if ($type === 'first-aid') {
        return 'HSE-approved first aid training courses in ' . $location_data['display_name'] . '. Emergency First Aid at Work, Paediatric First Aid, and Basic Life Support training available.';
    } elseif ($type === 'care-certificate') {
        return 'Care Certificate training in ' . $location_data['display_name'] . '. CQC-compliant, Skills for Care aligned training for new care workers. Face-to-face and on-site options available.';
    }
    
    return $base_description . ' CQC-compliant, CPD-accredited courses. Book your training today.';
}

/**
 * Location Pages - Auto-Population
 * 
 * Location pages are automatically created when the theme is activated.
 * See inc/data-importer.php for the auto-population logic.
 * 
 * All location pages (16 total) are created automatically:
 * - Main index: /locations/
 * - Kent locations: maidstone, medway, canterbury, ashford, tunbridge-wells
 * - UK-wide: greater-manchester, london, west-yorkshire, midlands, south-west,
 *   lancashire, east-england, merseyside, scotland, wales
 * 
 * Each location has its own template file in page-templates/locations/
 * Pages are created with proper parent-child relationships and assigned templates.
 * 
 * No manual creation needed - everything happens automatically on theme upload!
 */
