<?php


class Books
{
    protected $category_id;
    protected $category;
    protected $description;

    public function __construct($category_id, $category, $description)
    {
        $this->category_id = $category_id;
        $this->category = $category;
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getCategoryId()
    {
        return $this->category_id;
    }

    /**
     * @return mixed
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $category_id
     */
    public function setCategoryId($category_id)
    {
        $this->category_id = $category_id;
    }
}