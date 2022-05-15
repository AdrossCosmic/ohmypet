<?php

    session_start();
    include("header.php");
    require("php/db.php");

    if(!isset($_SESSION['loggedin'])){
        header("Location: login.php");
    }

    $consultUser = "SELECT * FROM users WHERE id = ?";
    $makeConsultUser = $pdo->prepare($consultUser);
    $makeConsultUser->execute(array($_SESSION['id']));
    $resultConsultUser = $makeConsultUser->fetch();

    $consultHistory = "SELECT * FROM history WHERE idUser = ?";
    $makeConsultHistory = $pdo->prepare($consultHistory);
    $makeConsultHistory->execute(array($_SESSION['id']));
    $resultConsultHistory = $makeConsultHistory->fetchAll();

    ?>

    <section class="col-9 mx-auto">
        <div class="row mt-5">
            <aside class="col-4">
                <h1><?php echo $resultConsultUser['name'] ." " .$resultConsultUser['lastName'];?></h1>
                <h5><i class="fa-solid fa-at me-3"></i><?php echo $resultConsultUser['username']?></h5>
                <p><i class="fa-solid fa-envelope me-3"></i><?php echo $resultConsultUser['email']?></p>
                <a class="mt-4 button button-color5" href="php/logout.php">Cerrar sesión</a>
            </aside>
            <div class="col-8">
                <h3 class="text-center">Historial de compras</h3>
                <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">Id de la compra</th>
                        <th scope="col">Id del producto</th>
                        <th scope="col">Unidades</th>
                        <th scope="col">Valor total</th>
                        <th scope="col">Fecha</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($resultConsultHistory as $key):?>
                            <tr>
                                <th scope="row"><?php echo $key['id']?></th>
                                <td><?php echo $key['idProduct']?></td>
                                <td><?php echo $key['units']?></td>
                                <td><?php echo $key['totalCost']?></td>
                                <td><?php echo $key['date']?></td>
                            </tr>
                        <?php endforeach;?>
                    </tbody>
                    </table>
            </div>
        </div>
    </section>

<?php include("footer.php");?>