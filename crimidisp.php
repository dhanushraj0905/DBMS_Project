<?php
 
 session_start();
 if(!isset($_SESSION["logged_in"]))
 {
	 header("location:index.html");
 }
 
?>



<?php


$criminalid=$_POST['crimid'];
$con = mysqli_connect("localhost","root","","crimerecord");

// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}
$det="select * from criminal where criminalid=$criminalid";
$sql="select f.firno,crimetype,p.Pname,d.location,d.dateofcrime from criminal c,crime d,police p,fir f where c.criminalid=d.criminalid and d.firno=f.firno and p.Pid=d.pid and  c.criminalid=$criminalid" or die();
$detres=mysqli_query($con,$det);
$result = mysqli_query($con,$sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>CRIMEPERSUIT</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

<link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="node_modules/font-awesome/css/font-awesome.min.css">
<link rel="stylesheet" href="node_modules/bootstrap-social/bootstrap-social.css">
<link rel="stylesheet" href="css/styles.css">
</head>
<body >
    
    <?php 
     $print= mysqli_fetch_array($detres,MYSQLI_NUM);
   ?>
<div class="container" style="border:6px solid black;padding:30px 30px 50px; background-image:url(backfordetails.jpg);">

    <div class="container"  >
    <H1 style=" border:20px; background-color: red;">CRIMINAL RECORD</H1>
        <div class="row row-content">
            <div class="col-12 col-sm-6">
                <div class="card border-danger mb-3" style="max-width: 14rem;float: left; position: relative; left:30px; background-color: seagreen; ">
                  <div class="card-header"><?php echo '<img src="data:image;base64,'.base64_encode($print[4]).'" alt="image" >';?>
           
                  </div>
               </div>
           </div>
   
           <div class="col-12 col-sm-6">
               <table>
                   <tr><td><h3 >NAME: </h3></td> <td style="font-size: 200%;"><?php echo"$print[0]" ?></td> </tr>
                
                <tr><td><h3 >CRIMINAL ID:</h3></td><td style="font-size: 200%;"><?php echo"$print[1]" ?></td></tr>
                <tr><td><h3 >AGE:</h3></td><td style="font-size: 200%;"><?php echo"$print[2]" ?></td></tr>
             </table>
            </div> 
       </div>
    </div>


    <div>
        
        <div class="container"   >
        <H3 style=" border:20px; background-color:blue;position: relative;">Crime Trace</H3>
            <div class="row row-content">
                <table style="border: 3px 3px solid black;position:relative; left:10%;">
            <thead style="font-size:100%">
                <th>
                    FIR NUMBER
                </th>
                <th>
                    CRIME TYPE
                </th>
                <th>
                    POLICE INCHARGE
                </th>
                <th>
                    LOCATION
                </th>
                
                <th>
                    DATE
                </th>
            </thead>
                <?php
                    if(mysqli_num_rows($result)>0)
                    {
	                    while($row = mysqli_fetch_assoc($result))
	                    {
                ?>
                <tr>
		 <td><?php echo $row['firno']; ?></td>
		<td><?php echo $row['crimetype']; ?></td>
        <td><?php echo $row['Pname']; ?></td>
        <td><?php echo $row['location']; ?></td>
       
        <td><?php echo $row['dateofcrime']; ?></td>	
                </tr>
        <?php
        	}
        }       
            else
            {
	        echo "NO RECORD FOUND";
        }
        ?>
                
               
                </table>
                
            </div>
        </div>
    </div>



        
    

</div>



</body>

</html>