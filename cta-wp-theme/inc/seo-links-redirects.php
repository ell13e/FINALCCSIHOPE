<?php
/**
 * SEO Links Configuration
 *
 * - Strip Category Base (remove /category/ from URLs)
 * - Redirect Attachments (redirect attachment pages to parent posts)
 * - Redirect Orphan Attachments (to homepage)
 *
 * @package CTA_Theme
 */

defined('ABSPATH') || exit;

/**
 * =========================================
 * STRIP CATEGORY BASE
 * =========================================
 */

/**
 * Remove /category/ from category URLs
 */
function cta_strip_category_base($rules) {
    $category_base = get_option('category_base');
    if ($category_base && $category_base !== 'category') {
        return $rules; // Custom category base, don't modify
    }
    
    // Remove category base from rewrite rules
    foreach ($rules as $pattern => $rewrite) {
        if (strpos($pattern, 'category/') !== false) {
            $new_pattern = str_replace('category/', '', $pattern);
            unset($rules[$pattern]);
            $rules[$new_pattern] = $rewrite;
        }
    }
    
    return $rules;
}
add_filter('category_rewrite_rules', 'cta_strip_category_base');

/**
 * Give pages and CPT singles precedence over category when category base is stripped.
 *
 * Stripping the category base makes category rules match first (e.g. single-segment
 * /about/ or two-segment /courses/foo/). WordPress then runs a category query;
 * if no category exists, it 404s and never tries the page or CPT. This filter runs
 * after parse_request: if the request was parsed as a category, we try page first,
 * then single course, then single course_event, and override the query when we find a match.
 */
function cta_page_precedence_over_stripped_category($query_vars) {
    $category_base = get_option('category_base');
    if ($category_base && $category_base !== 'category') {
        return $query_vars;
    }

    $category_name = isset($query_vars['category_name']) ? $query_vars['category_name'] : '';
    if ($category_name === '') {
        return $query_vars;
    }

    $path = trim($category_name, '/');
    $segments = array_values(array_filter(explode('/', $path)));

    // 1) Try page (single segment or hierarchical)
    $page = get_page_by_path($path, OBJECT, 'page');
    if ($page && $page->post_status === 'publish') {
        $query_vars['pagename'] = $path;
        unset($query_vars['category_name'], $query_vars['category']);
        return $query_vars;
    }

    // 2) Two-segment URL: try course (courses/slug) or course_event (upcoming-courses/slug)
    if (count($segments) === 2) {
        $prefix = $segments[0];
        $slug   = $segments[1];

        if ($prefix === 'courses') {
            $course = get_posts([
                'name'           => $slug,
                'post_type'      => 'course',
                'post_status'    => 'publish',
                'posts_per_page' => 1,
                'fields'         => 'ids',
                'no_found_rows'  => true,
            ]);
            if (!empty($course)) {
                $query_vars['course'] = $slug;
                unset($query_vars['category_name'], $query_vars['category']);
                return $query_vars;
            }
        }

        if ($prefix === 'upcoming-courses') {
            $event = get_posts([
                'name'           => $slug,
                'post_type'      => 'course_event',
                'post_status'    => 'publish',
                'posts_per_page' => 1,
                'fields'         => 'ids',
                'no_found_rows'  => true,
            ]);
            if (!empty($event)) {
                $query_vars['course_event'] = $slug;
                unset($query_vars['category_name'], $query_vars['category']);
                return $query_vars;
            }
        }
    }

    return $query_vars;
}
add_filter('request', 'cta_page_precedence_over_stripped_category', 10, 1);

/**
 * Fix category links to not include /category/
 */
function cta_fix_category_link($termlink, $term, $taxonomy) {
    if ($taxonomy === 'category') {
        $category_base = get_option('category_base');
        if ($category_base === 'category' || empty($category_base)) {
            // Remove /category/ from link
            $termlink = str_replace('/category/', '/', $termlink);
        }
    }
    return $termlink;
}
add_filter('term_link', 'cta_fix_category_link', 10, 3);

