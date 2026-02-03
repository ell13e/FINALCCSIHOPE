# Frontend Fields Audit

## Single Course Template (`single-course.php`)

### Hero Section
- **course_seo_h1** - Custom H1 (or default pattern)
- **course_level** - Level badge
- **course_duration** - Duration text
- **course_hours** - Hours (shown in parentheses)
- **course_accreditation** - Accreditation badge

### Expanded Content Section (before accordions)
- **course_why_matters** - "Why This Matters" callout
- **course_covered_items** - Key Topics grid (first 6 items)
- **course_format_details** - Format details (truncated)
- **course_key_features** - Training Highlights (first 3)
- **course_benefits** - What's Included (first 4)

### Main Content
- **course_seo_section_heading** - Section heading (default: "Course Overview")
- **course_outcomes** - Course Content (first 8, then "Show All")
- **course_description** - Course Description
- **course_suitable_for** - Who Should Attend
- **course_prerequisites** - Requirements
- **course_certificate** - Certificate (in accordion)
- **course_accreditation** - Accreditation (in accordion)

### Sidebar
- **course_is_mandatory** - Mandatory badge
- **course_mandatory_note** - Mandatory message
- **course_price** - Price display
- **course_duration** - Duration
- **course_level** - Qualification badge
- **course_category** - Category (from taxonomy)
- Upcoming events list (from course_event post type)

### Additional Sections
- **course_faqs** - FAQs section
- **course_selected_reviews** - Testimonials
- **course_after_note** - Additional note (if exists)

---

## Single Course Event Template (`single-course_event.php`)

### Hero Section
- **event_seo_h1** - Custom H1 (or default pattern)
- **event_date** - Formatted date
- **course_duration** - Duration (from linked course)
- **event_location** - Location
- **spaces_available** - Spaces left

### Main Content (from linked course)
- **event_seo_section_heading** - Section heading
- **course_outcomes** - Course Content (from linked course)
- **course_description** - Course Description (from linked course)
- **course_suitable_for** - Who Should Attend (from linked course)
- **course_prerequisites** - Requirements (from linked course)
- **course_certificate** - Certificate (from linked course)
- **course_accreditation** - Accreditation (from linked course)

### Sidebar
- **event_price** or **course_price** - Price (event price takes precedence)
- **event_date** - Start Date
- **start_time** - Start Time
- **end_time** - End Time
- **spaces_available** - Spaces
- **course_duration** - Duration (from linked course)
- **course_level** - Qualification (from linked course)
- **course_category** - Category (from linked course)
- **event_location** - Location

### Event-Specific Fields
- **linked_course** - Related Course (required)
- **event_date** - Event Date (required)
- **start_time** - Start Time
- **end_time** - End Time
- **event_location** - Venue
- **total_spaces** - Total Capacity
- **spaces_available** - Spaces Available
- **event_price** - Custom Price (optional override)
- **event_active** - Event Status
- **event_featured** - Featured Event
- **event_image** - Event Image

---

## ACF Field Groups - Current Order

### Course Fields
1. **Course Details** (menu_order: 0)
   - Level, Duration, Hours, Trainer, Price, Mandatory flag, Mandatory note

2. **Course Content** (menu_order: 1)
   - Description, Suitable For, Prerequisites

3. **Learning Outcomes** (menu_order: 3)
   - Course Outcomes (textarea)

4. **SEO & Content Settings** (menu_order: 4)
   - Custom H1, Meta Title, Meta Description, Excerpt, Section Heading

5. **Course Accreditation & Certification** (menu_order: 5)
   - Accreditation, Certificate

6. **Expanded Course Content** (menu_order: 6)
   - Intro Paragraph, Why Matters, Covered Items, Format Details, Key Features, Benefits, After Note

### Course Event Fields
1. **Event Details** (menu_order: 0)
   - Linked Course, Event Date, Start/End Time, Location, Spaces, Price, Active, Featured, Image

2. **Event SEO** (menu_order: 1)
   - Custom H1, Meta Title, Meta Description, Excerpt, Section Heading

---

## Alignment Issues

### Issue 1: Field Order Doesn't Match Frontend Flow
Frontend displays fields in this order:
1. Hero: Level, Duration, Hours, Accreditation
2. Expanded: Why Matters, Covered Items, Format, Features, Benefits
3. Main: Section Heading, Outcomes, Description, Suitable For, Prerequisites
4. Accordion: Certificate, Accreditation
5. Sidebar: Mandatory, Price, Duration, Level, Category

But ACF groups are:
1. Course Details (Level, Duration, Hours, Price, Mandatory)
2. Course Content (Description, Suitable For, Prerequisites)
3. Learning Outcomes
4. SEO
5. Accreditation
6. Expanded Content

**Solution**: Reorder ACF groups to match frontend display flow.

### Issue 2: Missing Fields in Admin
All fields appear to be present in ACF. However, some fields might be in wrong groups.

### Issue 3: Terminology Mismatch
- Frontend: "Who Should Attend" → ACF: "Suitable For" ✓ (matches)
- Frontend: "Requirements" → ACF: "Requirements / Prerequisites" ✓ (matches)
- Frontend: "Course Content" → ACF: "Course Content (Learning Outcomes)" ✓ (matches)

### Issue 4: Field Group Organization
The "Expanded Course Content" group contains many fields that appear early on the frontend, but it's at the bottom of the admin (menu_order: 6).

---

## Recommended ACF Field Group Order

### Course Fields (Reordered to match frontend)
1. **Course Details** (menu_order: 0) - Hero & Sidebar basics
   - Level, Duration, Hours, Trainer, Price, Mandatory flag, Mandatory note

2. **Expanded Course Content** (menu_order: 1) - Appears before main content
   - Why Matters, Covered Items, Format Details, Key Features, Benefits, After Note, Intro Paragraph

3. **Course Content** (menu_order: 2) - Main content section
   - Section Heading, Outcomes, Description, Suitable For, Prerequisites

4. **Accreditation & Certification** (menu_order: 3) - Accordion section
   - Accreditation, Certificate

5. **SEO & Content Settings** (menu_order: 4) - Optional overrides
   - Custom H1, Meta Title, Meta Description, Excerpt, Section Heading

### Course Event Fields (Already well organized)
1. **Event Details** (menu_order: 0)
2. **Event SEO** (menu_order: 1)
