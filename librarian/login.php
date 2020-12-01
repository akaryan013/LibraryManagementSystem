<?php

session_start();
include "connection.php"

?>


<!DOCTYPE html>
<html lang="en">
<head>
	<title>Librarian Login Form | LMS</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100" style="background-image: url('images/bg-01.jpg');">
			<div class="wrap-login100 p-t-30 p-b-50">
				<span class="login100-form-title p-b-41">
					Library Management System
				</span>
				<span class="login100-form-title p-b-41">
					: User Login Form
				</span>
				<form class="login100-form validate-form p-b-33 p-t-5" action="#" method="post" name="loginform">

					<div class="wrap-input100 validate-input" data-validate = "Enter username">
						<input class="input100" type="text" name="username" placeholder="User name">
						<span class="focus-input100" data-placeholder="&#xe82a;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<input class="input100" type="password" name="password" placeholder="Password">
						<span class="focus-input100" data-placeholder="&#xe80f;"></span>
					</div>

					<div class="container-login100-form-btn m-t-32">
						<input type="submit" class="login100-form-btn" name="login" value="Login">
					</div>
                    
				</form>

<?php
            if(isset($_POST['login']))
           {              
             $sql = "SELECT * FROM `librarian_registration` WHERE `username` LIKE '$_POST[username]' AND `password` LIKE '$_POST[password]'";

                  $count = 0;
		          $result = mysqli_query($conn, $sql);
		          $count = mysqli_num_rows($result);
		          if($count == 0)
		          {
		          	
		          }
		          else
		          {
		           while ($row = mysqli_fetch_array($result)) 
		                   {
		          	          $_SESSION["name"] = $row["firstname"]." ".$row["lastname"];
		                   }
		          }       
           }

                    if(isset($_POST['login']))
		            {
		                  $count = 0;

		                  $sql = "SELECT * FROM `librarian_registration` WHERE `username` LIKE '$_POST[username]' AND `password` LIKE '$_POST[password]'";

		                  $result = mysqli_query($conn, $sql);

                        // Mysql_num_row is counting table row
                           $count = mysqli_num_rows($result);

                           if($count == 0)
                           {
	                        ?>
	                          <hr>
							 <div class="alert alert-danger col-lg-0 col-lg-push-0">
                                 <strong style="color:red">Invalid</strong> Username Or Password.
                             </div>
							<?php
                           }
                           else
                           {
                           	$_SESSION["librarian"] = $_POST["username"];
                           	?>
                              <script type="text/javascript">

                                	window.location="display_books.php";
                             
                              </script>
                            <?php
                           }

					}
                    
?>

				<hr>
				<div class="separator">
					<p class="change_link">New to site?
						<a href="registration.php" style="text-decoration: underline;"> <b>Create Account</b> </a>
					</p>

				</div>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>