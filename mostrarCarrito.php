<?php
include 'global/config.php';
include 'carrito.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito</title>
    <link href='https://fonts.googleapis.com/css?family=Roboto Slab' rel='stylesheet'>
	<link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
	<link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link rel="stylesheet" href="mostrarCarrito.css" />
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
                        <a class="nav-link active navText" href="#">CARRITO(<?php
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
        <h1 class="categories text-center w3-border-bottom">CARRITO</h1>
    </div>
    <?php if(!empty($_SESSION['CARRITO'])) { ?>
        <table class="table table-light table-bordered">
            <br>
            <tbody>
                <tr>
                    <th widht="40%">Descripción</th>
                    <th widht="15%">Cantidad</th>
                    <th widht="20%">Precio</th>
                    <th widht="20%">Total</th>
                    <th widht="5%"></th>
                </tr>

                <?php $total=0; ?>
                <?php foreach($_SESSION['CARRITO'] as $indice=>$producto){ ?>
                    <tr>
                        <td widht="40%"> <?php echo $producto['NOMBRE'] ?> </td>
                        <td widht="15%"> <?php echo $producto['CANTIDAD'] ?> </td>
                        <td widht="20%"> <?php echo $producto['PRECIO'] ?> </td>
                        <td widht="20%"> <?php echo number_format($producto['PRECIO']*$producto['CANTIDAD']) ?> </td>
                        <td widht="5%">

                            <form action="" method="post">
                            <input type="hidden" name="id" id="id" value="<?php echo openssl_encrypt($producto['ID'], $cod, $key) ;?>">
                                <button class="btn btn-danger" type="submit" name="btnAccion" value="Eliminar">
                                    Eliminar
                                </button> 
                            </form>
                            
                        </td>
                    </tr>
                <?php $total=$total+$producto['PRECIO']*$producto['CANTIDAD']; ?>
                <?php } ?>

                <tr>
                    <td colspan="3" style="text-align: right;"><h3>Total</h3></td>
                    <td style="text-align: right;"><h3> $ <?php echo number_format($total); ?></h3></td>
                    <td></td>
                </tr>
            </tbody>
        </table>
        <div class="container-fluid center-block text-center">
            <form action="pagar.php" method="POST">
                <button class="boton btn btn-primary" type="submit" name="btnAccion" value="pagar">Finalizar compra</button>
            </form>
        </div>
    <?php } else{ ?>
        <br>
        <div class="alert alert-success text-center container-fluid center-block" role="alert">
            El carrito esta vacio...
        </div>
    <?php } ?>

</body>
</html>