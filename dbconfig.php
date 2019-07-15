<?php
	global $con;
	$con = mysqli_connect('localhost','root','','7ambn');
	if(!$con)
	{
		echo 'unable to connect with db';
		die();
	}