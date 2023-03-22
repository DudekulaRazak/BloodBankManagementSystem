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
    <style>
        .request {
            display: flex;
            background-color: #f2f2f2;
            padding: 20px;
            box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
            border-radius: 10px;
            transition: 0.3s;
            cursor: pointer;
        }
        .request h3{
            margin-left: 40px;
        }
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
    <div class="request">
    <h3>Pending requests:<?php
        $q=$db->query("select * from requests where status = 'pending'");
        echo $row = $q->rowcount();
    ?>
    </h3>
    <h3>Approved requests:<?php
        $q=$db->query("select * from requests where status = 'approved'");
        echo $row = $q->rowcount();
    ?>
    </h3>
    <h3>Rejected requests:<?php
        $q=$db->query("select * from requests where status = 'rejected'");
        echo $row = $q->rowcount();
    ?>
    </h3>
    </div>
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
                <th>Request Blood Group</th>
                <th>Contact No.</th>
                <th>Email</th>
                <th>Action</th>
                <th>status</th>
            </tr>
            <?php
                $q=$db->query("Select * from requests");
                while($r1=$q->fetch(PDO::FETCH_OBJ)){
                    ?>
                    <tr>
                        <form method="POST">
                        <input type="hidden" name ="id" value="<?=$r1->id;?>">
                        <input type="hidden" name ="bgroup" value="<?=$r1->bgroup;?>">
                        <td><?=$r1->fname;?></td>
                        <td><?=$r1->lname;?></td>
                        <td><?=$r1->age;?></td>
                        <td><?=$r1->gender;?></td>
                        <td><?=$r1->bgroup;?></td>
                        <td><?=$r1->phnumber;?></td>
                        <td><?=$r1->email_id;?></td>
                        <td><input type="submit" value="Approve" name="approve">
                           <input type="submit" value="Reject" name="reject"></td>
                        </form>
                        <td><?=$r1->status;?></td>
                </tr>
                <?php   
                }
                ?>
        </table>
        </div>
        <?php
            if(isset($_POST['approve'])){
                $bgroup=$_POST['bgroup'];
                $v=$db->query("select * from donorregistrartion where bgroup ='$bgroup'");
                $a=$v->rowcount();
                if($a>0){
                $id = $_POST['id'];
                $q1 = $db->prepare("update requests set status='approved' where id='$id'");
                $q1->execute();
                }
                else{
                    echo "<script>alert('No specific donor for this blood type')</script>";
                }
            }
            if(isset($_POST['reject'])){
                $id = $_POST['id'];
                $q1 = $db->prepare("update requests set status='rejected' where id='$id'");
                $q1->execute();
            }
        ?>
</div>
</body>
</html>