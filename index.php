<?php
session_start();
use app\Controllers\HomeController;
require "./vendor/autoload.php";
// Route (Điều hướng)
$act = $_GET['act'] ?? '/';

match ($act) {
    // Nơi khai báo các đường dẫn
    '/' => (new HomeController())->index(),
    'add' => (new HomeController())->add(),
    'edit' => (new HomeController())->edit($_GET['id']),
    'delete' => (new HomeController())->delete($_GET['id']),
};