/**
 * =========================================
 * ATTACHMENT REDIRECTS
 * =========================================
 */

/**
 * Redirect attachment pages to parent post
 */
function cta_redirect_attachments() {
    if (!is_attachment()) {
        return;
    }
    
    global $post;
    
    // Get parent post
    $parent_id = $post->post_parent;
    
    if ($parent_id) {
        // Redirect to parent post
        $parent_url = get_permalink($parent_id);
        if ($parent_url) {
            wp_redirect($parent_url, 301);
            exit;
        }
    } else {
        // Orphan attachment - redirect to homepage
        wp_redirect(home_url('/'), 301);
        exit;
    }
}
add_action('template_redirect', 'cta_redirect_attachments', 1);

/**
 * =========================================
 * EXTERNAL LINKS CONFIGURATION
 * =========================================
 */

/**
 * Add target="_blank" to external links (opens in new tab)
 * Note: NoFollow is OFF as requested (external links help SEO)
 */
function cta_add_external_link_attributes($content) {
    if (empty($content)) {
        return $content;
    }
    
    // Don't modify in admin
    if (is_admin()) {
        return $content;
    }
    
    // Get site URL for comparison
    $site_url = home_url();
    $site_domain = parse_url($site_url, PHP_URL_HOST);
    
    // Find all links
    $pattern = '/<a\s+([^>]*href=["\']([^"\']*)["\'][^>]*)>/i';
    
    $content = preg_replace_callback($pattern, function($matches) use ($site_domain) {
        $full_tag = $matches[0];
        $attributes = $matches[1];
        $url = $matches[2];
        
        // Skip if already has target attribute
        if (strpos($attributes, 'target=') !== false) {
            return $full_tag;
        }
        
        // Skip anchor links and mailto/tel
        if (strpos($url, '#') === 0 || strpos($url, 'mailto:') === 0 || strpos($url, 'tel:') === 0) {
            return $full_tag;
        }
        
        // Check if external link
        $url_domain = parse_url($url, PHP_URL_HOST);
        $is_external = $url_domain && $url_domain !== $site_domain;
        
        if ($is_external) {
            // Add target="_blank" and rel="noopener noreferrer" for security
            $new_attributes = rtrim($attributes);
            if (strpos($attributes, 'rel=') === false) {
                $new_attributes .= ' rel="noopener noreferrer"';
            } else {
                // Add noopener if not already present
                if (strpos($attributes, 'noopener') === false) {
                    $new_attributes = preg_replace('/rel=["\']([^"\']*)["\']/', 'rel="$1 noopener noreferrer"', $new_attributes);
                }
            }
            $new_attributes .= ' target="_blank"';
            
            return '<a ' . $new_attributes . '>';
        }
        
        return $full_tag;
    }, $content);
    
    return $content;
}
add_filter('the_content', 'cta_add_external_link_attributes', 99);
add_filter('widget_text', 'cta_add_external_link_attributes', 99);

/**
 * =========================================
 * IMAGE SEO - AUTO ALT TEXT
 * =========================================
 */

/**
 * Auto-generate alt text from filename if missing
 * Format: %filename% (cleaned and formatted)
 * Runs with lower priority (20) so course-specific alt text takes precedence
 */
function cta_auto_generate_alt_text($attr, $attachment, $size) {
    // Only if alt text is missing (after other filters have run)
    if (!empty($attr['alt'])) {
        return $attr;
    }
    
    // Get attachment filename
    $filename = get_post_meta($attachment->ID, '_wp_attached_file', true);
    if (empty($filename)) {
        $file_path = get_attached_file($attachment->ID);
        if ($file_path) {
            $filename = basename($file_path);
        }
    }
    
    if (empty($filename)) {
        return $attr;
    }
    
    // Remove extension and clean up
    $filename = pathinfo($filename, PATHINFO_FILENAME);
    $filename = str_replace(['-', '_'], ' ', $filename);
    $filename = ucwords(strtolower($filename));
    
    // Set alt text
    $attr['alt'] = $filename;
    
    // Also save to attachment meta for future use
    if (empty(get_post_meta($attachment->ID, '_wp_attachment_image_alt', true))) {
        update_post_meta($attachment->ID, '_wp_attachment_image_alt', $filename);
    }
    
    return $attr;
}
// Priority 20 so course-specific alt text (priority 10) takes precedence
add_filter('wp_get_attachment_image_attributes', 'cta_auto_generate_alt_text', 20, 3);

