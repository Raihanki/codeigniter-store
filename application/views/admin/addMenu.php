
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

        <div class="container">

            <?= $this->session->flashdata('message'); ?>
            
            <?= form_open_multipart('admin/addMenu'); ?>
                <div class="form-group">
                    <label>Menu Name</label>
                    <input type="text" name="namamenu" class="form-control">
                    <?= form_error('namamenu','<small class="text-danger">','</small>'); ?><br>
                    <label>Price</label>
                    <input type="text" name="hargamenu" placeholder="Rp." class="form-control">
                    <?= form_error('hargamenu','<small class="text-danger">','</small>'); ?><br>
                    <label>Category</label>
                    <select class="custom-select mr-sm-2" name="kategori" id="inlineFormCustomSelect">
                      <option selected>Pilih Kategori</option>
                      <?php foreach($kategori as $kat) : ?>
                      <option value="<?= $kat['kategori'] ?>"><?= $kat['kategori'] ?></option>
                      <?php endforeach; ?>
                    </select> <br>
                    <?= form_error('kategori','<small class="text-danger">','</small>'); ?><br>
                    <label>Qty</label>
                    <input type="text" name="porsi" class="form-control">
                    <?= form_error('porsi','<small class="text-danger">','</small>'); ?><br>
                    <label>Image</label>
                    <input type="file" name="gambar" class="form-control p-1">
                    <?= form_error('gambar','<small class="text-danger">','</small>'); ?><br>
                    <a href="<?= base_url('admin/menu'); ?>" class="btn btn-danger">Cancel</a>
                    <button type="submit" class="btn btn-primary">Add Menu</button>
                </div>
            </form>
        </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->