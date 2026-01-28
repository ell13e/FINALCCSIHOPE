# CSS Overrides for Legal Pages (Privacy & Cookies)

## Summary
Found CSS styling systems that could affect privacy and cookie policy pages.

## CSS Classes Used by Templates

### Both Pages Use:
- `.page-hero-section.page-hero-section-simple` - Hero section
- `.legal-content-section` - Main content wrapper
- `.legal-content` - Content container (max-width: 800px)
- `.legal-cta-section` - CTA section at bottom

## CSS Definitions Found

### 1. Legal Content Styles (Lines 39459-39540)
**Location:** `assets/css/main.css`

```css
.legal-content-section {
  padding: var(--section-padding-mobile) 0;
}

.legal-content {
  max-width: 800px;
  margin: 0 auto;
  font-size: var(--font-size-body);
  line-height: var(--line-height-relaxed);
  color: var(--brown-medium);
}

.legal-content h2 {
  font-size: 1.75rem;
  font-weight: 700;
  color: var(--brown-dark);
  margin-top: 48px;
  margin-bottom: 24px;
  line-height: 1.3;
}

.legal-content h3 {
  font-size: 1.25rem;
  font-weight: 600;
  color: var(--brown-dark);
  margin-top: 32px;
  margin-bottom: 16px;
  line-height: 1.4;
}

.legal-content p {
  margin-bottom: 20px;
  max-width: var(--max-width-body); /* Line 622 - Optimal reading width */
}
```

### 2. Old Privacy Page Styles (Lines 35105-39556)
**Location:** `assets/css/main.css`

**Note:** These classes (`.cta-privacy-page`, `.cta-privacy-hero`, `.cta-privacy-content`) are NOT used by the current templates but exist in CSS. They may be from an old design system.

```css
.cta-privacy-page {
  background: var(--white);
}

.cta-privacy-hero {
  padding: 16px 16px 20px;
  text-align: center;
  background: var(--cream-light);
}

.cta-privacy-content h2 {
  font-size: 1.75rem;
  font-weight: 700;
  color: var(--brown-dark);
  margin-top: 48px;
  margin-bottom: 24px;
}
```

### 3. Hero Section Styles (Line 39596)
```css
.page-hero-section-simple {
  background: linear-gradient(180deg, #fefdfb 0%, #ffffff 100%);
  padding: 48px 0 40px;
}
```

### 4. Legal CTA Section (Lines 39543-39593)
```css
.legal-cta-section {
  padding: var(--section-padding-mobile) 0;
  background: var(--cream-light);
}

.legal-cta-content {
  max-width: 600px;
  margin: 0 auto;
  text-align: center;
}
```

## Potential Issues

### 1. Max-Width Constraint on Paragraphs
**Line 622:** `.legal-content p` has `max-width: var(--max-width-body)` which constrains paragraph width for optimal reading. This should apply to both pages equally.

### 2. Unused CSS Classes
The `.cta-privacy-*` classes (lines 35105-39556) are not used by current templates but exist in CSS. They could potentially conflict if accidentally applied.

### 3. Container Wrapper
Both templates use:
```html
<section class="legal-content-section">
  <div class="container">
    <div class="legal-content">
```

The `.container` class should provide consistent width constraints.

## Recommendations

1. **Verify both pages use identical HTML structure** - Both should have:
   - Same hero section classes
   - Same `legal-content-section` wrapper
   - Same `container` div
   - Same `legal-content` div

2. **Check for body class differences** - WordPress may add different body classes like:
   - `page-privacy-policy` vs `page-cookie-policy`
   - Check if any CSS targets these specifically

3. **Check browser cache** - Clear cache to ensure latest CSS is loaded

4. **Check WordPress page template assignment** - Ensure both pages are set to use their respective templates:
   - Privacy Policy page → "Privacy Policy" template
   - Cookie Policy page → "Cookie Policy" template

5. **Remove unused CSS** - Consider removing the `.cta-privacy-*` styles (lines 35105-39556) if they're not used anywhere to avoid confusion.

## Files to Check

1. `wordpress-theme/page-templates/page-privacy.php` - Privacy template
2. `wordpress-theme/page-templates/page-cookies.php` - Cookie template  
3. `wordpress-theme/assets/css/main.css` - Main stylesheet
4. `wordpress-theme/header.php` - Check body classes
5. WordPress Admin → Pages → Edit each page → Check "Template" dropdown

## CSS Specificity Check

If one page looks different, check for:
- More specific selectors targeting one page
- Inline styles in templates
- JavaScript adding styles
- Body class differences causing different styles to apply

