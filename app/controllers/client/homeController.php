<?php
    include_once(__DIR__.'/../baseController.php');
    include_once(__DIR__.'/../../models/product.php');
class homeController extends baseController{
    public  function index(){
        $modelProduct = new product();
        $data = $modelProduct->getAllData();

        return  $this->renderViewFrontend('views/client/index',$data);
    }
}