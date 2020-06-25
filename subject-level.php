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

    if(isset($_GET['name']) && isset($_GET['id'])){

        $id= $_GET['id'];
        $name = $_GET['name'];

        $sql = "SELECT * FROM subject WHERE name='$name'";
        $result = mysqli_query($db,$sql);

        $totalRow = mysqli_num_rows($result);

        if($totalRow == 0){
            echo "<script>alert('Sorry! No level for this subject.');window.location('parentHome.php')</script>";

        }

//        var_dump($totalRow);exit();

    }else{
        echo "<script>alert('Invalid parameter!');window.location('parentHome.php')</script>";
    }


    ?>


  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->
<body class="hold-transition skin-yellow layout-top-nav">
<div class="wrapper">

  <header class="main-header">
    <nav class="navbar navbar-static-top">
      <div class="container">
        <div class="navbar-header">
          <a href="" class="navbar-brand"><b>SUBJECT</b></a>
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


          <div class="row docs-premium-template">
              <?php while($data = mysqli_fetch_array($result)){ ?>
                <div class="col-sm-12 col-md-6">
                  <div class="box box-solid">
                      <div class="box-body">
                          <h4 style="background-color:#f7f7f7; font-size: 18px; text-align: center; padding: 7px 10px; margin-top: 0;">
                              <?= $data['name'] ?> LEVEL : <?= $data['level']?>
                          </h4>
                          <div class="media">
                              <div class="media-body">
                                  <div class="clearfix">
                                      <p class="pull-right">
                                          <a href="subject-lesson.php?id=<?= $_GET['id'] ?>&name=<?= $name ?>&subject_id=<?= $data['subject_ID'] ?>" class="btn btn-success btn-sm ad-click-event">
                                              Go To Lesson
                                          </a>
                                      </p>

                                      <?php
                                        $lesson_q = mysqli_query($db,"SELECT * FROM lesson WHERE subject_ID=$data[subject_ID]");
                                        $num_lesson = mysqli_num_rows($lesson_q);

                                        //get if user alredy enrolled
                                        $enrolled_q = mysqli_query($db, "SELECT * FROM enrolls WHERE subject_ID=$data[subject_ID] AND student_ID=$id");
                                        $is_enrolled = false;

                                        if(mysqli_num_rows($enrolled_q) > 0){
                                            #enrolled
                                            $is_enrolled = true;
                                            #get total complete
                                            $completed_q = mysqli_query($db, "SELECT * FROM enrolls WHERE subject_ID=$data[subject_ID] AND student_ID=$id AND completed=1");
                                            $num_completed = mysqli_num_rows($completed_q);

                                            $percentage = ($num_completed/$num_lesson)*100;
                                        }
                                      ?>

                                      <h4 style="margin-top: 0">Total Lesson : <?= $num_lesson ?></h4>
                                      <?php if($is_enrolled){ ?>
                                      <p>Progress (<?= $num_completed." of ".$num_lesson." completed" ?>)</p>
                                      <div class="progress xs">
                                          <div class="progress-bar progress-bar-green progress-bar-striped" style="width: <?= $percentage ?>%;"></div>
                                      </div>
                                      <?php }else{ ?>
                                          <p>Not enroll Yet</p>
                                      <?php } ?>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
              <?php } ?>
          </div>

        <div class="col-lg">

            <a href="enrollsub.php?id=<?= $_GET['id'] ?>" class="btn btn-warning">Back</a>
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
