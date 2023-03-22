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
    <link rel="stylesheet" href="css/userhomestyles.css">
    <title>User Login</title>
</head>
<body>
<div class="header">
    <h1>BLOOD BANK</h1>
    <h3>USER LOGIN</h3>
    <form action="" method="POST">
        <input type="email" name="email" placeholder="Email ID" required><br>
        <input type="password" name="password" placeholder="Password" required><br>
        <input type="submit" value="SUBMIT" name="login">
        New User? <a href="signup.php">sign up here</a>
    </form>
</div>
<?php
if(isset($_POST['login'])){
    $email=$_POST['email'];
    $password1=$_POST['password'];
    $q=$db->prepare("SELECT * FROM signupusers WHERE email='$email' && password1='$password1'");
    $q->execute();
    $res=$q->fetchAll(PDO::FETCH_OBJ);
    if($res){
        $_SESSION['email']=$email;
        header("Location:userhome.php");
        die;
    }
    else    
        echo "<script>alert('Wrong User');</script>";
}
?>
</body>
</html>