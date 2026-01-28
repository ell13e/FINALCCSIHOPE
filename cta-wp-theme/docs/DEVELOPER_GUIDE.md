# Developer Guide

**Quick reference for working with the CTA WordPress theme codebase.**

---

## How Forms Work

### Architecture Overview

Forms follow a **Controller → Service → Repository** pattern:

```
Frontend (JavaScript)
    ↓ AJAX Request
Legacy Handler (Facade) → Controller → FormValidator (Service)
    ↓                                    ↓
    └────────────────────────────────────┘
                    ↓
        FormSubmissionRepository
                    ↓
            WordPress Database
```

### Form Handler Flow

1. **Frontend** submits form via AJAX to WordPress action (e.g., `cta_contact_form`)
2. **Legacy Handler** (`inc/ajax-handlers.php`) acts as facade:
   - Checks if controller class exists
   - Instantiates controller and calls `handle()`
   - Falls back to legacy code if controller unavailable
3. **Controller** (`src/Controllers/`) processes request:
   - Validates nonce
   - Validates anti-bot (honeypot + timing)
   - Sanitizes inputs
   - Validates fields using `FormValidator` service
   - Saves submission via `FormSubmissionRepository`
   - Sends email
   - Handles newsletter subscription (if consent given)
   - Returns JSON response

### Available Form Controllers

- `ContactFormController` - General contact form
- `GroupBookingController` - Group training bookings
- `CourseBookingController` - Individual course bookings
- `NewsletterSignupController` - Newsletter subscriptions
- `CallbackRequestController` - Callback requests

### Adding a New Form Controller

1. **Create controller class:**
   ```php
   // src/Controllers/MyFormController.php
   namespace CTA\Controllers;
   
   use CTA\Services\FormValidator;
   use CTA\Repositories\FormSubmissionRepository;
   
   class MyFormController {
       private $validator;
       private $repository;
       
       public function __construct(?FormValidator $validator = null, ?FormSubmissionRepository $repository = null) {
           $this->validator = $validator ?? new FormValidator();
           $this->repository = $repository ?? new FormSubmissionRepository();
       }
       
       public function handle(): void {
           // Nonce verification
           // Anti-bot validation
           // Sanitize inputs
           // Validate using $this->validator
           // Save via $this->repository->create()
           // Send email
           // Return JSON response
       }
   }
   ```

2. **Update legacy handler:**
   ```php
   // inc/ajax-handlers.php
   function cta_handle_my_form() {
       if (class_exists('\\CTA\\Controllers\\MyFormController')) {
           $controller = new \CTA\Controllers\MyFormController();
           $controller->handle();
           return;
       }
       // Legacy fallback code
   }
   add_action('wp_ajax_cta_my_form', 'cta_handle_my_form');
   add_action('wp_ajax_nopriv_cta_my_form', 'cta_handle_my_form');
   ```

3. **Write unit test:**
   ```php
   // tests/Unit/Controllers/MyFormControllerTest.php
   class MyFormControllerTest extends TestCase {
       public function test_it_can_be_instantiated() { }
       public function test_it_has_handle_method() { }
   }
   ```

### Validation Patterns

Use `FormValidator` service for all validation:

```php
// Name validation (required)
$name_validation = $this->validator->validateName($name);
if (!$name_validation['valid']) {
    $errors['name'] = $name_validation['error'];
}

// Email validation (required)
$email_validation = $this->validator->validateEmail($email, true);
if (!$email_validation['valid']) {
    $errors['email'] = $email_validation['error'];
}

// Email validation (optional)
$email_validation = $this->validator->validateEmail($email, false);

// Phone validation
$phone_validation = $this->validator->validateUkPhone($phone);
if (!$phone_validation['valid']) {
    $errors['phone'] = $phone_validation['error'];
}

// Anti-bot validation
$bot_check = $this->validator->validateAntiBot('form-type');
if ($bot_check === false) {
    // Bot detected - silently accept
    wp_send_json_success(['message' => 'Thank you!']);
}
```

### Email Sending Patterns

```php
private function sendEmail(...): void {
    if (!defined('CTA_ENQUIRIES_EMAIL')) {
        return;
    }
    
    $to = CTA_ENQUIRIES_EMAIL;
    $subject = '...';
    $body = "...";
    
    $headers = [
        'Content-Type: text/plain; charset=UTF-8',
        'Reply-To: ' . $name . ' <' . $email . '>',
    ];
    
    $sent = wp_mail($to, $subject, $body, $headers);
    
    // Update submission with email status
    if (!is_wp_error($saved) && $saved) {
        update_post_meta($saved, '_submission_email_sent', $sent ? 'yes' : 'no');
    }
}
```

---

## How to Run Tests

### Setup

1. **Install dependencies:**
   ```bash
   composer install
   ```

2. **Run tests:**
   ```bash
   composer test
   # or
   vendor/bin/phpunit
   ```

### Test Structure

```
tests/
├── Unit/
│   ├── Controllers/        # Controller structure tests
│   ├── Services/           # Service logic tests
│   └── Repositories/       # Repository tests
└── Integration/            # Full integration tests (optional)
```

### Writing Tests

**Example: Service Test**
```php
namespace CTA\Tests\Unit\Services;

use PHPUnit\Framework\TestCase;
use CTA\Services\FormValidator;

class FormValidatorTest extends TestCase {
    private FormValidator $validator;
    
    protected function setUp(): void {
        $this->validator = new FormValidator();
    }
    
    /** @test */
    public function it_validates_correct_uk_phone(): void {
        $result = $this->validator->validateUkPhone('07123 456789');
        $this->assertTrue($result['valid']);
    }
}
```

