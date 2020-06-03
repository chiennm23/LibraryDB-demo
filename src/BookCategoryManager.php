<?php


class BookCategoryManager
{
    protected $database;

    public function __construct()
    {
        $conn = new DBConnect();
        $this->database = $conn->connect();
    }

    public function getAll()
    {
        $sql = "SELECT * FROM Book_list";
        $stmt = $this->database->query($sql);
        $result = $stmt->fetchAll();
        $arr = [];
        foreach ($result as $item) {
            $books = new Books($item['category_id'], $item['category'], $item['description']);
            array_push($arr, $books);
        }
        return $arr;
    }

    public function add($book)
    {
        $sql = "INSERT INTO Book_list(category_id, category, description) VALUES (:category_id, :category, :description)";
        $stmt = $this->database->prepare($sql);
        $stmt->bindParam(':category_id', $book->getCategoryId());
        $stmt->bindParam(':category', $book->getCategory());
        $stmt->bindParam(':description', $book->getDescription());
        return $stmt->execute();
    }

    public function delete($id)
    {
        $sql = "DELETE FROM `Book_list` WHERE category_id = :category_id";
        $stmt = $this->database->prepare($sql);
        $stmt->bindParam('category_id', $id);
        $stmt->execute();
    }

    public function getId($id)
    {
        $sql = "SELECT * FROM Book_list WHERE category_id = '$id'";
        $stmt = $this->database->query($sql);
        $item = $stmt->fetch();
        $book = new Books($item['category_id'], $item['category'], $item['description']);
        return $book;
    }

    public function update($books)
    {
        $sql = "UPDATE Book_list SET category= :category, description = :description WHERE category_id = :category_id";
        $stmt = $this->database->prepare($sql);
        $stmt->bindParam(':category_id', $books->getCategoryId());
        $stmt->bindParam(':category', $books->getCategory());
        $stmt->bindParam(':description', $books->getDescription());
        return $stmt->execute();
    }

    public function search($keyword)
    {
        $sql = "SELECT * FROM `Book_list` WHERE category LIKE :keyword";
        $stmt = $this->database->prepare($sql);
        $stmt->bindValue(':keyword', '%' . $keyword . '%');
        $stmt->execute();
        $result = $stmt->fetchAll();
        $arr = [];
        foreach ($result as $item) {
            $book = new Books($item['category_id'], $item['category'], $item['description']);
            array_push($arr, $book);
        }
        return $arr;
    }
}