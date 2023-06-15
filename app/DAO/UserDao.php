<?php

class UserDAO {

    private $connection;

    public function __construct() {
        $this->connection = \DB::getInstance()->getConnection();
    }

    public function getByUsernameAndPassword($username, $password) {

        $query = "SELECT * FROM clients WHERE usuario = $1 and contrasena = $2 and estado = true";

        $passwordMD5 = md5($password);

        $result = pg_query_params($this->connection, $query, array($username, $passwordMD5));
        
        if (!($result && pg_num_rows($result) > 0))
            return null;
    
        $row = pg_fetch_assoc($result);
        
        $user = \UserModel::getInstance();

        $user->setId($row['id_client']);
        $user->setUserName($row['usuario']);

        return $user->toArray();
    }
}