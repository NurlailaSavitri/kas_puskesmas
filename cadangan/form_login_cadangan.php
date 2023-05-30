<?php
//initiate the session
session_start();
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
    <!-- Style -->
    <link rel="stylesheet" href="../css/StyleLogin.css">

    <title>Daftar</title>
  </head>
  <body>
  

  <div class="d-lg-flex half">
    <div class="bg order-1 order-md-2" style="background-image: url('naraya1.jpeg');"></div>
    <div class="contents order-2 order-md-1">

      <div class="container">
        <div class="row align-items-center justify-content-center">
          <div class="col-md-7">
          <?php
                        if (isset($_SESSION['message'])){
                            echo '<div class=" alert alert-warning">'. $_SESSION['message'].'</div>';
                            unset($_SESSION['message']);
                        }
                        ?>
            <h3><strong>Daftar Akun</strong></h3>
            <p class="mb-4">Puskesmas Naraya Kota Banjarmasin.</p>
            <form action="register.php" method="POST">
            <div class="form-group first">
                <label for="username">Username</label>
                <input type="text" class="form-control" placeholder="Masukkan Username" id="nama" name="nama" required>
              </div>
              <div class="form-group first">
                <label for="username">Email</label>
                <input type="text" class="form-control" placeholder="Masukkan Email" id="email" name="email" required>
              </div>
              <div class="form-group last mb-3">
                <label for="password">Password</label>
                <input type="password" class="form-control" placeholder="Masukkan Password" id="password" name="password" required>
              </div>
              <div class="form-group first">
                <label for="username">Retype Password</label>
                <input type="password" class="form-control" placeholder="Retype Password" id="email" name="password_confirm" required>
                <input type="checkbox" onclick="myFunction()" style=" margin-top: 1rem !important;"> Show Password 

              </div>
              
              
              <div class="mb-5 text-center" style="font-size: 14px;">
                Sudah Punya Akun ? <a href="form_login.php" class="text-primary" style="text-decoration: none;">Login</a>
              </div>
              <input type="submit" value="Buat Akun" class="btn btn-block btn-primary">

            </form>
          </div>
        </div>
      </div>
    </div>

    
  </div>
    
    

    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>

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

  </body>
</html>