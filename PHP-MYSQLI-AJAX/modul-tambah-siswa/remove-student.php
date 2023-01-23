<?php
include('../config/koneksi.php');
//get id
$id = $_GET['id'];

$query = "DELETE FROM tbl_student WHERE id_student ='$id'";


if ($connection->query($query)) {
    header('location: data-student.php');
}
else{
    echo "DATA GAGAL DIHAPUS!";
}

?>
