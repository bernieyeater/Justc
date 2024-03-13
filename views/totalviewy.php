<!<!doctype html>
<html>
    <head>
        <meta charset="UTF-8"><!-- comment -->
        <title>Just Calories Total Calories Page</title>
            <style>
                h1 {color: blue;}
                h3 {color: red;}
            </style>
    </head>
    <body>
        <h1> Total Calories Yesterday</h1>
        <?php include('views/topbarnav.php');?>
        <br>
        <a href="total.php">Today</a>
        <br>
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
        <br>
        <table>
            <tr>
                <th>Meal</th>
                <th>Description</th>
                <th>Calories</th>
                <th>Portion</th>
                <th>Unit</th>
                <th>Delete</th>
            </tr>
            <?php foreach($foodlogs as $foodlog) : ?>
            <tr>
                <td><?php echo meal_desc($foodlog['Meal']); ?></td>
                <td><?php echo $foodlog['Description']; ?></td> 
                <td><?php echo $foodlog['Calories']; ?></td> 
                <td><?php echo $foodlog['Portion']; ?></td> 
                <td><?php echo $foodlog['Unit']; ?></td> 
               <td>
                  <a href="deleteFoodItem.php?Log_ID=<?php echo urlencode($foodlog['Log_ID']); ?>">Delete</a>
               </td>
            </tr>
             <?php $totalCalories += $foodlog['Calories']; // Add calories to total ?>
            <?php endforeach; ?>
        </table>
        <br>
        <tr>
            <td colspan="5" style="text-align:right;"><strong>Total Calories: <?php echo $totalCalories; ?></strong></td>
        </tr>
        <br><br>
        <tr>
            <td colspan="5" style="text-align:right;"><strong>Total Goal: <?php echo $user_goal; ?></strong></td>
        </tr>
            <a href="goal.php">Change Goal</a>
        <?php include('views/footer.php');?>
    </body>
     
</html>

