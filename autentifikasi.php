<?php
include('connect.php');
 
session_start();
 
//tangkap data dari form login
$email = $_POST['email'];
$password = $_POST['password'];
 
//untuk mencegah sql injection
//kita gunakan mysql_real_escape_string
//$email = mysqli_real_escape_string($email);
//$password = mysqli_real_escape_string($password);
$password = hash('sha256', $password);
 
//cek data yang dikirim, apakah kosong atau tidak
if (empty($email) && empty($password)) {
    //kalau email dan password kosong
    header('location:login.php?error=1');
    break;
} else if (empty($email)) {
    //kalau email saja yang kosong
    header('location:login.php?error=2');
    break;
} else if (empty($email)) {
    //kalau password saja yang kosong
    //redirect ke halaman index
    header('location:login.php?error=3');
    break;
}
 
$q = mysqli_query($conn, "select * from users where userEmail='$email' and userPass='$password'");
$row = mysqli_fetch_array($q);
if (mysqli_num_rows($q) == 1) {
    //kalau username dan password sudah terdaftar di database
	 $_SESSION['user'] = $row["userId"];
    header('location:index.php');
} else {
    //kalau username ataupun password tidak terdaftar di database
    header('location:login.php?error=4');
}

?>