<?php
session_start();


if(!isset($_SESSION["username"]))
{
	header("location: ../index.php");
}

?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<title>Admin Area</title>

     <!-- Bootstrap CSS -->
         <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

     <!-- My css -->
        <style>
        <?php  include '../css/style.css';  ?>
        </style>

</head>
<body>

<h1>THIS IS ADMIN HOME PAGE</h1><?php echo $_SESSION["username"] ?>

<a href="../logout.php">Logout</a>


<div class="grid-container">
  <div class="item1">Σύστημα Διαχείρισης αγγελιών (καλώς ήλθες <?php echo $_SESSION["username"] ?>>)</div>
  <div class="item2">Menu</div>
  <div class="item3">Main </div>  
  <div class="item5">Footer</div>
</div>
</body>
</html>