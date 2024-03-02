<!<!doctype html>
<html>
    <head>
        <meta charset="UTF-8"><!-- comment -->
        <title>User Login Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      
    <link rel="stylesheet" media='screen and (max-width: 799px)' href="mobile.css"/>
    <link rel="stylesheet" media='screen and (min-width: 800px)' href="desktop.css"/>
    </head>
    <body>
        <h1>Login Page</h1>
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

        <form action="login.php" method="post">
            <label>Email address:</label>
            <input type="text" name="email_address"/><br>  
            <label>Password:</label>
            <input type="password" name="password"/><br>  
            <label>&nbsp;</label>
            <input type="submit" value="Login"/>
        </form>
        <?php include('views/footer.php');?>
    </body>
    
</html>
