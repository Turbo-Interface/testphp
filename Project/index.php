<?php
include_once "config.php";
if(isset($_POST["search"])){
    $search=$_POST["search_text"];
    $query="SELECT * FROM users WHERE id=$search ";
    $result=mysqli_query($mysqli,$query);
}else{
    $query="SELECT * FROM users";
    $result=mysqli_query($mysqli,$query)
     or die("Error : ".mysqli_error($mysqli));
}
?>

<html>
<head><title>
Home page
</title><link rel="stylesheet" type="text/css" href="css/style.css"></head>
<body>
    <div class="container">
    <header>
    <a href="index.php">LOGO</a>
    <a href="add.php">ADD</a>
    <a href="index.php">VIEW</a>
    <form method="post" action="index.php">
    <input type="text" name="search_text" placeholder="From ~13">
    <button type="submit" name="search">SEARCH</button>
    </form>
    </header>
    <section>
    <table>
    <tr>
    <th>NAME</th>
    <th>AGE</th>
    <th>EMAIL</th>
    <th>ACTIONS</th>
    </tr>
    <?php 
    while ($res=mysqli_fetch_array($result)){
        ?>
    <tr>
    <td><?php echo $res['sname'];?></td>
    <td><?php echo $res['age'];?></td>
    <td><?php echo $res['email'];?></td>
    <td>
    <a href="edit.php?id=<?php echo $res['id'] ?>">EDIT</a>
    <a href="delete.php?id=<?php echo $res['id'] ?>" onclick="return confirm('Are you sure ?')">DELETE</a>
    </td>
    </tr>
    <?php } ?>
    </table>
    </section>
    </div>
</body>
</html>
