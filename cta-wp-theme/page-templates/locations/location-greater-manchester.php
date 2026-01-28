<?php
/**
 * Template Name: Location - Greater Manchester
 * 
 * Location page for Greater Manchester
 *
 * @package CTA_Theme
 */

get_header();

$meta_title = "Health & Social Care Training in Greater Manchester | CQC Courses";
$meta_description = "CQC-compliant care training across Greater Manchester. On-site delivery or at our training centre. Emergency first aid, medication, moving & handling for North West providers.";
cta_output_seo_meta_tags($meta_title, $meta_description);

$contact = cta_get_contact_info();
?>

<main id="main-content" class="site-main">
  <!-- Hero Section -->
  <section class="group-hero-section" aria-labelledby="manchester-heading">
    <div class="container">
      <nav aria-label="Breadcrumb" class="breadcrumb breadcrumb-hero">
        <ol class="breadcrumb-list">
          <li class="breadcrumb-item"><a href="<?php echo esc_url(home_url('/')); ?>" class="breadcrumb-link">Home</a></li>
          <li class="breadcrumb-separator" aria-hidden="true">/</li>
          <li class="breadcrumb-item"><a href="<?php echo esc_url(home_url('/locations/')); ?>" class="breadcrumb-link">Locations</a></li>
          <li class="breadcrumb-separator" aria-hidden="true">/</li>
          <li class="breadcrumb-item"><span class="breadcrumb-current" aria-current="page">Greater Manchester</span></li>
        </ol>
      </nav>
      <h1 id="manchester-heading" class="hero-title">Health & Social Care Training in Greater Manchester</h1>
      <p class="hero-subtitle">CQC-compliant training for North West care providers</p>
    </div>
  </section>

  <!-- Intro Section -->
  <section class="content-section">
    <div class="container">
      <div class="section-header-center">
        <p class="section-eyebrow">Greater Manchester</p>
        <h2 class="section-title">Hospital Discharge at Crisis Point</h2>
        <p class="section-description">Bed occupancy's running <a href="https://www.instituteforgovernment.org.uk/publication/performance-tracker-2025/nhs/hospitals" target="_blank" rel="noopener noreferrer" style="color: inherit; text-decoration: underline; text-decoration-color: rgba(155, 133, 96, 0.4);">above 95%</a>. <a href="https://rcp.ac.uk/news-and-media/news-and-opinion/a-failing-system-rcp-urges-government-to-fix-social-care-crisis-amid-surge-in-delayed-discharges/" target="_blank" rel="noopener noreferrer" style="color: inherit; text-decoration: underline; text-decoration-color: rgba(155, 133, 96, 0.4);">Delayed discharges climbed to over 14,000 patients nationally at peak</a>—and Manchester's trusts are feeling it. Your domiciliary care team is picking up the work the hospitals can't hold onto.</p>
        <p class="section-description">Your team's managing cases that would've stayed in hospital five years ago. More medications. More monitoring. More complexity. They need training that reflects what's actually landing on your rota.</p>
      </div>
    </div>
  </section>

  <!-- Popular Courses Section -->
  <section class="why-us-blended">
    <div class="container">
      <div class="section-header-center">
        <p class="section-eyebrow">Most Booked</p>
        <h2 class="section-title">What Greater Manchester Providers Are Booking</h2>
      </div>
      
      <div class="why-us-blended-grid">
        <div class="why-us-blended-card">
          <div class="why-us-blended-card-header">
            <div class="why-us-blended-icon-wrapper why-us-blended-icon-1">
              <i class="fas fa-first-aid" aria-hidden="true"></i>
            </div>
          </div>
          <h3 class="why-us-blended-title">Emergency First Aid at Work</h3>
          <p class="why-us-blended-description">With Manchester Foundation Trust and Stockport NHS both managing sustained discharge pressure, your team's the safety net. They need current emergency skills.</p>
        </div>

        <div class="why-us-blended-card">
          <div class="why-us-blended-card-header">
            <div class="why-us-blended-icon-wrapper why-us-blended-icon-2">
              <i class="fas fa-pills" aria-hidden="true"></i>
            </div>
          </div>
          <h3 class="why-us-blended-title">Medication Competency & Management</h3>
          <p class="why-us-blended-description">Polypharmacy cases are standard now. CQC wants to see proper competency frameworks—not just awareness training ticked off.</p>
        </div>

        <div class="why-us-blended-card">
          <div class="why-us-blended-card-header">
            <div class="why-us-blended-icon-wrapper why-us-blended-icon-3">
              <i class="fas fa-hands" aria-hidden="true"></i>
            </div>
          </div>
          <h3 class="why-us-blended-title">Moving & Handling</h3>
          <p class="why-us-blended-description">Bariatric care, ceiling track hoists, complex positioning. What your team actually deals with, not textbook theory.</p>
        </div>

        <div class="why-us-blended-card">
          <div class="why-us-blended-card-header">
            <div class="why-us-blended-icon-wrapper why-us-blended-icon-1">
              <i class="fas fa-shield-alt" aria-hidden="true"></i>
            </div>
          </div>
          <h3 class="why-us-blended-title">Safeguarding Adults</h3>
          <p class="why-us-blended-description">Greater Manchester's integrated care system is tightening protocols. Keep your team current.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Benefits Section -->
  <section class="group-benefits-section">
    <div class="container">
      <div class="section-header-center">
        <p class="section-eyebrow">Why Choose Us</p>
        <h2 class="section-title">Training That Works Around Care</h2>
      </div>

      <div class="group-benefits-grid">
        <div class="group-benefit-card">
          <div class="group-benefit-icon">
            <i class="fas fa-map-marker-alt" aria-hidden="true"></i>
          </div>
          <h3 class="group-benefit-title">We Come to You</h3>
          <p class="group-benefit-description">On-site delivery across Manchester, Stockport, Trafford, Bolton, Wigan, Oldham, Rochdale, Bury, Salford, Tameside. Night shift finishing at 8am? Book them on a morning course. Weekend workers? We run Saturdays.</p>
        </div>

        <div class="group-benefit-card">
          <div class="group-benefit-icon">
            <i class="fas fa-user-check" aria-hidden="true"></i>
          </div>
          <h3 class="group-benefit-title">Experienced Trainers</h3>
          <p class="group-benefit-description">Working care professionals—DBS-checked, clinically current, experienced in domiciliary and complex care. They know what a 6am call in Salford actually looks like.</p>
        </div>

        <div class="group-benefit-card">
          <div class="group-benefit-icon">
            <i class="fas fa-certificate" aria-hidden="true"></i>
          </div>
          <h3 class="group-benefit-title">Instant Certificates</h3>
          <p class="group-benefit-description">Certificates hit your team's inbox before they've left the training room. Digital copies for immediate audit compliance, physical copies posted same day.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Context Section -->
  <section class="content-section bg-light-cream">
    <div class="container">
      <div class="section-header-center">
        <h2 class="section-title">Greater Manchester's Care Landscape in 2026</h2>
        <p class="section-description">Hospital process delays account for around a third of all delay reasons for people waiting to leave hospital across Greater Manchester. That's not just an NHS problem—it's your problem. Because when discharge finally happens, your team's managing sicker, more complex packages with less handover information than they need.</p>
        <p class="section-description">The GM Integrated Care Partnership is pushing "Home First" principles hard. That means more assessments happening at home, not in hospital. Your staff need to be ready for that responsibility.</p>
        <p class="section-description"><a href="https://www.skillsforcare.org.uk/Adult-Social-Care-Workforce-Data/workforceintelligence/resources/Reports/National/The-state-of-the-adult-social-care-sector-and-workforce-in-England.html" target="_blank" rel="noopener noreferrer" style="color: inherit; text-decoration: underline; text-decoration-color: rgba(155, 133, 96, 0.4);">Workforce vacancy rates are sitting around 8.3% nationally</a>—probably higher in urban areas where competition for staff is fierce. The <a href="https://carecubed.org/2025-care-worker-500-million-fair-pay-announcement/" target="_blank" rel="noopener noreferrer" style="color: inherit; text-decoration: underline; text-decoration-color: rgba(155, 133, 96, 0.4);">Fair Pay Agreement's coming</a>, which should help wages. But wages alone don't keep staff. Feeling competent and supported does. That's where training comes in.</p>
      </div>
    </div>
  </section>

  <!-- CTA Section -->
  <section class="about-cta-new">
    <div class="container">
      <div class="about-cta-content-new">
        <h2>Book Training for Your Greater Manchester Team</h2>
        <p>Serving Manchester, Stockport, Trafford, Salford, Bolton, Bury, Oldham, Rochdale, Tameside, Wigan, and care providers across Greater Manchester.</p>
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
                    'name' => 'Manchester',
                    'containedInPlace' => [
                        '@type' => 'AdministrativeArea',
                        'name' => 'Greater Manchester'
                    ]
                ],
                [
                    '@type' => 'City',
                    'name' => 'Stockport'
                ],
                [
                    '@type' => 'City',
                    'name' => 'Salford'
                ],
                [
                    '@type' => 'City',
                    'name' => 'Trafford'
                ],
                [
                    '@type' => 'City',
                    'name' => 'Tameside'
                ],
                [
                    '@type' => 'City',
                    'name' => 'Oldham'
                ],
                [
                    '@type' => 'City',
                    'name' => 'Rochdale'
                ],
                [
                    '@type' => 'City',
                    'name' => 'Bury'
                ],
                [
                    '@type' => 'City',
                    'name' => 'Bolton'
                ],
                [
                    '@type' => 'City',
                    'name' => 'Wigan'
                ]
            ]
        ],
        [
            '@type' => 'Service',
            '@id' => home_url('/locations/greater-manchester/#service'),
            'serviceType' => 'Health and Social Care Training',
            'name' => 'CQC-Compliant Care Training for Greater Manchester',
            'description' => 'Professional health and social care training for care providers across Greater Manchester. On-site delivery or at our training centre. Emergency first aid, medication management, moving & handling, safeguarding, and dementia care courses.',
            'provider' => [
                '@id' => home_url('/#organization')
            ],
            'areaServed' => [
                [
                    '@type' => 'City',
                    'name' => 'Manchester'
                ],
                [
                    '@type' => 'City',
                    'name' => 'Stockport'
                ],
                [
                    '@type' => 'City',
                    'name' => 'Salford'
                ],
                [
                    '@type' => 'City',
                    'name' => 'Trafford'
                ],
                [
                    '@type' => 'City',
                    'name' => 'Tameside'
                ],
                [
                    '@type' => 'City',
                    'name' => 'Oldham'
                ],
                [
                    '@type' => 'City',
                    'name' => 'Rochdale'
                ],
                [
                    '@type' => 'City',
                    'name' => 'Bury'
                ],
                [
                    '@type' => 'City',
                    'name' => 'Bolton'
                ],
                [
                    '@type' => 'City',
                    'name' => 'Wigan'
                ]
            ],
            'audience' => [
                '@type' => 'Audience',
                'audienceType' => 'Care Providers, Healthcare Workers, Domiciliary Care Staff, Care Home Staff'
            ],
            'hasOfferCatalog' => [
                '@type' => 'OfferCatalog',
                'name' => 'Care Training Courses for Greater Manchester',
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
                            'name' => 'Moving & Handling (People)',
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
            '@id' => home_url('/locations/greater-manchester/#breadcrumb'),
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
                    'name' => 'Greater Manchester Training',
                    'item' => home_url('/locations/greater-manchester/')
                ]
            ]
        ],
        [
            '@type' => 'WebPage',
            '@id' => home_url('/locations/greater-manchester/#webpage'),
            'url' => home_url('/locations/greater-manchester/'),
            'name' => 'Health & Social Care Training in Greater Manchester | CQC Courses',
            'description' => 'CQC-compliant care training across Greater Manchester. On-site delivery or at our training centre. Emergency first aid, medication, moving & handling for North West providers.',
            'isPartOf' => [
                '@id' => home_url('/#website')
            ],
            'about' => [
                '@id' => home_url('/#organization')
            ],
            'breadcrumb' => [
                '@id' => home_url('/locations/greater-manchester/#breadcrumb')
            ]
        ]
    ]
];

echo '<script type="application/ld+json">' . wp_json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) . '</script>';
?>

<?php get_footer(); ?>
