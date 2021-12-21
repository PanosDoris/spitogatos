<?php
session_start();
include_once '../db/db.php';

$price=$_POST['price'];
$area=$_POST['area'];
$availability=$_POST['availability'];
$tetragonika=$_POST['tetragonika'];
$user=$_POST['user'];
$insertsql="INSERT INTO `aggelia` ( `uid`, `price`, `area`, `availability`, `tetragonika`) VALUES ($user, $price, '$area', '$availability', $tetragonika)";

if(mysqli_query($data,$insertsql)){
    echo json_encode(array("statusCode"=>200));

}
else{
    echo json_encode(array("statusCode"=>201));
}
mysqli_close($data);