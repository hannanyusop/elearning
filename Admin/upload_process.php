<?php
require "admin_auth.php";
 

if(isset($_POST['submit'])) { 

$title=$_POST['title'];
$description=$_POST['description'];
$link= $_POST['link'];
$id = $_POST['subjectID'];
 
 

  $sql = "INSERT INTO lesson (subject_ID,title,description,link)
  VALUES( '$id','$title','$description','$link')";

 if(mysqli_query($db, $sql)){
    
     echo '<script language="javascript">';
        echo 'alert("The Lesson are Successfully Uploaded");';
        echo 'window.history.back()';
      echo '</script>'; 
  }else{

    echo mysqli_error($db);exit();
    echo '<script language="javascript">';
    echo 'alert("The Lesson Cannot be Uploaded");';        
    echo '</script>';
    
  }
}
?>


