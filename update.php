<?php
	require_once('dbconfig.php');
	global $con;
	$id = $_POST['id'];
	$name = $_POST['name'];
	$username = $_POST['mobile'];
	$password = $_POST['password'];
	if(!empty($name) && !empty($username) && !empty($password) && !empty($id))
	{
		$query = "UPDATE register_user  SET name='$name', mobile='$mobile', password='$password' WHERE id='$id'";
		if (!$result = mysqli_query($con, $query)) {
	        exit(mysqli_error($con));
	    }
	    echo '<div class="col-md-offset-4 col-md-5 text-center alert alert-success">1 Record updated!</div>';
	}
	else
	{
		echo '<div class="col-md-offset-4 col-md-5 text-center alert alert-danger">error while updating record</div>';
	}