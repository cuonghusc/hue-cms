<?php 
    session_start();
    if (isset($_SESSION['username'])) {
        header('Location:index.php');
    } else {
        include_once('model/entity/user.php');
        if ($_SERVER["REQUEST_METHOD"]=="POST") {
            $username = $_REQUEST['username'];
            $pw = $_REQUEST['pw'];
            $rsUser = User::Authentication($username,$pw);
            if ($rsUser==null) {
                $noti = "Tên đăng nhập hoặc mật khẩu không chính xác";
            } else {
                $_SESSION['fb']=$rsUser[0]->fb;
                $_SESSION['fullname']=$rsUser[0]->fullname;
                $_SESSION['username']=$rsUser[0]->username;
                header('Location:index.php');
            }
        }
    }    
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>CMS</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>

<body class="bg-gradient-primary">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Chào mừng tác giả !</h1>
                    <p style="color:red"><?php echo isset($noti)?$noti:''; ?></p>
                  </div>
                  <form method="POST" class="user">
                    <div class="form-group">
                      <input type="text" class="form-control form-control-user" id="exampleInputText" aria-describedby="emailHelp" placeholder="Email hoặc tên đăng nhập..." name="username" value="<?php echo isset($_POST['username'])?$_POST['username']:''?>">
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Mật khẩu" name="pw" value="<?php echo isset($_POST['pw'])?$_POST['pw']:''?>">
                    </div>                    
                    <button type="submit" class="btn btn-primary btn-user btn-block">
                      Đăng nhập
                    </button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

</body>

</html>
