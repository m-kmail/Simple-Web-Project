<?php
include "dp.php";
include "fun.php";


$id=$_GET['id'];
$cid=$_GET['cid'];
$o=$_GET['option'];


    $query="SELECT * FROM msg WHERE stuid='$id' AND cid='$cid' AND opt='$o'";
    $result =mysqli_query($connection,$query);
    $row=mysqli_fetch_assoc($result);
    $id=$row['stuid'];
    $cid=$row['cid'];
    $cname=$row['cname'];
    $state;
    $opt=$row['opt'];

if(isset($_POST['ok']))
{
    
        $studentid = $_POST['student_id'];
        $courseid = $_POST['course_id'];
        $coursename = $_POST['course_name'];
        $option = $_POST['option'];
        $state="approved";
    
      $q ="INSERT INTO reviewed(id,cid,cname,state,opt) VALUES('$studentid','$courseid','$coursename','$state','$option')";
    
    $r =mysqli_query($connection,$q);
    
    $q="DELETE FROM msg WHERE stuid='$studentid' AND cname='$coursename' AND cid='$courseid'";
    
    $r =mysqli_query($connection,$q);
    header('Location: adminpage.php');
}
else
{
    if(isset($_POST['no']))
    {
         $studentid = $_POST['student_id'];
        $courseid = $_POST['course_id'];
        $coursename = $_POST['course_name'];
        $option = $_POST['option'];
   
    
    $state="declined";
      $q ="INSERT INTO reviewed(id,cid,cname,state,opt) VALUES('$studentid','$courseid','$coursename','$state','$option')";
    
    $r =mysqli_query($connection,$q);
    
    $q="DELETE FROM msg WHERE stuid='$studentid' AND cname='$coursename' AND cid='$courseid'";
    
    $r =mysqli_query($connection,$q);
    header('Location: adminpage.php');
    }
}


?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="vstyle.css">
</head>
<body>
    
    
    
    <div class="container">
 
 
 	<div class="main">
 	
 	
 		<form id="view" class="frm" action="view.php" method="post">
 		
 			
 <h1 style="text-allign:center;">View</h1>
       
        <br>
        <label for="name" class="l">Student Name:</label>
        <input type="text" class="p1" id="name" value="<?php echo $row['stuname']; ?> " readonly>
        
        <label for="num" class="l">Student ID</label>
        <input type="text" class="p1"  id="num" name="student_id" value="<?php echo $row['stuid']; ?> " readonly>

          <br>
          <hr>
          <br>
          
                  <label for="cname" class="l">Course Name:</label>
        
        <input type="text" class="p1" id="cname" name="course_name" value="<?php echo $row['cname']; ?> " readonly>
        
        <label for="cid" class="l">Course ID</label>
        <input type="text" class="p1" name="course_id"  id="cid" value="<?php echo $row['cid']; ?> " readonly>

          <br>
    <hr>
          <br>
          
          <div class="all">
          
        <div class="s">
        <div class="in">
        <br>
        <br>
        <label for="opt" class="l">Option</label>
             <input type="text" name="option" class="p1"  id="opt" value="<?php echo $row['opt']; ?> " readonly  style="width:200px;">
            </div>
            
            </div>
         
          <div class="s">
          <label for="why" class="l" style="float: left; margin-left: 110px;">explination</label>
          
          <textarea class="why"; name="why" id="ex" style="height: 100px; width:300px" readonly placeholder="<?php echo $row['why']; ?> "></textarea> 
            </div>
            
            </div>
            <br><hr>
            <br>
           
          
     
           <br>
           <div class="ok" id="ok">
               
               <button class="apbutton" name="ok">approve</button>
               <button class="dbutton" name="no">decline</button>
               
           </div>
         
         
         
         
          

 		</form>
 		

            
 			
 		
 		
 	</div>
 </div>
    
    
    
    
    
    
 
    
    
    
    
    
    
    
    
</body>
</html>