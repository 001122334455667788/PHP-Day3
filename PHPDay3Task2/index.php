<?php
// Define variables and set to empty values
$nameErr = $emailErr = $genderErr = $agreeErr = "";
$name = $email = $gender = $classdetails = $group = "";
$courses = array(); 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed";
    }
  }

  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    }
  }

  if (empty($_POST["gender"])) {
    $genderErr = "Gender is required";
  } else {
    $gender = test_input($_POST["gender"]);
  }

  // Handle multiple select options
  if (isset($_POST["courses"])) {
    $courses = $_POST["courses"]; 
  }

  // Get other values (if any)
  $group = isset($_POST["group"]) ? test_input($_POST["group"]) : "";
  $classdetails = isset($_POST["classdetails"]) ? test_input($_POST["classdetails"]) : "";

}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

// Check if there are any errors
if (!empty($nameErr) || !empty($emailErr) || !empty($genderErr)) {
  // If errors exist, display the form with error messages
?>

<!DOCTYPE HTML>
<html>
<head>
  <link rel="stylesheet" href="style.css">
</head>
<body>

<h1>Application Name: AAST_BIS class registration</h1>
<span class="error">* Required field</span>
<br><br>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  Name: <input type="text" name="name" value="<?php echo $name;?>">
  <span class="error">* <?php echo $nameErr;?></span>
  <br><br>
  E-mail: <input type="text" name="email" value="<?php echo $email;?>">
  <span class="error">* <?php echo $emailErr;?></span>
  <br><br>
  Group#: <input type="text" name="group" value="<?php echo $group;?>">
  <br><br>
  Class Details: <textarea name="classdetails" rows="5" cols="40"><?php echo $classdetails;?></textarea>
  <br><br>
  Gender:
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="female") echo "checked";?> value="female">Female
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?> value="male">Male 
  <span class="error">* <?php echo $genderErr;?></span>
  <br><br>
  <label >Select Courses:</label>
  <select name="courses[]" multiple>
    <option value="HTML" <?php if (in_array("HTML", $courses)) echo "selected"; ?>>HTML</option>
    <option value="CSS" <?php if (in_array("CSS", $courses)) echo "selected"; ?>>CSS</option>
    <option value="JAVA SCRIPT" <?php if (in_array("JAVA SCRIPT", $courses)) echo "selected"; ?>>JAVA SCRIPT</option>
    <option value="PHP" <?php if (in_array("PHP", $courses)) echo "selected"; ?>>PHP</option>
    <option value="WORDPRESS" <?php if (in_array("WORDPRESS", $courses)) echo "selected"; ?>>WORDPRESS</option>
  </select><br><br>
  <label > Agree</label>
  <input type="checkbox" name="agree" value="agree" required>
  <span class="error">* You must agree to terms</span>
  <br><br>
  <input type="submit" name="submit" value="Submit">  
</form>

</body>
</html>

<?php
  exit(); // Stop further execution if errors exist
}

// If no errors, proceed to display the form with success message
?>

<!DOCTYPE HTML>
<html>
<head>
</head>
<body>

<h2>Your Input:</h2>
Name: <?php echo $name; ?><br>
Email: <?php echo $email; ?><br>
Group#: <?php echo $group; ?><br>
Class Details: <?php echo $classdetails; ?><br>
Gender: <?php echo $gender; ?><br>
Your courses are: 
<?php 
if (!empty($courses)) {
  echo implode(", ", $courses); 
} 
?>

</body>
</html>