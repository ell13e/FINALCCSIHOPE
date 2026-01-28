# Image Directory Organisation
## Continuity Training Academy Website

This directory contains all images used on the website, organised by category for easy management.

---

## 📁 Directory Structure

```
assets/img/
├── brand/               # Partner/brand logos (care providers)
├── events/              # Event images (if needed)
├── instructors/         # Instructor profile photos
├── logo/                # Company logos (CTA branding)
├── others/              # Miscellaneous images
└── stock_photos/        # All stock photos (organised by checklist categories)
    ├── 02_HOMEPAGE_BANNER/         # Homepage banner images
    ├── 03_ABOUT_US_PAGE/           # About page images
    ├── 04_TESTIMONIALS/            # Testimonial photos
    ├── 05_COURSE_THUMBNAILS/       # Course thumbnail images (ACTIVELY USED)
    ├── 06_BLOG_POSTS/              # Blog post thumbnail images (ACTIVELY USED)
    └── 08_QUICK_ACTION_BACKGROUNDS/ # Quick action background images
```

---

## 📂 Folder Descriptions

### `/brand/`
**Purpose:** Partner/brand logos (care providers)  
**Status:** Active - contains care provider logos  
**Files:** Multiple SVG logos for care providers

**Note:** This folder contains logos for care providers that use CTA services. Do not modify these files.

---

### `/events/`
**Purpose:** Event images (calendar events, special training sessions)  
**Status:** Currently empty  
**Files:** None

**When adding new images:**
- Use descriptive names: `event-name-date.jpg`
- Format: JPG/WebP
- Dimensions: 600x400px (landscape)

---

### `/instructors/`
**Purpose:** Instructor profile photos  
**Status:** Active - contains 5 instructor photos  
**Files:**
- `adele_smith.webp`
- `chloe_roberts.webp`
- `jen_boorman.webp`
- `sharon_cudlip.webp`
- `victoria_walker.webp`

**When adding new images:**
- Use naming convention: `firstname_lastname.webp` (lowercase, underscore)
- Format: PNG/WebP (PNG preferred for transparency)
- Dimensions: 800x800px (square)
- File size: 150-300KB

---

### `/logo/`
**Purpose:** Company logos (Continuity Training Academy branding)  
**Status:** Active - contains CTA logos  
**Files:**
- `long_logo.png` - Horizontal logo
- `square_logo.png` - Square logo
- `Long_Logo.svg` - SVG horizontal logo
- `Square_Logo.svg` - SVG square logo
- `laurel_leaves.png` - Decorative element

**Note:** These are the main company branding files. Do not modify without approval.

---


---

### `/others/`
**Purpose:** Miscellaneous images  
**Status:** Contains error/utility images  
**Files:**
- `error_img.svg` - Error placeholder image

---

### `/stock_photos/`
**Purpose:** General stock photos used across the website  
**Status:** Active - contains multiple stock photos  
**Current organisation:** All files in root of stock_photos/

**Recommended sub-organisation:**
```
stock_photos/
├── courses/          # Course-related images
│   ├── first-aid/
│   ├── manual-handling/
│   ├── medication/
│   └── safeguarding/
├── about/            # About page images
├── testimonials/     # Testimonial photos
└── general/          # General-purpose images
```

**Current files in stock_photos/ (organised by category):**
- Course thumbnails: `emergency_first_aid01-06.jpg/webp`, `pediatric_first_aid01-02.webp`, `epilepsy01-05.webp`, `moving_and_handling01-05.webp`
- About page: `about_epilepsy01.webp`, `about_page01.webp`
- Blog posts: `blog_post01-07.webp`

---

## 🗂️ Image Organisation by Category

### Course Thumbnails
**Location:** `/stock_photos/05_COURSE_THUMBNAILS/`  
**Current usage:** Images referenced in `calendar.js` and `index.html`

**Required images:**
1. Emergency First Aid at Work → `emergency_first_aid04.webp`
2. Emergency Paediatric First Aid → `pediatric_first_aid01.webp`
3. Adult Social Care Certificate → `blog_post01.webp` (from blog posts)
4. Epilepsy & Emergency Medication → `epilepsy01.webp` (also have `epilepsy02-05.webp` available)
5. Basic Life Support → `emergency_first_aid05.webp`
6. Moving & Handling → `moving_and_handling01.webp`
7. Safeguarding Adults → `blog_post02.webp` (from blog posts)
8. Medication Awareness → `blog_post03.webp` (from blog posts)

