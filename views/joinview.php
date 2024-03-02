<!<!doctype html>
<html>
    <head>
        <meta charset="UTF-8"><!-- comment -->
        <title>User Join Page</title>
            <style>
                h1 {color: blue;}
                h3 {color: red;}
            </style>
    </head>
    <body>
        <h1>User Join Page</h1>
        
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

        </table>
            <br>
            <h2>Join Just Calories!</h2>
        <form action="join.php" method="post">
            <label>First Name:</label>
            <input type="text" name="FName"/><br> 
            <label>Last Name:</label>
            <input type="text" name="LName"/><br>   
            <label>Email address:</label>
            <input type="text" name="email_address"/><br>  
            <label>Password:</label>
            <input type="text" name="password"/><br>  
            <label>&nbsp;</label>
            <input type="hidden" name='action' value="add"/>   
            <input type="submit" value="Add"/>
        </form>

        <?php include('views/footer.php');?>
    </body>
     
</html>

