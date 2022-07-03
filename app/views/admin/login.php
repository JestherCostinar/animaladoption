<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <link rel="icon" type="image/png" sizes="16x16" href="<?php echo URLROOT ?>/public/assets/img/animal-adoption-logo.png" />
  <title><?php echo SITENAME . ' | ' . $data['title'] ?></title>

  <!-- Custom fonts for this template-->
  <link href="<?php echo URLROOT ?>/public/assets/admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css" />
  <link href="https://fonts.googleapis.com/css?family=Poppins:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet" />

  <!-- Custom styles for this template-->
  <link href="<?php echo URLROOT ?>/public/assets/admin/css/sb-admin-2.min.css" rel="stylesheet" />
</head>

<body class="bg-gradient-primary">
  <div class="container">
    <!-- Outer Row -->
    <div class="row justify-content-center">
      <div class="col-xl-10 col-lg-12 col-md-9">
        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row" style="height: 400px;">
              <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4"><?php echo SITENAME . ' System' ?></h1>
                  </div>
                  <?php if (!empty($data['loginMessage'])) : ?>
                    <div class="alert alert-danger text-sm" role="alert">
                      <?php echo $data['loginMessage']; ?>
                    </div>
                  <?php endif; ?>
                  <form class="user" action="<?php echo URLROOT; ?>/auth/admin" method="POST">
                    <div class="form-group">
                      <input type="email" class="form-control form-control-user" placeholder="Enter Email Address..." name="email" />
                      <div class="text-center">
                        <small class="input-validation text-danger"><?php echo $data['emailError']; ?></small>
                      </div>
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" name="password" placeholder="Password" />
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary btn-user btn-block">
                      Login
                    </button>
                    <hr />
                  </form>
                  <hr />
                  <div class="text-center">
                    <a class="small" href="register.html">Go to User Side</a>
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
  <script src="<?php echo URLROOT ?>/public/assets/admin/vendor/jquery/jquery.min.js"></script>
  <script src="<?php echo URLROOT ?>/public/assets/admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?php echo URLROOT ?>/public/assets/admin/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?php echo URLROOT ?>/public/assets/admin/js/sb-admin-2.min.js"></script>
</body>

</html>