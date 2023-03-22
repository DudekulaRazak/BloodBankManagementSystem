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
    <link rel="stylesheet" href="css/styles.css">
    <title>User Signup</title>
    <style>
        *{
  font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
}
    </style>
</head>
<body>
<div class="header">
    <h1>BLOOD BANK</h1>
    <h3>SIGN UP</h3>

    <form action="" method="POST">
        <input type="text" name="firstn" placeholder="First Name" required><br>
        <input type="text" name="lastn" placeholder="Last Name" required><br>
        <input type="email" name="email" placeholder="Email ID"required><br>
        <input type="password" name="password1" placeholder="Password"required><br>
        <input type="submit" value="SUBMIT" name="submit">
        <p>Already have an account? <a href="userlogin.php">Login here</a></p>
    </form>
    <?php
        if(isset($_POST['submit'])){
            $firstn=$_POST['firstn'];
            $lastn=$_POST['lastn'];
            $email=$_POST['email'];
            $password1=$_POST['password1'];
            $q=$db->query("select * from signupusers where email='$email'");
            $row = $q->rowcount();
            if(($row)>0){
                echo "<script>alert('User already exists with this email please login into your account')</script>";
            }
            else{
            $q=$db->prepare("INSERT INTO signupusers (firstn,lastn,email,password1) values(:firstn,:lastn,:email,:password1)");
            $q->bindValue('firstn',$firstn);
            $q->bindValue('lastn',$lastn);
            $q->bindValue('email',$email);
            $q->bindValue('password1',$password1);
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