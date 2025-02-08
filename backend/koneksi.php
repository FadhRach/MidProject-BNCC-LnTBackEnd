<?php
$server     ="localhost";
$user       ="root";
$password   ="";
$database   ="midproj_lnt_backend";

$konek=mysqli_connect($server, $user, $password, $database);
if(!$konek){
    die("connection database error: ".mysqli_connect_error());
}
?>