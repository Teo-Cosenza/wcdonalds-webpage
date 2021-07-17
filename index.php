<?php
include 'global/config.php';
include 'global/conexion.php';
include 'carrito.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href='https://fonts.googleapis.com/css?family=Roboto Slab' rel='stylesheet'>
	<link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
	<link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link rel="stylesheet" href="menu.css" />
    <link rel="stylesheet" href="stylesheet.css" type="text/css" charset="utf-8" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>
<body>
    <!--NAV-->
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
                        <a class="nav-link active navText" aria-current="page" href="#">MENU</a>
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
    <!--LISTA-->
    <div class="container">
        <?php if($mensaje!=""){ ?>
            <div class="alert alert-success">
                <?php echo $mensaje;?>
                <a href="mostrarCarrito.php" class="badge badge-success">Ver carrito</a>
            </div>
        <?php } ?>
        <!--LISTA ROW-->
        <div class="row">
            <!--TITULO-->
            <div>
                <h1 class="categories text-center">MENÚ DEL DÍA</h1>
            </div>
            <!--SELECT DB-->
            <?php
                $sql = "SELECT * FROM tblproductos WHERE CATEGORIA = 1";

                $datos = mysqli_query($mysqli_connection, $sql);
                $arrayDatos = array();
            
                while($row = mysqli_fetch_array($datos)){
                $arrayDatos[] = $row;
                }
                //print_r ($arrayDatos);
            ?>
            <!--COMIENZO FOREACH-->
            <?php
                foreach($arrayDatos as $producto){
            ?>
            <div class="col-4">
                <div class="cartas">
                    <img class="w3-hover-opacity img_cartas" style="padding: 3%;" width="250px" height="200px" src="<?php echo $producto['Imagen'];?>" alt="titulo" title="titulo producto">
                    <div class="cuerpo">
                        <h5 class="titleProd"><?php echo $producto['Nombre'];?></h5>
                        <h5 class="priceProd">$<?php echo $producto['Precio'];?></h5>
                        <p class="descProd"><?php echo $producto['Descripcion'];?></p>

                        <form action="" method="post">
                            <input type="hidden" name="id" id="id" value="<?php echo openssl_encrypt($producto['ID'], $cod, $key) ;?>">
                            <input type="hidden" name="nombre" id="nombre" value="<?php echo openssl_encrypt($producto['Nombre'], $cod, $key) ;?>">
                            <input type="hidden" name="precio" id="precio" value="<?php echo openssl_encrypt($producto['Precio'], $cod, $key) ;?>">
                            <input type="hidden" name="cantidad" id="cantidad" value="<?php echo openssl_encrypt(1, $cod, $key) ;?>">

                            <button class="boton btn btn-primary" name="btnAccion" value="Agregar" type="submit">Añadir al carrito</button>
                        </form>

                    </div>
                </div>
            </div>
            <!--FIN FOREACH-->
            <?php
                }
            ?>
            <!--TITULO-->
            <div>
                <h1 class="text-center categories ">COMBOS</h1>
            </div>
            <!--SELECT DB-->
            <?php
                $sql = "SELECT * FROM tblproductos WHERE CATEGORIA = 2";

                $datos = mysqli_query($mysqli_connection, $sql);
                $arrayDatos = array();
            
                while($row = mysqli_fetch_array($datos)){
                $arrayDatos[] = $row;
                }
                //print_r ($arrayDatos);
            ?>
            <!--COMIENZO FOREACH-->
            <?php
                
                foreach($arrayDatos as $producto){
            ?>
            <div class="col-4">
                <div class="cartas">
                    <img class="w3-hover-opacity img_cartas" style="padding: 3%;" width="250px" height="200px" src="<?php echo $producto['Imagen'];?>" alt="titulo" title="titulo producto">
                    <div class="cuerpo">
                        <h5 class="titleProd"><?php echo $producto['Nombre'];?></h5>
                        <h5 class="priceProd">$<?php echo $producto['Precio'];?></h5>
                        <p class="descProd"><?php echo $producto['Descripcion'];?></p>

                        <form action="" method="post">
                            <input type="hidden" name="id" id="id" value="<?php echo openssl_encrypt($producto['ID'], $cod, $key) ;?>">
                            <input type="hidden" name="nombre" id="nombre" value="<?php echo openssl_encrypt($producto['Nombre'], $cod, $key) ;?>">
                            <input type="hidden" name="precio" id="precio" value="<?php echo openssl_encrypt($producto['Precio'], $cod, $key) ;?>">
                            <input type="hidden" name="cantidad" id="cantidad" value="<?php echo openssl_encrypt(1, $cod, $key) ;?>">

                            <button class="boton btn btn-primary" name="btnAccion" value="Agregar" type="submit">Añadir al carrito</button>
                        </form>

                    </div>
                </div>
            </div>
            <!--FIN FOREACH-->
            <?php
                }
            ?>
            <!--TITULO-->
            <div>
                <h1 class="text-center categories ">PLATOS</h1>
            </div>
            <!--SELECT DB-->
            <?php
                $sql = "SELECT * FROM tblproductos WHERE CATEGORIA = 3";

                $datos = mysqli_query($mysqli_connection, $sql);
                $arrayDatos = array();
            
                while($row = mysqli_fetch_array($datos)){
                $arrayDatos[] = $row;
                }
                //print_r ($arrayDatos);
            ?>
            <!--COMIENZO FOREACH-->
            <?php
                foreach($arrayDatos as $producto){
            ?>
            <div class="col-4">
                <div class="cartas">
                    <img class="w3-hover-opacity img_cartas" style="padding: 3%;" width="250px" height="200px" src="<?php echo $producto['Imagen'];?>" alt="titulo" title="titulo producto">
                    <div class="cuerpo">
                        <h5 class="titleProd"><?php echo $producto['Nombre'];?></h5>
                        <h5 class="priceProd">$<?php echo $producto['Precio'];?></h5>
                        <p class="descProd"><?php echo $producto['Descripcion'];?></p>

                        <form action="" method="post">
                            <input type="hidden" name="id" id="id" value="<?php echo openssl_encrypt($producto['ID'], $cod, $key) ;?>">
                            <input type="hidden" name="nombre" id="nombre" value="<?php echo openssl_encrypt($producto['Nombre'], $cod, $key) ;?>">
                            <input type="hidden" name="precio" id="precio" value="<?php echo openssl_encrypt($producto['Precio'], $cod, $key) ;?>">
                            <input type="hidden" name="cantidad" id="cantidad" value="<?php echo openssl_encrypt(1, $cod, $key) ;?>">

                            <button class="boton btn btn-primary" name="btnAccion" value="Agregar" type="submit">Añadir al carrito</button>
                        </form>

                    </div>
                </div>
            </div>
            <!--FIN FOREACH-->
            <?php
                }
            ?>
            <!--TITULO-->
            <div>
                <h1 class="text-center categories ">BEBIDAS</h1>
            </div>
            <!--SELECT DB-->
            <?php
                $sql = "SELECT * FROM tblproductos WHERE CATEGORIA = 4";

                $datos = mysqli_query($mysqli_connection, $sql);
                $arrayDatos = array();
            
                while($row = mysqli_fetch_array($datos)){
                $arrayDatos[] = $row;
                }
                //print_r ($arrayDatos);
            ?>
            <!--COMIENZO FOREACH-->
            <?php
                foreach($arrayDatos as $producto){
            ?>
            <div class="col-4">
                <div class="cartasBeb">
                    <img class="w3-hover-opacity img_cartas" style="padding: 3%;" width="250px" height="200px" src="<?php echo $producto['Imagen'];?>" alt="titulo" title="titulo producto">
                    <div class="cuerpo">
                        <h5 class="titleProd"><?php echo $producto['Nombre'];?></h5>
                        <h5 class="priceProd">$<?php echo $producto['Precio'];?></h5>
                        <br>

                        <form action="" method="post">
                            <input type="hidden" name="id" id="id" value="<?php echo openssl_encrypt($producto['ID'], $cod, $key) ;?>">
                            <input type="hidden" name="nombre" id="nombre" value="<?php echo openssl_encrypt($producto['Nombre'], $cod, $key) ;?>">
                            <input type="hidden" name="precio" id="precio" value="<?php echo openssl_encrypt($producto['Precio'], $cod, $key) ;?>">
                            <input type="hidden" name="cantidad" id="cantidad" value="<?php echo openssl_encrypt(1, $cod, $key) ;?>">

                            <button class="boton btn btn-primary" name="btnAccion" value="Agregar" type="submit">Añadir al carrito</button>
                        </form>

                    </div>
                </div>
            </div>
            <!--FIN FOREACH-->
            <?php
                }
            ?>

        </div>
        <!--FIN LISTA ROW-->
    </div>
</body>
</html>