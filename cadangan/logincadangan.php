<?php
//initiate the session
session_start();
date_default_timezone_set('Asia/Makassar');

require_once __DIR__ . '/../orm/PenggunaORM.php';

$post = (object) $_POST;
$canLoggedIn = false;

//find user by email
$isUserExits = PenggunaORM::where('email', $post->email)->findOne();

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

// arahkan pengguna ke halaman petugas jika levelnya adalah petugas
if ($isUserExits->level === 'petugas') {
    header('location: ../petugas/index.php');
    exit;
}
?>
