<?php
/**
 * Template Name: For Professionals
 *
 * For LA/NHS commissioning and professional enquiries.
 *
 * @package ccs-theme
 */

get_header();

$contact = ccs_get_contact_info();
?>

<main id="main-content">
  <section class="group-hero-section" aria-labelledby="commissioning-heading">
    <div class="container">
      <nav aria-label="Breadcrumb" class="breadcrumb breadcrumb-hero">
        <ol class="breadcrumb-list">
          <li class="breadcrumb-item">
            <a href="<?php echo esc_url(home_url('/')); ?>" class="breadcrumb-link">Home</a>
          </li>
          <li class="breadcrumb-separator" aria-hidden="true">/</li>
          <li class="breadcrumb-item">
            <span class="breadcrumb-current" aria-current="page">For Professionals</span>
          </li>
        </ol>
      </nav>
      <h1 id="commissioning-heading" class="hero-title">For Professionals</h1>
      <p class="hero-subtitle">Commissioning and professional enquiries. We work with local authorities, NHS teams, and other professionals across Kent to deliver person-centred domiciliary care.</p>
    </div>
  </section>

  <section class="careers-intro-section commissioning-intro">
    <div class="container">
      <p class="careers-intro-lead">If you're a commissioner, social worker, or healthcare professional looking to discuss care packages, referrals, or partnership opportunities, please get in touch. We're CQC-rated Good and provide care across Maidstone, Kent, and Medway.</p>
    </div>
  </section>

  <section class="careers-form-section contact-main-section" aria-labelledby="commissioning-form-heading">
    <div class="container">
      <div class="contact-main-layout">
        <div class="contact-info-panel">
          <div class="contact-quick-cards-stacked">
            <a href="<?php echo esc_url($contact['phone_link']); ?>" class="contact-quick-card">
              <div class="contact-quick-icon-wrapper">
                <i class="fas fa-phone contact-quick-icon" aria-hidden="true"></i>
              </div>
              <div class="contact-quick-content">
                <h3 class="contact-quick-title">Office</h3>
                <p class="contact-quick-value"><?php echo esc_html($contact['phone']); ?></p>
              </div>
            </a>
            <a href="mailto:<?php echo esc_attr($contact['email']); ?>" class="contact-quick-card">
              <div class="contact-quick-icon-wrapper">
                <i class="fas fa-envelope contact-quick-icon" aria-hidden="true"></i>
              </div>
              <div class="contact-quick-content">
                <h3 class="contact-quick-title">Email</h3>
                <p class="contact-quick-value"><?php echo esc_html($contact['email']); ?></p>
              </div>
            </a>
          </div>
        </div>

        <div class="contact-form-panel">
          <div class="contact-form-card-new">
            <div class="contact-form-header">
              <h2 id="commissioning-form-heading" class="contact-form-heading">Send an enquiry</h2>
            </div>

            <div id="commissioning-form-success" class="contact-form-success" style="display: none" role="status">
              <i class="fas fa-check-circle contact-form-success-icon" aria-hidden="true"></i>
              <h3 class="contact-form-success-title">Enquiry sent</h3>
              <p class="contact-form-success-text">Thank you. Our commissioning team will contact you within 2 business days.</p>
            </div>

            <form id="commissioning-form" class="contact-form-new" novalidate aria-labelledby="commissioning-form-heading">
              <div id="commissioning-form-error-summary" class="contact-form-error-summary" role="alert" aria-live="assertive" style="display: none">
                <i class="fas fa-exclamation-circle" aria-hidden="true"></i>
                <div>
                  <strong>Please correct the following:</strong>
                  <ul id="commissioning-form-error-list"></ul>
                </div>
              </div>

              <div class="contact-form-fields-grid">
                <div class="contact-form-field">
                  <label for="commissioning-organization" class="contact-form-label">Organisation</label>
                  <div class="contact-form-input-wrapper-new">
                    <i class="fas fa-building contact-form-input-icon" aria-hidden="true"></i>
                    <input type="text" id="commissioning-organization" name="organization" class="contact-form-input" placeholder="e.g. Kent County Council" autocomplete="organization">
                  </div>
                </div>
                <div class="contact-form-field">
                  <label for="commissioning-contact-name" class="contact-form-label">
                    Your name <span class="contact-form-required">*</span>
                  </label>
                  <div class="contact-form-input-wrapper-new">
                    <i class="fas fa-user contact-form-input-icon" aria-hidden="true"></i>
                    <input type="text" id="commissioning-contact-name" name="contact_name" class="contact-form-input" placeholder="Full name" autocomplete="name" required aria-required="true">
                  </div>
                </div>
              </div>
              <div class="contact-form-field">
                <label for="commissioning-title" class="contact-form-label">Job title</label>
                <div class="contact-form-input-wrapper-new">
                  <i class="fas fa-id-badge contact-form-input-icon" aria-hidden="true"></i>
                  <input type="text" id="commissioning-title" name="title" class="contact-form-input" placeholder="e.g. Care Coordinator">
                </div>
              </div>
              <div class="contact-form-fields-grid">
                <div class="contact-form-field">
                  <label for="commissioning-email" class="contact-form-label">
                    Email <span class="contact-form-required">*</span>
                  </label>
                  <div class="contact-form-input-wrapper-new">
                    <i class="fas fa-envelope contact-form-input-icon" aria-hidden="true"></i>
                    <input type="email" id="commissioning-email" name="email" class="contact-form-input" placeholder="you@organisation.org" autocomplete="email" required aria-required="true">
                  </div>
                </div>
                <div class="contact-form-field">
                  <label for="commissioning-phone" class="contact-form-label">Phone</label>
                  <div class="contact-form-input-wrapper-new">
                    <i class="fas fa-phone contact-form-input-icon" aria-hidden="true"></i>
                    <input type="tel" id="commissioning-phone" name="phone" class="contact-form-input" placeholder="01622 123456" autocomplete="tel">
                  </div>
                </div>
              </div>
              <div class="contact-form-field">
                <label for="commissioning-inquiry-type" class="contact-form-label">Type of enquiry</label>
                <div class="contact-form-input-wrapper-new">
                  <select id="commissioning-inquiry-type" name="inquiry_type" class="contact-form-input">
                    <option value="">Select...</option>
                    <option value="commissioning">Commissioning / framework</option>
                    <option value="referral">Referral / placement</option>
                    <option value="partnership">Partnership opportunity</option>
                    <option value="other">Other</option>
                  </select>
                </div>
              </div>
              <div class="contact-form-field">
                <label for="commissioning-message" class="contact-form-label">Message</label>
                <div class="contact-form-textarea-wrapper-new">
                  <textarea id="commissioning-message" name="message" class="contact-form-textarea" rows="5" placeholder="Tell us about your enquiry."></textarea>
                </div>
              </div>
              <p class="contact-form-privacy">
                By submitting, you agree to our <a href="<?php echo esc_url(ccs_page_url('privacy')); ?>" class="contact-form-privacy-link">Privacy Policy</a>.
              </p>
              <div class="contact-form-actions">
                <button type="submit" id="commissioning-form-submit" class="btn btn-primary contact-form-submit">
                  <span id="commissioning-form-submit-text">Send enquiry</span>
                  <span id="commissioning-form-submit-loading" class="contact-form-submit-loading" style="display: none" aria-hidden="true">
                    <span class="contact-form-spinner" aria-hidden="true"></span>
                    <span>Sending...</span>
                  </span>
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>

