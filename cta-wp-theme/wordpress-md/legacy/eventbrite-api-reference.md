# Eventbrite API Reference Guide

Complete reference guide for Eventbrite Platform API v3, based on official documentation.

## Table of Contents

1. [Introduction](#introduction)
2. [Authentication](#authentication)
3. [API Basics](#api-basics)
4. [API Explorer](#api-explorer)
5. [Creating Events](#creating-events)
6. [Events Management](#events-management)
7. [Event Descriptions](#event-descriptions)
8. [Ticket Classes](#ticket-classes)
9. [Questions](#questions)
10. [Orders](#orders)
11. [Attendees](#attendees)
12. [Image Upload](#image-upload)
13. [Organizations](#organizations)
14. [Online Event Pages](#online-event-pages)
15. [Embedded Checkout](#embedded-checkout)
16. [Order Lookup](#order-lookup)
17. [Cancelling and Refunding Orders](#cancelling-and-refunding-orders)
18. [App Marketplace](#app-marketplace)
19. [App Approval Process](#app-approval-process)
20. [App OAuth Flow](#app-oauth-flow)
21. [Integrate Your App](#integrate-your-app)
22. [App Product Page](#app-product-page)
23. [Managing App Reviews](#managing-app-reviews)
24. [Mailchimp Integration](#mailchimp-integration)
25. [Rate Limits](#rate-limits)
26. [Webhooks](#webhooks)

---

## Introduction

The Eventbrite Platform API v3 allows you to integrate Eventbrite functionality into your applications. The API uses RESTful principles and returns JSON responses.

**Base URL:** `https://www.eventbriteapi.com/v3/`

**Documentation:** https://www.eventbrite.com/platform/docs/introduction

### Key Features

- Create and manage events
- Handle ticket sales and orders
- Manage attendees
- Upload images
- Process refunds
- Webhook notifications
- OAuth authentication

---

## Authentication

**Documentation:** https://www.eventbrite.com/platform/docs/authentication

### OAuth Token (Personal Access Token)

The simplest authentication method for server-to-server applications.

**Header Format:**
```
Authorization: Bearer YOUR_OAUTH_TOKEN
```

**Getting Your Token:**
1. Go to https://www.eventbrite.com/platform/api-keys/
2. Create a Personal Access Token
3. Copy the token (you'll only see it once)

**Example Request:**
```bash
curl -H "Authorization: Bearer YOUR_TOKEN" \
  https://www.eventbriteapi.com/v3/users/me/
```

### OAuth 2.0 Flow

For applications that need user authorization, use OAuth 2.0.

**Documentation:** https://www.eventbrite.com/platform/docs/app-oauth-flow

**Steps:**
1. Redirect user to authorization URL
2. User authorizes your app
3. Receive authorization code
4. Exchange code for access token
5. Use access token for API requests

---

## API Basics

**Documentation:** https://www.eventbrite.com/platform/docs/api-basics

### HTTP Methods

- `GET` - Retrieve resources
- `POST` - Create resources or perform actions
- `PUT` - Update resources (some endpoints)
- `DELETE` - Delete resources

### Response Format

All responses are JSON. Success responses include the requested data:

```json
{
  "id": "123456789",
  "name": {
    "text": "Event Name",
    "html": "Event Name"
  }
}
```

Error responses:

```json
{
  "error": "INVALID_AUTHENTICATION",
  "error_description": "Invalid authentication credentials"
}
```

### Status Codes

- `200` - Success
- `201` - Created
- `400` - Bad Request
- `401` - Unauthorized
- `403` - Forbidden
- `404` - Not Found
- `429` - Rate Limit Exceeded
- `500` - Server Error

### Pagination

Many endpoints support pagination:

```
GET /events/?page_size=50&continuation=abc123
```

**Parameters:**
- `page_size` - Number of results per page (max 100)
- `continuation` - Token for next page

---

## API Explorer

**Documentation:** https://www.eventbrite.com/platform/docs/api-explorer

The Eventbrite API Explorer allows you to test API endpoints interactively:

**URL:** https://www.eventbrite.com/platform/docs/api-explorer

Features:
- Test endpoints with your credentials
- View request/response examples
- Generate code snippets
- Explore available endpoints

---

## Creating Events

**Documentation:** https://www.eventbrite.com/platform/docs/create-events

### Create Event Endpoint

```
POST /organizations/{organization_id}/events/
```

### Required Fields

```json
{
  "event": {
    "name": {
      "text": "Event Name",
      "html": "Event Name"
    },
    "start": {
      "timezone": "Europe/London",
      "local": "2026-01-15T09:00:00"
    },
    "end": {
      "timezone": "Europe/London",
      "local": "2026-01-15T17:00:00"
    },
    "currency": "GBP"
  }
}
```

### Optional Fields

- `description` - Event description (text and HTML)
- `summary` - Short summary (140 characters)
- `venue_id` - Venue ID
- `online_event` - Boolean (true for online events)
- `capacity` - Maximum attendees
- `organizer_id` - Organizer ID
- `category_id` - Category ID
- `format_id` - Format ID
- `listed` - Boolean (public listing)

### Example Request

```bash
curl -X POST \
  https://www.eventbriteapi.com/v3/organizations/{org_id}/events/ \
  -H "Authorization: Bearer YOUR_TOKEN" \
  -H "Content-Type: application/json" \
  -d '{
    "event": {
      "name": {
        "text": "Training Course - Maidstone, Kent"
      },
      "description": {
        "text": "Course description",
        "html": "<p>Course description</p>"
      },
      "start": {
        "timezone": "Europe/London",
        "local": "2026-01-15T09:00:00"
      },
      "end": {
        "timezone": "Europe/London",
        "local": "2026-01-15T17:00:00"
      },
      "currency": "GBP",
      "venue_id": "123456789"
    }
  }'
```

### Response

```json
{
  "id": "123456789",
  "name": {
    "text": "Training Course - Maidstone, Kent",
    "html": "Training Course - Maidstone, Kent"
  },
  "url": "https://www.eventbrite.com/e/event-name-123456789",
  "start": {
    "timezone": "Europe/London",
    "local": "2026-01-15T09:00:00",
    "utc": "2026-01-15T09:00:00Z"
  },
  "end": {
    "timezone": "Europe/London",
    "local": "2026-01-15T17:00:00",
    "utc": "2026-01-15T17:00:00Z"
  },
  "status": "draft"
}
```

---

## Events Management

**Documentation:** https://www.eventbrite.com/platform/docs/events

### Get Event

```
GET /events/{event_id}/
```

### Update Event

```
POST /events/{event_id}/
```

**Note:** Eventbrite uses POST for updates, not PUT.

### Publish Event

```
POST /events/{event_id}/publish/
```

Publishes a draft event, making it live and searchable.

### Cancel Event

```
POST /events/{event_id}/cancel/
```

### Delete Event

```
POST /events/{event_id}/delete/
```

### List Events

```
GET /organizations/{organization_id}/events/
```

**Query Parameters:**
- `status` - Filter by status (draft, live, started, ended, completed, canceled)
- `order_by` - Sort order (start_asc, start_desc, created_asc, created_desc)
- `expand` - Expand related resources (venue, organizer, ticket_classes)

### Event Statuses

- `draft` - Not published
- `live` - Published and active
- `started` - Event has started
- `ended` - Event has ended
- `completed` - Event completed
- `canceled` - Event canceled

---

## Event Descriptions

**Documentation:** https://www.eventbrite.com/platform/docs/event-description

### Description Format

Event descriptions support both plain text and HTML:

```json
{
  "description": {
    "text": "Plain text description",
    "html": "<p>HTML formatted description</p>"
  }
}
```

### HTML Guidelines

- Use semantic HTML tags (`<p>`, `<h3>`, `<ul>`, `<li>`, `<strong>`, `<em>`)
- Maximum 10,000 characters
- No external links or images in description (use image upload API)
- Clean, valid HTML

### Summary Field

Short summary for search/discovery (140 characters max):

```json
{
  "summary": "Brief event summary for search results"
}
```

### SEO Best Practices

- Include location keywords (Maidstone, Kent) multiple times
- Use relevant training/course keywords
- Include date/time information
- Clear call-to-action
- Structured content with headings

---

## Ticket Classes

**Documentation:** https://www.eventbrite.com/platform/docs/ticket-classes

### Create Ticket Class

```
POST /events/{event_id}/ticket_classes/
```

### Required Fields

```json
{
  "ticket_class": {
    "name": "Standard Ticket",
    "quantity_total": 50,
    "free": false,
    "cost": "50.00",
    "currency": "GBP"
  }
}
```

### Optional Fields

- `description` - Ticket description
- `donation` - Boolean (for donation tickets)
- `hidden` - Boolean (hide from public)
- `sales_start` - When sales start
- `sales_end` - When sales end
- `minimum_quantity` - Minimum purchase
- `maximum_quantity` - Maximum purchase

### Free Tickets

```json
{
  "ticket_class": {
    "name": "Free Admission",
    "quantity_total": 100,
    "free": true
  }
}
```

### Update Ticket Class

```
POST /events/{event_id}/ticket_classes/{ticket_class_id}/
```

### Get Ticket Classes

```
GET /events/{event_id}/ticket_classes/
```

**Response includes:**
- `quantity_sold` - Number of tickets sold
- `quantity_total` - Total available
- `quantity_available` - Remaining tickets

### Delete Ticket Class

```
POST /events/{event_id}/ticket_classes/{ticket_class_id}/delete/
```

---

## Questions

**Documentation:** https://www.eventbrite.com/platform/docs/questions

### Create Question

```
POST /events/{event_id}/questions/
```

### Question Types

- `text` - Text input
- `multiple_choice` - Multiple choice
- `dropdown` - Dropdown selection
- `yes_no` - Yes/No question

### Example

```json
{
  "question": {
    "question_text": "Dietary requirements?",
    "question_type": "text",
    "required": false
  }
}
```

---

## Orders

**Documentation:** https://www.eventbrite.com/platform/docs/orders

### Get Order

```
GET /orders/{order_id}/
```

### List Orders

```
GET /events/{event_id}/orders/
```

**Query Parameters:**
- `status` - Filter by status (placed, paid, refunded, etc.)
- `changed_since` - Only orders changed since timestamp

### Order Statuses

- `placed` - Order placed
- `paid` - Payment received
- `partially_refunded` - Partially refunded
- `refunded` - Fully refunded
- `cancelled` - Cancelled

---

## Attendees

**Documentation:** https://www.eventbrite.com/platform/docs/attendees

### Get Attendee

```
GET /attendees/{attendee_id}/
```

### List Attendees

```
GET /events/{event_id}/attendees/
```

**Query Parameters:**
- `status` - Filter by status (attending, not_attending, etc.)
- `changed_since` - Only attendees changed since timestamp

### Attendee Data

Includes:
- Name
- Email
- Phone
- Ticket class
- Check-in status
- Answers to questions

---

## Image Upload

**Documentation:** https://www.eventbrite.com/platform/docs/image-upload

### Upload Image

```
POST /media/upload/
```

**Content-Type:** `multipart/form-data`

**Fields:**
- `file` - Image file
- `type` - Image type (image_event, image_organizer, etc.)

### Supported Formats

- JPEG
- PNG
- GIF
- WebP

### Size Limits

- Maximum file size: 10MB
- Recommended dimensions: 2160x1080px

### Use Uploaded Image

After upload, use the returned `upload_token` in event creation:

```json
{
  "event": {
    "logo_id": "upload_token_here"
  }
}
```

---

## Organizations

**Documentation:** https://www.eventbrite.com/platform/docs/organizations

### Get Organization

```
GET /organizations/{organization_id}/
```

### List Organizations

```
GET /users/me/organizations/
```

### Organization Events

```
GET /organizations/{organization_id}/events/
```

### Organization Venues

```
GET /organizations/{organization_id}/venues/
```

---

## Online Event Pages

**Documentation:** https://www.eventbrite.com/platform/docs/online-event-page

### Create Online Event

Set `online_event: true` when creating event:

```json
{
  "event": {
    "online_event": true,
    "url": "https://zoom.us/j/meeting-id"
  }
}
```

### Online Event URL

The `url` field contains the streaming/meeting link.

---

## Embedded Checkout

**Documentation:** https://www.eventbrite.com/platform/docs/embedded-checkout

### Embed Checkout Widget

Use Eventbrite's JavaScript SDK to embed checkout directly on your site.

**Benefits:**
- Seamless user experience
- No redirect to Eventbrite
- Customizable styling
- Mobile responsive

### Implementation

```html
<script src="https://www.eventbrite.com/static/widgets/eb_widgets.js"></script>
<script>
  window.EBWidgets.createWidget({
    widgetType: 'checkout',
    eventId: '123456789',
    iframeContainerId: 'eventbrite-widget-container'
  });
</script>
```

---

## Order Lookup

**Documentation:** https://www.eventbrite.com/platform/docs/order-lookup

### Lookup by Email

```
GET /orders/?email=attendee@example.com
```

### Lookup by Order Number

```
GET /orders/?order_id=123456789
```

---

## Cancelling and Refunding Orders

**Documentation:** https://www.eventbrite.com/platform/docs/cancelling-and-refunding-orders

### Cancel Order

```
POST /orders/{order_id}/cancel/
```

### Refund Order

```
POST /orders/{order_id}/refund/
```

**Partial Refund:**

```json
{
  "refund_amount": "25.00",
  "currency": "GBP"
}
```

**Full Refund:**

```json
{
  "refund_amount": "full"
}
```

### Refund Status

- `pending` - Refund processing
- `completed` - Refund completed
- `failed` - Refund failed

---

## App Marketplace

**Documentation:** https://www.eventbrite.com/platform/docs/what-is-app-marketplace

The Eventbrite App Marketplace allows third-party developers to create apps that integrate with Eventbrite.

### Benefits

- Reach Eventbrite's user base
- Monetize your integration
- Official Eventbrite support
- Marketing opportunities

---

## App Approval Process

**Documentation:** https://www.eventbrite.com/platform/docs/app-approval-process

### Steps to Approval

1. **Submit Application**
   - Complete app information
   - Provide screenshots
   - Describe functionality

2. **Review Process**
   - Eventbrite team reviews
   - Security assessment
   - User experience evaluation

3. **Approval**
   - App listed in marketplace
   - Can be installed by organizers

### Requirements

- Secure OAuth implementation
- Clear value proposition
- Good user experience
- Privacy policy
- Terms of service

---

## App OAuth Flow

**Documentation:** https://www.eventbrite.com/platform/docs/app-oauth-flow

### OAuth 2.0 Implementation

1. **Authorization Request**
   ```
   GET https://www.eventbrite.com/oauth/authorize?
     response_type=code&
     client_id=YOUR_CLIENT_ID&
     redirect_uri=YOUR_REDIRECT_URI&
     scope=read,write
   ```

2. **Receive Authorization Code**
   - User authorizes app
   - Redirected to `redirect_uri` with `code` parameter

3. **Exchange Code for Token**
   ```
   POST https://www.eventbrite.com/oauth/token
   Content-Type: application/x-www-form-urlencoded
   
   grant_type=authorization_code&
   client_id=YOUR_CLIENT_ID&
   client_secret=YOUR_CLIENT_SECRET&
   code=AUTHORIZATION_CODE&
   redirect_uri=YOUR_REDIRECT_URI
   ```

4. **Use Access Token**
   ```
   Authorization: Bearer ACCESS_TOKEN
   ```

### Scopes

- `read` - Read access
- `write` - Write access
- `read_orders` - Read orders
- `write_orders` - Write orders

---

## Integrate Your App

**Documentation:** https://www.eventbrite.com/platform/docs/integrate-your-app

### Integration Steps

1. Register your app
2. Implement OAuth flow
3. Use API endpoints
4. Handle webhooks
5. Test thoroughly
6. Submit for approval

### Best Practices

- Handle errors gracefully
- Respect rate limits
- Use webhooks for real-time updates
- Cache data appropriately
- Secure token storage

---

## App Product Page

**Documentation:** https://www.eventbrite.com/platform/docs/app-product-page

### Product Page Elements

- App name and description
- Screenshots
- Features list
- Pricing information
- Support contact
- Privacy policy link

### Optimization Tips

- Clear value proposition
- High-quality screenshots
- Detailed feature descriptions
- Customer testimonials
- Regular updates

---

## Managing App Reviews

**Documentation:** https://www.eventbrite.com/platform/docs/managing-app-reviews

### Review Management

- Respond to reviews promptly
- Address concerns professionally
- Thank positive reviewers
- Use feedback for improvements

### Review Guidelines

- Be professional
- Provide helpful information
- Offer support contact
- Don't argue with negative reviews

---

## Mailchimp Integration

**Documentation:** https://www.eventbrite.com/platform/docs/mailchimp

### Mailchimp App

Eventbrite offers a Mailchimp integration app in the marketplace.

### Features

- Sync attendees to Mailchimp
- Automated email campaigns
- Segment by event
- Track engagement

### Setup

1. Install Mailchimp app from marketplace
2. Connect Mailchimp account
3. Configure sync settings
4. Enable automatic sync

---

## Rate Limits

**Documentation:** https://www.eventbrite.com/platform/docs/rate-limits

### Rate Limit Information

**Standard Rate Limits:**
- 2000 requests per hour per OAuth token
- Burst limit: 10 requests per second

### Rate Limit Headers

Response headers include rate limit information:

```
X-RateLimit-Limit: 2000
X-RateLimit-Remaining: 1995
X-RateLimit-Reset: 1609459200
```

### Handling Rate Limits

**429 Too Many Requests Response:**

```json
{
  "error": "RATE_LIMIT_EXCEEDED",
  "error_description": "Rate limit exceeded"
}
```

**Best Practices:**

1. Implement exponential backoff
2. Cache responses when possible
3. Batch requests when feasible
4. Monitor rate limit headers
5. Use webhooks instead of polling

### Example Backoff Implementation

```php
$max_retries = 3;
$retry_count = 0;
$delay = 1;

while ($retry_count < $max_retries) {
    $response = wp_remote_get($url, $args);
    $code = wp_remote_retrieve_response_code($response);
    
    if ($code !== 429) {
        break; // Success or other error
    }
    
    // Rate limited - wait and retry
    sleep($delay);
    $delay *= 2; // Exponential backoff
    $retry_count++;
}
```

---

## Webhooks

**Documentation:** https://www.eventbrite.com/platform/docs/webhooks

### What are Webhooks?

Webhooks allow Eventbrite to notify your application when events occur, eliminating the need to poll the API.

### Supported Events

- `order.placed` - New order created
- `order.updated` - Order updated
- `order.refunded` - Order refunded
- `attendee.updated` - Attendee information updated
- `event.created` - Event created
- `event.updated` - Event updated
- `event.published` - Event published
- `event.unpublished` - Event unpublished

### Create Webhook

```
POST /webhooks/
```

```json
{
  "webhook": {
    "endpoint_url": "https://yourdomain.com/webhook",
    "actions": [
      "order.placed",
      "order.updated"
    ]
  }
}
```

### Webhook Payload

```json
{
  "api_url": "https://www.eventbriteapi.com/v3/orders/123456789/",
  "config": {
    "user_id": "987654321",
    "action": "order.placed"
  },
  "event_id": "123456789"
}
```

### Verify Webhook

Eventbrite signs webhooks with HMAC-SHA256. Verify the signature:

```php
$signature = $_SERVER['HTTP_X_EVENTBRITE_SIGNATURE'];
$payload = file_get_contents('php://input');
$expected = hash_hmac('sha256', $payload, $webhook_secret);

if (hash_equals($expected, $signature)) {
    // Valid webhook
    process_webhook($payload);
}
```

### Webhook Security

- Always verify HMAC signature
- Use HTTPS endpoints
- Validate event data
- Handle errors gracefully
- Implement idempotency

### Testing Webhooks

Use Eventbrite's webhook testing tool or ngrok for local development:

```bash
ngrok http 8000
# Use ngrok URL as webhook endpoint
```

---

## Error Handling

### Common Errors

**INVALID_AUTHENTICATION**
- Invalid or expired token
- Solution: Refresh token or get new token

**NOT_AUTHORIZED**
- Insufficient permissions
- Solution: Check OAuth scopes

**NOT_FOUND**
- Resource doesn't exist
- Solution: Verify resource ID

**VALIDATION_ERROR**
- Invalid request data
- Solution: Check required fields and formats

**RATE_LIMIT_EXCEEDED**
- Too many requests
- Solution: Implement backoff and retry

### Error Response Format

```json
{
  "error": "ERROR_CODE",
  "error_description": "Human-readable error message",
  "status_code": 400
}
```

---

## Best Practices

### Security

1. **Never commit tokens to version control**
2. **Use environment variables for credentials**
3. **Implement token rotation**
4. **Verify webhook signatures**
5. **Use HTTPS for all requests**

### Performance

1. **Cache responses when appropriate**
2. **Use webhooks instead of polling**
3. **Batch operations when possible**
4. **Respect rate limits**
5. **Implement retry logic with backoff**

### Code Quality

1. **Handle all error cases**
2. **Validate input data**
3. **Use proper HTTP methods**
4. **Follow RESTful conventions**
5. **Log API interactions**

### User Experience

1. **Provide clear error messages**
2. **Show loading states**
3. **Handle edge cases gracefully**
4. **Test thoroughly**
5. **Monitor API usage**

---

## Resources

- **API Documentation:** https://www.eventbrite.com/platform/docs
- **API Explorer:** https://www.eventbrite.com/platform/docs/api-explorer
- **API Keys:** https://www.eventbrite.com/platform/api-keys/
- **App Marketplace:** https://www.eventbrite.com/platform/apps/
- **Support:** https://www.eventbrite.com/support

---

## Implementation Notes

This reference guide is based on Eventbrite Platform API v3. For the most up-to-date information, always refer to the official Eventbrite API documentation.

**Last Updated:** Based on Eventbrite API v3 documentation

**Integration Status:** This WordPress theme implements event creation, updates, publishing, ticket class management, and space syncing using the endpoints documented above.
