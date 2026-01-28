# Form Submission Email Resend Feature

## Problem
The "Email Status" dropdown showed Pending/Sent/Failed but had no way to actually resend failed admin notification emails. It was just information with no action.

**What "Email Status" tracks:** Whether the **admin notification email** (to your enquiries inbox) was sent successfully when the form was submitted.

## Solution
Added a "Resend" button next to failed emails and a "Send Now" button next to pending emails.

---

## What Was Added

### **1. Resend Button in Email Status Column**
**Location:** `inc/form-submissions-admin.php` (line ~1376)

The email status column now displays:
- **Sent**: Just shows "Sent" status (no button needed)
- **Failed**: Shows "Failed" + **"Resend" button**
- **Pending**: Shows "Pending" + **"Send Now" button**

### **2. JavaScript Handler**
**Location:** Inline script in `cta_form_submission_enqueue_scripts()`

- Listens for clicks on `.cta-resend-email` buttons
- Shows confirmation dialog
- Sends AJAX request to resend email
- Updates UI on success/failure
- Disables button during sending to prevent double-clicks

### **3. AJAX Handler Function**
**Function:** `cta_resend_submission_email_ajax()`
**Hook:** `wp_ajax_cta_resend_submission_email`

**Security:**
- ✅ Nonce verification
- ✅ Admin context check
- ✅ Capability check (`edit_posts`)
- ✅ Input sanitization

**Process:**
1. Validates submission ID
2. Gets all submission data (name, email, phone, message, form fields)
3. Sends **admin notification email** to enquiries inbox via `wp_mail()`
4. Updates meta fields:
   - Sets `_submission_email_sent` to 'yes' on success
   - Deletes `_submission_email_error` on success
   - Sets error message on failure
5. Returns JSON response

---

## How It Works

### **User Flow:**
1. Admin sees "Failed" or "Pending" in Email Status column
2. Clicks "Resend" or "Send Now" button
3. Confirms action in dialog
4. Email is sent
5. Status updates to "Sent" on success

### **Email Content:**
**Sent to:** Admin enquiries inbox (`enquiries@continuitytrainingacademy.co.uk`)

- **Subject:** "New Form Submission: [Form Type]"
- **Body:** 
  - Form type and submission date
  - Contact details (name, email, phone)
  - Message content
  - Additional form fields
  - Link to view in WordPress admin
- **Format:** HTML email with clean styling

---

## Technical Details

### **Button Styling:**
```html
<button type="button" class="button button-small cta-resend-email" 
        data-post-id="123" style="margin-left: 8px;">
    Resend
</button>
```

### **AJAX Request:**
```javascript
$.ajax({
    url: ctaCRM.ajaxurl,
    type: 'POST',
    data: {
        action: 'cta_resend_submission_email',
        post_id: postId,
        nonce: ctaCRM.nonces.resend_email
    }
});
```

### **Meta Fields Updated:**
- `_submission_email_sent`: 'yes' or 'no'
- `_submission_email_error`: Error message (deleted on success)

---

## Benefits

### **Before:**
- ❌ Could see email failed but couldn't do anything about it
- ❌ Had to manually copy email and send outside WordPress
- ❌ No way to retry pending emails

### **After:**
- ✅ One-click resend for failed emails
- ✅ Can manually trigger pending emails
- ✅ Status updates automatically
- ✅ Proper error handling and user feedback

---

## Files Modified

1. **`wordpress-theme/inc/form-submissions-admin.php`**
   - Updated `email_status` column display (added buttons)
   - Added JavaScript handler for button clicks
   - Added `cta_resend_submission_email_ajax()` function
   - Added nonce to localized script data

**Total changes:** ~115 lines added

---

## Testing Checklist

- [ ] Click "Resend" on a failed email → Email sends, status updates to "Sent"
- [ ] Click "Send Now" on a pending email → Email sends, status updates to "Sent"
- [ ] Cancel confirmation dialog → Nothing happens
- [ ] Click button while sending → Button disabled, can't double-send
- [ ] Email fails to send → Status shows "Failed" with error message
- [ ] Check email arrives with correct content and formatting

---

## Result

The Email Status field is now **actionable**, not just informational. You can actually resend failed emails or manually trigger pending ones with a single click.
