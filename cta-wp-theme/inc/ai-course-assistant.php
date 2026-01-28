<?php
/**
 * AI Course Assistant
 * 
 * Provides AI-powered content generation for course and event fields
 * with context-aware prompts and character limit handling
 *
 * @package CTA_Theme
 */

defined('ABSPATH') || exit;

/**
 * Get AI context for a field based on post type and field name
 */
function cta_get_ai_context_for_field($field_name, $post_id) {
    $context = [];
    $post_type = get_post_type($post_id);
    
    if ($post_type === 'course') {
        $context = [
            'title' => get_the_title($post_id),
            'level' => get_field('course_level', $post_id),
            'duration' => get_field('course_duration', $post_id),
            'hours' => get_field('course_hours', $post_id),
            'accreditation' => get_field('course_accreditation', $post_id),
            'price' => get_field('course_price', $post_id),
            'outcomes' => function_exists('cta_get_outcomes') ? cta_get_outcomes($post_id) : get_field('course_outcomes', $post_id),
            'suitable_for' => get_field('course_suitable_for', $post_id),
            'prerequisites' => get_field('course_prerequisites', $post_id),
            'category' => '',
        ];
        
        // Get category
        $terms = get_the_terms($post_id, 'course_category');
        if ($terms && !is_wp_error($terms)) {
            $context['category'] = $terms[0]->name;
        }
    } elseif ($post_type === 'course_event') {
        $course = get_field('linked_course', $post_id);
        $context = [
            'event_title' => get_the_title($post_id),
            'event_date' => get_field('event_date', $post_id),
            'start_time' => get_field('start_time', $post_id),
            'end_time' => get_field('end_time', $post_id),
            'location' => get_field('event_location', $post_id),
            'price' => get_field('event_price', $post_id),
            'course' => $course ? [
                'title' => $course->post_title,
                'level' => get_field('course_level', $course->ID),
                'duration' => get_field('course_duration', $course->ID),
                'accreditation' => get_field('course_accreditation', $course->ID),
            ] : null,
        ];
    }
    
    return $context;
}

/**
 * Call AI API for field generation with character limit handling
 */
function cta_call_ai_api_for_field($api_key, $provider, $system_prompt, $user_prompt, $field_type, $max_chars = null) {
    // Ignore the single-provider selection at callsites and always try Groq first,
    // then fall back to preferred provider, then remaining configured providers.
    $preferred_provider = get_option('cta_ai_provider', 'groq');
    $result = cta_ai_try_providers($preferred_provider, function($p, $key) use ($system_prompt, $user_prompt) {
        if ($p === 'groq' && function_exists('cta_call_groq_api')) {
            return cta_call_groq_api($key, $system_prompt, $user_prompt);
        }
        if ($p === 'anthropic' && function_exists('cta_call_anthropic_api')) {
            return cta_call_anthropic_api($key, $system_prompt, $user_prompt);
        }
        if ($p === 'openai' && function_exists('cta_call_openai_api')) {
            return cta_call_openai_api($key, $system_prompt, $user_prompt);
        }
        return new WP_Error('api_error', 'Provider not available');
    });
    
    if (is_wp_error($result)) {
        return $result;
    }
    
    if (!$result) {
        return new WP_Error('api_error', 'No response from AI API');
    }
    
    // Clean result
    $content = trim(strip_tags($result));
    $content = preg_replace('/^["\']|["\']$/', '', $content); // Remove quotes if AI added them
    
    // Apply character limit if specified
    if ($max_chars && strlen($content) > $max_chars) {
        $content = substr($content, 0, $max_chars - 3) . '...';
    }
    
    return $content;
}

/**
 * AJAX handler for generating course description
 */
