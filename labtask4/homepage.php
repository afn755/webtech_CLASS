<?php
// start session
session_start();

// set session variable for user login status
$_SESSION['loggedin'] = false;

// check if user is logged in
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    $loginStatus = 'Logout';
    $loginUrl = 'logout.php';
} else {
    $loginStatus = 'Login';
    $loginUrl = 'login.php';
}

// output HTML
?>
<!DOCTYPE html>
<html>
<head>
	<title>Welcome to xCompany</title>
	<style>
		.header {
			display: flex;
			justify-content: space-between;
			align-items: center;
			padding: 10px;
			background-color: #333;
			color: #fff;
		}
		.header img {
			width: 50px;
			height: 50px;
		}
		.header a {
			margin: 0 10px;
			color: #fff;
			text-decoration: none;
		}
		.headline {
			text-align: center;
			margin: 50px;
			font-size: 32px;
		}
		.footer {
			text-align: center;
			background-color: #333;
			color: #fff;
			padding: 10px;
			position: fixed;
			bottom: 0;
			left: 0;
			width: 100%;
		}
	</style>
</head>
<body>
	<div class="header">
		<img src="company_logo.png" alt="Company Logo">
		<div>
			<a href="index.php">Home</a>
			<a href="<?php echo $loginUrl; ?>"><?php echo $loginStatus; ?></a>
			<a href="register.php">Register</a>
		</div>
	</div>
	<div class="headline">
		<h1>Welcome to xCompany</h1>
	</div>
	<div class="footer">
		<p>&copy; 2017 xCompany</p>
	</div>
</body>
</html>