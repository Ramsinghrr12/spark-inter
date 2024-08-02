<?php
$servername = "localhost:3306//";
$username = "ramsingh";
$password = "Ramsingh12@";
$dbname = "srfintern";
$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
die("Connection failed: " . mysqli_connect_error());
}
if (isset($_GET['id'])) {
    $customer_id = $_GET['id'];

    // Fetch customer details
    $sql = "SELECT * FROM bank WHERE id = '$customer_id'";
    $result = mysqli_query($conn, $sql);

    // Check if customer exists
    if ($result && mysqli_num_rows($result) > 0) {
        $customer = mysqli_fetch_assoc($result);
    } else {
        echo "No customer found with ID: $customer_id";
        exit;
    }
} else {
    echo "No customer ID provided.";
    exit;
}

// Close connection
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
    <title>Customer Details - Sparks Bank</title>
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
            max-width: 800px;
            margin-left: auto;
            margin-right: auto;
        }

        .details-container {
            background-color: rgba(0, 0, 0, 0.5);
            padding: 20px;
            border-radius: 15px;
            box-shadow: 2px 2px 10px gray;
        }

        h1 {
            text-align: center;
        }

        table {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
        }

        table th, table td {
            border: 1px solid #dee2e6;
            padding: 10px;
            text-align: left;
        }

        table th {
            background-color: #343a40;
        }

        .btn {
            display: inline-block;
            padding: 5px 10px;
            border-radius: 5px;
            text-decoration: none;
            color: #ffffff;
            background-color: #17a2b8;
            transition: background-color 0.3s;
            margin-top: 20px;
            text-align: center;
            display: block;
        }

        .btn:hover {
            background-color: #117a8b;
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
        <div class="details-container">
            <h1>Customer Details</h1>
            <table>
                <tr>
                    <th>Customer ID</th>
                    <td><?php echo $customer['id']; ?></td>
                </tr>
                <tr>
                    <th>Name</th>
                    <td><?php echo $customer['name']; ?></td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td><?php echo $customer['email']; ?></td>
                </tr>
                <tr>
                    <th>Balance</th>
                    <td><?php echo $customer['balance']; ?></td>
                </tr>
                <!-- Add more customer details as needed -->
            </table>
            <a href="all_cust.php" class="btn">Back to All Customers</a>
        </div>
    </div>
</body>

</html>
