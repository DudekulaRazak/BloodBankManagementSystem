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
    <link rel="stylesheet" href="css/table.css">
    <link rel="stylesheet" href="css/userhomestyles.css">

    </style>
</head>
<body>
<div class="">
<div class="navbar" >    
    <a href="home.php">Home</a>
    <a href="donor.php">Donor Registration</a>
    <a href="donorlist.php">Donor List</a>
    <a href="stock.php">Stock Blood List</a>
    <a href="requests.php">Request List</a>
    <a href="logout.php">Logout</a>
    </div>
    <h1>BLOOD BANK</h1>
    <h3>Blood Stock</h3>
    <?php
        $email=$_SESSION['email'];
        if(!$email)
            header("Location:index.php");
    ?>
        <div class="table">
        <table>
            <tr>
                <th>Blood Group</th>
                <th>Person Count</th>
                <th>Availablity(in ml)</th>
            </tr>
            <tr>
                <td>A+</td>
                <td><?php
                $q=$db->query("select * from donorregistrartion where bgroup='A+'");
                echo $row = $q->rowcount();
                ?></td>
                <td><?php
                $q=$db->query("select * from donorregistrartion where bgroup='A+'");
                echo $row = $q->rowcount()*100;
                ?></td>
            </tr>
            <tr>
                <td>A-</td>
                <td><?php
                $q=$db->query("select * from donorregistrartion where bgroup='A-'");
                echo $row = $q->rowcount();
                ?></td>
                <td><?php
                $q=$db->query("select * from donorregistrartion where bgroup='A-'");
                echo $row = $q->rowcount()*100;
                ?></td>
            </tr>
            <tr>
                <td>B+</td>
                <td><?php
                $q=$db->query("select * from donorregistrartion where bgroup='B+'");
                echo $row = $q->rowcount();
                ?></td>
                <td><?php
                $q=$db->query("select * from donorregistrartion where bgroup='B+'");
                echo $row = $q->rowcount()*100;
                ?></td>
            </tr>
            <tr>
                <td>B-</td>
                <td><?php
                $q=$db->query("select * from donorregistrartion where bgroup='B-'");
                echo $row = $q->rowcount();
                ?></td>
                <td><?php
                $q=$db->query("select * from donorregistrartion where bgroup='B-'");
                echo $row = $q->rowcount()*100;
                ?></td>
            </tr>
            <tr>
                <td>O+</td>
                <td><?php
                $q=$db->query("select * from donorregistrartion where bgroup='O+'");
                echo $row = $q->rowcount();
                ?></td>
                <td><?php
                $q=$db->query("select * from donorregistrartion where bgroup='O+'");
                echo $row = $q->rowcount()*100;
                ?></td>
            </tr>
            <tr>
                <td>O-</td>
                <td><?php
                $q=$db->query("select * from donorregistrartion where bgroup='O-'");
                echo $row = $q->rowcount();
                ?></td>
                <td><?php
                $q=$db->query("select * from donorregistrartion where bgroup='O-'");
                echo $row = $q->rowcount()*100;
                ?></td>
            </tr>
            <tr>
                <td>AB+</td>
                <td><?php
                $q=$db->query("select * from donorregistrartion where bgroup='Ab+'");
                echo $row = $q->rowcount();
                ?></td>
                <td><?php
                $q=$db->query("select * from donorregistrartion where bgroup='Ab+'");
                echo $row = $q->rowcount()*100;
                ?></td>
            </tr>
            <tr>
                <td>Ab-</td>
                <td><?php
                $q=$db->query("select * from donorregistrartion where bgroup='AB-'");
                echo $row = $q->rowcount();
                ?></td>
                <td><?php
                $q=$db->query("select * from donorregistrartion where bgroup='AB-'");
                echo $row = $q->rowcount()*100;
                ?></td>
            </tr>

        </table>
        </div>
</div>
</body>
</html>