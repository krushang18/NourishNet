<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NourishNet</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">



</head>
<body>

<?php
// Database connection parameters
include("connection.php"); 

// Create connection
$conn = $connection;

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve form data
$name = $_POST["name"];
$email = $_POST["email"];
$feedback = $_POST["message"];

// Prepare SQL statement to insert data into the database
$sql = "INSERT INTO feedback (name, email, message) VALUES ('$name', '$email', '$feedback')";

?>

<?php
if ($conn->query($sql) === TRUE) { ?>
    <p class="heading" style=" color: #230EBA;
        font-size: 48px;
        text-align: center;
        align-items: center; 
        text-decoration-color: none;">Thank you for contacting us we will soon get back to you</p>

    <div class="button" style="width: 100%; position: relative;">
        <a href="home.html">
        <button type="button" class="btn btn-outline-primary" style="margin-left: 48%;">Go to Home</button></a>
    </div>

<?php
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>

</body>
</html>
