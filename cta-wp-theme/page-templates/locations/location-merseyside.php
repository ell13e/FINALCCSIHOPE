<?php
/**
 * Template Name: Location - Merseyside & Cheshire
 * 
 * Location page for Merseyside & Cheshire
 *
 * @package CTA_Theme
 */

get_header();

$meta_title = "Health & Social Care Training in Merseyside & Cheshire | Liverpool, Wirral CQC Courses";
$meta_description = "CQC-compliant care training across Merseyside & Cheshire. On-site delivery to Liverpool, Wirral, Chester. Emergency first aid, medication, cardiac care.";
cta_output_seo_meta_tags($meta_title, $meta_description);

$contact = cta_get_contact_info();
?>

<main id="main-content" class="site-main">
  <!-- Hero Section -->
  <section class="group-hero-section" aria-labelledby="merseyside-heading">
    <div class="container">
      <nav aria-label="Breadcrumb" class="breadcrumb breadcrumb-hero">
        <ol class="breadcrumb-list">
          <li class="breadcrumb-item"><a href="<?php echo esc_url(home_url('/')); ?>" class="breadcrumb-link">Home</a></li>
          <li class="breadcrumb-separator" aria-hidden="true">/</li>
          <li class="breadcrumb-item"><a href="<?php echo esc_url(home_url('/locations/')); ?>" class="breadcrumb-link">Locations</a></li>
          <li class="breadcrumb-separator" aria-hidden="true">/</li>
          <li class="breadcrumb-item"><span class="breadcrumb-current" aria-current="page">Merseyside & Cheshire</span></li>
        </ol>
      </nav>
      <h1 id="merseyside-heading" class="hero-title">Health & Social Care Training in Merseyside & Cheshire</h1>
      <p class="hero-subtitle">CQC-compliant courses for Liverpool, Wirral & Cheshire care providers</p>
    </div>
  </section>

  <!-- Intro Section -->
  <section class="content-section">
    <div class="container">
      <div class="section-header-center">
        <p class="section-eyebrow">Merseyside & Cheshire</p>
        <h2 class="section-title">Cardiac Care Complexity</h2>
        <p class="section-description">Liverpool's hospitals are managing <a href="https://lowdownnhs.info/hospitals/patients-unable-to-leave-hospital-cost-the-nhs-2bn-a-year/" target="_blank" rel="noopener noreferrer" style="color: inherit; text-decoration: underline; text-decoration-color: rgba(155, 133, 96, 0.4);">sustained discharge pressure</a>. Liverpool Heart & Chest creates cardiac care complexity your team needs to manage post-discharge. Aintree, Royal Liverpool, Arrowe Park—all pushing patients home who need skilled community care.</p>
        <p class="section-description">Your team's managing that complexity. They need training that reflects it.</p>
      </div>
    </div>
  </section>

  <!-- Popular Courses Section -->
  <section class="why-us-blended">
    <div class="container">
      <div class="section-header-center">
        <p class="section-eyebrow">Most Booked</p>
        <h2 class="section-title">What Merseyside & Cheshire Providers Are Booking</h2>
      </div>
      
      <div class="why-us-blended-grid">
        <div class="why-us-blended-card">
          <div class="why-us-blended-card-header">
            <div class="why-us-blended-icon-wrapper why-us-blended-icon-1">
              <i class="fas fa-first-aid" aria-hidden="true"></i>
            </div>
          </div>
          <h3 class="why-us-blended-title">Emergency First Aid at Work</h3>
          <p class="why-us-blended-description">With multiple trusts managing discharge pressure, your team needs current emergency skills.</p>
        </div>

        <div class="why-us-blended-card">
          <div class="why-us-blended-card-header">
            <div class="why-us-blended-icon-wrapper why-us-blended-icon-2">
              <i class="fas fa-pills" aria-hidden="true"></i>
            </div>
          </div>
          <h3 class="why-us-blended-title">Medication Competency & Management</h3>
          <p class="why-us-blended-description">Complex cardiac medications, polypharmacy, high-risk regimes. <a href="https://www.cqc.org.uk/about-us/fundamental-standards" target="_blank" rel="noopener noreferrer" style="color: inherit; text-decoration: underline; text-decoration-color: rgba(155, 133, 96, 0.4);">CQC wants competency</a>.</p>
        </div>

        <div class="why-us-blended-card">
          <div class="why-us-blended-card-header">
            <div class="why-us-blended-icon-wrapper why-us-blended-icon-3">
              <i class="fas fa-hands" aria-hidden="true"></i>
            </div>
          </div>
          <h3 class="why-us-blended-title">Moving & Handling</h3>
          <p class="why-us-blended-description">Bariatric care, specialist equipment, complex positioning.</p>
        </div>

        <div class="why-us-blended-card">
          <div class="why-us-blended-card-header">
            <div class="why-us-blended-icon-wrapper why-us-blended-icon-1">
              <i class="fas fa-shield-alt" aria-hidden="true"></i>
            </div>
          </div>
          <h3 class="why-us-blended-title">Safeguarding Adults</h3>
          <p class="why-us-blended-description">Integrated care partnerships tightening protocols across the region.</p>
        </div>

        <div class="why-us-blended-card">
          <div class="why-us-blended-card-header">
            <div class="why-us-blended-icon-wrapper why-us-blended-icon-2">
              <i class="fas fa-brain" aria-hidden="true"></i>
            </div>
          </div>
          <h3 class="why-us-blended-title">Dementia Care</h3>
          <p class="why-us-blended-description">Merseyside's aging population requires practical strategies.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Benefits Section -->
  <section class="group-benefits-section">
    <div class="container">
      <div class="section-header-center">
        <p class="section-eyebrow">Why Choose Us</p>
        <h2 class="section-title">Training That Works for Merseyside Providers</h2>
      </div>

      <div class="group-benefits-grid">
        <div class="group-benefit-card">
          <div class="group-benefit-icon">
            <i class="fas fa-map-marker-alt" aria-hidden="true"></i>
          </div>
          <h3 class="group-benefit-title">We Come to You</h3>
          <p class="group-benefit-description">On-site delivery across Liverpool, Wirral, St Helens, Warrington, Chester, Ellesmere Port, Runcorn, Widnes. Most Merseyside providers book on-site.</p>
        </div>

        <div class="group-benefit-card">
          <div class="group-benefit-icon">
            <i class="fas fa-user-check" aria-hidden="true"></i>
          </div>
          <h3 class="group-benefit-title">Experienced Trainers</h3>
          <p class="group-benefit-description">Working care professionals. DBS-checked, clinically current. They understand the specific pressures of Merseyside care provision.</p>
        </div>

        <div class="group-benefit-card">
          <div class="group-benefit-icon">
            <i class="fas fa-certificate" aria-hidden="true"></i>
          </div>
          <h3 class="group-benefit-title">Instant Certificates</h3>
          <p class="group-benefit-description">Certificates hit inboxes immediately. Digital copies for compliance, physical copies posted. Automatic renewal reminders.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Context Section -->
  <section class="content-section bg-light-cream">
    <div class="container">
      <div class="section-header-center">
        <h2 class="section-title">Merseyside & Cheshire's Care Reality in 2026</h2>
        <p class="section-description">Liverpool Heart & Chest Hospital creates unique post-discharge complexity. Patients going home with cardiac devices, complex medication regimes, monitoring requirements. Your team needs to understand cardiac care at a practical level.</p>
        <p class="section-description"><a href="https://lowdownnhs.info/hospitals/patients-unable-to-leave-hospital-cost-the-nhs-2bn-a-year/" target="_blank" rel="noopener noreferrer" style="color: inherit; text-decoration: underline; text-decoration-color: rgba(155, 133, 96, 0.4);">Hospital discharge</a> from Aintree, Royal Liverpool, and Wirral trusts is pushing sicker patients home faster. Workforce retention is challenging—competition for staff is high. The <a href="https://carecubed.org/2025-care-worker-500-million-fair-pay-announcement/" target="_blank" rel="noopener noreferrer" style="color: inherit; text-decoration: underline; text-decoration-color: rgba(155, 133, 96, 0.4);">Fair Pay Agreement's coming</a>—but training that makes staff feel competent keeps them.</p>
      </div>
    </div>
  </section>

  <!-- CTA Section -->
  <section class="about-cta-new">
    <div class="container">
      <div class="about-cta-content-new">
        <h2>Book Training for Your Merseyside Care Team</h2>
        <p>Serving Liverpool, Wirral, St Helens, Warrington, Chester, and care providers across Merseyside & Cheshire.</p>
        <div class="about-cta-buttons-new">
          <a href="<?php echo esc_url(home_url('/contact')); ?>" class="btn btn-primary">Get in Touch</a>
          <a href="tel:<?php echo esc_attr($contact['phone_link']); ?>" class="btn btn-secondary">Call <?php echo esc_html($contact['phone']); ?></a>
        </div>
      </div>
    </div>
  </section>
