<?php
  session_start();
  $nama = $_SESSION['nama'];
  $id = $_SESSION['id'];
  $gambar = $_SESSION['gambar'];
  
?>
<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">
<head>
    <meta charset="UTF-8">
    <title>Halaman <?= $data['title']; ?></title>
    <link rel="stylesheet" href="<?= BASEURL; ?>/public/css/bootstrap.css">
    <link rel="stylesheet" href="<?= BASEURL; ?>/public/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="<?= BASEURL; ?>/public/sweetalert/sweetalert2.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.7/css/dataTables.dataTables.min.css">
    <link rel="stylesheet" href="<?= BASEURL; ?>/public/css/style.css">
</head>
<body >

<nav class="navbar navbar-dark bg-dark">
  <div class="container d-flex justify-content-between">
    <a class="navbar-brand text-utama" href="#"><img src="<?= BASEURL; ?>/public/img/logo new.png" alt="nav logo" width="85%"></a>
    <div class="dropdown bg-dark">
      <a class="nav-link bg-dark dropdown-toggle text-utama" href="#" id="profile" role="button" data-bs-toggle="dropdown" aria-expanded="false">
        <!-- <img src="https://i.scdn.co/image/ab67616d00001e028863bc11d2aa12b54f5aeb36" alt="Profile" class="rounded-circle me-2" width="30" height="30"> -->
        <?= $nama ?>
      </a>
      <ul class="dropdown-menu bg-dark border-white">
        <li><a class="dropdown-item" href="#">Profile</a></li>
        <li><a class="dropdown-item" href="#">Settings</a></li>
        <li><hr class="dropdown-divider" style="border-color: white;"></li>
        <li><a class="dropdown-item" href="<?= BASEURL; ?>/Login/logout">Logout</a></li>
      </ul>
    </div>
  </div>
</nav>