function cta_generate_course_description_ajax() {
    check_ajax_referer('cta_ai_course', 'nonce');
    
    if (!current_user_can('edit_posts')) {
        wp_send_json_error(['message' => 'Permission denied']);
    }
    
    $post_id = absint($_POST['post_id'] ?? 0);
    if (!$post_id || get_post_type($post_id) !== 'course') {
        wp_send_json_error(['message' => 'Invalid post ID']);
    }
    
    // Check if AI is configured (Groq first, then fallbacks if keys are set)
    $provider = get_option('cta_ai_provider', 'groq');
    if (empty(cta_ai_get_attemptable_providers($provider))) {
        wp_send_json_error(['message' => 'AI API keys not configured. Go to Settings → AI Assistant and add your keys.']);
    }
    
    // Get context
    $context = cta_get_ai_context_for_field('course_description', $post_id);
    
    // Build context-aware prompt
    $system_prompt = "You are an expert content writer for Continuity Training Academy, a care sector training provider in Kent, UK. Write comprehensive, engaging course descriptions that help UK care sector professionals understand what they will learn. Use British English only.";
    
    $prompt = "Write a comprehensive course description for: {$context['title']}
" . ($context['level'] ? "Level: {$context['level']}\n" : "") . 
($context['duration'] ? "Duration: {$context['duration']}\n" : "") . 
($context['accreditation'] && strtolower(trim($context['accreditation'])) !== 'none' ? "Accreditation: {$context['accreditation']}\n" : "") . 
($context['category'] ? "Category: {$context['category']}\n" : "") . 
($context['suitable_for'] ? "Target Audience: {$context['suitable_for']}\n" : "") . 
($context['outcomes'] && is_array($context['outcomes']) ? "Learning Outcomes:\n" . implode("\n", array_map(function($o) { return is_array($o) ? ($o['outcome_text'] ?? '') : $o; }, $context['outcomes'])) . "\n" : "") . "

Requirements:
- Comprehensive description (no character limit, but aim for 200-400 words)
- Include: what the course covers, who it's for, learning outcomes, accreditation details
- Target: UK care sector professionals
- Tone: professional and informative
- Location: Mention Maidstone, Kent if relevant
- Use British English only
- Format: Well-structured paragraphs, easy to read

Write only the description text, nothing else.";
    
    $description = cta_call_ai_api_for_field('', $provider, $system_prompt, $prompt, 'textarea');
    
    if (is_wp_error($description)) {
        wp_send_json_error(['message' => 'AI generation failed: ' . $description->get_error_message()]);
    }
    
    wp_send_json_success(['description' => $description]);
}
add_action('wp_ajax_cta_generate_course_description', 'cta_generate_course_description_ajax');

/**
 * AJAX handler for generating course SEO meta description
 */
function cta_generate_course_meta_description_ajax() {
    check_ajax_referer('cta_ai_course', 'nonce');
    
    if (!current_user_can('edit_posts')) {
        wp_send_json_error(['message' => 'Permission denied']);
    }
    
    $post_id = absint($_POST['post_id'] ?? 0);
    if (!$post_id || get_post_type($post_id) !== 'course') {
        wp_send_json_error(['message' => 'Invalid post ID']);
    }
    
    // Check if AI is configured (Groq first, then fallbacks if keys are set)
    $provider = get_option('cta_ai_provider', 'groq');
    if (empty(cta_ai_get_attemptable_providers($provider))) {
        wp_send_json_error(['message' => 'AI API keys not configured. Go to Settings → AI Assistant and add your keys.']);
    }
    
    // Get context
    $context = cta_get_ai_context_for_field('course_seo_meta_description', $post_id);
    
    // Build context-aware prompt
    $system_prompt = "You are an expert SEO copywriter for Continuity Training Academy, a care sector training provider in Kent, UK. Write compelling, keyword-rich meta descriptions optimized for search engines. Use British English only.";
    
    $prompt = "Write a 150-160 character SEO meta description for: {$context['title']}
" . ($context['level'] ? "Level: {$context['level']}\n" : "") . 
($context['duration'] ? "Duration: {$context['duration']}\n" : "") . 
($context['accreditation'] && strtolower(trim($context['accreditation'])) !== 'none' ? "Accreditation: {$context['accreditation']}\n" : "") . 
($context['category'] ? "Category: {$context['category']}\n" : "") . "

Requirements:
- Exactly 150-160 characters
- Include: course name, location (Maidstone, Kent), key benefit, accreditation if relevant
- Target: UK care sector professionals searching for training
- Format: Compelling, keyword-rich, action-oriented
- Use British English only
- No quotes, no prefixes, just the meta description text

Write only the meta description, nothing else.";
    
    $meta_description = cta_call_ai_api_for_field('', $provider, $system_prompt, $prompt, 'textarea', 160);
    
    if (is_wp_error($meta_description)) {
        wp_send_json_error(['message' => 'AI generation failed: ' . $meta_description->get_error_message()]);
    }
    
    wp_send_json_success(['meta_description' => $meta_description]);
}
add_action('wp_ajax_cta_generate_course_meta_description', 'cta_generate_course_meta_description_ajax');

