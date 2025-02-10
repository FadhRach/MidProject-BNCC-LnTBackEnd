<?php
    include "koneksi.php";

    $id_book =$_POST['id_book'];
    $name = $_POST['name'];
    $author = $_POST['author'];
    $publisher = $_POST['publisher'];
    $number_of_page = $_POST['number_of_page'];
    $user_id = $_POST['id_user'];
    $image = $_FILES['image'];

    if(!empty($image['name'])){
        $extensions_allowed = array('png','jpg','jpeg');
        $x = explode('.', $image['name']);
        $extension = strtolower(end($x));
        $file_tmp = $image['tmp_name'];
        $rand_num = rand(1, 999);
        $nama_gambar_baru = $rand_num . "-" . $image['name'];

        if(in_array($extension, $extensions_allowed)){
            move_uploaded_file($file_tmp, '../image/'.$nama_gambar_baru);

            $result = mysqli_query($konek, "UPDATE book SET name = '$name', author = '$author', publisher = '$publisher', 
            number_of_page = '$number_of_page', user_id = '$user_id', image = '$nama_gambar_baru' WHERE id_book = '$id_book'");

            if(!$result){
                die("Query Error: ".mysqli_errno($konek)." - ".mysqli_error($konek));
            } else {
                echo "<script>alert('Data buku berhasil diubah!'); window.location='../dashboard.php';</script>";
            }
        } else {
            echo "<script>alert('Gambar hanya bisa jpg, jpeg, dan png!'); window.location='../book_edit.php';</script>";
        }
    } else {
        $result = mysqli_query($konek, "UPDATE book SET name = '$name', author = '$author', publisher = '$publisher', 
            number_of_page = '$number_of_page', user_id = '$user_id' WHERE id_book = '$id_book'");

            if(!$result){
                die("Query Error: ".mysqli_errno($konek)." - ".mysqli_error($konek));
            } else {
                echo "<script>alert('Data buku berhasil diubah!'); window.location='../dashboard.php';</script>";
            }
    }
?>
