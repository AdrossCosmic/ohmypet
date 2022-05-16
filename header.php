
    <?php 
    
        if(isset($_SESSION['cart'])){
            $cart = $_SESSION['cart'];
            $sumProducts = count($cart);
        }

    ?>
    
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.php">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans&family=Ubuntu:wght@300;400&display=swap" rel="stylesheet">
</head>
<body>

    <nav class="navbar header navbar-light">
        <div class="navbar-brand">
            <a href="index.php"><img class="ms-3 img-fluid" src="img/logo.png" alt="" width="120"></a>
        </div>
        <div class="d-flex justify-content-center">
            <a class="nav-item nav-link my-auto <?php if($_SESSION['pageActive'] === "index"){echo "active";}?>" aria-current="page" href="index.php">Inicio</a>
            <a class="nav-item nav-link my-auto <?php if($_SESSION['pageActive'] === "contact"){echo "active";}?>" href="contact.php">Contacto</a>
            <a class="nav-item nav-link my-auto <?php if($_SESSION['pageActive'] === "store"){echo "active";}?>" href="store.php">Tienda</a>
        </div>
        <div class="d-flex justify-content-center">
            <a class="nav-item nav-link <?php if($_SESSION['pageActive'] === "profile"){echo "active";}?>" href="profile.php"><i class="fa-solid fa-user"></i></a>
            <div class="d-flex notify">
                <a class="nav-item nav-link <?php if($_SESSION['pageActive'] === "cart"){echo "active";}?>" href="cart.php"><i class="fa-solid fa-cart-shopping"></i></a>
                <p class="my-auto ms-0 me-4"><?php if(isset($_SESSION['cart'])){ echo "(" .$sumProducts .")";};?></p>
            </div>
        </div>
    </nav>