<?php
$servername = "localhost:3306//";
$username = "ramsingh";
$password = "Ramsingh12@";
$dbname = "srfintern";
$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
die("Connection failed: " . mysqli_connect_error());
}

$balance = '';
$error = '';

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $accno = $_POST['accno'];

    // Validate input
    if (empty($accno)) {
        $error = "Please enter your account number.";
    } else {
        // Fetch balance from the database
        $sql = "SELECT balance FROM bank WHERE id = '$accno'";
        $result = mysqli_query($conn, $sql);

        if ($result && mysqli_num_rows($result) > 0) {
            $balance = mysqli_fetch_assoc($result)['balance'];
        } else {
            $error = "No account found with the given account number.";
        }
    }
}

// Close the connection
mysqli_close($conn);
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
        integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Check Balance - Sparks Bank</title>
    <style>
        body {
            background-color: #212529;
            font-family: Arial, sans-serif;
            color: #ffffff;
        }

        .navbar {
            background-color: #343a40;
            padding: 15px;
            box-shadow: 0px 0px 10px 0px black;
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1000;
            display: flex;
            align-items: center;
        }

        .navbar a {
            color: #ffffff;
            text-decoration: none;
            padding: 10px 15px;
            margin-right: 10px;
        }

        .navbar a:hover {
            text-decoration: underline;
        }

        .container {
            margin-top: 100px;
            padding: 20px;
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
        }

        .form-container {
            background-color: rgba(0, 0, 0, 0.5);
            padding: 20px;
            border-radius: 15px;
            box-shadow: 2px 2px 10px gray;
        }

        .formin {
            border-radius: 5px;
            width: 100%;
            height: 30px;
            padding: 5px;
            margin-bottom: 10px;
            border: 1px solid #ced4da;
            background-color: #343a40;
            color: #ffffff;
        }

        .btn {
            display: inline-block;
            padding: 10px 20px;
            border-radius: 30px;
            border: 2px solid #ffffff;
            background-color: transparent;
            color: #ffffff;
            cursor: pointer;
            text-decoration: none;
            font-weight: bold;
            transition: background-color 0.3s, color 0.3s;
            box-shadow: 2px 2px 10px black;
            text-align: center;
            display: block;
        }

        .btn:hover {
            background-color: #ffffff;
            color: #000000;
        }

        .error {
            color: red;
            margin-top: 10px;
        }

        .balance {
            color: green;
            font-size: 18px;
            margin-top: 10px;
        }

    </style>
</head>

<body>
    <nav class="navbar">
        <a href="index.php"><img src="statics/logo.png" alt="Sparks Bank Logo" style="height: 50px;"></a>
        <a href="index.php">Home</a>
        <a href="send_money.php">Send Money</a>
        <a href="all_cust.php">View All Customers</a>
        <a href="transactions.php">Transactions</a>
        <a href="contact_us.php">Contact Us</a>
        <a href="about_us.php">About Us</a>
    </nav>

    <div class="container">
        <div class="form-container">
            <h2>Check Balance</h2>
            <form action="check_blc.php" method="post">
                <input type="text" class="formin" name="accno" placeholder="Enter Your Account Number">
                <input class="btn" type="submit" value="Check Balance">
            </form>
            <?php if (!empty($error)) { ?>
                <p class="error"><?php echo $error; ?></p>
            <?php } elseif (!empty($balance)) { ?>
                <p class="balance">Current Balance: <?php echo $balance; ?></p>
            <?php } ?>
        </div>
    </div>
</body>

</html>
