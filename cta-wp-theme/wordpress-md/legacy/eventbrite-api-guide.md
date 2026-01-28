# Eventbrite Platform API - Comprehensive Documentation

## Table of Contents

1. [Introduction](#introduction)
2. [API Overview](#api-overview)
3. [Authentication & Authorization](#authentication--authorization)
4. [API Endpoints & Objects](#api-endpoints--objects)
5. [Core Operations](#core-operations)
6. [Rate Limits & Quotas](#rate-limits--quotas)
7. [Response Format & Error Handling](#response-format--error-handling)
8. [Webhooks](#webhooks)
9. [Common Use Cases & Integration Examples](#common-use-cases--integration-examples)
10. [Best Practices](#best-practices)

---

## Introduction

The Eventbrite API is a RESTful web service that enables developers to integrate Eventbrite's event management and ticketing platform with external applications, websites, and workflows. The API allows you to programmatically access and manipulate event data, manage attendees, process orders, configure ticket classes, and receive real-time notifications through webhooks.

### Key Capabilities

- **Event Management**: Create, read, update, delete, publish, and unpublish events
- **Attendee Management**: Track attendees, filter by status, and manage attendance
- **Ticket Management**: Configure ticket types, pricing, and availability
- **Order Tracking**: Monitor ticket sales and collect order information
- **Venue Operations**: Create and manage event venues
- **Discount Management**: Create promotional codes, public discounts, access codes, and holds
- **Webhooks**: Receive real-time notifications for event changes and ticket sales

---

## API Overview

### API Architecture

The Eventbrite API follows REST (Representational State Transfer) principles and is designed to be simple, scalable, and flexible. It uses standard HTTP methods (GET, POST, PUT, DELETE) and returns responses in JSON format.

**API Base URL:**
```
https://www.eventbriteapi.com/v3/
```

**Current API Version:** v3 (stable since 2015)

### Why REST API?

- Well-suited for web and mobile applications
- Scalable and flexible architecture
- Simple and intuitive endpoint design
- Easy to test and debug
- Widely supported across programming languages

---

## Authentication & Authorization

### Authentication Methods

#### 1. **Private Token (Personal Access Token)**

The simplest authentication method for personal use and small-scale integrations.

**How to Generate:**
1. Log into your Eventbrite account
2. Navigate to Account Settings → API Keys (or Developer section)
3. Generate a new private token
4. Copy the token securely

**Usage in Requests:**
```
Authorization: Bearer YOUR_PRIVATE_TOKEN
Content-Type: application/json
```

**Example cURL Request:**
```bash
curl --include \
  --header "Authorization: Bearer YOUR_PRIVATE_TOKEN" \
  --header "Content-Type: application/json" \
  'https://www.eventbriteapi.com/v3/users/me/'
```

#### 2. **OAuth 2.0 Flow (Public Applications)**

For applications that need to access user accounts on their behalf, OAuth 2.0 is the recommended authentication method.

**OAuth 2.0 Implementation Steps:**

1. **Register Your Application**
   - Create an Eventbrite account if you don't have one
   - Go to Account Settings → API Keys
   - Register a new app with the following information:
     - Application name
     - Redirect URI (where users will be sent after authorization)
   - Receive a Client ID and Client Secret

2. **Set Redirect URI**
   - Configure your application's redirect_uri on the Eventbrite API settings page
   - This must match the URI used in your authorization request

3. **Authorization Code Flow**

   **Step 1:** Direct users to the authorization URL:
   ```
   https://www.eventbrite.com/oauth/authorize?response_type=code&client_id=YOUR_CLIENT_ID&redirect_uri=YOUR_REDIRECT_URI
   ```

   **Step 2:** User authorizes your application and is redirected with an authorization code:
   ```
   https://your-site.com/callback?code=AUTHORIZATION_CODE
   ```

   **Step 3:** Exchange authorization code for access token (server-side):
   ```bash
   curl -X POST https://www.eventbrite.com/oauth/token \
     -d "code=AUTHORIZATION_CODE&client_id=YOUR_CLIENT_ID&client_secret=YOUR_CLIENT_SECRET&grant_type=authorization_code&redirect_uri=YOUR_REDIRECT_URI"
   ```

   **Step 4:** Use the access token in subsequent API requests:
   ```
   Authorization: Bearer ACCESS_TOKEN
   ```

### OAuth Scopes & Permissions

Common scopes for Eventbrite OAuth applications:

| Scope | Description | Access Level |
|-------|-------------|--------------|
| `event.read` | Read event information | Read-only |
| `event.write` | Create, update, delete events | Read/Write |
| `order.read` | Access order information | Read-only |
| `attendee.read` | View attendee details and lists | Read-only |
| `venue.read` | Read venue information | Read-only |
| `venue.write` | Create and modify venues | Read/Write |
| `organization.read` | Access organization data | Read-only |
| `user.read` | Access user profile information | Read-only |

---

## API Endpoints & Objects

### Core Data Objects

The Eventbrite API uses "objects" (similar to resources) that represent different entities in the platform:

#### 1. **Event Object**

Represents an Eventbrite Event with comprehensive details.

**Key Properties:**
- `id` - Unique event identifier
- `name` - Event title (text object with multilingual support)
- `description` - Event description (text object)
- `start` - Event start date/time (timezone-aware)
- `end` - Event end date/time
- `summary` - Short event summary (140 characters)
- `status` - Event status (draft, live, ended, canceled)
- `category_id` - Event category
- `subcategory_id` - Event subcategory
- `capacity` - Maximum attendees allowed
- `venue_id` - Associated venue ID
- `logo` - Event logo/image
- `organizer_id` - Event organizer ID

**Endpoints:**

| Endpoint | Method | Description |
|----------|--------|-------------|
| `/organizations/{org_id}/events/` | POST | Create new event |
| `/events/{event_id}/` | GET | Retrieve event details |
| `/events/{event_id}/` | POST | Update event |
| `/events/{event_id}/` | DELETE | Delete event |
| `/organizations/{org_id}/events/` | GET | List organization's events |
| `/events/{event_id}/publish/` | POST | Publish draft event |
| `/events/{event_id}/unpublish/` | POST | Unpublish live event to draft |
| `/events/{event_id}/cancel/` | POST | Cancel event |
| `/events/{event_id}/copy/` | POST | Duplicate event |
| `/events/{event_id}/description/` | GET | Retrieve full HTML description |

#### 2. **Attendee Object**

Represents individual event attendees and ticket purchasers.

**Key Properties:**
- `id` - Unique attendee identifier
- `email` - Attendee email address
- `name` - Attendee full name
- `first_name` - First name
- `last_name` - Last name
- `status` - Attendance status (attending, not attending, unpaid)
- `event_id` - Associated event ID
- `ticket_class_id` - Ticket type purchased
- `order_id` - Associated order ID
- `checked_in` - Boolean indicating check-in status
- `created` - Timestamp of creation

**Endpoints:**

| Endpoint | Method | Description |
|----------|--------|-------------|
| `/events/{event_id}/attendees/` | GET | List event attendees |
| `/events/{event_id}/attendees/{attendee_id}/` | GET | Get specific attendee details |
| `/organizations/{org_id}/attendees/` | GET | List organization attendees |

#### 3. **Order Object**

Represents ticket purchase orders.

**Key Properties:**
- `id` - Unique order identifier
- `event_id` - Associated event
- `user_id` - Purchaser user ID
- `email` - Purchaser email
- `status` - Order status (placed, paid, pending, refunded)
- `created` - Order creation timestamp
- `costs` - Pricing breakdown (base price, fees, taxes, gross)
- `attendees` - List of attendees in order

**Endpoints:**

| Endpoint | Method | Description |
|----------|--------|-------------|
| `/events/{event_id}/orders/` | GET | List event orders |
| `/orders/{order_id}/` | GET | Retrieve order details |
| `/organizations/{org_id}/orders/` | GET | List organization orders |

#### 4. **Ticket Class Object**

Defines ticket types and pricing for events.

**Key Properties:**
- `id` - Unique ticket class identifier
- `event_id` - Associated event
- `name` - Ticket type name
- `description` - Ticket description
- `quantity_total` - Total tickets available
- `quantity_sold` - Tickets sold
- `capacity` - Maximum tickets for this class
- `cost` - Price in cents
- `fee` - Service fees
- `tax` - Applied taxes
- `on_sale_status` - Sales status (on sale, off sale, not on sale)

**Endpoints:**

| Endpoint | Method | Description |
|----------|--------|-------------|
| `/events/{event_id}/ticket_classes/` | GET | List ticket classes |
| `/events/{event_id}/ticket_classes/{ticket_class_id}/` | GET | Get ticket class details |
| `/events/{event_id}/ticket_classes/` | POST | Create ticket class |
| `/events/{event_id}/ticket_classes/{ticket_class_id}/` | POST | Update ticket class |
| `/events/{event_id}/ticket_classes/{ticket_class_id}/` | DELETE | Delete ticket class |

#### 5. **Discount Object**

Represents promotional pricing strategies.

**Types of Discounts:**

| Type | Description | Visibility |
|------|-------------|------------|
| **Public Discounts** | Shown publicly on event listings and checkout | Public |
| **Coded Discounts** | Require secret code to redeem | Private (code-protected) |
| **Access Codes** | Show hidden/restricted tickets with optional discount | Private |
| **Hold Discounts** | Applied to reserved/held seats | Internal |

**Key Properties:**
- `id` - Unique discount identifier
- `type` - Discount type (public, coded, access, hold)
- `code` - Discount code (if applicable)
- `amount_off` - Fixed amount discount
- `percent_off` - Percentage discount (1.00% to 100.00%)
- `quantity_available` - Maximum redemptions
- `quantity_used` - Current redemptions
- `event_id` - Associated event
- `ticket_class_ids` - Applicable ticket types

**Discount Parameters:**

| Parameter | Type | Range | Description |
|-----------|------|-------|-------------|
| `amount_off` | Decimal | 0.01 to 99,999.99 | Fixed amount in event currency |
| `percent_off` | Decimal | 1.00 to 100.00 | Percentage off original price |
| `start_date` | String | ISO 8601 | When discount becomes active |
| `end_date` | String | ISO 8601 | When discount expires |
| `start_type` | String | absolute/relative | Fixed date or relative to event |
| `end_type` | String | absolute/relative | Fixed date or relative to event |

**Endpoints:**

| Endpoint | Method | Description |
|----------|--------|-------------|
| `/organizations/{org_id}/discounts/` | POST | Create discount |
| `/discounts/{discount_id}/` | POST | Update discount |
| `/events/{event_id}/discounts/` | GET | List event discounts |
| `/events/{event_id}/discounts/{discount_id}/` | GET | Get discount details |

#### 6. **Venue Object**

Represents event locations.

**Key Properties:**
- `id` - Unique venue identifier
- `name` - Venue name
- `address` - Street address
- `city` - City name
- `region` - State/region
- `postal_code` - ZIP/postal code
- `country` - Country
- `latitude` - Geographic latitude
- `longitude` - Geographic longitude

**Endpoints:**

| Endpoint | Method | Description |
|----------|--------|-------------|
| `/organizations/{org_id}/venues/` | GET | List organization venues |
| `/organizations/{org_id}/venues/` | POST | Create new venue |
| `/venues/{venue_id}/` | GET | Get venue details |
| `/venues/{venue_id}/` | POST | Update venue |

#### 7. **Category Object**

Represents event categories and subcategories.

**Endpoints:**

| Endpoint | Method | Description |
|----------|--------|-------------|
| `/categories/` | GET | List all categories with subcategories |
| `/categories/{category_id}/` | GET | Get category details |
| `/categories/{category_id}/subcategories/` | GET | List subcategories |

#### 8. **Organization Object**

Represents user organizations or accounts managing events.

**Key Properties:**
- `id` - Organization identifier
- `name` - Organization name
- `logo` - Organization logo
- `vertical` - Industry vertical

**Endpoints:**

| Endpoint | Method | Description |
|----------|--------|-------------|
| `/users/me/organizations/` | GET | List user's organizations |
| `/organizations/{org_id}/` | GET | Get organization details |

#### 9. **User Object**

Represents Eventbrite user accounts.

**Endpoints:**

| Endpoint | Method | Description |
|----------|--------|-------------|
| `/users/me/` | GET | Get authenticated user profile |
| `/users/{user_id}/events/` | GET | Get user's created events |
| `/users/{user_id}/owned_events/` | GET | Get user's owned events |

---

## Core Operations

### Creating an Event

**Endpoint:** `POST /organizations/{organization_id}/events/`

**Required Parameters:**
```json
{
  "event": {
    "name": {
      "text": "My Awesome Event"
    },
    "description": {
      "text": "Event description here"
    },
    "start": {
      "timezone": "America/New_York",
      "local": "2026-06-15T10:00:00"
    },
    "end": {
      "timezone": "America/New_York",
      "local": "2026-06-15T14:00:00"
    },
    "currency": "USD"
  }
}
```

**Optional Parameters:**
- `summary` - Event summary (max 140 characters)
- `logo` - Event logo image
- `category_id` - Event category ID
- `subcategory_id` - Event subcategory ID
- `capacity` - Maximum attendees
- `venue_id` - Associated venue ID
- `organizer_id` - Event organizer

### Updating Event Details

**Endpoint:** `POST /events/{event_id}/`

**Modifiable Fields:**
- `name`
- `description`
- `summary`
- `start` and `end` times
- `logo`
- `capacity`
- `status`

### Publishing Events

**Draft to Live:**
```
POST /events/{event_id}/publish/
```

**Live to Draft:**
```
POST /events/{event_id}/unpublish/
```

**Cancel Event:**
```
POST /events/{event_id}/cancel/
```

### Managing Ticket Classes

**Create Ticket Class:**
```
POST /events/{event_id}/ticket_classes/
```

**Payload:**
```json
{
  "ticket_class": {
    "name": "General Admission",
    "description": "General admission ticket",
    "quantity_total": 100,
    "cost": 5000,
    "currency": "USD"
  }
}
```

### Retrieving Attendee Lists

**Get All Event Attendees:**
```
GET /events/{event_id}/attendees/?expand=answers,profile
```

**Query Parameters:**
- `status` - Filter by attending/not_attending/unpaid
- `page` - Page number for pagination
- `page_size` - Results per page

**Response Structure:**
```json
{
  "attendees": [
    {
      "id": "123456",
      "email": "attendee@example.com",
      "name": "John Doe",
      "status": "attending",
      "checked_in": false
    }
  ],
  "pagination": {
    "page": 1,
    "page_size": 50,
    "page_count": 2,
    "total": 75
  }
}
```

### Creating Discounts

**Create Public Discount:**
```
POST /organizations/{org_id}/discounts/
```

**Payload:**
```json
{
  "discount": {
    "type": "public",
    "code": "SAVE10",
    "amount_off": 1000,
    "event_id": "{event_id}",
    "ticket_class_ids": ["{ticket_class_id}"],
    "quantity_available": 50
  }
}
```

**Create Coded Discount (requires code to redeem):**
```json
{
  "discount": {
    "type": "coded",
    "code": "SECRET123",
    "percent_off": 20,
    "event_id": "{event_id}",
    "quantity_available": 25
  }
}
```

---

## Rate Limits & Quotas

### Default Rate Limits

| Metric | Limit | Notes |
|--------|-------|-------|
| **API Calls per Hour** | 1,000 | Per OAuth token |
| **API Calls per Day** | 24,000 | Per OAuth token |
| **Alternative Limit** | 2,000/hour | Some sources indicate this limit |

### Rate Limit Headers

When making API requests, Eventbrite returns rate limit information in response headers:

```
X-RateLimit-Limit: 1000
X-RateLimit-Remaining: 999
X-RateLimit-Reset: 1641234567
```

### Rate Limit Best Practices

1. **Monitor remaining calls** - Check `X-RateLimit-Remaining` header
2. **Implement exponential backoff** - Retry with increasing delays on rate limit errors
3. **Cache responses** - Store frequently-accessed data to reduce API calls
4. **Batch operations** - Combine multiple operations when possible
5. **Throttle requests** - Add delays between requests during bulk operations

### Handling Rate Limit Errors

**HTTP 429 Status Code - Too Many Requests**

When rate limit is exceeded:
```json
{
  "status_code": 429,
  "error": "RATE_LIMIT_EXCEEDED",
  "error_description": "Rate limit exceeded. Please retry after some time."
}
```

**Recommended Retry Strategy:**
```python
import time
import requests

max_retries = 3
for attempt in range(max_retries):
    response = requests.get(url, headers=headers)
    if response.status_code == 429:
        retry_after = int(response.headers.get('X-RateLimit-Reset', 60))
        time.sleep(retry_after)
        continue
    break
```

---

## Response Format & Error Handling

### Successful Response Format

All successful API responses return HTTP status 200-201 with JSON body:

```json
{
  "id": "123456",
  "name": {
    "text": "Event Name"
  },
  "description": {
    "text": "Event description"
  },
  "created": "2023-01-15T10:30:00Z",
  "modified": "2023-01-20T14:20:00Z"
}
```

### Pagination

Results are paginated by default. Response includes pagination metadata:

```json
{
  "items": [ /* array of objects */ ],
  "pagination": {
    "object_count": 75,
    "page_number": 1,
    "page_size": 50,
    "page_count": 2,
    "has_more_items": true
  }
}
```

**Pagination Parameters:**
- `page` - Page number (starts at 1)
- `page_size` - Results per page (default 50, max typically 200)

### Common HTTP Status Codes

| Status | Meaning | Example |
|--------|---------|---------|
| **200** | OK - Request successful | GET request returns data |
| **201** | Created - New resource created | POST creates event |
| **204** | No Content - Success, no response body | DELETE successful |
| **400** | Bad Request - Invalid parameters | Missing required field |
| **401** | Unauthorized - Authentication failed | Invalid or missing token |
| **403** | Forbidden - No permission | Accessing another user's event |
| **404** | Not Found - Resource doesn't exist | Event ID doesn't exist |
| **429** | Rate Limited - Too many requests | Exceeded API quota |
| **500** | Server Error - Eventbrite issue | Service temporarily unavailable |
| **502** | Bad Gateway - Service temporarily down | Maintenance window |

### Error Response Format

```json
{
  "status_code": 400,
  "error": "INVALID_PARAMETER",
  "error_description": "The parameter 'start' is required"
}
```

### Common Error Codes

| Error Code | HTTP Status | Cause |
|-----------|------------|-------|
| `INVALID_PARAMETER` | 400 | Missing or malformed parameter |
| `INVALID_REQUEST_BODY` | 400 | Invalid JSON structure |
| `AUTHENTICATION_REQUIRED` | 401 | Missing or invalid token |
| `UNAUTHORIZED` | 403 | Insufficient permissions for resource |
| `NOT_FOUND` | 404 | Resource doesn't exist |
| `RESOURCE_CONFLICT` | 409 | Operation conflicts with current state |
| `RATE_LIMIT_EXCEEDED` | 429 | Too many requests |
| `INTERNAL_SERVER_ERROR` | 500 | Server-side error |

### Handling Errors

**Example Error Handling in JavaScript:**
```javascript
async function fetchEventData(eventId) {
  try {
    const response = await fetch(
      `https://www.eventbriteapi.com/v3/events/${eventId}/`,
      {
        headers: {
          'Authorization': `Bearer ${TOKEN}`
        }
      }
    );
    
    if (!response.ok) {
      const error = await response.json();
      throw new Error(`API Error: ${error.error} - ${error.error_description}`);
    }
    
    return await response.json();
  } catch (error) {
    console.error('Failed to fetch event:', error.message);
  }
}
```

---

## Webhooks

### Overview

Webhooks enable real-time notifications when events occur in your Eventbrite account. Instead of polling the API, Eventbrite sends HTTP POST requests to your configured endpoint.

### Supported Webhook Events

Common webhook events include:

| Event | Trigger | Data Sent |
|-------|---------|-----------|
| `order.placed` | New ticket order | Order details, attendees |
| `order.updated` | Order status change | Updated order info |
| `order.refunded` | Order refunded | Refund details |
| `attendee.updated` | Attendee information changed | Attendee details |
| `event.published` | Event goes live | Event details |
| `event.updated` | Event modified | Updated event info |
| `event.canceled` | Event canceled | Event ID, cancellation info |

### Configuring Webhooks

1. **Create Webhook Endpoint**
   - Set up an HTTPS endpoint on your server
   - Must accept POST requests
   - Must respond with 200 status within timeout period

2. **Register Webhook**
   - Through Eventbrite dashboard or API
   - Specify endpoint URL
   - Select events to monitor

3. **Verify Webhook**
   - Eventbrite may send test webhooks
   - Respond with appropriate status codes

### Webhook Payload Example

```json
{
  "config": {
    "action": "order.placed",
    "webhook_id": "123456"
  },
  "data": {
    "object": {
      "id": "order_123456",
      "event_id": "987654",
      "status": "placed",
      "email": "customer@example.com",
      "costs": {
        "gross": {
          "currency": "USD",
          "value": 10000
        }
      },
      "attendees": [
        {
          "id": "attendee_789",
          "email": "attendee@example.com",
          "name": "John Doe"
        }
      ]
    }
  },
  "api": "v3"
}
```

### Webhook Best Practices

1. **Verify Webhook Signature** - Authenticate webhook origin
2. **Idempotent Processing** - Handle duplicate webhooks gracefully
3. **Quick Response** - Respond immediately, process asynchronously
4. **Error Handling** - Implement retry logic with exponential backoff
5. **Logging** - Log all webhooks for debugging and compliance

---

## Common Use Cases & Integration Examples

### Use Case 1: Embedded Checkout on Your Website

**Objective:** Sell tickets directly on your website without redirecting to Eventbrite.

**Implementation:**
1. Use Eventbrite's embedded checkout widget
2. Load checkout iframe with event ID
3. Handle successful order callback

**Code Example:**
```html
<div id="eventbrite-widget-container-123456"></div>

<script src="https://www.eventbriteapi.com/static/widgets/eb_widgets.js"></script>

<script type="text/javascript">
    window.EBWidgets.createWidget({
        widgetType: 'checkout',
        eventId: '123456789',
        modal: true,
        modalTriggerElementId: 'eventbrite-widget-trigger',
        onOrderComplete: handleOrderComplete
    });
    
    function handleOrderComplete(order) {
        console.log('Order placed:', order.id);
    }
</script>
```

### Use Case 2: Syncing Attendees to Email Marketing Platform

**Objective:** Automatically add ticket buyers to your email list.

**Implementation:**
1. Set up webhook for `order.placed` events
2. Extract attendee email from webhook payload
3. POST to your email service API (e.g., Mailchimp, ConvertKit)

**Webhook Handler (Node.js):**
```javascript
const express = require('express');
const app = express();

app.post('/webhooks/eventbrite', express.json(), async (req, res) => {
  const { config, data } = req.body;
  
  if (config.action === 'order.placed') {
    const order = data.object;
    const attendees = order.attendees;
    
    // Add each attendee to email list
    for (const attendee of attendees) {
      await addToEmailList({
        email: attendee.email,
        name: attendee.name,
        event: order.event_id
      });
    }
  }
  
  res.status(200).send('Webhook processed');
});

async function addToEmailList(contact) {
  // Your email service integration
  console.log('Adding to email list:', contact);
}

app.listen(3000);
```

### Use Case 3: Building an Event Analytics Dashboard

**Objective:** Display real-time sales, attendee, and event data.

**Implementation:**
1. Fetch event details and metrics via API
2. Query orders and attendees endpoints
3. Display in dashboard with charts

**PHP Example:**
```php
<?php
$token = 'YOUR_PRIVATE_TOKEN';
$organizationId = '123456789';
$baseUrl = 'https://www.eventbriteapi.com/v3';

// Get events
$events = fetchFromAPI("$baseUrl/organizations/$organizationId/events/");

foreach ($events['events'] as $event) {
    $eventId = $event['id'];
    
    // Get orders
    $orders = fetchFromAPI("$baseUrl/events/$eventId/orders/");
    
    // Get attendees
    $attendees = fetchFromAPI("$baseUrl/events/$eventId/attendees/");
    
    echo "Event: {$event['name']['text']}\n";
    echo "Orders: {$orders['pagination']['object_count']}\n";
    echo "Attendees: {$attendees['pagination']['object_count']}\n";
}

function fetchFromAPI($url) {
    global $token;
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Authorization: Bearer ' . $token,
        'Content-Type: application/json'
    ]);
    $response = curl_exec($ch);
    curl_close($ch);
    return json_decode($response, true);
}
?>
```

### Use Case 4: Creating Recurring Events

**Objective:** Quickly duplicate an existing event as a template.

**Implementation:**
1. Create base event template
2. Use copy endpoint to duplicate
3. Update dates and details

```javascript
async function createRecurringEvent(baseEventId, newDate, count) {
  const token = 'YOUR_TOKEN';
  
  for (let i = 0; i < count; i++) {
    // Copy event
    const copyResponse = await fetch(
      `https://www.eventbriteapi.com/v3/events/${baseEventId}/copy/`,
      {
        method: 'POST',
        headers: {
          'Authorization': `Bearer ${token}`,
          'Content-Type': 'application/json'
        }
      }
    );
    
    const newEvent = await copyResponse.json();
    const newEventId = newEvent.id;
    
    // Update dates
    const newStartDate = new Date(newDate);
    newStartDate.setDate(newStartDate.getDate() + (i * 7)); // Weekly
    
    await updateEvent(newEventId, {
      start: newStartDate.toISOString(),
      end: new Date(newStartDate.getTime() + 3600000).toISOString()
    });
  }
}
```

### Use Case 5: Applying Discount Codes at Checkout

**Objective:** Allow customers to enter promo codes during ticket purchase.

**Implementation:**
1. Create coded discount via API
2. Provide discount code to customers
3. Customer enters code at checkout (handled by Eventbrite)

```javascript
async function createPromotionalCode(eventId, code, discountPercent) {
  const token = 'YOUR_TOKEN';
  const orgId = 'YOUR_ORG_ID';
  
  const payload = {
    discount: {
      type: 'coded',
      code: code,
      percent_off: discountPercent,
      event_id: eventId,
      quantity_available: 100
    }
  };
  
  const response = await fetch(
    `https://www.eventbriteapi.com/v3/organizations/${orgId}/discounts/`,
    {
      method: 'POST',
      headers: {
        'Authorization': `Bearer ${token}`,
        'Content-Type': 'application/json'
      },
      body: JSON.stringify(payload)
    }
  );
  
  return await response.json();
}
```

---

## Best Practices

### Security

1. **Secure Token Storage**
   - Never hardcode tokens in source code
   - Use environment variables or secure secret management
   - Rotate tokens regularly
   - Revoke tokens when no longer needed

2. **HTTPS Only**
   - Always use HTTPS for API requests
   - Validate SSL certificates
   - Never transmit tokens over HTTP

3. **Webhook Verification**
   - Validate webhook signatures if available
   - Only accept requests from Eventbrite IPs
   - Implement request authentication

### Performance Optimization

1. **Pagination Efficiency**
   - Request only needed page_size
   - Use `has_more_items` to control pagination loop
   - Cache paginated results appropriately

2. **Expand Parameters**
   - Use `expand` parameter to get related data in single call
   - Reduces number of API requests needed
   ```
   GET /events/{event_id}/?expand=venue,organizer,ticket_classes
   ```

3. **Filtering**
   - Use query parameters to filter results
   - Reduces data transfer and processing
   - Improves response times

### Error Handling & Resilience

1. **Implement Retry Logic**
   - Retry on 429 (rate limit) and 5xx errors
   - Use exponential backoff strategy
   - Set maximum retry attempts

2. **Graceful Degradation**
   - Handle missing optional fields
   - Provide fallback data when API unavailable
   - Cache critical data locally

3. **Monitoring & Alerts**
   - Log all API errors and warnings
   - Alert on repeated failures
   - Monitor rate limit usage
   - Track API response times

### Documentation & Maintenance

1. **Version Control**
   - Document API integration code
   - Keep track of API version being used
   - Plan for future API updates

2. **Testing**
   - Use test API tokens with sandbox events
   - Test error scenarios and edge cases
   - Verify webhook handling with test payloads

3. **Compliance**
   - Review Terms of Service regularly
   - Ensure data handling complies with privacy laws
   - Implement proper data retention policies

### Integration Architecture

1. **Decouple API Calls**
   - Process webhooks asynchronously
   - Use message queues for bulk operations
   - Avoid blocking operations

2. **Caching Strategy**
   - Cache event metadata (venue, category)
   - Implement appropriate TTL for cached data
   - Invalidate cache on updates

3. **Logging & Debugging**
   - Log all API requests and responses
   - Include request ID for debugging
   - Monitor for suspicious patterns

---

## Additional Resources

- **Official Documentation:** https://www.eventbrite.com/platform/docs/
- **API Reference:** https://www.eventbrite.com/platform/api/
- **Rate Limits Documentation:** https://www.eventbrite.com/platform/docs/rate-limits
- **Authentication Guide:** https://www.eventbrite.com/platform/docs/authentication
- **API Keys Management:** https://www.eventbrite.com/platform/api-keys

---

*Last Updated: January 2026*
*API Version: v3*
*Documentation compiled from official Eventbrite Platform documentation*
