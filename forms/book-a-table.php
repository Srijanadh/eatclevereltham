<?php
  header('Content-Type: application/json');

  $receiving_email_address = 'figma.srijan@gmail.com';

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $phone = htmlspecialchars($_POST['phone']);
    $date = htmlspecialchars($_POST['date']);
    $time = htmlspecialchars($_POST['time']);
    $people = htmlspecialchars($_POST['people']);
    $message = htmlspecialchars($_POST['message']);

    $subject = "New table booking request from the website";
    $email_content = "Name: $name\n";
    $email_content .= "Email: $email\n";
    $email_content .= "Phone: $phone\n";
    $email_content .= "Date: $date\n";
    $email_content .= "Time: $time\n";
    $email_content .= "Number of People: $people\n";
    $email_content .= "Message:\n$message\n";

    $email_headers = "From: $name <$email>";

    if (mail($receiving_email_address, $subject, $email_content, $email_headers)) {
      echo json_encode(['status' => 'success', 'message' => 'Your booking request was sent. We will call back or send an Email to confirm your reservation. Thank you!']);
    } else {
      echo json_encode(['status' => 'error', 'message' => 'There was an error sending your booking request. Please try again later.']);
    }
  } else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request.']);
  }
?>
