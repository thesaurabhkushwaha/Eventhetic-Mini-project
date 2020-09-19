<html>
<head>
<style>
body {
    background-image: url("bluegra.png");
	 background-repeat: no-repeat;
	 background-size:  1540px 865px;
}
</style>
<title>Add Institution</title>
</head>
<body>
<?php
 
if(isset($_POST['submit'])){
    
    $data_missing = array();
    
    if(empty($_POST['icode'])){
 
        $data_missing[] = 'Code of instution';
 
    } else {
 
        $icode = trim($_POST['icode']);
 
    }
 
    if(empty($_POST['iname'])){
 
	$data_missing[] = 'Name of institution';}
	else{
 
        $iname = trim($_POST['iname']);
 
    }
	
	if(empty($_POST['ilocation'])){
 
        $data_missing[] = 'location of institution';	
 
    } else{
 
        $ilocation = trim($_POST['ilocation']);
 
    }
	if(empty($_POST['ihead'])){
 
        $data_missing[] = 'head of institution';	
 
    } else{
 
        $ihead = trim($_POST['ihead']);
 
    }
	
 
    
    
    if(empty($data_missing)){
        
        require_once('../Exhibition/mysqli_connect.php');
        
        $query = "INSERT INTO institution (icode, iname, ilocation, ihead) VALUES (?, ?, ?, ?)";
        
        $stmt = mysqli_prepare($dbc, $query);
        
        mysqli_stmt_bind_param($stmt, "isss", $icode, $iname, $ilocation, $ihead);
        
        mysqli_stmt_execute($stmt);
        
        $affected_rows = mysqli_stmt_affected_rows($stmt);
        
        if($affected_rows == 1){
            
            echo 'Institution registered successfully';
            
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
 
<form action="http://localhost:1234/Exhibition/instadded.php" method="post">
 
<p style="font-size:40px" align="center"><b><font face="georgia" color="indigo">ADD NEW INSTITUTION</font></b></p>
 
<p align="center"><br><br><font face="comic sans ms" color="blue"> Institution's Code:</font>
<input type="text" name="icode" size="30" value="" />
</p>
 
<p align="center"><br><font face="comic sans ms" color="blue"> Institution's Name:</font>
<input type="text" name="iname" size="30"  />
</p>
<p align="center"><br><font face="comic sans ms" color="blue"> Institution's Location:</font>
<input type="text" name="ilocation" size="30"  />
</p>
<p align="center"><br><font face="comic sans ms" color="blue"> Head of Institution:</font>
<input type="text" name="ihead" size="30" />
</p>

 
<p align="center"><BR>
<input style="height:40px;width:60px" type="submit" name="submit" value="Send" />
</p>
<p style="font-size:25px"align="center"><br><br><br><br>
<a href="http://localhost:1234/Exhibition/getinstinfo.php">Display Institution list</a> </p>
</form>
</body>
</html>