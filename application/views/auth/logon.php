<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Login</title>

        <!-- css bootstrap -->
        <link rel="stylesheet" type="text/css" href="<?= base_url('assets/') ?>bootstrap/css/bootstrap.min.css">

        <!-- mystyle -->
        <link rel="stylesheet" type="text/css" href="<?= base_url('assets/') ?>styleku.css">

        <!-- fontawesome -->
        <link rel="stylesheet" type="text/css" href="<?= base_url('assets/sbad/vendor/') ?>fontawesome-free/css/all.min.css">

  </head>
  <body>

    <div class="container">
      <div class="jumbotron">

            <?= form_open('auth'); ?>
        <div class="row">
          <div class="col">    
            <div class="card m-auto">
              <!-- card header -->
              <div class="card-header">
                <div class="card-title text-center">
                  <h4 class="mt-1 lgn">Login</h4>
                </div>
              </div>
              <!-- card body -->
              <div class="card-body">
                  <div class="form-group">
                    <div class="row justify-content-center">
                      <div class="col-md-6 col1">
                        <div class="row">   
                          <div class="col-3">
                          <i class="fas fa-6x fa-mug-hot mt-5 ml-3"></i>
                          </div>
                          <div class="col-9">
                          <p class="text-center display-4 mt-4 gcf">GAOU CAFE</p>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <label for="email" class="gcf">Email</label>
                        <i class="fas fa-envelope"></i><input type="text" name="email" class="form-control mb-2" autofocus="yes" placeholder="Input Your Email Here..." id="email">
                        <label for="password" class="gcf">Password</label>
                        <i class="fas fa-lock"></i><input type="password" name="password" class="form-control" placeholder="Input Your Password Here..." id="password">
                        <button type="submit" class="btn btn-dark mt-3">Login</button>
                      </div>
                    </div>
                  </div>
              </div>
              <!-- card footer -->
              <div class="card-footer foot">
                  <center><span class="text-muted">&copy;Built By Raihanki 2020</span></center>
              </div>
            </div>
          </div>
        </div>
                </form>
        
  </body>

  <!-- jquery -->
  <script type="text/javascript" src="<?= base_url('assets/sbad/vendor/jquery/') ?>jquery.js"></script>
  <!-- bootstrap js -->
  <script type="text/javascript" src="<?= base_url('assets/sbad/vendor/') ?>bootstrap/js/bootstrap.min.js"></script>

</html>