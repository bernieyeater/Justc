<!<!doctype html>
<html>
    <head>
        <meta charset="UTF-8"><!-- comment -->
        <title>Just Calories Users Page</title>
            <style>
                h1 {color: blue;}
                h3 {color: red;}
            </style>
    </head>
    <body>
        <h1>Just Calories Users Page</h1>
        <?php include('views/topbarnav.php');?>
        <?php
        //Error messeges
        if ($error_message!=""){
            echo "<h3>ERROR: ".$error_message;
            echo "<h3><br>";
        }
        if ($message!=""){
            echo "<h4> $message";
            echo "<h4><br>";
        } ?>
        <table>
            <tr>
                <th>User ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
            </tr>
            <?php foreach($users as $user) : ?>
            <tr>
                <td><?php echo $user['id']; ?></td> 
                <td><?php echo $user['FName']; ?></td> 
                <td><?php echo $user['LName']; ?></td> 
                <td><?php echo $user['email_address']; ?></td> 
            </tr>
            <?php endforeach; ?>
        </table>
            <br>
            <h2>Update or Add Users</h2>
        <form action="users.php" method="post">
            <label>User ID:</label>
            <input type="text" name="id"/><br>
            <label>First Name:</label>
            <input type="text" name="FName"/><br>        
            <label>Last Name:</label>
            <input type="text" name="LName"/><br>        
            <label>Email address:</label>
            <input type="text" name="email_address"/><br>  
            <label>Password:</label>
            <input type="text" name="password"/><br>  
            <label>&nbsp;</label>
            <input type="hidden" name='action' value="update_or_add"/>   
            <br>
            <input type="radio" value="update" name="user_radial_button">Update<br>
            <input type="radio" value="add" name="user_radial_button">Add<br>
            <br>
            <input type="submit" value="Update or Add User"/>
        </form>
            </br>
            <h2>Delete Users</h2>
        <form action="users.php" method="post">
            <label>User Email:</label>
            <input type="text" name="email_address"/><br>
            <input type="hidden" name='action' value="delete"/>   
            <input type="submit" value="Delete User"/>
        </form>
        <?php include('views/footer.php');?>
    </body>
     
</html>

