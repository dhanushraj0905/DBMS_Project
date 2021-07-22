<?php
 
 session_start();
 if(!isset($_SESSION["logged_in"]))
 {
	 header("location:index.html");
 }
 
?>

<?php
    $connection =mysqli_connect("localhost","root","");
    $db=mysqli_select_db($connection,'crimerecord');

    $date=$_POST['date'];
    $name=$_POST['personname'];
    $address=$_POST['address'];
    $details=$_POST['info'];
    $status=false;
    $asl="Insert into fir (`firno`,`firdate`,`status`) values ('','$date','$status')";
    $res = mysqli_query($connection,$asl);

    if($res)
    {
        echo '<script type="text/javascript"> alert("fir uploaded")</script>';

    }
    
    else{
        echo  '<script type="text/javascript"> alert("fir uploading failed ")</script>';
    }

    $bsl="Select * from fir";
    $query=mysqli_query($connection,$bsl);
   
if(mysqli_num_rows($query)>0)
{
	while($row = mysqli_fetch_assoc($query))
	{
		
       $firno=$row['firno'];
       
    }
   
}
else
{
	echo "NO RECORD FOUND";
}



$csl="Insert into firdetails(`firno`,`personid`,`personname`,`address`,`info`) values ('$firno','','$name','$address','$details')";
$queryres=mysqli_query($connection,$csl);

if($queryres)
    {
        
      header('location:index.php');
    }
    
    else{
        echo  '<script type="text/javascript"> alert("fir details uploading failed ")</script>';
    }
?>