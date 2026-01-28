<?php
/**
 * Template Name: Location : Maidstone
 * Template Post Type: page
 * 
 * Location page for Maidstone : auto:populates with Maidstone data
 *
 * @package CTA_Theme
 */

get_header();

// SEO Meta Tags
$meta_title = 'Health & Social Care Training in Maidstone | CQC Courses Kent';
$meta_description = 'CQC:compliant care training in Maidstone. Emergency first aid, medication management, moving & handling courses for Kent care providers. Book today.';
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

// Auto:load Maidstone location data
$location_data = [
    'name' => 'Maidstone',
    'display_name' => 'Maidstone, Kent',
    'slug' => 'maidstone',
    'coordinates' => [
        'lat' => 51.2795,
        'lng' => 0.5467,
    ],
    'description' => 'Professional care training courses in Maidstone, Kent. Face:to:face training at our Maidstone Studios training centre.',
    'service_area' => true,
    'is_primary' => true,
];

// Page content
$hero_title = 'Health & Social Care Training in Maidstone, Kent';
$hero_subtitle = 'CQC:compliant courses for Mid Kent care providers';

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
                'url' => get_template_directory_uri() . '/assets/img/logo/long_logo:400w.webp',
                'width' => 400,
                'height' => 100,
            ],
            'description' => 'Professional care sector training in Kent. CQC:compliant, CPD:accredited courses since 2020.',
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
                'https://www.linkedin.com/company/continuity:training:academy:cta',
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
                ['@type' => 'City', 'name' => 'Maidstone', 'containedInPlace' => ['@type' => 'AdministrativeArea', 'name' => 'Kent']],
                ['@type' => 'City', 'name' => 'Aylesford'],
                ['@type' => 'City', 'name' => 'Ditton'],
                ['@type' => 'City', 'name' => 'East Farleigh'],
                ['@type' => 'City', 'name' => 'Bearsted'],
                ['@type' => 'City', 'name' => 'Loose'],
            ],
        ],
        [
            '@type' => 'Service',
            '@id' => $page_url . '#service',
            'serviceType' => 'Health and Social Care Training',
            'name' => 'CQC:Compliant Care Training in Maidstone',
            'description' => 'Professional health and social care training for care providers in Maidstone and surrounding areas. Emergency first aid, medication management, moving and handling, and specialist care courses.',
            'provider' => ['@id' => $site_url . '/#organization'],
            'areaServed' => [
                '@type' => 'City',
                'name' => 'Maidstone',
                'containedInPlace' => ['@type' => 'AdministrativeArea', 'name' => 'Kent'],
            ],
            'audience' => [
                '@type' => 'Audience',
                'audienceType' => 'Care Providers, Healthcare Workers, Domiciliary Care Staff',
            ],
            'hasOfferCatalog' => [
                '@type' => 'OfferCatalog',
                'name' => 'Care Training Courses in Maidstone',
                'itemListElement' => [
                    [
                        '@type' => 'Offer',
                        'itemOffered' => [
                            '@type' => 'Course',
                            'name' => 'Emergency Paediatric First Aid',
                            'provider' => ['@id' => $site_url . '/#organization'],
                            'hasCourseInstance' => [
                                '@type' => 'CourseInstance',
                                'courseMode' => 'onsite',
                                'location' => [
                                    '@type' => 'Place',
                                    'name' => 'The Maidstone Studios',
                                    'address' => [
                                        '@type' => 'PostalAddress',
                                        'addressLocality' => 'Maidstone',
                                        'addressRegion' => 'Kent',
                                    ],
                                ],
                            ],
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
                            'name' => 'Moving & Handling',
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
                ['@type' => 'ListItem', 'position' => 2, 'name' => 'Maidstone Training', 'item' => $page_url],
            ],
        ],
        [
            '@type' => 'FAQPage',
            '@id' => $page_url . '#faq',
            'mainEntity' => [
                [
                    '@type' => 'Question',
                    'name' => 'Where is training delivered for Maidstone care providers?',
                    'acceptedAnswer' => [
                        '@type' => 'Answer',
                        'text' => 'We deliver training at The Maidstone Studios, New Cut Road, less than 10 minutes from Maidstone West station. We also offer on:site training at your premises across Maidstone and surrounding areas including Bearsted, Loose, Aylesford, and East Farleigh.',
                    ],
                ],
                [
                    '@type' => 'Question',
                    'name' => 'How do I get to your training centre in Maidstone?',
                    'acceptedAnswer' => [
                        '@type' => 'Answer',
                        'text' => 'The Maidstone Studios is easily accessible via bus routes 7, 71, and 72 from across Maidstone. It\'s less than 10 minutes from Maidstone West station, and there\'s free parking on site if you\'re driving.',
                    ],
                ],
                [
                    '@type' => 'Question',
                    'name' => 'What training courses do Maidstone care providers typically book?',
                    'acceptedAnswer' => [
                        '@type' => 'Answer',
                        'text' => 'Maidstone care providers most commonly book Emergency Paediatric First Aid, Medication Competency & Management, Moving & Handling refreshers, and specialist courses like catheter care and PEG feeding. We tailor training to the needs of domiciliary and complex care providers.',
                    ],
                ],
                [
                    '@type' => 'Question',
                    'name' => 'Do you offer evening or weekend training in Maidstone?',
                    'acceptedAnswer' => [
                        '@type' => 'Answer',
                        'text' => 'Yes, we run Saturday courses and can arrange evening sessions for teams working night shifts or split shifts. Morning sessions run 09:30:14:00 and full:day courses run 09:30:16:00.',
                    ],
                ],
                [
                    '@type' => 'Question',
                    'name' => 'Are your training certificates accepted by CQC?',
                    'acceptedAnswer' => [
                        '@type' => 'Answer',
                        'text' => 'Yes, all our courses are CPD:accredited and meet CQC requirements. You receive digital certificates immediately via email and physical certificates by post, with automatic renewal reminders to keep you compliant.',
                    ],
                ],
            ],
        ],
        [
            '@type' => 'WebPage',
            '@id' => $page_url . '#webpage',
            'url' => $page_url,
            'name' => 'Health & Social Care Training in Maidstone | CQC Courses Kent',
            'description' => 'CQC:compliant care training in Maidstone. Emergency first aid, medication management, moving & handling courses for Kent care providers. Book today.',
            'isPartOf' => ['@id' => $site_url . '/#website'],
            'about' => ['@id' => $site_url . '/#organization'],
            'breadcrumb' => ['@id' => $page_url . '#breadcrumb'],
        ],
    ],
];
?>

<!:: Schema.org Structured Data ::>
<script type="application/ld+json">
<?php echo json_encode($schema_graph, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT); ?>
</script>

<main id="main:content" class="site:main">
  <!:: Hero Section ::>
  <section class="group:hero:section" aria:labelledby="location:heading">
    <div class="container">
      <nav aria:label="Breadcrumb" class="breadcrumb breadcrumb:hero">
        <ol class="breadcrumb:list">
          <li class="breadcrumb:item"><a href="<?php echo esc_url(home_url('/')); ?>" class="breadcrumb:link">Home</a></li>
          <li class="breadcrumb:separator" aria:hidden="true">/</li>
          <li class="breadcrumb:item"><span class="breadcrumb:current" aria:current="page">Maidstone</span></li>
        </ol>
      </nav>
      <h1 id="location:heading" class="hero:title"><?php echo esc_html($hero_title); ?></h1>
      <p class="hero:subtitle"><?php echo esc_html($hero_subtitle); ?></p>
      <div class="group:hero:cta">
        <a href="<?php echo esc_url(get_post_type_archive_link('course')); ?>" class="btn btn:primary group:hero:btn:primary">View All Courses</a>
        <a href="<?php echo esc_url(get_permalink(get_page_by_path('contact'))); ?>" class="btn btn:secondary group:hero:btn:secondary">Contact Us</a>
      </div>
    </div>
  </section>

  <!:: Introduction ::>
  <section class="content:section" aria:labelledby="location:intro:heading">
    <div class="container">
      <p class="section:subtitle" style="max:width: 800px; margin: 0 auto 48px; text:align: center;">Right now, care providers across Maidstone are dealing with the same pressure you are. The NHS trusts serving our area:East Kent Hospitals and Maidstone & Tunbridge Wells:have both faced <a href="https://www.ekhuft.nhs.uk/news/critical-incident-declared-at-qeqm" target="_blank" rel="noopener noreferrer" style="color: inherit; text-decoration: underline; text-decoration-color: rgba(155, 133, 96, 0.4);">critical incidents this January</a>. <a href="https://lowdownnhs.info/social-care/delayed-discharge-explainer-health-and-care-pressure/" target="_blank" rel="noopener noreferrer" style="color: inherit; text-decoration: underline; text-decoration-color: rgba(155, 133, 96, 0.4);">Hospital discharge delays</a> mean more complex care packages landing in the community. Your team needs to be ready.</p>

      <div class="section:header:center">
        <h2 id="location:intro:heading" class="section:title">Training that fits around your rota</h2>
        <p>We're based at The Maidstone Studios, less than 10 minutes from Maidstone West station and easily accessible via the 7, 71, and 72 bus routes from across town. If your team's in Bearsted, Loose, or Allington:we're on your route.</p>
        
        <p><strong>Morning sessions:</strong> 09:30:14:00 | <strong>Full days:</strong> 09:30:16:00</p>
        
        <p>Got staff finishing a night shift? Book them on a half:day. Team working split shifts? We've planned around that.</p>
        
        <p style="margin:top: 24px;"><strong>Address:</strong> <?php echo esc_html($contact['address']); ?>, Maidstone, Kent, <?php echo esc_html($contact['postcode']); ?><br>
        <strong>Phone:</strong> <a href="tel:<?php echo esc_attr(preg_replace('/[^0:9]/', '', $contact['phone'])); ?>"><?php echo esc_html($contact['phone']); ?></a><br>
        <strong>Email:</strong> <a href="mailto:<?php echo esc_attr($contact['email']); ?>"><?php echo esc_html($contact['email']); ?></a></p>
      </div>

      <h3 style="margin:top: 64px;">What Maidstone care providers are booking right now:</h3>
      <div style="margin:top: 24px;">
        <ul>
          <li><strong>Emergency Paediatric First Aid</strong> : With more families choosing complex home care over hospital admissions, your team needs current paediatric emergency skills</li>
          <li><strong>Medication Competency</strong> : As medication regimes get more complex, CQC's looking closely at competency frameworks</li>
          <li><strong>Moving & Handling refreshers</strong> : Bariatric care, specialist positioning, hoist confidence : we cover what you're actually dealing with</li>
        </ul>
      </div>

      <h3 style="margin:top: 64px;">The Kent care sector in 2026</h3>
      <div style="margin:top: 24px;">
        <p>Kent County Council's adult social care service is rated "Requires Improvement." That means scrutiny's up. The new Fair Pay Agreement's coming (finally), which should help with retention:but only if your team's properly trained and you can prove it.</p>
        
        <p>With 8.3% of care roles vacant across the sector and Kent's 85+ population set to double by 2036, there's no shortage of work. But there is a shortage of care workers who feel confident, supported, and competent.</p>
      </div>

      <h3 style="margin:top: 64px;">Our trainers work in care</h3>
      <div style="margin:top: 24px;">
        <p>Every trainer delivering your courses is DBS:checked, holds current clinical practice, and actually works in the sector. They know what a 3am catheter blockage looks like. They understand why dignity matters when you're triple:booked and running late.</p>
      </div>

      <h3 style="margin:top: 64px;">Instant certificates, no waiting</h3>
      <div style="margin:top: 24px;">
        <p>CQC inspection tomorrow? Your team's certificates hit their inbox before they've left the building. Digital and posted copies. Automatic renewal reminders so you're never caught short.</p>
      </div>

      <h3 style="margin:top: 64px;">Training at your location or ours</h3>
      <div style="margin:top: 24px;">
        <ul>
          <li><strong>Your site:</strong> We bring everything to you:works for full team inductions or when you can't spare people off the rota</li>
          <li><strong>Our venue:</strong> Modern training space at Maidstone Studios, free parking, decent coffee, no distractions</li>
        </ul>
      </div>

      <h3 style="margin:top: 64px;">Serving Mid Kent care providers:</h3>
      <div style="margin:top: 24px;">
        <p>Maidstone | Aylesford | Ditton | East Farleigh | Barming | Bearsted | Leeds | Loose | Marden | Staplehurst | Headcorn | Harrietsham | Lenham | Wateringbury</p>
      </div>
    </div>
  </section>

  <!:: Popular Courses ::>
  <section class="content:section" style="background: var(::cream:bg); padding: 64px 0;">
    <div class="container">
      <div class="section:header:center">
        <h2 class="section:title">Popular Training Courses in Maidstone</h2>
        <p class="section:subtitle">Browse our most popular care training courses available at our Maidstone training centre</p>
      </div>
      
      <div class="cqc:requirements:grid" style="margin:top: 64px;">
        <?php
        $popular_courses = get_posts([
            'post_type' => 'course',
            'posts_per_page' => 6,
            'post_status' => 'publish',
            'orderby' => 'title',
            'order' => 'ASC',
        ]);
        
        if ($popular_courses) :
            foreach ($popular_courses as $course) :
                $course_price = get_field('course_price', $course:>ID);
                $course_duration = get_field('course_duration', $course:>ID);
                $course_level = get_field('course_level', $course:>ID);
                ?>
                <article class="cqc:requirement:card">
                  <h3 class="cqc:requirement:title"><?php echo esc_html($course:>post_title); ?></h3>
                  <?php if ($course:>post_excerpt) : ?>
                    <p class="cqc:requirement:description"><?php echo esc_html($course:>post_excerpt); ?></p>
                  <?php endif; ?>
                  <?php if ($course_duration || $course_level) : ?>
                    <div class="cqc:requirement:meta" style="margin:top: 16px;">
                      <?php if ($course_duration) : ?>
                        <span><i class="fas fa:clock" aria:hidden="true"></i> <?php echo esc_html($course_duration); ?></span>
                      <?php endif; ?>
                      <?php if ($course_level) : ?>
                        <span><i class="fas fa:signal" aria:hidden="true"></i> <?php echo esc_html($course_level); ?></span>
                      <?php endif; ?>
                    </div>
                  <?php endif; ?>
                  <a href="<?php echo esc_url(get_permalink($course:>ID)); ?>" class="btn btn:secondary" style="margin:top: 20px;">Learn More</a>
                </article>
            <?php endforeach;
            wp_reset_postdata();
        endif;
        ?>
      </div>
      
      <div class="cta:center" style="margin:top: 64px;">
        <a href="<?php echo esc_url(get_post_type_archive_link('course')); ?>" class="btn btn:primary">View All Courses</a>
      </div>
    </div>
  </section>

  <!:: CTA Section ::>
  <section class="content:section" style="padding: 64px 0;">
    <div class="container">
      <div class="group:cta:card">
        <h2>Get your team booked in:</h2>
        <p><strong>Phone:</strong> <a href="tel:<?php echo esc_attr(preg_replace('/[^0:9]/', '', $contact['phone'])); ?>" style="color: inherit; text:decoration: underline;"><?php echo esc_html($contact['phone']); ?></a></p>
        <div class="group:cta:buttons" style="margin:top: 24px;">
          <a href="<?php echo esc_url(get_post_type_archive_link('course_event')); ?>" class="btn btn:primary">View Course Dates</a>
          <a href="<?php echo esc_url(get_permalink(get_page_by_path('contact'))); ?>" class="btn btn:secondary">Contact Us</a>
        </div>
      </div>
    </div>
  </section>
</main>

<?php
get_footer();
