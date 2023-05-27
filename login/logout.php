<?php
//initiate the session
session_start();

if (isset($_SESSION['isLoggedIn'])) {
    unset($_SESSION['message']);
    unset($_SESSION['isLoggedIn']);
    unset($_SESSION['userID']);

    $_SESSION['message'] = 'You have logged out';
    header('location:form_login.php');
    exit();
}
?>
