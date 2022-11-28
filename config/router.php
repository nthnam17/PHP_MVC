<?php
require_once(__DIR__.'../../app/controllers/admin/adminCotroller.php');
require_once(__DIR__.'../../app/controllers/admin/categoryController.php');
require_once(__DIR__.'../../app/controllers/admin/customerController.php');
require_once(__DIR__.'../../app/controllers/admin/productController.php');
require_once(__DIR__.'../../app/controllers/client/homeController.php');


$adminController = new AdminController();
$categoryController = new categoryController();
$customerController = new customerController();
$productController = new productController();
$homeController = new homeController();

$subforder = '/website__mvc';
$path = get_uri($subforder);
$path = (!$path) ? '/' : $path;


$isAdmin = strpos($path, 'admin');


if($isAdmin) {
    if($path == '/admin/login' && !empty($_SESSION['admin'])) {
        header("Location: /website__mvc/admin");
    }
    switch($path){
        case '/admin/login': return $adminController->login(); break;
    }
    if(empty($_SESSION['admin'])){
        header("Location: /website__mvc/admin/login");

    }
    switch($path) {
        case '/admin': return $adminController->index(); break;
        case '/admin/loguot': return $adminController->loguot(); break;
        case '/admin/category': return $categoryController->index(); break;
        case '/admin/category/create': return $categoryController->create(); break;
        case '/admin/category/edit': return $categoryController->edit(); break;
        case '/admin/category/delete': return $categoryController->delete(); break;
        case '/admin/customers': return $customerController->index(); break;
        case '/admin/customers/create': return $customerController->create(); break;
        case '/admin/customers/edit': return $customerController->edit(); break;
        case '/admin/customers/delete': return $customerController->create(); break;
        case '/admin/product': return $productController->index(); break;
        case '/admin/product/create': return $productController->create(); break;
        case '/admin/product/edit': return $productController->edit(); break;
        case '/admin/product/detail': return $productController->show(); break;
        case '/admin/product/delete': return $productController->delete(); break;

    }
}

    switch($path) {
        case '/home': return $homeController->index(); break;
    }