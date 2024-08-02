<?php
$servername = "localhost:3306//";
$username = "ramsingh";
$password = "Ramsingh12@";
$dbname = "srfintern";
$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM transfers ORDER BY transfer_date DESC";
$result = mysqli_query($conn, $sql);

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
    <title>Transactions - Sparks Bank</title>
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

        .table-container {
            background-color: rgba(0, 0, 0, 0.5);
            padding: 20px;
            border-radius: 15px;
            box-shadow: 2px 2px 10px gray;
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #343a40;
            padding: 10px;
            text-align: center;
        }

        th {
            background-color: #343a40;
        }

        tr:nth-child(even) {
            background-color: #3b3f42;
        }

        tr:nth-child(odd) {
            background-color: #2b2e31;
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
        <div class="table-container">
            <h2>All Transactions</h2>
            <table>
                <thead>
                    <tr>
                        <th>Transaction ID</th>
                        <th>Sender Account</th>
                        <th>Receiver Account</th>
                        <th>Amount</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) { ?>
                            <tr>
                                <td><?php echo $row['id']; ?></td>
                                <td><?php echo $row['sender_id']; ?></td>
                                <td><?php echo $row['receiver_id']; ?></td>
                                <td><?php echo $row['amount']; ?></td>
                                <td><?php echo $row['transfer_date']; ?></td>
                            </tr>
                        <?php } 
                    } else { ?>
                        <tr>
                            <td colspan="5">No transactions found</td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>
