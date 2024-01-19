<?php
// Set parameters and execute
$fname = $_POST['fname']; // Assuming 'fname' is the name attribute in the form
$lname = $_POST['lname']; // Assuming 'lname' is the name attribute in the form
$gender = $_POST['gender']; // Assuming 'gender' is the name attribute in the form
$age = $_POST['age']; // Assuming 'age' is the name attribute in the form
$dob = $_POST['dob']; // Assuming 'dob' is the name attribute in the form
$email = $_POST['email']; // Assuming 'email' is the name attribute in the form
$password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hashing the password before storing it
$confirmPassword = $_POST['confirmPassword']; // Assuming 'confirmPassword' is the name attribute in the form
$phoneNumber = $_POST['phoneNumber']; // Assuming 'phoneNumber' is the name attribute in the form
$address = $_POST['address'];
$vehicle = $_POST['vehicle'];
$roll = $_POST['roll'];
//$image = $_POST['myfile'];


// Create connection
$conn = new mysqli('localhost', 'root', '', 'project');

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Prepare and bind
$stmt = $conn->prepare("INSERT INTO users(fname, lname, gender, age, dob, email, password, confirmPassword, phoneNumber, address, vehicle, roll) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("sssissssissi", $fname, $lname, $gender, $age, $dob, $email, $password, $confirmPassword, $phoneNumber, $address, $vehicle, $roll);



$stmt->execute();

echo "New records created successfully";

$stmt->close();
$conn->close();
?>
