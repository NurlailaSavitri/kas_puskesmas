<?php
//initiate the session
session_start();
date_default_timezone_set('Asia/Makassar');

require_once __DIR__ . '/../orm/UserORM.php';

$post = (object) $_POST;
$canLoggedIn = false;

//find user by email
$isUserExists = UserORM::where('email', $post->email)->findOne();

if (!$isUserExists) {
    $_SESSION['message'] = "User tidak ditemukan";
    header('location:form_login.php');
    return;
}

$canLoggedIn = UserORM::where('password',$post->password)->findOne();

if (!$canLoggedIn) {
    $_SESSION['message'] = "Anda tidak memiliki akses!";
    header('location:form_login.php');
    return;
}

// Check if the user is an admin
if ($isUserExists->hak_akses === 'admin') {
    // Update last_login and save the user object
    $isUserExists->last_login = time();
    $isUserExists->save();

    // Set session variables
    $_SESSION['message'] = 'Hola ' . $isUserExists->nama . '! Terakhir login: ' . date('Y-m-d H:i:s', $isUserExists->last_login);
    $_SESSION['isLoggedIn'] = true;
    $_SESSION['UserID'] = $isUserExists->id;

    // Redirect to admin page
    header('location:../admin/index.php');
    exit;
}
// Check if the user is an admin
if ($isUserExists->hak_akses === 'petugas') {
    // Update last_login and save the user object
    $isUserExists->last_login = time();
    $isUserExists->save();

    // Set session variables
    $_SESSION['message'] = 'Hola ' . $isUserExists->nama . '! Terakhir login: ' . date('Y-m-d H:i:s', $isUserExists->last_login);
    $_SESSION['isLoggedIn'] = true;
    $_SESSION['UserID'] = $isUserExists->id;

    // Redirect to admin page
    header('location:../petugas/index.php');
    exit;
}
// Check if the user is an admin
if ($isUserExists->hak_akses === 'bendahara') {
    // Update last_login and save the user object
    $isUserExists->last_login = time();
    $isUserExists->save();

    // Set session variables
    $_SESSION['message'] = 'Hola ' . $isUserExists->nama . '! Terakhir login: ' . date('Y-m-d H:i:s', $isUserExists->last_login);
    $_SESSION['isLoggedIn'] = true;
    $_SESSION['UserID'] = $isUserExists->id;

    // Redirect to admin page
    header('location:../bendahara/index.php');
    exit;
}

// Check if the user is an admin
if ($isUserExists->hak_akses === 'kepala') {
    // Update last_login and save the user object
    $isUserExists->last_login = time();
    $isUserExists->save();

    // Set session variables
    $_SESSION['message'] = 'Hola ' . $isUserExists->nama . '! Terakhir login: ' . date('Y-m-d H:i:s', $isUserExists->last_login);
    $_SESSION['isLoggedIn'] = true;
    $_SESSION['UserID'] = $isUserExists->id;

    // Redirect to admin page
    header('location:../kepala/index.php');
    exit;
}

// If the user is not an admin, redirect to another page

header('location:../pasien/index.php');
