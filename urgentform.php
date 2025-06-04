<?php
$hostname="127.0.0.1";
$username="root";
$password="Parth@0510";
$db_name="NGO";
$conn=mysqli_connect($hostname,$username,$password,$db_name);
if(!$conn)
 {
    echo "connection failed".mysqli_connect_error();
    exit;
 }
 else
  {
    if($_SERVER["REQUEST_METHOD"]=="POST")
     {
        $issues=$_POST["issue"];
        $contact=$_POST["contact_no"];
        $sql="insert into urgent_form(Issue,Contact_no)values('$issues',$contact);";
        $result=mysqli_query($conn,$sql);
        if(!$result)
         {
            echo "Query failed".mysqli_error($conn);
         }
     }
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Issue Noted</title>
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"/>

  <style>
    body {
      background-color: #eaf7ea;
      font-family: 'Segoe UI', sans-serif;
      text-align: center;
      padding-top: 100px;
    }

    .tree-img {
      width: 300px;
      animation: plantTree 2s ease-out forwards;
      margin: auto;
    }

    @keyframes plantTree {
      0% {
        transform: translateY(-200px);
        opacity: 0;
      }
      100% {
        transform: translateY(0);
        opacity: 1;
      }
    }

    .message {
      font-size: 24px;
      color: green;
      margin-top: 30px;
      opacity: 0;
      animation: fadeIn 2s ease forwards;
      animation-delay: 2s; /* appears after tree finishes */
    }

    @keyframes fadeIn {
      to {
        opacity: 1;
      }
    }
  </style>
</head>
<body>

  <div class="w3-container">
    <img src="img/tree.png" alt="Tree Planted" class="tree-img" />
    <div class="message">🌱 Query Noted. Support will respond your query through Call!</div>
  </div>

</body>
</html>
