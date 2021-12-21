<?php
$host="localhost";
$user="root";
$password="";
$db="spitogatos";


$data=mysqli_connect($host,$user,$password,$db);

if($data===false)
{
	die("connection error");
}
?>