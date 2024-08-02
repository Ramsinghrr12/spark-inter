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
    <title>All customers - Sparks Bank</title>
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
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table th, table td {
            border: 1px solid #dee2e6;
            padding: 10px;
            text-align: center;
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
            margin: 5px;
            transition: background-color 0.3s;
        }

        .btn-success {
            background-color: #28a745;
        }

        .btn-info {
            background-color: #17a2b8;
        }

        .btn-success:hover {
            background-color: #218838;
        }

        .btn-info:hover {
            background-color: #117a8b;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
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
            <h1 class="header">All Customers</h1>
            <table>
                <thead>
                    <tr>
                        <th scope="col">Customer ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Balance</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $servername = "localhost:3306//";
                    $username = "ramsingh";
                    $password = "Ramsingh12@";
                    $dbname = "srfintern";
                    $conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

                    // Fetch all customers
                    $sql = "SELECT * FROM bank";
                    $result = mysqli_query($conn, $sql);

                    // Check if there are customers
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>
                                    <td>" . $row['id'] . "</td>
                                    <td>" . $row['name'] . "</td>
                                    <td>" . $row['email'] . "</td>
                                    <td>" . $row['balance'] . "</td>
                                    <td>
                                        <a href='send_money.php?reads=" . $row['id'] . "' class='btn btn-success'>Send Money</a>
                                        <a href='customer_details.php?id=" . $row['id'] . "' class='btn btn-info'>View Details</a>
                                    </td>
                                </tr>";
                        }
                    } else {
                        echo "<tr><td colspan='5'>No customers found</td></tr>";
                    }

                    // Close connection
                    mysqli_close($conn);
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>
