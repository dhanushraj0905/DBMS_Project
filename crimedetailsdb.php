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
    

    $pid=$_POST['pid'];
    
    $criminalid=$_POST['criminalid'];
   
    $crimetype=$_POST['crimetype'];
    $location=$_POST['location'];
    $dateofcrime=$_POST['dateofcrime'];
    $firno=$_POST['firno'];
    $status=$_POST['markascomp'];
   

    $query = "insert into crime values ('$pid','$criminalid','$crimetype','$location','$dateofcrime','$firno')";
    $query_run = mysqli_query($connection,$query);

    if($query_run)
    {
       $lastquery="Update fir set status=$status where firno=$firno";
       $runquery=mysqli_query($connection,$lastquery);


        echo '<script type="text/javascript"> alert("Criminal crime uploaded")</script>';
        header('location:index.php');

    }
    
    else{
        echo  '<script type="text/javascript"> alert("Criminal crime uploading failed ")</script>';
    }
?>

