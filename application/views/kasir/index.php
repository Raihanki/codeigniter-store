
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
                                <a href="<?= base_url('kasir') ?>" class="btn btn-primary m-3">Semua</a>
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
                            <form action="<?= base_url('kasir/tambahKeranjang/') ?><?= $m['id'] ?>" method="post">
                                <tr>
                                <th><?= $i; ?></th>
                                <td><?= $m['nama_menu'] ?></td>
                                <td>Rp.<?= $m['harga'] ?>/porsi</td>
                                <td><?= $m['kategori'] ?></td>
                                <td><?= $m['porsi'] ?></td>
                                <td><img src="<?= base_url('assets/imgmenu/') ?><?= $m['gambar']; ?>" alt="<?= $m['nama_menu'] ?>" width="80px" height="70px"></td>
                                <td>
                                <select class="form-control" name="porsi" id="inlineFormCustomSelect">
                                    <option selected>Porsi</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                </select>
                                <button type="submit" class="btn btn-primary">Tambah</button>
                                </form>
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

    