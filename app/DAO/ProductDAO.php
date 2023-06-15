<?php

class ProductDAO {

    private $connection;

    public function __construct() {
        $this->connection = \DB::getInstance()->getConnection();
    }

    public function getProducts() {

        $query = "SELECT * FROM products";

        $result = pg_query_params($this->connection, $query,[]);
        
        if (!($result && pg_num_rows($result) > 0))
            return null;
    
        $Products = array();
    
        while ($row = pg_fetch_assoc($result)) {

            $Product = \ProductModel::getInstance();

            $Product->setId($row['id']);
            $Product->setName($row['name']);
            $Product->setPrice($row['price']);
            $Product->setDescription($row['description']);
            $Product->setQuantity($row['quantity']);
            $Product->setCreatedAt($row['created_at']);
                        
            array_push($Products, $Product->toArray());
        }
    
        return $Products;
    }
}