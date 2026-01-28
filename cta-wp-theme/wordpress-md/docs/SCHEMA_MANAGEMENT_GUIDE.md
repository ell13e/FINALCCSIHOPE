# Schema.org Management Guide

## Overview

The website now has a centralized schema management system that ensures consistent, high-quality structured data across all pages.

---

## Key Features

### 1. **Centralized Configuration**
All schema settings are managed in one place via **Appearance → Customize → Schema & SEO Settings**

### 2. **Per-Page Schema Images**
Each page/post can have a custom schema image set via the **"Schema.org Featured Image"** meta box in the editor sidebar.

### 3. **Automatic Fallbacks**
- Schema image falls back to featured image if not set
- Rating defaults to 4.6/5 with 150 reviews
- Social media URLs have sensible defaults

### 4. **Linked Data**
All `@id` properties create proper linked data relationships between schema entities.

---

## Theme Customizer Settings

Navigate to: **Appearance → Customize → Schema & SEO Settings**

### Available Settings:

| Setting | Default | Description |
|---------|---------|-------------|
| **Trustpilot Rating** | 4.6 | Your current Trustpilot rating |
| **Trustpilot Review Count** | 150 | Number of Trustpilot reviews |
| **Facebook URL** | https://www.facebook.com/continuitytrainingacademy | Your Facebook page URL |
| **LinkedIn URL** | https://www.linkedin.com/company/continuity-training-academy | Your LinkedIn company page |
| **Trustpilot URL** | https://uk.trustpilot.com/review/continuitytrainingacademy.co.uk | Your Trustpilot profile |

### How to Update:

1. Go to **Appearance → Customize**
2. Click **Schema & SEO Settings**
3. Update the values
4. Click **Publish**

Changes apply site-wide immediately.

---

## Per-Page Schema Images

### Setting a Schema Image:

1. Edit any page or post
2. Look for the **"Schema.org Featured Image"** meta box in the right sidebar
3. Click **"Set Schema Image"**
4. Choose an image from the media library or upload a new one
5. Click **"Use this image"**
6. Update/Publish the page

### Image Requirements:

- **Minimum size**: 1200×630px (recommended for social sharing)
- **Aspect ratio**: 1.91:1 (ideal for Open Graph)
- **Format**: JPG, PNG, or WebP
- **File size**: Under 1MB for fast loading

### Fallback Behavior:

```
1. Custom Schema Image (if set)
   ↓
2. Featured Image (if set)
   ↓
3. Default OG Image (/assets/img/default-og-image.jpg)
```

---

## Schema Types by Page

### **Homepage**
- WebSite
- Organization
- BreadcrumbList

### **Location Pages** (Maidstone, Medway, Canterbury, Ashford, Tunbridge Wells)
- EducationalOrganization
- Service (with OfferCatalog)
- BreadcrumbList
- FAQPage (5 location-specific questions)
- WebPage (with primaryImageOfPage)

### **Resource Pages** (CQC Hub, Training Guides, FAQs, Downloadable Resources)
- WebPage
- FAQPage (where applicable)
- CollectionPage (for resource listings)
- HowTo (for training guides)

### **Course Pages**
- Course (automatically added via `functions.php`)
- EducationalOrganization
- Offer

### **Blog Posts**
- Article (automatically added via `functions.php`)
- EducationalOrganization

### **Contact Page**
- ContactPage
- EducationalOrganization

### **About Page**
- AboutPage
- Organization

---

## Linked Data Structure

All schema uses proper `@id` references to create linked data:

```json
{
  "@context": "https://schema.org",
  "@graph": [
    {
      "@type": "EducationalOrganization",
      "@id": "https://www.continuitytrainingacademy.co.uk/#organization",
      "name": "Continuity Training Academy"
    },
    {
      "@type": "WebPage",
      "@id": "https://www.continuitytrainingacademy.co.uk/page/#webpage",
      "about": {
        "@id": "https://www.continuitytrainingacademy.co.uk/#organization"
      }
    }
  ]
}
```

### @ID Formats (DO NOT CHANGE):

- **Organization**: `{site_url}/#organization`
- **WebPage**: `{page_url}#webpage`
- **Service**: `{page_url}#service`
- **Breadcrumb**: `{page_url}#breadcrumb`
- **FAQ**: `{page_url}#faq`
- **Website**: `{site_url}/#website`

These formats ensure Google understands the relationships between entities.

---

## Helper Functions

### Available in Templates:

```php
// Get organization schema (includes rating, social media)
$org_schema = cta_get_organization_schema();

// Get page schema image URL
$image_url = cta_get_page_schema_image();

// Get breadcrumb schema
$breadcrumb = cta_get_breadcrumb_schema([
    ['name' => 'Home', 'url' => home_url('/')],
    ['name' => 'Services', 'url' => home_url('/services/')],
    ['name' => 'Training', 'url' => get_permalink()],
]);

// Get webpage schema
$webpage = cta_get_webpage_schema([
    'name' => 'Custom Page Title',
    'description' => 'Custom description',
]);

// Output schema JSON-LD
cta_output_schema_json($schema_graph);
```

