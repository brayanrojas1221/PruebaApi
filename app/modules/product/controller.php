<?php

namespace APP\Modules\Product;

class Controller {
    static public function index() {
       
        render("index", [ "title" => "products" ]);
    }
    static public function getProducts(){
        $ProductDAO = new \ProductDAO();
        $product = $ProductDAO->getProducts();
        json($product);  
    }
}