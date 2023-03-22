<?php
    include('connection.php');
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"> 
</head>
<body>
    <div class="navbar" >    
        <a href="home.php">Home</a>
        <a href="logout.php">Logout</a>
    </div>
<div class="container">
    <h1>BLOOD BANK</h1><hr>
    <p>Welcome Admin User..!</p>
    <h2 style="text-align:center;">Dashboard</h2>
    <div class="cards">
        <div class="card">
            <a href="requests.php">
            <h2>Pending Request</h2><p><?php
            $q=$db->query("select * from requests where status='pending'");
            echo $row = $q->rowcount();
        ?></p>
        </a>
        </div>
        <div class="card">
            <a href="donorlist.php">
            <h2>Donors Registered</h2><p><?php
            $q=$db->query("select * from donorregistrartion");
            echo $row = $q->rowcount();
        ?></p>
        </a>
        </div>
        <div class="card">
            <a href="commingsoon.php">
            <h2>Donation camps</h2>
            <p>Announce here..!</p>
            </a>
        </div>
    </div>
    <?php
        $email=$_SESSION['email'];
        if(!$email)
            header("Location:index.php");
    ?>
    <div class="donor"> 
            <div class="list"><a href="donor.php">Donor Registration</a></div>
            <div class="list"><a href="donorlist.php">Donor List</a></div>
            <div class="list"><a href="stock.php">Stock Blood List</a></div>
            <div class="list"><a href="requests.php">Request List</a></div>
    </div>

    
</div>
    <footer>
        <a href="commingsoon.php">FAQ</a>
        <a href="commingsoon.php">CONTACT ME</a>
        <a href="commingsoon.php">TERMS OF USE</a>
        <a href="commingsoon.php">PRIVACY POLICY</a>
        <a href="commingsoon.php">REFUND POLICY</a>
        <a href="commingsoon.php">&copy; 2021 | BLOOD BANK</a>
    </footer>
</body>
</html>