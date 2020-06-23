<?php
require "config.php";
session_start();

$fullname=$_POST['fullname'];
$email=$_POST['email'];
$password =$_POST['password']; 

  if($db === false)
  {
      die("ERROR: Could not connect. " . mysqli_connect_error());
  }
  
  $password = mysqli_real_escape_string($db, $_POST["password"]);  
    $password = password_hash($password, PASSWORD_DEFAULT);  

  $sql = "INSERT INTO parent (fullname,email,password)
  VALUES( '$fullname','$email','$password')";

  if(mysqli_query($db, $sql)=== TRUE)
  {
    
    $_SESSION['parent_ID']=$data['parent_ID'];
    echo '<script language="javascript">';
        echo 'alert("Your Are Successfully Registered");';
        echo 'window.location.href="login.php";';
        echo '</script>'; 
      

}   else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($db);
}

mysqli_close($db);
?>