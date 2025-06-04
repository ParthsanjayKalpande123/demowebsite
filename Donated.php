<?php
$hostname = "127.0.0.1";
$username = "root";
$password = "Parth@0510";
$db_name = "NGO";
$conn = mysqli_connect($hostname, $username, $password, $db_name);

if (!$conn) {
    die("<div style='color: red; text-align: center;'>❌ Failed to connect: " . mysqli_connect_error() . "</div>");
}

$successMessage = "";
$errorMessage = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['Name'];
    $email = $_POST['Email'];
    $amount = $_POST['Amount'];

   

    $sql = "INSERT INTO Donation(Name, Email, Amount) VALUES('$name', '$email', '$amount')";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        $successMessage = "✅ Thank you, <strong>$name</strong>! For Your <strong>$amount</strong> donation please proceed futher.";
    } else {
        $errorMessage = "❌ Failed to save data: " . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Donation Form</title>
    <style>
        body {
            font-family: Arial;
            padding: 30px;
            background-color: #f4f4f4;
        }
        .form-container {
            background: white;
            padding: 25px;
            max-width: 500px;
            margin: auto;
            border-radius: 10px;
            box-shadow: 0 0 10px #ccc;
        }
        .form-container h2 {
            color: #4CAF50;
            margin-bottom: 15px;
        }
        .button-group {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
            margin-bottom: 20px;
        }
        .amount-btn {
            background: #E8F5E9;
            color: #2E7D32;
            border: 1px solid #A5D6A7;
            padding: 10px 20px;
            border-radius: 8px;
            cursor: pointer;
            font-weight: 600;
        }
        .amount-btn.active {
            background-color: #A5D6A7;
        }
        input[type="text"], input[type="email"] {
            width: 100%;
            padding: 10px;
            margin: 8px 0;
            border-radius: 5px;
            border: 1px solid #ccc;
        }
        button[type="submit"] {
            width: 100%;
            background: #4CAF50;
            color: white;
            padding: 12px;
            font-weight: bold;
            border: none;
            border-radius: 6px;
            cursor: pointer;
        }
        .message {
            text-align: center;
            margin-top: 20px;
            font-size: 16px;
        }
        .success { color: green; }
        .error { color: red; }
        .head{
          padding-top:20px;
          color: #2E7D32;
        }
    </style>
</head>
<body>

<div class="form-container">
    <h2>Make a Donation</h2>

    <?php if ($successMessage): ?>
        <div class="message success"><?php echo $successMessage; ?></div>
    <?php elseif ($errorMessage): ?>
        <div class="message error"><?php echo $errorMessage; ?></div>
    <?php endif; ?>

    <form>
        <br/>
        <label class="head">Select Amount</label>
        <br/>
        <br/>
        <div class="button-group">
            <a href="https://imjo.in/FTcNss"><button type="button" class="amount-btn" data-amount="100" >₹100</button></a>
            <a href="https://imjo.in/qHe89n"><button type="button" class="amount-btn" data-amount="250" >₹250</button></a>
            <a href="https://imjo.in/6whFs4"><button type="button" class="amount-btn" data-amount="500" >₹500</button></a>
            <a href="https://imjo.in/ckYdyh"><button type="button" class="amount-btn" data-amount="1000" >₹1000</button></a>
        </div>

        <input type="hidden" name="Amount" id="selectedAmount">
    </form>
</div>

<script>
    const buttons = document.querySelectorAll('.amount-btn');
    const hiddenInput = document.getElementById('selectedAmount');

    buttons.forEach(btn => {
        btn.addEventListener('click', () => {
            buttons.forEach(b => b.classList.remove('active'));
            btn.classList.add('active');
            hiddenInput.value = btn.dataset.amount;
        });
    });

    // Optional: set ₹100 as default
    const defaultBtn = document.querySelector('.amount-btn[data-amount="100"]');
    if (defaultBtn) {
        defaultBtn.classList.add('active');
        hiddenInput.value = defaultBtn.dataset.amount;
    }
</script>

</body>
</html>
