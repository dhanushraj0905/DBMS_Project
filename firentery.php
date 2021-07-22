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
 background-color: #111;
  background-repeat: no-repeat;
  background-image:url('des.jpg');
 
}
.a {
      margin-left:45%;
      margin-top:5%;
      color:white;
      border-radius:10px;
      border:5px;
  
  }
.crimeSection {
    background: url(https://source.unsplash.com/TV2gg2kZD1o/1600x800);
  background-repeat: no-repeat;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  width: 750px;
  height: 450px;
  text-align: center;
  display: flex;
  color: white;
  box-shadow: 3px 10px 20px 5px rgba(0, 0, 0, .5);
  padding-left:40px;
  padding-right:5px;
}

.infor {
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
  background: url(https://source.unsplash.com/TV2gg2kZD1o/1600x800);
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
  background-image: linear-gradient(black, grey);
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
    



<h1 class="a">FILE AN FIR</h1>

<div class="crimeSection">
   <div>
  
  <form action="firdb.php" method="POST" class="crimeForm" name="crimeform">
    <h2>Crime Persuit</h2>
    <ul class="noBullet">
    <li>
        <label>Date of Crime:</label>
        <input type="date" class="inputFields" id="dateofcrime" name="date" placeholder="Date of Crime" value="<?php echo date('d / m /Y');?>" required />
      </li>
      <li>
        <label">Enter name  :-</label>
        <input type="text" class="inputFields" id="personname" name="personname" placeholder="Your Name" value="" required/>
      </li>
      <li>
        <label>Enter Address</label>
        <input type="text" class="inputFields" id="address" name="address" placeholder="Address" value="" required/>
      </li>
    
      <li id="center-btn">
        <input type="submit" id="upload-btn" name="upload" alt="Upload" value="Upload">
      </li>
    </ul>
  </div>
  <div class="infor">
    <h2>The Police Department</h2>
    <i class="icon ion-ios-ionic-outline" aria-hidden="true"></i>
    <p>ENTER THE DETAILS BELOW</p>
    <textarea name="info" cols="50" rows="15" required></textarea>
    </form>
  </div>
</div>

</body>
</html>






