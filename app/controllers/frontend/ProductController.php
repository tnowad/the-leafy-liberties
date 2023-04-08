<?php

use Core\Controller;
use Core\Database;

class ProductController extends Controller
{
  private $db;

  public function __construct()
  {
    $this->db = new Database();
  }

  public function index()
  {
    $sql = "SELECT * FROM books";
    $result = $this->db->execute($sql);
    $books = $this->db->fetchAll($result);
    require_once "../../views/layouts/default.php";
  }

  public function create()
  {
    require_once "../../views/layouts/default.php";
  }

  public function store()
  {
    $title = $_POST['title'];
    $author = $_POST['author'];
    $publisher = $_POST['publisher'];
    $price = $_POST['price'];
    $isbn = $_POST['isbn'];
    $description = $_POST['description'];
    $image_url = $_POST['image_url'];

    $sql = "INSERT INTO books (title, author, publisher, price, isbn, description, image_url) VALUES ('$title', '$author', '$publisher', '$price', '$isbn', '$description', '$image_url')";
    $this->db->execute($sql);
    header("Location: ../../views/layouts/default.php");
  }

  public function edit($id)
  {
    $sql = "SELECT * FROM books WHERE id = $id";
    $result = $this->db->execute($sql);
    $book = $this->db->fetchAll($result);
    require_once "../../views/layouts/default.php";
  }

  public function update($id)
  {
    $title = $_POST['title'];
    $author = $_POST['author'];
    $publisher = $_POST['publisher'];
    $price = $_POST['price'];
    $isbn = $_POST['isbn'];
    $description = $_POST['description'];
    $image_url = $_POST['image_url'];

    $sql = "UPDATE books SET title = '$title', author = '$author', publisher = '$publisher', price = '$price', isbn = '$isbn', description = '$description', image_url = '$image_url' WHERE id = $id";
    $this->db->execute($sql);
    header("Location: ../../views/layouts/default.php");
  }

  public function delete($id)
  {
    $sql = "DELETE FROM books WHERE id = $id";
    $this->db->execute($sql);
    header("Location: ../../views/layouts/default.php");
  }
}
