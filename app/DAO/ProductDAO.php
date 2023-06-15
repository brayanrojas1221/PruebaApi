<?php

class ProductDAO {

    private $connection;

    public function __construct() {
        $this->connection = \DB::getInstance()->getConnection();
    }

    public function getById($id) {

        $query = "SELECT * FROM products WHERE id = $1";

        $result = pg_query_params($this->connection, $query, [ $id ]);
        
        if (!($result && pg_num_rows($result) > 0))
            return null;
    
        $row = pg_fetch_assoc($result);
        
        $Product = \ProductModel::getInstance();

        $Product->setId($row['id_client']);
        $Product->setName($row['name']);
        $Product->setPrice($row['price']);
        $Product->setDescription($row['description']);
        $Product->setQuantity($row['quantity']);
        $Product->setCreatedAt($row['created_at']);

        return $Product->toArray();
    }
}