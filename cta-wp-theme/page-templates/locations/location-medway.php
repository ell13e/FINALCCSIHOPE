<?php
/**
 * Template Name: Location - Medway
 * Template Post Type: page
 * 
 * Location page for Medway - auto-populates with Medway data
 *
 * @package CTA_Theme
 */

get_header();

// SEO Meta Tags
$meta_title = 'Care Training Medway, Chatham & Gillingham | CQC Compliant Courses';
$meta_description = 'Professional care training for Medway providers. Delivered in Maidstone, 20 mins from Chatham. First aid, safeguarding, dementia care & more.';
?>
<meta name="description" content="<?php echo esc_attr($meta_description); ?>">
<meta property="og:title" content="<?php echo esc_attr($meta_title); ?>">
<meta property="og:description" content="<?php echo esc_attr($meta_description); ?>">
<meta property="og:type" content="website">
<meta property="og:url" content="<?php echo esc_url(get_permalink()); ?>">
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="<?php echo esc_attr($meta_title); ?>">
<meta name="twitter:description" content="<?php echo esc_attr($meta_description); ?>">
<?php

$contact = cta_get_contact_info();

// Auto-load Medway location data
$location_data = [
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
];

$hero_title = 'Health & Social Care Training in Medway, Kent';
$hero_subtitle = 'CQC-compliant courses for Medway Towns care providers';

// Generate comprehensive schema
$site_url = home_url();
$page_url = get_permalink();

$schema_graph = [
    '@context' => 'https://schema.org',
    '@graph' => [
        [
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
                'streetAddress' => $contact['address'],
                'addressLocality' => 'Maidstone',
                'addressRegion' => 'Kent',
                'postalCode' => $contact['postcode'],
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
            'sameAs' => [
                'https://www.trustpilot.com/review/continuitytrainingacademy.co.uk',
                'https://www.facebook.com/continuitytraining',
                'https://www.linkedin.com/company/continuity-training-academy-cta',
                'https://www.instagram.com/continuitytrainingacademy',
            ],
            'aggregateRating' => [
                '@type' => 'AggregateRating',
                'ratingValue' => '4.6',
                'reviewCount' => '20',
                'bestRating' => '5',
                'worstRating' => '5',
            ],
            'areaServed' => [
                ['@type' => 'City', 'name' => 'Chatham', 'containedInPlace' => ['@type' => 'AdministrativeArea', 'name' => 'Kent']],
                ['@type' => 'City', 'name' => 'Gillingham'],
                ['@type' => 'City', 'name' => 'Rochester'],
                ['@type' => 'City', 'name' => 'Strood'],
                ['@type' => 'City', 'name' => 'Rainham'],
                ['@type' => 'City', 'name' => 'Walderslade'],
            ],
        ],
        [
            '@type' => 'Service',
            '@id' => $page_url . '#service',
            'serviceType' => 'Health and Social Care Training',
            'name' => 'CQC-Compliant Care Training for Medway Towns',
            'description' => 'Professional health and social care training for care providers across Chatham, Gillingham, Rochester and Strood. Moving & handling, medication management, safeguarding, and dementia care courses.',
            'provider' => ['@id' => $site_url . '/#organization'],
            'areaServed' => [
                ['@type' => 'City', 'name' => 'Chatham'],
                ['@type' => 'City', 'name' => 'Gillingham'],
                ['@type' => 'City', 'name' => 'Rochester'],
                ['@type' => 'City', 'name' => 'Strood'],
            ],
            'audience' => [
                '@type' => 'Audience',
                'audienceType' => 'Care Providers, Healthcare Workers, Domiciliary Care Staff',
            ],
            'hasOfferCatalog' => [
                '@type' => 'OfferCatalog',
                'name' => 'Care Training Courses for Medway',
                'itemListElement' => [
                    [
                        '@type' => 'Offer',
                        'itemOffered' => [
                            '@type' => 'Course',
                            'name' => 'Moving & Handling',
                            'provider' => ['@id' => $site_url . '/#organization'],
                        ],
                    ],
                    [
                        '@type' => 'Offer',
                        'itemOffered' => [
                            '@type' => 'Course',
                            'name' => 'Medication Competency & Management',
                            'provider' => ['@id' => $site_url . '/#organization'],
                        ],
                    ],
                    [
                        '@type' => 'Offer',
                        'itemOffered' => [
                            '@type' => 'Course',
                            'name' => 'Safeguarding Adults',
                            'provider' => ['@id' => $site_url . '/#organization'],
                        ],
                    ],
                    [
                        '@type' => 'Offer',
                        'itemOffered' => [
                            '@type' => 'Course',
                            'name' => 'Dementia Care',
                            'provider' => ['@id' => $site_url . '/#organization'],
                        ],
                    ],
                ],
            ],
        ],
        [
            '@type' => 'BreadcrumbList',
            '@id' => $page_url . '#breadcrumb',
            'itemListElement' => [
                ['@type' => 'ListItem', 'position' => 1, 'name' => 'Home', 'item' => $site_url . '/'],
                ['@type' => 'ListItem', 'position' => 2, 'name' => 'Medway Training', 'item' => $page_url],
            ],
        ],
        [
            '@type' => 'FAQPage',
            '@id' => $page_url . '#faq',
            'mainEntity' => [
                [
                    '@type' => 'Question',
                    'name' => 'Where is training delivered for Medway care providers?',
                    'acceptedAnswer' => [
                        '@type' => 'Answer',
                        'text' => 'We deliver training at The Maidstone Studios in Maidstone, 20 minutes from Medway via the Medway Valley Line from Strood. We also offer on-site training at your premises across Chatham, Gillingham, Rochester, and surrounding Medway areas.',
                    ],
                ],
                [
                    '@type' => 'Question',
                    'name' => 'How long does it take to get to training from Medway?',
                    'acceptedAnswer' => [
                        '@type' => 'Answer',
                        'text' => 'Regular trains from Strood to Maidstone West take 20 minutes. Arriva bus services connect Chatham, Gillingham, and Rochester to Maidstone. By car it\'s a straight run via the A229 from Rochester or Chatham.',
                    ],
                ],
                [
                    '@type' => 'Question',
                    'name' => 'What courses do Medway care providers typically need?',
                    'acceptedAnswer' => [
                        '@type' => 'Answer',
                        'text' => 'Medway care teams commonly book Moving & Handling for bariatric and complex positioning, Medication Competency for poly-pharmacy cases, Safeguarding Adults due to integrated care system requirements, and Dementia Care for Medway\'s aging population.',
                    ],
                ],
                [
                    '@type' => 'Question',
                    'name' => 'Can you deliver training at our care premises in Medway?',
                    'acceptedAnswer' => [
                        '@type' => 'Answer',
                        'text' => 'Yes, we deliver on-site training across all Medway Towns including Chatham, Gillingham, Rochester, and Strood. This works well for full team inductions when you can\'t spare staff off the rota.',
                    ],
                ],
                [
                    '@type' => 'Question',
                    'name' => 'Do Medway Maritime Hospital staff use your training?',
                    'acceptedAnswer' => [
                        '@type' => 'Answer',
                        'text' => 'We primarily train domiciliary and residential care staff, but our trainers have clinical experience in acute and community settings. We understand the discharge pressures Medway care providers face from Medway Maritime Hospital.',
                    ],
                ],
            ],
        ],
        [
            '@type' => 'WebPage',
            '@id' => $page_url . '#webpage',
            'url' => $page_url,
            'name' => 'Care Training Medway, Chatham & Gillingham | CQC Compliant Courses',
            'description' => 'Professional care training for Medway providers. Delivered in Maidstone, 20 mins from Chatham. First aid, safeguarding, dementia care & more.',
            'isPartOf' => ['@id' => $site_url . '/#website'],
            'about' => ['@id' => $site_url . '/#organization'],
            'breadcrumb' => ['@id' => $page_url . '#breadcrumb'],
        ],
    ],
];
?>

