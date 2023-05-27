<?php
session_start();
require_once '../orm/UserORM.php';
$editMode= false;

if(isset($_GET['id']) && is_numeric($_GET['id'])){
    $user_id= $_GET ['id'];
    $user = UserORM::findOne ($user_id);
    $editMode = $user;
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
          </div>
          

            <div class="panel-body">
        <div class="table-responsive mt-3">
          <table class="table table-striped table-bordered table-hover" id="dataTables-example">
            <thead>
              <tr>
                <th>No.</th>
                <th>Nama User</th>
                <th>Email</th>
                <th>Level User</th>
              </tr>
            </thead>
            <tbody>
            <?php
              //get all pelanggan list
                        $list_user= UserORM::findMany();
                        if (!empty($list_user)) {
                            foreach ($list_user as $key => $user) { ?>

              <tr>
                <th scope="row">
                  <?= $key +1;?>
                </th>
                <th><a href="http://localhost/kas_kecil/pengguna/detail_pengguna.php?id=<?= $user->id; ?>">
                    <?= $user->nama;?>
                  </a></th>
                <th><?=$user->email;?></th>
                <th><?=$user->hak_akses;?></th>
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
        <h5 class="modal-title" id="exampleModalLabel">Form Tambah Pengguna</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form class="form-horizontal" method="POST" action="save_pengguna.php">
      <div class="modal-body">
      <div class="form-row">
                                <div class="col-md-12">
                                <label for="nama">Nama</label>
                                    <input type="text" name="nama" id="nama" class="form-control" placeholder="Masukkan Nama">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-12">
                                <label for="email">Email</label>
                                    <input type="text" class="form-control" placeholder="Masukkan Email" id="email" name="email" required>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-12">
                                <label for="password">Password</label>
                                    <input type="password" class="form-control" placeholder="Masukkan Password" id="password" name="password" required>
                                    <input type="checkbox" onclick="myFunction()" style=" margin-top: 1rem !important;"> Show Password 

                                </div>
                            </div>
                            <div class="form-row">
  <div class="col-md-12">
    <label>Level</label>
    <select class="form-select" aria-label="Default select example" name="level">
      <option selected disabled>Pilih Level</option>
      <option value="admin">Admin</option>
      <option value="petugas">Petugas</option>
      <option value="bendahara">Bendahara</option>
    </select>
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