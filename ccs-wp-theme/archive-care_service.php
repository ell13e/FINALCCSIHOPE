<?php
/**
 * Care Services Archive – CCS
 *
 * @package ccs-theme
 */

get_header();

$services_url = get_post_type_archive_link('care_service');
$contact_page = ccs_page_url('contact');

$service_categories = get_terms(['taxonomy' => 'service_category', 'hide_empty' => true]);
$care_conditions   = get_terms(['taxonomy' => 'care_condition', 'hide_empty' => true]);
$coverage_areas     = get_terms(['taxonomy' => 'coverage_area', 'hide_empty' => true]);
$current_service_category = isset($_GET['service_category']) ? sanitize_text_field(wp_unslash($_GET['service_category'])) : '';
$current_care_condition   = isset($_GET['care_condition']) ? sanitize_text_field(wp_unslash($_GET['care_condition'])) : '';
$current_coverage_area   = isset($_GET['coverage_area']) ? sanitize_text_field(wp_unslash($_GET['coverage_area'])) : '';
?>

<main id="main-content">
  <header class="ccs-archive-header">
    <div class="container">
      <h1 class="ccs-archive-title">Our Services</h1>
      <p class="ccs-archive-description">Maidstone-based, Kent-wide. We don't rush or rotate staff—we take time to get to know each person.</p>
    </div>
  </header>

  <div class="container">
    <?php if (!is_wp_error($service_categories) && !is_wp_error($care_conditions) && !is_wp_error($coverage_areas) && ($service_categories || $care_conditions || $coverage_areas)) : ?>
    <div class="ccs-service-filters">
      <form method="get" action="<?php echo esc_url($services_url); ?>" class="ccs-service-filters-form" aria-label="Filter services">
        <?php if (!empty($service_categories)) : ?>
        <div class="ccs-service-filters-field">
          <label for="filter-service-category" class="ccs-service-filters-label">Service type</label>
          <select id="filter-service-category" name="service_category" class="ccs-service-filters-select">
            <option value="">All</option>
            <?php foreach ($service_categories as $term) : ?>
            <option value="<?php echo esc_attr($term->slug); ?>" <?php selected($current_service_category, $term->slug); ?>><?php echo esc_html($term->name); ?></option>
            <?php endforeach; ?>
          </select>
        </div>
        <?php endif; ?>
        <?php if (!empty($care_conditions)) : ?>
        <div class="ccs-service-filters-field">
          <label for="filter-care-condition" class="ccs-service-filters-label">Condition</label>
          <select id="filter-care-condition" name="care_condition" class="ccs-service-filters-select">
            <option value="">All</option>
            <?php foreach ($care_conditions as $term) : ?>
            <option value="<?php echo esc_attr($term->slug); ?>" <?php selected($current_care_condition, $term->slug); ?>><?php echo esc_html($term->name); ?></option>
            <?php endforeach; ?>
          </select>
        </div>
        <?php endif; ?>
        <?php if (!empty($coverage_areas)) : ?>
        <div class="ccs-service-filters-field">
          <label for="filter-coverage-area" class="ccs-service-filters-label">Area</label>
          <select id="filter-coverage-area" name="coverage_area" class="ccs-service-filters-select">
            <option value="">All</option>
            <?php foreach ($coverage_areas as $term) : ?>
            <option value="<?php echo esc_attr($term->slug); ?>" <?php selected($current_coverage_area, $term->slug); ?>><?php echo esc_html($term->name); ?></option>
            <?php endforeach; ?>
          </select>
        </div>
        <?php endif; ?>
        <div class="ccs-service-filters-actions">
          <button type="submit" class="btn btn-secondary ccs-service-filters-btn">Filter</button>
          <?php if ($current_service_category || $current_care_condition || $current_coverage_area) : ?>
          <a href="<?php echo esc_url($services_url); ?>" class="ccs-service-filters-clear">Clear filters</a>
          <?php endif; ?>
        </div>
      </form>
    </div>
    <?php endif; ?>

    <?php if (have_posts()) : ?>
      <ul class="ccs-services-grid">
        <?php
        while (have_posts()) :
            the_post();
            $link = get_permalink();
            $title = get_the_title();
            $excerpt = get_the_excerpt();
            $thumb = get_the_post_thumbnail(null, 'medium', ['loading' => 'lazy', 'alt' => get_the_title()]);
        ?>
          <li class="ccs-service-card">
            <a href="<?php echo esc_url($link); ?>" class="ccs-service-card-link">
              <?php if ($thumb) : ?>
                <div class="ccs-service-card-image"><?php echo $thumb; ?></div>
              <?php endif; ?>
              <div class="ccs-service-card-body">
                <h2 class="ccs-service-card-title"><?php echo esc_html($title); ?></h2>
                <?php if ($excerpt) : ?>
                  <p class="ccs-service-card-excerpt"><?php echo esc_html($excerpt); ?></p>
                <?php endif; ?>
                <span class="ccs-service-card-cta">Learn more</span>
              </div>
            </a>
          </li>
        <?php endwhile; ?>
      </ul>
      <?php
      the_posts_pagination([
          'mid_size'  => 2,
          'prev_text' => 'Previous',
          'next_text' => 'Next',
      ]);
      ?>
    <?php else : ?>
      <p class="ccs-no-services">No care services have been added yet. Check back soon.</p>
    <?php endif; ?>

    <?php if ($contact_page) : ?>
      <p class="ccs-archive-cta">
        <a href="<?php echo esc_url($contact_page); ?>?type=care-assessment" class="btn btn-primary">Request a care assessment</a>
      </p>
    <?php endif; ?>
  </div>
</main>

<?php get_footer(); ?>
