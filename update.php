<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cv";


$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
 
    $id = $_POST['id'];
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $dob = $_POST['dob'];
    $email = $_POST['email'];
    $age = $_POST['age'];
    $father = $_POST['father'];
    $mother = $_POST['mother'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $status = $_POST['status'];

  
    $sql = "UPDATE users SET name='$name', gender='$gender', dob='$dob', email='$email', age='$age', father='$father', mother='$mother', address='$address', phone='$phone', status='$status' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
      
        header('Location: yourcv.php');
        exit;
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

$conn->close();
?>
