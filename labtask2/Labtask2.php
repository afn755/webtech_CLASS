<!DOCTYPE html>
<html>

<head>
  <title>

  </title>
</head>
<h2>Registration Form Validation</h2>

<body>
  <form method="Post" action="<?php echo $_SERVER['PHP_SELF']; ?>">

    <label for="fname">
        First name:
    </label>
    <input type="text" id="fname" name="fname"><br><br>

    <label for="lname">
        Last name:
    </label>
    <input type="text" id="lname" name="lname"><br><br>
    
    Gender: <input type="radio" id="male" name="afn" value="Male">
    <lebel for="male">Male</lebel>
    <input type="radio" id="female" name="afn" value="Female">
    <lebel for="female">Female</lebel><br><br>

    E-mail: <label for="email"></label>
    <input type="text" id="email" name="email"><br><br>
    

    Degree: <input type="checkbox" id="v1" name="v1" value="SSC[]">
    <label for="v1"> SSC</label>
    <input type="checkbox" id="v2" name="v2" value="HSC[]">
    <label for="v2"> HSC</label>
    <input type="checkbox" id="v3" name="v3" value="BSC[]">
    <label for="v3">BSC</label>
    <input type="checkbox" id="v4" name="v4" value="MSC[]">
    <label for="v4">MSC</label><br><br>

    <label for="blood">
    Blood Group:
</label>
    <select id="blood">
      <option value=""></option>
      <option value="a+">A+</option>
      <option value="a-">A-</option>
      <option value="b+">B+</option>
      <option value="b-">B-</option>
      <option value="o+">O+</option>
      <option value="o-">O-</option>
      <option value="ab-">AB-</option>
      <option value="ab-">AB-</option>
    </select>

    

    <label for="birthday">Birthday:</label>
    <input type="date" id="birthday" name="birthday"><br><br>

    <input type="submit" name="submit" value="submit">

  </form>
   <?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {                             //first name
    $name = $_POST['fname'];
    if (preg_match("/^[a-zA-Z'-]+$/", $_POST['fname'])) {
        if (preg_match("/[a-z][^a-z]*[a-z]/i", $_POST['fname'])) {
            echo $name;
        } else echo "Name is Not correct";
    } else echo "Name is Not correct";
}
?><br>
  <?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {                                //last name
    $name = $_POST['lname'];
    if (preg_match("/^[a-zA-Z'-]+$/", $_POST['lname'])) {
        if (preg_match("/[a-z][^a-z]*[a-z]/i", $_POST['lname'])) {
            echo $name;
        } else echo "Name is Not correct";
    } else echo "Name is Not correct";
}
?><br>
  <?php
$email = $_POST['email'];                                                  //email

if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo $email;
} else {
    echo "email is invalid";
}
?><br>
   <?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {                                 //gender
    $name = $_POST['afn'];
    if ($name == "Male") {
        echo "This person is male";
    } else if ($name == "Female") {
        echo "This person is female";
    } else {
        echo "Not selected";
    }
}
?><br>
   <?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {                                //birthday
    $name = $_POST['birthday'];
    if (empty($name)) {
        echo "Birthday is empty";
    } else {
        echo $name;
    }
}
?>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {                                  //blood group
    $bg = $_POST['blood'];
    if (!isset($bg)) {
        echo "Blood group is not selected";
    } else {
        echo $bg;
    }
    echo $bg;
}
?>
</body>

</html>