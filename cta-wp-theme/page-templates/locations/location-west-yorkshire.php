<?php
/**
 * Template Name: Location - West Yorkshire
 * 
 * Location page for West Yorkshire
 *
 * @package CTA_Theme
 */

get_header();

$meta_title = "Health & Social Care Training in West Yorkshire | CQC Compliant Courses";
$meta_description = "CQC-compliant care training across West Yorkshire. On-site delivery to Leeds, Bradford, Sheffield, Wakefield. Emergency first aid, medication, dementia care.";
cta_output_seo_meta_tags($meta_title, $meta_description);

$contact = cta_get_contact_info();
?>

<main id="main-content" class="site-main">
  <!-- Hero Section -->
  <section class="group-hero-section" aria-labelledby="west-yorkshire-heading">
    <div class="container">
      <nav aria-label="Breadcrumb" class="breadcrumb breadcrumb-hero">
        <ol class="breadcrumb-list">
          <li class="breadcrumb-item"><a href="<?php echo esc_url(home_url('/')); ?>" class="breadcrumb-link">Home</a></li>
          <li class="breadcrumb-separator" aria-hidden="true">/</li>
          <li class="breadcrumb-item"><a href="<?php echo esc_url(home_url('/locations/')); ?>" class="breadcrumb-link">Locations</a></li>
          <li class="breadcrumb-separator" aria-hidden="true">/</li>
          <li class="breadcrumb-item"><span class="breadcrumb-current" aria-current="page">West Yorkshire</span></li>
        </ol>
      </nav>
      <h1 id="west-yorkshire-heading" class="hero-title">Health & Social Care Training in West Yorkshire</h1>
      <p class="hero-subtitle">CQC-compliant courses for Yorkshire care providers</p>
    </div>
  </section>

  <!-- Intro Section -->
  <section class="content-section">
    <div class="container">
      <div class="section-header-center">
        <p class="section-eyebrow">West Yorkshire</p>
        <h2 class="section-title">Above Safe Bed Occupancy Levels</h2>
        <p class="section-description">Leeds Teaching Hospitals. Bradford. Sheffield. Calderdale. All running <a href="https://www.instituteforgovernment.org.uk/publication/performance-tracker-2025/nhs/hospitals" target="_blank" rel="noopener noreferrer" style="color: inherit; text-decoration: underline; text-decoration-color: rgba(155, 133, 96, 0.4);">above safe bed occupancy levels</a>. Discharge pressures are acute across West Yorkshire—and your team's managing what the hospitals can't hold.</p>
        <p class="section-description">When patients leave hospital now, they leave sicker, faster, with more complex needs. Your domiciliary care team is the safety net. They need training that reflects that reality.</p>
      </div>
    </div>
  </section>

  <!-- Popular Courses Section -->
  <section class="why-us-blended">
    <div class="container">
      <div class="section-header-center">
        <p class="section-eyebrow">Most Booked</p>
        <h2 class="section-title">What West Yorkshire Providers Are Booking</h2>
      </div>
      
      <div class="why-us-blended-grid">
        <div class="why-us-blended-card">
          <div class="why-us-blended-card-header">
            <div class="why-us-blended-icon-wrapper why-us-blended-icon-1">
              <i class="fas fa-first-aid" aria-hidden="true"></i>
            </div>
          </div>
          <h3 class="why-us-blended-title">Emergency First Aid at Work</h3>
          <p class="why-us-blended-description">With Leeds Teaching Hospitals and Bradford District Care under sustained pressure, your team's managing emergencies that would've stayed in hospital. They need current skills.</p>
        </div>

        <div class="why-us-blended-card">
          <div class="why-us-blended-card-header">
            <div class="why-us-blended-icon-wrapper why-us-blended-icon-2">
              <i class="fas fa-pills" aria-hidden="true"></i>
            </div>
          </div>
          <h3 class="why-us-blended-title">Medication Competency & Management</h3>
          <p class="why-us-blended-description">Polypharmacy cases are standard. <a href="https://www.cqc.org.uk/about-us/fundamental-standards" target="_blank" rel="noopener noreferrer" style="color: inherit; text-decoration: underline; text-decoration-color: rgba(155, 133, 96, 0.4);">CQC wants to see competency frameworks</a>—not just a tick-box.</p>
        </div>

        <div class="why-us-blended-card">
          <div class="why-us-blended-card-header">
            <div class="why-us-blended-icon-wrapper why-us-blended-icon-3">
              <i class="fas fa-hands" aria-hidden="true"></i>
            </div>
          </div>
          <h3 class="why-us-blended-title">Moving & Handling</h3>
          <p class="why-us-blended-description">Bariatric care, specialist equipment, complex positioning. Real skills for real situations.</p>
        </div>

        <div class="why-us-blended-card">
          <div class="why-us-blended-card-header">
            <div class="why-us-blended-icon-wrapper why-us-blended-icon-1">
              <i class="fas fa-brain" aria-hidden="true"></i>
            </div>
          </div>
          <h3 class="why-us-blended-title">Dementia Care</h3>
          <p class="why-us-blended-description">Yorkshire's 85+ population is growing fast. Your staff need practical strategies, not just awareness.</p>
        </div>

        <div class="why-us-blended-card">
          <div class="why-us-blended-card-header">
            <div class="why-us-blended-icon-wrapper why-us-blended-icon-2">
              <i class="fas fa-shield-alt" aria-hidden="true"></i>
            </div>
          </div>
          <h3 class="why-us-blended-title">Safeguarding Adults</h3>
          <p class="why-us-blended-description">Integrated care partnerships are tightening protocols across the region.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Benefits Section -->
  <section class="group-benefits-section">
    <div class="container">
      <div class="section-header-center">
        <p class="section-eyebrow">Why Choose Us</p>
        <h2 class="section-title">Training That Works for West Yorkshire Providers</h2>
      </div>

      <div class="group-benefits-grid">
        <div class="group-benefit-card">
          <div class="group-benefit-icon">
            <i class="fas fa-map-marker-alt" aria-hidden="true"></i>
          </div>
          <h3 class="group-benefit-title">We Come to You</h3>
          <p class="group-benefit-description">On-site delivery across Leeds, Bradford, Sheffield, Wakefield, Huddersfield, Halifax, Barnsley, Rotherham, Doncaster. Most Yorkshire providers book on-site—your team can't spare the travel time.</p>
        </div>

        <div class="group-benefit-card">
          <div class="group-benefit-icon">
            <i class="fas fa-user-check" aria-hidden="true"></i>
          </div>
          <h3 class="group-benefit-title">Experienced Trainers</h3>
          <p class="group-benefit-description">Working care professionals. DBS-checked, clinically current, experienced in domiciliary and complex care. They know what a package of care in Bradford actually looks like.</p>
        </div>

        <div class="group-benefit-card">
          <div class="group-benefit-icon">
            <i class="fas fa-certificate" aria-hidden="true"></i>
          </div>
          <h3 class="group-benefit-title">Instant Certificates</h3>
          <p class="group-benefit-description">Certificates hit inboxes immediately. Digital copies for instant compliance, physical copies posted. All courses CPD-accredited and CQC-compliant.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Context Section -->
  <section class="content-section bg-light-cream">
    <div class="container">
      <div class="section-header-center">
        <h2 class="section-title">West Yorkshire's Care Landscape in 2026</h2>
        <p class="section-description">Hospital bed occupancy across England hasn't dropped below <a href="https://www.instituteforgovernment.org.uk/publication/performance-tracker-2025/nhs/hospitals" target="_blank" rel="noopener noreferrer" style="color: inherit; text-decoration: underline; text-decoration-color: rgba(155, 133, 96, 0.4);">91.4%—well above the 85% safe threshold</a>. Yorkshire's trusts are no exception. Discharge is being pushed hard.</p>
        <p class="section-description">That means your team's managing cases with higher acuity, more medications, more monitoring requirements. The patients coming home now needed hospital a few years ago.</p>
        <p class="section-description"><a href="https://www.skillsforcare.org.uk/Adult-Social-Care-Workforce-Data/workforceintelligence/resources/Reports/National/The-state-of-the-adult-social-care-sector-and-workforce-in-England.html" target="_blank" rel="noopener noreferrer" style="color: inherit; text-decoration: underline; text-decoration-color: rgba(155, 133, 96, 0.4);">Workforce vacancy rates sit around 8.3% nationally</a>. In competitive urban markets like Leeds and Sheffield, it's probably higher. The <a href="https://carecubed.org/2025-care-worker-500-million-fair-pay-announcement/" target="_blank" rel="noopener noreferrer" style="color: inherit; text-decoration: underline; text-decoration-color: rgba(155, 133, 96, 0.4);">Fair Pay Agreement's coming</a>—but wages alone don't retain staff. Feeling competent does. That's training.</p>
      </div>
    </div>
  </section>

  <!-- CTA Section -->
  <section class="about-cta-new">
    <div class="container">
      <div class="about-cta-content-new">
        <h2>Book Training for Your West Yorkshire Care Team</h2>
        <p>Serving Leeds, Bradford, Sheffield, Wakefield, Huddersfield, and care providers across West Yorkshire.</p>
        <div class="about-cta-buttons-new">
          <a href="<?php echo esc_url(home_url('/contact')); ?>" class="btn btn-primary">Get in Touch</a>
            <a href="tel:<?php echo esc_attr($contact['phone_link']); ?>" class="btn btn-secondary">Call <?php echo esc_html($contact['phone']); ?></a>
        </div>
    </section>
  </div>
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
                    'name' => 'Leeds',
                    'containedInPlace' => [
                        '@type' => 'AdministrativeArea',
                        'name' => 'West Yorkshire'
                    ]
                ],
                [
                    '@type' => 'City',
                    'name' => 'Bradford'
                ],
                [
                    '@type' => 'City',
                    'name' => 'Sheffield'
                ],
                [
                    '@type' => 'City',
                    'name' => 'Wakefield'
                ],
                [
                    '@type' => 'City',
                    'name' => 'Huddersfield'
                ]
            ]
        ],
        [
            '@type' => 'Service',
            '@id' => home_url('/locations/west-yorkshire/#service'),
            'serviceType' => 'Health and Social Care Training',
            'name' => 'CQC-Compliant Care Training for West Yorkshire',
            'description' => 'Professional health and social care training for care providers across West Yorkshire. On-site delivery. Emergency first aid, medication management, moving & handling, dementia care, and safeguarding courses.',
            'provider' => [
                '@id' => home_url('/#organization')
            ],
            'areaServed' => [
                [
                    '@type' => 'City',
                    'name' => 'Leeds'
                ],
                [
                    '@type' => 'City',
                    'name' => 'Bradford'
                ],
                [
                    '@type' => 'City',
                    'name' => 'Sheffield'
                ],
                [
                    '@type' => 'City',
                    'name' => 'Wakefield'
                ],
                [
                    '@type' => 'City',
                    'name' => 'Huddersfield'
                ]
            ],
            'audience' => [
                '@type' => 'Audience',
                'audienceType' => 'Care Providers, Healthcare Workers, Domiciliary Care Staff'
            ],
            'hasOfferCatalog' => [
                '@type' => 'OfferCatalog',
                'name' => 'Care Training Courses for West Yorkshire',
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
                            'name' => 'Safeguarding Adults',
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
            '@id' => home_url('/locations/west-yorkshire/#breadcrumb'),
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
                    'name' => 'West Yorkshire Training',
                    'item' => home_url('/locations/west-yorkshire/')
                ]
            ]
        ],
        [
            '@type' => 'WebPage',
            '@id' => home_url('/locations/west-yorkshire/#webpage'),
            'url' => home_url('/locations/west-yorkshire/'),
            'name' => 'Health & Social Care Training in West Yorkshire | CQC Compliant Courses',
            'description' => 'CQC-compliant care training across West Yorkshire. On-site delivery to Leeds, Bradford, Sheffield, Wakefield. Emergency first aid, medication, dementia care.',
            'isPartOf' => [
                '@id' => home_url('/#website')
            ],
            'about' => [
                '@id' => home_url('/#organization')
            ],
            'breadcrumb' => [
                '@id' => home_url('/locations/west-yorkshire/#breadcrumb')
            ]
        ]
    ]
];

echo '<script type="application/ld+json">' . wp_json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) . '</script>';
?>

<?php get_footer(); ?>
