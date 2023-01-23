<?php

//include koneksi database
include('../config/koneksi.php');

//et data from form
$id_student    = $_POST['id_student'];
$nisn         = $_POST['nisn'];
$full_name = $_POST['full_name'];
$address       = $_POST['address'];

//query update data ke dalam database bedasarkan ID
$query = "UPDATE tbl_student SET nisn = '$nisn', full_name = '$full_name', address = '$address' WHERE id_student ='$id_student' ";

//kondisi pengecekan apakah data berhasil diupdate atau tidak
if($connection->query($query)) {
    
    //redirect ke halaman index.php 
    header("location: add-student.php");
} else {
    //pesan error gagal update data
    echo "Data Gagal Diupate!";
}

?>