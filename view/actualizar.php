<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="style.css" type="text/css" media=screen>
        <title></title>
    </head>
    <body>
        <?php
        include '../model/Producto.php';
        session_start();
        $producto = $_SESSION ['producto'];
        ?>
        <form action="../controller/controller.php">
            <div>
                <ul>
                        <input type="hidden" value="actualizar" name="opcion">
                        <input type="hidden" value="<?php echo $producto->getCodigo();?>" name="codigo">
                    <li>
                        <label for="name">Codigo: </label>
                        <b><?php echo $producto->getCodigo();?></b><br>
                    </li>
                    <li>
                        <label for="name"> Nombre:</label>
                        <input type="text" name="nombr" value="<?php echo $producto->getNombr();?>"><br>
                    </li>
                    <li>
                        <label for="name">Precio: </label>
                        <input type="text" name="precio" value="<?php echo $producto->getPrecio();?>" required pattern="[0-9]*" ><br>
                    </li>
                    <li>
                        <label for="name">Cantidad: </label>
                        <input type="text" name="cantidad" value="<?php echo $producto->getCantidad();?>" required pattern="[0-9]*" ><br>
                    </li>
                </ul>
            </div>

            <input class="submit" type="submit" value="Actualizar">
        </form>
    </body>
</html>
