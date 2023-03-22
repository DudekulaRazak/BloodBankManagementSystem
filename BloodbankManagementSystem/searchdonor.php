<?php
    include('connection.php');
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
    <a href="userhome.php">Home</a>
    <a href="request.php">Request</a>
    <a href="donate.php">Donate</a>
    <a href="history.php">Request History</a>
    <a href="searchdonor.php">Search Donor </a>
    <a href="profile.php">My Profile</a>
    <a href="signup.php">Logout</a>  
    </div>
    <h1>BLOOD BANK</h1>
    <h3>Donor List</h3>
    <form method="POST">
    <label for="bgroup">Search Blood Group </label>
        <select name="bgroup" required>
        <option value="A+">A+</option>
        <option value="A-">A-</option>
        <option value="B+">B+</option>
        <option value="B-">B-</option>
        <option value="O+">O+</option>
        <option value="O-">O-</option>
        <option value="AB+">AB+</option>
        <option value="AB-">AB-</option>
        </select>
        <input type="submit" name="submit" value="SEARCH">
    </form>
    <div class="table">
        <table>
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Age</th>
                <th>Guardian Name</th>
                <th>Blood Group</th>
                <th>Address</th>
                <th>Contact No.</th>
                <th>Email</th>
                <th>City</th>
                <th>Pincode</th>
            </tr>
            <?php
                $bgroup;
                if(isset($_POST['submit'])){
                $bgroup=$_POST['bgroup'];
                $q=$db->query("Select * from donorregistrartion where bgroup='$bgroup'");
                while($r1=$q->fetch(PDO::FETCH_OBJ)){
                    ?>
                    <tr>
                        <td><?=$r1->fname;?></td>
                        <td><?=$r1->lname;?></td>
                        <td><?=$r1->age;?></td>
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
            }
            ?>
        </table>
    </div>
</div>
</body>
</html>