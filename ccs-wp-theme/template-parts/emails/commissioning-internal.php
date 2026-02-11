<?php
/**
 * HTML email template: commissioning enquiry (internal notification)
 * Variables expected: $organization, $contact_name, $title, $email, $phone, $inquiry_type, $message
 *
 * @package ccs-theme
 */
if (!defined('ABSPATH')) {
    exit;
}
$org = isset($organization) ? $organization : '';
$name = isset($contact_name) ? $contact_name : '';
$job_title = isset($title) ? $title : '';
$email_addr = isset($email) ? $email : '';
$phone_num = isset($phone) ? $phone : '';
$type = isset($inquiry_type) ? $inquiry_type : '';
$msg = isset($message) ? $message : '';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Commissioning Enquiry</title>
</head>
<body style="margin:0; font-family: system-ui, sans-serif; font-size: 16px; line-height: 1.5; color: #2B1B0E;">
  <div style="max-width: 560px; margin: 0 auto; padding: 24px;">
    <h1 style="margin: 0 0 16px 0; font-size: 20px;">New commissioning enquiry</h1>
    <table style="width: 100%; border-collapse: collapse;">
      <tr><td style="padding: 6px 0; font-weight: 600;">Organisation</td><td style="padding: 6px 0;"><?php echo esc_html($org); ?></td></tr>
      <tr><td style="padding: 6px 0; font-weight: 600;">Contact</td><td style="padding: 6px 0;"><?php echo esc_html($name); ?></td></tr>
      <tr><td style="padding: 6px 0; font-weight: 600;">Title</td><td style="padding: 6px 0;"><?php echo esc_html($job_title); ?></td></tr>
      <tr><td style="padding: 6px 0; font-weight: 600;">Email</td><td style="padding: 6px 0;"><a href="mailto:<?php echo esc_attr($email_addr); ?>"><?php echo esc_html($email_addr); ?></a></td></tr>
      <tr><td style="padding: 6px 0; font-weight: 600;">Phone</td><td style="padding: 6px 0;"><?php echo esc_html($phone_num); ?></td></tr>
      <tr><td style="padding: 6px 0; font-weight: 600;">Inquiry type</td><td style="padding: 6px 0;"><?php echo esc_html($type); ?></td></tr>
    </table>
    <?php if ($msg !== '') : ?>
    <h2 style="margin: 20px 0 8px 0; font-size: 16px;">Message</h2>
    <div style="padding: 12px; background: #f5f5f5; border-radius: 6px; white-space: pre-wrap;"><?php echo esc_html($msg); ?></div>
    <?php endif; ?>
    <p style="margin: 20px 0 0 0; font-size: 13px; color: #666;">Submitted <?php echo esc_html(current_time('j F Y, g:i a')); ?></p>
  </div>
</body>
</html>
