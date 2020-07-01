<?php require "parent_auth.php"; 
 
 

$parent= $auth["parent_ID"];

$sql = "SELECT * FROM student WHERE parent_ID= $parent";
$result = mysqli_query($db,$sql);

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Parent Home</title>
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
    <style>
        .example-modal .modal {
            position: relative;
            top: auto;
            bottom: auto;
            right: auto;
            left: auto;
            display: block;
            z-index: 1;
        }
        .example-modal .modal {
            background: transparent !important;
        }
    </style>
</head>
<body class="hold-transition skin-purple fixed sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
    <header class="main-header">
        <!-- Logo -->
        <a href="parentHome.php" class="logo">
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
                        <a href="logout.php" onclick="return confirm('Are you sure?');" >LOGOUT <i class="fa fa-gears"></i></a>
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
                <li><a href="parentHome.php"><i class="fa fa-book"></i> <span>Children Enroll</span></a></li>
                <li><a href="progress.php"><i class="fa fa-book"></i> <span>Children Progress</span></a></li>
            </ul>
        </section>
        <!-- /.sidebar -->
    </aside>
    <!-- =============================================== -->
    <div class="content-wrapper">
        <section class="content-header">
        <div style="margin: 15px">
            <h3 > WELCOME, <?php echo "" .  ucwords($auth['pname']); ?> </h3><br>
                
            <div class="row">
                
                <div class="col-md-6">
                    <form action="addchild_process.php" method="post">
                        <div class="modal modal-success fade" id="modal-success">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title">Add Children</h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input name="fullname" class="form-control" id="title" placeholder="Name" required>
                                        </div>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label>Age</label>
                                            <input name="age" class="form-control" id="title" placeholder="Age ex 8 years" required>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                                        <button type="submit" name="submit" class="btn btn-outline">Save changes</button>
                                    </div>
                                </div>
                                <!-- /.modal-content -->
                            </div>
                            <!-- /.modal-dialog -->
                        </div>
                    </form>
                </div>
            </div> 
            <div class="row">

            <div class="box-header-with-border">
                <?php while ($data = mysqli_fetch_array ($result)) { ?>
                <div class="col-md-4">
                    <!-- Widget: user widget style 1 -->
                    <div class="box box-widget widget-user">
                        <!-- Add the bg color to the header using any of the bg-* classes -->
                        <div class="widget-user-header bg-purple-active">
                            <h3 class="widget-user-username"><?php echo ucwords($data['fullname'])?></h3>
                            <h5 class="widget-user-desc"><?= $data['age']?> Years Old</h5>
                        </div>
                        <div class="widget-user-image">
                            <img class="img-circle" src="img/avatar.png" alt="User Avatar">
                        </div>
                        <div class="box-footer">
                            <div class="row">
                                <!-- /.col -->
                                <div class="col-md-4 col-md-offset-4">
                                    <div class="description-block">
                                        <a href="enrollsub.php?id=<?=$data['student_ID']?>" class="btn btn-primary btn-flat margin" onclick="return confirm('Are Sure Want To Enroll As <?=  ucwords ($data["fullname"]) ?>?');">Enroll Me</a>
                                    </div>
                                    <!-- /.description-block -->
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->
                        </div>
                    </div>
                    <!-- /.widget-user -->
                </div>
                <?php } ?>
            </div>
        </div>
            
        </div>

        </section>

        <section class="content-header">

           <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <button type="button" class=" btn btn-primary btn-lg btn-block" data-toggle="modal" data-target="#modal-success">Add Children</button>
                </div>
            </div> <!-- phpshowdata -->

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
        <b>Version</b> 2.4.18
    </div>
    <strong>Copyright &copy; 2014-2019 <a href="https://adminlte.io">AdminLTE</a>.</strong> All rights
    reserved.
</footer>
<div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->
 
 <!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
</body>
</html>