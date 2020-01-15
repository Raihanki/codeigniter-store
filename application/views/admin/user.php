
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

          <a href="<?= base_url('admin/register') ?>" class="btn btn-primary mb-2">Add New User</a>

          <?= $this->session->flashdata('message'); ?>

            <table class="table table-hover">
                <thead>
                    <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Username</th>
                    <th scope="col">Email</th>
                    <th scope="col">Date Created</th>
                    <th scope="col">Action</th>
                    </tr>
                </thead>
<?php $id = 1; ?>
<?php foreach($datauser as $data) : ?>
                <tbody>
                    <tr>
                    <th scope="row"><?= $id; ?></th>
                    <td><?= $data['username']; ?></td>
                    <td><?= $data['email']; ?></td>
                    <td><?= date('d F Y', $user['date_created']); ?></td>
                    <td>
                        <a href="#" class="badge badge-primary" data-toggle="modal" data-target="#exampleModal" class="badge badge-info">Detail</a>
                        <a href="<?= base_url('admin/editUser/') ?><?= $data['id']; ?>" class="badge badge-success">Edit</a>
                        <a href="<?= base_url('admin/deleteUser/') ?><?= $data['id']; ?>" class="badge badge-danger" onclick="return confirm('Realy ?')">Delete</a>
                    </td>
                    </tr>
                </tbody>
<?php $id++; ?>
<?php endforeach; ?>
            </table>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Modal detail-->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Detail User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
            <label>Email</label>
            <input type="text" value="<?= $data['email'] ?>" class="form-control mb-2" readonly>
            <label>Username</label>
            <input type="text" value="<?= $data['username'] ?>" class="form-control mb-2" readonly>
            <label>Role ID</label>
            <?php if($data['role_id'] == 1) : ?>
            <input type="text" value="Admin" class="form-control mb-2" readonly>
            <?php else : ?>
            <input type="text" value="Kasir" class="form-control mb-2" readonly>
            <?php endif; ?>
            <label>Active</label>
            <?php if($data['is_active'] == 1) : ?>
            <input type="text" value="Active" class="form-control mb-2" readonly>
            <?php else : ?>
            <input type="text" value="Non Active" class="form-control mb-2" readonly>
            <?php endif; ?>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>