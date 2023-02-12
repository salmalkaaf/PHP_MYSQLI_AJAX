<?php
include('../../assets/koneksi.php');
if (isset($_POST['cek'])) {
    $pilihan = $_POST['pilihan'];
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    if ($pilihan == 'masyarakat') {
        $q = mysqli_query($con, "SELECT * FROM `masyarakat` WHERE username = '$username' AND password = '$password'");
        $r = mysqli_num_rows($q);
        if ($r == 1) {
            $d = mysqli_fetch_object($q);
            @session_start();
            $_SESSION['username'] = $d->username;
            $_SESSION['level'] = 'masyarakat';
            @header('location:../../modul/modul-masyarakat/');
        }
    } else if ($pilihan == 'petugas') {
    }

    // echo $username;
    // echo $password;
}
?>

<?php include('../../assets/header.php') ?>
  
<section class="wrapper">
      <div class="container-fluid" style="margin-top:70px;">
        <div class="row justify-content-md-center">
          <!-- left column -->
          <div class="col-md-3">
            <!-- jquery validation -->
            <div class="card card-primary">
              <div class="card-header" style="text-align:center">
                <h3 class="card-title"><i class="fa fa-users"></i> Login <small>SISPEMAS</small></h3>
              </div>
              <!-- /.card-header -->    
              <!-- form start -->
              <form id="quickForm">
                <div class="card-body">
                  <div class="form-group">
                    <label >Username</label>
                    <input  name="username" class="form-control"  placeholder="Enter email">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                  </div>
                  <div class="form-group mb-0">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" name="terms" class="custom-control-input" id="exampleCheck1">
                      <label class="custom-control-label" for="exampleCheck1">I agree to the <a href="#">terms of service</a>.</label>
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button name="cek"type="submit" class="btn btn-primary btn-block">Masuk</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
            </div>
          <!--/.col (left) -->
          <!-- right column -->
          <div class="col-md-6">

          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>

<?php include('../../assets/footer.php');?>