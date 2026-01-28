<?php
/**
 * Template Name: Location - Lancashire & South Cumbria
 * 
 * Location page for Lancashire & South Cumbria
 *
 * @package CTA_Theme
 */

get_header();

$meta_title = "Health & Social Care Training Lancashire & South Cumbria | CQC Courses";
$meta_description = "CQC-compliant care training across Lancashire & South Cumbria. On-site delivery to Preston, Lancaster, Barrow, Carlisle. Emergency first aid, medication, Care Certificate.";
cta_output_seo_meta_tags($meta_title, $meta_description);

$contact = cta_get_contact_info();
?>

<main id="main-content" class="site-main">
  <!-- Hero Section -->
  <section class="group-hero-section" aria-labelledby="lancashire-heading">
    <div class="container">
      <nav aria-label="Breadcrumb" class="breadcrumb breadcrumb-hero">
        <ol class="breadcrumb-list">
          <li class="breadcrumb-item"><a href="<?php echo esc_url(home_url('/')); ?>" class="breadcrumb-link">Home</a></li>
          <li class="breadcrumb-separator" aria-hidden="true">/</li>
          <li class="breadcrumb-item"><a href="<?php echo esc_url(home_url('/locations/')); ?>" class="breadcrumb-link">Locations</a></li>
          <li class="breadcrumb-separator" aria-hidden="true">/</li>
          <li class="breadcrumb-item"><span class="breadcrumb-current" aria-current="page">Lancashire & South Cumbria</span></li>
        </ol>
      </nav>
      <h1 id="lancashire-heading" class="hero-title">Health & Social Care Training for Lancashire & South Cumbria</h1>
      <p class="hero-subtitle">CQC-compliant courses for one of the most pressured regions in England</p>
    </div>
  </section>

  <!-- Intro Section -->
  <section class="content-section">
    <div class="container">
      <div class="section-header-center">
        <p class="section-eyebrow">Lancashire & South Cumbria</p>
        <h2 class="section-title">Most Financially Challenged System in England</h2>
        <p class="section-description">Lancashire and South Cumbria is <a href="https://cumberland.moderngov.co.uk/documents/s25682/Lancashire%20and%20South%20Cumbria%20ICB%20Update.pdf" target="_blank" rel="noopener noreferrer" style="color: inherit; text-decoration: underline; text-decoration-color: rgba(155, 133, 96, 0.4);">one of the most financially challenged systems in the NHS</a>. Without support funding, the system deficit would have been approximately <a href="https://www.lancashireandsouthcumbria.icb.nhs.uk/about-us/publications/strategies-and-plans/commissioning-intentions-2025-26" target="_blank" rel="noopener noreferrer" style="color: inherit; text-decoration: underline; text-decoration-color: rgba(155, 133, 96, 0.4);">£350 million</a>. The ICB's been told to cut running costs by 47%.</p>
        <p class="section-description">That's not just an NHS problem. It affects every commissioning decision, every contract scrutiny, every compliance check your organisation faces. When budgets are this tight, commissioners look harder at who they're paying. Your training credentials become your competitive advantage.</p>
      </div>
    </div>
  </section>

  <!-- Popular Courses Section -->
  <section class="why-us-blended">
    <div class="container">
      <div class="section-header-center">
        <p class="section-eyebrow">Most Booked</p>
        <h2 class="section-title">What Lancashire & South Cumbria Providers Are Booking</h2>
      </div>
      
      <div class="why-us-blended-grid">
        <div class="why-us-blended-card">
          <div class="why-us-blended-card-header">
            <div class="why-us-blended-icon-wrapper why-us-blended-icon-1">
              <i class="fas fa-certificate" aria-hidden="true"></i>
            </div>
          </div>
          <h3 class="why-us-blended-title">Care Certificate</h3>
          <p class="why-us-blended-description">New starters need this within 12 weeks. With retention crisis acute here, training new staff properly determines whether they stay or leave.</p>
        </div>

        <div class="why-us-blended-card">
          <div class="why-us-blended-card-header">
            <div class="why-us-blended-icon-wrapper why-us-blended-icon-2">
              <i class="fas fa-first-aid" aria-hidden="true"></i>
            </div>
          </div>
          <h3 class="why-us-blended-title">Emergency First Aid at Work</h3>
          <p class="why-us-blended-description">Hospital discharge from North Cumbria, Lancashire Teaching Hospitals, Furness General. Your team needs current emergency skills for what's coming home.</p>
        </div>

        <div class="why-us-blended-card">
          <div class="why-us-blended-card-header">
            <div class="why-us-blended-icon-wrapper why-us-blended-icon-3">
              <i class="fas fa-pills" aria-hidden="true"></i>
            </div>
          </div>
          <h3 class="why-us-blended-title">Medication Competency & Management</h3>
          <p class="why-us-blended-description">Complex polypharmacy cases arriving from hospital. Your team needs competency frameworks, not just awareness.</p>
        </div>

        <div class="why-us-blended-card">
          <div class="why-us-blended-card-header">
            <div class="why-us-blended-icon-wrapper why-us-blended-icon-1">
              <i class="fas fa-hands" aria-hidden="true"></i>
            </div>
          </div>
          <h3 class="why-us-blended-title">Moving & Handling</h3>
          <p class="why-us-blended-description">Rural care means longer gaps between visits. Your team needs confidence and competency for isolated situations.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Benefits Section -->
  <section class="group-benefits-section">
    <div class="container">
      <div class="section-header-center">
        <p class="section-eyebrow">Why Choose Us</p>
        <h2 class="section-title">Training as Competitive Advantage</h2>
      </div>

      <div class="group-benefits-grid">
        <div class="group-benefit-card">
          <div class="group-benefit-icon">
            <i class="fas fa-map-marker-alt" aria-hidden="true"></i>
          </div>
          <h3 class="group-benefit-title">We Come to You</h3>
          <p class="group-benefit-description">On-site delivery across Preston, Blackburn, Burnley, Lancaster, Barrow-in-Furness, Penrith, Kendal, Carlisle, and rural areas. Saturdays available—we'll find a date that works around your rota.</p>
        </div>

        <div class="group-benefit-card">
          <div class="group-benefit-icon">
            <i class="fas fa-user-check" aria-hidden="true"></i>
          </div>
          <h3 class="group-benefit-title">Experienced Trainers</h3>
          <p class="group-benefit-description">Working in acute and community care. They've worked with rural care teams. They understand isolated responsibility and pressure. They know what "medically fit for discharge" really means.</p>
        </div>

        <div class="group-benefit-card">
          <div class="group-benefit-icon">
            <i class="fas fa-certificate" aria-hidden="true"></i>
          </div>
          <h3 class="group-benefit-title">Instant Certificates</h3>
          <p class="group-benefit-description">Certificates hit your team's inbox immediately. Digital copies for audit compliance. Physical copies posted same day. All courses CPD-accredited and CQC-compliant.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Context Section -->
  <section class="content-section bg-light-cream">
    <div class="container">
      <div class="section-header-center">
        <h2 class="section-title">Lancashire & South Cumbria's Care Reality in 2026</h2>
        <p class="section-description">This is <a href="https://cumberland.moderngov.co.uk/documents/s25682/Lancashire%20and%20South%20Cumbria%20ICB%20Update.pdf" target="_blank" rel="noopener noreferrer" style="color: inherit; text-decoration: underline; text-decoration-color: rgba(155, 133, 96, 0.4);">the most financially challenged healthcare system in England</a>. The ICB must take "immediate action to reduce spending". That pressure flows downstream to every care provider in the region.</p>
        <p class="section-description">When commissioners are asking "Can we trust this provider?"—your answer needs to be: trained team (certificates prove it), competency frameworks (documented), compliance-ready (CQC audit proof).</p>
        <p class="section-description">Hospital discharge is acute here too. Lancashire Teaching Hospitals, North Cumbria, Furness General—all pushing discharge. Rural care adds another layer: your team's often working in isolated properties, an hour from the nearest A&E, with long gaps between calls. They need to handle problems there and then, or know when to escalate fast.</p>
        <p class="section-description">The <a href="https://carecubed.org/2025-care-worker-500-million-fair-pay-announcement/" target="_blank" rel="noopener noreferrer" style="color: inherit; text-decoration: underline; text-decoration-color: rgba(155, 133, 96, 0.4);">Fair Pay Agreement's coming</a>. Wages will rise. But only providers with trained, competent, supported teams will keep experienced staff. Training isn't a nice-to-have here—it's how you survive the budget crisis.</p>
      </div>
    </div>
  </section>

  <!-- CTA Section -->
  <section class="about-cta-new">
    <div class="container">
      <div class="about-cta-content-new">
        <h2>Book Training for Your Lancashire & South Cumbria Care Team</h2>
        <p>Serving Preston, Blackburn, Lancaster, Burnley, Barrow-in-Furness, and care providers across Lancashire & South Cumbria.</p>
        <div class="about-cta-buttons-new">
          <a href="<?php echo esc_url(home_url('/contact')); ?>" class="btn btn-primary">Get in Touch</a>
          <a href="tel:<?php echo esc_attr($contact['phone_link']); ?>" class="btn btn-secondary">Call <?php echo esc_html($contact['phone']); ?></a>
        </div>
      </div>
    </div>
  </section>

  <div class="container">
    <section class="content-section">
        <h2>Competitive advantage: training as commissioning proof</h2>
        <p>When commissioners are scrutinising every contract, your training documentation proves quality:</p>
        <ul>
            <li>Trained team (certificates prove it)</li>
            <li>Competency frameworks (documented)</li>
            <li>Compliance-ready (CQC audit proof)</li>
            <li>Retention investment (Fair Pay Agreement ready)</li>
        </ul>
        <p>Training becomes your market advantage in a budget-crisis region.</p>
    </section>

    <section class="content-section">
        <h2>We come to you (that's why most here book us)</h2>
        
        <div class="delivery-options-grid">
            <div class="delivery-option-card">
                <h3>On-site anywhere in Lancashire & South Cumbria</h3>
                <p>Preston, Blackburn, Lancaster, Burnley, Barrow-in-Furness, Penrith, Carlisle, rural areas. All equipment provided.</p>
            </div>

            <div class="delivery-option-card">
                <h3>Maidstone Studios</h3>
                <p>Available if centre-based works for you.</p>
            </div>
        </div>
    </section>

    <section class="content-section">
        <h2>Serving Lancashire & South Cumbria care providers</h2>
        <p>Preston | Blackburn | Burnley | Accrington | Lancaster | Morecambe | Barrow-in-Furness | Kendal | Penrith | Carlisle | Chorley | Leyland | Skelmersdale | Clitheroe | Longridge | Garstang | Fleetwood | Lytham St Annes</p>
    </section>

    <!-- Final CTA -->
    <section class="content-section cta-section">
        <div class="cta-buttons">
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
                    'name' => 'Preston',
                    'containedInPlace' => [
                        '@type' => 'AdministrativeArea',
                        'name' => 'Lancashire'
                    ]
                ],
                [
                    '@type' => 'City',
                    'name' => 'Blackburn'
                ],
                [
                    '@type' => 'City',
                    'name' => 'Lancaster'
                ],
                [
                    '@type' => 'City',
                    'name' => 'Barrow-in-Furness'
                ],
                [
                    '@type' => 'City',
                    'name' => 'Carlisle'
                ]
            ]
        ],
        [
            '@type' => 'Service',
            '@id' => home_url('/locations/lancashire/#service'),
            'serviceType' => 'Health and Social Care Training',
            'name' => 'CQC-Compliant Care Training for Lancashire & South Cumbria',
            'description' => 'Professional health and social care training for care providers across Lancashire and South Cumbria. On-site delivery. Care Certificate, emergency first aid, medication management, and moving & handling courses.',
            'provider' => [
                '@id' => home_url('/#organization')
            ],
            'areaServed' => [
                [
                    '@type' => 'City',
                    'name' => 'Preston'
                ],
                [
                    '@type' => 'City',
                    'name' => 'Blackburn'
                ],
                [
                    '@type' => 'City',
                    'name' => 'Lancaster'
                ],
                [
                    '@type' => 'City',
                    'name' => 'Barrow-in-Furness'
                ],
                [
                    '@type' => 'City',
                    'name' => 'Carlisle'
                ]
            ],
            'audience' => [
                '@type' => 'Audience',
                'audienceType' => 'Care Providers, Healthcare Workers, Domiciliary Care Staff, Rural Care Teams'
            ],
            'hasOfferCatalog' => [
                '@type' => 'OfferCatalog',
                'name' => 'Care Training Courses for Lancashire & South Cumbria',
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
                    ]
                ]
            ]
        ],
        [
            '@type' => 'BreadcrumbList',
            '@id' => home_url('/locations/lancashire/#breadcrumb'),
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
                    'name' => 'Lancashire & South Cumbria Training',
                    'item' => home_url('/locations/lancashire/')
                ]
            ]
        ],
        [
            '@type' => 'WebPage',
            '@id' => home_url('/locations/lancashire/#webpage'),
            'url' => home_url('/locations/lancashire/'),
            'name' => 'Health & Social Care Training Lancashire & South Cumbria | CQC Courses',
            'description' => 'CQC-compliant care training across Lancashire & South Cumbria. On-site delivery to Preston, Lancaster, Barrow, Carlisle. Emergency first aid, medication, Care Certificate.',
            'isPartOf' => [
                '@id' => home_url('/#website')
            ],
            'about' => [
                '@id' => home_url('/#organization')
            ],
            'breadcrumb' => [
                '@id' => home_url('/locations/lancashire/#breadcrumb')
            ]
        ]
    ]
];

echo '<script type="application/ld+json">' . wp_json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) . '</script>';
?>

<?php get_footer(); ?>
