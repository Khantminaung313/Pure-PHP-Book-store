<?php
include "confs/auth.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h1>New Category</h1>

    <form action="cat-add.php" method="post">
        <label for="name">Category Name</label>
        <input type="text" name="name" id="name">

        <label for="remark">Remark</label>
        <textarea name="remark" id="remark"></textarea>

        <br><br>
        <input type="submit" value="Add Category">
    </form>
</body>
</html>