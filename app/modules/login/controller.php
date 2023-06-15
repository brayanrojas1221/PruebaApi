<?php

namespace APP\Modules\Login;

class Controller {
    static public function index() {
        if ($_POST && isset($_POST['username']) && isset($_POST['password'])) {
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