<?php
/**
 * Template Name: Location - Wales
 * 
 * Location page for Wales
 *
 * @package CTA_Theme
 */

get_header();

$meta_title = "Health & Social Care Training in Wales | Professional Training for Welsh Providers";
$meta_description = "Professional care training across Wales. On-site delivery to Cardiff, Swansea, Newport, Wrexham. Emergency first aid, medication, dementia, safeguarding.";
cta_output_seo_meta_tags($meta_title, $meta_description);

$contact = cta_get_contact_info();
?>

<main id="main-content" class="site-main">
  <!-- Hero Section -->
  <section class="group-hero-section" aria-labelledby="wales-heading">
    <div class="container">
      <nav aria-label="Breadcrumb" class="breadcrumb breadcrumb-hero">
        <ol class="breadcrumb-list">
          <li class="breadcrumb-item"><a href="<?php echo esc_url(home_url('/')); ?>" class="breadcrumb-link">Home</a></li>
          <li class="breadcrumb-separator" aria-hidden="true">/</li>
          <li class="breadcrumb-item"><a href="<?php echo esc_url(home_url('/locations/')); ?>" class="breadcrumb-link">Locations</a></li>
          <li class="breadcrumb-separator" aria-hidden="true">/</li>
          <li class="breadcrumb-item"><span class="breadcrumb-current" aria-current="page">Wales</span></li>
        </ol>
      </nav>
      <h1 id="wales-heading" class="hero-title">Health & Social Care Training in Wales</h1>
      <p class="hero-subtitle">Professional training for Welsh care providers</p>
    </div>
  </section>

  <!-- Intro Section -->
  <section class="content-section">
    <div class="container">
      <div class="section-header-center">
        <p class="section-eyebrow">Wales</p>
        <h2 class="section-title">Different Regulator. Different Funding. Same Crisis.</h2>
        <p class="section-description">Welsh care providers face identical pressures to England: workforce shortages, hospital discharge complexity, retention challenges. <a href="https://www.homecare.co.uk/advice/domiciliary-care-standards-and-quality-assurance" target="_blank" rel="noopener noreferrer" style="color: inherit; text-decoration: underline; text-decoration-color: rgba(155, 133, 96, 0.4);">Care Inspectorate Wales expects quality</a>—and your training records prove it.</p>
        <p class="section-description">Training is how you meet Welsh standards. Training is how you keep your team.</p>
      </div>
    </div>
  </section>

  <!-- Popular Courses Section -->
  <section class="why-us-blended">
    <div class="container">
      <div class="section-header-center">
        <p class="section-eyebrow">Most Booked</p>
        <h2 class="section-title">What Welsh Care Providers Are Booking</h2>
      </div>
      
      <div class="why-us-blended-grid">
        <div class="why-us-blended-card">
          <div class="why-us-blended-card-header">
            <div class="why-us-blended-icon-wrapper why-us-blended-icon-1">
              <i class="fas fa-certificate" aria-hidden="true"></i>
            </div>
          </div>
          <h3 class="why-us-blended-title">All Wales Induction Framework</h3>
          <p class="why-us-blended-description">New starters need proper induction. We deliver training that meets Welsh requirements.</p>
        </div>

        <div class="why-us-blended-card">
          <div class="why-us-blended-card-header">
            <div class="why-us-blended-icon-wrapper why-us-blended-icon-2">
              <i class="fas fa-first-aid" aria-hidden="true"></i>
            </div>
          </div>
          <h3 class="why-us-blended-title">Emergency First Aid at Work</h3>
          <p class="why-us-blended-description">Your team needs current emergency skills.</p>
        </div>

        <div class="why-us-blended-card">
          <div class="why-us-blended-card-header">
            <div class="why-us-blended-icon-wrapper why-us-blended-icon-3">
              <i class="fas fa-pills" aria-hidden="true"></i>
            </div>
          </div>
          <h3 class="why-us-blended-title">Medication Competency & Management</h3>
          <p class="why-us-blended-description">Complex medication regimes. Competency frameworks required.</p>
        </div>

        <div class="why-us-blended-card">
          <div class="why-us-blended-card-header">
            <div class="why-us-blended-icon-wrapper why-us-blended-icon-1">
              <i class="fas fa-hands" aria-hidden="true"></i>
            </div>
          </div>
          <h3 class="why-us-blended-title">Moving & Handling</h3>
          <p class="why-us-blended-description">Bariatric care, specialist equipment, complex positioning.</p>
        </div>

        <div class="why-us-blended-card">
          <div class="why-us-blended-card-header">
            <div class="why-us-blended-icon-wrapper why-us-blended-icon-2">
              <i class="fas fa-brain" aria-hidden="true"></i>
            </div>
          </div>
          <h3 class="why-us-blended-title">Dementia Care</h3>
          <p class="why-us-blended-description">Wales' aging population requires practical strategies.</p>
        </div>

        <div class="why-us-blended-card">
          <div class="why-us-blended-card-header">
            <div class="why-us-blended-icon-wrapper why-us-blended-icon-3">
              <i class="fas fa-shield-alt" aria-hidden="true"></i>
            </div>
          </div>
          <h3 class="why-us-blended-title">Safeguarding</h3>
          <p class="why-us-blended-description">Welsh safeguarding framework compliance.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Benefits Section -->
  <section class="group-benefits-section">
    <div class="container">
      <div class="section-header-center">
        <p class="section-eyebrow">Why Choose Us</p>
        <h2 class="section-title">Training That Works for Welsh Providers</h2>
      </div>

      <div class="group-benefits-grid">
        <div class="group-benefit-card">
          <div class="group-benefit-icon">
            <i class="fas fa-map-marker-alt" aria-hidden="true"></i>
          </div>
          <h3 class="group-benefit-title">We Come to You</h3>
          <p class="group-benefit-description">On-site delivery across Cardiff, Swansea, Newport, Wrexham, Bangor, and throughout Wales. M4 corridor to Maidstone approximately 3 hours if you prefer studio training.</p>
        </div>

        <div class="group-benefit-card">
          <div class="group-benefit-icon">
            <i class="fas fa-user-check" aria-hidden="true"></i>
          </div>
          <h3 class="group-benefit-title">Experienced Trainers</h3>
          <p class="group-benefit-description">Working care professionals. DBS-checked, clinically current. They understand care delivery in both Welsh and English contexts.</p>
        </div>

        <div class="group-benefit-card">
          <div class="group-benefit-icon">
            <i class="fas fa-certificate" aria-hidden="true"></i>
          </div>
          <h3 class="group-benefit-title">Instant Certificates</h3>
          <p class="group-benefit-description">Certificates hit inboxes immediately. Digital copies for audit compliance, physical copies posted. Automatic renewal reminders.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Context Section -->
  <section class="content-section bg-light-cream">
    <div class="container">
      <div class="section-header-center">
        <h2 class="section-title">Wales' Care Reality in 2026</h2>
        <p class="section-description">Wales' care workforce faces the same pressures as England: recruitment challenges, retention crisis, hospital discharge pushing complexity home. Different regulatory system, identical operational reality.</p>
        <p class="section-description"><a href="https://www.homecare.co.uk/advice/domiciliary-care-standards-and-quality-assurance" target="_blank" rel="noopener noreferrer" style="color: inherit; text-decoration: underline; text-decoration-color: rgba(155, 133, 96, 0.4);">Care Inspectorate Wales expects quality standards</a>. Your training documentation proves compliance.</p>
        <p class="section-description">Rural Welsh care provision adds complexity—long distances, isolated properties, staff working alone. Your team needs confidence and competency for that responsibility. The <a href="https://www.unison.org.uk/content/uploads/2025/09/A-Fair-Pay-Agreement-in-social-care-public-consultation-member-briefing.pdf" target="_blank" rel="noopener noreferrer" style="color: inherit; text-decoration: underline; text-decoration-color: rgba(155, 133, 96, 0.4);">Fair Pay Agreement's coming</a>—but training that makes staff feel competent keeps them.</p>
      </div>
    </div>
  </section>

  <!-- CTA Section -->
  <section class="about-cta-new">
    <div class="container">
      <div class="about-cta-content-new">
        <h2>Book Training for Your Welsh Care Team</h2>
        <p>Serving Cardiff, Swansea, Newport, Wrexham, Bangor, and care providers across Wales.</p>
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
                    'name' => 'Cardiff',
                    'containedInPlace' => [
                        '@type' => 'AdministrativeArea',
                        'name' => 'Wales'
                    ]
                ],
                [
                    '@type' => 'City',
                    'name' => 'Swansea'
                ],
                [
                    '@type' => 'City',
                    'name' => 'Newport'
                ],
                [
                    '@type' => 'City',
                    'name' => 'Wrexham'
                ],
                [
                    '@type' => 'City',
                    'name' => 'Bangor'
                ]
            ]
        ],
        [
            '@type' => 'Service',
            '@id' => home_url('/locations/wales/#service'),
            'serviceType' => 'Health and Social Care Training',
            'name' => 'Professional Care Training for Wales',
            'description' => 'Professional health and social care training for care providers across Wales. On-site delivery. Emergency first aid, medication management, moving & handling, dementia care, and safeguarding courses.',
            'provider' => [
                '@id' => home_url('/#organization')
            ],
            'areaServed' => [
                [
                    '@type' => 'City',
                    'name' => 'Cardiff'
                ],
                [
                    '@type' => 'City',
                    'name' => 'Swansea'
                ],
                [
                    '@type' => 'City',
                    'name' => 'Newport'
                ],
                [
                    '@type' => 'City',
                    'name' => 'Wrexham'
                ],
                [
                    '@type' => 'City',
                    'name' => 'Bangor'
                ]
            ],
            'audience' => [
                '@type' => 'Audience',
                'audienceType' => 'Care Providers, Healthcare Workers, Domiciliary Care Staff, Welsh Care Providers'
            ],
            'hasOfferCatalog' => [
                '@type' => 'OfferCatalog',
                'name' => 'Care Training Courses for Wales',
                'itemListElement' => [
                    [
                        '@type' => 'Offer',
                        'itemOffered' => [
                            '@type' => 'Course',
                            'name' => 'All Wales Induction Framework',
                            'provider' => [
                                '@id' => home_url('/#organization')
                            ]
                        ]
                    ],
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
                            'name' => 'Dementia Care',
                            'provider' => [
                                '@id' => home_url('/#organization')
                            ]
                        ]
                    ],
                    [
                        '@type' => 'Offer',
                        'itemOffered' => [
                            '@type' => 'Course',
                            'name' => 'Safeguarding',
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
            '@id' => home_url('/locations/wales/#breadcrumb'),
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
                    'name' => 'Wales Training',
                    'item' => home_url('/locations/wales/')
                ]
            ]
        ],
        [
            '@type' => 'WebPage',
            '@id' => home_url('/locations/wales/#webpage'),
            'url' => home_url('/locations/wales/'),
            'name' => 'Health & Social Care Training in Wales | Professional Training for Welsh Providers',
            'description' => 'Professional care training across Wales. On-site delivery to Cardiff, Swansea, Newport, Wrexham. Emergency first aid, medication, dementia, safeguarding.',
            'isPartOf' => [
                '@id' => home_url('/#website')
            ],
            'about' => [
                '@id' => home_url('/#organization')
            ],
            'breadcrumb' => [
                '@id' => home_url('/locations/wales/#breadcrumb')
            ]
        ]
    ]
];

echo '<script type="application/ld+json">' . wp_json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) . '</script>';
?>

<?php get_footer(); ?>
