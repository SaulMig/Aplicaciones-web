<?php
/**
 * Created by PhpStorm.
 * User: Sullivan
 * Date: 05/11/2019
 * Time: 10:52 PM
 */

namespace AppData\Model;


class DisplayClient
{
    private $tabla="monitor";
    private $id_monitor;
    private $id_modelo;
    private $pulgadas;
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
        $sql="select monitor.pulgadas as pulgadas, modelo.descripcion as modelo, monitor.id_monitor as m
              from marca, modelo, monitor
              where monitor.id_modelo=modelo.id_modelo
              and modelo.id_marca=marca.id_marca";
        $datos=$this->conexion->QueryResultado($sql);
        return $datos;
    }

}