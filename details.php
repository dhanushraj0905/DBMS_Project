
<?php
 
 session_start();
 if(!isset($_SESSION["logged_in"]))
 {
	 header("location:index.html");
 }
 
?>
<?php
  require_once 'config.php';

  if (isset($_POST['submit'])) {
    $cName = $_POST['search'];

    $sql = 'SELECT * FROM criminal WHERE cname = :cname';
    $stmt = $conn->prepare($sql);
    $stmt->execute(['cname' => $cName]);
    
  } else {
    header('location: .');
    exit();
  }
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Details</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.1/css/bootstrap.min.css">
</head>
<style>
    <style>
      .dess {
        box-shadow:0 10px 10px  blue;
        background-image:url('des.jpg');
        
      }
      body {
        background-image:url('des.jpg');
      }
      .vdet {
        margin-top:20px;
        left:40%;
        border-radius:5px;
        background-image:url('des.jpg');
        
      }
  </style>
  </style>

<body>
  <div class="container">
    <div class="row mt-5">
     <?php
	while($row = $stmt->fetch())
	{
		
    ?>
      <div class="col-5 mx-auto">
        <div class="card shadow text-center">
          <div class="card-header">
            <h1><?= $row['cname'] ?></h1>
          </div>
          <div class="card-body dess text-info">
            <h4><b></b> <?php echo '<img src="data:image;base64,'.base64_encode($row['image']).'" alt="Image" style="width: 100px; height:100px;">'; ?></h4>
            <h4><b>Criminal ID:</b> <?= $row['criminalid'] ?></h4>
            <h4><b>DOB :</b> <?= $row['dob'] ?></h4>
            <h4><b>Age :</b> <?= $row['age'] ?></h4>
            <form action="crimidisp.php" method="POST">
            <input type="hidden" name="crimid" value="<?= $row['criminalid']; ?>">
            <input type="submit" name="View more details" value="View More Details">
         </form> 
          </div>
        </div>
        
      </div>
      <?php }?>
    </div>
  </div>
</body>

</html>

