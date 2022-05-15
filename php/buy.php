<?php

    session_start();
    require("db.php");

    if(!isset($_SESSION['loggedin'])){
        header("Location: login.php");
    }

    $cart = $_SESSION['cart'];

    
    function consultProducts($z, $pdo){
        $requestUnits = "SELECT * FROM products WHERE id = $z";
        $consultUnits = $pdo->prepare($requestUnits);
        $consultUnits->execute();
        $result = $consultUnits->fetch();

        return($result);
    }

    function updateUnits ($x, $z, $pdo){
        $requestProducts = "UPDATE products SET units = $x WHERE id = $z";
        $updateUnits = $pdo->prepare($requestProducts);
        $updateUnits->execute();
    }

    foreach ($cart as $item => $product){

        $consultResult = consultProducts($product['id'], $pdo);
        
        $newUnits = $consultResult['units'] - $product['units'];
        
        updateUnits($newUnits, $product['id'], $pdo);
        unset($cart);
        $_SESSION['cart'] = $cart;


    }
    header("Location: " .$_SERVER['HTTP_REFERER']."");
    ?>