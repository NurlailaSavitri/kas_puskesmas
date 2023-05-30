<?php
session_start();
require_once '../orm/PasienORM.php';

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
        margin-left: 0px;
    }

    .navbar-right {
        margin-right: 0px;
    }
    .navbar-left1 {
        margin-left: 0px;
    }

    .navbar-right1 {
        margin-right: 0px;
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
      <?php
              //get all pelanggan list
                        $list_pasien= PasienORM::findMany();
                        if (!empty($list_pasien)) {
                            foreach ($list_pasien as $key => $pasien) { ?>
 <?php }
                        } else {
                            echo '<tr><td colspan="4">No records found</td></tr>';
                        }
                        ?>
              
      <div style="margin-left:70px;" class="row">

      <div class="col-sm-4">
  <div class="card" style="display: flex; flex-direction: column; height: 350px;">
    <div class="card-body" style="display: flex; flex-direction: column; justify-content: center; align-items: center;">
      <img src="../gambar/user.jpeg" alt="User Image" style="width: 200px; height: 200px; border-radius: 50%;">
      <br>
      <strong style="text-align: center;"><?= $pasien->nama_pasien; ?></strong>
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
    <strong style="color: black; margin-right: 0px;">Tempat Lahir:</strong>
    <br>
    <a><?= $pasien->tempat_lahir; ?></a>
  </div>
  <div class="navbar-right">
    <strong style="color: black; margin-right: 20px;">Tanggal Lahir:</strong>
    <br>
    <a><?= $pasien->tanggal_lahir; ?></a>
  </div>
</div>

<br>
<br>

<div class="navbar">
  <div class="navbar-left1">
    <strong style="color: black; margin-right: 0px;">Alamat:</strong>
    <br>
    <a><?= $pasien->alamat_pasien; ?></a>
  </div>
  <div class="navbar-right1">
    <strong style="color: black; margin-right: 0px;">Nomor Telphone:</strong>
    <br>
    <a><?= $pasien->nomor_telphone; ?></a>
  </div>
</div>

<br>
<br>

<div style="white-space: nowrap; text-align: center;">
  <button type="submit" class="btn btn-secondary" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#exampleModal">Edit</button>

  <a type="delete" href="hapus_pasien.php?id=" class="btn btn-secondary">Hapus</a>
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
<?php
// get all pelanggan list
$list_pasien = PasienORM::findMany();
if (!empty($list_pasien)) {
    foreach ($list_pasien as $key => $pasien) {
        // Check if current pasien is the one being edited
       
        ?>
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"><?= ($pasien) ? 'Edit' : 'Add' ?> Pasien</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form class="form-horizontal" method="POST" action="save_pasien.php">
                        <div class="modal-body">
                            <div class="col-md-12">
                                <label for="kode_pasien">Kode Pasien</label>
                                <input type="text" value="<?= ($pasien) ? $pasien->kode_pasien : '' ?>" name="kode_pasien" class="form-control" placeholder="Masukan Kode Pasien">
                            </div>
                            <div class="form-row">
                                <div class="col-md-12">
                                    <label for="nama_pasien">Nama Pasien</label>
                                    <input type="text" value="<?= ($pasien) ? $pasien->nama_pasien : '' ?>" name="nama_pasien" class="form-control" placeholder="Masukan Nama Pasien">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label>Jenis Kelamin</label>
                                <select class="form-select form-control" aria-label="Default select example" name="jenis_pasien">
                                    <option selected disabled><?= ($pasien) ? $pasien->jenis_pasien : 'Jenis Kelamin' ?></option>
                                    <option value="laki-laki">Laki-Laki</option>
                                    <option value="perempuan">Perempuan</option>
                                    <option value="laki dan perempuan">Laki dan Perempuan</option>
                                </select>
                            </div>
                            <div class="form-row">
                                <div class="col-md-12">
                                    <label for="tempat_lahir">Tempat Lahir</label>
                                    <input type="text" value="<?= ($pasien) ? $pasien->tempat_lahir : '' ?>" name="tempat_lahir" class="form-control" placeholder="Masukan Tempat Lahir">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-12">
                                    <label for="tanggal_lahir">Tanggal Lahir</label>
                                    <input type="date" value="<?= ($pasien) ? $pasien->tanggal_lahir : '' ?>" name="tanggal_lahir" class="form-control" placeholder="Masukan Tanggal Lahir">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-12">
                                    <label for="alamat_pasien">Tempat Tinggal</label>
                                    <input type="text" value="<?= ($pasien) ? $pasien->alamat_pasien : '' ?>" name="alamat_pasien" class="form-control" placeholder="Masukan Tempat Tinggal">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-12">
                                    <label for="nomor_telphone">Nomor Telepon</label>
                                    <input type="text" value="<?= ($pasien) ? $pasien->nomor_telphone : '' ?>" name="nomor_telphone" class="form-control" placeholder="Masukan Nomor Telepon">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary"><?= ($pasien) ? 'Save Changes' : 'Add User' ?></button>
                        </div>
                        <?php if ($pasien): ?>
                            <input type="hidden" name="kode_pasien" value="<?= $pasien->kode_pasien ?>">
                        <?php endif; ?>
                    </form>
                </div>
            </div>
        </div>
        <?php
    }
} else {
    echo '<tr><td colspan="4">No records found</td></tr>';
}
?>




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