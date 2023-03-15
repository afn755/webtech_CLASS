<?php
// start session
session_start();

// check if user is already logged in
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    // redirect to home page
    header('Location: home.php');
    exit;
}

// handle form submission
if (isset($_POST['submit'])) {
    // get user input
    $email = $_POST['email'];

    // validate email
    if (empty($email)) {
        $error_msg = 'Please enter your email address.';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error_msg = 'Invalid email address.';
    } else {
        // generate OTP and send email
        $otp = rand(100000, 999999);
        $to = $email;
        $subject = 'OTP Verification for Forget Me Request';
        $message = 'Your OTP is ' . $otp . '.';
        $headers = 'From: noreply@xcompany.com' . "\r\n" .
            'Reply-To: noreply@xcompany.com' . "\r\n" .
            'X-Mailer: PHP/' . phpversion();
        mail($to, $subject, $message, $headers);

        // store OTP and email in session
        $_SESSION['forgetme'] = array(
            'email' => $email,
            'otp' => $otp
        );

        // redirect to OTP verification page
        header('Location: forgetme-otp.php');
        exit;
    }
}

// output HTML
?>
<!DOCTYPE html>
<html>
<head>
    <title>Forget Me - Verify Email</title>
    <style>
        form {
            margin: 10px auto;
            width: 50%;
            display: flex;
            flex-direction: column;
            align-items: center;
            border: 1px solid #333;
            padding: 20px;
        }
        label {
            margin-bottom: 10px;
            font-size: 18px;
            font-weight: bold;
        }
        input[type=text] {
            width: 100%;
            padding: 12px 20px;
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
        .error {
            color: red;
            margin-top: 10px;
        }
    </style>
</head>
<body>
	<h1>Forget Me - Verify Email</h1>
	<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
		<label for="email">Email:</label>
		<input type="text" name="email" value="<?php if(isset($email)) echo $email; ?>" required><br><br>
		<input type="submit" name="submit" value="Verify">
		<?php if(isset($error_msg)) { ?>
			<span class="error"><?php echo $error_msg; ?></span>
		<?php } ?>
	</form>
	<p><a href="login.php"><br>Back to Login</a></p>
</body>
</html>
