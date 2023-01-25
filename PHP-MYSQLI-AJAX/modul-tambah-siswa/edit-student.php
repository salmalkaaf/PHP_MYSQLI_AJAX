<?php 
  include('../config/koneksi.php');
  $id = $_GET['id'];
  $query = "SELECT * FROM tbl_student WHERE id_siswa = $id LIMIT 1";
  $result = mysqli_query($connection, $query);
  $row = mysqli_fetch_array($result);
 
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../assets/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="../assets/css/style.css" />
    <title>Edit Siswa</title>
    <style>
      .previous {
       background-color: #f1f1f1;
      color: black;
      }
      .round {
      border-radius: 50%;
      }
      a {
      text-decoration: none;
      display: inline-block;
      padding: 8px 16px;
      }
    </style>
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
                <label>DASHBOARD</label>
                <hr>

                <div class="container" style="margin-top:0px">
    
    <div class="col-md-8 offset-md-2">
    <a href="data-student.php" class="previous round">&#8249;</a>
          <div class="card">
          
            <div class="card-header"> EDIT SISWA </div>
            <div class="card-body">
              <form action="update-siswa.php" method="POST">
                
                <div class="form-group">
                  <label>NISN</label>
                  <input type="text" name="nisn" value="<?php echo $row['nisn'] ?>" placeholder="Masukkan NISN Siswa" class="form-control">
                  <input type="hidden" name="id_siswa" value="<?php echo $row['id_siswa'] ?>">
                </div>

                <div class="form-group">
                  <label>Nama Lengkap</label>
                  <input type="text" name="nama_lengkap" value="<?php echo $row['nama_lengkap'] ?>" placeholder="Masukkan Nama Siswa" class="form-control">
                </div>

                <div class="form-group">
                  <label>Alamat</label>
                  <textarea class="form-control" name="alamat" placeholder="Masukkan Alamat Siswa" rows="4"><?php echo $row['alamat'] ?></textarea>
                </div>
                
                <button type="submit" class="btn btn-success">UPDATE</button>
                <button type="reset" class="btn btn-warning">RESET</button>

              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>


              </div>
            </div>
          </div>

      </div>
    </div>
<!-- <script>
  
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

            //ajax
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
                    // text: '',
                    timer: 3000,
                    showCancelButton: false,
                    showConfirmButton: false
                  })
                  .then (function() {
                    window.location.href = "data-student.php";
                  });

                  // $("#nama_lengkap").val('');
                  // $("#username").val('');
                  // $("#password").val('');

                  
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
 -->

   

  </body>
  </html>