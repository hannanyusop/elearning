<?php
require "parent_auth.php";
 

if(isset($_POST['submit'])) { 

$fullname=$_POST['fullname'];
$age=$_POST['age'];
$parent= $auth["parent_ID"];
 
 

  $sql = "INSERT INTO student (fullname,age,parent_ID)
  VALUES( '$fullname','$age','$parent')";

 if(mysqli_query($db, $sql)){
    
     echo '<script language="javascript">';
        echo 'alert("Your Kids are Successfully Added");';
        echo 'window.location.href="parentHome.php";';
      echo '</script>'; 
  }else{

    echo mysqli_error($db);exit();
    echo '<script language="javascript">';
    echo 'alert("Your Kids Cannot be Added");';        
    echo '</script>';
    
  }
}
?>