<?php

    session_start();
    require("db.php");

    if(isset($_POST['add'])){

        $id = $_POST['id'];
        $units = $_POST['units'];
        $color = $_POST['color'];
        
        $cart = $_SESSION['cart'];
        
        $cart[] = array("id" => $id, "units" => $units, "color" => $color);
        
    }

    $_SESSION['cart'] = $cart;
    header("Location: " .$_SERVER['HTTP_REFERER']."");



?>