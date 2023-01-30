<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <!-- <link rel="stylesheet" href="../assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../assets/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="../assets/css/style.css" /> -->
    <title>Data Siswa</title>
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
                   <div class="col-md-12">
                      <div class="card">
                      <div class="card-body">
              <a href="add-student.php" class="btn btn-md btn-success" style="margin-bottom: 10px">TAMBAH DATA</a>




              <table class="table table-bordered" id="myTable">
                <thead>
                  <tr>
                    <th scope="col">NO.</th>
                    <th scope="col">NISN</th>
                    <th scope="col">NAMA LENGKAP</th>
                    <th scope="col">ALAMAT</th>
                    <th scope="col">AKSI</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                      include('../config/koneksi.php');
                      $no = 1;
                      $query = mysqli_query($connection,"SELECT * FROM tbl_student");
                      while($row = mysqli_fetch_array($query)){
                  ?>
                  <tr>
                      <td><?php echo $no++ ?></td>
                      <td><?php echo $row['nisn'] ?></td>
                      <td><?php echo $row['full_name'] ?></td>
                      <td><?php echo $row['address'] ?></td>
                      <td class="text-center">
                        <a href="edit-student.php?id=<?php echo $row['id_student'] ?>" class="btn btn-sm btn-primary">EDIT</a> 
                        <a href="remove-student.php?id=<?php echo $row['id_student'] ?>" class="btn btn-sm btn-danger">HAPUS</a>
                      </td>
                  </tr>

                <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
      </div>
    </div>

  
     <link rel="stylesheet" href="./assets/css/bootstrap.min.css" />

    <link rel="stylesheet" href="./assets/fontawesome/css/all.min.css">

    <link rel="stylesheet" href="./assets/css/style.css" />

    <script>
      $(document).ready( 
        function () {
          $('#myTable').DataTable();
      } );
    </script>

              </div>
            </div>
          </div>

      </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" ></script>


  </body>
</html>