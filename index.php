<?php
//αρχίζω το session
session_start();
//Συνδεση στην Βαση Δεδομένων
require('db/db.php');
//Η λειτουργία του login η οποία καλείται απο την παρακάτω φόρμα
require('login.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Spitogatos | Test | Panos Doris</title>
</head>
<body>

<center>

	<h1>Login Form</h1>
	<br><br><br><br>
	<div style="background-color: grey; width: 500px;">
		<br><br>


		<form action="#" method="POST">

	<div>
		<label>username</label>
		<input type="text" name="username" required>
	</div>
	<br><br>

	<div>
		<label>password</label>
		<input type="password" name="password" required>
	</div>

       
	<br><br>

	<div>
		
		<input type="submit" value="Login">
	</div>


	</form>


	<br><br>
 </div>
</center>

</body>
</html>