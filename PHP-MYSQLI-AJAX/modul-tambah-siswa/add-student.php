<?php

  session_start();

  if(!$_SESSION['id_user']){
    header("location: ../modul-user/login.php");
  }

?>

<!doctype html>

<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <!-- <link rel="stylesheet" href="../assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../assets/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="../assets/css/style.css" /> -->
    <title>TAMBAH SISWA</title>
  </head>
  <body>

    <div class="container" style="margin-top: 50px">
      <div class="row">
       <?php 
        include ('../assests/menu.php');
        ?>
          <div class="col-md-9">
            <div class="card">
              <div class="card-body">
                <label><b>SISWA</b></label>
                <hr>

                <div class="container" style="margin-top: 0px">
      <div class="row">
        <div class="col-md-8 offset-md-2">
          <div class="card">  
            <div class="card-body">
                <div class="form-group">
                  <label>NISN</label>
                  <input type="text" id="nisn" placeholder="Masukkan NISN Siswa" class="form-control">
                </div>
                <div class="form-group">
                  <label>Nama Lengkap</label>
                  <input type="text" id="full_name" placeholder="Masukkan Nama Siswa" class="form-control">
                </div>
                <div class="form-group">
                  <label>Alamat</label>
                  <textarea class="form-control" id="address" placeholder="Masukkan Alamat Siswa" rows="4"></textarea>
                </div>
                <button class="btn btn-login2 btn-success">SIMPAN</button>
                <button type="reset" class="btn btn-warning">RESET</button>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.all.min.js"></script>
    <script>
      $(document).ready(function() {

        $(".btn-login2").click( function() {
        
          var nisn = $("#nisn").val();
          var full_name = $("#full_name").val();
          var address = $("#address").val();
          if (nisn.length == "") {
            Swal.fire({
              type: 'warning',
              title: 'Oops...',
              text: 'NISN Wajib Diisi !'
            });

          } else if(full_name.length == "") {

            Swal.fire({
              type: 'warning',
              title: 'Oops...',
              text: 'Nama Lengkap Wajib Diisi !'
            });

          } else if(address.length == "") {

            Swal.fire({
              type: 'warning',
              title: 'Oops...',
              text: 'Alamat Wajib Diisi !'
            });

          } else {
            $.ajax({

              url: "save-student.php",
              type: "POST",
              data: {
                  "nisn": nisn,
                  "full_name": full_name,
                  "address": address
              },

              success:function(response){

                if (response == "success") {

                  Swal.fire({
                    type: 'success',
                    title: 'Tambah Siswa Berhasil!',
                    timer: 3000,
                    showCancelButton: false,
                    showConfirmButton: false
                  })
                  .then (function() {
                    window.location.href = "data-student.php";
                  });
                  
                } else {

                  Swal.fire({
                    type: 'error',
                    title: 'Simpan Siswa Gagal!',
                    text: 'silahkan coba lagi!'
                  });

                }

                console.log(response);

              },

              error:function(response){
                  Swal.fire({
                    type: 'error',
                    title: 'Opps!',
                    text: 'server error!'
                  });

                  console.log(response);
              }

            })

          }

        }); 

      });
    </script>

              </div>
            </div>
          </div>
      </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" ></script>