<script>
(function() {
  var form = document.getElementById('commissioning-form');
  if (!form || typeof ccsData === 'undefined') return;
  var submitBtn = document.getElementById('commissioning-form-submit');
  var submitText = document.getElementById('commissioning-form-submit-text');
  var submitLoading = document.getElementById('commissioning-form-submit-loading');
  var successBlock = document.getElementById('commissioning-form-success');
  var errorSummary = document.getElementById('commissioning-form-error-summary');
  var errorList = document.getElementById('commissioning-form-error-list');

  form.addEventListener('submit', function(e) {
    e.preventDefault();
    var contactName = (document.getElementById('commissioning-contact-name') && document.getElementById('commissioning-contact-name').value) || '';
    var email = (document.getElementById('commissioning-email') && document.getElementById('commissioning-email').value) || '';
    if (!contactName.trim()) {
      if (errorList) errorList.innerHTML = '<li><a href="#commissioning-contact-name">Please enter your name</a></li>';
      if (errorSummary) errorSummary.style.display = 'block';
      return;
    }
    if (!email.trim()) {
      if (errorList) errorList.innerHTML = '<li><a href="#commissioning-email">Please enter your email</a></li>';
      if (errorSummary) errorSummary.style.display = 'block';
      return;
    }
    errorSummary.style.display = 'none';
    if (errorList) errorList.innerHTML = '';
    submitBtn.disabled = true;
    if (submitText) submitText.style.display = 'none';
    if (submitLoading) submitLoading.style.display = 'inline-flex';

    var formData = new FormData(form);
    formData.append('action', 'ccs_commissioning_enquiry');
    formData.append('nonce', ccsData.nonce);

    fetch(ccsData.ajaxUrl, {
      method: 'POST',
      body: formData,
      credentials: 'same-origin'
    })
      .then(function(r) { return r.json(); })
      .then(function(data) {
        if (data.success) {
          form.style.display = 'none';
          if (successBlock) successBlock.style.display = 'block';
        } else {
          if (errorList && data.data && data.data.errors) {
            var html = '';
            for (var k in data.data.errors) {
              var id = 'commissioning-' + k.replace(/_/g, '-');
              html += '<li><a href="#' + id + '">' + (data.data.errors[k] || '') + '</a></li>';
            }
            errorList.innerHTML = html;
          } else if (errorList) {
            errorList.innerHTML = '<li>' + (data.data && data.data.message ? data.data.message : 'Something went wrong. Please try again.') + '</li>';
          }
          if (errorSummary) errorSummary.style.display = 'block';
        }
      })
      .catch(function() {
        if (errorList) errorList.innerHTML = '<li>Network error. Please try again.</li>';
        if (errorSummary) errorSummary.style.display = 'block';
      })
      .finally(function() {
        submitBtn.disabled = false;
        if (submitText) submitText.style.display = 'inline';
        if (submitLoading) submitLoading.style.display = 'none';
      });
  });
})();
</script>

<?php get_footer(); ?>
