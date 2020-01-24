<div class="container">

        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h5 class="text-center">DATA MENU</h5>
                    <?= $this->session->flashdata('message'); ?>
                    </div>
                    <?= form_open() ?>
                        <div class="row m-3">
                            <div class="col-sm-1">
                                <button class="btn btn-primary" type="submit">Search</button>
                            </div>
                            <div class="col-sm-3">
                                <input class="form-control" type="search" placeholder="Search" aria-label="Search">
                            </div>
                        </div>
                    </form>
                                <?= form_open() ?>
                        <div class="table-responsive">
                            <table class="table">
                            <thead class="thead-light">
                                <tr>
                                <th>No</th>
                                <th>Nama Menu</th>
                                <th>Porsi</th>
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
                                <td><?= $k['jumlah'] ?></td>
                                <td id="harga"><?= $k['harga'] * $k['jumlah']; ?></td>
                                <td><img src="<?= base_url('assets/imgmenu/') ?><?= $k['gambar']; ?>" alt="<?= $k['nama_menu'] ?>" width="80px" height="70px"></td>
                                <td>
                                    <a href="<?= base_url('kasir/deleteKeranjang/') ?><?= $k['id'] ?>" class="btn btn-warning">Cancel</a>
                                </td>
                            </tbody>
                            <?php $j[] = $k['harga'] * $k['jumlah']; ?>
                            <?php $i++; ?>
                            <?php endforeach; ?>
                            </table>
                            <?php $total = array_sum($j); ?>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-sm-6">
                                <p class="btn btn-primary">Total Harga</p>
                                <p class="btn btn-success">=</p>
                                <p class="btn btn-primary" name="" id="total">Rp. <?= $total; ?>,-</p>
                            </div>
                            <div class="col-sm-6">
                                    <input type="hidden" name="total" value="<?= $total; ?>">
                                    <div class="row">
                                        <div class="col d-flex justify-content-center">
                                            <p class="btn btn-outline-danger">Bayar Disini</p>
                                        </div>
                                    </div>
                                    <input class="form-control" type="text" name="bayar" placeholder="Masukan Nominal Uang Anda">
                                    <?= form_error('bayar','<small class="text-danger ml-1">','</small>') ?>
                                    <div class="row">
                                        <div class="col d-flex justify-content-center">
                                            <button type="submit" class="btn btn-primary mt-2">Bayar</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
            </div>
        </div>

    </div>