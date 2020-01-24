
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

            <div class="container">
            <?= form_open(); ?>
                <div class="form-group">
                    <label>Nama Kategori</label>
                    <input type="text" class="form-control" name="kategori" value="<?= $kategori['kategori'] ?>">
                    <?= form_error('kategori','<small class="text-danger">','</div>') ?><br>
                    <a href="<?= base_url('admin/kategori') ?>" class="btn btn-danger">Cancel</a>
                    <button type="submit" class="btn btn-primary">Edit</button>
                </div>
            </form>
            </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->