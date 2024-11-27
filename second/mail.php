<?php
// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Check if the form was submitted via POST method
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and validate input data
    $class = htmlspecialchars(trim($_POST["class"]));
    $student_name = htmlspecialchars(trim($_POST["student_name"]));
    $parent_name = htmlspecialchars(trim($_POST["parent_name"]));
    $email = htmlspecialchars(trim($_POST["email"]));
    $mobile = htmlspecialchars(trim($_POST["mobile"]));
    $location = htmlspecialchars(trim($_POST["location"]));
    $message = htmlspecialchars(trim($_POST["message"]));

    // Validate that none of the fields are empty
    if (empty($class) || empty($student_name) || empty($parent_name) || empty($email) || empty($mobile) || empty($location) || empty($message)) {
        echo "All fields are required.";
        exit;
    }

    // Recipient email address (replace with your email address)
    $to = "Support@gracetutors.com"; // Replace with your email address

    // Subject of the email
    $subject = "New Registration Form Submission";

    // Email content
    $email_body = "Class: $class\n";
    $email_body .= "Student Name: $student_name\n";
    $email_body .= "Parent's Name: $parent_name\n";
    $email_body .= "Email: $email\n";
    $email_body .= "Mobile No: $mobile\n";
    $email_body .= "Location: $location\n";
    $email_body .= "Message: $message\n";

    // Email headers
    $headers = "From: no-reply@example.com\r\n"; // Replace with a valid sender email address
    $headers .= "Reply-To: $email\r\n"; // Set reply-to header as the user email

    // Send email
    if (mail($to, $subject, $email_body, $headers)) {
        echo "Thank you for your submission. We will get back to you soon.";
    } else {
        echo "There was an error sending the email.";
    }
} else {
    // Not a POST request
    echo "Invalid request.";
}
?>
