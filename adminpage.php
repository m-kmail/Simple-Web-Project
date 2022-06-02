<?php
include "dp.php";
include "fun.php";


?>


<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="fontawesome/css/all.min.css">
	<link rel="stylesheet" type="text/css" href="adminstyle.css">
</head>
<body>
        <h1 style="text-align: center">Admin page</h1>
        <br><br>
        
          
          
     <?php 
    
            $query="SELECT * FROM MSG";
            $result =mysqli_query($connection,$query);
            if(mysqli_num_rows($result)>0)
           {
                  ?>
            
            <table class="tb">
               <thead>
                    <tr>
                      <th>Student Name</th>
                      <th>Student ID</th>
                      <th>Email</th>
            
                   </tr>
                  </thead>
                         <tbody>
                            <?php
                             show();
                              ?>
                           </tbody>
                </table>
        
        <?php
    }
    else
    {
        echo"<br>"."<br>"."<h1 style='font-weight: bold;text-align: center; color:crimson';>"."there are no requests"."</h1>";
    }
    ?>
    
   
   <div class="other" id="o">
       
       <form>
           
           
           
       </form>
       
   </div>
    
       
       
        
        
        
 	
 		

            
 			
 		
 		
 	
