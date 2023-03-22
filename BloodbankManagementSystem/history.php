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
    <link rel="stylesheet" href="css/userhomestyles.css">
    <link rel="stylesheet" href="css/table.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">   
    <title>Blood Bank</title>
</head>
<body>
<div class="">
<div class="navbar" >    
    <a href="userhome.php">Home</a>
    <a href="request.php">Request</a>
    <a href="donate.php">Donate</a>
    <a href="history.php">Request History</a>
    <a href="searchdonor.php">Search Donor </a>
    <a href="profile.php">My Profile</a>
    <a href="userlogout.php">Logout</a>  
    </div>
    <div class="title">
    <h1>BLOOD BANK</h1>
    </div>
    <h3>Request History</h3>
    <div class="table">
        <table>
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Age</th>
                <th>Requested Blood Group</th>
                <th>Contact No.</th>
                <th>Email</th>
                <th>Status</th>
            </tr>
            <?php

                $email=$_SESSION['email'];
                $q=$db->query("Select * from requests where email_id='$email'");
                while($r1=$q->fetch(PDO::FETCH_OBJ)){
                    ?>
                    <tr>
                        <td><?=$r1->fname;?></td>
                        <td><?=$r1->lname;?></td>
                        <td><?=$r1->age;?></td>
                        <td><?=$r1->bgroup;?></td>
                        <td><?=$r1->phnumber;?></td>
                        <td><?=$r1->email_id;?></td>
                        <td><?=$r1->status;?></td>
                   </tr>   
                   <?php   
                }
            ?>
        </table>
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
                   <a href="commingsoon.php" target="#"><i class="fa fa-facebook"></i></a>
                   <a href="commingsoon.php" target="#"><i class="fa fa-instagram"></i></a>
                   <a href="commingsoon.php" target="#"><i class="fa fa-twitter"></i></a>
                   <a href="commingsoon.php" target="#"><i class="fa fa-youtube-play"></i></a>
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