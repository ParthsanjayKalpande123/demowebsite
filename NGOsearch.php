<?php
$hostname="127.0.0.1";
$username="root";
$password="Parth@0510";
$db_name="NGO";
$conn=mysqli_connect($hostname,$username,$password,$db_name);
if(!$conn)
  {
    echo "failed to connect".mysqli_connect_error();
    exit;
  }
else 
  {
    if($_SERVER["REQUEST_METHOD"]=="POST")
    $search=$_POST['search'];
    $sql="select image,information,city,head from office_list where city='$search'";
    $result=mysqli_query($conn,$sql);
    if(!$result)
     {
        echo "Query failed".mysqli_error($conn);
        exit;
     }
     else 
       {
        $row=mysqli_fetch_assoc($result);
       }
    }
       ?>
      
  <!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Green Roots - Tree Plantation Branch</title>
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
  <style>
    body {
      background-color: #f4faf7;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      color: #2e3d2f;
      margin: 0;
      padding: 0;
    }

    .hero {
      position: relative;
      background-image: url('<?php echo $row["image"]; ?>');
      background-size: cover;
      background-position: center;
      height: 400px;
      border-radius: 12px;
      margin-top: 40px;
      box-shadow: 0 6px 20px rgba(0, 0, 0, 0.2);

      /* Animation */
      animation: curtainFadeIn 1.5s ease forwards;
      opacity: 0; /* Start hidden */
    }

    /* Curtain Fade-In animation for background */
    @keyframes curtainFadeIn {
      0% {
        opacity: 0;
        transform: scaleX(0);
        transform-origin: left;
      }
      50% {
        opacity: 0.5;
        transform: scaleX(1);
        transform-origin: left;
      }
      100% {
        opacity: 1;
        transform: scaleX(1);
        transform-origin: left;
      }
    }

    /* Black translucent overlay on the hero */
    .overlay {
      position: absolute;
      top: 0; left: 0; right: 0; bottom: 0;
      background-color: rgba(0, 0, 0, 0.35);
      border-radius: 12px;
      display: flex;
      align-items: center;
      justify-content: center;
      opacity: 0;
      animation: overlayFadeIn 1s ease forwards;
      animation-delay: 1.5s;
    }

    @keyframes overlayFadeIn {
      to {
        opacity: 1;
      }
    }

    .overlay h1 {
      font-size: 2.8rem;
      font-weight: 600;
      color: white;
      text-shadow: 1px 1px 6px rgba(0, 0, 0, 0.7);
      opacity: 0;
      animation: textFadeIn 1s ease forwards;
      animation-delay: 2s;
      margin: 0 15px;
      text-align: center;
    }

    @keyframes textFadeIn {
      to {
        opacity: 1;
      }
    }

    .section-title {
      color: #1a4d2e;
      font-weight: 700;
      margin-top: 60px;
      text-align: center;
      text-transform: uppercase;
      letter-spacing: 1px;
    }

    .info-card {
      background: #fff;
      border-left: 5px solid #4caf50;
      border-radius: 10px;
      padding: 25px;
      margin-top: 30px;
      box-shadow: 0 3px 12px rgba(0, 0, 0, 0.08);
    }

    .info-label {
      color: #2e7d32;
      font-weight: 600;
      font-size: 18px;
      margin-bottom: 10px;
    }

    footer {
      margin-top: 70px;
      padding: 20px 0;
      text-align: center;
      font-size: 15px;
      color: #5e5e5e;
      border-top: 1px solid #c8e6c9;
    }

    /* Responsive text scaling */
    @media (max-width: 576px) {
      .overlay h1 {
        font-size: 1.8rem;
      }
    }
  </style>
</head>
<body>
  <div class="container">
    <!-- Hero Section -->
    <div class="hero">
      <div class="overlay">
        <h1>Welcome to <?php echo $row['city']; ?> Branch</h1>
      </div>
    </div>

    <!-- Mission Section -->
    <h2 class="section-title">Our Mission</h2>
    <div class="info-card">
      <div class="info-label">Branch Activities</div>
      <p><?php echo $row['information']; ?></p>
    </div>

    <!-- Head Section -->
    <h2 class="section-title">Branch Leadership</h2>
    <div class="info-card">
      <div class="info-label">Head of the Branch</div>
      <p><?php echo $row['head']; ?></p>
    </div>
  </div>

  <!-- Footer -->
  <footer>
    🌱 Green Roots NGO | Growing a Greener Tomorrow 🌍
  </footer>
</body>
</html>


