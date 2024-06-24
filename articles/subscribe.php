<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);

    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $file = 'subscribers.txt';

        if (file_put_contents($file, $email . PHP_EOL, FILE_APPEND | LOCK_EX)) {
            header("Location: thank_you.html");
            exit();
        } else {
            echo "Error saving your subscription. Please try again.";
        }
    } else {
        echo "Invalid email address. Please enter a valid email.";
    }
} else {
    echo "Invalid request method.";
}
?>
