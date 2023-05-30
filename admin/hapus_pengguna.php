<?php 

require_once '../orm/UserORM.php';

$id = (int) $_GET['id'];

$user = UserORM::findOne($id);
$user -> delete();

echo '<script>alert("Delete is successful"); window.location.href = "pengguna.php";</script>';

?>
