<?php
include '../database/DBConnect.php';
include '../src/BookCategoryManager.php';
include '../src/Books.php';
$bookCategory = new BookCategoryManager();
$result = $bookCategory->getId($_GET['id']);
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $category_id = $_GET['id'];
    $category = $_REQUEST['category'];
    $description = $_REQUEST['description'];
    $books = new Books($category_id, $category, $description);
    $bookCategory->update($books);
    header('location:../index.php');
}
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
<form method="post">
    Category_id
    <input type="text" name="id" disabled value="<?php echo $result->getCategoryId()?>"><br>
    Category
    <input type="text" name="category" value="<?php echo $result->getCategory()?>"><br>
    Description
    <input type="text" name="description" value="<?php echo $result->getDescription()?>"><br>
    <button type="submit">UpDate</button>
</form>

</body>
</html>
