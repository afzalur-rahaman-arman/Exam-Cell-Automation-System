<?php 
  session_start(); 

  if (!isset($_SESSION['id'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
  }
  if (isset($_GET['logout'])) {
    
    session_destroy();
    unset($_SESSION['id']);
    header("location: login.php");
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
 <title>Registration system PHP and MySQL</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body style="background-color: #00fa9a">
​
<nav class="navbar navbar-expand-sm bg-dark navbar-dark sticky-top">
  <a class="navbar-brand" href="admin.php" >Home</a>
  <a class="navbar-brand" href="addStudent.php">Add Student</a>
  <a class="navbar-brand" href="addMark.php">Add Mark</a>
    <a class="navbar-brand" href="addExam.php">Exam Schedule </a>
    <a class="navbar-brand" href="addSubject.php">Add Subject</a>
  <a class="navbar-brand" href="addRI.php" style="color: yellow">Retake/Improvement</a>
  <a class="navbar-brand" href="index1.php?logout='1'" style="color: red;">Logout</a>

</nav>

<br>
<br>

<head>
    <?php
    include("config.php");
  $id= $_POST["id"];
    if(isset($_POST['but_upload'])){
        $name = $_FILES['file']['name'];
        $target_dir = "upload/";
        $target_file = $target_dir . basename($_FILES["file"]["name"]);

        // Select file type
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

        // Valid file extensions
        $extensions_arr = array("jpg","jpeg","png","gif");

        // Check extension
        if( in_array($imageFileType,$extensions_arr) ){
            
            // Convert to base64 
            $image_base64 = base64_encode(file_get_contents($_FILES['file']['tmp_name']) );
            $image = 'data:image/'.$imageFileType.';base64,'.$image_base64;

            // Insert record
            $query = "insert into images(id,name,image) values('$id','".$name."','".$image."')";
           
            mysqli_query($con,$query) or die(mysqli_error($con));
            
            // Upload file
            move_uploaded_file($_FILES['file']['tmp_name'],'upload/'.$name);

        }
    
    }
    ?>
    <form method="post" action="" enctype='multipart/form-data'>

<table>
  <tr>
    <th>
      Id
    </th>
    <th>
      <input type="text" name="id">
    </th>
  </tr>
  <tr>
    <th>
      Image
    </th>
    <th>
      <input type='file' name='file' />
    </th>
  </tr>
  <tr><td></td><td><input type='submit' value='Save Image' name='but_upload'> </td></tr>
</table>
    </form>

</body>
</html>