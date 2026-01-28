<?php
/**
 * CQC Training Requirements Section
 * 
 * Displays the 5 fundamental CQC standards with associated training courses
 * 
 * @package CTA_Theme
 */

$cqc_standards = [
  [
    'id' => 'safe',
    'title' => 'Safe',
    'icon' => '<svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path></svg>',
    'color' => 'blue',
    'courses' => [
      'First Aid',
      'Moving & Handling',
      'Safeguarding',
      'Health & Safety',
      'Fire Safety',
      'Infection Control'
    ]
  ],
  [
    'id' => 'effective',
    'title' => 'Effective',
    'icon' => '<svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>',
    'color' => 'green',
    'courses' => [
      'Care Certificate',
      'Competency Assessments',
      'Medication Management',
      'Clinical Skills'
    ]
  ],
  [
    'id' => 'caring',
    'title' => 'Caring',
    'icon' => '<svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path></svg>',
    'color' => 'pink',
    'courses' => [
      'Dignity & Respect',
      'Communication Skills',
      'Person-Centred Care',
      'Equality & Diversity'
    ]
  ],
  [
    'id' => 'responsive',
    'title' => 'Responsive',
    'icon' => '<svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>',
    'color' => 'amber',
    'courses' => [
      'Dementia Care',
      'Learning Disabilities',
      'MCA & DoLS',
      'End of Life Care'
    ]
  ],
  [
    'id' => 'well-led',
    'title' => 'Well-Led',
    'icon' => '<svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><line x1="19" y1="8" x2="19" y2="14"></line><line x1="22" y1="11" x2="16" y2="11"></line></svg>',
    'color' => 'purple',
    'courses' => [
      'Leadership & Management',
      'Supervision Skills',
      'Information Handling',
      'Governance'
    ]
  ]
];
?>

<section class="cqc-requirements-section" aria-labelledby="cqc-requirements-heading">
  <div class="container">
    
    <!-- Section Header -->
    <div class="cqc-requirements-header">
      <h2 id="cqc-requirements-heading" class="cqc-requirements-title">
        Understanding CQC Training Requirements
      </h2>
      <p class="cqc-requirements-description">
        The Care Quality Commission (CQC) sets standards for health and social care services in England. 
        Our CQC-compliant training courses help care providers meet these requirements and prepare for inspections.
      </p>
    </div>

    <!-- Standards Grid -->
    <div class="cqc-standards-grid">
      <?php foreach ($cqc_standards as $standard) : ?>
      <article class="cqc-standard-card cqc-standard-<?php echo esc_attr($standard['color']); ?>">
        
        <!-- Card Header (Clickable) -->
        <button 
          class="cqc-standard-header"
          aria-expanded="true"
          aria-controls="cqc-content-<?php echo esc_attr($standard['id']); ?>"
          type="button"
        >
          <div class="cqc-standard-icon" aria-hidden="true">
            <?php echo $standard['icon']; ?>
          </div>
          <h3 class="cqc-standard-title"><?php echo esc_html($standard['title']); ?></h3>
          <svg class="cqc-accordion-icon" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
            <polyline points="6 9 12 15 18 9"></polyline>
          </svg>
        </button>

        <!-- Course List (Collapsible) -->
        <ul class="cqc-course-list" id="cqc-content-<?php echo esc_attr($standard['id']); ?>" aria-hidden="false">
          <?php foreach ($standard['courses'] as $course) : ?>
          <li class="cqc-course-item">
            <svg class="cqc-course-check" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
              <polyline points="20 6 9 17 4 12"></polyline>
            </svg>
            <span><?php echo esc_html($course); ?></span>
          </li>
          <?php endforeach; ?>
        </ul>

      </article>
      <?php endforeach; ?>
    </div>

  </div>
</section>

<script>
// CQC Standards Accordion Functionality
(function() {
  'use strict';
  
  document.addEventListener('DOMContentLoaded', function() {
    const accordionHeaders = document.querySelectorAll('.cqc-standard-header');
    
    accordionHeaders.forEach(function(header) {
      // Prevent double-binding
      if (header.dataset.accordionInit === 'true') return;
      header.dataset.accordionInit = 'true';
      
      header.addEventListener('click', function() {
        const isExpanded = this.getAttribute('aria-expanded') === 'true';
        const contentId = this.getAttribute('aria-controls');
        const content = document.getElementById(contentId);
        
        if (content) {
          if (isExpanded) {
            // Closing
            this.setAttribute('aria-expanded', 'false');
            content.setAttribute('aria-hidden', 'true');
            content.style.maxHeight = '0';
          } else {
            // Opening - calculate actual height for smooth transition
            this.setAttribute('aria-expanded', 'true');
            content.setAttribute('aria-hidden', 'false');
            // Temporarily set to auto to get real height
            content.style.maxHeight = 'none';
            const height = content.scrollHeight;
            // Set back to 0, then animate to actual height
            content.style.maxHeight = '0';
            // Force reflow
            void content.offsetHeight;
            // Animate to actual height
            requestAnimationFrame(function() {
              content.style.maxHeight = height + 'px';
            });
          }
        } else {
          // Fallback if content not found
          this.setAttribute('aria-expanded', (!isExpanded).toString());
        }
      });
      
      // Keyboard accessibility
      header.addEventListener('keydown', function(e) {
        if (e.key === 'Enter' || e.key === ' ') {
          e.preventDefault();
          this.click();
        }
      });
    });
  });
})();
</script>

<style>
/* CQC Accordion Styles */
.cqc-standard-header {
  display: flex;
  align-items: center;
  gap: 1rem;
  width: 100%;
  text-align: left;
  background: none;
  border: none;
  padding: 0;
  cursor: pointer;
  transition: opacity 0.2s;
}

.cqc-standard-header:hover {
  opacity: 0.8;
}

.cqc-standard-header:focus {
  outline: 2px solid currentColor;
  outline-offset: 2px;
}

.cqc-accordion-icon {
  margin-left: auto;
  transition: transform 0.3s ease;
}

.cqc-standard-header[aria-expanded="false"] .cqc-accordion-icon {
  transform: rotate(-90deg);
}

.cqc-course-list {
  max-height: 1000px;
  overflow: hidden;
  transition: max-height 0.3s ease, opacity 0.3s ease;
  opacity: 1;
}

.cqc-course-list[aria-hidden="true"] {
  max-height: 0;
  opacity: 0;
}
</style>
