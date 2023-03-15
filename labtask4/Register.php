<?php
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

// initialize variables for form data
$name = '';
$email = '';
$username = '';
$password = '';
$confirm_password = '';
$gender = '';
$date_of_birth = '';
$errors = array();

// check if form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	// get form data and sanitize inputs
	$name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
	$email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
	$username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
	$password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
	$confirm_password = filter_var($_POST['confirm_password'], FILTER_SANITIZE_STRING);
	$gender = filter_var($_POST['gender'], FILTER_SANITIZE_STRING);
	$date_of_birth = filter_var($_POST['date_of_birth'], FILTER_SANITIZE_STRING);

	// validate form inputs
	if (empty($name)) {
		$errors['name'] = 'Name is required';
	}
	if (empty($email)) {
		$errors['email'] = 'Email is required';
	} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		$errors['email'] = 'Invalid email format';
	}
	if (empty($username)) {
		$errors['username'] = 'Username is required';
	}
	if (empty($password)) {
		$errors['password'] = 'Password is required';
	} elseif (strlen($password) < 6) {
		$errors['password'] = 'Password must be at least 6 characters';
	}
	if (empty($confirm_password)) {
		$errors['confirm_password'] = 'Confirm password is required';
	} elseif ($password !== $confirm_password) {
		$errors['confirm_password'] = 'Passwords do not match';
	}
	if (empty($gender)) {
		$errors['gender'] = 'Gender is required';
	}
	if (empty($date_of_birth)) {
		$errors['date_of_birth'] = 'Date of birth is required';
	}

	// if no errors, save data to JSON file
	if (count($errors) === 0) {
		$userData = array(
			'name' => $name,
			'email' => $email,
			'username' => $username,
			'password' => $password,
			'gender' => $gender,
			'date_of_birth' => $date_of_birth
		);

		// read existing data from file
		$users = file_exists('users.json') ? json_decode(file_get_contents('users.json'), true) : array();

		// add new user data to array
		$users[] = $userData;

		// save array as JSON
		file_put_contents('users.json', json_encode($users));

		// redirect to home page
		header('Location: home.php');
	}
}


// output HTML
?>
<!DOCTYPE html>
<html>
<head>
	<title>Registration Form</title>
	<style>
		.header {
			display: flex;
			justify-content: space-between;
			align-items: center;
			padding: 10px;
		
            background-color: #f2f2f2;
		}

		.logo img {
			height: 50px;
		}

		.actions a {
			margin-left: 10px;
		}

		.errors {
			color: red;
			margin-bottom: 10px;
		}

		form {
			padding: 20px;
			border: 1px solid #ccc;
			border-radius: 5px;
			background-color: #fff;
			max-width: 500px;
			margin: 0 auto;
		}

		input[type="text"],
		input[type="email"],
		input[type="password"],
		select {
			display: block;
			width: 100%;
			padding: 10px;
			margin-bottom: 10px;
			border: 1px solid #ccc;
			border-radius: 5px;
			box-sizing: border-box;
			font-size: 16px;
		}

		input[type="submit"],
		input[type="reset"] {
			display: inline-block;
			background-color: #4CAF50;
			color: #fff;
			padding: 10px 20px;
			border: none;
			border-radius: 5px;
			cursor: pointer;
			font-size: 16px;
		}

		input[type="submit"]:hover,
		input[type="reset"]:hover {
			background-color: #3e8e41;
		}
	</style>
</head>
<body>
	<div class="header">
		<div class="logo">
			<img src="logo.png" alt="Company Logo">
		</div>
		<div class="actions">
			<a href="home.php">Home</a>
			<a href="<?php echo $loginUrl; ?>"><?php echo $loginStatus; ?></a>
			<a href="registration.php">Registration</a>
		</div>
	</div>
	<h1>Registration Form</h1>
	<?php if (count($errors) > 0): ?>
		<div class="errors">
			<?php foreach ($errors as $error): ?>
				<p><?php echo $error; ?></p>
			<?php endforeach; ?>
		</div>
	<?php endif; ?>
	<form method="POST">
		
        <label>Name:</label>
		<input type="text" name="name" value="<?php echo htmlspecialchars($name); ?>">
		<br>
        <label>Email:</label>
		<input type="email" name="email" value="<?php echo htmlspecialchars($email); ?>">
		
        <label>Username:</label>
		<input type="text" name="username" value="<?php echo htmlspecialchars($username); ?>">
		<br>
        <label>Password:</label>
		<input type="password" name="password">
		<br>
        <label>Confirm Password:</label>
		<input type="password" name="confirm_password">
		<br>
        <label>Gender:</label>
		<input type="radio" name="gender" value="male"<?php if ($gender == 'male') { echo ' checked'; } ?>> Male
		<input type="radio" name="gender" value="female"<?php if ($gender == 'female') { echo ' checked'; } ?>> Female
		<input type="radio" name="gender" value="other"<?php if ($gender == 'other') { echo ' checked'; } ?>> Other <br>
        <br>
        <label>Date of Birth:</label>
		<input type="date" name="date_of_birth" value="<?php echo htmlspecialchars($date_of_birth); ?>"><br>
		<br>
        <input type="submit" value="Submit">
        <input type="reset" value="Reset">
        
	</form>
	<script>
		// Validate password fields
		var password = document.getElementsByName('password')[0];
		var confirm_password = document.getElementsByName('confirm_password')[0];
		var validatePassword = function() {
			if (password.value != confirm_password.value) {
				confirm_password.setCustomValidity("Passwords don't match");
			} else {
				confirm_password.setCustomValidity('');
			}
		};
		password.onchange = validatePassword;
		confirm_password.onkeyup = validatePassword;
	</script>
</body>
</html>