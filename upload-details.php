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

    if(isset($_POST['upload']))
    {
        $file=addslashes(file_get_contents($_FILES["image"]["tmp_name"]));
        $criminalname=$_POST['cname'];
        $age=$_POST['age'];
        $bdate=$_POST['bdate'];
        $firno=$_POST['firno'];
        
       


        $check="Select * from criminal where cname='$criminalname' and dob='$bdate'";

        $quercheck=mysqli_query($connection,$check);
        $number= mysqli_num_rows($quercheck);
        
        
        if($number==0)
        {

        $query= "insert into criminal (`criminalid`,`cname`,`age`,`dob`,`image`) values ('','$criminalname','$age','$bdate','$file')";
        $query_run = mysqli_query($connection,$query);

        if($query_run)
        {
            $che="Select * from criminal where cname='$criminalname'";

            $quer=mysqli_query($connection,$che);
            $row=mysqli_fetch_row($quer);
            
            $criminalid= $row[1];
           
            


            echo '<script type="text/javascript"> alert("Criminal profile uploaded")</script>';

        }
        
        
        else{
            echo  '<script type="text/javascript"> alert("Criminal profile uploading failed ")</script>';
            header('location:criminaldetailsentry.php');
        }


        }
        else
        {
           $col=mysqli_fetch_assoc($quercheck);
            $criminalid=$col['criminalid'];

        }

        
    }

    
    
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    @import url(https://fonts.googleapis.com/css?family=Open+Sans:300);
* {
  font-family: 'Open Sans', sans-serif;
}

body {
  margin: 0;
  padding: 0;
  overflow: hidden;
  background: #111;
  background-repeat: no-repeat;
}

.crimeSection {
  background: url(https://source.unsplash.com/TV2gg2kZD1o/1600x800);
  background-repeat: no-repeat;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  width: 800px;
  height: 450px;
  text-align: center;
  display: flex;
  color: white;
  box-shadow: 3px 10px 20px 5px rgba(0, 0, 0, .5);
}

.info {
  width: 45%;
  background: rgba(20, 20, 20, .8);
  padding: 30px 0;
  border-right: 5px solid rgba(30, 30, 30, .8);
  h2 {
    padding-top: 30px;
    font-weight: 300;
  }
  p {
    font-size: 18px;
  }
  .icon {
    font-size: 8em;
    padding: 20px 0;
    color: rgba(10, 180, 180, 1);
  }
}

.crimeForm {
  width: 70%;
  padding: 30px 0;
  background: rgba(20, 40, 40, .8);
  transition: .2s;
  h2 {
    font-weight: 300;
  }
}

.inputFields {
  margin: 15px 0;
  font-size: 16px;
  padding: 10px;
  width: 250px;
  border: 1px solid rgba(10, 180, 180, 1);
  border-top: none;
  border-left: none;
  border-right: none;
  background: rgba(10, 20, 20, .2);
  color: white;
  outline: none;
}

.noBullet {
  list-style-type: none;
  padding: 0;
}

#upload-btn {
  border: 1px solid rgba(10, 180, 180, 1);
  background: rgba(20, 20, 20, .6);
  font-size: 18px;
  color: white;
  margin-top: 20px;
  padding: 10px 50px;
  cursor: pointer;
  transition: .4s;
  &:hover {
    background-color: rgba(20, 20, 20, .8);
    padding: 10px 80px;
  }
}


    </style>
</head>
<body>
    




<div class="crimeSection">
  <div class="info">
    <h2>Police Department</h2>
    <i class="icon ion-ios-ionic-outline" aria-hidden="true"></i>
    <p>Crime Data</p>
  </div>
  <form action="crimedetailsdb.php" method="POST" class="crimeForm" name="crimeform">
    <h2>Crime details</h2>
    <ul class="noBullet">
      <li>
        <label for="Crime committed"></label>
        <input type="text" class="inputFields" id="crimetype" name="crimetype" placeholder="Crime-Type" value=""  required/>
      </li>

      <li>
        <label for="POLICE INCHARGE"></label>
        <input type="number" class="inputFields" id="pid" name="pid" placeholder="PID" value="" required/>
      </li>

      <li>
        <label for="location"></label>
        <input type="text" class="inputFields" id="location" name="location" placeholder="Crime Location" value="" required />
      </li>
      <li>
        <label for="dateofcrime"></label>
        <input type="date" class="inputFields" id="dateofcrime" name="dateofcrime" placeholder="Date of Crime" value="" required />
      </li>

      <li>
      
        
        MARK AS COMPLETED<input type="checkbox" class="inputFields" id="markascomp" name="markascomp" placeholder="Mark as completed" value="true"  />
      </li>

      <input type="hidden" name="criminalid" value="<?php echo $criminalid ?>"/>
      <input type="hidden" name="firno" value="<?php echo $firno ?>"/>
      <li id="center-btn">
        <input type="submit" id="upload-btn" name="upload" alt="Upload" value="Upload">
      </li>
    </ul>
  </form>
</div>

</body>
</html