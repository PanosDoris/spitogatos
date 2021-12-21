<?php
session_start();


require_once '../db/db.php';

$aggeliaid=$_POST['aggeliaid'];

$deletesql="DELETE FROM `aggelia` WHERE `id` = $aggeliaid";
mysqli_query($data,$deletesql);
   

mysqli_close($data);