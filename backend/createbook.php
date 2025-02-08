<?php
    include "koneksi.php";

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

            $result = mysqli_query($konek, "INSERT INTO book (name, author, publisher, number_of_page, user_id, image) 
            VALUES ('$name','$author', '$publisher', '$number_of_page', '$user_id', '$nama_gambar_baru')");

            if(!$result){
                die("Query Error: ".mysqli_errno($konek)." - ".mysqli_error($konek));
            } else {
                echo "<script>alert('Data buku berhasil ditambahkan!'); window.location='../dashboard.php';</script>";
            }
        } else {
            echo "<script>alert('Gambar hanya bisa jpg, jpeg, dan png!'); window.location='../book_create.php';</script>";
        }
    } else {
        $result = mysqli_query($konek, "INSERT INTO book (name, author, publisher, number_of_page, user_id) 
        VALUES ('$name','$author', '$publisher', '$number_of_page', '$user_id')");

        if(!$result){
            die("Query Error: ".mysqli_errno($konek)." - ".mysqli_error($konek));
        } else {
            echo "<script>alert('Data buku berhasil ditambahkan!'); window.location='../dashboard.php';</script>";
        }
    }
?>
