<!DOCTYPE html>
<html lang="en">

<!-- header -->
<?php 
@session_start();
include('../../assets/koneksi.php'); 
include('../../assets/header.php'); 
$q =  "SELECT * FROM masyarakat";
$d = mysqli_query($connection, $q);

if (isset($_POST['edit'])) {
    $status = $_POST['status'];
    $nik = $_POST['nik'];
    $q = mysqli_query($connection, "UPDATE `masyarakat` SET verifikasi = '$status' WHERE nik = '$nik'");
}

if (isset($_POST['hapus'])) {
    $nik = $_POST['nik'];
    $q = mysqli_query($connection, "DELETE FROM `masyarakat` WHERE nik = '$nik'");
}
if (isset($_POST['update'])) {
    $nikLama = $_POST['nikLama'];
    $nik = $_POST['nik'];
    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $telp = $_POST['telp'];
    $password = md5($_POST['password']);
    if ($password == '') {
        $q = mysqli_query($connection, "UPDATE `masyarakat` SET nik = '$nik', nama = '$nama', username = '$username', telp = '$telp' WHERE nik = '$nikLama'");
    } else {
        $q = mysqli_query($connection, "UPDATE `masyarakat` SET `password` = '$password', nik = '$nik', nama = '$nama', username = '$username', telp = '$telp' WHERE nik = '$nikLama'");
    }
}
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
                                            <th>Action</th>
                                            <th>Edit</th>
                                            <th>Hapus</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                    
                                <?php
                                  $q = mysqli_query($connection, "SELECT * FROM `masyarakat`");
                                  $no = 1;
                                  while ($d = mysqli_fetch_object($q)) { ?>
                                    <tr>
                                        <td><?= $no ?></td>
                                        <td><?= $d->nik ?></td>
                                        <td><?= $d->nama ?></td>
                                        <td><?= $d->username ?></td>
                                        <td><?= $d->password ?></td>
                                        <td><?= $d->verifikasi ?></td>
                                        <td><?= $d->telepon ?></td>
                                        <td><?php if ($d->verifikasi == 0) {
                                                echo '<form action="" method="post"><input name="nik" type="hidden" value="' . $d->nik . '"><input name="status" type="hidden" value="1"><button name="edit" type="submit" class="btn btn-danger"><i class="fa fa-ban"></i></button></form>';
                                            } else {
                                                echo '<form action="" method="post"><input name="nik" type="hidden" value="' . $d->nik . '"><input name="status" type="hidden" value="0"><button name="edit" type="submit" class="btn btn-info"><i class="fa fa-check"></i></button></form>';
                                            } ?></td>
                                        <td><button data-toggle="modal" data-target="#modal-xl<?= $d->nik ?>" class="btn btn-success"><i class="fa fa-pen"></i></button></td>
                                        <td>
                                            <form action="" method="post"><input type="hidden" name="nik" value="<?= $d->nik ?>"><button name="hapus" class="btn btn-danger"><i class="fa fa-trash"></i></button></form>
                                        </td>
                                    </tr>

                                      <!-- modal start -->
                                      <div class="modal fade" id="modal-xl<?= $d->nik ?>">
                                                <div class="modal-dialog modal-xl<?= $d->nik ?>">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Edit Data</h4>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <form action="" method="post">
                                                            <input type="hidden" name="nikLama" value="<?= $d->nik ?>">
                                                            <div class="modal-body">
                                                                <div class="form-group"><label for="nik">Nik</label>
                                                                    <input class="form-control" type="text" name="nik" value="<?= $d->nik ?>">
                                                                </div>
                                                                <div class="form-group"><label for="nama">Nama</label>
                                                                    <input class="form-control" type="text" name="nama" value="<?= $d->nama ?>">
                                                                </div>
                                                                <div class="form-group"><label for="username">Username</label>
                                                                    <input class="form-control" type="text" name="username" value="<?= $d->username ?>">
                                                                </div>
                                                                <div class="form-group"><label for="username">New Password</label>
                                                                    <input class="form-control" type="password" name="password" value="">
                                                                </div>
                                                                <div class="form-group"><label for="username">Telepon</label>
                                                                    <input class="form-control" type="number" name="telp" value="<?= $d->nik ?>">
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer justify-content-between">
                                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                                <button type="submit" name="update" class="btn btn-primary">Save changes</button>
                                                            </div>
                                                    </div>
                                                    </form>
                                                    <!-- /.modal-content -->
                                                </div>
                                                <!-- /.modal-dialog -->
                                            </div>
                                            <!-- modal - ends -->

                                        <?php $no++;
                                        }
                                        ?>


                                    <!-- //foto


                                // //button edit
                                // echo '<td style="text-align:center"><a href="#" type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal' . $r->nik . '"><i class="fa-sharp fa-solid fa-pen"></i> </a>';

                                // //button hapus
                                // echo '<form action="" method="post"><input name="nik" type="hidden" value=' . $r->nik . '><button type="submit" class="btn btn-danger"></form><i class="fa-sharp fa-solid fa-trash"></i></td>';
                                // echo '  </tr>';

                                echo '<td  style="text-align:center">
                                <button class="btn btn-primary" href="#" type="button" data-toggle="modal" data-target="#myModal' . $r->nik . '"><i class="fa-sharp fa-solid fa-pen"></i></button>
                                <form action="" method="post"><input name="nik" type="hidden" value=' . $r->nik . '><button  type="submit" class="btn btn-danger"></form><i class="fa-sharp fa-solid fa-trash"></i></button>
                                </td>';

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
                                                <input name="nik" value=' . $r_edit->nik . ' type="text" class="form-control" placeholder="Masukkan NISN">
                                            </div>
                                            <div class="form-group">
                                                <label>NAMA LENGKAP</label>
                                                <input name="nama" value=' . $r_edit->nama . '  type="text" class="form-control"  placeholder="Masukkan Nama Lengkap">
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
                            -->
                                        
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