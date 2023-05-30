<?php
session_start();
require_once '../orm/PasienORM.php';
$editMode= false;

if(isset($_GET['id']) && is_numeric($_GET['id'])){
    $pasien_id= $_GET ['id'];
    $pasien = PasienORM::findOne ($pasien_id);
    $editMode = $pasien;
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
      
      <div class="container-fluid">
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
        <div class="container">
            <div class="row">
            <div style="text-align: right;">
            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">
  (+)Tambah
</button>
          </div>
          

            <div class="panel-body">
        <div class="table-responsive mt-3">
          <table class="table table-striped table-bordered table-hover" id="dataTables-example">
            <thead>
              <tr>
                <th>No.</th>
                <th>Kode Pasien</th>
                <th>Nama Pasien</th>
                <th>Jenis Kelamin</th>

              </tr>
            </thead>
            <tbody>
            <?php
              //get all pelanggan list
                        $list_pasien= PasienORM::findMany();
                        if (!empty($list_pasien)) {
                            foreach ($list_pasien as $key => $pasien) { ?>

              <tr>
                <th scope="row">
                  <?= $key +1;?>
                </th>
                <th><a href="http://localhost/kas_puskesmas/admin/detail_pengguna.php?id=<?= $pasien->id; ?>">
                    <?= $pasien->kode_pasien;?>
                  </a></th>
                <th><?=$pasien->nama_pasien;?></th>
                <th><?=$pasien->jenis_pasien;?></th>
              </tr>

              <?php }
                        } else {
                            echo '<tr><td colspan="4">No records found</td></tr>';
                        }
                        ?>
            </tbody>
          </table>

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
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Form Tambah Pasien</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form class="form-horizontal" method="POST" action="save_pasien.php">
      <div class="modal-body">
      <div class="form-row">
                                <div class="col-md-12">
                                <label for="kode_pasien">Kode Pasien</label>
                                    <input type="text" name="kode_pasien" id="kode_pasien" class="form-control" placeholder="Masukkan Kode Pasien">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-12">
                                <label for="nama_pasien">Nama Pasien</label>
                                    <input type="text" class="form-control" placeholder="Masukkan Nama Pasien" id="nama_pasien" name="nama_pasien" required>
                                </div>
                            </div>
                            <div class="col-md-12">
    <label>Jenis Kelamin</label>
    <select class="form-select" aria-label="Default select example" name="Jenis_pasien">
      <option selected disabled>Jenis Kelamin</option>
      <option value="laki-laki">Laki-Laki</option>
      <option value="perempuan">Perempuan</option>
      <option value="laki dan perempuan">Laki dan Perempuan</option>
    </select>
  </div>

                            <div class="form-row">
                                <div class="col-md-12">
                                <label for="password">Tempat Lahir</label>
                                    <input type="text" class="form-control" placeholder="Masukkan Tempat Lahir" id="tempat_lahir" name="tempat_lahir" required>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-12">
                                <label for="nama_pasien">Tanggal Lahir</label>
                                    <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" required>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-12">
                                <label for="alamat_pasien">Tempat Tinggal</label>
                                    <input type="text" class="form-control" placeholder="Masukkan Tempat Tinggal" id="alamat_pasien" name="alamat_pasien" required>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-12">
                                <label for="nomor_telphone">Nomor Telphone</label>
                                    <input type="text" class="form-control" placeholder="Masukkan Nomor Telphone" id="nomor_telphone" name="nomor_telphone" required>
                                </div>
                            </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
</form>

<script>
      function myFunction() {
        var x = document.getElementById("password");
      if (x.type === "password") {
          x.type = "text";
        } else {
        x.type = "password";
    		}
      } 
    </script>