<?php
include 'database/DBConnect.php';
include 'src/BookCategoryManager.php';
include 'src/Books.php';
$bookCategory = new BookCategoryManager();
$books = $bookCategory->getAll();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form method="get" action="action/search.php">
    <input type="search" name="search" placeholder="search by category">
    <button type="submit">Search</button>
</form>
<br>
<table border="1">
    <tr>
        <th>STT</th>
        <th>Category_id</th>
        <th>Category</th>
        <th>Description</th>
        <th><a href="action/add.php">ADD</a></th>
    </tr>
    <?php foreach ($books as $key=> $book): ?>
    <tr>
        <td><?php echo ++$key ?></td>
        <td><?php echo $book->getCategoryId() ?></td>
        <td><?php echo $book->getCategory() ?></td>
        <td><?php echo $book->getDescription() ?></td>
        <td><a onclick="return confirm('ban co chac chan muon xoa?')" href="action/delete.php?id=<?php echo $book->getCategoryId();?>">Delete</a></td>
        <td><a onclick="return confirm('ban muon update?')" href="action/update.php?id=<?php echo $book->getCategoryId();?>">Update</a></td>
    </tr>
    <?php endforeach; ?>
</table>
</body>
</html>
