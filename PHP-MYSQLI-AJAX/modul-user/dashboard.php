<?php

  session_start();

  if(!$_SESSION['id_user']){
    header("location: index.php");
  }

  $q = 'SELECT * FROM `tbl_user`';
  $r = mysqli_query($connection,$q);
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

    <title>Dashboard</title>
  </head>
  <body>

    <div class="container" style="margin-top: 50px">
      <div class="row">
        <?php 
        include ('../assests/menu.php');
        ?>
          <!-- <div class="col-md-3">
            <ul class="list-group">
              <li class="list-group-item active">MAIN MENU</li>
              <a href="dashboard.php" class="list-group-item" style="color: #212529;">Dashboard</a>
              <a href="profile.php" class="list-group-item" style="color: #212529;">Profile</a>
              <a href="add-student.php" class="list-group-item" style="color: #212529;">Tambah Siswa</a>
              <a href="logout.php" class="list-group-item" style="color: #D82323;">Logout</a>
            </ul> -->
          

          <div class="col-md-9">
            <div class="card">
              <div class="card-body">
                <label><b>DASHBOARD USER</b></label>
                <hr>

                Selamat Datang <?php echo $_SESSION['nama_lengkap'] ?>
                <table class="table table-bordered">
                  <tr>
                    <td>Nama</td>
                    <td>Username</td>
                    <td>Password<td>
                  <tr>
                    <?php
                    while($d = mysqli_fetch_array($r)){
                      echo'
                      
                      <tr>
                       <td>' . $d[1] . '</td>
                       <td>' . $d[2] . '</td>
                       <td>' . $d[3] . '</td>
                      </tr>
                      ';
                    }
                    ?>
                </table>

              </div>
            </div>
          </div>

      </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" ></script>
</body>
</html>