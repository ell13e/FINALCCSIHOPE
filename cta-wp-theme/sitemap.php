<?php
/**
 * Custom Sitemap Configuration
 * 
 * WordPress generates sitemaps automatically at /wp-sitemap.xml
 * This file customizes what's included.
 * 
 * Add this to functions.php to use these customizations
 * 
 * @package CTA_Theme
 */

/**
 * Add custom pages to sitemap
 */
add_filter('wp_sitemaps_posts_entry', 'cta_customize_sitemap_entry', 10, 3);
function cta_customize_sitemap_entry($entry, $post, $post_type) {
    // Set priority based on page importance
    $high_priority_pages = [
        'cqc-compliance-hub',
        'training-guides',
        'downloadable-resources',
        'faqs',
        'group-training',
        'contact'
    ];
    
    if ($post_type === 'page') {
        $post_slug = $post->post_name;
        
        if (in_array($post_slug, $high_priority_pages)) {
            $entry['priority'] = 0.9;
            $entry['changefreq'] = 'weekly';
        }
    }
    
    // Set high priority for courses
    if ($post_type === 'course' || $post_type === 'course_event') {
        $entry['priority'] = 0.8;
        $entry['changefreq'] = 'weekly';
    }
    
    // Set priority for blog posts
    if ($post_type === 'post') {
        $entry['priority'] = 0.7;
        $entry['changefreq'] = 'monthly';
    }
    
    return $entry;
}

/**
 * Add custom post types to sitemap
 */
add_filter('wp_sitemaps_post_types', 'cta_add_custom_post_types_to_sitemap');
function cta_add_custom_post_types_to_sitemap($post_types) {
    // Ensure courses are included
    if (post_type_exists('course')) {
        $post_types['course'] = get_post_type_object('course');
    }
    
    // Ensure events are included
    if (post_type_exists('course_event')) {
        $post_types['course_event'] = get_post_type_object('course_event');
    }
    
    return $post_types;
}

/**
 * Set sitemap max entries per page
 */
add_filter('wp_sitemaps_max_urls', function() {
    return 2000; // WordPress default is 2000, can go up to 50000
});
