<?php
session_start();
$id = "";
$email    = "";
$errors = array(); 
$db =mysqli_connect("localhost","root",'',"ecautomationsystem");
if (isset($_POST['reg_user'])) {
  $id = mysqli_real_escape_string($db, $_POST['id']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

  if (empty($id)) { array_push($errors, "id is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if ($password_1 != $password_2) {
  array_push($errors, "The two passwords do not match");
  }

  $user_check_query = "SELECT * FROM users WHERE id='$id' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['id'] === $id) {
      array_push($errors, "id already exists");
    }

    if ($user['email'] === $email) {
      array_push($errors, "email already exists");
    }
  }

  if (count($errors) == 0) {
    $password = md5($password_1);
    
    $query = "INSERT INTO users (id, email, password) 
          VALUES('$id', '$email', '$password')";
    mysqli_query($db, $query);
    $_SESSION['id'] = $id;
    $_SESSION['success'] = "You are now logged in";
    header('location: index1.php');
  }
}

if (isset($_POST['login_user'])) {
  $id = mysqli_real_escape_string($db, $_POST['id']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  if (empty($id)) {
    array_push($errors, "ID is required");
  }
  if (empty($password)) {
    array_push($errors, "Password is required");
  }


  if (count($errors) == 0) {
    $password = md5($password);
    $query = "SELECT * FROM users WHERE id='$id' AND password='$password'";
    $results = mysqli_query($db, $query);
    if (mysqli_num_rows($results) == 1) {
      $_SESSION['id'] = $id;
      $_SESSION['success'] = "You are now logged in";

$id1=$_POST["id"];
$password1=$_POST["password"];
if ($id1==="admin") {
  if ($password1==="admin") {
    header('location: admin.php');
  }
}
else{

   header('location: index1.php');
   }
     
}

    else {
      array_push($errors, "Wrong id/password combination");
    }
  }
}
?>