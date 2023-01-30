<?php

include('../config/koneksi.php');

$nama_lengkap = $_POST['nama_lengkap'];
$username     = $_POST['username'];
$password     = MD5($_POST['password']);
$image     = $_FILES['image']['name'];

//query insert data ke dalam database
$query = "INSERT INTO tbl_user (nama_lengkap, username, password, image) VALUES ('$nama_lengkap', '$username', '$password', '$image')";        

if($connection->query($query)) {
    
    echo "success";

} else {
    
    echo "error";

}