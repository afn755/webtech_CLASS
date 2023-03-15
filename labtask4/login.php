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

// handle "Forget Me" button click
if (isset($_POST['forgetme'])) {
    // remove all session variables
    session_unset();
    // destroy the session
    session_destroy();
    // remove the remember me cookie if it exists
    if (isset($_COOKIE['rememberme'])) {
        unset($_COOKIE['rememberme']);
        setcookie('rememberme', '', time() - 3600, '/');
    }
    // redirect to login page
    header('Location: login.php');
    exit;
}

// handle login form submission
if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // validate username and password against JSON data
    $jsonData = file_get_contents('users.json');
    $users = json_decode($jsonData, true);
    $userExists = false;

    foreach ($users as $user) {
        if ($user['username'] === $username && $user['password'] === $password) {
            $userExists = true;
            break;
        }
    }

    if ($userExists) {
        // set session variable for user login status
        $_SESSION['loggedin'] = true;

        // handle remember me checkbox
        if (isset($_POST['remember']) && $_POST['remember'] === '1') {
            // set remember me cookie with username and password
            $cookieValue = base64_encode($username . ':' . $password);
            setcookie('rememberme', $cookieValue, time() + (86400 * 30), '/');
        }

        // redirect to dashboard page
        header('Location: dashboard.php');
        exit;
    } else {
        // show error message
        $error_msg = 'Invalid username or password';
    }
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
            width: 10px;
            height: 10px;
        }
        .header a {
            margin: 0 10px;
            color: #fff;
            text-decoration: none;
        }
        .headline {
            text-align: center;
            margin: 10px;
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
        form {
            margin: 10px auto;
            width: 50%;
            display: flex;
            flex-direction: column;
            align-items: left;
            border: 1px solid #333;
            padding: 20px;
        }
        label {
            margin-bottom: 10px;
            font-size: 10px;
            font-weight: bold;
        }
        input[type=text], input[type=password] {
            width: 100%;
            padding: 10px 20px;
            margin: 8px 0;
            box-sizing: border-box;
            border: none;
            border-bottom: 2px solid #333;
        }
        input[type=submit] {
            background-color: #333;
            color: #fff;
            padding: 14px 20px;
            margin: 20px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        input[type=submit]:hover {
            background-color: #555;
        }
        .rememberme {
            margin: 10px 0;
        }
        .forgetme {
            margin-top: 20px;
        }
    </style>
</head>

<body>
	<div class="header">
		<img src="company_logo.png" alt="Company Logo">
		<div>
			<a href="home.php">Home</a>
			<a href="<?php echo $loginUrl; ?>"><?php echo $loginStatus; ?></a>
			<a href="register.php">Register</a>
		</div>
	</div>
	<div class="headline">
		<h1>Welcome to xCompany</h1>
	</div>
	<div class="content">
		<h2>Login</h2>
		<form method="post" action="login.php">
			<label for="username">Username:</label>
			<input type="text" name="username" required><br>
			<label for="password">Password:</label>
			<input type="password" name="password" required><br>
			<label for="remember">Remember me:</label>
			<input type="checkbox" name="remember" value="1"><br>
			<input type="submit" value="Login">
			<?php if(isset($error_msg)) { ?>
				<span class="error"><?php echo $error_msg; ?></span>
			<?php } ?>
		</form>
		<form method="post" action="forgetme.php">
			<input type="submit" value="Forget me?">
		</form>
	</div>
	<div class="footer">
		<p>&copy; 2023 xCompany</p>
	</div>
</body>
