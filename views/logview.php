<!<!doctype html>
<html>
    <head>
        <meta charset="UTF-8"><!-- comment -->
        <title>Log Food Screen</title>
            <style>
                h1 {color: blue;}
                h3 {color: red;}
            </style>
    </head>
    <body>
        <h1>Log Food Page</h1>
        
        <?php include('views/topbarnav.php');?>
        <?php
        //Error messeges
        if ($error_message!=""){
            echo "<h3>ERROR: ".$error_message;
            echo "</h3><br>";
        }
        if ($message!=""){
            echo "<h4> $message";
            echo "</h4><br>";
        } ?>

        </table>
            <br>
            <h2>Join Just Calories!</h2>
        <form action="log.php" method="post">

            <label>Description</label>
            <input type="text" name="Description"/><br>   
            <label>Calories</label>
            <input type="text" name="Calories"/><br>  
            <label>Portion</label>
            <input type="text" name="Portion"/><br>  
            <label>&nbsp;</label>
           <input type="hidden" name='action' value="Type_meal"/>   
            <br>
            <input type="radio" value="Breakfast" name="user_radial_button">Breakfast<br>
            <input type="radio" value="Lunch" name="user_radial_button">Lunch<br>
            <input type="radio" value="Lunch" name="user_radial_button">Dinner<br>
            <br>
            <input type="submit" value="Add"/>
        </form>

        <?php include('views/footer.php');?>
    </body>
     
</html>

