<?php
    include "koneksi.php";
    $id = $_GET['id'];
    $result = mysqli_query($konek,"DELETE FROM book where id_book = '$id'");

    if(!$result){
        die("Query Error: ".mysqli_errno($konek)." - ".mysqli_error($konek));
    } else {
        echo "<script>alert('Data buku berhasil dihapus!'); window.location='../dashboard.php';</script>";
    }
?>