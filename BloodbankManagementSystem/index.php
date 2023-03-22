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
    <style>
        .header{
            background: linear-gradient(rgba(0,0,0,0.2), #242323) ,url(image/2381638.png);
            background-position: center;
            background-size: cover;
            width: 100%;
            height: 100vh;
        }
    </style>
    <title>Admin Login</title>
</head>
<body>
<div class="header">
    <h1>BLOOD BANK</h1>
    <h3>ADMIN LOGIN</h3>
    <form action= "" method="POST">
        <input type="email" name="email" placeholder="Email ID"><br>
        <input type="password" name="password" placeholder="Password"><br>
        <input type="submit" value="SUBMIT" name="login">
    </form>
</div>
<?php
if(isset($_POST['login'])){
    $email=$_POST['email'];
    $password=$_POST['password'];
    $q=$db->prepare("SELECT * FROM admin WHERE email='$email' && pass='$password'");
    $q->execute();
    $res=$q->fetchAll(PDO::FETCH_OBJ);
    if($res){
        $_SESSION['email']=$email;
        header("Location:home.php");
    }
    else    
        echo "<script>alert('Wrong User');</script>";
}
?>
</body>
</html>