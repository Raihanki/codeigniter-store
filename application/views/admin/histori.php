
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

          <?= $this->session->flashdata('message'); ?>

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
                                <?php foreach($histori as $s) : ?>
                            <tbody>
                                <td>TR<?= $s['id']; ?></td>
                                <td><?= $s['nama_kasir']; ?></td>
                                <td><?= date('d F Y', strtotime($s['tanggal'])); ?></td>
                                <td><?= $s['harga_total']; ?></td>
                                <td><?= $s['uang_customer']; ?></td>
                                <td><?= $s['uang_kembalian']; ?></td>
                            </tbody>
                                <?php endforeach; ?>
            </table>
          </div>

          <a href="<?= base_url('admin/hapusHistori') ?>" class="btn btn-danger">Hapus Semua Histori Penjualan</a>

          </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->