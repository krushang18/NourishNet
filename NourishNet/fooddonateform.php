<?php
include("login.php"); 
if($_SESSION['name']==''){
	header("location: login/signin.php");
}
// include("login.php"); 
$emailid= $_SESSION['email'];
$connection=mysqli_connect("localhost:3306","root","");
$db=mysqli_select_db($connection,'demo');
if(isset($_POST['submit']))
{
    $foodname=mysqli_real_escape_string($connection, $_POST['foodname']);
    $meal=mysqli_real_escape_string($connection, $_POST['meal']);
    $category=$_POST['image-choice'];
    $quantity=mysqli_real_escape_string($connection, $_POST['quantity']);
    $expiredate=$_POST['expiredate'];

    $sql = "select id from login where email = '$emailid'";
    $rid = mysqli_query($connection, $sql);

    $sql = "select username from login where email = '$emailid'";
    $name = mysqli_query($connection, $sql);

    date_default_timezone_set("Asia/Kolkata");
    $date = date("d-m-Y H:i:sa");

    $query="insert into restaurantlog(food_name,rid,type,category,quantity,date,expiredate,rname) values($foodname, $rid, $meal, $category, $quantity, $date, $expiredate,$name)";
    $query_run= mysqli_query($connection, $query);
    if($query_run)
    {

        echo '<script type="text/javascript">alert("data saved")</script>';
        header("location:profile.php");
    }
    else{
        echo '<script type="text/javascript">alert("data not saved")</script>';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NourishNet</title>
    <link rel="stylesheet" href="style/loginstyle.css">
</head>
<body style="    background-color: #06C167;">
    <div class="container">
        <div class="regformf" >
    <form action="" method="post">
        <p class="logo"><b style="color: #230EBA; ">NourishNet</b></p>
        
       <div class="input">
        <label for="foodname"  > Food Name:</label>
        <input type="text" id="foodname" name="foodname" required/>
        </div>
      
      
        <div class="radio">
        <label for="meal" >Meal type :</label> 
        <br><br>

        <input type="radio" name="meal" id="veg" value="veg" required/>
        <label for="veg" style="padding-right: 40px;">Veg</label>
        <input type="radio" name="meal" id="Non-veg" value="Non-veg" >
        <label for="Non-veg">Non-veg</label>
    
        </div>
        <br>
        <div class="input">
        <label for="food">Select the Category:</label>
        <br><br>
        <div class="image-radio-group">
            <input type="radio" id="raw-food" name="image-choice" value="raw-food">
            <label for="raw-food">
              <img src="img/raw-food.png" alt="raw-food" >
            </label>
            <input type="radio" id="cooked-food" name="image-choice" value="cooked-food"checked>
            <label for="cooked-food">
              <img src="img/cooked-food.png" alt="cooked-food" >
            </label>
            <input type="radio" id="packed-food" name="image-choice" value="packed-food">
            <label for="packed-food">
              <img src="img/packed-food.png" alt="packed-food" >
            </label>
          </div>
          <br>
        <!-- <input type="text" id="food" name="food"> -->
        </div>
        <div class="input">
        <label for="quantity">Quantity:(i.e. in gram, kg etc.)</label>
        <input type="text" id="quantity" name="quantity" required/>

        <label for="phoneno" >Expire Date:</label>
        <input type="date" id="expiredate" name="expiredate" maxlength="10" required />

        </div>

        <div class="btn">
            <button type="submit" name="submit"> submit</button
     
        </div>
     </form>
     </div>
   </div>
     
    
</body>
</html>