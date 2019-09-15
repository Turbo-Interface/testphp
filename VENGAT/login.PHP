<?php
    $error=" ";
    if(isset($_POST['login'])){
        $usrname=$_POST['username'];
        $pass=$_POST['password'];
        if($usrname!="admin"||$pass!="siva")
        {  
            $error="Access Denied";        
        }   
    else{
        header("location:page2.php");
    }
    }
    ?>  

<html>
<head>
<title>login page</title></head>
<body><form method="post">
    <input type="text" name="username" >
    <input type="password" name="password">
    <button type="submit" name="login" >submit</button>
    </form>
<p style="color:red">
<?php if($error!=""){
     echo $error;
     }
     ?>
</p>
</body>
</html>