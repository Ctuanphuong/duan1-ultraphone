<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>ULtraphone - Login</title>
  <link rel="shortcut icon" type="imagex-icon" href="view/assets/img/logo-url.png" />
  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="view/assets/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-dark">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5 mt-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block ">
                <img src="uploads/admin1.jpg" alt="logo Ultraphone" style="width: 500px; ">
              </div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Trang quản trị UltraPhone!</h1>
                  </div>
                  <form class="user" action="index.php?act=login" method="post">
                    <div class="form-group">
                      <input type="text" class="form-control form-control-user" name="user_name" placeholder="Nhập tài khoản" required>
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" name="password" placeholder="Nhập mật khẩu" required>

                    </div>
                    <!-- <div class="form-group">
                      <div class="custom-control custom-checkbox small">
                        <input type="checkbox" class="custom-control-input" id="customCheck">
                        <label class="custom-control-label" for="customCheck">Ghi nhớ tài khoản</label>
                      </div>
                    </div> -->
                    <input type="submit" class="btn btn-dark btn-user btn-block" name="btn_login" value="Đăng nhập">
                    <hr>
                  </form>
                  <div>
                    <?php
                    // var_dump($_SESSION['admin']);
                    if (isset($noti_success) && $noti_success != "") {
                      echo $noti_success;
                    }
                    ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="view/assets/js/jquery.min.js"></script>
  <script src="view/assets/js//bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="view/assets/js/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="view/assets/js/sb-admin-2.min.js"></script>

</body>

</html>