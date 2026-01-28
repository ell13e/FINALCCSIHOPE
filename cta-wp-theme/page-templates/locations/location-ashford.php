<?php
/**
 * Template Name: Location : Ashford
 * Template Post Type: page
 * 
 * Location page for Ashford : auto:populates with Ashford data
 *
 * @package CTA_Theme
 */

get_header();

// SEO Meta Tags
$meta_title = 'Health & Social Care Training in Ashford | CQC Courses Kent';
$meta_description = 'Care training for Ashford & South Kent providers. Learning disabilities, mental health, epilepsy management. 25 mins via M20.';
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

// Auto:load Ashford location data
$location_data = [
    'name' => 'Ashford',
    'display_name' => 'Ashford, Kent',
    'slug' => 'ashford',
    'coordinates' => [
        'lat' => 51.1468,
        'lng' => 0.8738,
    ],
    'description' => 'CQC:compliant care training courses in Ashford, Kent. On:site training available for care homes and healthcare providers.',
    'service_area' => true,
    'is_primary' => false,
];

$hero_title = 'Health & Social Care Training in Ashford, Kent';
$hero_subtitle = 'Professional care training for South & Mid Kent providers';

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
                ['@type' => 'City', 'name' => 'Ashford', 'containedInPlace' => ['@type' => 'AdministrativeArea', 'name' => 'Kent']],
                ['@type' => 'City', 'name' => 'Tenterden'],
                ['@type' => 'City', 'name' => 'New Romney'],
                ['@type' => 'City', 'name' => 'Hythe'],
                ['@type' => 'City', 'name' => 'Folkestone'],
            ],
        ],
        [
            '@type' => 'Service',
            '@id' => $page_url . '#service',
            'serviceType' => 'Health and Social Care Training',
            'name' => 'Professional Care Training for Ashford & South Kent',
            'description' => 'Health and social care training for South and Mid Kent care providers. Learning disabilities awareness, mental health, epilepsy management, and moving & handling courses for Ashford care teams.',
            'provider' => ['@id' => $site_url . '/#organization'],
            'areaServed' => [
                ['@type' => 'City', 'name' => 'Ashford'],
                ['@type' => 'City', 'name' => 'Tenterden'],
                ['@type' => 'City', 'name' => 'New Romney'],
                ['@type' => 'City', 'name' => 'Hythe'],
                ['@type' => 'City', 'name' => 'Folkestone'],
            ],
            'audience' => [
                '@type' => 'Audience',
                'audienceType' => 'Care Providers, Healthcare Workers, Domiciliary Care Staff',
            ],
            'hasOfferCatalog' => [
                '@type' => 'OfferCatalog',
                'name' => 'Care Training Courses for Ashford',
                'itemListElement' => [
                    [
                        '@type' => 'Offer',
                        'itemOffered' => [
                            '@type' => 'Course',
                            'name' => 'Learning Disabilities Awareness',
                            'provider' => ['@id' => $site_url . '/#organization'],
                        ],
                    ],
                    [
                        '@type' => 'Offer',
                        'itemOffered' => [
                            '@type' => 'Course',
                            'name' => 'Mental Health Awareness',
                            'provider' => ['@id' => $site_url . '/#organization'],
                        ],
                    ],
                    [
                        '@type' => 'Offer',
                        'itemOffered' => [
                            '@type' => 'Course',
                            'name' => 'Epilepsy Awareness & Management',
                            'provider' => ['@id' => $site_url . '/#organization'],
                        ],
                    ],
                    [
                        '@type' => 'Offer',
                        'itemOffered' => [
                            '@type' => 'Course',
                            'name' => 'Moving & Handling (People)',
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
                ['@type' => 'ListItem', 'position' => 2, 'name' => 'Ashford Training', 'item' => $page_url],
            ],
        ],
        [
            '@type' => 'FAQPage',
            '@id' => $page_url . '#faq',
            'mainEntity' => [
                [
                    '@type' => 'Question',
                    'name' => 'Where is training delivered for Ashford care providers?',
                    'acceptedAnswer' => [
                        '@type' => 'Answer',
                        'text' => 'We deliver training at The Maidstone Studios, 25 minutes from Ashford via M20 (Junction 8 to Junction 8), or 30 minutes via A20 through Lenham. We also offer on:site training at your premises across Ashford, Tenterden, Romney Marsh, and rural South Kent.',
                    ],
                ],
                [
                    '@type' => 'Question',
                    'name' => 'How do I travel to training from Ashford?',
                    'acceptedAnswer' => [
                        '@type' => 'Answer',
                        'text' => 'Take the M20 motorway (Junction 8 to Junction 8, 25 minutes direct), A20 via Lenham and Harrietsham (30 minutes), or train from Ashford International to Maidstone with connections. Arriva bus services also connect the Ashford to Maidstone corridor.',
                    ],
                ],
                [
                    '@type' => 'Question',
                    'name' => 'What training do Ashford care providers typically need?',
                    'acceptedAnswer' => [
                        '@type' => 'Answer',
                        'text' => 'Ashford care teams commonly book Learning Disabilities Awareness for younger populations living independently, Mental Health Awareness as community services are stretched, Epilepsy Awareness & Management including buccal midazolam, and Moving & Handling covering bariatric care and specialist equipment.',
                    ],
                ],
                [
                    '@type' => 'Question',
                    'name' => 'Do you deliver training in rural areas like Romney Marsh and Tenterden?',
                    'acceptedAnswer' => [
                        '@type' => 'Answer',
                        'text' => 'Yes, we deliver on:site training across all of South Kent including Ashford, Tenterden, Romney Marsh (New Romney, Lydd, Dymchurch), Hythe, Folkestone, and rural Weald areas. We understand the challenges of care delivery in isolated rural locations.',
                    ],
                ],
                [
                    '@type' => 'Question',
                    'name' => 'Do your trainers understand William Harvey Hospital discharge challenges?',
                    'acceptedAnswer' => [
                        '@type' => 'Answer',
                        'text' => 'Yes, our trainers have acute hospital and community experience across Kent. We understand that William Harvey serves a huge rural catchment and that discharged patients often return to isolated properties requiring higher:level care skills from domiciliary teams.',
                    ],
                ],
            ],
        ],
        [
            '@type' => 'WebPage',
            '@id' => $page_url . '#webpage',
            'url' => $page_url,
            'name' => 'Health & Social Care Training in Ashford | CQC Courses Kent',
            'description' => 'Care training for Ashford & South Kent providers. Learning disabilities, mental health, epilepsy management. 25 mins via M20.',
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
          <li class="breadcrumb:item"><span class="breadcrumb:current" aria:current="page">Ashford</span></li>
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
      <p class="section:subtitle" style="max:width: 800px; margin: 0 auto 48px; text:align: center;">Ashford's growing faster than almost anywhere in Kent. New housing developments, Ashford International bringing people in, and William Harvey Hospital serving a massive catchment from Ashford to Romney Marsh. Your care business is growing:but is your team's training keeping pace?</p>

      <div class="section:header:center">
        <h2 id="location:intro:heading" class="section:title">Easy access from Ashford</h2>
      </div>
      <p>Training at The Maidstone Studios:straightforward journey from Ashford:</p>
      <ul>
        <li><strong>M20:</strong> Junction 8 to Junction 8, 25 minutes direct</li>
        <li><strong>A20:</strong> Via Lenham and Harrietsham, 30 minutes</li>
        <li><strong>Rail:</strong> Ashford International to Maidstone (via several routes with connections)</li>
        <li><strong>Bus links:</strong> Arriva services connecting Ashford to Maidstone corridor</li>
      </ul>

      <h3 style="margin:top: 64px;">Training that fits your schedule:</h3>
      <div style="margin:top: 24px;">
        <p><strong>Morning sessions:</strong> 09:30:14:00 | <strong>Full days:</strong> 09:30:16:00</p>
        <p>Staff finishing nights? Morning sessions. Weekend workers needing training? We run Saturdays. Teams on rotating rotas? We'll find a date that works.</p>
      </div>

      <h3 style="margin:top: 64px;">Ashford providers are booking:</h3>
      <div style="margin:top: 24px;">
        <ul>
          <li><strong>Learning Disabilities Awareness</strong> : Ashford's got a growing younger population with complex needs living independently. Your team needs to understand person:centred support, not just physical care.</li>
          <li><strong>Mental Health Awareness</strong> : With mental health services under pressure nationally, more people are managing conditions at home. Your staff need to recognize crisis signs.</li>
          <li><strong>Epilepsy Awareness & Management</strong> : Seizure management, buccal midazolam administration, emergency protocols:train properly or refer to specialists.</li>
          <li><strong>Moving & Handling (People)</strong> : Not just manual handling:we cover bariatric care, specialist equipment, dynamic risk assessment in people's homes.</li>
        </ul>
      </div>

      <h3 style="margin:top: 64px;">Ashford's care landscape in 2026</h3>
      <div style="margin:top: 24px;">
        <p>Ashford's in an interesting position. <a href="https://www.instituteforgovernment.org.uk/publication/performance-tracker-2025/nhs/hospitals" target="_blank" rel="noopener noreferrer" style="color: inherit; text-decoration: underline; text-decoration-color: rgba(155, 133, 96, 0.4);">William Harvey Hospital</a> is the major acute hospital for a huge rural catchment:Romney Marsh, Tenterden, rural Weald. When people are discharged from there, they're often going home to isolated properties, limited family support, and long distances between care calls.</p>
        <p>That means your team needs higher:level skills:they can't just pop back if something goes wrong. They need to handle it there and then, or know when to escalate fast.</p>
        <p>With <a href="https://shepwayvox.org/2025/12/11/kent-county-councils-own-population-projections-show-an-ageing-crisis-that-depends-on-more-mig/" target="_blank" rel="noopener noreferrer" style="color: inherit; text-decoration: underline; text-decoration-color: rgba(155, 133, 96, 0.4);">Kent's 85+ population doubling by 2036</a> and Ashford building thousands of new homes, there'll be work. But with 8.3% sector vacancy rates and the incoming <a href="https://carecubed.org/2025-care-worker-500-million-fair-pay-announcement/" target="_blank" rel="noopener noreferrer" style="color: inherit; text-decoration: underline; text-decoration-color: rgba(155, 133, 96, 0.4);">Fair Pay Agreement</a> changing how the sector operates, only well:trained teams will thrive.</p>
      </div>

      <h3 style="margin:top: 64px;">Trainers with acute hospital & community experience</h3>
      <div style="margin:top: 24px;">
        <p>Our trainers work across acute and community settings:many have worked at William Harvey and other Kent hospitals. They understand what "discharge:ready" looks like in theory versus reality. They know what your team's walking into.</p>
        <p>DBS:checked, clinically current, professionally insured. They teach what works, not what sounds good on paper.</p>
      </div>

      <h3 style="margin:top: 64px;">CQC:ready certificates immediately</h3>
      <div style="margin:top: 24px;">
        <p>Digital certificates emailed before your staff leave training. Physical copies posted the same day. Automatic renewal reminders keep you compliant without the admin burden.</p>
      </div>

      <h3 style="margin:top: 64px;">We deliver where you need us:</h3>
      <div style="margin:top: 24px;">
        <ul>
          <li><strong>Your premises:</strong> On:site training across Ashford, Tenterden, Romney Marsh, rural areas:we bring everything needed</li>
          <li><strong>Maidstone training centre:</strong> Purpose:built space, free parking, no distractions, professional environment</li>
        </ul>
      </div>

      <h3 style="margin:top: 64px;">Serving South & Mid Kent care providers:</h3>
      <div style="margin:top: 24px;">
        <p>Ashford | Tenterden | New Romney | Lydd | Dymchurch | Hythe | Folkestone | Charing | Wye | Hamstreet | Shadoxhurst | Bethersden | High Halden | Woodchurch</p>
      </div>
    </div>
  </section>

  <section class="content:section" style="background: var(::cream:bg); padding: 64px 0;">
    <div class="container">
      <div class="section:header:center">
        <h2 class="section:title">Training Courses Available in Ashford</h2>
        <p class="section:subtitle">All our CQC:compliant training courses are available for on:site delivery in Ashford or at our Maidstone training centre</p>
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
        <h2>Book your team's training:</h2>
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
