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
    <link rel="stylesheet" href="css/profile.css">
    <link rel="stylesheet" href="css/form.css">
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
<div class="profile">
    <h1>BLOOD BANK</h1>
    <?php
        $email=$_SESSION['email'];
        $q=$db->query("select * from signupusers where email='$email'");
        $r1=$q->fetch(PDO::FETCH_OBJ);
        $q1=$db->query("select * from donorregistrartion where email_id='$email'");
        $r2=$q1->fetch(PDO::FETCH_OBJ);
        $row = $q1->rowcount();;
        ?>
        <div class="profileSection">
            <h3>Name: </h3>
            <p><?=$r1->firstn;?> <?=$r1->lastn;?></p><br>
            <h3>Phone No.: </h3>
            <p><?=$r2->phnumber;?></p><br>
            <h3>Email: </h3>
            <p><?=$r1->email;?></p><br>
            <h3>Blood Group: </h3>
            <p><?=$r2->bgroup;?></p><br>
            <h3>Gender: </h3>
            <p><?=$r2->gender;?></p><br>
            <h3>Age: </h3>
            <p><?=$r2->age;?></p><br>
            <h3>Your Requests: <?=$row;?></h3>
            <form method="POST">
            <input type="password" placeholder="Enter the new password to Change " name="newpass" required><br>
            <input type="submit" value="Change Password" name="changepass">
            </form>
        </div>
        <?php
        if(isset($_POST['changepass'])){
            $newpass = $_POST['newpass'];
            $q=$db->query("update signupusers set password1 = '$newpass' where email='$email'");
            echo "<script>alert('Your password has been changed successfully')</script>";
        }
    ?>
</div>

</body>
</html>