/**
 * AJAX handler for generating event SEO meta description
 */
function cta_generate_event_meta_description_ajax() {
    check_ajax_referer('cta_ai_course', 'nonce');
    
    if (!current_user_can('edit_posts')) {
        wp_send_json_error(['message' => 'Permission denied']);
    }
    
    $post_id = absint($_POST['post_id'] ?? 0);
    if (!$post_id || get_post_type($post_id) !== 'course_event') {
        wp_send_json_error(['message' => 'Invalid post ID']);
    }
    
    // Check if AI is configured (Groq first, then fallbacks if keys are set)
    $provider = get_option('cta_ai_provider', 'groq');
    if (empty(cta_ai_get_attemptable_providers($provider))) {
        wp_send_json_error(['message' => 'AI API keys not configured. Go to Settings → AI Assistant and add your keys.']);
    }
    
    // Get context
    $context = cta_get_ai_context_for_field('event_seo_meta_description', $post_id);
    
    $event_title = $context['event_title'];
    $course_title = $context['course'] ? $context['course']['title'] : $event_title;
    $formatted_date = $context['event_date'] ? date('j M Y', strtotime($context['event_date'])) : '';
    $location = $context['location'] ?: 'Maidstone, Kent';
    $duration = $context['course'] ? $context['course']['duration'] : '';
    
    // Build context-aware prompt
    $system_prompt = "You are an expert SEO copywriter for Continuity Training Academy, a care sector training provider in Kent, UK. Write compelling, date-specific meta descriptions optimized for search engines. Use British English only.";
    
    $prompt = "Write a 150-160 character SEO meta description for an event.

Event: {$event_title}
Course: {$course_title}
" . ($formatted_date ? "Date: {$formatted_date}\n" : "") . 
"Location: {$location}
" . ($duration ? "Duration: {$duration}\n" : "") . 
($context['price'] ? "Price: £" . number_format($context['price'], 0) . "\n" : "") . "

Requirements:
- Exactly 150-160 characters
- Include: course name, date, location (Maidstone, Kent), booking CTA
- Target: UK care sector professionals searching for training courses
- Format: Compelling, date-specific, action-oriented
- Use British English only
- No quotes, no prefixes, just the meta description text

Write only the meta description, nothing else.";
    
    $meta_description = cta_call_ai_api_for_field('', $provider, $system_prompt, $prompt, 'textarea', 160);
    
    if (is_wp_error($meta_description)) {
        wp_send_json_error(['message' => 'AI generation failed: ' . $meta_description->get_error_message()]);
    }
    
    wp_send_json_success(['meta_description' => $meta_description]);
}
add_action('wp_ajax_cta_generate_event_meta_description', 'cta_generate_event_meta_description_ajax');

/**
 * Add JavaScript for AI generation buttons in course and event editors
 */
