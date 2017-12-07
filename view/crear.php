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
        <form action="../controller/controller.php">
            
            <div>
                <ul>
                    <li>
                        <input type="hidden" value="guardar" name="opcion" >
                    </li>
                    <li>
                        <label for="name">Código:</label>
                        <input type="text" name="codigo" required pattern="[0-9]*" ><br>
                    </li>
                    <li>
                         <label for="name"> Nombre:</label>
                         <input type="text" name="nombr" required="" ><br>
                    </li>
                    <li>
                         <label for="name">Precio:</label>
                         <input type="text" name="precio" required pattern="[0-9]*"><br>
                    </li>
                    <li>
                         <label for="name">Cantidad:</label>
                         <input type="text" name="cantidad"required pattern="[0-9]*"><br>
                    </li>
                </ul>
            </div>

            
            <input class="submit" type="submit"value="Crear">
        </form>
    </body>
</html>
