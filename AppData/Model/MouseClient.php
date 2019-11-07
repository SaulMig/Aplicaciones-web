<?php
/**
 * Created by PhpStorm.
 * User: Sullivan
 * Date: 05/11/2019
 * Time: 11:20 PM
 */

namespace AppData\Model;


class MouseClient
{
    private $tabla="mouse";
    private $id_mouse;
    private $id_modelo;
    private $descripcion;
    function __construct()
    {
        $this->conexion= new conexion();
    }
    function get($atributo)
    {
        return $this->$atributo;
    }

    function set($atributo,$valor)
    {
        $this->$atributo=$valor;
    }
    function getAll()
    {
        $sql="select mouse.descripcion as descripcion, modelo.descripcion as modelo, mouse.id_mouse as m
                from marca, modelo, mouse
                where mouse.id_modelo=modelo.id_modelo
                and modelo.id_marca=marca.id_marca";
        $datos=$this->conexion->QueryResultado($sql);
        return $datos;
    }

}