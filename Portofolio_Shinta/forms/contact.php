<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari form
    $name    = htmlspecialchars($_POST['name']);
    $email   = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $subject = htmlspecialchars($_POST['subject']);
    $message = htmlspecialchars($_POST['message']);

    // Email tujuan
    $to = "shintamaria293@gmail.com"; // Ganti dengan email kamu
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

    // Format isi email
    $body = "Nama: $name\n";
    $body .= "Email: $email\n\n";
    $body .= "Pesan:\n$message\n";

    // Kirim email
    if (mail($to, $subject, $body, $headers)) {
        echo "success";
    } else {
        echo "error";
    }
} else {
    echo "invalid";
}
?>
