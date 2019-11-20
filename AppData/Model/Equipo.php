<?php
/**
 * Created by PhpStorm.
 * User: Sullivan
 * Date: 12/11/2019
 * Time: 04:31 PM
 */

namespace AppData\Model;


class Equipo
{
    private $tabla="equipo";
    private $id_equipo;
    private $garantia;
    private $service_tag;
    private $id_modelo;
    private $garantia_fin;

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
        $sql="select equipo.id_equipo as id_equipo,equipo.service_tag as service_tag, modelo.descripcion as modelo,equipo.garantia as garantia,equipo.garantia_fin as garantia_fin, equipo.id_equipo as m
              from equipo,tipos_pc,modelo,marca
              where equipo.id_tipo_pc=tipos_pc.id_tipo_pc
              and equipo.id_modelo=modelo.id_modelo
              and modelo.id_marca=marca.id_marca";
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