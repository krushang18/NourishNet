<?php
session_start();
include "../connection.php";

$msg = 0;

if(isset($_POST['sign'])) {

    $email = mysqli_real_escape_string($connection, $_POST['email']);
    $password = $_POST['password']; // Plain text password

    $sql = "select * from admin where email = '$email'";
    $result = mysqli_query($connection, $sql);
    $num = mysqli_num_rows($result);

    if ($num == 1) {
        $row = mysqli_fetch_assoc($result);
        $hashed_password = $row['Password'];
        if (password_verify($password, $hashed_password)) {
            $_SESSION['email'] = $email;
            $_SESSION['name'] = $row['Name'];
            $_SESSION['mobileno'] = $row['Mobile_No'];
            header("location:admin.php");
        } else {
            $msg = 1;
            echo "Invalid password";
        }
    } else {
        echo "<h1><center>Account does not exist</center></h1>";
    }
}
?>





<DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../loginstyle.css">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    
</head>
<body style="background-color:#230EBA;">

    <div class="container">
    <div class="regform">
       
        <form action=" " method="post">
            <p class="logo"><b style="color: #230EBA;">NourishNet</b></p>
            
            <p id="heading">Create your account</p>
            
            <div class="input">
                <label class="textlabel" for="name">User name</label><br>
                
                <input type="text" id="name" name="name" required/>
             </div>
             <div class="input">
                <label class="textlabel" for="email">Email</label>
                <input type="email" id="email" name="email" required/>

                <label class="textlabel" for="phoneno">Mobile No.</label>
                <input type="text" id="mobileno" name="mobileno" >

             </div>
             <label class="textlabel" for="password">Password</label>
             <div class="password">
              
                <input type="password" name="password" id="password" required/>
                <!-- <i class="fa fa-eye-slash" aria-hidden="true" id="showpassword"></i> -->
                <!-- <i class="bi bi-eye-slash" id="showpassword"></i>  -->
                <!-- <i class="uil uil-lock icon"></i> -->
                <i class="uil uil-eye-slash showHidePw" id="showpassword"></i>                
			
             </div>
             
             <div class="btn">
                <button type="submit" name="sign">Continue</button>
             </div>
            
           <!-- <button type="submit" style="background-color:white ;color: #000; margin-top:5px;  padding: 10px 25px;">
                 <img src="google.svg" style="width:22px" >
                 Continue With  Google </button>  -->
                
            <div class="signin-up">
                 <p style="font-size: 20px; text-align: center;">Already have an account? <a href="signin.php"> Sign in</a></p>
             </div>
         

        </form>
        </div>
        <!-- <div class="right">
            <img src="cover.jpg" alt="" width="800" height="700">
        </div> -->
       
    </div>
       
</body>
</html>