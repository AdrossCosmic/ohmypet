<?php

    session_start();
    require("db.php");

    if(isset($_POST['add'])){

        
        // $id = $_POST['id'];
        $id = 30;
        $cart = $_SESSION['cart'];
        $units = $_POST['units'];
        $color = $_POST['color'];

        $requestUnits = "SELECT * FROM products WHERE id = $id";
        $consultUnits = $pdo->prepare($requestUnits);
        $consultUnits->execute();
        $result = $consultUnits->fetch();


        $i = 0;
        

        // Verifica si el carrito está vacío
        if (empty($_SESSION['cart'])){

            // Agrega el producto al carrito
            $cart[] = array("id" => $id, "units" => $units, "color" => $color);
            $_SESSION['cart'] = $cart;
            header("Location: " .$_SERVER['HTTP_REFERER']."");

        } else {

            echo print_r($cart) ." Carrito actual" ."</br></br>";

            echo "$id" ." Id a buscar" ."</br></br>";

            foreach ($cart as $item => $product['id']){

                if(in_array($id, $product['id'])){
                    
                    echo "El id " ."$id" ." existe en el carrito" ."</br></br>";

                    $busqueda = array_search($id, $product['id']);

                    if ($busqueda){

                        echo "El id " ."$id" ." existe en la posición " .$item ."</br></br>";

                        $i = $i + 1;

                        echo "Cantidad de aciertos " .$i ."</br></br>";

                    }

                
                } else {

                    echo "El id " ."$id" ." NO existe en la posición " .$item ."</br></br>";

                    echo "Cantidad de aciertos " .$i ."</br></br>" ;

                    // echo print_r($cart) ." Carrito actualizado" ."</br></br>";
        
                    }
                }  
            }  
        }
    
        // $_SESSION['cart'] = $cart;
        // header("Location: " .$_SERVER['HTTP_REFERER']."");





?>