<!DOCTYPE html>
<html>
<head>
  <title>
  </title>
</head>

<h2>Registration Form</h2>

<body>

  <form method="Post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <label for="fname">First name:</label>
    <input type="text" id="fname" name="fname"><br><br>

    <label for="lname">Last name:</label>
    <input type="text" id="lname" name="lname"><br><br>

    Degree: <input type="checkbox" id="v1" name="v1" value="SSC[]">
    <label for="v1"> SSC</label>
    <input type="checkbox" id="v2" name="v2" value="HSC[]">
    <label for="v2"> HSC</label>
    <input type="checkbox" id="v3" name="v3" value="BSC[]">
    <label for="v3">BSC</label><br><br>
    
    
    <label for="uni">University:</label>

    <select id="name">
      <option value="aiub">Aiub</option>
      <option value="brac">Brac</option>
      <option value="north South">North South</option>
      <option value="iub">IUB</option><br>
    </select>
    <br><br>
    
    Gender: <input type="radio" id="male" name="afn" value="Male">
    <lebel for="male">Male</lebel>
    <input type="radio" id="female" name="afn" value="Female">
    <lebel for="female">Female</lebel><br><br>

    <label for="quantity">
    Cradit Completed:</label>
    <input type="number" id="quantity" name="quantity" min="1" max="148"><br><br>

    <label for="birthday">Birthday:</label>
    <input type="date" id="birthday" name="birthday"><br><br>

    <input type="submit" name="submit" value="submit">

  </form>
   <?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {                             //first name
    $name = $_POST['fname'];
    if (empty($name)) {
        echo "First name is empty";
    } else {
        echo $name;
    }
}
?><br>

  <?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {                              //last name
    $name = $_POST['lname'];
    if (empty($name)) {
        echo "Name is empty";
    } else {
        echo $name;
    }
}
?><br>
  <?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {                              //cradit
    $name = $_POST['quantity'];
    if (empty($name)) {
        echo "Quantity is empty";
    } else {
        echo $name;
    }
}
?><br>

   <?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {                              //gender
    $name = $_POST['afn'];
    if ($name == "Male") {
        echo "This person is male";
    } else if ($name == "Female") {
        echo "This person is female";
    } else {
        echo "empty";
    }
}
?><br>
   <?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {                              //dob
    $name = $_POST['birthday'];
    if (empty($name)) {
        echo "Birthday is empty";
    } else {
        echo $name;
    }
}
?>


  </body>
</html>
