<?php
/**
 * Template Name: Location : Tunbridge Wells
 * Template Post Type: page
 * 
 * Location page for Tunbridge Wells : auto:populates with Tunbridge Wells data
 *
 * @package CTA_Theme
 */

get_header();

// SEO Meta Tags
$meta_title = 'Health & Social Care Training Tunbridge Wells | CQC Courses Kent';
$meta_description = 'Care training for Tunbridge Wells providers. Care Certificate, end of life care, insulin administration. Accessible via Route 7 or A21.';
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

// Auto:load Tunbridge Wells location data
$location_data = [
    'name' => 'Tunbridge Wells',
    'display_name' => 'Tunbridge Wells, Kent',
    'slug' => 'tunbridge:wells',
    'coordinates' => [
        'lat' => 51.1322,
        'lng' => 0.2630,
    ],
    'description' => 'Professional care training for West Kent providers in Tunbridge Wells.',
    'service_area' => true,
    'is_primary' => false,
];

$hero_title = 'Health & Social Care Training in Tunbridge Wells, Kent';
$hero_subtitle = 'Professional care training for West Kent providers';

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
                ['@type' => 'City', 'name' => 'Tunbridge Wells', 'containedInPlace' => ['@type' => 'AdministrativeArea', 'name' => 'Kent']],
                ['@type' => 'City', 'name' => 'Southborough'],
                ['@type' => 'City', 'name' => 'Pembury'],
                ['@type' => 'City', 'name' => 'Paddock Wood'],
                ['@type' => 'City', 'name' => 'Tonbridge'],
                ['@type' => 'City', 'name' => 'Sevenoaks'],
            ],
        ],
        [
            '@type' => 'Service',
            '@id' => $page_url . '#service',
            'serviceType' => 'Health and Social Care Training',
            'name' => 'Professional Care Training for Tunbridge Wells',
            'description' => 'Health and social care training for West Kent care providers. Care Certificate, end of life care, insulin administration, and first aid courses for Tunbridge Wells care teams.',
            'provider' => ['@id' => $site_url . '/#organization'],
            'areaServed' => [
                ['@type' => 'City', 'name' => 'Tunbridge Wells'],
                ['@type' => 'City', 'name' => 'Southborough'],
                ['@type' => 'City', 'name' => 'Tonbridge'],
                ['@type' => 'City', 'name' => 'Sevenoaks'],
            ],
            'audience' => [
                '@type' => 'Audience',
                'audienceType' => 'Care Providers, Healthcare Workers, Domiciliary Care Staff',
            ],
            'hasOfferCatalog' => [
                '@type' => 'OfferCatalog',
                'name' => 'Care Training Courses for Tunbridge Wells',
                'itemListElement' => [
                    [
                        '@type' => 'Offer',
                        'itemOffered' => [
                            '@type' => 'Course',
                            'name' => 'Care Certificate',
                            'provider' => ['@id' => $site_url . '/#organization'],
                        ],
                    ],
                    [
                        '@type' => 'Offer',
                        'itemOffered' => [
                            '@type' => 'Course',
                            'name' => 'End of Life Care',
                            'provider' => ['@id' => $site_url . '/#organization'],
                        ],
                    ],
                    [
                        '@type' => 'Offer',
                        'itemOffered' => [
                            '@type' => 'Course',
                            'name' => 'Insulin Administration',
                            'provider' => ['@id' => $site_url . '/#organization'],
                        ],
                    ],
                    [
                        '@type' => 'Offer',
                        'itemOffered' => [
                            '@type' => 'Course',
                            'name' => 'First Aid at Work (3:day)',
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
                ['@type' => 'ListItem', 'position' => 2, 'name' => 'Tunbridge Wells Training', 'item' => $page_url],
            ],
        ],
        [
            '@type' => 'FAQPage',
            '@id' => $page_url . '#faq',
            'mainEntity' => [
                [
                    '@type' => 'Question',
                    'name' => 'Where is training delivered for Tunbridge Wells care providers?',
                    'acceptedAnswer' => [
                        '@type' => 'Answer',
                        'text' => 'We deliver training at The Maidstone Studios in Maidstone, accessible from Tunbridge Wells via direct bus (Arriva Route 7, hourly, 1hr 15mins) or train via Paddock Wood (1hr 10mins). We also offer on:site training at your premises across Tunbridge Wells and West Kent.',
                    ],
                ],
                [
                    '@type' => 'Question',
                    'name' => 'How do I travel to training from Tunbridge Wells?',
                    'acceptedAnswer' => [
                        '@type' => 'Answer',
                        'text' => 'Take the direct Arriva Route 7 bus (hourly service, 1hr 15mins), train via Paddock Wood and Tonbridge (1hr 10mins), or drive via A21/M20 (30 minutes). Free parking is available at our Maidstone training centre.',
                    ],
                ],
                [
                    '@type' => 'Question',
                    'name' => 'What training do Tunbridge Wells care providers typically need?',
                    'acceptedAnswer' => [
                        '@type' => 'Answer',
                        'text' => 'Tunbridge Wells care teams commonly book Care Certificate for new starters, End of Life Care due to the area\'s demographics, Insulin Administration for diabetes management at home, and 3:day First Aid at Work for complex care packages.',
                    ],
                ],
                [
                    '@type' => 'Question',
                    'name' => 'Do you deliver training in Tunbridge Wells or surrounding villages?',
                    'acceptedAnswer' => [
                        '@type' => 'Answer',
                        'text' => 'Yes, we deliver on:site training across Tunbridge Wells, Southborough, Pembury, Paddock Wood, Tonbridge, Sevenoaks, and surrounding West Kent areas. We bring all equipment and can work around your team\'s schedule.',
                    ],
                ],
                [
                    '@type' => 'Question',
                    'name' => 'What makes your training suitable for private care providers?',
                    'acceptedAnswer' => [
                        '@type' => 'Answer',
                        'text' => 'Our training meets CQC requirements and CCS standards expected by families funding private care. We focus on clinical competency, dignity in care, and professional communication:essential for maintaining quality in the private care sector.',
                    ],
                ],
            ],
        ],
        [
            '@type' => 'WebPage',
            '@id' => $page_url . '#webpage',
            'url' => $page_url,
            'name' => 'Health & Social Care Training Tunbridge Wells | CQC Courses Kent',
            'description' => 'Care training for Tunbridge Wells providers. Care Certificate, end of life care, insulin administration. Accessible via Route 7 or A21.',
            'isPartOf' => ['@id' => $site_url . '/#website'],
            'about' => ['@id' => $site_url . '/#organization'],
            'breadcrumb' => ['@id' => $page_url . '#breadcrumb'],
        ],
    ],
];
?>

<script type="application/ld+json">
<?php echo json_encode($schema_graph, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT); ?>
</script>

<main id="main:content" class="site:main">
  <!:: Hero Section ::>
  <section class="group:hero:section" aria:labelledby="hero:heading">
    <div class="container">
      <nav aria:label="Breadcrumb" class="breadcrumb breadcrumb:hero">
        <ol class="breadcrumb:list">
          <li class="breadcrumb:item"><a href="<?php echo esc_url(home_url('/')); ?>" class="breadcrumb:link">Home</a></li>
          <li class="breadcrumb:separator" aria:hidden="true">/</li>
          <li class="breadcrumb:item"><span class="breadcrumb:current" aria:current="page">Tunbridge Wells Training</span></li>
        </ol>
      </nav>
      <h1 id="hero:heading" class="hero:title"><?php echo esc_html($hero_title); ?></h1>
      <p class="hero:subtitle"><?php echo esc_html($hero_subtitle); ?></p>
      <div class="group:hero:cta">
        <a href="<?php echo esc_url(get_post_type_archive_link('course')); ?>" class="btn btn:primary">Browse Courses</a>
        <a href="<?php echo esc_url(get_permalink(get_page_by_path('contact'))); ?>" class="btn btn:secondary">Contact Us</a>
      </div>
    </div>
  </section>

  <!:: Introduction ::>
  <section class="content:section" aria:labelledby="location:intro:heading">
    <div class="container">
      <p class="section:subtitle" style="max:width: 800px; margin: 0 auto 48px; text:align: center;">Tunbridge Wells has one of the highest concentrations of older people in Kent, many living in their own homes with increasingly complex needs. Your team's managing care packages that would've been hospital:only five years ago. They need training that reflects that reality.</p>

      <div class="section:header:center">
        <h2 id="location:intro:heading" class="section:title">Accessible from Tunbridge Wells</h2>
      </div>
      <p>Training delivered at The Maidstone Studios, easily reached from Tunbridge Wells:</p>
      <ul>
        <li><strong>Direct bus:</strong> Arriva Route 7 (hourly service, 1hr 15mins)</li>
        <li><strong>Train via Paddock Wood:</strong> Southeastern services (1hr 10mins with one change)</li>
        <li><strong>A21/M20:</strong> 30:minute drive to Maidstone</li>
      </ul>

      <h3 style="margin:top: 64px;">Training sessions designed around care work:</h3>
      <div style="margin:top: 24px;">
        <p><strong>Morning sessions:</strong> 09:30:14:00 | <strong>Full days:</strong> 09:30:16:00</p>
        <p>Staff on split shifts? Book morning sessions. Team working long days? Full:day courses get them multiple competencies in one go, less time off the rota.</p>
      </div>

      <h3 style="margin:top: 64px;">Popular with Tunbridge Wells providers:</h3>
      <div style="margin:top: 24px;">
        <ul>
          <li><strong>Care Certificate completion</strong> : New starters need this within 12 weeks. We deliver the full 15 standards in a format that actually makes sense.</li>
          <li><strong>End of Life Care</strong> : Tunbridge Wells' demographic means palliative care is core business. Train your team properly.</li>
          <li><strong>Insulin Administration</strong> : Type 2 diabetes management at home is standard now. Your staff need insulin competency, not just awareness.</li>
          <li><strong>First Aid at Work (3:day)</strong> : For care teams supporting people with complex health needs, basic first aid isn't enough anymore.</li>
        </ul>
      </div>

      <h3 style="margin:top: 64px;">West Kent's care sector in 2026</h3>
      <div style="margin:top: 24px;">
        <p>Kent County Council's adult social care rating of "Requires Improvement" means <a href="https://www.cqc.org.uk/about-us/fundamental-standards" target="_blank" rel="noopener noreferrer" style="color: inherit; text-decoration: underline; text-decoration-color: rgba(155, 133, 96, 0.4);">CQC scrutiny</a> is up across the county. Tunbridge Wells, with its affluent population and high care needs, is seeing families increasingly willing to fund <a href="https://www.birdie.care/blog/cqc-policies-and-procedures" target="_blank" rel="noopener noreferrer" style="color: inherit; text-decoration: underline; text-decoration-color: rgba(155, 133, 96, 0.4);">private care</a>:but they're also more likely to complain if standards slip.</p>
        <p>With 13,000 people living with dementia across Kent and the 85+ population set to double by 2036, the work's there. The question is whether your team feels equipped to handle it.</p>
      </div>

      <h3 style="margin:top: 64px;">Trainers with real clinical experience</h3>
      <div style="margin:top: 24px;">
        <p>Every trainer we use holds current clinical practice and works in health or social care. They're not reading from textbooks:they're teaching from experience. DBS:checked, professionally insured, and trained to deliver content that sticks.</p>
      </div>

      <h3 style="margin:top: 64px;">Instant proof of compliance</h3>
      <div style="margin:top: 24px;">
        <p>Training certificates land in your team's inbox immediately:before they've left the building. Digital and physical copies. Auto:renewal reminders so you never miss a refresh date when CQC inspects.</p>
      </div>

      <h3 style="margin:top: 64px;">We come to you, or you come to us:</h3>
      <div style="margin:top: 24px;">
        <ul>
          <li><strong>On:site delivery:</strong> We bring equipment and deliver training at your premises across Tunbridge Wells and surrounding villages</li>
          <li><strong>Maidstone training centre:</strong> Modern facilities, free parking, quiet space away from care work pressures</li>
        </ul>
      </div>

      <h3 style="margin:top: 64px;">Serving West Kent care providers:</h3>
      <div style="margin:top: 24px;">
        <p>Tunbridge Wells | Southborough | Pembury | Paddock Wood | Tonbridge | Sevenoaks | Crowborough | Edenbridge | East Grinstead (borders) | Lamberhurst | Cranbrook</p>
      </div>
    </div>
  </section>

  <!:: Popular Courses ::>
  <section class="content:section" style="background: var(::cream:bg); padding: 64px 0;">
    <div class="container">
      <div class="section:header:center">
        <h2 class="section:title">Popular Training Courses in Tunbridge Wells</h2>
        <p class="section:subtitle">Browse our most popular care training courses available at our Maidstone training centre or on:site in Tunbridge Wells</p>
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
        <h2>Get in touch:</h2>
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
