# Continuity Training Academy - Project Structure

**Last Updated:** December 8, 2024

## Project Overview

This project contains a complete website for Continuity Training Academy, a care sector training provider. The project includes both a static HTML site (ready for deployment) and a WordPress theme (for future migration).

## Project Structure

```
FINALCTAIHOPE/
├── static-site/              # Complete static HTML website (ready to deploy)
├── wordpress-theme/          # WordPress theme (for future migration)
├── docs/                     # Documentation and reports
├── cta-04.12/               # Old development directory (can be removed)
├── continuity-training-academy/  # Old WordPress theme (can be removed)
└── FINAL/                    # Legacy directory (can be removed)
```

## Main Directories

### 📄 `static-site/` - Static HTML Website

**Purpose:** Complete, deployable static HTML website

**Contents:**
- ✅ 13 HTML pages (homepage, about, courses, blog, contact, etc.)
- ✅ All assets (CSS, JavaScript, images)
- ✅ Complete documentation
- ✅ Deployment configuration (Netlify, etc.)

**Status:** ✅ Ready for deployment

**Deploy to:** Netlify, Vercel, or any static host

**Key Files:**
- `index.html` - Homepage
- `assets/css/main-consolidated-cleaned.css` - Main stylesheet (30,008 lines)
- `assets/js/` - JavaScript files
- `assets/img/` - Images (330+ files)

---

### 🎨 `wordpress-theme/` - WordPress Theme

**Purpose:** WordPress theme for future CMS migration

**Contents:**
- ✅ 19 PHP files (WordPress theme structure)
- ✅ 11 page templates
- ✅ All assets (CSS, JavaScript, images)
- ✅ WordPress hooks and filters

**Status:** ✅ Ready for WordPress installation

**Key Files:**
- `functions.php` - Theme setup and asset enqueuing
- `page-templates/` - Custom page templates
- `assets/css/main-consolidated-cleaned.css` - Main stylesheet
- `assets/css/team-new.css` - Team page styles

---

### 📚 `docs/` - Documentation

**Purpose:** Project documentation, reports, and analysis

**Contents:**
- CSS consolidation reports
- WordPress migration plan
- Directory analysis
- Status reports
- Inventory lists

---

## Quick Start

### Static Site (Current)

```bash
cd static-site
python3 server.py
# Visit http://localhost:8000
```

**Deploy:**
- Netlify: Drag and drop `static-site/` folder
- Vercel: `vercel static-site`
- Any static host: Upload `static-site/` contents

### WordPress Theme (Future)

1. Install WordPress
2. Copy `wordpress-theme/` to `wp-content/themes/continuity-training-academy/`
3. Activate theme in WordPress admin
4. Create pages and assign templates

---

## Key Features

### Static Site
- ✅ 13 complete HTML pages
- ✅ Responsive design (mobile-first)
- ✅ WCAG 2.1 AA accessible
- ✅ Optimized performance
- ✅ Complete design system

### WordPress Theme
- ✅ 11 page templates
- ✅ Clean, maintainable code
- ✅ Consolidated CSS (most comprehensive)
- ✅ All assets included
- ✅ WordPress best practices

---

## CSS Architecture

**Main Stylesheet:** `main-consolidated-cleaned.css`
- 30,008 lines
- Contains all styles from static site + WordPress theme
- Duplicates removed
- Single source of truth

**Additional Styles:**
- `team-new.css` - Team page specific styles (loaded conditionally)

---

## Assets

### CSS
- `main-consolidated-cleaned.css` - Base stylesheet (30,008 lines)
- `team-new.css` - Team page styles (913 lines)

### JavaScript
- 20+ JavaScript files
- Page-specific functionality
- Main navigation and modals

### Images
- 330+ images
- WebP format (optimized)
- Organized by category (brand, instructors, stock photos, etc.)

### Data
- 6 JSON/JS files
- Course data, blog articles, categories, etc.

---

## Old/Unused Directories

These directories can be removed:

- ❌ `cta-04.12/` - Old development directory (empty of website content)
- ❌ `continuity-training-academy/` - Old WordPress theme (superseded by `wordpress-theme/`)
- ❌ `FINAL/` - Legacy directory (documentation moved to `docs/`)

---

## Migration Path

### Current: Static Site
- Use `static-site/` for immediate deployment
- Works on any static host
- No CMS required

### Future: WordPress
- Use `wordpress-theme/` when ready for CMS
- All templates and assets ready
- Same design and functionality

---

## Documentation

See `docs/` directory for:
- CSS consolidation reports
- WordPress migration plan
- Directory analysis
- Status reports
- Complete inventories

---

## Support

For questions or issues, refer to:
- `static-site/README.md` - Static site documentation
- `docs/WORDPRESS_MIGRATION_PLAN.md` - WordPress migration guide
- `docs/` - Additional documentation

---

**Project Status:** ✅ Ready for deployment (static site) and WordPress migration (theme ready)

