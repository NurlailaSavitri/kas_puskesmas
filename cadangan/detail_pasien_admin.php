<?php
session_start();
require_once '../orm/PasienORM.php';
$editMode = false;

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $pasien_id = $_GET['id'];
    $pasien = PasienORM::findOne($pasien_id);
    $pasien = ($pasien !== null);
}
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Puskesmas</title>
  <link rel="shortcut icon" type="image/png" href="../assets/images/logos/favicon.png" />
  <link rel="stylesheet" href="../assets/css/styles.min.css" />
</head>
<style>
.order-card {
    color: #fff;
}

.bg-c-blue {
    background: linear-gradient(45deg,#4099ff,#73b4ff);
}

.bg-c-green {
    background: linear-gradient(45deg,#2ed8b6,#59e0c5);
}

.bg-c-yellow {
    background: linear-gradient(45deg,#FFB64D,#ffcb80);
}

.bg-c-pink {
    background: linear-gradient(45deg,#FF5370,#ff869a);
}


.card {
    border-radius: 5px;
    -webkit-box-shadow: 0 1px 2.94px 0.06px rgba(4,26,55,0.16);
    box-shadow: 0 1px 2.94px 0.06px rgba(4,26,55,0.16);
    border: none;
    margin-bottom: 30px;
    -webkit-transition: all 0.3s ease-in-out;
    transition: all 0.3s ease-in-out;
}

.card .card-block {
    padding: 25px;
}

.order-card i {
    font-size: 26px;
}

.f-left {
    float: left;
}

.f-right {
    float: right;
}
.navbar {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .navbar-left {
        margin-left: 10px;
    }

    .navbar-right {
        margin-right: 10px;
    }
    .navbar-left1 {
        margin-left: 10px;
    }

    .navbar-right1 {
        margin-right: 25px;
    }
    .card{
      box-shadow: 0 0 10px rgba(1, 2, 3, 4.1);

    }
</style>


<body>
  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <!-- Sidebar Start -->
    <?php
    require_once '../section/sidebar.php';
    ?>
    <!--  Main wrapper -->
    <div class="body-wrapper">
      <!--  Header Start -->
      <?php
    require_once '../section/header.php';
    ?>
      <header class="app-header">
        <nav class="navbar navbar-expand-lg navbar-light">
          <ul class="navbar-nav">
            <li class="nav-item d-block d-xl-none">
              <a class="nav-link sidebartoggler nav-icon-hover" id="headerCollapse" href="javascript:void(0)">
                <i class="ti ti-menu-2"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link nav-icon-hover" href="javascript:void(0)">
                <i class="ti ti-bell-ringing"></i>
                <div class="notification bg-primary rounded-circle"></div>
              </a>
            </li>
          </ul>
          <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
            <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
              <li class="nav-item dropdown">
                <a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2" data-bs-toggle="dropdown"
                  aria-expanded="false">
                  <img src="../assets/images/profile/user-1.jpg" alt="" width="35" height="35" class="rounded-circle">
                </a>
                <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop2">
                  <div class="message-body">
                    <a href="javascript:void(0)" class="d-flex align-items-center gap-2 dropdown-item">
                      <i class="ti ti-user fs-6"></i>
                      <p class="mb-0 fs-3">Profile</p>
                    </a>
                    <a href="../login/form_login.php" class="btn btn-outline-primary mx-3 mt-2 d-block">Logout</a>
                  </div>
                </div>
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <!--  Header End -->
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      
      <div style="margin-left:70px;" class="row">

<div class="col-sm-4">
  <div class="card" style="display: flex; flex-direction: column; height: 350px;">
    <div class="card-body" style="display: flex; justify-content: center; align-items: center;">
      <img src="../gambar/user.jpeg" alt="User Image" style="width: 200px; height: 200px; border-radius: 50%;">
    </div>
  </div>
</div>




  <div class="col-sm-7">
  <div class="card" style="height: 350px;">

      <div class="card-body">
      <div style="text-align: center;">
  <strong style="color: black; margin-right: 10px;">INFORMASI</strong>
</div>
      
    
      <br>
      <br>
     
<div class="navbar">
  <div class="navbar-left">
    <strong style="color: black; margin-right: 10px;">Tempat Lahir:</strong>
    <br>
    <a><?= $pasien->tempat_lahir; ?></a>
  </div>
  <div class="navbar-right">
    <strong style="color: black; margin-right: 10px;">Tanggal Lahir:</strong>
    <br>
    <a><?= $pasien->tanggal_lahir; ?></a>
  </div>
</div>

<br>
<br>

<div class="navbar">
  <div class="navbar-left1">
    <strong style="color: black; margin-right: 10px;">Alamat:</strong>
    <br>
    <a><?= $pasien->alamat_pasien; ?></a>
  </div>
  <div class="navbar-right1">
    <strong style="color: black; margin-right: 10px;">Nomor Telphone:</strong>
    <br>
    <a><?= $pasien->nomor_telphone; ?></a>
  </div>
</div>

<br>
<br>

<div style="white-space: nowrap; text-align: center;">
  <button type="submit" class="btn btn-secondary" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#exampleModal">Edit</button>

  <a href="hapus_pasien.php?id=<?= $pasien->id ?>" class="btn btn-secondary">Hapus</a>
</div>
      </div>
  </div>
  </div>
      </div>
    </div>
  </div>

        <!--  Row 1 -->
        <div class="row">
        <div class="py-6 px-6 text-center">
          <p class="mb-0 fs-4">Sistem Informasi Pengelolaan Kas Puskesmas</p>
        </div>
      </div>
    </div>
  </div>
     
  <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
  <script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/js/sidebarmenu.js"></script>
  <script src="../assets/js/app.min.js"></script>
  <script src="../assets/libs/apexcharts/dist/apexcharts.min.js"></script>
  <script src="../assets/libs/simplebar/dist/simplebar.js"></script>
  <script src="../assets/js/dashboard.js"></script>
</body>

</html>

<!-- Modal -->
<!--<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <?php
  $editMode = false;

  if (isset($_GET['id']) && is_numeric($_GET['id'])) {
      $id = $_GET['id'];
      $pasien = PasienORM::findOne($id);
      $editMode = $pasien !== null;
  }
  ?>
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><?= ($editMode) ? 'Edit' : 'Tambah' ?> Pengguna</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form class="form-horizontal" method="POST" action="save_pengguna.php">
        <div class="modal-body">
          <div class="form-row">
            <div class="col-md-12">
              <label for="nama">Nama</label>
              <input type="text" value="<?= ($editMode) ? $user->nama : '' ?>" name="nama" class="form-control" placeholder="Masukan Nama">
            </div>
          </div>
          <div class="form-row">
            <div class="col-md-12">
              <label for="email">Email</label>
              <input type="text" value="<?= ($editMode) ? $user->email : '' ?>" name="email" class="form-control" placeholder="Masukan Email">
            </div>
          </div>
          <div class="form-row">
  <div class="col-md-12">
    <label for="password">Password</label>
    <input type="password" value="<?= ($editMode) ? $user->password : '' ?>" name="password" id="password" class="form-control" placeholder="Masukan Password">
    <input type="checkbox" onclick="myFunction()" style="margin-top: 1rem !important;"> Show Password
  </div>
</div>




          <div class="form-row">
            <div class="col-md-12">
              <label for="hak_akses">Level</label>
              <select class="form-select form-control" aria-label="Default select example" name="hak_akses">
                <option selected disabled><?= ($editMode) ? $user->hak_akses : 'Pilih Level' ?></option>
                <option value="kepala">Kepala</option>
                <option value="petugas">Petugas</option>
                <option value="bendahara">Bendahara</option>
              </select>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary"><?= ($editMode) ? 'Save Changes' : 'Add User' ?></button>
        </div>
        <?php if ($editMode): ?>
          <input type="hidden" name="id" value="<?= $user->id ?>">
        <?php endif; ?>
      </form>
    </div>
  </div>
</div>


<script>
function myFunction() {
  var passwordInput = document.getElementById("password");

  if (passwordInput.type === "password") {
    passwordInput.type = "text";
  } else {
    passwordInput.type = "password";
  }
}
</script>