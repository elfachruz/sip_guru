<?php
include 'koneksi.php';
session_start();
$user = mysql_real_escape_string($_POST['user']);
$pass = mysql_real_escape_string($_POST['pass']);
$pass = md5($pass);
$login = mysql_query("select * from admin where user='$user' and pass='$pass' ",$db);
$rowcount=mysql_num_rows($login);
if($rowcount==1){
       $_SESSION['user'] = $_POST['user'];
	header("Location:admin/tampil-admin.php");
} else
{
	header("Location:index.php");
}
?>