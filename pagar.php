<?php
include 'global/config.php';
include 'global/conexion.php';
include 'carrito.php';
?>
<?php
    if($_POST){
        $total=0; #genero una nueva variable total ya que la otra esta en mostrarcarrito.php#
        foreach($_SESSION['CARRITO'] as $indice=>$producto){
            $total = $total + ($producto['PRECIO']*$producto['CANTIDAD']);
        }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Finalizar compra</title>
    <link href='https://fonts.googleapis.com/css?family=Roboto Slab' rel='stylesheet'>
	<link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
	<link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link rel="stylesheet" href="pagar.css" />
    <link rel="stylesheet" href="stylesheet.css" type="text/css" charset="utf-8" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark w3-block" aria-label="Tenth navbar example">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample08" aria-controls="navbarsExample08" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-md-center" id="navbarsExample08">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link navText" aria-current="page" href="index.html">INICIO</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link navText" aria-current="page" href="index.php">MENU</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link navText" href="mostrarCarrito.php">CARRITO(<?php
                                echo (empty($_SESSION['CARRITO']))?0:count($_SESSION['CARRITO']);
                            ?>)
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <br><br>
    <div>
        <h1 class="categories text-center w3-border-bottom">FINALIZAR COMPRA</h1>
    </div>
    <br>
    <div class="card container-fluid center-block text-center">
        <div class="card-body">
            <h3 class="greet">¡Muchas gracias por su compra!</h3>
            <p class="card-text">Su pedido ya se esta preparando y estará en su mesa en breves.</p>
            <p class="card-text">Recuerde que al retirarse debe pasar a pagar por recepción.</p>
            <br>
            <p class="card-text">El monto a pagar es de:</p>
            <?php echo "<h3>$".$total."</h3>"; ?>
            <br>
            <p class="card-text">Pulse el botón para finalizar el pedido</p>
            <form action="index.html" method="POST">
                <button class="boton btn btn-primary" name="destroy" value="destroy" type="submit">Finalizar</button>
            </form>
        </div>
    </div>
</body>
</html>


<?php
    }
?>