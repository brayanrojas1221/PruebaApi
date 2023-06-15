<?php

namespace APP\Modules\Login;

class Controller {
    static public function index() {
        if ($_POST && isset($_POST['username']) && isset($_POST['password'])) {
            $_SESSION['user'] = $_POST['username'];
            json([ "success" => true ]);
        }

        render("index", [ "title" => "Login" ]);
    }
}