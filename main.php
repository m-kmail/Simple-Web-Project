<?php 
include "dp.php";
include "fun.php";



if(isset($_POST['log']))
{
    
    $email = $_POST['email'];
    if(isvalid())
    {
       $pass = $_POST['pass'];

       if (str_contains($email, 'stu'))
       {
           loginuser();
       }
       else
       {
           loginadmin();
       }
       
    }
    else
    {
        echo "<h1 style='text-align: center; color: red'>invalid email</h1> <br>";
    }

}
else
{
    if(isset($_POST['reg']))
    {
        
       $email = $_POST['email'];
        
        if(isvalid())
        {
          $pass = $_POST['pass'];
          $name = $_POST['name'];
    
          if (str_contains($email, 'stu'))
          {
              reguser();
          }
          else
          {
              regadmin();
          } 
        }
    else
    {
        echo "<h1 style='text-align: center; color: red'>invalid email</h1> <br>";
    }
        
    }
   
}




?>



<!DOCTYPE html>
<html>
<head>
	<title>login</title>
	<link rel="stylesheet" type="text/css" href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
 <div class="container">
 
 <div class="button-box">
              <div id="btn"></div>
               <button type="button" class="toggle-btn" id="lgin" onclick="tologin()">Log In</button>
               <button type="button" class="toggle-btn" id="rgs" onclick="toreg()">Register</button>
           </div>
           
 	<div class="main">
 	
 	
 		<form id="login" class="frm" action="main.php" method="post">
 		<h1>Login</h1>
 			<span>
 				<i class="fa fa-envelope"></i>
 				<input type="text" placeholder="email" name="email" required>
 			</span>
 			<br>
 			<span>
 				<i class="fa fa-lock"></i>
 				<input type="password" placeholder="password" name="pass"  required>
 			</span><br>
 				<button name="log">login</button>
 		</form>
 		

            
 			<form id="register" class="form-hidden" action="main.php" method="post">
 			<h1>Register</h1>
 			<span>
 				<i class="fa fa-envelope"></i>
 				<input type="text" placeholder="email" name="email" required>
 			</span>
 			<br>
 			
 			<span>
 			<i class="fa fa-user"></i>
 				<input type="text" placeholder="Name" name="name" required>
 			</span>
 			<br>
 			
 			
 			<span>
 			<i class="fa fa-user"></i>
 				<input type="text" placeholder="Id" name="id" required>
 			</span>
 			<br>
 			
 			<span>
 				<i class="fa fa-lock"></i>
 				<input type="password" placeholder="password" name="pass" required>
 			</span><br>
 				<button name="reg">Register</button>

 		</form>
 		
 		
 		
 	</div>
 </div>
 
 <script>
    function tologin() {
  document.getElementById("register").style.display = "none";
    document.getElementById("login").style.display = "block";
}
         function toreg() {
  document.getElementById("login").style.display = "none";
    document.getElementById("register").style.display = "block";
}
    
    </script>
</body>
</html>
































