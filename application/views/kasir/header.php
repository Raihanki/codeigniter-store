<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/') ?>bootstrap/css/bootstrap.min.css">

    <!-- css untuk kasir -->
    <link rel="stylesheet" href="<?= base_url('assets/') ?>style.css">
    <link href="<?= base_url('assets/sbad/'); ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <title><?= $title; ?></title>
  </head>
  <body>
    <!-- navbar -->
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="#"><i class="fas fa-mug-hot"></i> Gaou Cafe</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"           aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                    <a class="nav-item nav-link" href="<?= base_url('kasir') ?>">Menu</a>
                    <?php if($keranjang) : ?>
                    <a class="nav-item nav-link" href="<?= base_url('kasir/keranjang') ?>">Keranjang</a>
                    <?php endif; ?>
                    <a class="nav-item nav-link" href="<?= base_url('auth/logout') ?>">Logout</a>
                    <?php if($user['role_id'] == 1) : ?>
                    <a class="nav-item nav-link" href="<?= base_url('admin') ?>">Back to Dashboard</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </nav>

    <!-- jumbotron -->
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="text-light text-center"><?= $title; ?></h1>
        </div>
    </div>