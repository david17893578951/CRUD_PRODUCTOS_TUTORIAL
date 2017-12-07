
<?php

require_once '../model/ProductoModel.php';
session_start();
$productoModel = new ProductoModel();
$opcion = $_REQUEST['opcion'];
unset($_SESSION['mensaje']);

switch ($opcion) {
    case"listar":
        $listado = $productoModel->getProductos(true);
        $_SESSION['listado'] = serialize($listado);
        $_SESSION['valorTotal'] = $productoModel->getValorProductos();
        header('Location: ../index.php');
        break;
    case"listar_desc":
        $listado = $productoModel->getProductos(false);
        $_SESSION['listado'] = serialize($listado);
        $_SESSION['valorTotal'] = $productoModel->getValorProductos();
        header('Location: ../index.php');
        break;
    case "crear":
        header('Location: ../view/crear.php');
        break;
    case "guardar":
        $codigo = $_REQUEST['codigo'];
        $nombr = $_REQUEST['nombr'];
        $precio = $_REQUEST['precio'];
        $cantidad = $_REQUEST['cantidad'];
        try {
            $productoModel->crearProducto($codigo, $nombr, $precio, $cantidad);
        } catch (Exception $e) {
            $_SESSION['mensaje'] = $e->getMessage();
        }

        $listado = $productoModel->getProductos();
        $_SESSION['listado'] = serialize($listado);
        header('Location: ../index.php');
        break;
    case "eliminar":
        $codigo = $_REQUEST['codigo'];
        $productoModel->eliminarProducto($codigo);
        $listado = $productoModel->getProductos();
        $_SESSION['listado'] = serialize($listado);
        header('Location: ../index.php');
    case "cargar":
        $codigo = $_REQUEST['codigo'];
        $producto = $productoModel->getProducto($codigo);
        $_SESSION['producto'] = $producto;
        header('Location: ../view/actualizar.php');
        break;
    case "actualizar":
        $codigo = $_REQUEST['codigo'];
        $nombr = $_REQUEST['nombr'];
        $precio = $_REQUEST['precio'];
        $cantidad = $_REQUEST['cantidad'];
        $productoModel->actualizarProducto($codigo, $nombr, $precio, $cantidad);
        $listado = $productoModel->getProductos();
        $_SESSION['listado'] = serialize($listado);
        header('Location: ../index.php');
        break;

    default:
        header('Location: ../index.php');
}