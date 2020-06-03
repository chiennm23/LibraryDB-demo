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
<form method="post">
    Category_id
    <input type="text" name="id"><br>
    Category
    <input type="text" name="category"><br>
    Description
    <input type="text" name="description"><br>
    <button type="submit">ADD</button>
</form>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    include '../database/DBConnect.php';
    include '../src/BookCategoryManager.php';
    include '../src/Books.php';
    $category_id = $_POST['id'];
    $category = $_REQUEST['category'];
    $description = $_REQUEST['description'];
    if (isset($_POST['id'])){
        echo "<script> alert('Please enter another ID')</script>";
    } else {
        $book = new Books($category_id, $category, $description);
        $bookCategory = new BookCategoryManager();
        $bookCategory->add($book);
        header('location:../index.php');
    }
}
?>
</body>
</html>
