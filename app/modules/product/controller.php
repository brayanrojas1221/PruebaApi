<?php

namespace APP\Modules\Product;

class Controller {
    static public function index() {
        render("index", [ "title" => "Login" ]);
    }
}