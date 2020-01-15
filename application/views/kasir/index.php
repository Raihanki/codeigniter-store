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

    <title><?= $title; ?></title>
  </head>
  <body>
    <!-- navbar -->
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="#">Gaou Cafe</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"           aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                    <a class="nav-item nav-link" href="<?= base_url('kasir') ?>">Menu</a>
                    <a class="nav-item nav-link" href="<?= base_url('kasir/keranjang') ?>">Keranjang</a>
                    <a class="nav-item nav-link" href="<?= base_url('auth/logout') ?>">Logout</a>
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
    <!-- card -->
    <div class="container">

        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h5 class="text-center">PILIH KATEGORI</h5>
                        <div class="row">
                            <div class="col d-flex justify-content-center">
                                <a href="<?= base_url('kasir') ?>" class="btn btn-primary m-3">Semua Kategori</a>
                                <?php foreach($kategori as $kat) : ?>
                                    <a href="<?= base_url('kasir/') ?><?= $kat['kategori'] ?>" class="btn btn-primary m-3"><?= $kat['kategori'] ?></a>
                                <?php endforeach; ?>    
                            </div>
                        </div>
                    </div>
                    <form action="" method="post">
                        <div class="row m-3">
                            <div class="col-sm-1">
                                <button class="btn btn-primary" type="submit">Search</button>
                            </div>
                            <div class="col-sm-3">
                                <input class="form-control" type="search" placeholder="Search" aria-label="Search">
                            </div>
                        </div>
                    </form>
                        <div class="table-responsive">
                            <table class="table">
                            <thead class="thead-light">
                                <tr>
                                <th>No</th>
                                <th>Nama Menu</th>
                                <th>Harga</th>
                                <th>Kategori</th>
                                <th>Tersedia</th>
                                <th>Gambar</th>
                                <th>Opsi</th>
                                </tr>
                            </thead>
                            <?php $i = 1; ?>
                            <?php foreach($menu as $m) : ?>
                            <tbody>
                                <tr>
                                <th><?= $i; ?></th>
                                <td><?= $m['nama_menu'] ?></td>
                                <td><?= $m['harga'] ?></td>
                                <td><?= $m['kategori'] ?></td>
                                <td><?= $m['porsi'] ?></td>
                                <td><?= $m['gambar'] ?></td>
                                <td><a href="" class="btn btn-primary">Add To Cart</a></td>
                                </tr>
                            </tbody>
                            <?php $i++; ?>
                            <?php endforeach; ?>
                            </table>
                        </div>
                    </div>
            </div>
        </div>

    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="<?= base_url('assets/') ?>sbad/vendor/jquery/jquery.js"></script>
    <script src="<?= base_url('assets') ?>/vendor/bootstrap/js/popper.min.js"></script>
    <script src="<?= base_url('assets') ?>/vendor/bootstrap/js/bootstrap.min.js" ></script>
  </body>
</html>