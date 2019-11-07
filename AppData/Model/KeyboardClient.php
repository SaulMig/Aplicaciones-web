<?php
/**
 * Created by PhpStorm.
 * User: Sullivan
 * Date: 05/11/2019
 * Time: 11:19 PM
 */

namespace AppData\Model;


class KeyboardClient
{
    private $tabla="teclado";
    private $id_teclado;
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
        $sql="select teclado.descripcion as descripcion, modelo.descripcion as modelo, teclado.id_teclado as m
                from marca, modelo, teclado
                where teclado.id_modelo=modelo.id_modelo
                and modelo.id_marca=marca.id_marca";
        $datos=$this->conexion->QueryResultado($sql);
        return $datos;
    }
}