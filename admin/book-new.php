<?php
include "confs/auth.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Book</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <h1>Add New Book</h1>

    <form action="book-add.php" method="post" enctype="multipart/form-data">
        <label for="title">Book Title</label>
        <input type="text" name="title" id="title">

        <label for="author">Author</label>
        <input type="text" name="author" id="author">

        <label for="summary">Summary</label>
        <textarea name="summary" id="summary"></textarea>

        <label for="price">Price</label>
        <input type="text" name="price" id="price">

        <label for="categories">Category</label>
        <select name="category_id" id="category">
            <option value="0">-- Choose --</option>
            <?php
            include "confs/config.php";
            $result = mysqli_query($conn, "SELECT id, name FROM categories");
            while ($row = mysqli_fetch_assoc($result)) :
            ?>
                <option value="<?php echo $row['id'] ?>">
                    <?php echo $row['name'] ?>
                </option>
            <?php endwhile ?>
        </select>

        <label for="cover">Cover</label>
        <input type="file" name="cover" id="cover">

        <br><br>
        <input type="submit" value="Add Book">
        <a href="book-list.php" class="back">Back</a>
    </form>
</body>

</html>