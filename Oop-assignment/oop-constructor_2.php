<?php
class Book
{
    public $title;
    public $author;
    public $price;

    function __construct($title, $author, $price)
    {
        $this->title = $title;
        $this->author = $author;
        $this->price = $price;
    }

    function getInfo()
    {
        return "Sách: {$this->title} - Tác giả: {$this->author} - Giá: {$this->price} VNĐ";
    }
}

$book1 = new Book("ABC", "Nguyễn Văn A", 12000);
$book2 = new Book("ABD", "Nguyễn Văn B", 13000);
$book3 = new Book("AFD", "Nguyễn Văn C", 14000);


echo $book1->getInfo() . "<br>";
echo $book2->getInfo() . "<br>";
echo $book3->getInfo() . "<br>";
