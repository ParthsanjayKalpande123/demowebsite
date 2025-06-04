<?php
$hostname="127.0.0.1";
$username="root";
$password="Parth@0510";
$db_name="NGO";
$conn=mysqli_connect($hostname,$username,$password,$db_name);
if(!$conn)
  {
    echo "Connect failed".mysqli_connect_error();
    exit;
  }
else
  {
    if($_SERVER["REQUEST_METHOD"]=="POST")
    {
    $name=$_POST['Name'];
    $email=$_POST['Email'];
    $password=$_POST['Password'];
    $gender=$_POST['Gender'];
    $address=$_POST['Address'];
    $perspective=$_POST['Perspective'];
    $sql="Insert into vol_application (Name,Email,Password,Gender,Address,Perspective)values('$name','$email','$password','$gender','$address','$perspective');";
    $result=mysqli_query($conn,$sql);
    if(!$result)
      {
        echo "error in query".mysqli_error($conn);
        exit;
      }
    else 
     {
        echo "you application has been submitted successfully(plant tree , grow future)";
     }
    }
  }
  mysqli_close($conn);
?>