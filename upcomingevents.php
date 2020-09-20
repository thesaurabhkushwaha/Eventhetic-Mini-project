<!DOCTYPE html>
<html lang="en">
<head>
  <title>Main Page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <style>
    button{
      height:70px;
      font-family: tahoma;
    }
    a:hover {
                border: solid 2px darkblue;
                border-radius: 23px;
}
    body {
      background-image: url("carbackblue.png");
      background-size:  cover; 
    }
  </style>
</head>
<body>
<img src="logoue.png" alt=""width="1540" height="150">

<nav class="navbar navbar-expand-sm bg-primary navbar-dark">
  <ul class="navbar-nav"style="padding-left:75px;">
    <li class="nav-item active">
      <a class="nav-link" href="http://localhost:1234/Exhibition/front.php"><b>Home</b></a>
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


<div class="container"><br><br><br>
<!--<h2 style="font-family:arial;color:grey;padding-left: 450px;"><i><b>TECHNICAL</b></i></h2>-->
<button style="font-size: 25px;"type="button" class="btn btn-warning btn-block" data-toggle="collapse" data-target="#tech" >TECH</button>
<div id="tech" class="collapse">
<?php
require_once('../Exhibition/mysqli_connect.php');
 $qry="SELECT `exhibition`.`etitle`, `event`.`evename`, `institution`.`iname`, `institution`.`ilocation`, `exhibition`.`edate`, `event`.`evetime`, `contact`.`contactnumber`
FROM `institution`
     JOIN `exhibition` ON `exhibition`.`icode` = `institution`.`icode`
     JOIN `event` ON `event`.`ecode` = `exhibition`.`ecode`
     JOIN `contact` ON `event`.`ecode` = `contact`.`ecode`
WHERE (`event`.`etype`='Tech');";
 $response = @mysqli_query($dbc, $qry);
 
if($response)
{
 
echo '<table class="table table-condensed table-hover ">
 
<thead><tr>
<td align="center"><b>EXHIBITION NAME</b></td>
<td align="center"><b>EVENT NAME</b></td>
<td align="center"><b>INSTITUTION NAME</b></td>
<td align="center"><b>LOCATION OF EVENT</b></td>
<td align="center"><b>DATE OF EXHIBITION</b></td>
<td align="center"><b>CONTACT</b></td>
<td align="center"><b>TIMING OF EVENT</b></td>
</tr></thead>';

while($row = mysqli_fetch_array($response)){
 
echo '<tr><td align="center">' . 
$row['etitle'] . '</td><td align="left">' .
$row['evename'] . '</td><td align="left">' .
$row['iname'] . '</td><td align="left">' .
$row['ilocation']. '</td><td align="left">' .
$row['edate']. '</td><td align="left">' .
$row['contactnumber']. '</td><td align="center">' .
$row['evetime'] ;
 
echo '</tr>';
}
 
echo '</table>';
} 


else {
 
echo "SEARCH ERROR, PLEASE TRY AGAIN<br />";
 
echo mysqli_error($dbc);
 

}

?>
</div>
</div>

<div class="container">
<button style="font-size: 25px;"type="button" class="btn btn-danger btn-block" data-toggle="collapse" data-target="#work" >WORKSHOPS</button>
<div id="work" class="collapse">
<?php
require_once('../Exhibition/mysqli_connect.php');
 $qry="SELECT `exhibition`.`etitle`, `event`.`evename`, `institution`.`iname`, `institution`.`ilocation`, `exhibition`.`edate`, `event`.`evetime`, `contact`.`contactnumber`
FROM `institution`
     JOIN `exhibition` ON `exhibition`.`icode` = `institution`.`icode`
     JOIN `event` ON `event`.`ecode` = `exhibition`.`ecode`
     JOIN `contact` ON `event`.`ecode` = `contact`.`ecode`
WHERE (`event`.`etype`='Workshop');";
 $response = @mysqli_query($dbc, $qry);
 
if($response)
{
 
echo '<table class="table table-condensed table-hover ">
 
<thead><tr>
<td align="center"><b>EXHIBITION NAME</b></td>
<td align="center"><b>EVENT NAME</b></td>
<td align="center"><b>INSTITUTION NAME</b></td>
<td align="center"><b>LOCATION OF EVENT</b></td>
<td align="center"><b>DATE OF EXHIBITION</b></td>
<td align="center"><b>CONTACT</b></td>
<td align="center"><b>TIMING OF EVENT</b></td>
</tr></thead>';

while($row = mysqli_fetch_array($response)){
 
echo '<tr><td align="center">' . 
$row['etitle'] . '</td><td align="left">' .
$row['evename'] . '</td><td align="left">' .
$row['iname'] . '</td><td align="left">' .
$row['ilocation']. '</td><td align="left">' .
$row['edate']. '</td><td align="left">' .
$row['contactnumber']. '</td><td align="center">' .
$row['evetime'] ;
 
echo '</tr>';
}
 
echo '</table>';
} 


