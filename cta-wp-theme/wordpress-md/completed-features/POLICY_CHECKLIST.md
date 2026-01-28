# Policy Pages Checklist

This document outlines what each policy page should contain based on what the website actually uses.

## Privacy Policy (`privacy-policy` page)

### Required Sections:

1. **Data Controller**
   - Company: Continuity Training Academy
   - Email: enquiries@continuitytrainingacademy.co.uk
   - Phone: 01622 587343
   - Address: Maidstone, Kent, ME14 5NZ

2. **Information We Collect**
   - Contact forms: Name, Email, Phone, Address, Company name, Message
   - Newsletter signup: Email, Marketing consent
   - Course booking forms: Name, Email, Phone, Number of delegates, Additional info
   - Group training enquiries: Name, Email, Phone, Organisation name, Message
   - Callback requests: Name, Phone, Preferred callback time
   - Technical data: IP address, browser type, device info, pages visited (via Google Analytics if enabled)

3. **Legal Basis for Processing**
   - Consent (marketing emails)
   - Legitimate Interest (responding to enquiries)
   - Contract (processing bookings)

4. **How We Use Your Information**
   - Respond to enquiries
   - Process bookings
   - Send marketing emails (with consent)
   - Improve website performance
   - Business administration

5. **Sharing Your Information**
   - Mailchimp (email marketing - if used)
   - Google Analytics (website analytics - if enabled)
   - Service providers (hosting, security)

6. **Data Retention**
   - Enquiries: up to 12 months
   - Marketing data: until unsubscribe
   - Analytics: per Google Analytics retention policy
   - Course bookings: 7 years (tax/legal compliance)

7. **Your Rights (GDPR)**
   - Access, Rectification, Erasure, Restrict processing, Data portability, Object, Withdraw consent

8. **Cookies**
   - Link to Cookie Policy

9. **Data Transfers**
   - Mailchimp/Google may store data outside UK/EEA
   - Standard Contractual Clauses (SCCs) in place

10. **Contact Information**
    - Full contact details for data protection enquiries

---

## Cookie Policy (`cookie-policy` page)

### Required Sections:

1. **What Are Cookies?**
   - Explanation of cookies
   - Session vs persistent cookies
   - First-party vs third-party cookies

2. **Types of Cookies We Use**

   **Essential Cookies:**
   - Cookie consent preference (1 year)
   - WordPress session cookies
   - reCAPTCHA (if enabled) - for spam protection

   **Analytics Cookies (if Google Analytics enabled):**
   - Google Analytics 4 (GA4)
   - Cookies: _ga, _ga_*, _gid, _gat
   - Purpose: Website analytics and performance tracking
   - Requires consent: Yes

   **Marketing Cookies (if Facebook Pixel enabled):**
   - Facebook Pixel
   - Cookies: _fbp, fr
   - Purpose: Conversion tracking and remarketing
   - Requires consent: Yes

3. **Third-Party Cookies**
   - Google Analytics (if enabled)
   - Facebook Pixel (if enabled)
   - Google reCAPTCHA (if enabled)

4. **Managing Cookie Preferences**
   - Cookie consent banner explanation
   - Browser settings instructions
   - Links to browser-specific guides

5. **Cookie Duration**
   - Session cookies: deleted when browser closes
   - Consent preference: 1 year
   - Analytics cookies: typically 2 years (Google Analytics)

6. **Your Rights**
   - Right to know what cookies are used
   - Right to refuse non-essential cookies
   - Right to delete cookies

7. **Contact Information**
   - Full contact details for cookie-related enquiries

---

## Terms & Conditions (`terms-conditions` page)

### Required Sections:

1. **About Us**
   - Company details and contact information

2. **Eligibility**
   - Age requirement (18+)

3. **Use of Website**
   - Acceptable use
   - Prohibited activities

4. **No User Accounts**
   - No registration/login required

5. **Enquiries and Bookings**
   - Contact forms are for enquiries only
   - Bookings completed offline
   - No online payments

6. **Prices and Payment**
   - Prices for information only
   - Payments handled offline
   - No payment storage on website

7. **Intellectual Property**
   - Content ownership
   - Permitted uses
   - Prohibited uses

8. **Limitation of Liability**
   - Standard liability limitations
   - No fees for website use

9. **Data Protection**
   - Link to Privacy Policy

10. **Cookies**
    - Link to Cookie Policy

11. **Governing Law**
    - English law
    - English courts jurisdiction

12. **Changes to Terms**
    - How updates are communicated

13. **Contact Information**
    - Full contact details

---

## Quick Verification Steps

1. **Check each policy page exists:**
   - Go to WordPress Admin → Pages
   - Look for pages with slugs: `privacy-policy`, `cookie-policy`, `terms-conditions`

2. **Verify content includes:**
   - All sections listed above
   - Current contact information
   - Accurate description of data collection
   - Correct tracking services (only mention what's actually enabled)

3. **Check tracking services:**
   - WordPress Admin → Settings → API Keys
   - See which services are configured:
     - Google Analytics ID
     - Facebook Pixel ID
     - reCAPTCHA keys
   - Only mention services that are actually configured

4. **Update "Last updated" dates:**
   - Each policy should have a "Last updated: [Date]" at the top

5. **Test links:**
   - Privacy Policy should link to Cookie Policy
   - Cookie Policy should link to Privacy Policy
   - Terms should link to both Privacy and Cookie policies

---

## Notes

- Policies are stored as WordPress pages, not in code files
- Edit them via: WordPress Admin → Policy Pages menu, or Pages → Edit
- The page templates (`page-privacy.php`, `page-cookies.php`, `page-terms.php`) just render the page content
- All actual policy content is in the WordPress page editor

