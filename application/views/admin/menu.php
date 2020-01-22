
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

          <div class="container">

                <?= $this->session->userdata('message'); ?>

                <div class="row">
                    <div class="col-md-3">
                        <a href="<?= base_url('admin/addMenu') ?>" class="btn btn-primary mb-3">Add New Menu</a>
                    </div>
                </div>

            <div class="table-responsive">
              <table class="table table-hover">
                  <thead>
                      <tr>
                      <th scope="col">Id</th>
                      <th scope="col">Name</th>
                      <th scope="col">Price</th>
                      <th scope="col">Category</th>
                      <th scope="col">Qty</th>
                      <th scope="col">Image</th>
                      <th scope="col">Action</th>
                      </tr>
                  </thead>
  <?php $i = 1; ?>
  <?php foreach($menu as $datamenu) : ?>
                  <tbody>
                      <tr>
                      <th scope="row"><?= $i; ?></th>
                      <td><?= $datamenu['nama_menu'] ?></td>
                      <td><?= $datamenu['harga'] ?></td>
                      <td><?= $datamenu['kategori'] ?></td>
                      <td><?= $datamenu['porsi'] ?></td>
                      <td><img src="<?= base_url('assets/imgmenu/') ?><?= $datamenu['gambar']; ?>" alt="<?= $datamenu['nama_menu'] ?>" width="80px" height="70px"></td>
                      <td>
                          <a href="" data-toggle="modal" data-target="#exampleModal" class="badge badge-info">Detail</a>
                          <a href="<?= base_url('admin/editMenu/') ?><?= $datamenu['id'] ?>" class="badge badge-success">Edit</a>
                          <a href="<?= base_url('admin/deleteMenu/') ?><?= $datamenu['id'] ?>" class="badge badge-danger">Hapus</a>
                      </td>
                      </tr>
                  </tbody>
  <?php $i++; ?>
  <?php endforeach; ?>
              </table>
            </div>
          </div>


        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->


      <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Data Menu</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="form-group">
            <label>Id Menu</label>
            <input type="text" value="<?= $datamenu['id'] ?>" class="form-control mb-2" readonly>
            <label>Nama Menu</label>
            <input type="text" value="<?= $datamenu['nama_menu'] ?>" class="form-control mb-2" readonly>
            <label>Harga</label>
            <input type="text" value="<?= $datamenu['harga'] ?>" class="form-control mb-2" readonly>
            <label>Kategori</label>
            <input type="text" value="<?= $datamenu['kategori'] ?>" class="form-control mb-2" readonly>
            <label>Porsi</label>
            <input type="text" value="<?= $datamenu['porsi'] ?>" class="form-control mb-2" readonly>
            <label>Gambar</label><br>
            <img src="<?= base_url('assets/imgmanu/') ?><?= $datamenu['gambar'] ?>" alt="<?= $datamenu['nama_menu'] ?>" width="100px" height="100px">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>