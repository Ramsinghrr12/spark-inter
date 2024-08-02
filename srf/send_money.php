<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" sizes="180x180" href="statics/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="statics/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="statics/favicon-16x16.png">
    <link rel="manifest" href="statics/site.webmanifest">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
        integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Send Money - Sparks Bank</title>
    <style>
        body {
            background-color: #212529;
            padding-top: 8%;
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
        }

        .navbar a {
            color: #ffffff;
            text-decoration: none;
            padding: 10px 15px;
            display: inline-block;
        }

        .navbar a:hover {
            text-decoration: underline;
        }

        .container {
            width: 80%;
            margin: 0 auto;
        }

        .formin {
            border-radius: 20px;
            width: 100%;
            height: 50px;
            padding: 5px 15px;
            margin-bottom: 10px;
            border: 1px solid #ced4da;
            background-color: #343a40;
            color: #ffffff;
        }

        .mybtn {
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
        }

        .mybtn:hover {
            background-color: #ffffff;
            color: #000000;
        }

        .mybtn:active {
            background-color: #000000;
            color: #ffffff;
        }

        .form-container {
            background-color: rgba(0, 0, 0, .5);
            padding: 20px;
            border-radius: 30px;
            box-shadow: 2px 2px 10px gray;
        }

        td {
            padding-top: 10px;
            padding-bottom: 10px;
        }

        table {
            width: 100%;
        }

        table td {
            padding: 10px 0;
        }

        h1 {
            margin: 0;
        }

        .content {
            text-align: center;
        }

        .btn-outline-light {
            border: 2px solid #ffffff;
            background-color: transparent;
            color: #ffffff;
        }

        .btn-outline-light:hover {
            background-color: #ffffff;
            color: #000000;
        }
    </style>
</head>

<body>
    <nav class="navbar">
        <a href="index.php"><img src="statics/logo.png" alt="Sparks Bank Logo" style="height: 80px;"></a>
        <a href="index.php">Home</a>
        <a href="send_money.php">Send Money</a>
        <a href="all_cust.php">View All Customers</a>
        <a href="transactions.php">Transactions</a>
        <a href="contact_us.php">Contact Us</a>
        <a href="about_us.php">About Us</a>
    </nav>

    <div class="container">
        <div class="form-container">
            <h1>Transfer Money</h1>
            <form action="send_money.php" method="post">
                <table>
                    <tr>
                        <td><input type="text" class="formin" name="accno1" placeholder="Sender's Account Number"
                                value="<?php if(isset($_GET['reads'])){echo $_GET['reads'];} ?>"></td>
                    </tr>
                    <tr>
                        <td><input type="number" class="formin" name="amount" placeholder="Amount to Transfer"></td>
                    </tr>
                    <tr>
                        <td><input type="text" class="formin" name="accno2" placeholder="Receiver's Account Number">
                        </td>
                    </tr>
                </table>
                <br>
                <input class="mybtn" type="submit" value="Transfer"><br><br>
                <p>Want to check your balance? Check <a href="check_blc.php" style="color: #ffffff;">here</a></p>
            </form>
        </div>
    </div>
</body>

</html>
<?php
$servername = "localhost:3306//";
$username = "ramsingh";
$password = "Ramsingh12@";
$dbname = "srfintern";
$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $sender = $_POST['accno1'];
    $amount = $_POST['amount'];
    $receiver = $_POST['accno2'];

    $sender = mysqli_real_escape_string($conn, $sender);
    $amount = mysqli_real_escape_string($conn, $amount);
    $receiver = mysqli_real_escape_string($conn, $receiver);
    $checkblcquery = "SELECT balance FROM bank WHERE id='$sender'";
    $checkblc = mysqli_query($conn, $checkblcquery);
    $ava_blc = mysqli_fetch_assoc($checkblc)['balance'];

    if ($ava_blc >= $amount) {
        // Update balances
        $sql1 = "UPDATE bank SET balance = balance - $amount WHERE id = '$sender'";
        $sql2 = "UPDATE bank SET balance = balance + $amount WHERE id = '$receiver'";
        $result1 = mysqli_query($conn, $sql1);
        $result2 = mysqli_query($conn, $sql2);

        if ($result1 && $result2) {
            // Insert transaction record
            $sqltran = "INSERT INTO transfers (sender_id, receiver_id, amount, transfer_date) VALUES ('$sender', '$receiver', '$amount', NOW())";
            $sqltransact = mysqli_query($conn, $sqltran);

            if ($sqltransact) {
                echo '<div class="alert alert-success align-items-center text-center" style="width:50%;" role="alert">
                        <div>   
                        <h2><i class="fas fa-check-circle"></i> Amount Transferred Successfully!</h2></div>
                    </div>';
            } else {
                echo '<div class="alert alert-danger" role="alert">
                        <div><i class="fas fa-times-circle"></i> Oops! Something went wrong while recording the transaction.</div>
                    </div>';
            }
        } else {
            echo '<div class="alert alert-danger" role="alert">
                    <div><i class="fas fa-times-circle"></i> Oops! Something went wrong during the transfer.</div>
                </div>';
        }
    } else {
        echo '<div class="alert alert-danger text-center" style="width:50%;" role="alert">
                <div><h2><i class="fas fa-times-circle"></i> Not Sufficient Balance in Account!</h2></div>
            </div>';
    }
}
?>
