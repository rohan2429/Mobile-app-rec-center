<?php
session_start();
ob_start();
include "dbconnections.php";
$username=$_REQUEST['username'];
$password=($_REQUEST['password']);
$checkquery="SELECT * from gu_admin where username='$username' && password='$password'";
$checkresults=mysql_query($checkquery);
if(mysql_num_rows($checkresults)>0){

if(!empty($_REQUEST['username']))
{
unset($_SESSION['adminuser']);
}
$_SESSION['adminuser']=$_REQUEST['username'];
header('Location: view_categories.php');
}else{
	
header('Location: index.php?log=fail');
}
ob_end_flush();
?>