<?php
/**
 * Template Name: Location - Midlands
 * 
 * Location page for Midlands (Birmingham & Coventry)
 *
 * @package CTA_Theme
 */

get_header();

$meta_title = "Health & Social Care Training in the Midlands | Birmingham & Coventry CQC Courses";
$meta_description = "CQC-compliant care training across the Midlands. On-site delivery to Birmingham, Coventry, Wolverhampton. Emergency first aid, medication, diabetes care.";
cta_output_seo_meta_tags($meta_title, $meta_description);

$contact = cta_get_contact_info();
?>

<main id="main-content" class="site-main">
  <!-- Hero Section -->
  <section class="group-hero-section" aria-labelledby="midlands-heading">
    <div class="container">
      <nav aria-label="Breadcrumb" class="breadcrumb breadcrumb-hero">
        <ol class="breadcrumb-list">
          <li class="breadcrumb-item"><a href="<?php echo esc_url(home_url('/')); ?>" class="breadcrumb-link">Home</a></li>
          <li class="breadcrumb-separator" aria-hidden="true">/</li>
          <li class="breadcrumb-item"><a href="<?php echo esc_url(home_url('/locations/')); ?>" class="breadcrumb-link">Locations</a></li>
          <li class="breadcrumb-separator" aria-hidden="true">/</li>
          <li class="breadcrumb-item"><span class="breadcrumb-current" aria-current="page">Midlands</span></li>
        </ol>
      </nav>
      <h1 id="midlands-heading" class="hero-title">Health & Social Care Training in the Midlands</h1>
      <p class="hero-subtitle">CQC-compliant courses for Birmingham, Coventry & West Midlands care providers</p>
    </div>
  </section>

  <!-- Intro Section -->
  <section class="content-section">
    <div class="container">
      <div class="section-header-center">
        <p class="section-eyebrow">Midlands</p>
        <h2 class="section-title">Extreme Discharge Pressures</h2>
        <p class="section-description">University Hospitals Birmingham. Coventry & Warwickshire. Sandwell. Walsall. All managing <a href="https://www.instituteforgovernment.org.uk/publication/performance-tracker-2025/nhs/hospitals" target="_blank" rel="noopener noreferrer" style="color: inherit; text-decoration: underline; text-decoration-color: rgba(155, 133, 96, 0.4);">extreme discharge pressures</a>. Your Midlands care team is receiving patients who would've stayed in hospital five years ago.</p>
        <p class="section-description">That's not a complaint, it's a sad reality. And your team needs training that reflects what they're actually managing.</p>
      </div>
    </div>
  </section>

  <!-- Popular Courses Section -->
  <section class="why-us-blended">
    <div class="container">
      <div class="section-header-center">
        <p class="section-eyebrow">Most Booked</p>
        <h2 class="section-title">What Midlands Providers Are Booking</h2>
      </div>
      
      <div class="why-us-blended-grid">
        <div class="why-us-blended-card">
          <div class="why-us-blended-card-header">
            <div class="why-us-blended-icon-wrapper why-us-blended-icon-1">
              <i class="fas fa-first-aid" aria-hidden="true"></i>
            </div>
          </div>
          <h3 class="why-us-blended-title">Emergency First Aid at Work</h3>
          <p class="why-us-blended-description">With UHB and regional trusts all pushing discharge, your team needs current emergency skills.</p>
        </div>

        <div class="why-us-blended-card">
          <div class="why-us-blended-card-header">
            <div class="why-us-blended-icon-wrapper why-us-blended-icon-2">
              <i class="fas fa-pills" aria-hidden="true"></i>
            </div>
          </div>
          <h3 class="why-us-blended-title">Medication Competency & Management</h3>
          <p class="why-us-blended-description">Complex medication regimes coming home from hospital. <a href="https://www.cqc.org.uk/about-us/fundamental-standards" target="_blank" rel="noopener noreferrer" style="color: inherit; text-decoration: underline; text-decoration-color: rgba(155, 133, 96, 0.4);">CQC wants competency frameworks</a>, not tick-boxes.</p>
        </div>

        <div class="why-us-blended-card">
          <div class="why-us-blended-card-header">
            <div class="why-us-blended-icon-wrapper why-us-blended-icon-3">
              <i class="fas fa-hands" aria-hidden="true"></i>
            </div>
          </div>
          <h3 class="why-us-blended-title">Moving & Handling</h3>
          <p class="why-us-blended-description">Bariatric care is common in the Midlands. Your team needs specialist skills, not just basic training.</p>
        </div>

        <div class="why-us-blended-card">
          <div class="why-us-blended-card-header">
            <div class="why-us-blended-icon-wrapper why-us-blended-icon-1">
              <i class="fas fa-brain" aria-hidden="true"></i>
            </div>
          </div>
          <h3 class="why-us-blended-title">Dementia Care</h3>
          <p class="why-us-blended-description">Midlands' aging population means dementia care is core business. Practical strategies, not just awareness.</p>
        </div>

        <div class="why-us-blended-card">
          <div class="why-us-blended-card-header">
            <div class="why-us-blended-icon-wrapper why-us-blended-icon-2">
              <i class="fas fa-heartbeat" aria-hidden="true"></i>
            </div>
          </div>
          <h3 class="why-us-blended-title">Diabetes Awareness & Insulin Administration</h3>
          <p class="why-us-blended-description">High rates of Type 2 diabetes in the region. Your staff need competency, not just awareness.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Benefits Section -->
  <section class="group-benefits-section">
    <div class="container">
      <div class="section-header-center">
        <p class="section-eyebrow">Why Choose Us</p>
        <h2 class="section-title">Training That Works for Midlands Providers</h2>
      </div>

      <div class="group-benefits-grid">
        <div class="group-benefit-card">
          <div class="group-benefit-icon">
            <i class="fas fa-map-marker-alt" aria-hidden="true"></i>
          </div>
          <h3 class="group-benefit-title">We Come to You</h3>
          <p class="group-benefit-description">On-site delivery across Birmingham, Coventry, Wolverhampton, Dudley, Sandwell, Walsall, Solihull, and surrounding areas. M6/M40 corridor approximately 2–2.5 hours to Maidstone if you prefer centre-based.</p>
        </div>

        <div class="group-benefit-card">
          <div class="group-benefit-icon">
            <i class="fas fa-user-check" aria-hidden="true"></i>
          </div>
          <h3 class="group-benefit-title">Experienced Trainers</h3>
          <p class="group-benefit-description">Working care professionals. DBS-checked, clinically current. They understand discharge pressures and what your team's walking into.</p>
        </div>

        <div class="group-benefit-card">
          <div class="group-benefit-icon">
            <i class="fas fa-certificate" aria-hidden="true"></i>
          </div>
          <h3 class="group-benefit-title">Instant Certificates</h3>
          <p class="group-benefit-description">Certificates hit inboxes before your team leaves training. Digital copies for immediate compliance, physical copies posted. Automatic renewal reminders.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Context Section -->
  <section class="content-section bg-light-cream">
    <div class="container">
      <div class="section-header-center">
        <h2 class="section-title">Midlands' Care Landscape in 2026</h2>
        <p class="section-description"><a href="https://lowdownnhs.info/hospitals/patients-unable-to-leave-hospital-cost-the-nhs-2bn-a-year/" target="_blank" rel="noopener noreferrer" style="color: inherit; text-decoration: underline; text-decoration-color: rgba(155, 133, 96, 0.4);">Hospital discharge pressures are acute across the Midlands</a>. UHB serves one of the largest populations in the country. When discharge happens, it happens with complexity—more medications, more monitoring, more risk.</p>
        <p class="section-description">Your team's managing that risk. Every shift.</p>
        <p class="section-description"><a href="https://www.skillsforcare.org.uk/Adult-Social-Care-Workforce-Data/workforceintelligence/resources/Reports/National/The-state-of-the-adult-social-care-sector-and-workforce-in-England.html" target="_blank" rel="noopener noreferrer" style="color: inherit; text-decoration: underline; text-decoration-color: rgba(155, 133, 96, 0.4);">Workforce vacancy rates nationally sit at 8.3%</a>—probably higher in urban West Midlands where competition for staff is fierce. Training that makes staff feel competent is what keeps them.</p>
      </div>
    </div>
  </section>

  <!-- CTA Section -->
  <section class="about-cta-new">
    <div class="container">
      <div class="about-cta-content-new">
        <h2>Book Training for Your Midlands Care Team</h2>
        <p>Serving Birmingham, Coventry, Wolverhampton, Dudley, Sandwell, Walsall, Solihull, and care providers across the Midlands.</p>
        <div class="about-cta-buttons-new">
          <a href="<?php echo esc_url(home_url('/contact')); ?>" class="btn btn-primary">Get in Touch</a>
          <a href="tel:<?php echo esc_attr($contact['phone_link']); ?>" class="btn btn-secondary">Call <?php echo esc_html($contact['phone']); ?></a>
        </div>
      </div>
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
                    'name' => 'Birmingham',
                    'containedInPlace' => [
                        '@type' => 'AdministrativeArea',
                        'name' => 'West Midlands'
                    ]
                ],
                [
                    '@type' => 'City',
                    'name' => 'Coventry'
                ],
                [
                    '@type' => 'City',
                    'name' => 'Wolverhampton'
                ],
                [
                    '@type' => 'City',
                    'name' => 'Dudley'
                ],
                [
                    '@type' => 'City',
                    'name' => 'Solihull'
                ]
            ]
        ],
        [
            '@type' => 'Service',
            '@id' => home_url('/locations/midlands/#service'),
            'serviceType' => 'Health and Social Care Training',
            'name' => 'CQC-Compliant Care Training for the Midlands',
            'description' => 'Professional health and social care training for care providers across Birmingham, Coventry, and the West Midlands. On-site delivery. Emergency first aid, medication management, moving & handling, dementia care, and diabetes courses.',
            'provider' => [
                '@id' => home_url('/#organization')
            ],
            'areaServed' => [
                [
                    '@type' => 'City',
                    'name' => 'Birmingham'
                ],
                [
                    '@type' => 'City',
                    'name' => 'Coventry'
                ],
                [
                    '@type' => 'City',
                    'name' => 'Wolverhampton'
                ],
                [
                    '@type' => 'City',
                    'name' => 'Dudley'
                ],
                [
                    '@type' => 'City',
                    'name' => 'Solihull'
                ]
            ],
            'audience' => [
                '@type' => 'Audience',
                'audienceType' => 'Care Providers, Healthcare Workers, Domiciliary Care Staff'
            ],
            'hasOfferCatalog' => [
                '@type' => 'OfferCatalog',
                'name' => 'Care Training Courses for the Midlands',
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
                            'name' => 'Diabetes Awareness & Insulin Administration',
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
            '@id' => home_url('/locations/midlands/#breadcrumb'),
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
                    'name' => 'Midlands Training',
                    'item' => home_url('/locations/midlands/')
                ]
            ]
        ],
        [
            '@type' => 'WebPage',
            '@id' => home_url('/locations/midlands/#webpage'),
            'url' => home_url('/locations/midlands/'),
            'name' => 'Health & Social Care Training in the Midlands | Birmingham & Coventry CQC Courses',
            'description' => 'CQC-compliant care training across the Midlands. On-site delivery to Birmingham, Coventry, Wolverhampton. Emergency first aid, medication, diabetes care.',
            'isPartOf' => [
                '@id' => home_url('/#website')
            ],
            'about' => [
                '@id' => home_url('/#organization')
            ],
            'breadcrumb' => [
                '@id' => home_url('/locations/midlands/#breadcrumb')
            ]
        ]
    ]
];

echo '<script type="application/ld+json">' . wp_json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) . '</script>';
?>

<?php get_footer(); ?>