/**
 * Auto-generate alt text when image is uploaded
 */
function cta_auto_alt_on_upload($post_id) {
    // Only for images
    if (!wp_attachment_is_image($post_id)) {
        return;
    }
    
    // Only if alt text is missing
    $existing_alt = get_post_meta($post_id, '_wp_attachment_image_alt', true);
    if (!empty($existing_alt)) {
        return;
    }
    
    // Get filename
    $file = get_attached_file($post_id);
    if (!$file) {
        return;
    }
    
    $filename = basename($file);
    $filename = pathinfo($filename, PATHINFO_FILENAME);
    $filename = str_replace(['-', '_'], ' ', $filename);
    $filename = ucwords(strtolower($filename));
    
    // Save alt text
    update_post_meta($post_id, '_wp_attachment_image_alt', $filename);
}
add_action('add_attachment', 'cta_auto_alt_on_upload');
add_action('edit_attachment', 'cta_auto_alt_on_upload');

/**
 * Bulk add alt text to existing images without alt text
 */
function cta_bulk_add_alt_text() {
    $images = get_posts([
        'post_type' => 'attachment',
        'post_mime_type' => 'image',
        'posts_per_page' => -1,
        'meta_query' => [
            [
                'key' => '_wp_attachment_image_alt',
                'compare' => 'NOT EXISTS',
            ],
        ],
    ]);
    
    $count = 0;
    foreach ($images as $image) {
        $file = get_attached_file($image->ID);
        if (!$file) {
            continue;
        }
        
        $filename = basename($file);
        $filename = pathinfo($filename, PATHINFO_FILENAME);
        $filename = str_replace(['-', '_'], ' ', $filename);
        $filename = ucwords(strtolower($filename));
        
        update_post_meta($image->ID, '_wp_attachment_image_alt', $filename);
        $count++;
    }
    
    return $count;
}

/**
 * Admin notice for bulk alt text tool
 */
function cta_bulk_alt_text_admin_notice() {
    if (isset($_GET['cta_bulk_alt_done'])) {
        $count = intval($_GET['cta_bulk_alt_done']);
        ?>
        <div class="notice notice-success is-dismissible">
            <p>✅ Successfully added alt text to <?php echo $count; ?> images.</p>
        </div>
        <?php
    }
}
add_action('admin_notices', 'cta_bulk_alt_text_admin_notice');

/**
 * Add bulk alt text tool to admin
 */
function cta_add_bulk_alt_text_tool() {
    if (isset($_GET['cta_bulk_alt_text']) && current_user_can('manage_options')) {
        check_admin_referer('cta_bulk_alt_text');
        $count = cta_bulk_add_alt_text();
        wp_redirect(admin_url('upload.php?cta_bulk_alt_done=' . $count));
        exit;
    }
}
add_action('admin_init', 'cta_add_bulk_alt_text_tool');

/**
 * Add bulk alt text button to media library
 */
function cta_add_bulk_alt_text_button($views) {
    if (current_user_can('manage_options')) {
        $url = wp_nonce_url(admin_url('upload.php?cta_bulk_alt_text=1'), 'cta_bulk_alt_text');
        $views['cta_bulk_alt'] = '<a href="' . esc_url($url) . '" class="button">Add Alt Text to All Images</a>';
    }
    return $views;
}
add_filter('views_upload', 'cta_add_bulk_alt_text_button');

