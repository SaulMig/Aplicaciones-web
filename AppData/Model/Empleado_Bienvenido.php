<?php


namespace AppData\Model;


class Empleado_Bienvenido
{

    function __construct()
    {
        $this->conexion=new conexion();
    }
    public function set($atributo, $valor)
    {
        $this->$atributo=$valor;
    }
    public function get($atributo)
    {
        return $this->$atributo;
    }

    function getAll()
    {

    }

    function graficar()
    {

    }

    function pdf()
    {

    }

}