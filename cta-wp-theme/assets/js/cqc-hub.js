/**
 * CQC Hub JavaScript
 * Handles training selector and subscription bar functionality
 */

(function() {
  'use strict';
  
  // ============================================
  // Training Selector
  // ============================================
  
  const settingButtons = document.querySelectorAll('.cqc-setting-btn');
  const resultsContainer = document.getElementById('training-results');
  const resultsList = document.getElementById('results-list');
  const resultsTitle = document.getElementById('results-title');
  const resultsFooter = document.getElementById('results-footer');
  const totalCountSpan = document.getElementById('total-count');
  const collapseBtn = document.querySelector('.cqc-results-collapse');
  const dataSource = document.getElementById('training-data-source');
  
  const MAX_DISPLAY = 10;
  
  // Extract course data from hidden data source
  function getCoursesForSetting(setting) {
    const settingData = dataSource?.querySelector(`[data-setting="${setting}"]`);
    if (!settingData) return [];
    
    const listItems = settingData.querySelectorAll('li');
    const courses = [];
    
    listItems.forEach(li => {
      const text = li.textContent.trim();
      // Skip header text like "All residential care requirements plus:"
      if (!text.includes(':') && text.length > 0) {
        const link = li.querySelector('a');
        if (link) {
          courses.push({
            name: text,
            url: link.href
          });
        } else {
          courses.push({
            name: text,
            url: null
          });
        }
      }
    });
    
    return courses;
  }
  
  // Handle setting button clicks
  if (settingButtons.length > 0 && resultsContainer) {
    settingButtons.forEach(btn => {
      btn.addEventListener('click', function() {
        const setting = this.dataset.setting;
        const courses = getCoursesForSetting(setting);
        const totalCount = courses.length;
        const settingTitle = dataSource?.querySelector(`[data-setting="${setting}"]`)?.dataset.title || this.textContent.trim();
        
        // Update title
        resultsTitle.textContent = `Required Training: ${settingTitle}`;
        
        // Clear previous results
        resultsList.innerHTML = '';
        
        // Display courses (max 10)
        const displayCourses = courses.slice(0, MAX_DISPLAY);
        displayCourses.forEach(course => {
          const li = document.createElement('li');
          if (course.url) {
            li.innerHTML = `<a href="${course.url}">${course.name}</a>`;
          } else {
            li.textContent = course.name;
          }
          resultsList.appendChild(li);
        });
        
        // Show footer if more than MAX_DISPLAY
        if (totalCount > MAX_DISPLAY) {
          totalCountSpan.textContent = totalCount;
          resultsFooter.style.display = 'block';
        } else {
          resultsFooter.style.display = 'none';
        }
        
        // Update button states
        settingButtons.forEach(b => b.classList.remove('is-active'));
        this.classList.add('is-active');
        
        // Show results
        resultsContainer.style.display = 'block';
        
        // Scroll to results smoothly
        setTimeout(() => {
          resultsContainer.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
        }, 100);
      });
    });
    
    // Collapse results
    if (collapseBtn) {
      collapseBtn.addEventListener('click', function() {
        resultsContainer.style.display = 'none';
        // Reset button states
        settingButtons.forEach(btn => btn.classList.remove('is-active'));
      });
    }
  }
  
})();
