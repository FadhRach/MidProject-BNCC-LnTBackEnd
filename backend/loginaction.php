<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>loginaction</title>
</head>
<body>
    
    <?php
    session_start();

    include 'koneksi.php';

    $username=$_POST['user'];
    $password=$_POST['pass'];

    $data=mysqli_query($konek,"select * from user where username='$username' and password='$password'");

    $cek=mysqli_fetch_array($data);
    

    if($cek["username"]="$username" && $cek["password"] = "$password")
    {
        $_SESSION['username']=$username;
        $_SESSION['status']='masuk';
        // header("location:../user/userpage.php?page=home");
        echo "kamu udah login";
    } 
    else {
        header("location:../login.php?pesan=gagal");
    }
    ?>

</body>
</html>