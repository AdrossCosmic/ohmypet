<?php

    session_start();
    require ("php/db.php");
    include ("header.php");

?>

    <section class="col-4 my-5 bg-light mx-auto">
        <div class="col-10 mx-auto d-flex flex-column justify-content-center">
            <h4 class="pt-3 text-center">Iniciar sesión</h4>
            <form action="php/login.php" method="POST">
                <input class="col-12 input my-1" type="email" name="email" placeholder="Ingrese su correo" required>
                <input class="col-12 input my-1" type="password" name="password" placeholder="Ingrese su contraseña" required>
                <input class="mx-auto my-1 button button-color4" type="submit" name="login" value="Iniciar sesión">
            </form>
        </div>
        <div class="col-12">
            <p class="mx-3 py-3">¿Aún no tienes una cuenta? Registrate <a href="" data-bs-toggle="modal" data-bs-target="#register">aquí</a></p>
        </div>
    </section>  


     <!-- Modal -->

     <div class="modal fade" id="register" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form action="php/createAccount.php" method="POST">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Crear cuenta</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                    <div class="modal-body row col-12">
                        <input class="col-5 input mx-auto" type="text" name="name" placeholder="Ingrese su nombre" required>
                        <input class="col-5 input mx-auto" type="text" name="lastName" placeholder="Ingrese su apellido" required>
                        <input class="col-11 input mx-auto" type="email" name="email" placeholder="Ingrese su correo" required>
                        <input class="col-8 input mx-auto" type="text" name="username" placeholder="Elija un nombre de usuario" required>
                        <input class="col-5 input mx-auto" type="password" name="password" placeholder="Ingrese su nombre" required>
                        <input class="col-5 input mx-auto" type="password" name="passwordConfirm" placeholder="Ingrese su apellido" required>
                    </div>
                    <div class="modal-footer">
                        <button class="button button-color2" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <input class="button button-color4" type="submit" name="register" value="Crear cuenta">
                    </div>
                </div>
            </form>
        </div>
    </div>


<?php include ("footer.php");?>