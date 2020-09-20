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
  <ul class="navbar-nav"style="padding-left:75px;">
    
    
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

    <li class="nav-item active"style="padding-left:900px;">
      <a class="nav-link" href="http://localhost:1234/Exhibition/front.php"><b>Home</b></a>
    </li>
  </ul>
</nav>


<?php
if(isset($_POST["upexh"]))
    {
     $dbc = @mysqli_connect("localhost", "studentweb", "hoihoi", "exhibition");
     
     $aname=$_POST['name'];
     $icode=$_POST['id'];
     $value=$_POST['uvalue'];
     
     
     $qry="UPDATE exhibition set $aname='$value' where ecode='$icode'  ";
     $result=mysqli_query($dbc,$qry);
     if($result)
     {
       echo'<script type="text/javascript">
                  alert("EXHIBITION UPDATED SUCCESSFULLY"); 
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
    




    if(isset($_POST["delexh"]))
    {
    $dbc = @mysqli_connect("localhost", "studentweb", "hoihoi", "exhibition");

     $icode=$_POST['icode'];
     $qry="delete from exhibition where ecode='$icode'  ";
     $result=mysqli_query($dbc,$qry);
     if($result)
     {
       echo'<script type="text/javascript">
                  alert("EXHIBITION REMOVED !!")
                  </script>';
         }         
     else 
     {
       echo'<script type="text/javascript">
                  alert("DELETION ERROR !!")
                  </script>';
     }
mysqli_close($dbc);
    }



    if(isset($_POST["regexh"]))
    {
    $dbc = @mysqli_connect("localhost", "studentweb", "hoihoi", "exhibition");

     $eid=$_POST['eid'];
     $icode=$_POST['icode'];
     $ename=$_POST['ename'];
     $edate=$_POST['edate'];

      $query = "INSERT INTO exhibition (ecode, icode, etitle, edate) VALUES (?, ?, ?, ?)";
        
        $stmt = mysqli_prepare($dbc, $query);
        
        mysqli_stmt_bind_param($stmt, "iiss", $eid, $icode, $ename, $edate);
        
        mysqli_stmt_execute($stmt);
        
        $affected_rows = mysqli_stmt_affected_rows($stmt);
        
        if($affected_rows == 1){
            
            echo '<script type="text/javascript">
                  alert("EXHIBITION ADDED SUCCESSFULLY"); 
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
 $query = "SELECT * FROM exhibition";
 $response = @mysqli_query($dbc, $query);
 if($response){
 echo '<div class="container">
          <table class="table table-condensed table-hover ">
            <thead class="thead-dark"><tr>
            <td align="center"><b>EXHIBITION ID (ecode)</b></td>
            <td align="center"><b>INSTITUTION CODE (icode)</b></td>
            <td align="center"><b>EXHIBITION NAME (etitle)</b></td>
            <td align="center"><b>EXHIBITION DATE (edate)</b></td>
            </tr></thead>';

while($row = mysqli_fetch_array($response)){
 
echo '<tr><td align="center">' . 
$row['ecode'] . '</td><td align="center">' .
$row['icode'] . '</td><td align="center">' .
$row['etitle'] . '</td><td align="center">' .
$row['edate'] . '</td><td align="center">';
 
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
    <button type="button" class="btn btn-success btn-lg myButton" data-toggle="modal" data-target="#addexh">Add</button>
    <button type="button" class="btn btn-warning btn-lg myButton" data-toggle="modal" data-target="#upexh">Update</button><brr>
    <button type="button" class="btn btn-danger btn-lg myButton" data-toggle="modal" data-target="#delexh">Delete</button>
</div>

<!-- Modal Add-->
  <div class="modal fade" id="addexh" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Add new exhibition</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <form method="POST">
    <div class="form-group">
      <label >Enter Exhibition ID :</label>
      <input type="text" class="form-control" id="sid" placeholder="" name="eid" required>

      <label >Enter Institution ID :</label>
      <input type="text" class="form-control" id="sname" placeholder="" name="icode" required>

      <label >Enter Exhibition name :</label>
      <input type="text" class="form-control" id="evecode" placeholder="" name="ename" required>

      <label >Enter Date (YYYY/MM/DD) :</label>
      <input type="text" class="form-control" id="evecode" placeholder="" name="edate" required>
      
    </div>
   
    <input type="submit" name="regexh" value="Register" class="btn btn-primary"/>
  </form>
        </div>
       <!-- <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>-->
      </div>
      
    </div>
  </div>




  <!-- Modal Update-->
  <div class="modal fade" id="upexh" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Update exhibition</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          
        </div>
        <div class="modal-body">
          <form method="POST">
    <div class="form-group">
      <label >Enter field to update:</label>
      <input type="text" class="form-control" id="sid" placeholder="" name="name" required>

      <label >Enter Exhibition ID:</label>
      <input type="text" class="form-control" id="sname" placeholder="" name="id" required>

      <label >Enter the updated value:</label>
      <input type="text" class="form-control" id="evecode" placeholder="" name="uvalue" required>
      
    </div>
   
    <input type="submit" name="upexh" value="Update" class="btn btn-primary"/>
  </form>
        </div>
        
      </div>
      
    </div>
  </div>
  


  <!-- Modal Delete-->
  <div class="modal fade" id="delexh" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Remove an exhibition</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          
        </div>
        <div class="modal-body">
          <form method="POST">
    <div class="form-group">
      <label >Enter Exhibition ID to delete :</label>
      <input type="text" class="form-control" id="uname" placeholder="ECODE" name="icode" required>
      
    </div>
   
    <input type="submit" name="delexh" value="delete" class="btn btn-primary"/>
  </form>
        </div>
        
      </div>
      
    </div>
  </div>
  
</div>
