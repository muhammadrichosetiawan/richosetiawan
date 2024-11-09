<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Data dari form
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $phone = htmlspecialchars($_POST['phone']);
    $date = htmlspecialchars($_POST['date']);
    $time = htmlspecialchars($_POST['time']);
    $people = htmlspecialchars($_POST['people']);
    $message = htmlspecialchars($_POST['message']);

    // Email tujuan (masukkan email admin atau email yang akan menerima pesan)
    $admin_email = "muh.richosetiawan@gmail.com";
    $subject = "New Table Reservation Request";

    // Pesan yang akan dikirim ke email
    $email_content = "Reservation Details:\n\n";
    $email_content .= "Name: $name\n";
    $email_content .= "Email: $email\n";
    $email_content .= "Phone: $phone\n";
    $email_content .= "Date: $date\n";
    $email_content .= "Time: $time\n";
    $email_content .= "People: $people\n";
    $email_content .= "Message: $message\n";

    // Headers email
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";

    // Kirim email
    if (mail($admin_email, $subject, $email_content, $headers)) {
        echo "Reservation request sent successfully!";
    } else {
        echo "There was a problem sending your request. Please try again.";
    }
} else {
    echo "Invalid request.";
}
?>
