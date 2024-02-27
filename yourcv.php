<!DOCTYPE html>
<html lang="en">
<head>
    <title>CV</title>
    <style>
        /* Body styles */
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            color: #333;
            margin: 0;
            padding: 0;
        }

        /* Container styles */
        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        /* CV heading styles */
        h2 {
            font-size: 24px;
            margin-bottom: 20px;
            text-align: center;
        }

        /* CV item styles */
        p {
            font-size: 16px;
            line-height: 1.6;
            margin-bottom: 10px;
        }

        /* Label styles */
        p strong {
            display: inline-block;
            width: 150px;
            font-weight: bold;
        }

        /* Value styles */
        p span {
            display: inline-block;
        }

        /* Button styles */
        .button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 4px;
            transition: background-color 0.3s;
            cursor: pointer;
        }

        .button:hover {
            background-color: #0056b3;
        }

    </style>
</head>
<body>
    <div class="container">
    <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "cv"; 
        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT * FROM users ORDER BY id DESC LIMIT 1"; 
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
           
            echo "<h2>CV</h2>";
            echo "<p>Name:           " . $row['name'] . "</p>";
            echo "<p>Gender:         " . $row['gender'] . "</p>";
            echo "<p>Date of Birth:  " . $row['dob'] . "</p>";
            echo "<p>Email:          " . $row['email'] . "</p>";
            echo "<p>Age:            " . $row['age'] . "</p>";
            echo "<p>Father's Name:  " . $row['father'] . "</p>";
            echo "<p>Mother's Name:  " . $row['mother'] . "</p>";
            echo "<p>Address:        " . $row['address'] . "</p>";
            echo "<p>Phone Number:   " . $row['phone'] . "</p>";
            echo "<p>Marital Status: " . $row['status'] . "</p>";
         
            echo "<a href='edit.php?id=" . $row['id'] . "' class='button edit-button'>Edit</a>";
            echo "<button class='button delete-button' data-id='" . $row['id'] . "'>Delete</button>";
         
        } else {
            echo "No data found";
        }
        $conn->close();
        ?>>
    </div>
    <script>
       document.querySelectorAll('.delete-button').forEach(button => {
            button.addEventListener('click', function () {
                const userId = this.getAttribute('data-id');
              
                if (confirm("Are you sure you want to delete this record?")) {
                    fetch('delete.php?id=' + userId, {
                        method: 'DELETE',
                    })
                    .then(response => {
                        if (response.ok) {
                            const container = this.closest('.container');
                            container.remove();
                        } else {
                           
                            console.error('Error deleting record');
                        }
                    })
                    .catch(error => {
                        console.error('Error deleting record:', error);
                    });
                }
            });
        });
        
    </script>
</body>
</html>
