<!DOCTYPE html>
<html lang="en">

<!-- header -->
<?php 
@session_start();
include('../../assets/koneksi.php'); 
include('../../assets/header.php'); 
$q =  "SELECT * FROM masyarakat";
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
                                <h3 class="card-title">DATA MASYARAKAT</h3><br>
                                <button class="btn btn-success"><i class="fa-sharp fa-solid fa-user-plus"></i>  Tambah Data</button>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                            <form action="" method="POST" enctype="multipart/form-data"> 
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr style="text-align:center">
                                            <th>No</th>
                                            <th>NIK</th>
                                            <th>Nama Lengkap</th>
                                            <th>Username</th>
                                            <th>Password</th>
                                            <th>Telepon</th>
                                            <th>Verifikasi</th>
                                            <th>Foto</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    
                                <?php
                                while ($r = mysqli_fetch_object($d)) {
                                    echo '<tr><td>' .' 1 '.'</td>';
                                    echo '<td>' . $r->nik . '</td>';
                                    echo '<td>' . $r->nama . '</td>';
                                    echo '<td>' . $r->username . '</td>';
                                    echo '<td>' . $r->password . '</td>';
                                    echo '<td>' . $r->telepon . '</td>';
                                    echo '<td>' . $r->verifikasi . '</td>';
                                    //foto

                                    echo '<td> <?php if (!empty($d->foto)) { ?>
                                        <img class="img-thumbnail" style="max-width:100px" src="../../assets/images/siswa/<?= $d->foto ?>" alt="">
                                    <?php } else { ?>
                                        <img class="img-thumbnail" style="max-width:100px" src="../../assets/images/siswa/no-photo.png" alt="">
                                    <?php } ?> </td>';

                                //button edit
                                echo '<td style="text-align:center"><a href="#" type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal' . $r->nik . '"><i class="fa-sharp fa-solid fa-pen"></i> </a>';

                                //button hapus
                                echo '<form action="" method="post"><input name="nik" type="hidden" value=' . $r->nik . '><button type="submit" class="btn btn-danger"></form><i class="fa-sharp fa-solid fa-trash"></i></td>';
                                echo '  </tr>';

                                    //edit data
                                    echo '<div class="modal fade" id="myModal' . $r->nik . '" role="dialog" aria-labelledby="myModal' . $r->nik . 'Label" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="myModal' . $r->nik . 'Label">EDIT DATA</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                        ';

                                        //update data
                                    $id = $r->nik;
                                    $q_edit =  "SELECT * FROM masyarakat WHERE nik='$id'";
                                    $d_edit = mysqli_query($connection, $q_edit);
                                    while ($r_edit = mysqli_fetch_object($d_edit)) {
                                        echo    '
                                    <form action="" method="post">
                                    <div class="form-group">
                                                <label>NISN</label>
                                                <input name="id_update" value=' . $r_edit->nik . ' type="hidden">
                                                <input name="nisn" value=' . $r_edit->nisn . ' type="text" class="form-control" placeholder="Masukkan NISN">
                                            </div>
                                            <div class="form-group">
                                                <label>NAMA LENGKAP</label>
                                                <input name="full_name" value=' . $r_edit->full_name . '  type="text" class="form-control"  placeholder="Masukkan Nama Lengkap">
                                            </div>
                                            <div class="form-group">
                                                <label>ALAMAT</label>
                                                <input name="address" value=' . $r_edit->address . ' type="text" class="form-control"  placeholder="Masukkan Alamat">
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" name="update" class="btn btn-update btn-block btn-primary">UPDATE</button>
                                        </div>
                                    </div>
                                    </form>
                                </div>
                            </div>';
                                    }
                                }
                                ?>
                           
                                        <tr>
                                            <td>1</td>
                                            <td>12345678</td>
                                            <td>Salma Alkaaf</td>
                                            <td>Sakura</td>
                                            <td>zzzz</td>
                                            <td>00000000</td>
                                            <td>Verifikasi</td>
                                            <td>X</td>
                                            <td  style="text-align:center"><button class="btn btn-primary"><i class="fa-sharp fa-solid fa-pen"></i></button>
                                            <button class="btn btn-danger"><i class="fa-sharp fa-solid fa-trash"></i></button></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
            <!-- /.content -->
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