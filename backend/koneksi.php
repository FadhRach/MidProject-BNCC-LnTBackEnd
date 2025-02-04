<?php
$server     ="localhost";
$user       ="root";
$password   ="";
$database   ="midproj_lnt_backend";

$konek=mysqli_connect($server, $user, $password, $database);
if($konek==false){
    die("connection database error");
}
?>