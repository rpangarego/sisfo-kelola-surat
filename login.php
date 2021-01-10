<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Sistem Informasi Pengelolaan Surat</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-lg-5 col-md-6">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-12">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h3 text-dark font-weight-bold">Sisfo Pengelolaan Surat</h1>
                    <p>Silahkan login terlebih dahulu</p>

                    <?php require_once'includes/functions.php'; ?>
                    <?php if (isset($_POST['login'])) {
                        // jika salah satu field kosong
                        if (empty($_POST['username']) || empty($_POST['password'])) {
                          echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                Lengkapi username dan password! <button type="button" class="close" 
                                data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
                                </button></div>';
                        }else{
                        // cek username/password
                          $user = $db->get_row("SELECT * FROM tb_pengguna WHERE username='$_POST[username]' AND password='$_POST[password]'");
                          // set username and password session
                          if ($user) {
                            $_SESSION['id_user'] = $user->id;
                            $_SESSION['username'] = $user->username;
                            $_SESSION['level'] = $user->level;

                            if ($user->level==1) {
                              // tingkat 1 = tata usaha
                              redirect_js("tatausaha/index");
                            }elseif ($user->level==2) {
                              // tingkat 2 = kepala sekolah
                              redirect_js("kepsek/index");
                            }else{
                              // selain itu hapus sesi dan tutup tab
                              $_SESSION=[];
                              session_unset();
                              echo '<div class="alert alert-info alert-dismissible fade show" role="alert">
                                User level unknown. Access denied! <button type="button" class="close" 
                                data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
                                </button></div>';
                            }
                          }else{
                            // jika username dan password tidak cocok
                            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                Username atau password salah! <button type="button" class="close" 
                                data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
                                </button></div>';
                          }
                        }
                    } ?>


                    <!-- <div class="alert alert-danger" role="alert">
                      Username atau password salah!
                    </div> -->

                  </div>
                  <form class="user" method="POST">
                    <div class="form-group">
                      <input type="text" class="form-control form-control-user" id="username" name="username" placeholder="Username" style="font-size: 16px;" autocomplete="off">
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Password" style="font-size: 16px;">
                    </div>
                    <button type="submit" name="login" class="btn btn-primary btn-user btn-block">Login</button>
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
