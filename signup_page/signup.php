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
</head>
<?php
    $con = pg_connect("host = localhost port = 5432 dbname = new_users user = postgres password  = abhijeet456");
    if ($con) {
	    echo "connected to the database successfully!";
    } else
	    echo "failed to connect to the database!";
		if(isset($user_name) || isset($user_password) || isset($user_email) || isset($user_contact) || isset($gender))
		{
			$user_name = $_POST['user_name'];
			$user_password = $_POST['user_password'];
			$user_email = $_POST['user_email'];
			$user_contact = $_POST['user_contact'];
			$gender = $_POST['gender'];
			$query = "call user_entry_procedure(".$user_name.",".$user_password.",".$user_email.",".$user_contact.",".$gender.")";
			$res = pg_query($conn, $query);
			if($res)
			{
				echo "Data succesfully added to the database";
			}
			else
			echo "Failed to add data to the database" ;
		}
			 ?>
		

<body>
	<div class="wrapper">
		<div class="inner">
			<form action="../Home Page/home.php" method="post">
				<h3>Registration Form</h3>
				<div class="form-group">
					<div class="form-wrapper">
						<label for="">Username:</label>
						<div class="form-holder">
							<i class="zmdi zmdi-account-o"></i>
							<input type="text" name="user_name" class="form-control">
						</div>
					</div>
					<div class="form-wrapper">
						<label for="">Email:</label>
						<div class="form-holder">
							<i style="font-style: normal; font-size: 15px;">@</i>
							<input type="text" name="user_email" class="form-control">
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="form-wrapper">
						<label for="">Password:</label>
						<div class="form-holder">
							<i class="zmdi zmdi-lock-outline"></i>
							<input type="password" name="user_password" class="form-control" placeholder="********">
						</div>
					</div>
					<div class="form-wrapper">
						<label for="">Repeat Password:</label>
						<div class="form-holder">
							<i class="zmdi zmdi-lock-outline"></i>
							<input type="password" name="user_password" class="form-control" placeholder="********">
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="form-wrapper">
						<label for="number" name="user_contact">Phone Number:</label>
						<div class="form-holder">

							<input type="text" class="form-control" pattern="[1-9]{1}[0-9]{9}">
						</div>
					</div>
					<div class="form-wrapper">
						<label name = "gender" for="gender">Gender:</label>
						<div class="form-holder select">
							<select name="gender" id="gender" class="form-control">
								<option value="male">Male</option>
								<option value="femal">Female</option>
								<option value="other">Other</option>
							</select>
							<i class="zmdi zmdi-face"></i>
						</div>
					</div>
				</div>
				<div class="form-end">
					<div class="checkbox">
						<label>
							<input type="checkbox">Remember me
							<span class="checkmark"></span>
						</label>
					</div>
					<div class="button-holder">
						<button type="submit">Register</button>
					</div>
				</div>
			</form>
		</div>
	</div>

</body>

</html>