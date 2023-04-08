<?php
require_once "../core/Controller.php";
require_once "../core/Database.php";
require_once "../app/controllers/frontend/ProductController.php";

$productController = new ProductController();

// Test phương thức index()
echo "Test phương thức index():<br>";
$productController->index();

// Test phương thức create()
echo "<br>Test phương thức create():<br>";
$productController->create();

// Test phương thức store()
echo "<br>Test phương thức store():<br>";
$_POST['title'] = "Sách A";
$_POST['author'] = "Tác giả A";
$_POST['publisher'] = "NXB A";
$_POST['price'] = "100000";
$_POST['isbn'] = "123456789";
$_POST['description'] = "Mô tả sách A";
$_POST['image_url'] = "https://example.com/image_a.jpg";
$productController->store();

// Test phương thức edit()
echo "<br>Test phương thức edit():<br>";
$id = 1;
$productController->edit($id);

// Test phương thức update()
echo "<br>Test phương thức update():<br>";
$_POST['title'] = "Sách B";
$_POST['author'] = "Tác giả B";
$_POST['publisher'] = "NXB B";
$_POST['price'] = "200000";
$_POST['isbn'] = "987654321";
$_POST['description'] = "Mô tả sách B";
$_POST['image_url'] = "https://example.com/image_b.jpg";
$productController->update($id);

// Test phương thức delete()
echo "<br>Test phương thức delete():<br>";
$productController->delete($id);
