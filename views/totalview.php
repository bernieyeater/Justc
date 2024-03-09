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
        <h1>Just Calories Total Calories Page</h1>
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
                <th>Meal</th>
                <th>Description</th>
                <th>Calories</th>
                <th>Portion</th>
                <th>Unit</th>
            </tr>
            <?php foreach($fooditems as $fooditem) : ?>
            <tr>
                <td><?php echo meal_desc($fooditem['Meal']); ?></td>
                <td><?php echo $fooditem['Description']; ?></td> 
                <td><?php echo $fooditem['Calories']; ?></td> 
                <td><?php echo $fooditem['Portion']; ?></td> 
                <td><?php echo $fooditem['Unit']; ?></td> 
            </tr>
             <?php $totalCalories += $fooditem['Calories']; // Add calories to total ?>
            <?php endforeach; ?>
        </table>
        <tr>
            <td colspan="5" style="text-align:right;"><strong>Total Calories: <?php echo $totalCalories; ?></strong></td>
        </tr>


        <?php include('views/footer.php');?>
    </body>
     
</html>

