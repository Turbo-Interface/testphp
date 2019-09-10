<?php

# Log 1 : Edit.php has no compile-time errors . But there is this exception where the database cannot be updated with the new values

$error="";
include_once "config.php";

if(isset($_POST['update'])) {
    $id=mysqli_real_escape_string($mysqli,$_POST['id']);
    $sname=mysqli_real_escape_string($mysqli,$_POST['sname']);
    $age=mysqli_real_escape_string($mysqli,$_POST['age']);
    $email=mysqli_real_escape_string($mysqli,$_POST['email']);
    if (empty($sname)||empty($age)||empty($email)) 
    {
        $error="Please Fill All The Fields";
    }
    else 
    {
        $result=mysqli_query($mysqli,"UPDATE users SET sname='$sname' , age='$age' , email='$email' where id=$id ");    
        # Log 2 : The above query can be wrong , Trusted updates are recommended 
    
       header("location:index.php");
    }
}
?>

<?php
$id=$_GET['id'];
$result=mysqli_query($mysqli,"SELECT * FROM users WHERE id=$id");
while ($res=mysqli_fetch_array($result)) {
    $sname=$res['sname'];
    $age=$res['age'];
    $email=$res['email'];
}
?>

<html>
<head><title>
edit.php
</title><link rel="stylesheet" type="text/css" href="css/style.css"></head>
<body>
<div class="container">
    <header>
    <a href="index.php">LOGO</a>
    <a href="index.php">VIEW</a>
    </header>
    <section class="edit">
    <form name="form1" method="post" action="edit.php">
    <table border=0>
    
    <tr>
    <td><h3>ID : </h3></td>
    <td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>><?php echo $_GET['id'];?></td>
    </tr>
    <tr>
    <td>Name : </td>
    <td><input type="text" name="sname" value="<?php echo $sname;?>"></td>
    </tr>
    <tr>
    <td>Age : </td>
    <td><input type="text" name="age" value="<?php echo $age;?>"></td>
    </tr>
    <tr>
    <td>E-mail : </td>
    <td><input type="text" name="email" value="<?php echo $email;?>"></td>
    </tr>
    <tr>
    <td colspan="2" align="center">
    <button type="submit" name="update">update</button>
    </td>
    </tr>
    <tr>
    <td>
    <p style="color:red;">
    <?php if ($error!="") {
        echo $error;
    }?>
    </p>
    </td>
    </tr>
    </table>
    </form>
    </section>
</div>
</body>
</html>
<?php


?>