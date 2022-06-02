<?php
include "dp.php";
session_start();

function isvalid()
{
    $x=$_POST['email'];
    if (str_contains($x, 'stu'))
    { 
        if (str_contains($x, '@stu.najah.edu'))
        {
            $whatIWant = substr($x, strpos($x, "@stu.najah.edu") + 14); 
          
            if(empty($whatIWant))
            {
              $x=str_replace("@stu.najah.edu",'',$x);
                if(str_contains($x, '.') || str_contains($x, '@'))
                {
                    return false;
                }
                else
                    return true;
            }
            else
                return false;
        }
        else
            return false;
    }
    else
    {
       if (str_contains($x, '@najah.edu'))
        {
            $whatIWant = substr($x, strpos($x, "@najah.edu") + 10);    
            if(empty($whatIWant))
            {
                $x = str_replace("@najah.edu",'',$x);
                if(str_contains($x, '.') || str_contains($x, '@'))
                {
                    return false;
                }
                else
                    return true;
            }
            else
                return false;
        }
        else
            return false;
    }
    
}



function loginuser()
{
    global $connection;
    
    $email = $_POST['email'];
    $password=$_POST['pass'];
    $_SESSION['email']=$email;
    
    $result=mysqli_query($connection,"SELECT * FROM users");
    
    $existe=false;
    $ok=false;
    while($row=mysqli_fetch_assoc($result))
    {
        if($row['email']===$email)
        {
            $existe=true;
            if($row['password']===$password)
            {
                $ok=true;
                
                $_SESSION['name'] = $row['name'];
                $_SESSION['id'] = $row['id'];
                
                break;
            }
            break;
        }
    }
    
    if(!$existe)
        echo "<h1 style='text-align: center; color: red'>invalid email</h1> <br>";
    else
    {
        if(!$ok)
        {
            echo "<h1 style='text-align: center; color: red'>wrong password</h1> <br>";
        }
        else
        {
            header("Location: stupage.php");
        }
    }
    
    
}




function loginadmin()
{
    global $connection;
    
    $email = $_POST['email'];
    $password=$_POST['pass'];
    
    $result=mysqli_query($connection,"SELECT * FROM admins");
    
    $existe=false;
    $ok=false;
    while($row=mysqli_fetch_assoc($result))
    {
        if($row['email']===$email)
        {
            $existe=true;
            if($row['password']===$password)
            {
                $ok=true;
                break;
            }
            break;
        }
    }
    
    if(!$existe)
        echo "<h1 style='text-align: center; color: red'>invalid email</h1> <br>";
    else
    {
        if(!$ok)
        {
            echo "<h1 style='text-align: center; color: red'>wrong password</h1> <br>";
        }
        else
        {
            header('Location: adminpage.php');
        }
    }
    
    
}



function reguser()
{
    
     global $connection;
    
    $email=$_POST['email'];
    $password=$_POST['pass'];
    $name=$_POST['name'];
    $id = $_POST['id'];
    $_SESSION['email']=$email;
    $email = mysqli_real_escape_string($connection,$email);
    
    $password = mysqli_real_escape_string($connection,$password);
    
    $name = mysqli_real_escape_string($connection,$name);
    
    $result=mysqli_query($connection,"SELECT * FROM users");
    
    $existe=false;
    
     while($row=mysqli_fetch_assoc($result))
    {
        if($row['email']===$email)
        {
            $existe=true;
            break;
        }
    }
    
    if($existe)
        echo "this email is already exists<br>";
    else
    {
        $query ="INSERT INTO users(email,name,id,password) VALUES('$email','$name','$id','$password')";
        
        $result =mysqli_query($connection,$query);
        if(!$result)
            die("QUERY FAILED ".mysqli_error()."<br>");
        else
        {
                $_SESSION['name'] = $name;
                $_SESSION['id'] = $id;
            header('Location: stupage.php');

        }
    }
    
    
    
}



function regadmin()
{
    
     global $connection;
    
    $email=$_POST['email'];
    $password=$_POST['pass'];
    $name=$_POST['name'];
    $id = $_POST['id'];
    
    $email = mysqli_real_escape_string($connection,$email);
    
    $password = mysqli_real_escape_string($connection,$password);
    
    $name = mysqli_real_escape_string($connection,$name);
    
    $result=mysqli_query($connection,"SELECT * FROM admins");
    
    $existe=false;
    
     while($row=mysqli_fetch_assoc($result))
    {
        if($row['email']===$email)
        {
            $existe=true;
            break;
        }
    }
    
    if($existe)
        echo "this email is already exists<br>";
    else
    {
        $query ="INSERT INTO admins(email,name,id,password) VALUES('$email','$name','$id','$password')";
        
        $result =mysqli_query($connection,$query);
        if(!$result)
            die("QUERY FAILED ".mysqli_error()."<br>");
        else
        {
            header('Location: adminpage.php');
        }
    }
    
    
    
}



function savemsg()
{
    global $connection;
    
    $stname = $_SESSION['name'];
    $stid = $_SESSION['id'];
    $email=$_SESSION['email'];
    
    $cname = $_POST['cname'];
    $cnumber = $_POST['cnumber'];
    $option = $_POST['radios'];
    $why = $_POST['why'];
    
    
    
     $query ="INSERT INTO msg(stuname,stuid,email,cname,cid,opt,why) VALUES('$stname','$stid','$email','$cname','$cnumber','$option','$why')";
        
        $result =mysqli_query($connection,$query);
        if(!$result)
            die("QUERY FAILED ".mysqli_error()."<br>");
    
    
}


function show()
{
    global $connection;
    
    $query="SELECT * FROM MSG";
    
        $result =mysqli_query($connection,$query);
        if(!$result)
            die("QUERY FAILED ".mysqli_error()."<br>");
    
    
    
    
    
    
    while($row=mysqli_fetch_assoc($result))
    {
        $id=$row['stuid'];
        $cid=$row['cid'];
        $op=$row['opt'];
        echo '<tr>';
        echo '<td>'.$row['stuname'].'</td>';
        echo '<td>'.$row['stuid'].'</td>';
        echo '<td>'.$row['email'].'</td>';
        echo "<td><a href='view.php?id=$id&cid=$cid&option=$op'<button type='button' class='btn btn-info'>View</button></td>";
        
        echo '</tr>';
    }
    
    
    
}



?>