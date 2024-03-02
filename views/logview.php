<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Log Food Screen</title>
        <style>
            h1 { color: blue; }
            h3 { color: red; }
            h4 { color: green; } /* Assuming you want a different color for general messages */
        </style>
    </head>
    <body>
        <h1>Log Food Page</h1>
        
        <?php include('views/topbarnav.php'); ?>
        
        <!-- Error messages -->
        <?php if ($error_message != ""): ?>
            <h3>ERROR: <?php echo $error_message; ?></h3><br>
        <?php endif; ?>

        <?php if ($message != ""): ?>
            <h4><?php echo $message; ?></h4><br>
        <?php endif; ?>

        <h2>Join Just Calories!</h2>
        <form action="log.php" method="post">
            <label>Description</label>
            <input type="text" name="Description"/><br>
            
            <label>Calories</label>
            <input type="text" name="Calories"/><br>
            
            <label>Portion</label>
            <input type="text" name="Portion"/><br>
            
            <input type="hidden" name='action' value="add_food_item">
            
            <!-- Meal Type Radio Buttons -->
            <label>Meal Type:</label><br>
            <input type="radio" id="breakfast" value="Breakfast" name="user_radial_button">
            <label for="breakfast">Breakfast</label><br>
            
            <input type="radio" id="lunch" value="Lunch" name="user_radial_button">
            <label for="lunch">Lunch</label><br>
            
            <input type="radio" id="dinner" value="Dinner" name="user_radial_button">
            <label for="dinner">Dinner</label><br>
            
            <input type="submit" value="Add"/>
        </form>

        <?php include('views/footer.php'); ?>
    </body>
</html>

