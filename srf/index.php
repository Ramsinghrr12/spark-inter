<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" sizes="180x180" href="statics/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="statics/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="statics/favicon-16x16.png">
    <link rel="manifest" href="statics/site.webmanifest">
    <title>Welcome to Sparks Bank</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #212529;
            color: white;
            margin: 0;
            padding: 0;
        }

        #lock {
            display: none;
            position: fixed;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            z-index: 20;
            background: rgb(255, 255, 255) center no-repeat;
            text-align: center;
        }

        @media screen (orientation:landscape) {
            #lock {
                display: none;
            }

            #container {
                display: block;
            }
        }

        @media screen and (orientation:portrait) {
            #lock {
                display: block;
            }

            #container {
                display: none;
            }
        }

        /* Custom Navbar */
        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #343a40;
            padding: 10px 20px;
            box-shadow: 0px 0px 10px 0px black;
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 10;
        }

        .navbar img {
            height: 80px;
        }

        .navbar-nav {
            display: flex;
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .nav-item {
            margin-left: 15px;
        }

        .nav-link {
            color: white;
            text-decoration: none;
            font-size: 18px;
            padding: 10px;
        }

        .nav-link:hover {
            text-decoration: underline;
        }

        /* Custom Button */
        .mybtn {
            margin-bottom: 10px;
            box-shadow: 2px 2px 10px black;
            border-radius: 30px;
            background-color: white;
            font-weight: bold;
            color: black;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
        }

        .mybtn:hover {
            background-color: black;
            color: white;
        }

        .container-large {
            width: 100%;
            padding: 8% 2% 2% 2%;
            background-color: #212529;
            text-align: center;
        }

        .container-large h1 {
            font-size: 71px;
            text-shadow: 3px 3px 3px grey;
            margin-bottom: 20px;
        }

        .container-large img {
            width: 400px;
        }

        .container {
            backdrop-filter: blur(10px);
            box-shadow: 3px 3px 15px black;
            border-radius: 30px;
            padding: 20px;
            background-color: #212529;
        }

        .row {
            display: flex;
            justify-content: space-around;
            margin: 0;
            padding: 0;
        }

        .col-lg {
            flex: 1;
            margin: 10px;
            text-align: center;
        }

        .col-lg i {
            font-size: 5rem;
            margin-bottom: 20px;
        }

        .card {
            background-color: #343a40;
            color: white;
            width: 90%;
            border-radius: 30px;
            box-shadow: 3px 3px 8px gray;
            padding: 20px 10px;
        }

        .footer {
            text-align: center;
            padding: 20px;
            background-color: #343a40;
            color: white;
            position: fixed;
            width: 100%;
            bottom: 0;
        }
    </style>
</head>

<body>

    <div id="lock">
        <img src="statics/PngItem_5146697.png" alt="" style="width:50%; margin-top:50%;"><br>
        <h1 style="color:black; margin-top: 25px;"><b>Please rotate the device. </b><br>We support only landscape mode.
        </h1>
    </div>

    <div id="container">

        <nav class="navbar">
            <a href="index.php"><img src="statics/logo.png" alt=""></a>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="home.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="send_money.php">Send Money</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="all_cust.php">View All Customers</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="transactions.php">Transactions</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contact_us.php">Contact Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="about_us.php">About Us</a>
                </li>
            </ul>
        </nav>

        <div class="container-large">
            <div class="row">
                <div class="col">
                    <h1 class="zoomfont"><b>Welcome to Sparks Bank!</b></h1>
                </div>
                <div class="col">
                    <img src="statics/finance.png" class="zoomin" alt="">
                </div>
            </div>
        </div>
        <img src="statics/abstbg2.png" alt="" style="width:100%; position:absolute; z-index:-1">

        <center style="margin:60px 0px 20px 0px;">
            <div class="container">
                <h1 style="text-shadow:2px 2px 2px gray;"><b>Our Awesome Facilities</b></h1>
                <div class="container" style="margin:30px 0px 20px 0px;">
                    <div class="row">
                        <div class="col-lg">
                            <div class="card">
                                <i class="fas fa-users"></i><br><br>
                                <a href="all_cust.php"><button type="button" class="mybtn">View Customers</button></a><br>
                                <h6>Here, you can view every customer of the bank.</h6>
                            </div>
                        </div>
                        <div class="col-lg">
                            <div class="card">
                                <i class="fas fa-comments-dollar"></i><br><br>
                                <a href="send_money.php"><button type="button" class="mybtn">Transfer Money</button></a><br>
                                <h6>Here, you can send money from your account.</h6>
                            </div>
                        </div>
                        <div class="col-lg">
                            <div class="card">
                                <i class="fas fa-coins"></i><br><br>
                                <a href="check_blc.php"><button type="button" class="mybtn">Check Balance</button></a><br>
                                <h6>Here, you can check the remaining balance in your account.</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </center>
    </div>

    <script>
        $(document).ready(function () {
            $(".zoomin").animate({
                width: '400px'
            }, '5000', 'linear');
            $(".zoomfont").animate({
                fontSize: '71px'
            }, '5000', 'linear');
        });
    </script>

</body>

</html>
