<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect and sanitize form data
    $name = htmlspecialchars(strip_tags(trim($_POST['name'])));
    $email = htmlspecialchars(strip_tags(trim($_POST['email'])));
    $message = htmlspecialchars(strip_tags(trim($_POST['message'])));

    // Email details
    $to = "info@sheillahchildrensfoundation.org";
    $subject = "Sheillah Children Foundation Website"; // Default subject
    
    // Message body
    $body = "Name: $name\n";
    $body .= "Email: $email\n";
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
        echo "<script>alert('Message could not be sent. Please try again later.');</script>";
        echo "<script>window.history.back();</script>"; // Go back to the previous page
        exit();
    }
} else {
    echo "Invalid request method.";
}
?>

