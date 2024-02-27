<?php
include("../connection.php"); 

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>NourishNet</title>
    <link rel="stylesheet" href="../style/profile.css" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"/>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>
  </head>
  <body>
    <header>
      <div class="logo">
        <img
          src="../img/NourishNel-logo_notext.png"
          alt="Logo"
          style="width: 50px"
          class=""
        />
        Nourish<b style="color: #230eba">Net</b>
      </div>
      <div class="hamburger">
        <div class="line"></div>
        <div class="line"></div>
        <div class="line"></div>
      </div>
      <nav class="nav-bar">
        <ul>
          <li><a href="home.html" style="text-decoration: none">Home</a></li>
          <li>
            <a href="../aboutus.html" style="text-decoration: none">About</a>
          </li>
          <li>
            <a href="../contact.html" style="text-decoration: none">Contact</a>
          </li>
          <li>
            <a href="#profile" class="active" style="text-decoration: none"
              >Profile</a
            >
          </li>
          <!-- <li ><a href="fooddonate.html"  >Donate</a></li> -->
        </ul>
      </nav>
    </header>
    <script>
      hamburger = document.querySelector(".hamburger");
      hamburger.onclick = function () {
        navBar = document.querySelector(".nav-bar");
        navBar.classList.toggle("active");
      };
    </script>



    <div class="profile">
      <div class="profilebox">
        <p class="headingline" style="text-align: left; font-size: 30px">Profile</p>

        <br>
        <div class="info" style="padding-left: 10px">
          <p>Name : Ann Seva</p> 
          <br />
          <p>Email : annseva@gmail.com</p>
          <br />

          <a
            href="../logout.php"
            style="
              float: left;
              margin-top: 6px;
              border-radius: 5px;
              text-decoration: none;
              background-color: #230eba;
              color: white;
              padding-left: 10px;
              padding-right: 10px;
            "
            >Logout</a
          >
        </div>
        <br />
        <br />

        <hr />
        <br />
        <p class="heading">Your donations</p>
        <div class="table-container">
          <div class="table-wrapper">
            <table class="table">
              <thead>
                <tr>
                  <th>Restaurant Name</th>
                  <th>Type</th>
                  <th>Category</th>
                  <th>Quantity</th>
                  <th>Expire Date</th>
                </tr>
              </thead>
              <tbody>
              <?php
        // $email=$_SESSION['email'];
        $query="select * from ngolog where rid='1'";//$email
        $result=mysqli_query($connection, $query);
        if($result==true){
            while($row=mysqli_fetch_assoc($result)){
                echo "
                <tr>
                  <td>".$row['rname']."</td>
                  <td>".$row['type']."</td>
                  <td>".$row['category']."</td>
                  <td>".$row['quantity']."</td>
                  <td>".$row['expiredate']."</td>
                </tr>
               ";
                

             }
          }
       ?> 
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

    <div class="ser">
      <!-- <p class="heading">Our Services</p> -->
    </div>
    <footer class="footer">
      <div class="footer-left col-md-4 col-sm-6">
        <p class="about">
          <span><b> About us </b></span>Our journey began with a realization
          Every day, countless meals go unconsumed in restaurants due to
          overproduction, excess inventory, or changing menus. Meanwhile, there
          are individuals and families struggling to access nutritious meals. So
          we built NourishNet which addresses this disparity by providing a
          seamless platform for restaurants to notify NGOs about surplus food
          availability.
        </p>
      </div>
      <div class="footer-center col-md-4 col-sm-6">
        <div>
          <p>
            <span><b> Contact</b></span>
          </p>
        </div>
        <div>
          <p>(+91) 1234567890</p>
        </div>
        <div>
          <!-- <i class="fa fa-envelope" style="font-size: 17px;
        line-height: 38px; color:white;"></i> -->
          <p><a href="#"> nourishnet@gmail.com</a></p>
        </div>

        <div class="sociallist">
          <ul class="social">
            <li>
              <a href="#"
                ><img src="https://i.ibb.co/x7P24fL/facebook.png"
              /></a>
            </li>
            <li>
              <a href="#"><img src="https://i.ibb.co/Wnxq2Nq/twitter.png" /></a>
            </li>
            <li>
              <a href="#"
                ><img src="https://i.ibb.co/ySwtH4B/instagram.png"
              /></a>
            </li>
            <li>
              <a href="#"
                ><i
                  class="fa fa-whatsapp"
                  style="font-size: 50px; color: black"
                ></i
              ></a>
            </li>
          </ul>
        </div>
      </div>
      <div class="footer-right col-md-4 col-sm-6">
        <h2>
          Nourish<span><b> Net</b></span>
        </h2>
        <!-- <h2>Food donate</h2> -->
        <p class="menu">
          <a href="#"> Home</a> | <a href="aboutus.html"> About</a> |
          <a href="profile.html"> Profile</a> |
          <a href="contact.html"> Contact</a>
        </p>
        <p class="name">Pixel Pioneers &copy 2024</p>
      </div>
    </footer>
  </body>
</html>
