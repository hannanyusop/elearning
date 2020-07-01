<?php require "parent_auth.php"; ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Subject</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">

    <?php

    if(isset($_GET['name']) && isset($_GET['id']) && isset($_GET['subject_id']) && isset($_GET['lesson_id'])){

        $id = $_GET['id'];
        $name = $_GET['name'];
        $subject_id = $_GET['subject_id'];
        $lesson_id = $_GET['lesson_id'];

        #check if subject is valid
        $r_subject = mysqli_query($db, "SELECT * FROM subject WHERE subject_ID=$subject_id");

        $subject = mysqli_fetch_assoc($r_subject);

        if(mysqli_num_rows($r_subject) == 0){
            echo "<script>alert('Invalid subject!');window.location='enrollsub.php'</script>";
        }
        //end check invalid subject

        $result = mysqli_query($db, "SELECT * FROM lesson WHERE lesson_ID=$lesson_id");

        if(mysqli_num_rows($result) == 0){
            echo "<script>alert('Invalid Lesson!');window.location='subject-lesson.php?id=$id&name=$name&subject_id=$subject_id'</script>";
        }

        //only enrolled student can see this lesson
        $check_enrolled = mysqli_query($db, "SELECT * FROM enrolls WHERE lesson_ID=$lesson_id AND student_ID=$id");

        if(mysqli_num_rows($check_enrolled) == 0){
            echo "<script>alert('Sorry! Please enrolled this subject first.');window.location='subject-lesson.php?id=$id&name=$name&subject_id=$subject_id'</script>";
        }
        //end check enrolled student

        $enrolled = mysqli_fetch_assoc($check_enrolled);
        $lesson = mysqli_fetch_assoc($result);

        //get next lesson if any
        $next_q = mysqli_query($db, "SELECT * FROM enrolls WHERE subject_ID=$subject_id AND student_ID=$id AND lesson_ID > $lesson_id ORDER BY lesson_ID ASC LIMIT 1");
        $next = mysqli_fetch_assoc($next_q);
        //end get next lesson

        //check if prev lesson :: student cant skip lesson
        $prev_q = mysqli_query($db, "SELECT * FROM enrolls WHERE subject_ID=$subject_id AND student_ID=$id AND lesson_ID < $lesson_id ORDER BY lesson_ID DESC LIMIT 1");
        $prev = mysqli_fetch_assoc($prev_q);

        if(!is_null($prev)){
            if($prev['completed'] == 0){
                echo "<script>alert('Ops! Need to complete the prev lesson first.');window.location='subject-lesson.php?id=$id&name=$name&subject_id=$subject_id&lesson_id=$prev[lesson_ID]'</script>";
            }
        }
        //end check prev lesson

        if(isset($_GET['complete'])){

            if($enrolled['completed'] == 1){
                echo "<script>alert('You already complete this lesson.')</script>";
            }else{
                $update = mysqli_query($db, "UPDATE enrolls SET completed=1 WHERE lesson_ID=$lesson_id AND student_ID=$id");
                echo "<script>window.location='subject-lesson-view.php?id=$id&name=$name&subject_id=$subject_id&lesson_id=$lesson_id'</script>";
            }

        }

    }else{
        echo "<script>alert('Invalid parameter!');window.location='parentHome.php'</script>";
    }

    ?>

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->
<body class="hold-transition skin-purple layout-top-nav">
<div class="wrapper">

  <header class="main-header">
    <nav class="navbar navbar-static-top">
      <div class="container">
        <div class="navbar-header">
          <a href="" class="navbar-brand"><b>SUBJECT: <?= $subject['name'] ?> ( <?=$subject['level'] ?> )</b></a>
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
            <i class="fa fa-bars"></i>
          </button>
        </div>
        <div class="navbar-custom-menu">
        </div>
      </div>
    </nav>
  </header>
  <!-- Full Width Column -->
  <div class="content-wrapper">
    <div class="container">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="form-froup">
          <h3>Title : <?= $lesson['title']?> </h3>
        </div>

        <div class="embed-responsive embed-responsive-16by9">
          <iframe class="embed-responsive-item" src="<?=$lesson['link']?>" frameborder="0" allowfullscreen></iframe>
        </div>

           

          <div class="form-froup">
          <h3>Description :</h3>
            <p><?=$lesson['description']?></p>
        </div>
        <div class="form-froup">
            <a href="<?= "subject-lesson.php?id=$id&name=$name&subject_id=$subject_id" ?>" class="btn btn-danger btn-flat margin">Back To Lesson</a>
            <?php if($enrolled['completed'] == 0){ ?>
            <a href="subject-lesson-view.php?id=<?=$id?>&name=<?=$name?>&subject_id=<?=$subject_id?>&lesson_id=<?=$lesson_id?>&complete=true" onclick="return confirm('Are you sure want to mark this as complete?')" class="btn btn-info btn-flat margin">Mark As Complete</a>
            <?php }else{ ?>
                <?php if(!is_null($next)){ ?>
                    <a href="subject-lesson-view.php?id=<?=$id?>&name=<?=$name?>&subject_id=<?=$subject_id?>&lesson_id=<?=$next['lesson_ID']?>" class="btn btn-success btn-flat margin">Next</a>
                    <?php }else{ ?>
                    <a href="subject-level.php?id=<?=$id?>&name=<?=$name?>&subject_id=<?=$subject_id?>" class="btn btn-success btn-flat margin">Finish</a>
                <?php }?>
            <?php } ?>
        </div>

       

  
      </section>

      <!-- Main content -->
      <section class="content">
        
      </section>
      <!-- /.content -->
    </div>
    <!-- /.container -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="container">
      <div class="pull-right hidden-xs">
        <b>Version</b> 2.4.18
      </div>
      <strong>Copyright &copy; 2014-2019 <a href="https://adminlte.io">AdminLTE</a>.</strong> All rights
      reserved.
    </div>
    <!-- /.container -->
  </footer>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
</body>
</html>