**Example: Controller Test**
```php
namespace CTA\Tests\Unit\Controllers;

use PHPUnit\Framework\TestCase;
use CTA\Controllers\ContactFormController;

class ContactFormControllerTest extends TestCase {
    /** @test */
    public function it_can_be_instantiated(): void {
        $controller = new ContactFormController();
        $this->assertInstanceOf(ContactFormController::class, $controller);
    }
}
```

**Note:** Full integration tests require WordPress test environment setup. Current tests focus on structure and dependency injection.

---

## Code Organization

### Directory Structure

```
cta-wp-theme/
├── src/                    # PSR-4 autoloaded classes
│   ├── Controllers/        # Form handlers
│   ├── Services/           # Business logic
│   └── Repositories/      # Database operations
├── inc/                    # Legacy procedural code
│   ├── ajax-handlers.php  # Facades for controllers
│   └── ...                # Other legacy files
├── tests/                  # PHPUnit tests
├── assets/                 # Frontend assets
├── docs/                   # Documentation
└── functions.php           # Bootstrap (loads autoloader)
```

### PSR-4 Autoloading

Classes in `src/` are automatically loaded via Composer:

```php
// src/Services/FormValidator.php
namespace CTA\Services;
class FormValidator { }

// Usage (no require needed)
use CTA\Services\FormValidator;
$validator = new FormValidator();
```

**Namespace mapping:**
- `CTA\` → `src/`
- `CTA\Controllers\` → `src/Controllers/`
- `CTA\Services\` → `src/Services/`
- `CTA\Repositories\` → `src/Repositories/`

### Naming Conventions

- **Controllers:** `*Controller.php` (e.g., `ContactFormController.php`)
- **Services:** `*Service.php` or descriptive name (e.g., `FormValidator.php`)
- **Repositories:** `*Repository.php` (e.g., `FormSubmissionRepository.php`)
- **Tests:** `*Test.php` (e.g., `FormValidatorTest.php`)

### Where to Put New Code

- **New form handler?** → `src/Controllers/`
- **New validation logic?** → `src/Services/` (or extend `FormValidator`)
- **New database operations?** → `src/Repositories/`
- **New helper function?** → `inc/` (or create service if reusable)
- **New test?** → `tests/Unit/` (mirror `src/` structure)

---

## Common Tasks

### Adding a New Form Controller

See "Adding a New Form Controller" section above.

### Adding a New Service

1. **Create service class:**
   ```php
   // src/Services/MyService.php
   namespace CTA\Services;
   
   class MyService {
       public function doSomething(): void {
           // Business logic
       }
   }
   ```

2. **Use in controller:**
   ```php
   use CTA\Services\MyService;
   
   class MyController {
       private $service;
       
       public function __construct(?MyService $service = null) {
           $this->service = $service ?? new MyService();
       }
   }
   ```

3. **Write test:**
   ```php
   // tests/Unit/Services/MyServiceTest.php
   class MyServiceTest extends TestCase {
       public function test_it_does_something() { }
   }
   ```

### Adding a New Repository

1. **Create repository class:**
   ```php
   // src/Repositories/MyRepository.php
   namespace CTA\Repositories;
   
   class MyRepository {
       public function create(array $data): int {
           // Database operations
       }
       
       public function findById(int $id): ?array {
           // Retrieve from database
       }
   }
   ```

2. **Use in controller:**
   ```php
   use CTA\Repositories\MyRepository;
   
   class MyController {
       private $repository;
       
       public function __construct(?MyRepository $repository = null) {
           $this->repository = $repository ?? new MyRepository();
       }
   }
   ```

### Debugging Form Submissions

1. **Check WordPress admin:**
   - Go to Form Submissions post type
   - View submission details
   - Check email status meta fields

2. **Check error logs:**
   ```bash
   # WordPress debug log
   tail -f wp-content/debug.log
   ```

3. **Enable WP_DEBUG:**
   ```php
   // wp-config.php
   define('WP_DEBUG', true);
   define('WP_DEBUG_LOG', true);
   ```

4. **Check AJAX response:**
   - Open browser DevTools → Network tab
   - Submit form
   - Inspect AJAX response for errors

### Running Composer Commands

```bash
# Install dependencies
composer install

# Run tests
composer test

# Update autoloader (after adding new classes)
composer dump-autoload
```

---

## Key Principles

1. **Backward Compatibility:** All AJAX action names remain unchanged
2. **Dependency Injection:** Controllers accept services via constructor (testable)
3. **Legacy Fallback:** Legacy code remains as fallback in facades
4. **Progressive Enhancement:** New code uses modern patterns, legacy code works alongside
5. **Test What Matters:** Focus tests on business logic, not WordPress internals

---

## Quick Reference

**Form Controllers:**
- `ContactFormController`
- `GroupBookingController`
- `CourseBookingController`
- `NewsletterSignupController`
- `CallbackRequestController`

**Services:**
- `FormValidator` - Validation logic

**Repositories:**
- `FormSubmissionRepository` - Form submission database operations

**Legacy Functions (still used for fallback):**
- `cta_handle_*()` - Form handler facades
- `cta_save_form_submission()` - Delegates to repository
- `cta_validate_*()` - Legacy validation (used in fallback code)

---

**Need help?** Check `docs/ARCHITECTURE.md` for detailed architecture documentation.
