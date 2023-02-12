<!DOCTYPE html>
<html lang="en">

<!-- header -->
<?php 
include('header.php'); 
@session_start();
include 'koneksi.php'; 
?>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
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
        <?php include('menu.php'); ?>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">

            <!-- Main content -->
            <div class="container-fluid" style="margin-top:10px">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Data Siswa</h3><br>
                                <button class="btn btn-success"><i class="fa-sharp fa-solid fa-user-plus"></i>  Tambah Data</button>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
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
        <footer class="main-footer">
            <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
            All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> 3.2.0
            </div>
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->
    <?php include('footer.php') ?>


    <table class="table table-responsive">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>NIK</th>
                                    <th>USERNAME</th>
                                    <th>PASSWORD</th>
                                    <th>TELEPON</th>
                                    <th>VERIFIKASI</th>
                                    <th>FOTO</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                $q = "SELECT * FROM masyarakat";
                                $r = $connection->query($q);
                                while ($d = mysqli_fetch_object($r)) { ?>
                                    <tr>
                                        <td><?= $no;
                                            $no++; ?></td>
                                        <td>
                                            <?= $d->nik ?>
                                        </td>
                                        <td>
                                            <?= $d->nama ?>
                                        </td>
                                        <td>
                                            <?= $d->username ?>
                                        </td>
                                        <td>
                                            <?= $d->password ?>
                                        </td>
                                        <td>
                                            <?= $d->telepon ?>
                                        </td>
                                        <td>
                                            <?= $d->verifikasi ?>
                                        </td>
                                        <td>
                                            <?php if (!empty($d->gambar)) { ?>
                                                <img class="img-thumbnail" style="max-width:100px" src="../images/siswa/<?= $d->gambar ?>" alt="">
                                            <?php } else { ?>
                                                <img class="img-thumbnail" style="max-width:100px" src="../images/siswa/no-foto.png" alt="">
                                            <?php } ?>
                                        </td>
                                        <td>
                                            <form action="" method="post">
                                                <input type="hidden" name="id_siswa" value="<?= $d->id_siswa ?>">
                                                <button name="hapusSiswa" class="btn btn-danger">hapus
                                            </form>
                                        </td>

                                        <td><button class="btn btn-primary" data-toggle="modal" data-target="#modalUpdate<?= $d->id_siswa ?>">edit</button>
                                            <div class="modal fade" id="modalUpdate<?= $d->id_siswa ?>">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">Edit Data</div>
                                                            <div class="modal-body">
                                                                <form action="" method="post" enctype="multipart/form-data">
                                                                    <input type="hidden" name="id_siswa" value="<?= $d->id_siswa ?>">
                                                                    <div class="form-group">
                                                                        <label>Nama Lengkap</label>
                                                                        <input type="text" value="<?= $d->nama_lengkap ?>" placeholder="isikan nama anda" name="nama_lengkap" id="" class="form-control">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>NIS</label>
                                                                        <input type="text" value="<?= $d->nis ?>" placeholder="isikan nama NIS" name="nis" id="" class="form-control">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Alamat</label>
                                                                        <input type="text" value="<?= $d->alamat ?>" placeholder="isikan alamat" name="alamat" id="" class="form-control">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Foto</label>
                                                                        <input type="file" name="gambar" id="" class="form-control">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <button name="update" type="submit" class="form-control btn btn-primary">Update</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                        </td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
</body>

</html>