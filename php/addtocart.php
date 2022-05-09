<?php

    session_start();
    require("db.php");

    if(!empty($_GET['id'])){

        $carrito_mio = $_SESSION['carrito'];
        $id = $_GET['id'];
        $carrito_mio[] = $id;
        
    }

    if(isset($_POST['buy'])){
        $_SESSION['carrito'] = 0;
    }

    $_SESSION['carrito'] = $carrito_mio;
    header("Location: " .$_SERVER['HTTP_REFERER']."");



?>