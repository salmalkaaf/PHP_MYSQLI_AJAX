<?php
//include koneksi database
include('../config/koneksi.php');

//get data dari form 

$nisn = $_POST['nisn']; //dikirin dari tamba-siswa.php,  $_POST adalahperintah API untuk mengambil data dari form
$full_name = $_POST['full_name'];
$address = $_POST['address'];

//====cara 1=====
//query insert data ke dalam database
// $query = mysqli_query($connection, "INSERT INTO tbl_siswa (id_siswa, nisn, nama_lengkap, alamat) VALUES ('', '$nisn', '$nama_lengkap', '$alamat')");
// // echo $query;
// // die();

// //kondisi pengecekan apakah data berhasil
// if($query==true) {
//     //redirect ke halaman index.php 
//     header("location: index.php");

// } else {
//     //pesan error gagal insert data
//     echo "data gagal disimpan!";

// } 



$query = "INSERT INTO tbl_student (nisn, full_name, address) VALUES ('$nisn', '$full_name', '$address')";

//kondisi pengecekan apakah data berhasil dimasukkan atau tidak
if($connection->query($query)) {

    //redirect ke halaman index.php 
    // header("location: index.php");
    header("location: data-student.php");

} else {

    //pesan error gagal insert data
    // echo "Data Gagal Disimpan!";
    echo "error";

}


// session_start();

// $nisn     = $_POST['nisn'];
// $full_name      = ($_POST['full_name']);
// $address      = ($_POST['address']);

// //query
// $query  = "SELECT * FROM tbl_student WHERE nisn='$nisn', AND full_name=$full_name, AND alamat='$alamat'";
// $result     = mysqli_query($connection, $query);
// $num_row     = mysqli_num_rows($result);
// $row         = mysqli_fetch_array($result);

// if($num_row >=1) {
    
//     echo "success";

//     $_SESSION['id_student']       = $row['id_student'];
//     $_SESSION['nisn'] = $row['nisn'];
//     $_SESSION['full_name']       = $row['full_name'];
//     $_SESSION['address']       = $row['address'];

// } else {
    
//     echo "error";

// }
?>