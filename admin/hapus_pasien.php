<?php 

require_once '../orm/PasienORM.php';

$id = (int) $_GET['id'];

$pasien = PasienORM::findOne($id);
$pasien -> delete();

echo '<script>alert("Delete is successful"); window.location.href = "pasien.php";</script>';

?>
