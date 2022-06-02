<?php 
include "dp.php";
include "fun.php";



if(isset($_POST['submit']))
{
 
    savemsg();
    
}


?>




<!DOCTYPE html>
<html>
<head>
	
	<link rel="stylesheet" type="text/css" href="fontawesome/css/all.min.css">
	<link rel="stylesheet" type="text/css" href="stustyle.css">
</head>
<body>
 <div class="container">
 
 
 	<div class="main">
 	
 	 <?php
            $id=$_SESSION['id'];
             $query="SELECT * FROM reviewed WHERE id='$id'";
    $result=mysqli_query($connection,$query);
        
    if(mysqli_num_rows($result)>0)
    {
        while($row=mysqli_fetch_assoc($result))
        {
            
        
        $opt=$row['opt'];
        $name=$row['cname'];
        $number=$row['cid'];
        $state=$row['state'];
         if(strcmp($opt,"drop ")===0)
         {
           $opt="dropp";  
         }
         $opt = preg_replace( '/\s+/', '', "$opt ing" );
    if(strcmp($state,"approved")===0)
    {
       echo "<h3 style='color:darkgreen;'>"."your request for "."$opt"." $name"." has been "."$state"."</h3>";
    }
    else
    {
      echo "<h3 style='color:red'>"."your request for "."$opt"." $name"." has been "."$state"."</h3>";
    }
             $que="DELETE FROM reviewed WHERE id='$id' AND cid='$number' AND cname='$name'";
            $r=mysqli_query($connection,$que);
            
        }
        
       
        
    }

    
            
            ?>
            
           
            
 		<form id="fill" class="frm" action="stupage.php" method="post">
 		
 			
 <h1>student page</h1>
        <br>
        
       
        <label for="name">Name:</label>
        
        <input type="text" class="p1" id="name" value="<?php echo $_SESSION['name']; ?> " disabled>
        
        <label for="num">ID</label>
        <input type="text" class="p1"  id="num" value="<?php echo $_SESSION['id']; ?> " disabled>

          <br>
          <hr>
          <br>
          <input type="text" placeholder="Course Name" class="p1" required name="cname">
          <input type="text" placeholder="Course Number" class="p1" required name="cnumber">
          <br>
          <hr>
          <br>
          
        <label style="float:left; font-size: 25px; margin-left: 110px; font-weight: bold;">Choose an option</label>
        
  <input class="in" type="radio" id="drop" required name="radios" value="drop" style="width: 50px;">
  <label for="radio1">Drop</label>

  <input class="in" type="radio" id="add" name="radios" value="add" style="width: 50px; margin-left: 60px; ">
  <label for="radio2">add</label>
         
          <hr>
          <br>
          
          <textarea placeholder="explination"; class="why"; name="why" id="ex" style="height: 100px; width:300px" required ></textarea> 
          
          <label for="ex"; style="float: left; font-size: 30px; margin-left: 110px; font-weight: bold;">priefly explain</label>
          
          <br>
          <hr>
          <br>
          
          <button name="submit">submit</button>
          

 		</form>
 		

            
 			
 		
 		
 	</div>
 </div>
 

<!---
    <script>
    function tooriginal() {
  document.getElementById("dis").style.display = "none";
    document.getElementById("fill").style.display = "block";
}
         function tomsg() {
  document.getElementById("fill").style.display = "none";
    document.getElementById("dis").style.display = "block";
}
   
    
    </script>
    --->