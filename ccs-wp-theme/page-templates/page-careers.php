<?php
/**
 * Template Name: Careers
 *
 * @package ccs-theme
 */

get_header();

$contact = ccs_get_contact_info();
$contact_page = ccs_page_url('contact');
$cta_website = 'https://www.continuitytrainingacademy.co.uk';
?>

<main id="main-content">
  <section class="group-hero-section" aria-labelledby="careers-heading">
    <div class="container">
      <nav aria-label="Breadcrumb" class="breadcrumb breadcrumb-hero">
        <ol class="breadcrumb-list">
          <li class="breadcrumb-item">
            <a href="<?php echo esc_url(home_url('/')); ?>" class="breadcrumb-link">Home</a>
          </li>
          <li class="breadcrumb-separator" aria-hidden="true">/</li>
          <li class="breadcrumb-item">
            <span class="breadcrumb-current" aria-current="page">Careers</span>
          </li>
        </ol>
      </nav>
      <h1 id="careers-heading" class="hero-title">Careers at Continuity of Care Services</h1>
      <p class="hero-subtitle">Join a team that takes time to get to know each person—not just their care plan. We don't rush or rotate staff.</p>
    </div>
  </section>

  <section class="careers-intro-section">
    <div class="container">
      <p class="careers-intro-lead">We're always looking for kind, reliable people who want to make a real difference in people's lives. If you share our values—consistency, compassion, and person-centred care—we'd like to hear from you.</p>
      <?php if ($contact_page) : ?>
        <p class="careers-intro-cta">
          <a href="<?php echo esc_url($contact_page); ?>" class="btn btn-secondary">General enquiries</a>
        </p>
      <?php endif; ?>
    </div>
  </section>

  <section class="careers-form-section contact-main-section" aria-labelledby="careers-form-heading">
    <div class="container">
      <div class="contact-main-layout">
        <div class="contact-info-panel">
          <div class="contact-quick-cards-stacked">
            <a href="<?php echo esc_url($contact['phone_link']); ?>" class="contact-quick-card">
              <div class="contact-quick-icon-wrapper">
                <i class="fas fa-phone contact-quick-icon" aria-hidden="true"></i>
              </div>
              <div class="contact-quick-content">
                <h3 class="contact-quick-title">Recruitment enquiries</h3>
                <p class="contact-quick-value"><?php echo esc_html($contact['phone']); ?></p>
              </div>
            </a>
            <a href="mailto:recruitment@continuitycareservices.co.uk" class="contact-quick-card">
              <div class="contact-quick-icon-wrapper">
                <i class="fas fa-envelope contact-quick-icon" aria-hidden="true"></i>
              </div>
              <div class="contact-quick-content">
                <h3 class="contact-quick-title">Email recruitment</h3>
                <p class="contact-quick-value">recruitment@continuitycareservices.co.uk</p>
              </div>
            </a>
          </div>

          <div class="careers-cta-training">
            <h3 class="careers-cta-training-heading">Training</h3>
            <p class="careers-cta-training-text">Our carers are trained at <a href="<?php echo esc_url($cta_website); ?>" class="careers-cta-training-link">Continuity Training Academy</a>—our sister company—so you can develop your skills with CQC-aligned, CPD-accredited courses.</p>
          </div>
        </div>

        <div class="contact-form-panel">
          <div class="contact-form-card-new">
            <div class="contact-form-header">
              <h2 id="careers-form-heading" class="contact-form-heading">Apply now</h2>
            </div>

            <div id="careers-form-success" class="contact-form-success" style="display: none" role="status">
              <i class="fas fa-check-circle contact-form-success-icon" aria-hidden="true"></i>
              <h3 class="contact-form-success-title">Application received</h3>
              <p class="contact-form-success-text">Thank you for applying. We will review your application and be in touch soon.</p>
            </div>

            <form id="careers-form" class="contact-form-new" novalidate aria-labelledby="careers-form-heading">
              <div id="careers-form-error-summary" class="contact-form-error-summary" role="alert" aria-live="assertive" style="display: none">
                <i class="fas fa-exclamation-circle" aria-hidden="true"></i>
                <div>
                  <strong>Please correct the following:</strong>
                  <ul id="careers-form-error-list"></ul>
                </div>
              </div>

              <div class="contact-form-fields-grid">
                <div class="contact-form-field">
                  <label for="careers-full-name" class="contact-form-label">
                    Full name <span class="contact-form-required">*</span>
                  </label>
                  <div class="contact-form-input-wrapper-new">
                    <i class="fas fa-user contact-form-input-icon" aria-hidden="true"></i>
                    <input type="text" id="careers-full-name" name="full_name" class="contact-form-input" placeholder="Your full name" autocomplete="name" required aria-required="true">
                  </div>
                </div>
                <div class="contact-form-field">
                  <label for="careers-email" class="contact-form-label">
                    Email <span class="contact-form-required">*</span>
                  </label>
                  <div class="contact-form-input-wrapper-new">
                    <i class="fas fa-envelope contact-form-input-icon" aria-hidden="true"></i>
                    <input type="email" id="careers-email" name="email" class="contact-form-input" placeholder="you@example.com" autocomplete="email" required aria-required="true">
                  </div>
                </div>
              </div>
              <div class="contact-form-field">
                <label for="careers-phone" class="contact-form-label">Phone</label>
                <div class="contact-form-input-wrapper-new">
                  <i class="fas fa-phone contact-form-input-icon" aria-hidden="true"></i>
                  <input type="tel" id="careers-phone" name="phone" class="contact-form-input" placeholder="01622 123456" autocomplete="tel">
                </div>
              </div>
              <div class="contact-form-field">
                <label for="careers-position" class="contact-form-label">Position you're interested in</label>
                <div class="contact-form-input-wrapper-new">
                  <i class="fas fa-briefcase contact-form-input-icon" aria-hidden="true"></i>
                  <input type="text" id="careers-position" name="position" class="contact-form-input" placeholder="e.g. Care Worker, Senior Carer">
                </div>
              </div>
              <div class="contact-form-field">
                <label for="careers-cover-letter" class="contact-form-label">Cover letter</label>
                <div class="contact-form-textarea-wrapper-new">
                  <textarea id="careers-cover-letter" name="cover_letter" class="contact-form-textarea" rows="5" placeholder="Tell us a bit about yourself and why you'd like to join us."></textarea>
                </div>
              </div>
              <div class="contact-form-field">
                <label for="careers-cv" class="contact-form-label">CV <span class="contact-form-optional">(optional)</span></label>
                <div class="contact-form-input-wrapper-new">
                  <input type="file" id="careers-cv" name="cv" class="contact-form-file" accept=".pdf,.doc,.docx" aria-describedby="careers-cv-hint">
                </div>
                <p id="careers-cv-hint" class="contact-form-hint">PDF, DOC or DOCX. Max 5MB.</p>
              </div>
              <p class="contact-form-privacy">
                By submitting, you agree to our <a href="<?php echo esc_url(ccs_page_url('privacy')); ?>" class="contact-form-privacy-link">Privacy Policy</a>.
              </p>
              <div class="contact-form-actions">
                <button type="submit" id="careers-form-submit" class="btn btn-primary contact-form-submit">
                  <span id="careers-form-submit-text">Send application</span>
                  <span id="careers-form-submit-loading" class="contact-form-submit-loading" style="display: none" aria-hidden="true">
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
  var form = document.getElementById('careers-form');
  if (!form || typeof ccsData === 'undefined') return;
  var submitBtn = document.getElementById('careers-form-submit');
  var submitText = document.getElementById('careers-form-submit-text');
  var submitLoading = document.getElementById('careers-form-submit-loading');
  var successBlock = document.getElementById('careers-form-success');
  var errorSummary = document.getElementById('careers-form-error-summary');
  var errorList = document.getElementById('careers-form-error-list');

  form.addEventListener('submit', function(e) {
    e.preventDefault();
    var fullName = (document.getElementById('careers-full-name') && document.getElementById('careers-full-name').value) || '';
    var email = (document.getElementById('careers-email') && document.getElementById('careers-email').value) || '';
    if (!fullName.trim()) {
      if (errorList) errorList.innerHTML = '<li><a href="#careers-full-name">Please enter your name</a></li>';
      if (errorSummary) errorSummary.style.display = 'block';
      return;
    }
    if (!email.trim()) {
      if (errorList) errorList.innerHTML = '<li><a href="#careers-email">Please enter your email</a></li>';
      if (errorSummary) errorSummary.style.display = 'block';
      return;
    }
    errorSummary.style.display = 'none';
    if (errorList) errorList.innerHTML = '';
    submitBtn.disabled = true;
    if (submitText) submitText.style.display = 'none';
    if (submitLoading) submitLoading.style.display = 'inline-flex';

    var formData = new FormData(form);
    formData.append('action', 'ccs_career_application');
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
              html += '<li><a href="#careers-' + k.replace('_', '-') + '">' + (data.data.errors[k] || '') + '</a></li>';
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
