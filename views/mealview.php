<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Select Meal</title>
        <style>
            h1 { color: blue; }
            h3 { color: red; }
            h4 { color: green; }
        </style>
    </head>
    <body>
        <h1>Select Meal</h1>
        
        <?php include('topbarnav.php'); ?>
        


        <?php
        $foodItemId = $_GET['Myfood_ID'];
        echo "Food Item".$foodItemId;
        ?>

            
            
            
            
        <h2>Log Food Below!</h2>
        <form action="../addFoodToLog.php" method="post">
            <input type="hidden" name="Myfood_ID" value="<?php echo htmlspecialchars($foodItemId); ?>">
            <!-- Meal Type Radio Buttons -->
            <label>Meal Type:</label><br>
            <input type="radio" id="breakfast" value="Breakfast" name="user_radial_button">
            <label for="breakfast">Breakfast</label><br>
            
            <input type="radio" id="lunch" value="Lunch" name="user_radial_button">
            <label for="lunch">Lunch</label><br>
            
            <input type="radio" id="dinner" value="Dinner" name="user_radial_button">
            <label for="dinner">Dinner</label><br>
            <br>

            <input type="submit" value="Add"/>
        </form>

        <?php include('footer.php'); ?>
    </body>
</html>

