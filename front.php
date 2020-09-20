<!DOCTYPE html>
<html lang="en">
<head>
  <title>Main Page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <style>
    a:hover {
                border: solid 2px darkblue;
                border-radius: 20px;
          }
    body {
      background-image: url("carbackblue.png");
      background-size:  cover; 
        }
    .carpos{
      padding-right: 880px;
      background-image: url("carbackblue.png");
      background-size:  cover;    
    }
    .carousel{
     height:530px;
     width:800px;
     margin-left: 350px; 
    }
  /* Make the image fully responsive */
  .carousel-inner img {
    width: 100%;
    height: 100%;
  }
  .blak{ color:black; }
  </style>
</head>
<body>
<img src="logoue.png" alt=""width="1540" height="150">
<nav class="navbar navbar-expand-sm bg-primary navbar-dark">
  <ul class="navbar-nav"style="padding-left:75px;">
    <li class="nav-item active">
      <a class="nav-link" href=""><b>Home</b></a>
    </li>
    
    <li class="nav-item active">
      <a class="nav-link " href="http://localhost:1234/Exhibition/upcomingevents.php"><b>Explore</b></a>
    </li>

    <li class="nav-item active">
      <a class="nav-link" href="http://localhost:1234/Exhibition/aboutus.php" ><b>About Us</b></a>
    </li>

    <li class="nav-item active">
      <a class="nav-link" href="http://localhost:1234/Exhibition/contactus.php" ><b>Contact Us</b></a>
    </li>

    <li class="nav-item active"style="padding-left:950px;">
      <a class="nav-link" href="http://localhost:1234/Exhibition/adminlogin.php"><b>Admin login</b></a>
    </li>
  </ul>
</nav>
<div class="carpos">
<div id="demo" class="carousel slide" data-ride="carousel">
  <ul class="carousel-indicators">
    <li data-target="#demo" data-slide-to="0" class="active"></li>
    <li data-target="#demo" data-slide-to="1"></li>
    <li data-target="#demo" data-slide-to="2"></li>
    <li data-target="#demo" data-slide-to="3"></li>
    <li data-target="#demo" data-slide-to="4"></li>
    <li data-target="#demo" data-slide-to="5"></li>
  </ul>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="bubbles.jpg" alt=""width="1100" height="500">
      <div class="carousel-caption">
        <h3></h3>
        <p></p>
      </div>   
    </div>
    <div class="carousel-item ">
      <img src="artexh.jpg" alt=""width="1100" height="500">
      <div class="carousel-caption">
        <h3>Art</h3>
        <p></p>
      </div>   
    </div>
    <div class="carousel-item">
      <img src="concert.jpg" alt=""width="1100" height="500">
      <div class="carousel-caption">
        <h3>Fests</h3>
        <p></p>
      </div>   
    </div>
    <div class="carousel-item">
      <img src="tech.jpg" alt=""width="1100" height="500">
      <div class="carousel-caption">
        <h3>Technology</h3>
        <p></p>
      </div>   
    </div>
    <div class="carousel-item">
      <img src="workshop.jpg" alt=""width="1100" height="500">
      <div class="carousel-caption">
        <h3 class="blak">Workshops</h3>
        <p></p>
      </div>   
    </div>
    <div class="carousel-item">
      <img src="lecture.jpg" alt=""width="1100" height="500">
      <div class="carousel-caption">
        <h3 class="blak">Seminars</h3>
        <h4 class= "blak">(and much more...)</h4>
        <p></p>
      </div>   
    </div>
  </div>
</div>
</div>
<div style="background-color: lightblue;">
<footer class="page-footer font-small blue">
  <!-- Copyright -->
  <div class="footer-copyright text-center py-3">© 2019 Copyright:
    <a href="http://localhost:1234/Exhibition/front.php"> Eventhetic.com</a>
  </div>
  <!-- Copyright -->
</footer>
</div>
</body>
</html>
