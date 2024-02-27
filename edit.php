<!DOCTYPE html>
<html lang="en">
<head>
    <title>Edit CV</title>
    <style>
     
        body {
            font-family: Arial, sans-serif;
            background-color: black;
            color: #333;
            margin: 0 25%;
            padding: 0;
            text-align: center;
            border: 5%;
        }
        label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
            color: white;
        }
        input[type="text"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: all 0.5s;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
            border-radius: 10px;
            transform: translateY(-8px);
        }
        h2{
            color:white;
        }
    </style>
</head>
<body>
    <h2>Edit CV</h2> <hr>
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

     
        $sql = "SELECT * FROM users WHERE id = $userId";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            
            ?>
            <form action="update.php" method="post">
                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                <label for="name">Name:</label>
                <input type="text" name="name" value="<?php echo $row['name']; ?>"><br>
                <label for="gender">Gender:</label>
                <input type="text" name="gender" value="<?php echo $row['gender']; ?>"><br>
                <label for="dob">Date of Birth (BS):</label>
                <input type="text" name="dob" value="<?php echo $row['dob']; ?>"><br>
                <label for="email">Email:</label>
                <input type="text" name="email" value="<?php echo $row['email']; ?>"><br>
                <label for="age">Age:</label>
                <input type="text" name="age" value="<?php echo $row['age']; ?>"><br>
                <label for="father">Father's Name:</label>
                <input type="text" name="father" value="<?php echo $row['father']; ?>"><br>
                <label for="mother">Mother's Name:</label>
                <input type="text" name="mother" value="<?php echo $row['mother']; ?>"><br>
                <label for="address">Address:</label>
                <input type="text" name="address" value="<?php echo $row['address']; ?>"><br>
                <label for="phone">Phone Number:</label>
                <input type="text" name="phone" value="<?php echo $row['phone']; ?>"><br>
                <label for="status">Marital Status:</label>
                <input type="text" name="status" value="<?php echo $row['status']; ?>"><br><hr>
                <a href="update.php" method="post"> 
                    <input type="submit" value="Save Changes"><br><br>
                </a>
            </form>
            </form>
            <?php
        } else {
            echo "User not found";
        }
    } else {
        echo "User ID not provided";
    }
    $conn->close();
    ?>
</body>
</html>
