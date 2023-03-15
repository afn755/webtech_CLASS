<?php
// start session
session_start();

// check if user is logged in
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    // redirect to login page
    header('Location: login.php');
    exit;
}

// get user data from JSON file
$userData = json_decode(file_get_contents('user_data.json'), true);
$username = $_SESSION['username'];

// find user data by username
$user = null;
foreach ($userData as $data) {
    if ($data['username'] === $username) {
        $user = $data;
        break;
    }
}

// output HTML
?>
<!DOCTYPE html>
<html>
<head>
    <title>Dashboard | xCompany</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }
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
            margin-right: 10px;
        }
        .header a {
            margin: 0 10px;
            color: #fff;
            text-decoration: none;
            font-size: 20px;
            font-weight: bold;
        }
        .menu {
            display: flex;
            flex-direction: column;
            margin: 10px;
        }
        .menu a {
            display: block;
            margin-bottom: 10px;
            font-size: 18px;
            color: #333;
            text-decoration: none;
            padding: 10px;
            background-color: #ddd;
            border-radius: 5px;
            box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.3);
        }
        .menu a:hover {
            background-color: #bbb;
        }
        .content {
            margin: 10px;
        }
        .welcome {
            text-align: right;
            font-size: 24px;
            font-weight: bold;
            margin-right: 10px;
        }
        .profile {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }
        .profile img {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            margin-right: 20px;
        }
        .profile .details {
            display: flex;
            flex-direction: column;
            font-size: 18px;
        }
        .profile .details span {
            margin-bottom: 10px;
        }
        .profile a {
            display: block;
            margin-top: 10px;
            padding: 5px 10px;
            background-color: #333;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.3);
        }
        .profile a:hover {
            background-color: #555;
        }
    </style>
</head>

<body>
  <div class="header">
    <div class="logo">
      <a href="dashboard.php">Logo</a>
    </div>
    <div class="user-info">
      <span>Welcome, <?php echo $user['name']; ?></span>
      <a href="profile.php" class="btn-profile">Profile</a>
    </div>
  </div>
  <div class="menu">
    <ul>
      <li><a href="dashboard.php">Dashboard</a></li>
      <li><a href="view-profile.php">View Profile</a></li>
      <li><a href="edit-profile.php">Edit Profile</a></li>
      <li><a href="change-picture.php">Change Picture</a></li>
      <li><a href="change-password.php">Change Password</a></li>
      <li><a href="logout.php">Logout</a></li>
    </ul>
  </div>
  <div class="content">
    <h1>Welcome to the Dashboard, <?php echo $user['name']; ?>!</h1>
    <p>This is the dashboard page of your account.</p>
    <p>You can use the menu on the left to navigate to other pages.</p>
  </div>
</body>