<?php
include "confs/auth.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categories List</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <h1>Categories List</h1>
    <ul class="menu">
        <li><a href="book-list.php">Manage Books</a></li>
        <li><a href="cat-list.php">Manage Categories</a></li>
        <li><a href="order.php">Manage Order</a></li>
        <li><a href="logout.php">Logout</a></li>
    </ul>

    <?php
    include "confs/config.php";
    $result = mysqli_query($conn, "SELECT * FROM categories");
    ?>

    <ul>
        <?php while ($row = mysqli_fetch_assoc($result)) : ?>
            <li title="<?php echo $row['remark'] ?>">
                [<a href="cat-delete.php?id=<?php echo $row['id'] ?>" class="del">Del</a>]
                [<a href="cat-edit.php?id=<?php echo $row['id'] ?>" class="del">Edit</a>]
                <?= $row['name'] ?>
            </li>
        <?php endwhile ?>
    </ul>

    <a href="cat-new.php" class="new">New Category</a>
</body>

</html>