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
    function get_by_name($jj)
    {
        if (!$name = $jj->get('GET.name'))
        {
            json([ 'error' => 'No se ha enviado el nombre del producto' ], 400);
        }
        $Model      =  new \ProductDAO();
        $Products   = $Model->get_by_name($name);
        json($Products);
    }
    function insert($jj)
    {
        $name        = $jj->get('POST.name');
        $price       = $jj->get('POST.price');
        $description = $jj->get('POST.description');
        $quantity    = $jj->get('POST.quantity');
        if (
            !$name ||
            !$price ||
            !$description ||
            !$quantity
        )
        {
            json([ 'error' => 'No se han enviado todos los datos' ], 400);
        }
        $Model  =  new \ProductDAO();
        $Model->insert(new Product($name, (float) $price, $description, (int) $quantity, date("Y-m-d H:i:s")));
        json([ 'message' => 'Producto creado correctamente' ], 201);
    }
    function update($jj)
    {
        $id          = $jj->get('POST.id');
        $name        = $jj->get('POST.name');
        $price       = $jj->get('POST.price');
        $description = $jj->get('POST.description');
        $quantity    = $jj->get('POST.quantity');
        if (
            !$id ||
            !$name ||
            !$price ||
            !$description ||
            !$quantity
        )
        {
            json([ 'error' => 'No se han enviado todos los datos' ]);
        }
        $Model      =  new \ProductDAO();
        $product    = new Product($name, (float) $price, $description, (int) $quantity, date("Y-m-d H:i:s"));
        $product->setId((int) $id);

        $Model->update($product);

        json([ 'message' => 'Producto actualizado correctamente' ]);
    }
    
    function delete($jj)
    {
        $id = $jj->get('POST.id');

        if (!$id)
        {
            json([ 'error' => 'No se ha enviado el id del producto' ]);
        }

        $Model  =  new \ProductDAO();
        $Model->delete($id);

        json([ 'message' => 'Producto eliminado correctamente' ]);
    }
}