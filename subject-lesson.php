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

    if(isset($_GET['name']) && isset($_GET['id']) && isset($_GET['subject_id'])){

        $id = $_GET['id'];
        $name = $_GET['name'];
        $subject_id = $_GET['subject_id'];

        #check if subject is valid
        $r_subject = mysqli_query($db, "SELECT * FROM subject WHERE subject_ID=$subject_id");

        $subject = mysqli_fetch_assoc($r_subject);

        if(mysqli_num_rows($r_subject) == 0){
            echo "<script>alert('Invalid subject!');window.location='enrollsub.php'</script>";
        }

        $result = mysqli_query($db, "SELECT * FROM lesson WHERE subject_ID='$subject_id'");


    }else{
        echo "<script>alert('Invalid parameter!');window.location='parentHome.php'</script>";
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
          <div class="row">
              <div class="col-md-12">
                  <div class="box box-default">
                      <div class="box-header with-border">
                          <i class="fa fa-book"></i>

                          <h3 class="box-title"><?= $subject['name']." LEVEL :". $subject['level'] ?></h3>
                      </div>
                      <!-- /.box-header -->
                      <div class="box-body">

                          <h4>Lesson List</h4>

                          <?php while ($row = mysqli_fetch_array($result)){ ?>

                              <div class="alert alert-info">
                                  <h4><i class="icon fa fa-info"></i> <?= $row['title'] ?></h4>
                                  <?= $row['description'] ?><br><br>
                                  <a href="subject-lesson-view.php?id=<?=$id?>&name=<?=$name?>&subject_id=<?=$subject_id?>&lesson_id=<?= $row['lesson_ID']?>" class="btn btn-success btn-sm">View</a>
                              </div>
                            <?php } ?>

                          <a href="subject-level.php?id=<?=$id?>&name=<?=$name?>" class="btn btn-warning">Back To Subject Level</a>
                      </div>
                      <!-- /.box-body -->
                  </div>
                  <!-- /.box -->
              </div>
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
