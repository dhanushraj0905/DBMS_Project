<?php
session_start();

$connection=mysqli_connect("localhost","root","","crimerecord");
	
	{
		$name=$_POST['name'];
		$designation=$_POST['designation'];
        $address=$_POST['address'];
        
		
		$query="Insert Into police(pid,pname,address,designation) VALUES ('','$name','$address','$designation')";
		$query_run=mysqli_query($connection,$query);
		
	
		if($query_run)
		{
			echo "Added";
			echo  '<script type="text/javascript"> alert("New police added")</script>';
			header('location:index.php');
		}
		else
		{
			echo "Not Added";
			echo  '<script type="text/javascript"> alert("New police not added")</script>';
			header('location:index.php');
		}
	}
?>