</main>

<?php
// Schema.org JSON-LD
$schema = [
    '@context' => 'https://schema.org',
    '@graph' => [
        [
            '@type' => 'EducationalOrganization',
            '@id' => home_url('/#organization'),
            'name' => 'Continuity Training Academy',
            'url' => home_url('/'),
            'logo' => [
                '@type' => 'ImageObject',
                'url' => get_template_directory_uri() . '/assets/img/logo/long_logo-400w.webp',
                'width' => 400,
                'height' => 100
            ],
            'description' => 'Professional care sector training across the UK. CQC-compliant, CPD-accredited courses since 2020.',
            'address' => [
                '@type' => 'PostalAddress',
                'streetAddress' => 'The Maidstone Studios, New Cut Road',
                'addressLocality' => 'Maidstone',
                'addressRegion' => 'Kent',
                'postalCode' => 'ME14 5NZ',
                'addressCountry' => 'GB'
            ],
            'geo' => [
                '@type' => 'GeoCoordinates',
                'latitude' => '51.264494',
                'longitude' => '0.545844'
            ],
            'telephone' => '+441622587343',
            'email' => 'enquiries@continuitytrainingacademy.co.uk',
            'priceRange' => '££',
            'sameAs' => [
                'https://www.trustpilot.com/review/continuitytrainingacademy.co.uk',
                'https://www.facebook.com/continuitytraining',
                'https://www.linkedin.com/company/continuity-training-academy-cta',
                'https://www.instagram.com/continuitytrainingacademy'
            ],
            'aggregateRating' => [
                '@type' => 'AggregateRating',
                'ratingValue' => '4.6',
                'reviewCount' => '20',
                'bestRating' => '5',
                'worstRating' => '5'
            ],
            'areaServed' => [
                [
                    '@type' => 'City',
                    'name' => 'Liverpool',
                    'containedInPlace' => [
                        '@type' => 'AdministrativeArea',
                        'name' => 'Merseyside'
                    ]
                ],
                [
                    '@type' => 'City',
                    'name' => 'Wirral'
                ],
                [
                    '@type' => 'City',
                    'name' => 'Chester'
                ],
                [
                    '@type' => 'City',
                    'name' => 'Warrington'
                ],
                [
                    '@type' => 'City',
                    'name' => 'St Helens'
                ]
            ]
        ],
        [
            '@type' => 'Service',
            '@id' => home_url('/locations/merseyside/#service'),
            'serviceType' => 'Health and Social Care Training',
            'name' => 'CQC-Compliant Care Training for Merseyside & Cheshire',
            'description' => 'Professional health and social care training for care providers across Merseyside and Cheshire. On-site delivery. Emergency first aid, medication management, moving & handling, safeguarding, and dementia care courses.',
            'provider' => [
                '@id' => home_url('/#organization')
            ],
            'areaServed' => [
                [
                    '@type' => 'City',
                    'name' => 'Liverpool'
                ],
                [
                    '@type' => 'City',
                    'name' => 'Wirral'
                ],
                [
                    '@type' => 'City',
                    'name' => 'Chester'
                ],
                [
                    '@type' => 'City',
                    'name' => 'Warrington'
                ],
                [
                    '@type' => 'City',
                    'name' => 'St Helens'
                ]
            ],
            'audience' => [
                '@type' => 'Audience',
                'audienceType' => 'Care Providers, Healthcare Workers, Domiciliary Care Staff'
            ],
            'hasOfferCatalog' => [
                '@type' => 'OfferCatalog',
                'name' => 'Care Training Courses for Merseyside & Cheshire',
                'itemListElement' => [
                    [
                        '@type' => 'Offer',
                        'itemOffered' => [
                            '@type' => 'Course',
                            'name' => 'Emergency First Aid at Work',
                            'provider' => [
                                '@id' => home_url('/#organization')
                            ]
                        ]
                    ],
                    [
                        '@type' => 'Offer',
                        'itemOffered' => [
                            '@type' => 'Course',
                            'name' => 'Medication Competency & Management',
                            'provider' => [
                                '@id' => home_url('/#organization')
                            ]
                        ]
                    ],
                    [
                        '@type' => 'Offer',
                        'itemOffered' => [
                            '@type' => 'Course',
                            'name' => 'Moving & Handling',
                            'provider' => [
                                '@id' => home_url('/#organization')
                            ]
                        ]
                    ],
                    [
                        '@type' => 'Offer',
                        'itemOffered' => [
                            '@type' => 'Course',
                            'name' => 'Safeguarding Adults',
                            'provider' => [
                                '@id' => home_url('/#organization')
                            ]
                        ]
                    ],
                    [
                        '@type' => 'Offer',
                        'itemOffered' => [
                            '@type' => 'Course',
                            'name' => 'Dementia Care',
                            'provider' => [
                                '@id' => home_url('/#organization')
                            ]
                        ]
                    ]
                ]
            ]
        ],
        [
            '@type' => 'BreadcrumbList',
            '@id' => home_url('/locations/merseyside/#breadcrumb'),
            'itemListElement' => [
                [
                    '@type' => 'ListItem',
                    'position' => 1,
                    'name' => 'Home',
                    'item' => home_url('/')
                ],
                [
                    '@type' => 'ListItem',
                    'position' => 2,
                    'name' => 'Locations',
                    'item' => home_url('/locations/')
                ],
                [
                    '@type' => 'ListItem',
                    'position' => 3,
                    'name' => 'Merseyside & Cheshire Training',
                    'item' => home_url('/locations/merseyside/')
                ]
            ]
        ],
        [
            '@type' => 'WebPage',
            '@id' => home_url('/locations/merseyside/#webpage'),
            'url' => home_url('/locations/merseyside/'),
            'name' => 'Health & Social Care Training in Merseyside & Cheshire | Liverpool, Wirral CQC Courses',
            'description' => 'CQC-compliant care training across Merseyside & Cheshire. On-site delivery to Liverpool, Wirral, Chester. Emergency first aid, medication, cardiac care.',
            'isPartOf' => [
                '@id' => home_url('/#website')
            ],
            'about' => [
                '@id' => home_url('/#organization')
            ],
            'breadcrumb' => [
                '@id' => home_url('/locations/merseyside/#breadcrumb')
            ]
        ]
    ]
];

echo '<script type="application/ld+json">' . wp_json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) . '</script>';
?>

<?php get_footer(); ?>
