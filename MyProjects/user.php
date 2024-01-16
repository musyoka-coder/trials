<!DOCTYPE html>
<html>
<head>
    <title>User Input</title>

    
</head>
<body style="text-align: center;"  m>
    <h1 style="background-color: burlywood;">Book Here</h1>
    <form action="" method="post" style="background-color: bisque;">
        <label style="border-radius: 10px;">FirstName:</label>
        <input type="text" name="FirstName:" placeholder="nicholus" required><br>
        <labelstyle="border-radius: 10px;">LastName</label> 
        <input type="text" name="LastName:" placeholder="musyoka" required><br>
        <labestyle="border-radius: 10px;"l>email:</label> 
        <input type="email" name="email:" placeholder="ssjsjsjdj@gmail.com" required><br>
        <label style="border-radius: 10px;">phone:</label>
        <input type="tel" name="Phone" placeholder="0712345678" required><br>
        <input type="Submit" value="Register" > <br>
    </form>
</body>
</html>

    <?php
    include 'dbconnect.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $FirstName = $_POST["FirstName"];
        $LastName = $_POST["LastName"];
        $email = $_POST["email"];
        $phone = $_POST["Phone"];

        // Check if the user with this email already exists
        $sql = "SELECT * FROM reservations WHERE Email='$email'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            echo "You have already booked.";
        } else {
            // If the user does not exist, create a new record
            $sql2 = "INSERT INTO reservations (FirstName, LastName, Email, Phone) VALUES ('$FirstName','$LastName','$email','$phone')";
            // Execute the SQL statement and check if it was successful
            if ($conn->query($sql2) === TRUE) {
                echo "Booking Successful! <a href='homepage.php'>Go back to the homepage</a>";
            } else {
                echo "Error: " . $sql2 . "<br>" . $conn->error;
            }
        }
        mysqli_close($conn);
    }
    ?>


