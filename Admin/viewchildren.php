<?php  
$db = mysqli_connect("localhost","root","","elearning");

        if (mysqli_connect_errno()){
        echo "error database connection : " . mysqli_connect_error();
          }

$id = $_GET['id'];

$sql = "SELECT * FROM parent WHERE parent_ID= $id";
        $result = mysqli_query($db,$sql);
        if ($result == TRUE){
   
        $data = mysqli_fetch_array ($result)
          

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
        folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="../bower_components/morris.js/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="../bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="../bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="../bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

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
    <a href="../admin/admin.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>A</b>LT</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>E-Learning</b></span>
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



        <li><a href="../admin/admin.php" class="logo"><i class="fa fa-book"></i> <span>Subject</span></a></li>
        <li><a href="adminparents.php"><i class="fa fa-book"></i> <span>Parents</span></a></li>
        
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- =============================================== -->

  
   
  
<div class="content-wrapper">
    
    <section class="content-header">
      <br><h1> 
        ADMIN
      </h1><br>
      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">List of Children for <?php echo $data['pname']?>    
            <?php } else {
          echo "() Result";
          }
          ?> </h3>
            </div>
             
           

            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered">
                <tr>
                  <th style="width: 10px">#</th>
                   
                  <th>Fullname</th>
                  <th>Subject</th>
                  <th>Level</th>
                  <th>Complete</th>
                 </tr>

      <?php
       
        $id = $_GET['id'];
                              
        $sql = "SELECT * FROM student as s LEFT JOIN parent as p ON s.parent_ID=p.parent_ID LEFT JOIN enrolls as e ON e.student_ID=s.student_ID LEFT JOIN subject as b ON e.subject_ID=b.subject_ID WHERE p.parent_ID= $id GROUP BY level";
        $result = mysqli_query($db,$sql);
        if ($result == TRUE){
   
          $no = 0;
          while ($data = mysqli_fetch_array ($result))
          {
            ?>
                <tr>
                  <td><?php echo ++$no;?></td>
                  <td><?php echo ucwords($data['fullname'])?></td>
                  <td><?php echo $data['name']?></td>
                  <td><?php echo $data['level']?></td>
                  <td><?php echo $data['completed']?></td>
<td></td>
        

            </tr> <?php } ?>  
                
           
              </table>
              <?php } else {
          echo "() Result";
          }
          $db -> close();
          ?>  

            </div>
          
          </div>
 <input type="button" value="Back" class="btn btn-primary btn-danger" style="float: left;" onclick="location.href='../admin/adminparents.php'" >
        </div>

      </div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.4.18
    </div>
    <strong>Copyright &copy; 2014-2019 <a href="https://adminlte.io">AdminLTE</a>.</strong> All rights
    reserved.
  </footer>

  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="../bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="../bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
</body>
</html>

