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
        $Query=$_POST["Query"];
        $email=$_POST["Email"];
        $sql="insert into GeneralEnquiry_form(Query,Email)values('$Query','$email');";
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
      padding-top: 80px;
    }

    .tree-img {
      width: 300px;
      animation: plantTree 2s ease-out forwards;
      margin: auto;
    }

    @keyframes plantTree {
      0% { transform: translateY(-200px); opacity: 0; }
      100% { transform: translateY(0); opacity: 1; }
    }

    .message {
      font-size: 24px;
      color: green;
      margin-top: 20px;
      opacity: 0;
      animation: fadeIn 2s ease forwards;
      animation-delay: 2s;
    }

    .cut-tree-container {
      position: relative;
      display: inline-block;
      margin-top: 40px;
      opacity: 0;
      animation: fadeIn 2s ease forwards;
      animation-delay: 5s;
    }

    .cut-tree-img {
      width: 200px;
    }

    .cross-mark {
      position: absolute;
      top: 0;
      left: 0;
      width: 200px;
      height: 200px;
      pointer-events: none;
    }

    .cross-mark::before,
.cross-mark::after {
  content: '';
  position: absolute;
  width: 100%;
  height: 10px; /* thinner for better look */
  background-color: red;
  top: 50%;
  left: 0;
  transform-origin: center;
  opacity: 0.9;
  margin-bottom:10px;
}

.cross-mark::before {
  transform: rotate(45deg);
}

.cross-mark::after {
  transform: rotate(-45deg);
}

    .warning {
      font-size: 22px;
      color: darkred;
      font-weight: bold;
      margin-top: 10px;
      opacity: 0;
      animation: fadeIn 2s ease forwards;
      animation-delay: 7s;
    }

    @keyframes fadeIn {
      to { opacity: 1; }
    }
  </style>
</head>
<body>

  <div class="w3-container">
    <img src="img/tree.png" alt="Tree Planted" class="tree-img" />
    <div class="message">🌱 Query Noted. Support will respond to your query through Email!</div>

    <div class="cut-tree-container">
      <img src="img/treecutting.WEBP" alt="Cut Tree" class="cut-tree-img" />
      <div class="cross-mark"></div>
    </div>

    <div class="warning">🚫 Please do not cut trees. Protect the green!</div>
  </div>

</body>
</html>

