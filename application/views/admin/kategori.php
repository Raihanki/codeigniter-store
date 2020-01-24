
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

          <a href="#" data-toggle="modal" data-target="#exampleModal" class="btn btn-primary mb-2">Add New Kategori</a>

            <div class="table-responsive">
              <table class="table table-hover">
                  <thead>
                      <tr>
                      <th scope="col">Id</th>
                      <th scope="col">Kategoti</th>
                      <th scope="col">Action</th>
                      </tr>
                  </thead>
  <?php $i = 1; ?>
  <?php foreach($kategori as $kat) : ?>
                  <tbody>
                      <tr>
                      <th scope="row"><?= $i; ?></th>
                      <td><?= $kat['kategori'] ?></td>
                      <td>
                          <a href="<?= base_url('admin/editKategori/') ?><?= $kat['id'] ?>" class="badge badge-success">Edit</a>
                          <a href="<?= base_url('admin/deleteKategori/') ?><?= $kat['id'] ?>" class="badge badge-danger">Hapus</a>
                      </td>
                      </tr>
                  </tbody>
  <?php $i++; ?>
  <?php endforeach; ?>
              </table>
            </div>

            <a href="<?= base_url('admin/menu') ?>" class="btn btn-danger">Cancel</a>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->


      <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add New Kategori</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <?= form_open('admin/addKategori') ?>
            <div class="form-group">
                <label>Nama Kategori</label>
                <input type="text" class="form-control" name="kategori">
            </div>
        <button type="submit" class="btn btn-primary">Save changes</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>