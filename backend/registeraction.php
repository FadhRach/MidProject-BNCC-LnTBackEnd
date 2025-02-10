<?php
    session_start();

    include "koneksi.php";

    if(isset($_POST['username'])){
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    $query = mysqli_query($konek, "INSERT INTO user(username, password) VALUES('$username','$password')");
        if($query){
            echo '<script>alert("Selamat, anda berhasil melakukan registrasi!"); window.location="../register.php";</script>';
        }else{
            echo '<script>alert("Registrasi Gagal!")</script>';
        }
    }
?>