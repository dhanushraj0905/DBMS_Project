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
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.1/css/bootstrap.min.css">
</head>
 
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
        
    }
    #cname {
      margin-left:-10px;
      width:150px;
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
     
  #bdate {
  width:150px;
margin-left:-10px;
}

    
  .design {
  background-image:url('des.jpg');
  }
  #image {
    width:200px;
    margin-left:-150px;
  }
  
  </style>

</head>
<?php 
   $firid=$_POST['firno'];
   echo $firid;
?>

<body class="design">


<center>
        <div class="abc">
        <h1 class="text-info"> Enter criminal details</h1>

        <form action="upload-details.php" method="POST" enctype="multipart/form-data">

        <label class="p3">Choose Image of the Criminal:<label>
        <input type="file" name="image" id="image" /><br><br>

     <label>Enter Criminal name:<label>
        <input type="text" name="cname" id="cname" /><br><br>

       <label>Enter Criminal Date of Birth:<label>
        <input type="date" name="bdate" id="bdate" /><br><br>

        Enter Criminal age:<input type="number" name="age" id="age" />
        <input type="hidden" name="firno" value="<?php echo $firid?>" required/>

       
        <input type="submit" name="upload" class="btn-default" id="sub" value="Upload"/>
        </form>
        </div>
</center>
</body>

</html>