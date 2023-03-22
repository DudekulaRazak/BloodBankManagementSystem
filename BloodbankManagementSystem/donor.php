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
    <link rel="stylesheet" href="css/donorform.css">
    <link rel="stylesheet" href="css/userhomestyles.css">
    <title>Admin Login</title>
</head>
<body>
    <div class="navbar" >    
        <a href="home.php">Home</a>
        <a href="donor.php">Donor Registration</a>
        <a href="donorlist.php">Donor List</a>
        <a href="stock.php">Stock Blood List</a>
        <a href="requests.php">Request List</a>
        <a href="logout.php">Logout</a>
    </div>
    <div class="bodycontainer">
        <?php
        $email=$_SESSION['email'];
        if(!$email)
        header("Location:index.php");
        ?>
    <form class="form" action="" method="POSt">
        <h3>Donor Registration</h3><br>
        <label for="">First Name</label>
        <input type="text" name="fname" required>
        <label for="">Last Name</label>
        <input type="text" name="lname" required>
        <label for="">Age</label>
        <input type="text" name="age" required>
        <label for="">Gurdian Name</label>
        <input type="text" name="gname" required>
        <label for="">Address</label>
        <input type="text" name="uaddress">
        <label for="">contact No.</label>
        <input type="text" name="phnumber" required>
        <label for="">Email</label>
        <input type="email" name="email_id" required>
        <label for="">City</label>
        <input type="text" name="City">
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
        </select><br>
        <label for="">Gender</label>
        <select name="gender" required>
        <option value="male">Male</option>
        <option value="female">Female</option>
        <option value="other">Do not specify</option>
        </select><br>
        <input type="submit" value="Submit" name="submit">
    </form>
    <?php
        if(isset($_POST['submit'])){
            $fname=$_POST['fname'];
            $lname=$_POST['lname'];
            $age=$_POST['age'];
            $gender=$_POST['gender'];
            $gname=$_POST['gname'];
            $bgroup=$_POST['bgroup'];
            $uaddress=$_POST['uaddress'];
            $phnumber=$_POST['phnumber'];
            $email_id=$_POST['email_id'];
            $City=$_POST['City'];
            $Pincode=$_POST['Pincode'];
            $q1=$db->query("select * from donorregistrartion where email_id='$email_id'");
            $row = $q1->rowcount();
            if(($row)>0){
                echo "<script>alert('Donor already exists with this email')</script>";
            }else{
            $q=$db->prepare("INSERT INTO donorregistrartion (fname,lname,gname,uaddress,phnumber,email_id,City,Pincode,bgroup,age,gender) values(:fname,:lname,:gname,:uaddress,:phnumber,:email_id,:City,:Pincode,:bgroup,:age,:gender)");
            $q->bindValue('fname',$fname);
            $q->bindValue('lname',$lname);
            $q->bindValue('gname',$gname);
            $q->bindValue('age',$age);
            $q->bindValue('gender',$gender);
            $q->bindValue('bgroup',$bgroup);
            $q->bindValue('uaddress',$uaddress);
            $q->bindValue('phnumber',$phnumber);
            $q->bindValue('email_id',$email_id);
            $q->bindValue('City',$City);
            $q->bindValue('Pincode',$Pincode);
            if($q->execute()){
                echo "<script>alert('Registration Successful')</script>";
            }
            else{
                echo "<script>alert('Error occurred')</script>";
            }
        } 
    }
    ?>
</div>
</body>
</html>