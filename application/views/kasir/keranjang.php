<div class="container">

        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h5 class="text-center">DATA MENU</h5>
                    <?= $this->session->flashdata('message'); ?>
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
                                <th>Jumlah</th>
                                <th>Harga</th>
                                <th>Gambar</th>
                                <th>Opsi</th>
                                </tr>
                            </thead>
                            <?php $i = 1; ?>
                            <?php foreach($keranjang as $k) : ?>
                            <tbody>
                                <td><?= $i; ?></td>
                                <td><?= $k['nama_menu']; ?></td>
                                <td><?= $k['jumlah']; ?></td>
                                <td id="harga"><?= $k['harga']; ?></td>
                                <td><?= $k['gambar']; ?></td>
                                <td>
                                    <a href="<?= base_url('kasir/deleteKeranjang/') ?><?= $k['id'] ?>" class="btn btn-warning">Cancel</a>
                                </td>
                            </tbody>
                            <?php $i++; ?>
                            <?php endforeach; ?>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer">
                        <p class="btn btn-primary">Total Harga</p>
                        <p class="btn btn-success">=</p>
                        <p class="btn btn-primary" id="total">Rp.</p>
                    </div>
            </div>
        </div>

    </div>