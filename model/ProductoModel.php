<?php
include 'Database.php';
include 'Producto.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ProductoModel
 *
 * @author Cris
 */
class ProductoModel {
    
    public function getValorProductos(){
        $listado= $this->getProductos();
        $suma=0;
        foreach ($listado as $prod){
            $suma+=$prod->getPrecio()*$prod->getCantidad();
        }
        return $suma;
    }

    public function getProductos($orden) {
        $pdo = Database::connect();
        if($orden == true){
            $sql="select * from producto order by nombr";
        }else{
            $sql="select * from producto order by nombr desc";
         }
        $resultado = $pdo->query($sql);
        $listado = array();
        foreach ($resultado as $res) {
            $producto = new Producto();
            $producto->setCodigo($res['codigo']);
            $producto->setNombr($res['nombr']);
            $producto->setPrecio($res['precio']);
            $producto->setCantidad($res['cantidad']);
            array_push($listado, $producto);
        }
        Database::disconnect();
        return $listado;
    }

    public function getProducto($codigo) {
        $pdo = Database::connect();
        $sql = "select * from producto where codigo=?";
        $consulta = $pdo->prepare($sql);
        $consulta->execute(array($codigo));
        $dato = $consulta->fetch(PDO::FETCH_ASSOC);
        $producto = new Producto();
        $producto->setCodigo($dato['codigo']);
        $producto->setNombr($dato['nombr']);
        $producto->setPrecio($dato['precio']);
        $producto->setCantidad($dato['cantidad']);
        Database::disconnect();
        return $producto;
    }

    public function crearProducto($codigo, $nombr, $precio, $cantidad) {
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "insert into producto(codigo, nombr, precio, cantidad) values(?,?,?,?)";
        $consulta = $pdo->prepare($sql);
        try{
           $consulta->execute(array($codigo, $nombr, $precio, $cantidad)); 
        }catch(PDOException $e){
            Database::disconnect();
            throw new Exception($e->getMessage());
        
        }
        
        Database::disconnect();
    }
    public function eliminarProducto($codigo){
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE,  PDO::ERRMODE_EXCEPTION);
        $sql="delete from producto where codigo=?";
        $consulta= $pdo->prepare($sql);
        $consulta->execute(array($codigo));
        Database::disconnect();
    }
    public function actualizarProducto($codigo, $nombr, $precio, $cantidad){
        $pdo= Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql="update producto set nombr=?,precio=?,cantidad=? where codigo=?";
        $consulta = $pdo->prepare($sql);
        $consulta->execute(array($nombr,$precio,$cantidad,$codigo));
        Database::disconnect();
        
    }
}
