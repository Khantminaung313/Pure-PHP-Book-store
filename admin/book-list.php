<?php
include "confs/auth.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book List</title>
    <link rel="stylesheet" href="css/style.css">
       
</head>
<body>
<h1>Book List</h1>
<ul class="menu">
    <li><a href="book-list.php">Manage Books</a></li>
    <li><a href="cat-list.php">Manage Categories</a></li>
    <li><a href="order.php">Manage Order</a></li>
    <li><a href="logout.php">Logout</a></li>
</ul>

<?php
include "confs/config.php";

$result = mysqli_query($conn, "SELECT books.*, categories.name 
                        FROM books LEFT JOIN categories ON books.category_id = categories.id 
                        ORDER BY created_date DESC");
?>

<ul class="books">
    <?php while($row = mysqli_fetch_assoc($result)) : ?>
        <li class="list">
            <div class="details">
                
                <b class="title"><?php echo $row['title'] ?></b>
                <i class="author">By <?php echo $row['author'] ?></i>
                <small class="category">(in <?php echo $row['name'] ?> )</small>
                <span class="price">$-<?php echo $row['price'] ?></span>
                <div class="summary"><?php echo $row['summary'] ?></div>
                
                <a href="book-delete.php?id=<?php echo $row['id'] ?>" id="Del">[Del]</a>
                <a href="book-edit.php?id=<?php echo $row['id'] ?>" id="Edit">[Edit]</a>
            </div>
            <img src="covers/<?php echo $row['cover']?>" alt="" class="image"  height="140">
        </li>
        <?php endwhile ?>
    </ul>

<a href="book-new.php" class="new">New Book</a>
</body>
</html>