<?php
 
 session_start();
 if(!isset($_SESSION["logged_in"]))
 {
	 header("location:index.html");
 }
 
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Search</title>
  <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="node_modules/font-awesome/css/font-awesome.min.css">
<link rel="stylesheet" href="node_modules/bootstrap-social/bootstrap-social.css">
<link rel="stylesheet" href="css/styles.css">
</head>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.1/css/bootstrap.min.css">
  <style>
   
    .abc {
        margin-top:20px;
        border-radius:10px;
        background-color:black;
        width:500px;
        background-image:url('des.jpg');
        
    }
    .p3 {
      
        color:white;
        font-family:'digital-clock-font',monospace;
    }
    #image {
        padding-left:70px;
    }
    h1{
        padding-top:20px;
        font-family:'digital-clock-font',monospace;
        padding-bottom:30px;
        font-size:30px;
    }
    #sub {
       margin-top:25px;
       border-radius:10px;
      
    }
    #age {
    
      width:100px;
       
    }

    
  .design {
  background-image:url('des.jpg');
  }
  .nclass{
    margin-left:42%;
    margin-top:-15%;
  }
  .zzz{
    margin-left:8.5%;
    margin-top:-2%;
    height:50px;
   
  }
  .spc{
    margin-top:-10%;
  }
  </style>

</head>

<body class="design">
  
  <div class="container" >
    <div class="row mt-4">
      
      <div  class="col-md-8 mx-auto design rounded p-4">
        <h5 class="text-center text-info font-weight-bold">Find Criminals' details</h5>
        <hr class="my-1">
        <h5 class="text-center text-secondary">Enter criminal name</h5>
        <form action="details.php" method="post" class="p-3">
          <div class="input-group">
            <input type="text" name="search" id="search" class="form-control form-control-lg rounded-0 border-info" placeholder="Search..." autocomplete="off" required>
            <div class="input-group-append">
              <input type="submit" name="submit" value="Search" class="btn btn-info btn-lg rounded-0">
            </div>
          </div>
        </form>
      </div>
      <div class="col-md-5" style="position: relative;margin-top: -38px;margin-left: 215px;">
        <div class="list-group" id="show-list">
          <!-- Here autocomplete list will be display -->
        </div>
      </div>


  
    </div>
  </div>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="script.js"></script>
  
   <span>   <button class="btn btn-light btn-lg"> <a style="text-decoration:none;" href="firentery.php">FILE A NEW FIR</a>
</button></span><br><br>
<span>   <button class="btn btn-outline-success btn-lg"> <a style="text-decoration:none;" href="addpolice.php">+ADD NEW POLICE</a>
</button></span>

<h1 style="color:white;")>Pending FIRs</h1>


<?php
      $connection =mysqli_connect("localhost","root","");
      $db=mysqli_select_db($connection,'crimerecord');
      $query="select * from fir where status=false";
      $sql=mysqli_query($connection,$query);
      if(mysqli_num_rows($sql)>0)
{?>
   <div class="nclass">

<div class="container">
    <div class="row">
    

<?php
	while($row = mysqli_fetch_assoc($sql))
	{
		
    ?>

     <div class="col-md-2 mt-4">
     <div class="card  mt-3" style="width:15rem;">
     
  <h5 class="card-header bg-primary">FIR NO:<?php echo $row['firno'];?></h5>
  <?php $firno=$row['firno'];
   ?>
   
  <div class="card-body ">
    
    <p class="card-text">Filed On:&nbsp <?php echo $row['firdate'] ;?></p>
    <form action="criminaldetailsentry.php" method="POST">
            <input type="hidden" name="firno" value="<?php echo $firno; ?>">
            <input  class="bg-success" type="submit" name="Update case details" value="update case details">
         </form> 
  </div>
  
  </div>
  </div>
  
  
  </div>
  </br><button class="btn btn-danger btn-lg zzz" ><a style="text-decoration:none; color:black;" href="logout.php">logout</a></button>
  


<?php
       
    }?>
    </div>
  </div>
  
  </div>
<?php   
}
else
{
	echo "NO Pending firs  FOUND";
}

  

?>







</body>

</html>
