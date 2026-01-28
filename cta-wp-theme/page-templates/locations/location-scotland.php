<?php
/**
 * Template Name: Location - Scotland
 * 
 * Location page for Scotland
 *
 * @package CTA_Theme
 */

get_header();

$meta_title = "Health & Social Care Training in Scotland | Professional Training for Scottish Providers";
$meta_description = "Professional care training across Scotland. On-site delivery to Edinburgh, Glasgow, Aberdeen, Dundee. Emergency first aid, medication, dementia, Adult Support and Protection.";
cta_output_seo_meta_tags($meta_title, $meta_description);

$contact = cta_get_contact_info();
?>

<main id="main-content" class="site-main">
  <!-- Hero Section -->
  <section class="group-hero-section" aria-labelledby="scotland-heading">
    <div class="container">
      <nav aria-label="Breadcrumb" class="breadcrumb breadcrumb-hero">
        <ol class="breadcrumb-list">
          <li class="breadcrumb-item"><a href="<?php echo esc_url(home_url('/')); ?>" class="breadcrumb-link">Home</a></li>
          <li class="breadcrumb-separator" aria-hidden="true">/</li>
          <li class="breadcrumb-item"><a href="<?php echo esc_url(home_url('/locations/')); ?>" class="breadcrumb-link">Locations</a></li>
          <li class="breadcrumb-separator" aria-hidden="true">/</li>
          <li class="breadcrumb-item"><span class="breadcrumb-current" aria-current="page">Scotland</span></li>
        </ol>
      </nav>
      <h1 id="scotland-heading" class="hero-title">Health & Social Care Training in Scotland</h1>
      <p class="hero-subtitle">Professional training for Scottish care providers</p>
    </div>
  </section>

  <!-- Intro Section -->
  <section class="content-section">
    <div class="container">
      <div class="section-header-center">
        <p class="section-eyebrow">Scotland</p>
        <h2 class="section-title">Different Regulator. Same Crisis.</h2>
        <p class="section-description">Scottish care providers face identical workforce pressures to England: recruitment frozen, retention critical, hospital discharge pushing complexity into the community. <a href="https://www.birdie.care/blog/cqc-policies-and-procedures" target="_blank" rel="noopener noreferrer" style="color: inherit; text-decoration: underline; text-decoration-color: rgba(155, 133, 96, 0.4);">Healthcare Improvement Scotland expects the same quality standards as CQC</a>—you just report to different people.</p>
        <p class="section-description">Training is how you prove quality. Training is how you keep staff.</p>
      </div>
    </div>
  </section>

  <!-- Popular Courses Section -->
  <section class="why-us-blended">
    <div class="container">
      <div class="section-header-center">
        <p class="section-eyebrow">Most Booked</p>
        <h2 class="section-title">What Scottish Care Providers Are Booking</h2>
      </div>
      
      <div class="why-us-blended-grid">
        <div class="why-us-blended-card">
          <div class="why-us-blended-card-header">
            <div class="why-us-blended-icon-wrapper why-us-blended-icon-1">
              <i class="fas fa-certificate" aria-hidden="true"></i>
            </div>
          </div>
          <h3 class="why-us-blended-title">Care Certificate Equivalent</h3>
          <p class="why-us-blended-description">New starters need structured induction. We deliver training that meets Scottish standards.</p>
        </div>

        <div class="why-us-blended-card">
          <div class="why-us-blended-card-header">
            <div class="why-us-blended-icon-wrapper why-us-blended-icon-2">
              <i class="fas fa-first-aid" aria-hidden="true"></i>
            </div>
          </div>
          <h3 class="why-us-blended-title">Emergency First Aid at Work</h3>
          <p class="why-us-blended-description">Your team needs current emergency skills regardless of which country they work in.</p>
        </div>

        <div class="why-us-blended-card">
          <div class="why-us-blended-card-header">
            <div class="why-us-blended-icon-wrapper why-us-blended-icon-3">
              <i class="fas fa-pills" aria-hidden="true"></i>
            </div>
          </div>
          <h3 class="why-us-blended-title">Medication Competency & Management</h3>
          <p class="why-us-blended-description">Complex polypharmacy cases. Competency frameworks required.</p>
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
          <p class="why-us-blended-description">Scotland's aging population requires practical dementia strategies.</p>
        </div>

        <div class="why-us-blended-card">
          <div class="why-us-blended-card-header">
            <div class="why-us-blended-icon-wrapper why-us-blended-icon-3">
              <i class="fas fa-shield-alt" aria-hidden="true"></i>
            </div>
          </div>
          <h3 class="why-us-blended-title">Adult Support and Protection</h3>
          <p class="why-us-blended-description">Scottish safeguarding framework. Keep your team current.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Benefits Section -->
  <section class="group-benefits-section">
    <div class="container">
      <div class="section-header-center">
        <p class="section-eyebrow">Why Choose Us</p>
        <h2 class="section-title">Training That Works for Scottish Providers</h2>
      </div>

      <div class="group-benefits-grid">
        <div class="group-benefit-card">
          <div class="group-benefit-icon">
            <i class="fas fa-map-marker-alt" aria-hidden="true"></i>
          </div>
          <h3 class="group-benefit-title">We Come to You</h3>
          <p class="group-benefit-description">On-site delivery across Edinburgh, Glasgow, Aberdeen, Dundee, Inverness, Stirling, Perth, and throughout Scotland. We bring everything to you.</p>
        </div>

        <div class="group-benefit-card">
          <div class="group-benefit-icon">
            <i class="fas fa-user-check" aria-hidden="true"></i>
          </div>
          <h3 class="group-benefit-title">Experienced Trainers</h3>
          <p class="group-benefit-description">Working care professionals. DBS-checked (PVG equivalent), clinically current. They understand care delivery regardless of regulatory framework.</p>
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
        <h2 class="section-title">Scotland's Care Reality in 2026</h2>
        <p class="section-description">Scotland's care workforce faces the same crisis as England: vacancies, retention challenges, hospital discharge pressure. Major providers like HC-One, Barchester, and Care UK operate across Scotland—they're managing identical pressures to their English operations.</p>
        <p class="section-description"><a href="https://www.birdie.care/blog/cqc-policies-and-procedures" target="_blank" rel="noopener noreferrer" style="color: inherit; text-decoration: underline; text-decoration-color: rgba(155, 133, 96, 0.4);">Healthcare Improvement Scotland expects quality</a>. Your training records prove it.</p>
        <p class="section-description">The <a href="https://www.unison.org.uk/content/uploads/2025/09/A-Fair-Pay-Agreement-in-social-care-public-consultation-member-briefing.pdf" target="_blank" rel="noopener noreferrer" style="color: inherit; text-decoration: underline; text-decoration-color: rgba(155, 133, 96, 0.4);">Fair Pay Agreement's coming for England</a>—Scotland's watching closely. Wages matter, but feeling competent matters more for retention. Trained staff stay longer.</p>
      </div>
    </div>
  </section>

  <!-- CTA Section -->
  <section class="about-cta-new">
    <div class="container">
      <div class="about-cta-content-new">
        <h2>Book Training for Your Scottish Care Team</h2>
        <p>Serving Edinburgh, Glasgow, Aberdeen, Dundee, Inverness, Stirling, Perth, and care providers across Scotland.</p>
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
                    'name' => 'Edinburgh',
                    'containedInPlace' => [
                        '@type' => 'AdministrativeArea',
                        'name' => 'Scotland'
                    ]
                ],
                [
                    '@type' => 'City',
                    'name' => 'Glasgow'
                ],
                [
                    '@type' => 'City',
                    'name' => 'Aberdeen'
                ],
                [
                    '@type' => 'City',
                    'name' => 'Dundee'
                ],
                [
                    '@type' => 'City',
                    'name' => 'Inverness'
                ]
            ]
        ],
        [
            '@type' => 'Service',
            '@id' => home_url('/locations/scotland/#service'),
            'serviceType' => 'Health and Social Care Training',
            'name' => 'Professional Care Training for Scotland',
            'description' => 'Professional health and social care training for care providers across Scotland. On-site delivery. Emergency first aid, medication management, moving & handling, dementia care, and Adult Support and Protection courses.',
            'provider' => [
                '@id' => home_url('/#organization')
            ],
            'areaServed' => [
                [
                    '@type' => 'City',
                    'name' => 'Edinburgh'
                ],
                [
                    '@type' => 'City',
                    'name' => 'Glasgow'
                ],
                [
                    '@type' => 'City',
                    'name' => 'Aberdeen'
                ],
                [
                    '@type' => 'City',
                    'name' => 'Dundee'
                ],
                [
                    '@type' => 'City',
                    'name' => 'Inverness'
                ]
            ],
            'audience' => [
                '@type' => 'Audience',
                'audienceType' => 'Care Providers, Healthcare Workers, Domiciliary Care Staff, Scottish Care Providers'
            ],
            'hasOfferCatalog' => [
                '@type' => 'OfferCatalog',
                'name' => 'Care Training Courses for Scotland',
                'itemListElement' => [
                    [
                        '@type' => 'Offer',
                        'itemOffered' => [
                            '@type' => 'Course',
                            'name' => 'Care Certificate',
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
                            'name' => 'Adult Support and Protection',
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
            '@id' => home_url('/locations/scotland/#breadcrumb'),
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
                    'name' => 'Scotland Training',
                    'item' => home_url('/locations/scotland/')
                ]
            ]
        ],
        [
            '@type' => 'WebPage',
            '@id' => home_url('/locations/scotland/#webpage'),
            'url' => home_url('/locations/scotland/'),
            'name' => 'Health & Social Care Training in Scotland | Professional Training for Scottish Providers',
            'description' => 'Professional care training across Scotland. On-site delivery to Edinburgh, Glasgow, Aberdeen, Dundee. Emergency first aid, medication, dementia, Adult Support and Protection.',
            'isPartOf' => [
                '@id' => home_url('/#website')
            ],
            'about' => [
                '@id' => home_url('/#organization')
            ],
            'breadcrumb' => [
                '@id' => home_url('/locations/scotland/#breadcrumb')
            ]
        ]
    ]
];

echo '<script type="application/ld+json">' . wp_json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) . '</script>';
?>

<?php get_footer(); ?>
