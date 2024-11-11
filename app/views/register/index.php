<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $data['title']; ?></title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= BASEURL; ?>/public/plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="<?= BASEURL; ?>/public/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= BASEURL; ?>/public/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="<?= BASEURL; ?>/public/css/bootstrap.css">
    <link rel="stylesheet" href="<?= BASEURL; ?>/public/css/style.css">
</head>
<body class="hold-transition register-page" style="background-color: #212529;">
<div class="register-box">
    <div class="register-logo">
        <p class="text-white">Register</p>
    </div>
    <div class="card dark-mode">
    <div class="card-body register-card-body m-0">
      <p class="login-box-msg">Register a new membership</p>
        <div class="container p-0">
            <form action="<?= BASEURL; ?>/register/reg/" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <input type="text" class="form-control" id="nama" name="nama" value="" placeholder="Nama" required>
                </div>

                <div class="form-group">
                    <input type="text" class="form-control" id="username" name="username" value="" placeholder="Username" required>
                </div>
               
                
                <div class="form-group">
                    <input type="password" class="form-control" id="password" name="password" value="" placeholder="Password" required>
                </div>
                
                <!-- <div class="form-group mb-3">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="gambar" name="gambar" value="" onchange="updateFileName(this)">
                        <label class="custom-file-label" for="gambar" id="selectedFileName">Choose file</label>
                    </div>
                </div> -->

                <div class="form-group">
                    <input type="hidden" class="form-control" id="status" name="status" value="1" placeholder="Status" disabled>
                </div>

                <button type="submit" class="btn w-100" style="background-color: #aeb0b3;">Register</button>
            </form>
        </div>

        <p class="mb-0 pt-3 text-center">
        Already have a account ? <a href="<?= BASEURL; ?>/Login" class="text-center" style="text-decoration: none">Login</a>
      </p>
</div>
<!-- /.form-box -->
    </div><!-- /.card -->
</div>
<script>
    function updateFileName(input) {
        var fileName = input.files[0].name;
        var label = document.getElementById('selectedFileName');
        label.innerText = fileName;
    }
</script>
<!-- /.register-box -->

<script src="/public/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="/public/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="/public/dist/js/adminlte.min.js"></script>
</body>
</html>
