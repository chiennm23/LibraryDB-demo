<?php
include '../database/DBConnect.php';
include '../src/BookCategoryManager.php';
include '../src/Books.php';
$bookCategory = new BookCategoryManager();
$bookCategory->delete($_GET['id']);
header('location:../index.php');