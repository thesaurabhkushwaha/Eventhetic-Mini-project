<!DOCTYPE html>
<html lang="en">
<head>
  <title>Database UI</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  
    
<style type="text/css">
        body {
          background-image:url("lightestblue.png");
             background-size:  cover;
             

        }
        a:hover {
                border: solid 2px darkblue;
                border-radius: 20px;
}

        .myButton {
                   width: 150px;
                  }
        .butspace{
        	padding-left: 300px;
        }          
      </style>
  </style>
</head>
<body>
<img src="logoue.png" alt=""width="1540" height="150">

<nav class="navbar navbar-expand-sm bg-info navbar-dark">
  <ul class="navbar-nav" style="padding-left:75px;">
    
    
    <li class="nav-item active">
<a class="nav-link " href="http://localhost:1234/Exhibition/instab.php"><b>Institutions</b></a>    </li>

    <li class="nav-item active">
      <a class="nav-link" href="http://localhost:1234/Exhibition/exhitab.php" ><b>Exhibitions</b></a>
    </li>

    <li class="nav-item active">
      <a class="nav-link" href="http://localhost:1234/Exhibition/eventstab.php" ><b>Events</b></a>
    </li>

    <li class="nav-item active">
      <a class="nav-link" href="http://localhost:1234/Exhibition/contacttab.php" ><b>Contacts</b></a>
    </li>

    <li class="nav-item active">
      <a class="nav-link" href="http://localhost:1234/Exhibition/sponsortab.php" ><b>Sponsors</b></a>
    </li>

    <li class="nav-item active" style="padding-left:900px;">
      <a class="nav-link" href="http://localhost:1234/Exhibition/front.php"><b>Home</b></a>
    </li>
  </ul>
</nav>






<?php
if(isset($_POST["upspon"]))
    {
     $dbc = @mysqli_connect("localhost", "studentweb", "hoihoi", "exhibition");
     
     $aname=$_POST['name'];
     $icode=$_POST['id'];
     $value=$_POST['uvalue'];
     
     
     $qry="UPDATE sponsor set $aname='$value' where sid='$icode'  ";
     $result=mysqli_query($dbc,$qry);
     if($result)
     {
       echo'<script type="text/javascript">
                  alert("SPONSOR UPDATED SUCCESSFULLY"); 
                  </script>';
     }   
     else 
     {
       echo'<script type="text/javascript">
                  alert("UPDATE ERROR !!!"); 
                  </script>';
     }
mysqli_close($dbc);
    }
    




    if(isset($_POST["delspon"]))
    {
    $dbc = @mysqli_connect("localhost", "studentweb", "hoihoi", "exhibition");

     $icode=$_POST['icode'];
     $qry="delete from sponsor where sid='$icode'  ";
     $result=mysqli_query($dbc,$qry);
     if($result)
     {
       echo'<script type="text/javascript">
                  alert("SPONSOR REMOVED !!")
                  </script>';
         }         
     else 
     {
       echo"Deletion error  !";
     }
mysqli_close($dbc);
    }



    if(isset($_POST["regspon"]))
    {
    $dbc = @mysqli_connect("localhost", "studentweb", "hoihoi", "exhibition");

     $sid=$_POST['sid'];
     $sname=$_POST['sname'];
     $evecode=$_POST['evecode'];

      $query = "INSERT INTO sponsor (sid, sname, evecode) VALUES (?, ?, ?)";
        
        $stmt = mysqli_prepare($dbc, $query);
        
        mysqli_stmt_bind_param($stmt, "isi", $sid, $sname, $evecode);
        
        mysqli_stmt_execute($stmt);
        
        $affected_rows = mysqli_stmt_affected_rows($stmt);
        
        if($affected_rows == 1){
            
            echo '<script type="text/javascript">
                  alert("SPONSOR ADDED SUCCESSFULLY"); 
                  </script>';
            
            mysqli_stmt_close($stmt);
            
            mysqli_close($dbc);
            
        } else {
            
            echo 'Error Occurred<br />';
            echo mysqli_error($dbc);
            
            mysqli_stmt_close($stmt);
            
            mysqli_close($dbc);
    }
  }




require_once('../Exhibition/mysqli_connect.php');
 $query = "SELECT * FROM sponsor";
 $response = @mysqli_query($dbc, $query);
 if($response){
 echo '<div class="container">
          <table class="table table-condensed table-hover ">
            <thead class="thead-dark"><tr>
            <td align="center"><b>SPONSOR ID</b></td>
            <td align="center"><b>NAME (sname)</b></td>
            <td align="center"><b>EVENT SPONSORED (evecode)</b></td>
            </tr></thead>';

while($row = mysqli_fetch_array($response)){
 
echo '<tr><td align="center">' . 
$row['sid'] . '</td><td align="center">' .
$row['sname'] . '</td><td align="center">' .
$row['evecode'] . '</td><td align="center">';
 
echo '</tr></div>';
}
 
echo '</table></div>';


 
} else {
 
echo "Couldn't issue database query<br />";
 
echo mysqli_error($dbc);
 
}
?>
<div class="container">
  
  <!-- Trigger the modal with a button -->
  <div class="butspace">
    <button type="button" class="btn btn-success btn-lg myButton" data-toggle="modal" data-target="#addspon">Add</button>
    <button type="button" class="btn btn-warning btn-lg myButton" data-toggle="modal" data-target="#upspon">Update</button><brr>
    <button type="button" class="btn btn-danger btn-lg myButton" data-toggle="modal" data-target="#delspon">Delete</button>
</div>

<!-- Modal Add-->
  <div class="modal fade" id="addspon" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
        	<h4 class="modal-title">Add new sponsor</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          
        </div>
        <div class="modal-body">
          <form method="POST">
    <div class="form-group">
      <label >Enter Sponsor ID:</label>
      <input type="text" class="form-control" id="sid" placeholder="" name="sid" required>

      <label >Enter Sponsor name:</label>
      <input type="text" class="form-control" id="sname" placeholder="" name="sname" required>

      <label >Enter the ID of event sponsored:</label>
      <input type="text" class="form-control" id="evecode" placeholder="" name="evecode" required>
      
    </div>
   
    <input type="submit" name="regspon" value="Register" class="btn btn-primary"/>
  </form>
        </div>
       <!-- <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>-->
      </div>
      
    </div>
  </div>




  <!-- Modal Update-->
  <div class="modal fade" id="upspon" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
        	<h4 class="modal-title">Update sponsor</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          
        </div>
        <div class="modal-body">
          <form method="POST">
    <div class="form-group">
      <label >Enter field to update:</label>
      <input type="text" class="form-control" id="sid" placeholder="" name="name" required>

      <label >Enter Sponsor ID:</label>
      <input type="text" class="form-control" id="sname" placeholder="" name="id" required>

      <label >Enter the updated value:</label>
      <input type="text" class="form-control" id="evecode" placeholder="" name="uvalue" required>
      
    </div>
   
    <input type="submit" name="upspon" value="Update" class="btn btn-primary"/>
  </form>
        </div>
        
      </div>
      
    </div>
  </div>
  


  <!-- Modal Delete-->
  <div class="modal fade" id="delspon" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
        	<h4 class="modal-title">Remove a sponsor</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          
        </div>
        <div class="modal-body">
          <form method="POST">
    <div class="form-group">
      <label >Enter Sponsor ID:</label>
      <input type="text" class="form-control" id="uname" placeholder="SID" name="icode" required>
      
    </div>
   
    <input type="submit" name="delspon" value="delete" class="btn btn-primary"/>
  </form>
        </div>
        
      </div>
      
    </div>
  </div>
  
</div>