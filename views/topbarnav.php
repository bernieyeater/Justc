<!DOCTYPE html>
<header>
    <a href="index.php">Home</a>

<?php 
if (isset($_SESSION['is_logged_in'])) { 
    ?>
    <a href="login.php?action=logout">Logout</a>
    <a href="log.php">Log</a>
    <a href="total.php">Total</a>
    <?php if ($_SESSION["user_id"]==4) { 
        //56 is the admin
        ?>
      <a href="users.php">Users</a>  
    <?php }?>
<?php } else { ?>
    <a href="login.php">Login</a>
    <a href="join.php">Join</a>

<?php }
?>
</header>


                

