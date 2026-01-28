<?php
/**
 * Template Name: Tonbridge Training
 * 
 * Location page for Tonbridge - auto-populates with Tonbridge data
 *
 * @package CTA_Theme
 */

get_header();

$contact = cta_get_contact_info();

// Auto-load Tonbridge location data
$location_data = [
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
];

$hero_title = 'Care Training Courses in Tonbridge, Kent';
$hero_subtitle = 'Professional care training in Tonbridge, Kent. Face-to-face and on-site training options available.';

// Generate schema
$location_schema = [
    '@context' => 'https://schema.org',
    '@type' => 'LocalBusiness',
    'name' => 'Continuity Training Academy - Tonbridge',
    'description' => $location_data['description'],
    'address' => [
        '@type' => 'PostalAddress',
        'addressLocality' => 'Tonbridge',
        'addressRegion' => 'Kent',
        'addressCountry' => 'GB',
    ],
    'geo' => [
        '@type' => 'GeoCoordinates',
        'latitude' => $location_data['coordinates']['lat'],
        'longitude' => $location_data['coordinates']['lng'],
    ],
    'telephone' => $contact['phone'],
    'email' => $contact['email'],
    'areaServed' => [
        '@type' => 'City',
        'name' => 'Tonbridge',
    ],
    'url' => get_permalink(),
];
?>

<!-- Schema.org Structured Data -->
<script type="application/ld+json">
<?php echo json_encode($location_schema, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT); ?>
</script>

<main id="main-content" class="site-main">
  <section class="group-hero-section" aria-labelledby="location-heading">
    <div class="container">
      <nav aria-label="Breadcrumb" class="breadcrumb breadcrumb-hero">
        <ol class="breadcrumb-list">
          <li class="breadcrumb-item"><a href="<?php echo esc_url(home_url('/')); ?>" class="breadcrumb-link">Home</a></li>
          <li class="breadcrumb-separator" aria-hidden="true">/</li>
          <li class="breadcrumb-item"><span class="breadcrumb-current" aria-current="page">Tonbridge</span></li>
        </ol>
      </nav>
      <h1 id="location-heading" class="hero-title"><?php echo esc_html($hero_title); ?></h1>
      <p class="hero-subtitle"><?php echo esc_html($hero_subtitle); ?></p>
      <div class="group-hero-cta">
        <a href="<?php echo esc_url(get_post_type_archive_link('course')); ?>" class="btn btn-primary group-hero-btn-primary">View All Courses</a>
        <a href="<?php echo esc_url(get_permalink(get_page_by_path('contact'))); ?>" class="btn btn-secondary group-hero-btn-secondary">Contact Us</a>
      </div>
    </div>
  </section>

  <section class="group-how-it-works-section" aria-labelledby="location-intro-heading">
    <div class="container">
      <div class="group-how-it-works-header">
        <h2 id="location-intro-heading" class="section-title">Professional Care Training in Tonbridge</h2>
        <p class="section-subtitle">CQC-compliant, CPD-accredited training courses delivered on-site at your Tonbridge care facility or at our Maidstone training centre.</p>
      </div>
      
      <div class="content-section">
        <h3>Training Options in Tonbridge</h3>
        <p>We provide comprehensive care training for providers in Tonbridge and the surrounding areas. Choose from:</p>
        <ul>
          <li><strong>On-Site Delivery:</strong> Training delivered at your care facility in Tonbridge</li>
          <li><strong>Maidstone Training Centre:</strong> Attend courses at our nearby Maidstone Studios (20 minutes from Tonbridge)</li>
          <li><strong>Flexible Scheduling:</strong> Course dates and times to suit your team's availability</li>
          <li><strong>Customized Content:</strong> Training tailored to your service's policies and procedures</li>
          <li><strong>Group Rates:</strong> Cost-effective training for teams of 5 or more</li>
          <li><strong>CPD-Accredited:</strong> Recognised qualifications accepted by CQC</li>
        </ul>
      </div>

      <div class="content-section" style="margin-top: 48px;">
        <h3>Serving Tonbridge Care Providers</h3>
        <p>We work with care homes, domiciliary care providers, supported living services, and healthcare facilities across Tonbridge, Tunbridge Wells, and West Kent.</p>
        <p><strong>Contact us:</strong> <a href="tel:<?php echo esc_attr(preg_replace('/[^0-9]/', '', $contact['phone'])); ?>"><?php echo esc_html($contact['phone']); ?></a> | <a href="mailto:<?php echo esc_attr($contact['email']); ?>"><?php echo esc_html($contact['email']); ?></a></p>
      </div>
    </div>
  </section>

  <section class="content-section" style="background: var(--cream-bg); padding: 64px 0;">
    <div class="container">
      <h2 class="section-title">Training Courses Available in Tonbridge</h2>
      <p class="section-subtitle">All our CQC-compliant training courses are available for on-site delivery in Tonbridge or at our Maidstone centre</p>
      
      <div class="cta-center" style="margin-top: 48px;">
        <a href="<?php echo esc_url(get_post_type_archive_link('course')); ?>" class="btn btn-primary">View All Courses</a>
        <a href="<?php echo esc_url(get_permalink(get_page_by_path('group-training'))); ?>" class="btn btn-secondary">Group Training Options</a>
      </div>
    </div>
  </section>

  <section class="content-section" style="padding: 64px 0;">
    <div class="container">
      <div class="group-cta-card">
        <h2>Ready to Book Training in Tonbridge?</h2>
        <p>Contact us today to discuss training options for your Tonbridge care team.</p>
        <div class="group-cta-buttons">
          <a href="<?php echo esc_url(add_query_arg('type', 'training-consultation', get_permalink(get_page_by_path('contact')))); ?>" class="btn btn-primary">Book Free Consultation</a>
          <a href="<?php echo esc_url(get_permalink(get_page_by_path('contact'))); ?>" class="btn btn-secondary">Contact Us</a>
        </div>
      </div>
    </div>
  </section>
</main>

<?php
get_footer();
