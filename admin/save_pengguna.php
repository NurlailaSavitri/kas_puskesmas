<?php
session_start();

require_once '../orm/UserORM.php';

$post = (object) $_POST;

$user = UserORM::create();
$user->nama = $post->nama;
$user->email = $post->email;
$user->password = $post->password;

//$user->hak_akses = $post->hak_akses;

// Mengatur hak_akses sesuai pilihan select
if ($post->hak_akses === 'kepala') {
    $user->hak_akses = 'kepala';
} elseif ($post->hak_akses === 'petugas') {
    $user->hak_akses = 'petugas';
} elseif ($post->hak_akses === 'bendahara') {
    $user->hak_akses = 'bendahara';
}

// Cek apakah dalam mode edit atau tambah pengguna baru
if (isset($post->id) && is_numeric($post->id)) {
    $id = $post->id;
    $existingUser = UserORM::findOne($id);
    if ($existingUser) {
        $existingUser->nama = $user->nama;
        $existingUser->email = $user->email;
        $existingUser->password = $user->password;
        $existingUser->hak_akses = $user->hak_akses;
        $existingUser->save();

        $_SESSION['message'] = "Data pengguna berhasil diperbarui";
    }
} else {
    $user->save();

    $_SESSION['message'] = "Pengguna baru berhasil ditambahkan";
}

header('location: pengguna.php');
return;
?>