<!-- Schema.org Structured Data -->
<script type="application/ld+json">
<?php echo json_encode($schema_graph, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT); ?>
</script>

<main id="main-content" class="site-main">
  <section class="group-hero-section" aria-labelledby="location-heading">
    <div class="container">
      <nav aria-label="Breadcrumb" class="breadcrumb breadcrumb-hero">
        <ol class="breadcrumb-list">
          <li class="breadcrumb-item"><a href="<?php echo esc_url(home_url('/')); ?>" class="breadcrumb-link">Home</a></li>
          <li class="breadcrumb-separator" aria-hidden="true">/</li>
          <li class="breadcrumb-item"><span class="breadcrumb-current" aria-current="page">Medway</span></li>
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

  <section class="content-section" aria-labelledby="location-intro-heading">
    <div class="container">
      <p class="section-subtitle" style="max-width: 800px; margin: 0 auto 48px; text-align: center;">Medway Maritime Hospital's had its critical incident stood down, but they're still under "considerable pressure":you've seen it. <a href="https://lowdownnhs.info/social-care/delayed-discharge-explainer-health-and-care-pressure/" target="_blank" rel="noopener noreferrer" style="color: inherit; text-decoration: underline; text-decoration-color: rgba(155, 133, 96, 0.4);">Delayed discharges</a> mean more people needing complex domiciliary care across Chatham, Gillingham, Rochester, and Strood. Your team's picking up the work the hospitals can't handle.</p>

      <div class="section-header-center">
        <h2 id="location-intro-heading" class="section-title">We're 20 minutes from you</h2>
      </div>
      <p>Training at The Maidstone Studios in Maidstone, directly accessible from Medway via:</p>
      <ul>
        <li><strong>Medway Valley Line:</strong> Regular trains from Strood to Maidstone West (20 mins)</li>
        <li><strong>Bus routes:</strong> Arriva services connecting Chatham, Gillingham, and Rochester to Maidstone</li>
        <li><strong>A229:</strong> Straight run if you're driving from Rochester or Chatham</li>
      </ul>

      <h3 style="margin-top: 64px;">Training times that work around care:</h3>
      <div style="margin-top: 24px;">
        <p><strong>Morning sessions:</strong> 09:30-14:00 | <strong>Full days:</strong> 09:30-16:00</p>
        <p>Got someone finishing a sleep-in? Morning sessions get them trained and home by lunchtime. Need weekend cover? We run Saturday courses too.</p>
      </div>

      <h3 style="margin-top: 64px;">What Medway care teams are booking:</h3>
      <div style="margin-top: 24px;">
        <ul>
          <li><strong>Moving & Handling</strong> - Bariatric care, ceiling track hoists, complex positioning:actual skills for actual situations</li>
          <li><strong>Medication Competency & Management</strong> - With poly-pharmacy cases increasing, CQC wants to see proper competency frameworks. We help you build them.</li>
          <li><strong>Safeguarding Adults</strong> - Medway's integrated care system is tightening safeguarding protocols. Keep your team current.</li>
          <li><strong>Dementia Care</strong> - Over 3,000 people living with dementia across Medway. <a href="https://www.cqc.org.uk/about-us/fundamental-standards" target="_blank" rel="noopener noreferrer" style="color: inherit; text-decoration: underline; text-decoration-color: rgba(155, 133, 96, 0.4);">CQC compliance requirements</a> for dementia training mean your staff need more than awareness:they need practical strategies.</li>
        </ul>
      </div>

      <h3 style="margin-top: 64px;">Medway's care landscape in 2026</h3>
      <div style="margin-top: 24px;">
        <p>The integrated care partnership between Medway Council and the NHS is putting pressure on providers to demonstrate quality. With <a href="https://www.skillsforcare.org.uk/Adult-Social-Care-Workforce-Data/workforceintelligence/resources/Reports/National/The-state-of-the-adult-social-care-sector-and-workforce-in-England.html" target="_blank" rel="noopener noreferrer" style="color: inherit; text-decoration: underline; text-decoration-color: rgba(155, 133, 96, 0.4);">workforce vacancy rates at 8.3% across the sector</a> and Medway's aging population growing faster than the national average, there's plenty of work:but only for providers who can prove their teams are properly trained.</p>
        <p>The Fair Pay Agreement that's coming should improve retention. Until then? Training that makes your staff feel competent and confident is what keeps them with you.</p>
      </div>

      <h3 style="margin-top: 64px;">Trainers who know Medway care</h3>
      <div style="margin-top: 24px;">
        <p>Our trainers aren't academics:they're working care professionals. DBS-checked, clinically current, and experienced in domiciliary and complex care. They know what a package of care in Gillingham actually looks like at 6am on a Monday.</p>
      </div>

      <h3 style="margin-top: 64px;">CQC audit tomorrow? No problem</h3>
      <div style="margin-top: 24px;">
        <p>Certificates are instant:emailed before your team leaves the training room. Digital copies for immediate compliance, posted certificates for your files. We send automatic renewal reminders so you're never caught short when CQC calls.</p>
      </div>

      <h3 style="margin-top: 64px;">Flexible delivery options:</h3>
      <div style="margin-top: 24px;">
        <ul>
          <li><strong>Your premises:</strong> We deliver on-site training across Medway:works for full team inductions when you can't spare people off the rota</li>
          <li><strong>Our training venue:</strong> Purpose-built space in Maidstone with free parking, modern facilities, and no interruptions</li>
        </ul>
      </div>

      <h3 style="margin-top: 64px;">Serving Medway Towns care providers:</h3>
      <div style="margin-top: 24px;">
        <p>Chatham | Gillingham | Rochester | Strood | Rainham | Hempstead | Wigmore | Walderslade | Lordswood | Princes Park | Luton | Capstone</p>
      </div>
    </div>
  </section>

  <section class="content-section" style="background: var(--cream-bg); padding: 64px 0;">
    <div class="container">
      <div class="section-header-center">
        <h2 class="section-title">Training Courses Available in Medway</h2>
        <p class="section-subtitle">All our CQC-compliant training courses are available for on-site delivery in Medway or at our Maidstone training centre</p>
      </div>
      
      <div class="cta-center" style="margin-top: 64px;">
        <a href="<?php echo esc_url(get_post_type_archive_link('course')); ?>" class="btn btn-primary">View All Courses</a>
        <a href="<?php echo esc_url(get_permalink(get_page_by_path('group-training'))); ?>" class="btn btn-secondary">Group Training Options</a>
      </div>
    </div>
  </section>

  <section class="content-section" style="padding: 64px 0;">
    <div class="container">
      <div class="group-cta-card">
        <h2>Book your team in:</h2>
        <p><strong>Phone:</strong> <a href="tel:<?php echo esc_attr(preg_replace('/[^0-9]/', '', $contact['phone'])); ?>" style="color: inherit; text-decoration: underline;"><?php echo esc_html($contact['phone']); ?></a></p>
        <div class="group-cta-buttons" style="margin-top: 24px;">
          <a href="<?php echo esc_url(get_post_type_archive_link('course_event')); ?>" class="btn btn-primary">View Course Dates</a>
          <a href="<?php echo esc_url(get_permalink(get_page_by_path('contact'))); ?>" class="btn btn-secondary">Contact Us</a>
        </div>
      </div>
    </div>
  </section>
</main>

<?php
get_footer();
