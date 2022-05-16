<?php

    session_start();
    $_SESSION['pageActive'] = "contact";
    include ("header.php");
    require ("php/db.php");

?>

    <section class="col-sm-10 col-md-6 mt-4 bg-light mx-auto form">
        <div class="col-10 mx-auto d-flex flex-column justify-content-center">
            <h4 class="pt-3 text-center">Contáctanos</h4>
            <form action="#" method="POST">
                <input class="col-12 input " type="text" name="name" placeholder="Ingrese su nombre" required>
                <input class="col-12 input my-1" type="email" name="email" placeholder="Ingrese su correo" required>
                <textarea class="col-12 input" name="msg" id="" cols="30" rows="10" placeholder="Déjanos un mensaje"></textarea>
                <input class="mx-auto my-1 button button-color4" type="submit" name="login" value="Enviar">
            </form>
        </div>
        <div class="col-12 py-4 d-flex justify-content-center">
            <a class="text-dark mx-2" href=""><i class="fa-brands fa-facebook fa-2x"></i></a>
            <a class="text-dark mx-2" href=""><i class="fa-brands fa-instagram fa-2x"></i></a>
            <a class="text-dark mx-2" href=""><i class="fa-brands fa-twitter fa-2x"></i></a>
        </div>
    </section>

<?php include ("footer.php");?>