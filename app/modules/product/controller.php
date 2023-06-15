<?php

namespace APP\Modules\Product;

class Controller {
    static public function index() {
        if (isset($_POST['id'])) {
            $UserDAO = new \UserDAO();
            $user = $UserDAO->getByUsernameAndPassword($_POST['username'], $_POST['password']);
            if (!$user) {
                json([ "success" => false, "message" => "Usuario o contraseña incorrectos" ]);
            } else {
                $_SESSION['user'] = $user;
                json([ "success" => true ]);
            }
        }
        render("index", [ "title" => "Login" ]);
    }
}