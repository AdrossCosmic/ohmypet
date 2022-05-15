<?php

    session_start();
    include("header.php");
    require("php/db.php");

    if(!isset($_SESSION['loggedin'])){
        header("Location: login.php");
    }

    ?>


    <section class="col-12">
        <a href="php/logout.php"> Cerrar sesión</a>
    </section>


<?php include("footer.php");?>