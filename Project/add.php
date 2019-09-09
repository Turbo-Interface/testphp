<?php
include_once "config.php";
$error="";
if(isset($_POST['add'])){
    $sname=mysqli_real_escape_string($mysqli,$_POST['sname']);
    $age=mysqli_real_escape_string($mysqli,$_POST['age']);
    $email=mysqli_real_escape_string($mysqli,$_POST['email']);
    if(empty($sname) || empty($age) || empty($email))
    {
        $error="Please Fill All The Fields !";
    }else{
        $result=mysqli_query($mysqli,"INSERT INTO users (sname,age,email) VALUES ('$sname','$age','$email') ");
    }
}
?>

<html>
<head><title>
Insertion form
</title><link rel="stylesheet" type="text/css" href="css/style.css"></head>
<body>
<div class="container">
    <header>
    <a href="index.php">LOGO</a>
    <a href="index.php">VIEW</a>
    </header>
    <section class="add">
    <table>
    <form action="add.php" method="post">
    <tr>
    <th><h3>ADD NEW</h3></th>
    </tr>
    <tr><td><input type="text" name="sname" placeholder="Name"></td></tr>
    <tr><td><input type="text" name="age" placeholder="Age"></td></tr>
    <tr><td><input type="text" name="email" placeholder="Email"></td></tr>
    <tr><td><button type="submit" name="add">ADD</button></td></tr>
    <tr><td><p style="color:red";>
    <?php if($error!=""){
        echo $error;
    }?>
    </p>
    </td>
    </tr>
    </form>
    </table>
    </section>
    </div>
</body>
</html>
