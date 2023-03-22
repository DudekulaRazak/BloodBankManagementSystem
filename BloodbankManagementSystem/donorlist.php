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
    <link rel="stylesheet" href="css/userhomestyles.css">
    <link rel="stylesheet" href="css/table.css">
    <title>Admin Login</title>
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
    <h3>Donor List</h3>
    <?php
        $email=$_SESSION['email'];
        if(!$email)
            header("Location:index.php");
    ?>
    <div class="table">
        <table>
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Age</th>
                <th>Gender</th>
                <th>Guardian Name</th>
                <th>Blood Group</th>
                <th>Address</th>
                <th>Contact No.</th>
                <th>Email</th>
                <th>City</th>
                <th>Pincode</th>
            </tr>
            <?php
                $q=$db->query("Select * from donorregistrartion");
                while($r1=$q->fetch(PDO::FETCH_OBJ)){
                    ?>
                    <tr>
                        <td><?=$r1->fname;?></td>
                        <td><?=$r1->lname;?></td>
                        <td><?=$r1->age;?></td>
                        <td><?=$r1->gender;?></td>
                        <td><?=$r1->gname;?></td>
                        <td><?=$r1->bgroup;?></td>
                        <td><?=$r1->uaddress;?></td>
                        <td><?=$r1->phnumber;?></td>
                        <td><?=$r1->email_id;?></td>
                        <td><?=$r1->City;?></td>
                        <td><?=$r1->Pincode;?></td> 
                   </tr>   
                   <?php   
                }
            ?>
        </table>
    </div>
</div>
</body>
</html>