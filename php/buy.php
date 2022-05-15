<?php

    session_start();
    require("db.php");

    date_default_timezone_set('America/Bogota');

    if(!isset($_SESSION['loggedin'])){
        header("Location: login.php");
    }

    $cart = $_SESSION['cart'];

    // Consulta los productos en la db
    function consultProducts($z, $pdo){
        $requestUnits = "SELECT * FROM products WHERE id = $z";
        $consultUnits = $pdo->prepare($requestUnits);
        $consultUnits->execute();
        $result = $consultUnits->fetch();

        return($result);
    }

    // Actualiza la cantidad de unidades disponibles
    function updateUnits ($x, $z, $pdo){
        $requestProducts = "UPDATE products SET units = $x WHERE id = $z";
        $updateUnits = $pdo->prepare($requestProducts);
        $updateUnits->execute();
    }

    function createHistory($idUser, $idProduct, $units, $totalCost, $pdo){

        $date = date('Y-m-d H:i');

        $prepareHistory = "INSERT INTO history (idUser, idProduct, units, totalCost, date) VALUES (?,?,?,?,?)";
        $makeHistory = $pdo->prepare($prepareHistory);
        $makeHistory->execute(array($idUser, $idProduct, $units, $totalCost, $date));
    }

    foreach ($cart as $item => $product){

        // Consulta los datos de cada artículo
        $consultResult = consultProducts($product['id'], $pdo);
        // Alamcena la resta entre las unidades del carrito y las unidades de la db
        $newUnits = $consultResult['units'] - $product['units'];
        // ALmacena el costo total de cada item según sus unidades
        $totalCost = $product['units'] * $consultResult['price']; 
        
        // Actualiza las unidades disponibles en la db
        updateUnits($newUnits, $product['id'], $pdo);
        // Crea el historial de compras
        createHistory($_SESSION['id'], $product['id'], $product['units'], $totalCost, $pdo);
        
    }

    unset($cart);
    $_SESSION['cart'] = $cart;

    header("Location: " .$_SERVER['HTTP_REFERER']."");
?>