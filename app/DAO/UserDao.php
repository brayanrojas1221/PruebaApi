<?php

class UserDAO {

    private $connection;

    public function __construct() {
        $this->connection = \DB::getInstance()->getConnection();
    }

    public function getByUsernameAndPassword($username, $password) {

        $query = "SELECT * FROM users WHERE username = $1 and password = $2 ";
        $result = pg_query_params($this->connection, $query, array($username, $password));
        if (!($result && pg_num_rows($result) > 0))
            return null;
    
        $row = pg_fetch_assoc($result);
        
        $user = \UserModel::getInstance();

        $user->setId($row['id']);
        $user->setUserName($row['username']);

        return $user->toArray();
    }
}