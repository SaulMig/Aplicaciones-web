<?php
/**
 * Created by PhpStorm.
 * User: Sullivan
 * Date: 29/10/2019
 * Time: 03:06 PM
 */

namespace AppData\Model;


class DesktopsClient
{
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
        $sql="select equipo.service_tag as service_tag, modelo.descripcion as modelo,equipo.garantia,equipo.id_equipo as m
              from equipo,tipos_pc,modelo,marca
              where equipo.id_tipo_pc=tipos_pc.id_tipo_pc
              and equipo.id_modelo=modelo.id_modelo
              and modelo.id_marca=marca.id_marca
              and tipos_pc.id_tipo_pc='2'";
        $datos=$this->conexion->QueryResultado($sql);
        return $datos;
    }
    function getOne($id)
    {
        $sql="SELECT * FROM equipo where id_equipo='{$id}'";
        $datos=$this->conexion->QueryResultado($sql);
        return $datos;
    }

}