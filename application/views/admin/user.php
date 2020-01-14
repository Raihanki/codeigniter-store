
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

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
                        <a href="" class="badge badge-info">Detail</a>
                        <a href="<?= base_url('admin/editUser/') ?><?= $data['id']; ?>" class="badge badge-success">Edit</a>
                        <a href="" class="badge badge-danger">Delete</a>
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