<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Producto
 *
 * @author Cris
 */
class Producto {
    private $codigo;
    private $nombr;
    private $precio;
    private $cantidad;
    
    public function getCodigo() {
        return $this->codigo;
    }

    public function getNombr() {
        return $this->nombr;
    }

    public function getPrecio() {
        return $this->precio;
    }

    public function getCantidad() {
        return $this->cantidad;
    }

    public function setCodigo($codigo) {
        $this->codigo = $codigo;
    }

    public function setNombr($nombr) {
        $this->nombr = $nombr;
    }

    public function setPrecio($precio) {
        $this->precio = $precio;
    }

    public function setCantidad($cantidad) {
        $this->cantidad = $cantidad;
    }    
}
