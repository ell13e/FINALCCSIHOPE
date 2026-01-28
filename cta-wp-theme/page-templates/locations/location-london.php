
<?php
/**
 * Template Name: Location - London
 * 
 * Location page for London & Greater London
 *
 * @package CTA_Theme
 */

get_header();

$meta_title = "Health & Social Care Training in London | CQC Compliant Courses";
$meta_description = "CQC-compliant care training across London. On-site delivery to all 32 boroughs or at our Kent centre. Medication, safeguarding, end of life care for London providers.";
cta_output_seo_meta_tags($meta_title, $meta_description);

$contact = cta_get_contact_info();
?>

<main id="main-content" class="site-main">
  <!-- Hero Section -->
  <section class="group-hero-section" aria-labelledby="london-heading">
    <div class="container">
      <nav aria-label="Breadcrumb" class="breadcrumb breadcrumb-hero">
        <ol class="breadcrumb-list">
          <li class="breadcrumb-item"><a href="<?php echo esc_url(home_url('/')); ?>" class="breadcrumb-link">Home</a></li>
          <li class="breadcrumb-separator" aria-hidden="true">/</li>
          <li class="breadcrumb-item"><a href="<?php echo esc_url(home_url('/locations/')); ?>" class="breadcrumb-link">Locations</a></li>
          <li class="breadcrumb-separator" aria-hidden="true">/</li>
          <li class="breadcrumb-item"><span class="breadcrumb-current" aria-current="page">London</span></li>
        </ol>
      </nav>
      <h1 id="london-heading" class="hero-title">Health & Social Care Training in London</h1>
      <p class="hero-subtitle">CQC-compliant courses for London care providers</p>
    </div>
  </section>

  <!-- Intro Section -->
  <section class="content-section">
    <div class="container">
      <div class="section-header-center">
        <p class="section-eyebrow">London</p>
        <h2 class="section-title">Highest Concentration. Heaviest Scrutiny.</h2>
        <p class="section-description">London has the highest concentration of care homes in the UK. It also has the heaviest <a href="https://www.cqc.org.uk/about-us/fundamental-standards" target="_blank" rel="noopener noreferrer" style="color: inherit; text-decoration: underline; text-decoration-color: rgba(155, 133, 96, 0.4);">CQC scrutiny</a>. NHS discharge delays are costing the system millions—<a href="https://lowdownnhs.info/hospitals/patients-unable-to-leave-hospital-cost-the-nhs-2bn-a-year/" target="_blank" rel="noopener noreferrer" style="color: inherit; text-decoration: underline; text-decoration-color: rgba(155, 133, 96, 0.4);">£220m in a single month last year</a>. Trusts across London are running hot.</p>
        <p class="section-description">When discharge happens, it happens fast, and your team's managing what lands. That means sicker patients, more complex medication regimes, and families expecting higher standards than ever. Your compliance isn't optional. Your training credentials determine whether you win contracts or lose them.</p>
      </div>
    </div>
  </section>

  <!-- Popular Courses Section -->
  <section class="why-us-blended">
    <div class="container">
      <div class="section-header-center">
        <p class="section-eyebrow">Most Booked</p>
        <h2 class="section-title">What London Care Providers Are Booking</h2>
      </div>
      
      <div class="why-us-blended-grid">
        <div class="why-us-blended-card">
          <div class="why-us-blended-card-header">
            <div class="why-us-blended-icon-wrapper why-us-blended-icon-1">
              <i class="fas fa-pills" aria-hidden="true"></i>
            </div>
          </div>
          <h3 class="why-us-blended-title">Medication Competency & Management</h3>
          <p class="why-us-blended-description">Polypharmacy cases in London are complex. Multiple prescribers, medication interactions, high-risk regimes. <a href="https://www.cqc.org.uk/about-us/fundamental-standards" target="_blank" rel="noopener noreferrer" style="color: inherit; text-decoration: underline; text-decoration-color: rgba(155, 133, 96, 0.4);">CQC wants to see proper competency</a>—not just basic awareness.</p>
        </div>

        <div class="why-us-blended-card">
          <div class="why-us-blended-card-header">
            <div class="why-us-blended-icon-wrapper why-us-blended-icon-2">
              <i class="fas fa-shield-alt" aria-hidden="true"></i>
            </div>
          </div>
          <h3 class="why-us-blended-title">Safeguarding Adults</h3>
          <p class="why-us-blended-description">London's integrated care partnerships are tightening protocols. Private care families scrutinise safeguarding credentials closely.</p>
        </div>

        <div class="why-us-blended-card">
          <div class="why-us-blended-card-header">
            <div class="why-us-blended-icon-wrapper why-us-blended-icon-3">
              <i class="fas fa-heart" aria-hidden="true"></i>
            </div>
          </div>
          <h3 class="why-us-blended-title">End of Life Care</h3>
          <p class="why-us-blended-description">London's older population means palliative care is core business. Families funding private care expect dignity and expertise.</p>
        </div>

        <div class="why-us-blended-card">
          <div class="why-us-blended-card-header">
            <div class="why-us-blended-icon-wrapper why-us-blended-icon-1">
              <i class="fas fa-first-aid" aria-hidden="true"></i>
            </div>
          </div>
          <h3 class="why-us-blended-title">Emergency First Aid at Work</h3>
          <p class="why-us-blended-description">With multiple major trusts all under discharge pressure, your team needs current emergency skills.</p>
        </div>

        <div class="why-us-blended-card">
          <div class="why-us-blended-card-header">
            <div class="why-us-blended-icon-wrapper why-us-blended-icon-2">
              <i class="fas fa-certificate" aria-hidden="true"></i>
            </div>
          </div>
          <h3 class="why-us-blended-title">Care Certificate</h3>
          <p class="why-us-blended-description">New starters need this within 12 weeks. London's turnover is high. Get it done properly.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Benefits Section -->
  <section class="group-benefits-section">
    <div class="container">
      <div class="section-header-center">
        <p class="section-eyebrow">Why Choose Us</p>
        <h2 class="section-title">Training That Works for London Providers</h2>
      </div>

      <div class="group-benefits-grid">
        <div class="group-benefit-card">
          <div class="group-benefit-icon">
            <i class="fas fa-map-marker-alt" aria-hidden="true"></i>
          </div>
          <h3 class="group-benefit-title">We Come to You</h3>
          <p class="group-benefit-description">On-site delivery anywhere across Greater London—all 32 boroughs plus City of London. High Speed from St Pancras under 1 hour to Maidstone Studios if you prefer. Evening and weekend options available.</p>
        </div>

        <div class="group-benefit-card">
          <div class="group-benefit-icon">
            <i class="fas fa-user-check" aria-hidden="true"></i>
          </div>
          <h3 class="group-benefit-title">Experienced Trainers</h3>
          <p class="group-benefit-description">Working in acute and community settings. They know what a <a href="https://lowdownnhs.info/comment/backlog-maintenance-bills-are-dragging-down-our-nhs-new-figures-show/" target="_blank" rel="noopener noreferrer" style="color: inherit; text-decoration: underline; text-decoration-color: rgba(155, 133, 96, 0.4);">St Thomas'</a> discharge looks like. They understand the complexity of London care—the pace, the expectations, the pressure.</p>
        </div>

        <div class="group-benefit-card">
          <div class="group-benefit-icon">
            <i class="fas fa-certificate" aria-hidden="true"></i>
          </div>
          <h3 class="group-benefit-title">Instant Certificates</h3>
          <p class="group-benefit-description">Certificates hit your team's inbox immediately. Digital copies for instant audit compliance. Physical copies posted same day. CPD-accredited and meet CQC requirements.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Context Section -->
  <section class="content-section bg-light-cream">
    <div class="container">
      <div class="section-header-center">
        <h2 class="section-title">London's Care Reality in 2026</h2>
        <p class="section-description">Discharge delays nationally hit over 12,000 patients per day even when they're medically fit to leave. London trusts—<a href="https://lowdownnhs.info/comment/backlog-maintenance-bills-are-dragging-down-our-nhs-new-figures-show/" target="_blank" rel="noopener noreferrer" style="color: inherit; text-decoration: underline; text-decoration-color: rgba(155, 133, 96, 0.4);">Imperial, St Thomas', Barts</a>, King's College, Homerton, and others—are all feeling it.</p>
        <p class="section-description">When patients finally discharge, they're discharged with complexity. Your team's managing what hospitals used to keep. That requires higher-level skills, proper documentation, and the confidence to escalate when something's wrong.</p>
        <p class="section-description"><a href="https://www.cqc.org.uk/about-us/fundamental-standards" target="_blank" rel="noopener noreferrer" style="color: inherit; text-decoration: underline; text-decoration-color: rgba(155, 133, 96, 0.4);">CQC scrutiny is tightest in London</a>. Re-inspection timelines are accelerating. The new assessment framework rolling out through 2026 means more focus on workforce competency, not just policies on paper. Your training records matter.</p>
        <p class="section-description">Private care families in London fund significant packages. They expect—and check—training credentials. When you can show instant CQC-compliant certificates and proven trainer credentials, that matters to families choosing between providers.</p>
      </div>
    </div>
  </section>

  <!-- CTA Section -->
  <section class="about-cta-new">
    <div class="container">
      <div class="about-cta-content-new">
        <h2>Book Training for Your London Care Team</h2>
        <p>Serving all 32 London boroughs and care providers across Greater London.</p>
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
                    'name' => 'London',
                    'containedInPlace' => [
                        '@type' => 'AdministrativeArea',
                        'name' => 'Greater London'
                    ]
                ],
                [
                    '@type' => 'City',
                    'name' => 'Westminster'
                ],
                [
                    '@type' => 'City',
                    'name' => 'Camden'
                ],
                [
                    '@type' => 'City',
                    'name' => 'Islington'
                ],
                [
                    '@type' => 'City',
                    'name' => 'Hackney'
                ],
                [
                    '@type' => 'City',
                    'name' => 'Tower Hamlets'
                ],
                [
                    '@type' => 'City',
                    'name' => 'Southwark'
                ],
                [
                    '@type' => 'City',
                    'name' => 'Lambeth'
                ],
                [
                    '@type' => 'City',
                    'name' => 'Wandsworth'
                ],
                [
                    '@type' => 'City',
                    'name' => 'Croydon'
                ]
            ]
        ],
        [
            '@type' => 'Service',
            '@id' => home_url('/locations/london/#service'),
            'serviceType' => 'Health and Social Care Training',
            'name' => 'CQC-Compliant Care Training for London',
            'description' => 'Professional health and social care training for care providers across London. On-site delivery to all 32 boroughs. Medication management, safeguarding, end of life care, emergency first aid, and Care Certificate courses.',
            'provider' => [
                '@id' => home_url('/#organization')
            ],
            'areaServed' => [
                [
                    '@type' => 'City',
                    'name' => 'London'
                ],
                [
                    '@type' => 'City',
                    'name' => 'Westminster'
                ],
                [
                    '@type' => 'City',
                    'name' => 'Camden'
                ],
                [
                    '@type' => 'City',
                    'name' => 'Islington'
                ],
                [
                    '@type' => 'City',
                    'name' => 'Southwark'
                ],
                [
                    '@type' => 'City',
                    'name' => 'Croydon'
                ]
            ],
            'audience' => [
                '@type' => 'Audience',
                'audienceType' => 'Care Providers, Healthcare Workers, Domiciliary Care Staff, Care Home Staff, Private Care Providers'
            ],
            'hasOfferCatalog' => [
                '@type' => 'OfferCatalog',
                'name' => 'Care Training Courses for London',
                'itemListElement' => [
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
                            'name' => 'End of Life Care',
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
                            'name' => 'Care Certificate',
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
            '@id' => home_url('/locations/london/#breadcrumb'),
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
                    'name' => 'London Training',
                    'item' => home_url('/locations/london/')
                ]
            ]
        ],
        [
            '@type' => 'WebPage',
            '@id' => home_url('/locations/london/#webpage'),
            'url' => home_url('/locations/london/'),
            'name' => 'Health & Social Care Training in London | CQC Compliant Courses',
            'description' => 'CQC-compliant care training across London. On-site delivery to all 32 boroughs or at our Kent centre. Medication, safeguarding, end of life care for London providers.',
            'isPartOf' => [
                '@id' => home_url('/#website')
            ],
            'about' => [
                '@id' => home_url('/#organization')
            ],
            'breadcrumb' => [
                '@id' => home_url('/locations/london/#breadcrumb')
            ]
        ]
    ]
];

echo '<script type="application/ld+json">' . wp_json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) . '</script>';
?>

<?php get_footer(); ?>
