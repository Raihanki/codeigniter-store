
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

        <div class="container">

            <?= $this->session->flashdata('message'); ?>

            <form action="" method="post">
                <div class="form-group">
                    <label>Menu Name</label>
                    <input type="text" name="namamenu" value="<?= $menu['nama_menu'] ?>" class="form-control">
                    <?= form_error('namamenu','<small class="text-danger">','</small>'); ?><br>
                    <label>Price</label>
                    <input type="text" name="hargamenu" value="<?= $menu['harga'] ?>" placeholder="Rp." class="form-control">
                    <?= form_error('hargamenu','<small class="text-danger">','</small>'); ?><br>
                    <label>Category</label>
                    <input type="text" name="kategori" value="<?= $menu['kategori'] ?>" class="form-control">
                    <?= form_error('kategori','<small class="text-danger">','</small>'); ?><br>
                    <label>Qty</label>
                    <input type="text" name="porsi" value="<?= $menu['porsi'] ?>" class="form-control">
                    <?= form_error('porsi','<small class="text-danger">','</small>'); ?><br>
                    <label>Image</label>
                    <input type="text" name="gambar" value="<?= $menu['gambar'] ?>" class="form-control">
                    <?= form_error('gambar','<small class="text-danger">','</small>'); ?><br>
                    <a href="<?= base_url('admin/menu'); ?>" class="btn btn-danger">Cancel</a>
                    <button type="submit" class="btn btn-primary">Edit Menu</button>
                </div>
            </form>
        </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->