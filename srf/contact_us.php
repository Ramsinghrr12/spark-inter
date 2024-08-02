<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
        integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Contact Us - Sparks Bank</title>
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

        .content {
            background-color: rgba(0, 0, 0, 0.5);
            padding: 20px;
            border-radius: 15px;
            box-shadow: 2px 2px 10px gray;
        }

        h2, p {
            margin-bottom: 20px;
        }

        form input, form textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: none;
            border-radius: 5px;
        }

        form button {
            padding: 10px 20px;
            border-radius: 5px;
            border: none;
            background-color: #343a40;
            color: #ffffff;
            cursor: pointer;
        }

        form button:hover {
            background-color: #495057;
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
        <div class="content">
            <h2>Contact Us</h2>
            <p>If you have any questions or need assistance, please fill out the form below and we will get back to you as soon as possible.</p>
            <form action="contact_us.php" method="post">
                <input type="text" name="name" placeholder="Your Name" required>
                <input type="email" name="email" placeholder="Your Email" required>
                <input type="text" name="subject" placeholder="Subject" required>
                <textarea name="message" rows="5" placeholder="Your Message" required></textarea>
                <button type="submit">Send Message</button>
            </form>
        </div>
    </div>
</body>

</html>

<?php
// contact_us.php backend
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    // You can store these details in a database or send them via email.
    // Example: save to a file (for demonstration purposes)
    $log = "contact_messages.txt";
    $entry = "Name: $name\nEmail: $email\nSubject: $subject\nMessage: $message\n\n";
    file_put_contents($log, $entry, FILE_APPEND);

    echo "<script>alert('Your message has been sent!');</script>";
}
?>
