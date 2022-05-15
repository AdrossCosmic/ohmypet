<?php

    session_start();
    require ("db.php");

    if(isset($_SESSION['loggedin'])){
        header("Location: profile.php");
    }

    if (isset($_POST['login'])){
        $email = $_POST['email'];
        $password = $_POST['password'];

        // Consultar si el usuario existe 
        $prepareAccount = "SELECT * FROM users WHERE email = ? AND password = ?";
        $consultAccount = $pdo->prepare($prepareAccount);
        $consultAccount->execute(array($email, $password));
        $resultConsultAccount = $consultAccount->fetch();

        if ($resultConsultAccount){

            if($resultConsultAccount['itsAdmin'] === 1){
                $_SESSION['itsAdmin'] = true;

            } else {
                $_SESSION['itsAdmin'] = false;
            }

            session_regenerate_id();
            $_SESSION['id'] = $resultConsultAccount['id'];
            $_SESSION['loggedin'] = true;

            header("Location: ../profile.php");
        } else {
            $_SESSION['error'] = "Usuario o contraseña incorrecta";
            header("Location: ../login.php");
        }
    } 