---

### About Page Images
**Location:** `/stock_photos/03_ABOUT_US_PAGE/`  
**Current usage:** Images used in `about.html`

**Required images:**
- Training session image → `about_epilepsy01.webp`
- Professional training session → `about_page01.webp`

---

### Blog Images
**Location:** `/stock_photos/06_BLOG_POSTS/`  
**Current usage:** Images referenced in `blog-articles.json` and `blog.js`

**Required images:**
- CQC Compliance Updates → `blog_post01.webp`
- Safeguarding Training → `blog_post02.webp`
- First Aid Certification → `emergency_first_aid06.webp` (from course thumbnails)
- Medication Administration → `blog_post03.webp`
- Success Story/Case Study → `blog_post04.webp`
- Additional blog images → `blog_post06-07.webp`

---

## 📝 File Naming Conventions

### General Rules:
- Use lowercase letters
- Use hyphens (-) to separate words, not underscores or spaces
- Be descriptive but concise
- Include version numbers if needed: `image-name-v2.jpg`

### Examples:
- ✅ `emergency-first-aid-work.jpg`
- ✅ `pediatric-first-aid.jpg`
- ✅ `adele-smith.webp`
- ❌ `Emergency First Aid.jpg` (spaces, capitals)
- ❌ `emergency_first_aid.jpg` (underscores)
- ❌ `efa.jpg` (too abbreviated)

---

## 🎯 Quick Reference: Where to Save New Images

| Image Type | Save Location | Example Filename |
|------------|---------------|------------------|
| Course thumbnail | `/stock_photos/05_COURSE_THUMBNAILS/` | `emergency_first_aid01.webp` |
| Blog thumbnail | `/stock_photos/06_BLOG_POSTS/` | `blog_post01.webp` |
| About page image | `/stock_photos/03_ABOUT_US_PAGE/` | `about_page01.webp` |
| Testimonial photo | `/stock_photos/04_TESTIMONIALS/` | `testimonial01.webp` |
| Banner image | `/stock_photos/02_HOMEPAGE_BANNER/` | `banner_main01.webp` |
| Quick action background | `/stock_photos/08_QUICK_ACTION_BACKGROUNDS/` | `quick_action01.webp` |
| Instructor photo | `/instructors/` | `firstname_lastname.webp` |

---

## 📋 Checklist for Adding New Images

- [ ] Image is optimized (WebP format preferred, or JPG/PNG)
- [ ] File size is appropriate (150-300KB for thumbnails, 300-600KB for larger images)
- [ ] Dimensions match requirements (600x400px for courses/blogs, 800x800px for instructors)
- [ ] Filename follows naming convention (lowercase, hyphens)
- [ ] Image is saved in correct folder
- [ ] Image is referenced correctly in code (HTML/JS files)
- [ ] Alt text is added in HTML for accessibility

---

## 📁 Stock Photos Organisation

The `stock_photos/` folder is organised to match the `ENVATO_IMAGE_CHECKLIST.md` structure:

- `02_HOMEPAGE_BANNER/` - Homepage banner images (future use)
- `03_ABOUT_US_PAGE/` - About page images (actively used)
- `04_TESTIMONIALS/` - Testimonial photos (future use)
- `05_COURSE_THUMBNAILS/` - Course thumbnail images (actively used)
- `06_BLOG_POSTS/` - Blog post thumbnail images (actively used)
- `08_QUICK_ACTION_BACKGROUNDS/` - Quick action background images (future use)

**Note:** Folder names match the checklist categories for easy reference when downloading images from Envato.

---

## 📞 Need Help?

Refer to:
- `ENVATO_IMAGE_CHECKLIST.md` - Download checklist with exact save locations (in project root)
- `ENVATO_IMAGE_SEARCH_TERMS.md` - Search terms and AI image generation prompts (in project root)
- `stock_photos/README.md` - Quick reference for stock photos folder structure

