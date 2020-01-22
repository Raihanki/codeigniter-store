<div class="container">

        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h5 class="text-center">DATA TRANSAKSI</h5>
                    <?= $this->session->flashdata('message'); ?>
                    </div>
                        <div class="table-responsive">
                            <table class="table">
                            <thead class="thead-light">
                                <tr>
                                <th>Id Transaksi</th>
                                <th>Nama Kasir</th>
                                <th>Tanggal</th>
                                <th>Harga Total</th>
                                <th>Uang Customer</th>
                                <th>Uang Kembalian</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($struk as $s) : ?>
                                <td>TR<?= $s['id']; ?></td>
                                <td><?= $s['nama_kasir']; ?></td>
                                <td><?= date('d F Y', $s['tanggal']); ?></td>
                                <td><?= $s['harga_total']; ?></td>
                                <td><?= $s['uang_customer']; ?></td>
                                <td><?= $s['uang_kembalian']; ?></td>
                                <?php endforeach; ?>
                            </tbody>
                            </table>
                        </div>
                    </div>
                    <hr style="border: 1px solid black">
                    <p class="text-center">Terimakash Telah Berbelanja, Kami tunggu kedatangan anda kembali</p>
                    <hr style="border: 1px solid black">
                    <div class="card-footer">
                        <div class="row justify-content-end">
                            <a href="<?= base_url('kasir/histori/') ?><?= $s['id'] ?>" class="btn btn-primary mr-3">Selesai</a>
                            <a href="<?= base_url('kasir/printHistori/') ?><?= $s['id'] ?>" class="btn btn-primary mr-1">Print</a>
                        </div>
                    </div>
            </div>
        </div>

    </div>