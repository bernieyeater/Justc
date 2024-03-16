<!<!doctype html>
<html>
    <head>
        <meta charset="UTF-8"><!-- comment -->
        <title>Just Calories Goal Page</title>
            <style>
                h1 {color: blue;}
                h3 {color: red;}
            </style>
    </head>
    <body>
        <h1>Just Calories Goal Page</h1>
        <?php include('views/topbarnav.php');?>
        <br>
    
    <form action="goal.php" method="post">
        <label for="goal">New Goal Weight:</label>
        <input type="number" id="goal" name="goal" required>
        <input type="submit" value="Update Goal">
        <input type="hidden" name='action' value="update_or_add"/> 
    </form>
</body>
</html>


