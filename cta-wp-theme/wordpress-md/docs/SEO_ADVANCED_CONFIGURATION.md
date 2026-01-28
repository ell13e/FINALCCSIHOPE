# SEO Advanced Configuration - Added Features

## Overview

Added comprehensive SEO configuration tools to the SEO Verification page, allowing you to control schema markup, canonical URLs, default meta tags, and social media settings all in one place.

## New Features Added

### 1. ✅ Schema Markup Control
**Toggle On/Off:**
- Enable/disable structured data site-wide
- Affects: Course schema, Organization schema, Breadcrumbs
- Instant toggle with single button

**Status Display:**
- ✓ Enabled (green) or ● Disabled (red)
- Shows current state clearly

**Use Case:**
- Disable during development/testing
- Enable for production SEO benefits

---

### 2. ✅ Canonical URLs Control
**Toggle On/Off:**
- Enable/disable canonical URL generation
- Prevents duplicate content penalties
- Cleans tracking parameters from URLs

**Status Display:**
- ✓ Enabled (green) or ● Disabled (red)

**What It Does:**
- Removes `?utm_source=`, `?ref=`, etc. from canonical URLs
- Tells search engines which URL is the "official" one
- Prevents duplicate content issues

---

### 3. ✅ Default Meta Tags Configuration
**Configurable Settings:**
- **Title Suffix** - Added to all page titles
- **Default Description** - Fallback meta description

**Form Fields:**
- Title Suffix input (e.g., "| Continuity Training Academy")
- Description textarea (160 char recommended)
- Pre-filled with current values
- Validation required

**Status Display:**
- ✓ Configured (green) if both set
- ⚠ Not Set (yellow) if missing

**Use Case:**
- Ensures all pages have meta tags
- Consistent branding in search results
- Fallback for pages without custom meta

---

### 4. ✅ Social Media Tags Configuration
**Configurable Settings:**
- **Default OG Image** - Open Graph image URL
- **Twitter Handle** - Your @username
- **Facebook App ID** - For Facebook Insights

**Form Fields:**
- OG Image URL input (with placeholder)
- Twitter handle input (with @ symbol)
- Facebook App ID input (optional)
- URL validation

**Status Display:**
- ✓ Configured (green) if any set
- ⚠ Not Set (yellow) if all empty

**What It Does:**
- Controls how links appear on Facebook, LinkedIn, Twitter
- Sets default image for social shares
- Attributes content to your social accounts

---

## User Interface

### Configuration Table
Clean table layout showing:
- **Feature** - What it controls
- **Status** - Current state (color-coded)
- **Action** - Toggle or Configure button
- **Description** - What it does

### Hidden Forms
Forms appear when "Configure" is clicked:
- Slide down smoothly
- Pre-filled with current values
- Cancel button to hide without saving
- Save button with validation

### Status Indicators
- ✓ **Green** - Enabled/Configured
- ● **Red** - Disabled
- ⚠ **Yellow** - Not configured

---

## Technical Implementation

### Action Handlers

#### Schema Markup
```php
case 'enable_schema_markup':
    update_option('cta_enable_schema_markup', true);
    $success = true;
    $message = 'Schema markup enabled for all applicable pages!';
    break;
```

#### Canonical URLs
```php
case 'enable_canonical_urls':
    update_option('cta_enable_canonical_urls', true);
    $success = true;
    $message = 'Canonical URLs enabled!';
    break;
```

#### Default Meta Tags
```php
case 'configure_default_meta':
    $default_title_suffix = sanitize_text_field($_POST['default_title_suffix']);
    $default_description = sanitize_textarea_field($_POST['default_description']);
    
    update_option('cta_default_title_suffix', $default_title_suffix);
    update_option('cta_default_meta_description', $default_description);
    $success = true;
    $message = 'Default meta tags configured!';
    break;
```

#### Social Media Tags
```php
case 'configure_social_meta':
    $og_image = esc_url_raw($_POST['og_default_image']);
    $twitter_handle = sanitize_text_field($_POST['twitter_handle']);
    $fb_app_id = sanitize_text_field($_POST['fb_app_id']);
    
    update_option('cta_default_og_image', $og_image);
    update_option('cta_twitter_handle', $twitter_handle);
    update_option('cta_facebook_app_id', $fb_app_id);
    $success = true;
    $message = 'Social media meta tags configured!';
    break;
```

