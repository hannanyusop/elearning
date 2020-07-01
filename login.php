<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>E-Learning| Log in
    </title>
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
    <!-- iCheck -->
    <link rel="stylesheet" href="plugins/iCheck/square/blue.css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  </head>
  <body style="background-image: url('img/bg-class.jpg');"class="hold-transition login-page">
    <div class="login-box">
      <div class="login-logo"><br>
        <a href="">
          <b>E-Learning
          </b>
        </a>
      </div>
      <!-- /.login-logo -->
      <div class="login-box-body">
        <p class="login-box-msg">Sign in to start your session
        </p>
        <form action="login.php" method="post">
          <div class="form-group has-feedback">
            <input type="email" name="email" class="form-control" placeholder="Email">
            <span class="glyphicon glyphicon-envelope form-control-feedback">
            </span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" name="password" class="form-control" placeholder="Password">
            <span class="glyphicon glyphicon-lock form-control-feedback">
            </span>
          </div>
          <div class="row">
            <!-- /.col -->
            <div class="col-sm">
              <input type="submit" name="login" value="login" class="btn btn-block btn-success">
             <!-- <button type="button" onclick="location.href='admin/admin.php'" name="admin"  class="btn btn-block btn-warning">Admin 
              </button>-->
            </div>
            <!-- /.col -->
          </div>
        </form>
        <!-- /.social-auth-links -->
        
        <br>
        
      </div>
      <!-- /.login-box-body -->
      <a href="register.php" style="color: black"> <h5> <u>Register a new account</u></h5>
        </a>
    </div>
    <!-- /.login-box -->
    <!-- jQuery 3 -->
    <script src="bower_components/jquery/dist/jquery.min.js">
    </script>
    <!-- Bootstrap 3.3.7 -->
    <script src="bower_components/bootstrap/dist/js/bootstrap.min.js">
    </script>
    <!-- iCheck -->
    <script src="plugins/iCheck/icheck.min.js">
    </script>
    <script>
      $(function () {
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' /* optional */
        }
                         );
      }
       );

</script>

 <?php
require "config.php";
session_start();
if (isset($_POST["login"]))
{
    if (empty($_POST["email"]) || empty($_POST["password"]))
    {
        echo '<script>alert("Both Fields are required")</script>';
    }
    else
    {
        $email = mysqli_real_escape_string($db, $_POST["email"]);
        $password = mysqli_real_escape_string($db, $_POST["password"]);
        $query = "SELECT * FROM parent WHERE email = '$email'";
        $result = mysqli_query($db, $query);
        if (mysqli_num_rows($result) > 0)
        {
            while ($row = mysqli_fetch_array($result))
            {
                if (password_verify($password, $row["password"]))
                {
                    $_SESSION["email"] = $email;
                    $_SESSION["role"] = "PARENT";
                    header("location:parentHome.php");
                }
                else
                {
                    //return false;
                    echo '<script language="javascript">';
                    echo 'alert("Wrong password");';
                    echo 'window.location.href="login.php";';
                    echo '</script>';
                }
            }
        }
        else
        {        
        	$sql = "SELECT * FROM admin WHERE email = '$email' and password ='$password'";
        	$result = mysqli_query($db, $sql);

        	if (mysqli_num_rows($result) > 0)
        	{
        		$row = mysqli_fetch_array($result);
            
            	$_SESSION["email"] = $email;
            	$_SESSION["role"] = "ADMIN";
            	header("location:admin/admin.php");
       	 	}	
        		 
        

    else
    
    {
      	echo '<script language="javascript">';
        echo 'alert("Wrong email");';
        echo 'window.location.href="login.php";';
        echo '</script>';
    
        }

}
        
    
}
}
?>
  </body>
</html>
 