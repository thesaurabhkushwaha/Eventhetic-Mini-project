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
if(isset($_POST["upins"]))
    {
     $dbc = @mysqli_connect("localhost", "studentweb", "hoihoi", "exhibition");
     
     $aname=$_POST['name'];
     $icode=$_POST['id'];
     $value=$_POST['uvalue'];
     
     
     $qry="UPDATE institution set $aname='$value' where icode='$icode'  ";
     $result=mysqli_query($dbc,$qry);
     if($result)
     {
       echo'<script type="text/javascript">
                  alert("INSTITUTION UPDATED SUCCESSFULLY"); 
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
    




    if(isset($_POST["delins"]))
    {
    $dbc = @mysqli_connect("localhost", "studentweb", "hoihoi", "exhibition");

     $icode=$_POST['icode'];
     $qry="delete from institution where icode='$icode'  ";
     $result=mysqli_query($dbc,$qry);
     if($result)
     {
       echo'<script type="text/javascript">
                  alert("INSTITUTION REMOVED !!")
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



    if(isset($_POST["regins"]))
    {
    $dbc = @mysqli_connect("localhost", "studentweb", "hoihoi", "exhibition");

     $icode=$_POST['icode'];
     $iname=$_POST['iname'];
     $ilocation=$_POST['loc'];
     $ihead=$_POST['head'];

      $query = "INSERT INTO institution (icode, iname, ilocation, ihead) VALUES (?, ?, ?, ?)";
        
        $stmt = mysqli_prepare($dbc, $query);
        
        mysqli_stmt_bind_param($stmt, "isss", $icode, $iname, $ilocation, $ihead);
        
        mysqli_stmt_execute($stmt);
        
        $affected_rows = mysqli_stmt_affected_rows($stmt);
        
        if($affected_rows == 1){
            
            echo '<script type="text/javascript">
                  alert("INSTITUTION ADDED SUCCESSFULLY"); 
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
 $query = "SELECT * FROM institution";
 $response = @mysqli_query($dbc, $query);
 if($response){
 echo '<div class="container">
          <table class="table table-condensed table-hover ">
            <thead class="thead-dark"><tr>
            <td align="center"><b>INSTITUTION ID (icode)</b></td>
            <td align="center"><b>INSTITUTION NAME (iname)</b></td>
            <td align="center"><b>INSTITUTION LOCATION (ilocation)</b></td>
            <td align="center"><b>INSTITUTION HEAD (ihead)</b></td>
            </tr></thead>';

while($row = mysqli_fetch_array($response)){
 
echo '<tr><td align="center">' . 
$row['icode'] . '</td><td align="center">' .
$row['iname'] . '</td><td align="center">' .
$row['ilocation'] . '</td><td align="center">' .
$row['ihead'] . '</td><td align="center">';
 
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
    <button type="button" class="btn btn-success btn-lg myButton" data-toggle="modal" data-target="#addins">Add</button>
    <button type="button" class="btn btn-warning btn-lg myButton" data-toggle="modal" data-target="#upins">Update</button>
    <button type="button" class="btn btn-danger btn-lg myButton" data-toggle="modal" data-target="#delins">Delete</button>
</div>

<!-- Modal Add-->
  <div class="modal fade" id="addins" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Add new institution</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          
        </div>
        <div class="modal-body">
          <form method="POST">
    <div class="form-group">
      <label >Enter Institution ID :</label>
      <input type="text" class="form-control" id="sid" placeholder="" name="icode" required>

      <label >Enter Institution Name :</label>
      <input type="text" class="form-control" id="sname" placeholder="" name="iname" required>

      <label >Enter Location of institute :</label>
      <input type="text" class="form-control" id="evecode" placeholder="" name="loc" required>

      <label >Enter Head of institution :</label>
      <input type="text" class="form-control" id="evecode" placeholder="" name="head" required>
      
    </div>
   
    <input type="submit" name="regins" value="Register" class="btn btn-primary"/>
  </form>
        </div>
       <!-- <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>-->
      </div>
      
    </div>
  </div>




  <!-- Modal Update-->
  <div class="modal fade" id="upins" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Update institution</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          
        </div>
        <div class="modal-body">
          <form method="POST">
    <div class="form-group">
      <label >Enter field to update:</label>
      <input type="text" class="form-control" id="sid" placeholder="" name="name" required>

      <label >Enter Institution ID:</label>
      <input type="text" class="form-control" id="sname" placeholder="" name="id" required>

      <label >Enter the updated value:</label>
      <input type="text" class="form-control" id="evecode" placeholder="" name="uvalue" required>
      
    </div>
   
    <input type="submit" name="upins" value="Update" class="btn btn-primary"/>
  </form>
        </div>
        
      </div>
      
    </div>
  </div>
  


  <!-- Modal Delete-->
  <div class="modal fade" id="delins" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Remove an institution</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          
        </div>
        <div class="modal-body">
          <form method="POST">
    <div class="form-group">
      <label >Enter Institution ID to delete :</label>
      <input type="text" class="form-control" id="uname" placeholder="ICODE" name="icode" required>
      
    </div>
   
    <input type="submit" name="delins" value="delete" class="btn btn-primary"/>
  </form>
        </div>
        
      </div>
      
    </div>
  </div>
  
</div>