else {
 
echo "SEARCH ERROR, PLEASE TRY AGAIN<br />";
 
echo mysqli_error($dbc);
 

}

?>
</div>
</div>

<div class="container">

<button style="font-size: 25px;"type="button" class="btn btn-dark btn-block" data-toggle="collapse" data-target="#sem" >SEMINARS</button>
<div id="sem" class="collapse">
<?php
require_once('../Exhibition/mysqli_connect.php');
 $qry="SELECT `exhibition`.`etitle`, `event`.`evename`, `institution`.`iname`, `institution`.`ilocation`, `exhibition`.`edate`, `event`.`evetime`, `contact`.`contactnumber`
FROM `institution`
     JOIN `exhibition` ON `exhibition`.`icode` = `institution`.`icode`
     JOIN `event` ON `event`.`ecode` = `exhibition`.`ecode`
     JOIN `contact` ON `event`.`ecode` = `contact`.`ecode`
WHERE (`event`.`etype`='Seminar');";
 $response = @mysqli_query($dbc, $qry);
 
if($response)
{
 
echo '<table class="table table-condensed table-hover ">
 
<thead><tr>
<td align="center"><b>EXHIBITION NAME</b></td>
<td align="center"><b>EVENT NAME</b></td>
<td align="center"><b>INSTITUTION NAME</b></td>
<td align="center"><b>LOCATION OF EVENT</b></td>
<td align="center"><b>DATE OF EXHIBITION</b></td>
<td align="center"><b>CONTACT</b></td>
<td align="center"><b>TIMING OF EVENT</b></td>
</tr></thead>';

while($row = mysqli_fetch_array($response)){
 
echo '<tr><td align="center">' . 
$row['etitle'] . '</td><td align="left">' .
$row['evename'] . '</td><td align="left">' .
$row['iname'] . '</td><td align="left">' .
$row['ilocation']. '</td><td align="left">' .
$row['edate']. '</td><td align="left">' .
$row['contactnumber']. '</td><td align="center">' .
$row['evetime'] ;
 
echo '</tr>';
}
 
echo '</table>';
} 


else {
 
echo "SEARCH ERROR, PLEASE TRY AGAIN<br />";
 
echo mysqli_error($dbc);
 

}

?>
</div>
</div>

<div class="container">
<!--<h2 style="font-family:arial;color:grey;padding-left: 450px;"><i><b>ART</b></i></h2>-->
<button style="font-size: 25px;"type="button" class="btn btn-info btn-block" data-toggle="collapse" data-target="#art" >ART</button>
<div id="art" class="collapse">
<?php
require_once('../Exhibition/mysqli_connect.php');
 $qry="SELECT `exhibition`.`etitle`, `event`.`evename`, `institution`.`iname`, `institution`.`ilocation`, `exhibition`.`edate`, `event`.`evetime`, `contact`.`contactnumber`
FROM `institution`
    INNER JOIN `exhibition` ON `exhibition`.`icode` = `institution`.`icode`
    INNER JOIN `event` ON `event`.`ecode` = `exhibition`.`ecode`
    INNER JOIN `contact` ON `event`.`ecode` = `contact`.`ecode`
WHERE (`event`.`etype`='Art');";
 $response = @mysqli_query($dbc, $qry);
 
if($response)
{
 
echo '<table class="table table-condensed table-hover ">
 
<thead><tr>
<td align="center"><b>EXHIBITION NAME</b></td>
<td align="center"><b>EVENT NAME</b></td>
<td align="center"><b>INSTITUTION NAME</b></td>
<td align="center"><b>LOCATION OF EVENT</b></td>
<td align="center"><b>DATE OF EXHIBITION</b></td>
<td align="center"><b>CONTACT</b></td>
<td align="center"><b>TIMING OF EVENT</b></td>
</tr></thead>';

while($row = mysqli_fetch_array($response)){
 
echo '<tr><td align="center">' . 
$row['etitle'] . '</td><td align="left">' .
$row['evename'] . '</td><td align="left">' .
$row['iname'] . '</td><td align="left">' .
$row['ilocation']. '</td><td align="left">' .
$row['edate']. '</td><td align="left">' .
$row['contactnumber']. '</td><td align="center">' .
$row['evetime'] ;
 
echo '</tr>';
}
 
echo '</table>';
} 


else {
 
echo "SEARCH ERROR, PLEASE TRY AGAIN<br />";
 
echo mysqli_error($dbc);
 

}

?>
</div>
</div>




<br><br><br><br><br><br><br><br><br><br><br><br><br><div style="background-color: lightblue;">
<footer class="page-footer font-small blue">

  <!-- Copyright -->
  <div class="footer-copyright text-center py-3">© 2019 Copyright:
    <a href="http://localhost:1234/Exhibition/front.php"> Eventhetic.com</a>
  </div>
  <!-- Copyright -->

</footer>
</div>
</body>