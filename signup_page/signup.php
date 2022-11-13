<?php
    // require_once "../Home page/config.php";
	$con = pg_connect("host = localhost port = 5432 dbname = users user = postgres password  = abhijeet456");
	$password_err = "";
	$username_err = "";
	$email_err = "";
		if(isset($_POST['user_name']) || isset($_POST['user_password']) || isset($_POST['user_email']) || isset($_POST['user_contact']) || isset($_POST['gender']))
		{
			$user_name = $_POST['user_name'];
			//echo "<br>$user_name";
			$user_password = $_POST['user_password'];
			//echo "<br>$user_password";
			$user_email = $_POST['user_email'];
			//echo "<br>$user_email";
			$user_contact = $_POST['user_contact'];
			//echo "<br>$user_contact";
			$gender = $_POST['gender'];
			//echo "<br>$gender";
      $c_password = $_POST['confirm_password'];
      //echo "<br>$c_password";
	  $email_query = "SELECT count(*) as allcount from user_details where user_email = $1";
	  $email_res = pg_query_params($con, $email_query, array($user_email));
	 // echo $email_res;
	 $row = pg_fetch_assoc($email_res);
	 $count = $row['allcount'];
	  if($count > 0)
	  	{
				$email_err = "email already exists";
				echo "<h4>$email_err</h4>";	 
		}
			else if($user_password === $c_password)
			{
				$query = "INSERT INTO user_details(user_name, user_password, user_email, user_contact, gender) VALUES('$user_name','$user_password','$user_email','$user_contact','$gender')";
				$result = pg_query($con, $query);
				header('location: ../Home Page/home.php');
			}
			else{
					$password_err = "Passwords dosen't match";
					echo "<h4>$password_err</h4>";
			}
    }

    
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title>RegistrationForm_v3 by Colorlib</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- MATERIAL DESIGN ICONIC FONT -->
	<link rel="stylesheet" href="fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">

	<!-- STYLE CSS -->
	<link rel="stylesheet" href="css/style.css">
	<!-- Linking favicon -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
</head>
<body>
	<div class="wrapper">
		<div class="inner">
			<form action="" method="post">
				<h3>Registration Form</h3>
				<div class="form-group">
					<div class="form-wrapper">
						<label for="">Username:</label>
						<div class="form-holder">
							<i class="zmdi zmdi-account-o"></i>
							<input required type="text" name="user_name" class="form-control">
						</div>
					</div>
					<div class="form-wrapper">
						<label for="">Email:</label>
						<div class="form-holder">
							<i style="font-style: normal; font-size: 15px;">@</i>
							<input required type="text" name="user_email" class="form-control">
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="form-wrapper">
						<label for="">Password:</label>
						<div class="form-holder">
							<i class="zmdi zmdi-lock-outline"></i>
							<input required type="password" id="password" name="user_password" class="form-control" placeholder="********">
						</div>
					</div>
					<div class="form-wrapper">
						<label for="">Repeat Password:</label>
						<div class="form-holder">
							<i class="zmdi zmdi-lock-outline"></i>
							<input required type="password" id="c_password" name="confirm_password" class="form-control" placeholder="********">
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="form-wrapper">
						<label for="number" name="user_contact">Phone Number:</label>
						<div class="form-holder">

							<i class="fa fa-phone" aria-hidden="true"></i><input required type="text" name="user_contact" class="form-control" pattern="[1-9]{1}[0-9]{9}">
						</div>
					</div>
					<div class="form-wrapper">
						<label name = "gender" for="gender">Gender:</label>
						<div class="form-holder select">
							<select name="gender" id="gender" class="form-control">
								<option value="male">Male</option>
								<option value="female">Female</option>
								<option value="other">Other</option>
							</select>
							<i class="zmdi zmdi-face"></i>
						</div>
					</div>
				</div>
				<div class="form-end">
					<div class="button-holder">
						<button type="submit">Register</button>
					</div>
				</div>
			</form>
		</div>
	</div>

</body>

</html>