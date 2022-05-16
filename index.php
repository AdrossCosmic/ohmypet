<!DOCTYPE html>
<html lang="en">
<head>
    <title>Inicio</title>

    <style> body {background-image: none !important;} </style>

    <?php $_SESSION['pageActive'] = "index"; include("header.php"); ?> 

        <section class="col-12 index">
            <div class="row col-12 m-0">
                <div class="col-7 mx-auto p-0"> 
                    <img class="img-fluid img1" src="img/logo.png" alt="">
                </div>
                <div class="col-4 mx-auto p-0">
                    <img class="img-fluid img2" src="img/index2.png" alt="">
                </div>
            </div>
            <div class="separador mx-auto"></div>
            <div class="col-12 mb-5 d-flex justify-content-center">
                <div class="col-5 p-0"> 
                    <img class="ms-5 mx-auto img-fluid" src="img/perro1.png" alt="">
                </div>
                <div class="col-5 ofert">
                    <h3 class="mt-5 text-center">Ellos son lo más importante para nosotros</h3>
                    <h5 class="mt-3 text-center">Por eso te ofrecemos los productos de mejor calidad</h5>
                    <div class="d-flex flex-column justify-content-center">
                        <p class="mt-3 text-center ">Visita nuestra tienda y llevate lo mejor, para el mejor</p>
                        <a class="mx-auto button button-color5" href="store.php">Tienda</a>
                    </div>
                </div>
            </div>
        </section>
    <?php include("footer.php");?>


    