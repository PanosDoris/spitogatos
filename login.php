<?php
if($_SERVER["REQUEST_METHOD"]=="POST")
{
	$username=$_POST["username"];
	$password=$_POST["password"];


	$sql="select * from user where username='".$username."' AND password='".$password."' ";

	$result=mysqli_query($data,$sql);

	$row=mysqli_fetch_array($result);

	if($row["usertype"]=="user")
	{	

		$_SESSION["username"]=$username;
        $_SESSION["id"]=$row["id"];

		header("location:user/index.php");
	}

	elseif($row["usertype"]=="admin")
	{

		$_SESSION["username"]=$username;
		$_SESSION["id"]=$row["id"];
		header("location:admin/index.php");
	}

	else
	{
		echo "username or password incorrect";
	}

}




?>

