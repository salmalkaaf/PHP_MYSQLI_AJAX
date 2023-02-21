<!DOCTYPE html>
<html lang="en">

<!-- header --><?php
@session_start();
include('../../assets/koneksi.php'); 
include('../../assets/header.php'); 
$q =  "SELECT * FROM petugas";
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
                                <h3 class="card-title">DATA PETUGAS</h3><br>
                                <button class="btn btn-success"><i class="fa-sharp fa-solid fa-user-plus"></i>  Tambah Data</button>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                            <form action="" method="POST" enctype="multipart/form-data"> 
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr style="text-align:center">
                                            <th>ID Petugas</th>
                                            <th>Nama Petugas</th>
                                            <th>Username</th>
                                            <th>Password</th>
                                            <th>Telepon</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                while ($r = mysqli_fetch_object($d)) {
                                    echo '<tr><td>' . '1' .'</td>';
                                    echo '<td>' . $r->nama_petugas . '</td>';
                                    echo '<td>' . $r->username . '</td>';
                                    echo '<td>' . $r->password . '</td>';
                                    echo '<td>' . $r->telp . '</td>';

                                //button edit
                                // echo '<td style="text-align:center"><a href="#" type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal' . $r->id_petugas . '"><i class="fa-sharp fa-solid fa-pen"></i> </a>';

                                // //button hapus
                                // echo '<form action="" method="post"><input name="nik" type="hidden" value=' . $r->id_petugas . '><button type="submit" class="btn btn-danger"></form><i class="fa-sharp fa-solid fa-trash"></i></td>';
                                // echo '  </tr>';
                                echo '<td  style="text-align:center">
                                <button class="btn btn-primary" href="#" type="button" data-toggle="modal" data-target="#myModal' . $r->id_petugas . '"><i class="fa-sharp fa-solid fa-pen"></i></button>
                                <input name="id_petugas" type="hidden" value=' . $r->id_petugas . '><button  type="submit" class="btn btn-danger"><i class="fa-sharp fa-solid fa-trash"></i></button>
                                </td>';

                                    //edit data
                                    echo '<div class="modal fade" id="myModal' . $r->id_petugas . '" role="dialog" aria-labelledby="myModal' . $r->id_petugas . 'Label" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="myModal' . $r->id_petugas . 'Label">EDIT DATA</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                        ';}
                                        ?>
                                        </tbody>
                                </table>        
                            </form>        
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.content-wrapper -->
 

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->
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