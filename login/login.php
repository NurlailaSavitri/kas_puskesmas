<?php
//initiate the session
session_start();
date_default_timezone_set('Asia/Makassar');

require_once __DIR__ . '/../orm/UserORM.php';

$post = (object) $_POST;
$canLoggedIn = false;

//find user by email
$isUserExits = UserORM::where('email', $post->email)->findOne();

if (!$isUserExits) {
    $_SESSION['message'] = "User tidak ditemukan";
    header('location:form_login.php');
}

$canLoggedIn = password_verify($post->password, $isUserExits->password);

if(!$canLoggedIn) {
    $_SESSION['message'] = "Anda tidak memiliki akses!";
    header('location:form_login.php');
    return;
}

if (!$isUserExits ) {
    // update last_login dan save objek pengguna
    $isUserExits->last_login = time();
    $isUserExits->save();

    // login berhasil, lakukan redirect ke halaman selanjutnya
   
}
//no problem with username and password, all is correct
$isUserExits->last_login = time(); // menyimpan nilai timestamp Unix terbaru

// konversi nilai timestamp Unix ke dalam datetime string
$lastLoginDateTime = date('Y-m-d H:i:s', $isUserExits->last_login);
$_SESSION['message'] = 'Hola ' . $isUserExits->nama . '! Terakhir login: ' . $lastLoginDateTime;

$_SESSION['isLoggedIn'] = true;
$_SESSION['UserID'] = $isUserExits->id;
header('location:../index.php');

