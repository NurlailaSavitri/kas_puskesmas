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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-jQg0+bAY6ky4F9vjIgvgxNt3a/JM8jOQZYLkhxG4I5i22SBy5eJJHE2Pe0QuaX+Jd2KTDmbI/x9Ri3RE6fg4kQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

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
      <style>
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
    .card{
      box-shadow: 0 0 10px rgba(1, 2, 3, 4.1);

    }
</style>

<div class="navbar">
    <div class="navbar-left">
        <a><?= $user->nama;?></a>
    </div>
    <div class="navbar-right">
        <a><?= $user->password;?></a>
    </div>
</div>
<br>
<br>
<br>
<br>

<div class="navbar">
    <div class="navbar-left">
        <a><?= $user->email;?></a>
    </div>
    <div class="navbar-right">
        <a><?= $user->hak_akses;?></a>
    </div>
</div>
<br>
<br>


<div style="white-space: nowrap; text-align: center;">
                  <a type="button" data-toggle="modal" class="btn btn-primary mb-3"
                data-target="#exampleModal" style="margin-right: 10px;">Edit</a>
                <a type="button" data-toggle="modal" class="btn btn-info mb-3" 
                data-target="#exampleModal1" style="margin-left: 10px;">Hapus</a>
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
    <select class="form-select" aria-label="Default select example" name="hak_akses">
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