### Options Stored

| Option Name | Type | Purpose |
|-------------|------|---------|
| `cta_enable_schema_markup` | boolean | Schema on/off |
| `cta_enable_canonical_urls` | boolean | Canonical on/off |
| `cta_default_title_suffix` | string | Title suffix |
| `cta_default_meta_description` | text | Default description |
| `cta_default_og_image` | URL | OG image URL |
| `cta_twitter_handle` | string | Twitter username |
| `cta_facebook_app_id` | string | FB App ID |

### Security
- ✅ Nonce verification on all forms
- ✅ Capability check (`manage_options`)
- ✅ Input sanitization
  - `sanitize_text_field()` for text
  - `sanitize_textarea_field()` for descriptions
  - `esc_url_raw()` for URLs
- ✅ Output escaping
  - `esc_attr()` for attributes
  - `esc_textarea()` for textareas

---

## Usage Examples

### Example 1: Configure Default Meta Tags
1. Go to **Tools → SEO Verification**
2. Scroll to "SEO Configuration" section
3. Click **"Configure"** next to "Default Meta Tags"
4. Fill in:
   - Title Suffix: `| Continuity Training Academy`
   - Description: `CQC-compliant health and social care training in Kent and across the UK. Book your course today.`
5. Click **"Save Default Meta Tags"**
6. Done! All pages now have fallback meta tags

### Example 2: Set Up Social Media
1. Go to **Tools → SEO Verification**
2. Scroll to "SEO Configuration" section
3. Click **"Configure"** next to "Social Media Tags"
4. Fill in:
   - OG Image: `https://continuitytrainingacademy.co.uk/og-image.jpg`
   - Twitter: `@CTATraining`
   - Facebook App ID: (leave blank if not using)
5. Click **"Save Social Media Settings"**
6. Links now show proper images/attribution when shared

### Example 3: Disable Schema During Testing
1. Go to **Tools → SEO Verification**
2. Find "Schema Markup" row
3. Click **"Disable"** button
4. Schema removed from all pages
5. Click **"Enable"** when ready for production

---

## Benefits

### 1. **Centralized Control**
- All SEO settings in one place
- No need to navigate multiple admin pages
- Clear overview of what's enabled/disabled

### 2. **No Plugin Required**
- Built into theme
- No external dependencies
- Faster page loads

### 3. **Instant Changes**
- Toggle features on/off immediately
- No cache clearing needed
- See results right away

### 4. **Safe Defaults**
- Schema and Canonical enabled by default
- Can disable if conflicts arise
- Easy to revert

### 5. **Professional Social Sharing**
- Control how links appear on social media
- Branded images and descriptions
- Proper attribution

---

## Integration with Existing SEO

### Works With:
- ✅ Existing schema markup functions
- ✅ Current canonical URL system
- ✅ Meta tag generation
- ✅ Social media meta tags

### Respects:
- Custom meta tags on individual pages
- Page-specific OG images
- Custom schema on specific post types

### Fallback Logic:
1. Check for page-specific meta tags
2. If not found, use defaults configured here
3. If defaults not set, use theme defaults

---

## SEO Impact

### Schema Markup
- **Benefit:** Rich results in search (course listings, ratings, breadcrumbs)
- **Impact:** Higher click-through rates from search
- **Recommendation:** Keep enabled

### Canonical URLs
- **Benefit:** Prevents duplicate content penalties
- **Impact:** Consolidates page authority
- **Recommendation:** Keep enabled

### Default Meta Tags
- **Benefit:** Ensures all pages have proper meta
- **Impact:** Better search result appearance
- **Recommendation:** Configure with brand-appropriate text

### Social Media Tags
- **Benefit:** Professional appearance when shared
- **Impact:** Higher social engagement
- **Recommendation:** Configure with logo/brand image

---

## Location

**Admin Page:** Tools → SEO Verification  
**Section:** SEO Configuration (below verification results)  
**File:** `wordpress-theme/inc/seo-verification.php`

---

## Future Enhancements (Optional)

Could add:
- Image uploader for OG image (instead of URL input)
- Preview of how social shares will look
- Multiple OG images for different page types
- Schema type selector (enable/disable specific types)
- Bulk meta tag generator for existing pages

But current implementation covers all essential SEO configuration needs!
