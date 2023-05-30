<?php
require_once '../orm/PasienORM.php'; // Ganti dengan file yang sesuai

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Mendapatkan data dari form
    $kode_pasien = $_POST['kode_pasien'];
    $nama_pasien = $_POST['nama_pasien'];
    $jenis_pasien = $_POST['jenis_pasien'];
    $tempat_lahir = $_POST['tempat_lahir'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $alamat_pasien = $_POST['alamat_pasien'];
    $nomor_telphone = $_POST['nomor_telphone'];

    if (isset($_POST['id']) && is_numeric($_POST['id'])) {
        // Update data pasien jika ada ID yang terkirim
        $id = $_POST['id'];
        $pasien = PasienORM::findOne($id);
        if ($pasien) {
            $pasien->kode_pasien = $kode_pasien;
            $pasien->nama_pasien = $nama_pasien;
            $pasien->jenis_pasien = $jenis_pasien;
            $pasien->tempat_lahir = $tempat_lahir;
            $pasien->tanggal_lahir = $tanggal_lahir;
            $pasien->alamat_pasien = $alamat_pasien;
            $pasien->nomor_telphone = $nomor_telphone;
            $pasien->save();
        }
    } else {
        // Membuat data pasien baru
        $pasien = new PasienORM();
        $pasien->kode_pasien = $kode_pasien;
        $pasien->nama_pasien = $nama_pasien;
        $pasien->jenis_pasien = $jenis_pasien;
        $pasien->tempat_lahir = $tempat_lahir;
        $pasien->tanggal_lahir = $tanggal_lahir;
        $pasien->alamat_pasien = $alamat_pasien;
        $pasien->nomor_telphone = $nomor_telphone;
        $pasien->save();
    }

    // Redirect ke halaman pasien setelah menyimpan data
    header('Location: pasien.php');
    exit;
}
?>
