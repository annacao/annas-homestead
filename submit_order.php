<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $order_details = $_POST['order-details'];

    // Email to the admin (you)
    $admin_email = "your-email@example.com"; // Replace with your email address
    $subject = "New Order from $name";
    $message = "You have received a new order from $name ($email).\n\nOrder Details:\n$order_details";
    $headers = "From: $email";

    // Send email to admin
    mail($admin_email, $subject, $message, $headers);

    // Email to the user (confirmation)
    $subject_user = "Order Confirmation from Anna's Homestead";
    $message_user = "Hello $name,\n\nThank you for your order! Anna will get back to you within 24 hours. Please check your email for further updates.\n\nBest regards,\nAnna's Homestead";
    $headers_user = "From: $admin_email";

    // Send confirmation email to user
    mail($email, $subject_user, $message_user, $headers_user);

    // Redirect user to the confirmation page
    header("Location: thank_you.html");
    exit();
}
?>
