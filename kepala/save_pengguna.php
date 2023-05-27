<?php

//initiate the session
session_start();

require_once '../orm/UserORM.php';

$post = (object) $_POST;

$user=UserORM::create();
$user->nama = $post->nama;
$user->email= $post->email;
$user->hak_akses= $post->hak_akses;
$user->password= password_hash($post->password, PASSWORD_DEFAULT);
$user->save();

$_SESSION['message']="Selamat anda berhasil terdaftar, selanjutnya silahkan login";

    header('location:pengguna.php');
    return;

?>