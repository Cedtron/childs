<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect and sanitize form data
    $name = htmlspecialchars(strip_tags(trim($_POST['name'])));
    $email = htmlspecialchars(strip_tags(trim($_POST['email'])));
    $phone = htmlspecialchars(strip_tags(trim($_POST['phone'])));
    $availability = htmlspecialchars(strip_tags(trim($_POST['availability'])));
    $skills = htmlspecialchars(strip_tags(trim($_POST['skills'])));
    $message = htmlspecialchars(strip_tags(trim($_POST['message'])));

    // Email details
    $to = "info@shh.org";
    $subject = "Volunteer Application from $name"; // Dynamic subject with the applicant's name
    
    // Message body
    $body = "Name: $name\n";
    $body .= "Email: $email\n";
    $body .= "Phone: $phone\n";
    $body .= "Availability: $availability\n";
    $body .= "Skills: $skills\n";
    $body .= "Message:\n$message\n";
    
    // Headers
    $headers = "From: $name <$email>\r\n";
    $headers .= "Reply-To: $email\r\n";

    // Send email
    if (mail($to, $subject, $body, $headers)) {
        // Redirect to index.html on success
        header("Location: index.html");
        exit();
    } else {
        // Return error message
        echo "<script>alert('Application could not be sent. Please try again later.');</script>";
        echo "<script>window.history.back();</script>"; // Go back to the previous page
        exit();
    }
} else {
    echo "Invalid request method.";
}
?>
