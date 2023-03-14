<!DOCTYPE html>
<html>
<head>
	<title>Registration Form</title>
</head>
<body>
	<h1>Registration Form</h1>
	<form method="post" action="">
		<label for="name">Name:</label>
		<input type="text" id="name" name="name" required><br><br>

		<label for="email">Email:</label>
		<input type="email" id="email" name="email" required><br><br>

		<label for="username">Username:</label>
		<input type="text" id="username" name="username" required><br><br>

		<label for="password">Password:</label>
		<input type="password" id="password" name="password" required><br><br>

		<label for="confirm_password">Confirm Password:</label>
		<input type="password" id="confirm_password" name="confirm_password" required><br><br>

		<label for="gender">Gender:</label>
		<input type="radio" id="male" name="gender" value="male" required>
		<label for="male">Male</label>
		<input type="radio" id="female" name="gender" value="female" required>
		<label for="female">Female</label><br><br>

		<label for="dob">Date of Birth:</label>
		<input type="date" id="dob" name="dob" required><br><br>

		<input type="submit" name="submit" value="Register">
	</form>

	<?php
		if(isset($_POST['submit'])) {
			$errors = array();
			$data = array(
				'name' => $_POST['name'],
				'email' => $_POST['email'],
				'username' => $_POST['username'],
				'password' => $_POST['password'],
				'gender' => $_POST['gender'],
				'dob' => $_POST['dob']
			);
        }

			// Validate name
			if (!preg_match("/^[a-zA-Z ]*$/", $data['name'])) {
				$errors['name'] = "Only letters and white space allowed";
			}

			// Validate email
			if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
				$errors['email'] = "Invalid email format";
			}

			// Validate username
			if (!preg_match("/^[a-zA-Z0-9]*$/", $data['username'])) {
				$errors['username'] = "Only letters and numbers allowed";
			}

			// Validate password
			if (strlen($data['password']) < 8) {
				$errors['password'] = "Password must be at least 8 characters long";
			}

			// Validate confirm password
			if ($data['password'] != $data['confirm_password']) {
				$errors['confirm_password'] = "Passwords do not match";
			}

			// If there are validation errors, display them
			if (!empty($errors)) {
				echo "<p>Errors:</p><ul>";
				foreach ($errors as $error) {
					echo "<li>$error</li>";
				}
				echo "</ul>";
			} else {
				$json_data = json_encode($data, JSON_PRETTY_PRINT);
				file_put_contents('data.json', $json_data);
				echo "<p>Registration successful!</p>";
            }
