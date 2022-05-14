<?php

session_start();
require("db.php");

if(isset($_POST['add'])){

    
    $id = $_POST['id'];
    $cart = $_SESSION['cart'];
    $units = $_POST['units'];
    $color = $_POST['color'];

    $requestUnits = "SELECT * FROM products WHERE id = $id";
    $consultUnits = $pdo->prepare($requestUnits);
    $consultUnits->execute();
    $result = $consultUnits->fetch();

    $i = 0;
    $position = 0;
    

    // Verifica si el carrito está vacío
    if (empty($_SESSION['cart'])){

        // Agrega el producto al carrito
        $cart[] = array("id" => $id, "units" => $units, "color" => $color);
        $_SESSION['cart'] = $cart;
        header("Location: " .$_SERVER['HTTP_REFERER']."");

    } else {

        // Si no está vacío, el ciclo foreach buscará en cada elemento del carrito si ya existe el id del producto que se quiere agregar
        foreach ($cart as $item => $product['id']){

            // En caso de que exista
            if(in_array($id, $product['id'])){
                
                // Busca exactamente en qué posición se almacena
                if (array_search($id, $product['id'])){

                    // Suma 1 a la variable que verificará la siguiente acción 
                    $i = $i + 1;
                    // Almacena la posición del objeto que contiene el id que coincide con el que se busca
                    $position = $item;

                }
            // Si no existe, simplemente saltará la validación y lo agregará al carrito
            }} 
            
            // Si el id no se encuentra agregado al carrito, lo agregará
            if ($i === 0){
                $cart[] = array("id" => $id, "units" => $units, "color" => $color);
                $_SESSION['cart'] = $cart;
                header("Location: " .$_SERVER['HTTP_REFERER']."");

            // Si el id ya se encuentra agregado al carrito, validará si la cantidad de unidades solicitadas está disponible
            } else {

                // Suma las unidades solicitadas y las que ya existen en el carrito
                $sumUnits = $units + $cart[$position]['units'];

                // Si el resultado de la suma es menor o igual a las cantidades disponibles en la db, actualizará las unidades del carrito
                if ($sumUnits <= $result['units']){

                    $_SESSION['cart'][$position]['units'] = $sumUnits;
                    header("Location: " .$_SERVER['HTTP_REFERER']."");

                // Si el resultado de la suma es mayor a las cantidades disponibles en la db, no se agregarán al carrito.
                } else {
                    $_SESSION['error'] = "Unidades insuficientes";
                    header("Location: " .$_SERVER['HTTP_REFERER']."");
                }
            }
        }  
    }
?>