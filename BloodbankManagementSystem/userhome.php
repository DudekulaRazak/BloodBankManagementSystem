<?php
    include('connection.php');
    session_start();
    if(!$_SESSION['email']){
        header("location:userlogin.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blood Bank</title>
    <link rel="stylesheet" href="css/userhomestyles.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">   
</head>
<body>
<div class="navbar" >    
    <a href="userhome.php">Home</a>
    <a href="request.php">Request</a>
    <a href="donate.php">Donate</a>
    <a href="history.php">Request History</a>
    <a href="searchdonor.php">Search Donor </a>
    <a href="profile.php">My Profile</a>
    <a href="userlogout.php">Logout</a>  
    </div>
    <div class="container">
    <div class="title">
    <h1>BLOOD BANK</h1>
    </div>
    <h2>Dashboard</h2>
    <h3>Pending requests:<?php
        $q=$db->query("select * from requests");
        echo $row = $q->rowcount();
    ?>
    </h3>
    <div class="cards">
        <div class="card">
            
            <h1>A+ &#x1FA78;<h1>
            <p><?php
               $q=$db->query("select * from donorregistrartion where bgroup='A+'");
                echo $row = $q->rowcount();
            ?><p>
            <p><?php
                $q=$db->query("select * from donorregistrartion where bgroup='A+'");
                echo $row = $q->rowcount()*100;
                echo "ml";
            ?></p>
        </div>
        <div class="card">
            <h1>A- &#x1FA78;<h1>
            <p><?php
               $q=$db->query("select * from donorregistrartion where bgroup='A-'");
                echo $row = $q->rowcount();
            ?><p>
            <p><?php
                $q=$db->query("select * from donorregistrartion where bgroup='A-'");
                echo $row = $q->rowcount()*100;
                echo "ml";
            ?></p>
        </div>
        <div class="card">
            <h1>B+ &#x1FA78;<h1>
            <p><?php
               $q=$db->query("select * from donorregistrartion where bgroup='B+'");
                echo $row = $q->rowcount();
            ?><p>
            <p><?php
                $q=$db->query("select * from donorregistrartion where bgroup='B+'");
                echo $row = $q->rowcount()*100;
                echo "ml";
            ?></p>
        </div>
        <div class="card">
            <h1>B- &#x1FA78;<h1>
            <p><?php
               $q=$db->query("select * from donorregistrartion where bgroup='B-'");
                echo $row = $q->rowcount();
            ?><p>
            <p><?php
                $q=$db->query("select * from donorregistrartion where bgroup='B-'");
                echo $row = $q->rowcount()*100;
                echo "ml";
            ?></p>
        </div>
        <div class="card">
            <h1>O+ &#x1FA78;<h1>
            <p><?php
               $q=$db->query("select * from donorregistrartion where bgroup='O+'");
                echo $row = $q->rowcount();
            ?><p>
            <p><?php
                $q=$db->query("select * from donorregistrartion where bgroup='O+'");
                echo $row = $q->rowcount()*100;
                echo "ml";
            ?></p>
        </div>
        <div class="card">
            <h1>O- &#x1FA78;<h1>
            <p><?php
               $q=$db->query("select * from donorregistrartion where bgroup='O-'");
                echo $row = $q->rowcount();
            ?><p>
            <p><?php
                $q=$db->query("select * from donorregistrartion where bgroup='O-'");
                echo $row = $q->rowcount()*100;
                echo "ml";
            ?></p>
        </div>
        <div class="card">
            <h1>AB+ &#x1FA78;<h1>
            <p><?php
               $q=$db->query("select * from donorregistrartion where bgroup='AB+'");
                echo $row = $q->rowcount();
            ?><p>
            <p><?php
                $q=$db->query("select * from donorregistrartion where bgroup='AB+'");
                echo $row = $q->rowcount()*100;
                echo "ml";
            ?></p>
        </div>
        <div class="card">
            <h1>AB- &#x1FA78;<h1>
            <p><?php
               $q=$db->query("select * from donorregistrartion where bgroup='AB-'");
                echo $row = $q->rowcount();
            ?><p>
            <p><?php
                $q=$db->query("select * from donorregistrartion where bgroup='AB-'");
                echo $row = $q->rowcount()*100;
                echo "ml";
            ?></p>
        </div>
        </div>
    </div>
    <section id="contact">
        <div class="titlecon">
           <h1>CONTACT</h1> 
        </div>
           <p class="contactme">
               <b>Mail</b>: bloodbank@gmail.com <br>
               <b>Contact</b>: 78954-4512-89 </p><br>
               <div class="socialmedia">
                   <a href="commingsoon.php"><i class="fa fa-facebook"></i></a>
                   <a href="commingsoon.php"><i class="fa fa-instagram"></i></a>
                   <a href="commingsoon.php"><i class="fa fa-twitter"></i></a>
                   <a href="commingsoon.php"><i class="fa fa-youtube-play"></i></a>
               </div>
        </section>

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