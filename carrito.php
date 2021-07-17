<?php
    session_start();
    $mensaje="";
    if(isset($_POST['btnAccion'])){

        switch($_POST['btnAccion']){

            case 'Agregar':
                if(is_numeric( openssl_decrypt($_POST['id'], $cod, $key))){
                    $ID = openssl_decrypt($_POST['id'], $cod, $key);
                    $mensaje.= "Ok ID correcto ".$ID."<br>";
                }
                else{
                    $mensaje.= "Mal ahí ID incorrecto".$ID."<br>";
                }
                //
                if(is_string( openssl_decrypt($_POST['nombre'], $cod, $key))){
                    $NOMBRE = openssl_decrypt($_POST['nombre'], $cod, $key);
                    $mensaje.= "Ok NOMBRE ".$NOMBRE."<br>";
                }
                else{
                    $mensaje.= "Mal ahí NOMBRE incorrecto"."<br>";     
                }
                //
                if(is_numeric( openssl_decrypt($_POST['cantidad'], $cod, $key))){
                    $CANTIDAD = openssl_decrypt($_POST['cantidad'], $cod, $key);
                    $mensaje.= "Ok CANTIDAD ".$CANTIDAD."<br>";
                }
                else{
                    $mensaje.="Mal ahí CANTIDAD incorrecto"."<br>";
                }
                //
                if(is_numeric( openssl_decrypt($_POST['precio'], $cod, $key))){
                    $PRECIO = openssl_decrypt($_POST['precio'], $cod, $key);
                    $mensaje.= "Ok PRECIO ".$PRECIO."<br>";
                }
                else{
                    $mensaje.="Mal ahí PRECIO incorrecto"."<br>";
                }
                
                if(!isset($_SESSION['CARRITO'])){
                    $producto=array(
                        'ID'=>$ID,
                        'NOMBRE'=>$NOMBRE,
                        'CANTIDAD'=>$CANTIDAD,
                        'PRECIO'=>$PRECIO
                    );
                    $_SESSION['CARRITO'][0]=$producto; 
                    $mensaje="Producto agregado al carrito";   
                }
                else{
                    $NumeroProductos=count($_SESSION['CARRITO']);
                    $producto=array(
                        'ID'=>$ID,
                        'NOMBRE'=>$NOMBRE,
                        'CANTIDAD'=>$CANTIDAD,
                        'PRECIO'=>$PRECIO
                    );
                    $_SESSION['CARRITO'][$NumeroProductos]=$producto;
                    $mensaje="Producto agregado al carrito";
                }

                //$mensaje=print_r($_SESSION, true);
            break;

            case "Eliminar":
                if(is_numeric( openssl_decrypt($_POST['id'], $cod, $key))){
                    $ID = openssl_decrypt($_POST['id'], $cod, $key);
                    foreach($_SESSION['CARRITO'] as $indice=>$producto){
                        if($producto['ID']==$ID){
                            unset($_SESSION['CARRITO'][$indice]);
                            //echo "<script>alert('Elemento quitado del carrito...');</script>";
                            break;
                        }
                    }
                }
                else{
                    $mensaje.= "Mal ahí ID incorrecto".$ID."<br>";
                }
            break;
        }
    }
?>