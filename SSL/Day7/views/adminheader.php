<?php

	if(isset($_SESSION["loggedin"]))
	{
		//echo $_SESSION["loggedin"];

	}else
	{
		header("location: index.php?action=loginView");
	}

?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Login</title>

	<link href='http://fonts.googleapis.com/css?family=Kite+One|Open+Sans:400,700,300' rel='stylesheet' type='text/css'>

	<link rel="stylesheet" type="text/css" href="css/main.css">
</head>
<body class="animated fadeIn">
	<header><? include "adminnav.php" ?></header>