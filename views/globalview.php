<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Just Calories Total Calories Page</title>
    <style>
        h1 { color: blue; }
        h3 { color: red; }
        h4 { color: green; } /* Assuming you want a different color for general messages */
    </style>
</head>
<body>
    <h1>Total Calories Today</h1>
    <?php include('views/topbarnav.php'); ?>

    <?php if ($error_message != ""): ?>
        <h3>ERROR: <?php echo htmlspecialchars($error_message); ?></h3><br>
    <?php endif; ?>
    
    <?php if ($message != ""): ?>
        <h4><?php echo htmlspecialchars($message); ?></h4><br>
    <?php endif; ?>
        <br>
    <form action="global.php" method="post">
        <label for="searchTerm">Search for a food item:</label>
        <input type="text" id="searchTerm" name="searchTerm">
        <input type="submit" value="Search">
    </form>
        <br>
    <table>
        <tr>
            <th>Description</th>
            <th>Calories</th>
            <th>Portion</th>
            <th>Unit</th>
            <th>Delete</th>
        </tr>
        <?php foreach($fooditems as $fooditem): ?>
            <tr>
                <td><a href="views/mealview.php?Myfood_ID=<?php echo urlencode($fooditem['Myfood_ID']); ?>"><?php echo $fooditem['Description']; ?></a></td>
                <td><?php echo htmlspecialchars($fooditem['Calories']); ?></td>
                <td><?php echo htmlspecialchars($fooditem['Portion']); ?></td>
                <td><?php echo htmlspecialchars($fooditem['Unit']); ?></td>
                <td>
                  <a href="deleteFoodList.php?Log_ID=<?php echo urlencode($fooditem['Myfood_ID']); ?>">Delete</a>
               </td>
            </tr>
        <?php endforeach; ?>
    </table>

    <?php include('views/footer.php'); ?>
</body>
</html>

