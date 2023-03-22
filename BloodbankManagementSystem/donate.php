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
    <link rel="stylesheet" href="css/form.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">   
    <title>Blood Bank</title>
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
    <div class="title">
    <h1>BLOOD BANK</h1>
    <h3>Donate and Save</h3>
    </div>
    <div class="formcontainer">
    <form method="POST">
    <label for="">First Name</label>
        <input type="text" name="fname" required><br>
        <label for="">Last Name</label>
        <input type="text" name="lname" required><br>
        <label for="">Age</label>
        <input type="text" name="age" required><br>
        <label for="">contact No.</label>
        <input type="text" name="phnumber" required><br>
        <label for="">Email</label>
        <input type="email" name="email_id"><br>
        <label for="">City</label>
        <input type="text" name="City"><br>
        <label for="">Pincode</label>
        <input type="text" name="Pincode"><br>
        <label for="bgroup">Blood Group </label>
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
        <br>
        <input type="submit" value="Submit" name="submit">
    </form>
    </div>
    <?php
        if(isset($_POST['submit'])){
            $fname=$_POST['fname'];
            $lname=$_POST['lname'];
            $age=$_POST['age'];
            $bgroup=$_POST['bgroup'];
            $phnumber=$_POST['phnumber'];
            $email_id=$_POST['email_id'];
            $City=$_POST['City'];
            $Pincode=$_POST['Pincode'];
            $q1=$db->query("select * from donorregistrartion where email_id='$email_id'");
            $row = $q1->rowcount();
            if(($row)>0){
                echo "<script>alert('Donor already exists with this email')</script>";
            }else{
            $q=$db->prepare("INSERT INTO donorregistrartion (fname,lname,phnumber,email_id,bgroup,age,City,Pincode) values(:fname,:lname,:phnumber,:email_id,:bgroup,:age,:City,:Pincode)");
            $q->bindValue('fname',$fname);
            $q->bindValue('lname',$lname);
            $q->bindValue('age',$age);
            $q->bindValue('bgroup',$bgroup);
            $q->bindValue('phnumber',$phnumber);
            $q->bindValue('email_id',$email_id);
            $q->bindValue('City',$City);
            $q->bindValue('Pincode',$Pincode);
            if($q->execute()){
                echo "<script>alert('Donor Added')</script>";
            }
            else{
                echo "<script>alert('Error occurred')</script>";
            }
        } 
    }
    ?>
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