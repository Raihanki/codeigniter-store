
    <!-- card -->
    <div class="container">

        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h5 class="text-center">PILIH KATEGORI</h5>
                        <?= $this->session->flashdata('message'); ?>
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
                                <td><a href="<?= base_url('kasir/tambahKeranjang/') ?><?= $m['id'] ?>" class="btn btn-primary">Add To Cart</a></td>
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

    