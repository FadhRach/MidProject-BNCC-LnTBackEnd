<?php
    session_start();

    include "koneksi.php";

    if(isset($_POST['username'])) {
        $username = $_POST['username'];
        $password = md5($_POST['password']);

        $query = mysqli_query($konek, "SELECT * FROM user WHERE username='$username' and password='$password' ");

        if(mysqli_num_rows($query) > 0){
          $data = mysqli_fetch_array($query);
          $_SESSION['user'] = $data;
          echo '<script>alert("Selamat Datang, '.$data['username'].'"); location.href="../dashboard.php";</script>';
        } else {
          echo '<script>alert("Username/Password tidak sesuai"); location.href="../login.php";</script>';
        }
      }
?>



