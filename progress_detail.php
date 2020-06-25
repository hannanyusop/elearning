<?php 
    
      require "parent_auth.php";
      require "config.php";

      $id = $_GET['id'];

      $query=mysqli_query($db, "SELECT * FROM student WHERE student_ID=$id");

      while ($data = mysqli_fetch_array ($query))
            {
   
     
  ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Progress Detail</title>
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
    <!-- Morris chart -->
    <link rel="stylesheet" href="bower_components/morris.js/morris.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="bower_components/jvectormap/jquery-jvectormap.css">
    <!-- Date Picker -->
    <link rel="stylesheet" href="bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="bower_components/bootstrap-daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
 
</head>
<body class="hold-transition skin-blue fixed sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="parentHome.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>A</b>LT</span>
      <!-- logo for regular state and mobile devices -->
      <span class="fa fa-book"><b> E-Learning</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">      
          <li>
            <a href="../logout.php" onclick="return confirm('Are you sure?');" >LOGOUT <i class="fa fa-gears"></i></a>
          </li>
        </ul>
      </div>
    </nav>
  </header>

  <!-- =============================================== -->

  <!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        
        
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>

        <li><a href="parentHome.php"><i class="fa fa-user"></i> <span>Children Enroll</span></a></li>
        
        <li><a href="progress.php"><i class="fa fa-bar-chart"></i> <span>Children Progress</span></a></li>
        
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- =============================================== -->

  
  <div class="content-wrapper">
   
    <section class="content-header">
      <h1>
        
      </h1>
     <!-- phpshowdata -->
           

            <!-- /.box-header -->
            <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-body">
              <div class="box-header-with-border">
                <h4>Student : <?php echo ucwords($data['fullname'])?> <?php } ?> </h4><br>
              </div>
                <table class="table table-bordered">
                    <tr>
                        <th style="width: 10px">#</th>
                        <th>Subject</th>
                        <th>Level</th>
                        <th>Lesson Progress</th>
                    </tr>

            <?php          

              $id = $_GET['id'];

              //$sql = "SELECT * FROM student as p LEFT JOIN lesson as l ON p.student_ID=l.student_ID LEFT JOIN subject as s ON s.subject_ID=l.subject_ID WHERE student_ID = $id ";
              $sql = "SELECT * FROM student  WHERE student_ID = $id ";
              $result = mysqli_query($db,$sql);
                
                if ($result == TRUE){


      
                $no = 0;
                while ($data = mysqli_fetch_array ($result))
                {
            ?>
                    <tr>
                        <td><?php echo ++$no;?></td>
                        <td><?php echo ucwords($data['subject'])?></td>
                        <td><?php echo $data['level']?></td>
                         <td><?php echo $data['progress']?></td>
    
            

                    </tr> <?php } ?>
                </table>

            <?php 
                } else {
                echo "() Result";
                }
                $db -> close();
            ?>
          
          </div>

        </div>

      </div>

    </section>


    <section class="content">
     
    </section>
    <!-- /.content -->
  </div>  
  <!-- /.content-wrapper -->

 <footer class="main-footer">
    <div class="pull-right hidden-xs">
        <b> </b> 
    </div>
    <strong>Copyright &copy; BITS</strong>  Web Dev Project
</footer>

  <div class="control-sidebar-bg"></div>
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