---

## Location Page Schema Structure

Each location page includes:

### 1. **EducationalOrganization**
```json
{
  "@type": "EducationalOrganization",
  "@id": "https://www.continuitytrainingacademy.co.uk/#organization",
  "aggregateRating": {
    "@type": "AggregateRating",
    "ratingValue": "4.6",  // From theme customizer
    "reviewCount": "150"    // From theme customizer
  },
  "sameAs": [
    "https://uk.trustpilot.com/review/continuitytrainingacademy.co.uk",
    "https://www.facebook.com/continuitytrainingacademy",
    "https://www.linkedin.com/company/continuity-training-academy"
  ]
}
```

### 2. **Service**
- Includes location-specific course offerings
- Links to organization via `@id`
- Defines area served

### 3. **FAQPage**
- 5 location-specific questions
- Optimized for rich snippets

### 4. **WebPage**
- Includes `primaryImageOfPage` (from custom schema image or featured image)
- Links to organization and breadcrumb

---

## SEO Benefits

### Rich Snippets:
- ⭐ Star ratings in search results
- 📋 FAQ accordions
- 🍞 Breadcrumb navigation
- 📍 Local business information
- 📚 Course listings

### Knowledge Graph:
- Organization details
- Social media profiles
- Contact information
- Service areas

### Mobile Search:
- Enhanced mobile cards
- Quick actions (call, directions)
- Course availability

---

## Updating Schema for New Pages

### Method 1: Use Helper Functions (Recommended)

```php
<?php
get_header();

$site_url = home_url();
$page_url = get_permalink();

$schema_graph = [
    cta_get_organization_schema(),
    cta_get_breadcrumb_schema(),
    cta_get_webpage_schema([
        'name' => 'Page Title | Continuity Training Academy',
        'description' => 'Page description for SEO',
    ]),
    // Add custom schema here
];

cta_output_schema_json($schema_graph);
?>

<main>
  <!-- Page content -->
</main>

<?php get_footer(); ?>
```

### Method 2: Manual Schema (For Complex Pages)

See existing location pages for examples of complex schema with multiple entity types.

---

## Testing Schema

### Google Rich Results Test:
1. Go to: https://search.google.com/test/rich-results
2. Enter your page URL
3. Check for errors/warnings

### Schema Markup Validator:
1. Go to: https://validator.schema.org/
2. Enter your page URL
3. Verify all entities are recognized

### Common Issues:

| Issue | Solution |
|-------|----------|
| Missing image | Set schema image or featured image |
| Invalid rating | Check theme customizer rating value (must be 1-5) |
| Broken @id links | Don't modify @id formats |
| Missing properties | Ensure all required fields are filled |

---

## Maintenance

### Monthly Tasks:
- [ ] Update Trustpilot rating in theme customizer
- [ ] Update review count in theme customizer
- [ ] Test schema on new pages
- [ ] Check Google Search Console for schema errors

### When Adding New Pages:
- [ ] Set featured image or schema image
- [ ] Add appropriate schema types
- [ ] Test with Rich Results tool
- [ ] Verify breadcrumbs are correct

### When Updating Social Media:
- [ ] Update URLs in theme customizer
- [ ] Clear cache (if using caching plugin)
- [ ] Verify changes in page source

---

## Quick Reference

### Default Values:
```
Rating: 4.6/5
Review Count: 150
Facebook: https://www.facebook.com/continuitytrainingacademy
LinkedIn: https://www.linkedin.com/company/continuity-training-academy
Trustpilot: https://uk.trustpilot.com/review/continuitytrainingacademy.co.uk
```

### File Locations:
```
Schema Functions: /inc/schema-functions.php
Theme Customizer: Appearance → Customize → Schema & SEO Settings
Meta Box: Edit Page/Post → Schema.org Featured Image (sidebar)
```

### Support:
For schema issues, check:
1. Theme customizer settings
2. Page meta box settings
3. Browser console for JSON errors
4. Google Search Console → Enhancements

---

## Advanced: Custom Schema Types

To add custom schema types to specific pages:

```php
// In your page template
$custom_schema = [
    '@type' => 'Event',
    '@id' => $page_url . '#event',
    'name' => 'Training Event',
    'startDate' => '2026-02-01T09:00',
    'location' => [
        '@type' => 'Place',
        'name' => 'The Maidstone Studios',
    ],
    'organizer' => [
        '@id' => $site_url . '/#organization'
    ],
];

$schema_graph[] = $custom_schema;
```

Always use `@id` references to link entities together.

---

## Summary

✅ **Centralized**: All settings in one place (theme customizer)
✅ **Flexible**: Per-page image control via meta box
✅ **Automatic**: Fallbacks ensure schema always works
✅ **Linked**: Proper @id relationships for Google
✅ **Tested**: All location pages have comprehensive schema
✅ **Maintainable**: Easy to update rating and social media

The schema system is production-ready and requires minimal ongoing maintenance.
