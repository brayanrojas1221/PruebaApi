<?php

namespace APP\Modules\Product;

class Controller {
    static public function index() {
        $ProductDAO = new \ProductDAO();
        $product = $ProductDAO->getById($_GET['id']);
        json($product);
    }
}