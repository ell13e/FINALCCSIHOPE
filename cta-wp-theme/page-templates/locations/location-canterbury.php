<?php
/**
 * Template Name: Location : Canterbury
 * Template Post Type: page
 * 
 * Location page for Canterbury : auto:populates with Canterbury data
 *
 * @package CTA_Theme
 */

get_header();

// SEO Meta Tags
$meta_title = 'Care Training Canterbury & East Kent | CQC Compliant Courses';
$meta_description = 'Professional training for East Kent care teams. Emergency first aid, catheter care, sepsis awareness. Serving Canterbury, Whitstable, Margate.';
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

// Auto:load Canterbury location data
$location_data = [
    'name' => 'Canterbury',
    'display_name' => 'Canterbury, Kent',
    'slug' => 'canterbury',
    'coordinates' => [
        'lat' => 51.2802,
        'lng' => 1.0789,
    ],
    'description' => 'Care training courses available in Canterbury, Kent. We provide on:site training for care providers in the Canterbury area.',
    'service_area' => true,
    'is_primary' => false,
];

$hero_title = 'Health & Social Care Training in Canterbury & East Kent';
$hero_subtitle = 'CQC:compliant training for East Kent care teams';

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
                ['@type' => 'City', 'name' => 'Canterbury', 'containedInPlace' => ['@type' => 'AdministrativeArea', 'name' => 'Kent']],
                ['@type' => 'City', 'name' => 'Whitstable'],
                ['@type' => 'City', 'name' => 'Herne Bay'],
                ['@type' => 'City', 'name' => 'Margate'],
                ['@type' => 'City', 'name' => 'Faversham'],
                ['@type' => 'City', 'name' => 'Deal'],
            ],
        ],
        [
            '@type' => 'Service',
            '@id' => $page_url . '#service',
            'serviceType' => 'Health and Social Care Training',
            'name' => 'CQC:Compliant Training for Canterbury & East Kent',
            'description' => 'Professional care training for East Kent providers. Emergency first aid, catheter care, sepsis awareness, and nutrition courses serving Canterbury, Whitstable, Margate, and coastal Kent.',
            'provider' => ['@id' => $site_url . '/#organization'],
            'areaServed' => [
                ['@type' => 'City', 'name' => 'Canterbury'],
                ['@type' => 'City', 'name' => 'Whitstable'],
                ['@type' => 'City', 'name' => 'Herne Bay'],
                ['@type' => 'City', 'name' => 'Margate'],
                ['@type' => 'City', 'name' => 'Broadstairs'],
                ['@type' => 'City', 'name' => 'Ramsgate'],
            ],
            'audience' => [
                '@type' => 'Audience',
                'audienceType' => 'Care Providers, Healthcare Workers, Domiciliary Care Staff',
            ],
            'hasOfferCatalog' => [
                '@type' => 'OfferCatalog',
                'name' => 'Care Training Courses for Canterbury & East Kent',
                'itemListElement' => [
                    [
                        '@type' => 'Offer',
                        'itemOffered' => [
                            '@type' => 'Course',
                            'name' => 'Emergency First Aid at Work',
                            'provider' => ['@id' => $site_url . '/#organization'],
                        ],
                    ],
                    [
                        '@type' => 'Offer',
                        'itemOffered' => [
                            '@type' => 'Course',
                            'name' => 'Catheter Care',
                            'provider' => ['@id' => $site_url . '/#organization'],
                        ],
                    ],
                    [
                        '@type' => 'Offer',
                        'itemOffered' => [
                            '@type' => 'Course',
                            'name' => 'Sepsis Awareness',
                            'provider' => ['@id' => $site_url . '/#organization'],
                        ],
                    ],
                    [
                        '@type' => 'Offer',
                        'itemOffered' => [
                            '@type' => 'Course',
                            'name' => 'Nutrition & Hydration',
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
                ['@type' => 'ListItem', 'position' => 2, 'name' => 'Canterbury Training', 'item' => $page_url],
            ],
        ],
        [
            '@type' => 'FAQPage',
            '@id' => $page_url . '#faq',
            'mainEntity' => [
                [
                    '@type' => 'Question',
                    'name' => 'Where is training delivered for Canterbury and East Kent care providers?',
                    'acceptedAnswer' => [
                        '@type' => 'Answer',
                        'text' => 'We deliver training at The Maidstone Studios, 35:40 minutes from Canterbury via A2/M2, or 45 minutes from Whitstable and Herne Bay. We also offer on:site training across East Kent including Canterbury, Margate, Whitstable, Deal, and Sandwich.',
                    ],
                ],
                [
                    '@type' => 'Question',
                    'name' => 'How do I get to your training centre from East Kent?',
                    'acceptedAnswer' => [
                        '@type' => 'Answer',
                        'text' => 'From Canterbury take the A2/M2 corridor (35:40 minutes) or A28 via Maidstone Road. From Whitstable/Herne Bay it\'s approximately 45 minutes. Rail connections are available via Ashford International or Canterbury stations to Maidstone with connections.',
                    ],
                ],
                [
                    '@type' => 'Question',
                    'name' => 'What training do East Kent care providers typically book?',
                    'acceptedAnswer' => [
                        '@type' => 'Answer',
                        'text' => 'East Kent care teams commonly book Emergency First Aid at Work due to East Kent Hospitals pressures, Catheter Care as district nursing capacity is stretched, Sepsis Awareness for early recognition, and Nutrition & Hydration as malnutrition is a major concern in the region.',
                    ],
                ],
                [
                    '@type' => 'Question',
                    'name' => 'Do you understand the discharge pressures from East Kent Hospitals?',
                    'acceptedAnswer' => [
                        '@type' => 'Answer',
                        'text' => 'Yes, our trainers have clinical experience in acute and community settings across Kent. We understand that East Kent Hospitals University NHS Foundation Trust serves 700,000 people and that discharge pressures mean more complex care packages landing with domiciliary providers.',
                    ],
                ],
                [
                    '@type' => 'Question',
                    'name' => 'Can you deliver training in coastal Kent areas?',
                    'acceptedAnswer' => [
                        '@type' => 'Answer',
                        'text' => 'Yes, we deliver on:site training across all of East Kent including Canterbury, Margate, Whitstable, Herne Bay, Broadstairs, Ramsgate, Deal, Sandwich, and Faversham. We bring full equipment and work around your team\'s schedule.',
                    ],
                ],
            ],
        ],
        [
            '@type' => 'WebPage',
            '@id' => $page_url . '#webpage',
            'url' => $page_url,
            'name' => 'Care Training Canterbury & East Kent | CQC Compliant Courses',
            'description' => 'Professional training for East Kent care teams. Emergency first aid, catheter care, sepsis awareness. Serving Canterbury, Whitstable, Margate.',
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
  <section class="group:hero:section" aria:labelledby="location:heading">
    <div class="container">
      <nav aria:label="Breadcrumb" class="breadcrumb breadcrumb:hero">
        <ol class="breadcrumb:list">
          <li class="breadcrumb:item"><a href="<?php echo esc_url(home_url('/')); ?>" class="breadcrumb:link">Home</a></li>
          <li class="breadcrumb:separator" aria:hidden="true">/</li>
          <li class="breadcrumb:item"><span class="breadcrumb:current" aria:current="page">Canterbury</span></li>
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

  <section class="content:section" aria:labelledby="location:intro:heading">
    <div class="container">
      <p class="section:subtitle" style="max:width: 800px; margin: 0 auto 48px; text:align: center;">East Kent Hospitals declared a <a href="https://www.ekhuft.nhs.uk/news/critical-incident-declared-at-qeqm" target="_blank" rel="noopener noreferrer" style="color: inherit; text-decoration: underline; text-decoration-color: rgba(155, 133, 96, 0.4);">critical incident at QEQM in Margate this January</a>. Beds full, A&E overwhelmed, discharge pressures through the roof. You know what that means:more complex care packages landing with domiciliary providers across Canterbury, Whitstable, Herne Bay, and Margate. Your team needs to be ready for what's coming home from hospital.</p>

      <div class="section:header:center">
        <h2 id="location:intro:heading" class="section:title">Getting to training from East Kent</h2>
      </div>
      <p>Based at The Maidstone Studios:central location for East Kent teams:</p>
      <ul>
        <li><strong>A2/M2 corridor:</strong> 35:40 minutes from Canterbury, 45 from Whitstable/Herne Bay</li>
        <li><strong>A28:</strong> Direct route from Ashford/Canterbury via Maidstone Road</li>
        <li><strong>Rail connections:</strong> Via Ashford International or Canterbury stations to Maidstone (connections available)</li>
      </ul>

      <h3 style="margin:top: 64px;">Training times built around care rotas:</h3>
      <div style="margin:top: 24px;">
        <p><strong>Morning sessions:</strong> 09:30:14:00 | <strong>Full days:</strong> 09:30:16:00</p>
        <p>Night shift workers? Book morning sessions:they're trained and home before the afternoon. Staff working doubles? We get it. That's why we run evening and weekend options too.</p>
      </div>

      <h3 style="margin:top: 64px;">What East Kent providers are booking right now:</h3>
      <div style="margin:top: 24px;">
        <ul>
          <li><strong>Emergency First Aid at Work</strong> : With EKHUFT serving 700,000 people under sustained pressure, your team's the safety net. They need current first aid skills.</li>
          <li><strong>Catheter Care</strong> : District nursing capacity is stretched. More catheter management is falling to domiciliary carers. Train properly or don't touch it.</li>
          <li><strong>Sepsis Awareness</strong> : Early recognition saves lives. With hospital admission thresholds rising, your team needs to spot deterioration fast.</li>
          <li><strong>Nutrition & Hydration</strong> : Malnutrition in older people is a massive issue in East Kent. CQC's watching this closely.</li>
        </ul>
      </div>

      <h3 style="margin:top: 64px;">East Kent's care reality in 2026</h3>
      <div style="margin:top: 24px;">
        <p>East Kent Hospitals runs five hospitals across the patch:QEQM (Margate), William Harvey (Ashford), Kent & Canterbury, Royal Victoria (Deal), and Buckland. All under pressure. All pushing discharge.</p>
        <p>That means people coming home sicker, with more complex needs, needing more skilled care. Kent County Council's already rated "Requires Improvement" for adult social care, and with the <a href="https://shepwayvox.org/2025/12/11/kent-county-councils-own-population-projections-show-an-ageing-crisis-that-depends-on-more-mig/" target="_blank" rel="noopener noreferrer" style="color: inherit; text-decoration: underline; text-decoration-color: rgba(155, 133, 96, 0.4);">85+ population doubling by 2036</a>, the pressure's only going up.</p>
        <p>If your team isn't trained to the level these packages need, you'll lose contracts to providers who are.</p>
      </div>

      <h3 style="margin:top: 64px;">Trainers who work in acute and community care</h3>
      <div style="margin:top: 24px;">
        <p>Our trainers aren't theoretical. They hold current clinical practice:many work in hospitals and community teams across Kent. They know what an EKHUFT discharge looks like. They understand what "medically fit for discharge" actually means when someone rocks up at home at 9pm with a carrier bag of meds and no notes.</p>
      </div>

      <h3 style="margin:top: 64px;">Instant certificates for CQC compliance</h3>
      <div style="margin:top: 24px;">
        <p>Certificates hit inboxes immediately:digital copies for instant audit compliance, physical copies posted. Automatic renewal tracking means you'll never get caught with expired training during inspection.</p>
      </div>

      <h3 style="margin:top: 64px;">Training at your location or ours:</h3>
      <div style="margin:top: 24px;">
        <ul>
          <li><strong>Your site:</strong> We deliver across East Kent:Canterbury, Margate, Whitstable, Herne Bay, Deal, Sandwich:bring full equipment, work around your team</li>
          <li><strong>Maidstone Studios:</strong> Modern training space, free parking, proper facilities, focus without care work interruptions</li>
        </ul>
      </div>

      <h3 style="margin:top: 64px;">Serving East Kent care providers:</h3>
      <div style="margin:top: 24px;">
        <p>Canterbury | Whitstable | Herne Bay | Margate | Broadstairs | Ramsgate | Deal | Sandwich | Faversham | Sittingbourne | Folkestone (coastal) | Dover</p>
      </div>
    </div>
  </section>

  <section class="content:section" style="background: var(::cream:bg); padding: 64px 0;">
    <div class="container">
      <div class="section:header:center">
        <h2 class="section:title">Training Courses Available in Canterbury & East Kent</h2>
        <p class="section:subtitle">All our CQC:compliant training courses are available for on:site delivery across East Kent or at our Maidstone training centre</p>
      </div>
      
      <div class="cta:center" style="margin:top: 64px;">
        <a href="<?php echo esc_url(get_post_type_archive_link('course')); ?>" class="btn btn:primary">View All Courses</a>
        <a href="<?php echo esc_url(get_permalink(get_page_by_path('group:training'))); ?>" class="btn btn:secondary">Group Training Options</a>
      </div>
    </div>
  </section>

  <section class="content:section" style="padding: 64px 0;">
    <div class="container">
      <div class="group:cta:card">
        <h2>Book training for your team:</h2>
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
