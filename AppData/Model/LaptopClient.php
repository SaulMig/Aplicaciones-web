<?php
/**
 * Created by PhpStorm.
 * User: Sullivan
 * Date: 05/11/2019
 * Time: 11:20 PM
 */

namespace AppData\Model;


class LaptopClient
{
    private $tabla="equipo";
    private $id_equipo;
    private $garantia;
    private $service_tag;
    private $id_modelo;
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
        $sql="select equipo.service_tag as service_tag, modelo.descripcion as modelo,equipo.garantia as garantia,equipo.id_equipo as m
              from equipo,tipos_pc,modelo,marca
              where equipo.id_tipo_pc=tipos_pc.id_tipo_pc
              and equipo.id_modelo=modelo.id_modelo
              and modelo.id_marca=marca.id_marca
              and tipos_pc.id_tipo_pc='1'";
        $datos=$this->conexion->QueryResultado($sql);
        return $datos;
    }
}