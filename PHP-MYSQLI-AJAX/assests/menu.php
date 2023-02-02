<div class="col-md-3">
            <ul class="list-group">
              <li class="list-group-item active"><b>MAIN MENU</b></li>
              <a href="../modul-user/dashboard.php" class="list-group-item" style="color: #212529;"><i class="fa-sharp fa-solid fa-house"></i>  Dashboard</a>
              <!-- <a href="../modul-user/profile.php" class="list-group-item" style="color: #212529;">Profile</a> -->
              <a  href="http://<?php echo $_SERVER['SERVER_NAME'] ?>/PHP-MYSQLI-AJAX/modul-tambah-siswa/data-students.php" class="list-group-item" style="color: #212529;"><i class="fa-solid fa-user-graduate"></i>  Siswa</a>
              <?php if($_SESSION['level']==1){ ?> 
              <a href="http://<?php echo $_SERVER['SERVER_NAME'] ?>/PHP-MYSQLI-AJAX/modul-user/user.php" class="list-group-item" style="color: #212529;"> <i class="fa-sharp fa-solid fa-user-tie"></i>  User</a>
              <?php } ?>
              <a href="http://<?php echo $_SERVER['SERVER_NAME'] ?>/PHP-MYSQLI-AJAX/modul-user/logout.php" class="list-group-item" style="color: #D82323;"> <i class="fa-sharp fa-solid fa-right-from-bracket"></i>  Logout</a>
            </ul>
</div>