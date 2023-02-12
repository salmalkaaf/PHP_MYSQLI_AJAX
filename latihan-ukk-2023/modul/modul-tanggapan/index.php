<!DOCTYPE html>
<html lang="en">

<!-- header -->
<?php
@session_start();
include('../../assets/koneksi.php'); 
include('../../assets/header.php'); 
$q =  "SELECT * FROM pengaduan";
$d = mysqli_query($connection, $q);
?>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="../../assets/dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
        </div>

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <?php include('../../assets/menu.php'); ?>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Main content -->
            
            <div class="container-fluid" style="margin-top:10px">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">TANGGAPAN</h3><br>
                                <button class="btn btn-success"><i class="fa-sharp fa-solid fa-user-plus"></i>  Tambah Data</button>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                            <form action="" method="POST" enctype="multipart/form-data"> 
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr style="text-align:center">
                                            <th>ID Tanggapan</th>
                                            <th>ID Pengaduan</th>
                                            <th>Tanggal Tanggapan</th>
                                            <th>Tanggapan</th>
                                            <th>ID_Petugas</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                </table>        
                            </form>        
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.content-wrapper -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
</div>
    <?php include('../../assets/footer.php') ?>
    <footer class="main-footer">
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.2.0
    </div>
  </footer>
</body>

</html>