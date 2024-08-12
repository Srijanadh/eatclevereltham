<?php
  // Replace this with your actual email address
  $receiving_email_address = 'figma.srijan@gmail.com';

  // Collect form data
  $from_name = $_POST['name'];
  $from_email = $_POST['email'];
  $subject = $_POST['subject'];
  $message_content = $_POST['message'];

  // Prepare the email headers
  $headers = "From: $from_name <$from_email>\r\n";
  $headers .= "Reply-To: $from_email\r\n";
  $headers .= "MIME-Version: 1.0\r\n";
  $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

  // Create the email subject
  $email_subject = "New message from your website: $subject";

  // Compose the email message
  $email_message = "<html><body>";
  $email_message .= "<h2>New Contact Form Message</h2>";
  $email_message .= "<p><strong>Name:</strong> $from_name</p>";
  $email_message .= "<p><strong>Email:</strong> $from_email</p>";
  $email_message .= "<p><strong>Message:</strong><br>$message_content</p>";
  $email_message .= "</body></html>";

  // Send the email
  if(mail($receiving_email_address, $email_subject, $email_message, $headers)) {
    echo 'Message sent successfully.';
  } else {
    echo 'Failed to send message. Please try again later.';
  }
?>
