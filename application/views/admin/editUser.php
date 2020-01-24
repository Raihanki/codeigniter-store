
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading --> 
          <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

          <?= form_open() ?>
            <div class="container">
              <div class="form-group">
                <label>Email</label>
                <input type="text" name="email" class="form-control mb-3" value="<?= $dataid['email'] ?>">
                <?= form_error('email','<small class="text-danger">','</small>'); ?>
                <label>Username</label>
                <input type="text" name="username" class="form-control mb-3" value="<?= $dataid['username'] ?>">
                <label>Role Id</label>
                <select class="custom-select mr-sm-2 mb-3" name="role_id" id="inlineFormCustomSelect">
                  <option selected><?= $dataid['role_id'] ?></option>
                  <option value="1">1</option>
                  <option value="2">2</option>
                </select>
                <label>Active</label>
                <select class="custom-select mr-sm-2 mb-3" name="active" id="inlineFormCustomSelect">
                  <option selected><?= $dataid['is_active'] ?></option>
                  <option value="1">0</option>
                  <option value="2">1</option>
                </select>
                <a href="<?= base_url('admin/user') ?>" class="btn btn-danger mr-3">Cancel</a>
                <button type="submit" class="btn btn-primary">Edit</button>
              </div>
            </form>
            </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->