<!DOCTYPE html>
<html>
<head>
    <title>NGO Food Pickup</title>
    <link rel="stylesheet" href="../style/ngo.css">
    <style>
        .message {
            background-color: #f0f0f0;
            padding: 10px;
            border: 1px solid #ccc;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <h1>NGO Food Pickup</h1>
    <?php
    // Database connection
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "nourishnet";

    $conn = new mysqli($servername, $username, $password, $dbname);

    $food_name;
    $type;
    $category;
    $expiredate;
    $fid;
    $rid;
    $quantity;
    date_default_timezone_set("Asia/Kolkata");
    $date = date("d-m-Y H:i:sa");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["restaurant_id"])) {
        // Handling pickup
        $restaurant_id = $_POST["restaurant_id"];
    
        // Get restaurant details
        $sql_select = "SELECT * FROM restaurantlog WHERE rid = $restaurant_id AND status = 'available'";
        $result_select = $conn->query($sql_select);

        $name = $_SESSION("username");

        if ($result_select->num_rows > 0) {
            $row = $result_select->fetch_assoc();
            $restaurant_name = $row["rname"];
            $food_name = $row["food_name"];
            $type = $row["type"];
            $category = $row["category"];
            $expiredate = $row["expiredate"];
            $fid = $row["fid"];
            $rid = $row["rid"];
            $quantity = $row["quantity"];

            // Insert into ngolog
            $sql_insert = "INSERT INTO ngolog (name, type, category, expiredate, fid, rid, quantity, date, ngo_name) VALUES ('$food_name', '$type', '$category', '$expiredate', '$fid', '$rid', '$quantity', '$date', '$name')";
            if ($conn->query($sql_insert) === TRUE) {
                // Update restaurantlog status to 'taken'
                $sql_update = "UPDATE restaurantlog SET status='taken' WHERE fid='$fid'";
                if ($conn->query($sql_update) === TRUE) {
                    echo "<div class='message'>You have successfully picked up food!</div>";
                } else {
                    echo "Error updating status: " . $conn->error;
                }
            } else {
                echo "Error: " . $sql_insert . "<br>" . $conn->error;
            }

            // Redirect back to the same page after processing
            header("Location: ".$_SERVER['PHP_SELF']);
            exit();
        }
    }

    // Fetch all restaurants
    $sql = "SELECT fid, food_name, rid, type, category, quantity, expiredate FROM restaurantlog WHERE status = 'available'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Display each restaurant's information
        while($row = $result->fetch_assoc()) {
            $fid = $row["fid"];
            $food_name = $row["food_name"];
            $type = $row["type"];
            $category = $row["category"];
            $expiredate = $row["expiredate"];
            $rid = $row["rid"];
            $quantity = $row["quantity"];

            echo "<p><strong>Address:</strong> </p>";
            echo "<p><strong>Food Available:</strong><br>" . $row["food_name"] . "</p>";
            echo "<p><strong>Food type:</strong><br>" . $row["type"] . "</p>";
            echo "<p><strong>Food Category:</strong><br>" . $row["category"] . "</p>";
            echo "<p><strong>Food Quantity:</strong><br>" . $row["quantity"] . "</p>";
            echo "<p><strong>Food Expire Date:</strong><br>" . $row["expiredate"] . "</p>";
            echo "<form method='post' action=''>";
            echo "<input type='hidden' name='restaurant_id' value='" . $row["rid"] . "'>";
            echo "<input type='submit' value='Pick Up Food'>";
            echo "</form>";
            echo "<hr>";
        }
    } else {
        echo "No restaurants found.";
    }

    $conn->close();
    ?>
</body>
</html>
