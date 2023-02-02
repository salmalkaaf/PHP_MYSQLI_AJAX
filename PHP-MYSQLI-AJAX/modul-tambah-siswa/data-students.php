<?php
@session_start();
include '../config/koneksi.php';
// if (!$_SESSION['id_student']) {
//     echo '<script>
//     alert("YOU MUST LOGIN FIRST");
//     window.location.href = "../modul-user/index.php";
//     </script>
//     ';
// }

//jika tombol simpan di klik
if (isset($_POST['addStudent'])) {
    $id = $_POST['addStudent'];
    $nisn = $_POST['nisn'];
    $full_name = $_POST['full_name'];
    $address = $_POST['address'];
    $filename = $_FILES["uploadfile"]["name"];
    $tempname = $_FILES["uploadfile"]["tmp_name"];
    $folder = "./image/" . $filename;

    $q = "INSERT INTO tbl_student(full_name, nisn, address, filename) VALUES (' $full_name  ', '  $nisn  ', '  $address  ', '$filename' )";
    $connection->query($q);
}

//hapus data siswa
if (isset($_POST['id_student'])) {
    $id = $_POST['id_student'];
    $q =  "DELETE FROM tbl_student WHERE id_student = '$id'";
    $d = mysqli_query($connection, $q);
}

//update data siswa 
$q =  "SELECT * FROM tbl_student";
$d = mysqli_query($connection, $q);
if (isset($_POST['update'])) {
    $id = $_POST['id_update'];
    $nisn = $_POST['nisn'];
    $full_name = $_POST['full_name'];
    $address = $_POST['address'];
    $q =  "UPDATE tbl_student SET nisn = '$nisn', full_name = '$full_name', address = '$address' WHERE id_student = '$id' ";
    $connection->query($q);
    header("Refresh:0");
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">

    <title>Dashboard</title>
</head>

<body>

    <div class="container" style="margin-top: 50px">
        <div class="row">

            <?php include '../assests/menu.php';
            // echo $_SERVER['SERVER_NAME'];
            ?>

            <div class="col-md-9">
                <div class="card">
                    <div class="card-body">
                    <label><b>SISWA</b></label>
               <br>
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modalRegister" style="margin-bottom:10px;"><i class="fa-sharp fa-solid fa-user-plus"></i>  TAMBAH SISWA</button>
                        <div class="modal fade" id="modalRegister" tabindex="-1" role="dialog" aria-labelledby="modalRegisterLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalRegisterLabel">Tambah Data</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                    <form action="simpan-siswa.php" method="POST" enctype="multipart/form-data">    
                                        <div class="form-group">
                                            <label>NISN</label>
                                            <input type="text" name="nisn"class="form-control" id="nisn" placeholder="Masukkan NISN">
                                        </div>
                                        <div class="form-group">
                                            <label>Nama Lengkap</label>
                                            <input type="text" name="full_name" class="form-control" id="full_name" placeholder="Masukkan Nama Lengkap">
                                        </div>
                                        <div class="form-group">
                                            <label>Alamat</label>
                                            <input type="text" name="address"class="form-control" id="address" placeholder="Masukkan Alamat">
                                        </div>
                                        <div class="form-group">
                                        <input class="form-control" type="file" name="uploadfile" value="" />
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-block btn-success">TAMBAH SISWA</button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                     <br>
                        <table class="table table-responsive">
                            <thead>
                                <tr>
                                    <th>NISN</th>
                                    <th>NAMA LENGKAP</th>
                                    <th>ALAMAT</th>
                                    <th>FOTO</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                while ($r = mysqli_fetch_object($d)) {
                                    echo '<tr><td>' . $r->nisn . '</td>';
                                    echo '<td>' . $r->full_name . '</td>';
                                    echo '<td>' . $r->address . '</td>';
                                    echo '<td><a href="#" type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#myModal' . $r->id_student . '"> <i class="fa-sharp fa-solid fa-pen"></i> </a></td>';
                                    echo '<td><form action="" method="post"><input name="id_student" type="hidden" value=' . $r->id_student . '><button type="submit" class="btn btn-danger"></form>  <i class="fa-sharp fa-solid fa-trash"></i></td>';
                                    echo '<td></td></tr>';
                                    echo '<div class="modal fade" id="myModal' . $r->id_student . '" role="dialog" aria-labelledby="myModal' . $r->id_student . 'Label" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="myModal' . $r->id_student . 'Label">EDIT DATA</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                        ';
                                    $id = $r->id_student;
                                    $q_edit =  "SELECT * FROM tbl_student WHERE id_student='$id'";
                                    $d_edit = mysqli_query($connection, $q_edit);
                                    while ($r_edit = mysqli_fetch_object($d_edit)) {
                                        echo    '
                                    <form action="" method="post">
                                    <div class="form-group">
                                                <label>NISN</label>
                                                <input name="id_update" value=' . $r_edit->id_student . ' type="hidden">
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
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>

        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.all.min.js"></script>
</body>
<script>
    $(document).ready(function() {

        $(".btn-register").click(function() {

            var nisn = $("#nisn").val();
            var full_name = $("#full_name").val();
            var address = $("#address").val();

            if (nisn.length == "") {

                Swal.fire({
                    type: 'warning',
                    title: 'Oops...',
                    text: 'NISN Wajib Diisi !'
                });

            } else if (full_name.length == "") {

                Swal.fire({
                    type: 'warning',
                    title: 'Oops...',
                    text: 'Nama Lengkap Wajib Diisi !'
                });

            } else if (address.length == "") {

                Swal.fire({
                    type: 'warning',
                    title: 'Oops...',
                    text: 'Alamat Wajib Diisi !'
                });

            } else {

                //ajax
                $.ajax({

                    url: "save-student.php",
                    type: "POST",
                    data: {
                        "nisn": nisn,
                        "full_name": full_name,
                        "address": address
                    },

                    success: function(response) {
                        let result = response.trim()
                        console.log(result)
                        if (result == "success") {

                            Swal.fire({
                                type: 'success',
                                title: 'Tambah Siswa Berhasil!',
                                timer: 2000,
                                showCancelButton: false,
                                showConfirmButton: false
                            }).then(function() {
                                window.location.href = 'data-students.php';
                            });

                            $("#nisn").val('');
                            $("#full_name").val('');
                            $("#address").val('');

                        } else {

                            Swal.fire({
                                type: 'error',
                                title: 'Tambah Siswa Gagal!',
                                text: 'silahkan coba lagi!'
                            });

                        }

                        console.log(response);

                    },

                    error: function(response) {
                        Swal.fire({
                            type: 'error',
                            title: 'Opps!',
                            text: 'server error!'
                        });
                    }

                })

            }

        });


    });
</script>

</html>