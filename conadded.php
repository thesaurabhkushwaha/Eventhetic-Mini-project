<html>
<head>
<style>
body {
    background-image: url("bluegra.png");
	 background-repeat: no-repeat;
	 background-size:  1540px 865px;
}
</style>
<title>Add Contact</title>
</head>
<body>
<?php
 
if(isset($_POST['submit'])){
    
    $data_missing = array();
    
    if(empty($_POST['cid'])){
 
        $data_missing[] = 'Code of contact';
 
    } else {
 
        $cid = trim($_POST['cid']);
 
    }
 
    if(empty($_POST['name'])){
 
	$data_missing[] = 'Name of the contact';}
	else{
 
        $name = trim($_POST['name']);
 
    }
	
	if(empty($_POST['contactnumber'])){
 
        $data_missing[] = 'Contact number';	
 
    } else{
 
        $contactnumber = trim($_POST['contactnumber']);
 
    }
	if(empty($_POST['ecode'])){
 
        $data_missing[] = 'Code of exhibition';	
 
    } else{
 
        $ecode = trim($_POST['ecode']);
 
    }
	
 
    
    
    if(empty($data_missing)){
        
        require_once('../Exhibition/mysqli_connect.php');
        
        $query = "INSERT INTO contact (cid, name, contactnumber, ecode) VALUES (?, ?, ?, ?)";
        
        $stmt = mysqli_prepare($dbc, $query);
        
        mysqli_stmt_bind_param($stmt, "isii", $cid, $name, $contactnumber, $ecode);
        
        mysqli_stmt_execute($stmt);
        
        $affected_rows = mysqli_stmt_affected_rows($stmt);
        
        if($affected_rows == 1){
            
            echo 'Contact added successfully';
            
            mysqli_stmt_close($stmt);
            
            mysqli_close($dbc);
            
        } else {
            
            echo 'Error Occurred<br />';
            echo mysqli_error($dbc);
            
            mysqli_stmt_close($stmt);
            
            mysqli_close($dbc);
            
        }
        
    } else {
        
        echo 'You need to enter the following data<br />';
        
        foreach($data_missing as $missing){
            
            echo "$missing<br />";
            
        }
        
    }
    
}
 
?>
 
<form action="http://localhost:1234/Exhibition/conadded.php" method="POST">
 
<p style="font-size:40px" align="center"><b><font face="georgia" color="indigo">ADD NEW EXHIBITION CONTACT</font></b></p>
 
<p style="font-size:25px"align="center"><br><br><font face="comic sans ms" color="blue"> Contact ID:</font>
<input type="text" name="cid" size="30"  />
</p>
 <p style="font-size:25px"align="center"><br><font face="comic sans ms" color="blue"> Contact name:</font>
<input type="text" name="name" size="30"  />
</p>
<p style="font-size:25px"align="center"><br><font face="comic sans ms" color="blue"> Contact Number:</font>
<input type="text" name="contactnumber" size="30"  />
</p>
<p style="font-size:25px"align="center"><br><font face="comic sans ms" color="blue">Exhibition code:</font>
<input type="text" name="ecode" size="30" />
</p>

 
<p align="center"><br>
<input style="height:40px;width:70px" type="submit" name="submit" value="Submit" />
</p>
<p style="font-size:25px"align="center"><br><br><br><br>
<a href="http://localhost:1234/Exhibition/getconinfo.php">Display Contact list</a> </p>
</form>
</body>
</html>