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

    <title>PUSKESMAS NARAYA</title>
  </head>
  <body>
  

  <div class="d-lg-flex half">
    <div class="bg order-1 order-md-2" style="background-image: url('naraya1.jpeg');"></div>
    <div class="contents order-2 order-md-1">

      <div class="container">
        <div class="row align-items-center justify-content-center">
          <div class="col-md-7">
            <h3><strong>Selamat Datang</strong></h3>
            <p class="mb-4">Puskesmas Naraya Kota Banjarmasin.</p>
            <form action="Login.php" method="POST">
              <div class="form-group first">
                <label for="username">Username</label>
                <input type="text" class="form-control" placeholder="Masukkan Username" id="username" name="username" required>
              </div>
              <div class="form-group last mb-3">
                <label for="password">Password</label>
                <input type="password" class="form-control" placeholder="Masukkan Password" id="password" name="password" required>
                <input type="checkbox" onclick="myFunction()" style=" margin-top: 1rem !important;"> Show Password 
              </div>
              
              <div class="mb-5 text-center" style="font-size: 14px;">
                Belum Punya Akun ? <a href="form_register.php" class="text-primary" style="text-decoration: none;">Daftar</a>
              </div>
              <input type="submit" value="Masuk" class="btn btn-block btn-primary">

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