<?php
// Quick diagnostic to check what's happening with sitemaps
require_once('wordpress/wp-load.php');

echo "=== SITEMAP DIAGNOSTIC ===\n\n";

// Check if course_event post type exists
$post_type_obj = get_post_type_object('course_event');
echo "course_event post type exists: " . ($post_type_obj ? "YES" : "NO") . "\n";
if ($post_type_obj) {
    echo "  - public: " . ($post_type_obj->public ? "YES" : "NO") . "\n";
    echo "  - publicly_queryable: " . ($post_type_obj->publicly_queryable ? "YES" : "NO") . "\n";
    echo "  - show_in_rest: " . ($post_type_obj->show_in_rest ? "YES" : "NO") . "\n";
}

// Count published posts
$count = wp_count_posts('course_event');
echo "\nPublished course_event posts: " . ($count->publish ?? 0) . "\n";

// Check what sitemap sees
$registry = WP_Sitemaps_Registry::get_instance();
$provider = $registry->get_provider('posts');
if ($provider) {
    $post_types = $provider->get_object_subtypes();
    echo "\nPost types in sitemap:\n";
    foreach ($post_types as $pt) {
        $count = wp_count_posts($pt->name);
        echo "  - {$pt->name}: {$count->publish} published\n";
    }
}

echo "\n=== END DIAGNOSTIC ===\n";
