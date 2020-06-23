<?php

	include('../config.php');

	if(isset($_GET['id'])){

		$id = $_GET['id'];
		


		#only status 1(new) can be deleted
		$lesson_q = $db->query("SELECT * FROM lesson WHERE lesson_ID=$id");
		$lesson = $lesson_q->fetch_assoc();


		if(!$lesson){
			#not exist
			echo "<script>alert('Invalid lesson/lesson can\'t be deleted!');window.history.back()';</script>";
			exit();
		}

		#delete lesson
		if($db->query("DELETE from lesson WHERE lesson_ID=$id")){


     	echo '<script language="javascript">';
        echo 'alert("The Lesson are Successfully Deleted");';
        echo 'window.history.back()';
     	echo '</script>'; exit();
		 
		}else{
			var_dump($db->error());exit();
		}

		var_dump($lesson);exit();

	}else{

		echo '<script language="javascript">';
        echo 'alert("The Lesson Cannot Be Deleted");';
        echo 'window.history.back()';
     	echo '</script>'; exit();
	}	