<?php
session_start();
if (isset($_POST['otp'])) {
    $userOtp = $_POST['otp'];
    if (isset($_SESSION['otp']) && time() < $_SESSION['otp_expiry']) {
        if ($userOtp == $_SESSION['otp']) {
            echo "success";
        } else {
            echo "invalid";
        }
    } else {
        echo "expired";
    }
}
?>
