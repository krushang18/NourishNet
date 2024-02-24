<?php
include '../connection.php';
if(isset($_POST['sign']))
{
    $msg=0;
    $email=$_POST['email'];
    $password=$_POST['password']; // Plain text password

    $sql="select * from admin where email='$email'" ;
    $result= mysqli_query($connection, $sql);
    $num=mysqli_num_rows($result);
    if($num==1){
        echo "<h1><center>Account already exists</center></h1>";
    } else {
        // Hash the password before storing
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $query="insert into admin(Name, Email, Password) values('$username','$email','$hashed_password')";
        $query_run= mysqli_query($connection, $query);
        if($query_run) {
            header("location:signin.php");
        } else {
            $msg=1;
            echo '<script type="text/javascript">alert("data not saved")</script>';
        }
    }
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../loginstyle.css">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />

    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

</head>

<body>
    <style>
    .uil {

        top: 42%;
    }
    </style>
    <div class="container">
        <div class="regform">

            <form action=" " method="post">

                <p class="logo" style=""><b style="color:#230EBA; ">NourishNet</b></p>
                <p id="heading" style="padding-left: 1px;"> Welcome back ! <img src="" alt=""> </p>

                <div class="input">
                    <input type="email" placeholder="Email address" name="email" value="" required />
                </div>
                <div class="password">
                    <input type="password" placeholder="Password" name="password" id="password" required />

                    <!-- <i class="fa fa-eye-slash" aria-hidden="true" id="showpassword"></i> -->
                    <!--<i class="bi bi-eye-slash" id="showpassword"></i>-->
                    <i class="uil uil-eye-slash showHidePw"></i>
                    <!-- <p class="error">Password don't match.</p> -->
                    <?php
                    if($msg==1){
                        echo ' <i class="bx bx-error-circle error-icon"></i>';
                        echo '<p class="error">Password not match.</p>';
                    }
                    ?>
                
                </div>


                <div class="btn">
                    <button type="submit" name="sign"> Sign in</button>
                </div>
                
                <div class="signin-up">
                    <p id="signin-up">Don't have an account? <a href="signup.php">Register</a></p>
                </div>
            </form>
        </div>


    </div>
</body>

</html>