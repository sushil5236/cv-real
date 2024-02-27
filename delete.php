<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cv";

$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if (isset($_GET['id'])) {
    $userId = $_GET['id'];

 
    $sql = "DELETE FROM users WHERE id = ?";

   
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $userId);

   
    if ($stmt->execute()) {
       
        echo "Record deleted successfully";
    } else {
     
        echo "Error deleting record: " . $conn->error;
    }

   
    $stmt->close();
} else {
    
    echo "No user ID specified for deletion";
}


$conn->close();
?>