function cta_course_ai_assistant_script($hook) {
    global $post;
    
    if ($hook !== 'post.php' && $hook !== 'post-new.php') {
        return;
    }
    
    if (!$post || !in_array($post->post_type, ['course', 'course_event'])) {
        return;
    }
    
    ?>
    <script>
    jQuery(document).ready(function($) {
        // Generate Course Description with AI
        $('#cta-generate-course-description').on('click', function() {
            var $button = $(this);
            var $status = $('#cta-generate-description-status');
            var $descriptionField = $('#acf-field_course_description');
            
            if (!$descriptionField.length) {
                $status.html('<span style="color: #d63638;">✗ Field not found</span>');
                return;
            }
            
            $button.prop('disabled', true).text('Generating...');
            $status.html('<span class="spinner is-active" style="float:none;margin:0;"></span>');
            
            $.ajax({
                url: ajaxurl,
                type: 'POST',
                data: {
                    action: 'cta_generate_course_description',
                    post_id: <?php echo $post->ID; ?>,
                    nonce: '<?php echo wp_create_nonce('cta_ai_course'); ?>'
                },
                success: function(response) {
                    if (response.success && response.data && response.data.description) {
                        $descriptionField.val(response.data.description);
                        $descriptionField.trigger('change');
                        $status.html('<span style="color: #00a32a;">✓ Generated</span>');
                    } else {
                        $status.html('<span style="color: #d63638;">✗ ' + (response.data && response.data.message ? response.data.message : 'Generation failed') + '</span>');
                    }
                },
                error: function() {
                    $status.html('<span style="color: #d63638;">✗ Generation failed</span>');
                },
                complete: function() {
                    $button.prop('disabled', false).text('✨ Generate with AI');
                }
            });
        });
        
        // Generate Course Meta Description with AI
        $('#cta-generate-course-meta-description').on('click', function() {
            var $button = $(this);
            var $status = $('#cta-generate-meta-description-status');
            var $metaField = $('#acf-field_course_seo_meta_description');
            
            if (!$metaField.length) {
                $status.html('<span style="color: #d63638;">✗ Field not found</span>');
                return;
            }
            
            $button.prop('disabled', true).text('Generating...');
            $status.html('<span class="spinner is-active" style="float:none;margin:0;"></span>');
            
            $.ajax({
                url: ajaxurl,
                type: 'POST',
                data: {
                    action: 'cta_generate_course_meta_description',
                    post_id: <?php echo $post->ID; ?>,
                    nonce: '<?php echo wp_create_nonce('cta_ai_course'); ?>'
                },
                success: function(response) {
                    if (response.success && response.data && response.data.meta_description) {
                        $metaField.val(response.data.meta_description);
                        $metaField.trigger('input'); // Trigger counter update if exists
                        $status.html('<span style="color: #00a32a;">✓ Generated</span>');
                    } else {
                        $status.html('<span style="color: #d63638;">✗ ' + (response.data && response.data.message ? response.data.message : 'Generation failed') + '</span>');
                    }
                },
                error: function() {
                    $status.html('<span style="color: #d63638;">✗ Generation failed</span>');
                },
                complete: function() {
                    $button.prop('disabled', false).text('✨ Generate with AI');
                }
            });
        });
        
        // Generate Event Meta Description with AI
        $('#cta-generate-event-meta-description').on('click', function() {
            var $button = $(this);
            var $status = $('#cta-generate-event-meta-description-status');
            var $metaField = $('#acf-field_event_seo_meta_description');
            
            if (!$metaField.length) {
                $status.html('<span style="color: #d63638;">✗ Field not found</span>');
                return;
            }
            
            $button.prop('disabled', true).text('Generating...');
            $status.html('<span class="spinner is-active" style="float:none;margin:0;"></span>');
            
            $.ajax({
                url: ajaxurl,
                type: 'POST',
                data: {
                    action: 'cta_generate_event_meta_description',
                    post_id: <?php echo $post->ID; ?>,
                    nonce: '<?php echo wp_create_nonce('cta_ai_course'); ?>'
                },
                success: function(response) {
                    if (response.success && response.data && response.data.meta_description) {
                        $metaField.val(response.data.meta_description);
                        $metaField.trigger('input'); // Trigger counter update if exists
                        $status.html('<span style="color: #00a32a;">✓ Generated</span>');
                    } else {
                        $status.html('<span style="color: #d63638;">✗ ' + (response.data && response.data.message ? response.data.message : 'Generation failed') + '</span>');
                    }
                },
                error: function() {
                    $status.html('<span style="color: #d63638;">✗ Generation failed</span>');
                },
                complete: function() {
                    $button.prop('disabled', false).text('✨ Generate with AI');
                }
            });
        });
    });
    </script>
    <?php
}
add_action('admin_footer', 'cta_course_ai_assistant_script');
