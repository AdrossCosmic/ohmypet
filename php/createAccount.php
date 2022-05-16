<?php

    session_start();
    require ("db.php");

    if(isset($_SESSION['loggedin'])){
        header("Location: profile.php");
    }

    // Para crear cuenta
    if(isset($_POST['register'])){
        $name = $_POST['name'];
        $lastName = $_POST['lastName'];
        $email = $_POST['email'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $passwordConfirm = $_POST['passwordConfirm'];

        // Verificar si el usuario ya existe 

        $consultUser = "SELECT * FROM users WHERE username = ?";
        $sendUser = $pdo->prepare($consultUser);
        $sendUser->execute(array($username));
        $resultConsultUser = $sendUser->fetch();

        // Si el usuario no existe
        if (!$resultConsultUser){

            // Si las contraseñas coinciden
            if($password === $passwordConfirm){

                $prepareAccount = "INSERT INTO users (name, lastname, email, username, password, itsAdmin) VALUES (?,?,?,?,?,?)";
                $createAccount = $pdo->prepare($prepareAccount);
                $createAccount->execute(array($name, $lastName, $email, $username, $password, 0));

                header("Location: ../login.php");

            } else {
                $_SESSION['error'] = "Las contraseñas no coinciden";
                header("Location: ../login.php");
            }
        } else {
            $_SESSION['error'] = "El nombre de usuario ya se encuentra en uso";
            header("Location: ../login.php");
        }
    }