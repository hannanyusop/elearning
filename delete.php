<?php
require "config.php";

if(isset($_GET['id'])){


	$id = $_GET['id'];

	$cek = mysqli_query($db, "SELECT * FROM student WHERE student_ID='$id'");

	if(mysqli_num_rows($cek) == 0){

		echo "<script>alert('Data not exisst!');window.history.back()</script>";

	}else{

		$del = mysqli_query($db, "DELETE FROM student WHERE student_ID='$id'");

		if($del){

		echo '<script language="javascript">';
        echo 'alert("The Student are Successfully Deleted");';
        echo 'window.history.back()';
     	echo '</script>';  

		}else{

		echo '<script language="javascript">';
        echo 'alert("The Student Cannot be Deleted");';
        echo 'window.history.back()';
     	echo '</script>';  
		}

	}

}else{

	echo '<script>window.history.back()</script>';

}
?>