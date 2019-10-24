<?php
/**
 * Created by PhpStorm.
 * User: Sullivan
 * Date: 23/10/2019
 * Time: 09:50 AM
 */

namespace AppData\Model;


class Desktops
{
    private $tabla="modelo";
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
        $sql="select usuario.nickname as usuario,equipo.service_tag as service_tag, modelo.descripcion as modelo,equipo.garantia,equipo.id_equipo as m
from equipo,tipos_pc,modelo,marca,equipo_completo,prestamos,usuario
where equipo.id_tipo_pc=tipos_pc.id_tipo_pc
and equipo.id_modelo=modelo.id_modelo
and modelo.id_marca=marca.id_marca
and equipo_completo.id_equipo=equipo.id_equipo
AND prestamos.id_equipo_completo=equipo_completo.id_equipo_completo
and prestamos.id_usuario=usuario.id_usuario
and tipos_pc.id_tipo_pc=2";
        $datos=$this->conexion->QueryResultado($sql);
        return $datos;
    }
    function add()
    {
        $sql="insert into `modelo`(`id_modelo`,`descripcion`,`id_marca`) values ('0','{$this->descripcion}','{$this->id_marca}')";
        $this->conexion ->QuerySimple($sql);
    }
    function delete($id)
    {
        $sql="delete from {$this->tabla} where id_modelo='{$id}'";
        $this->conexion->QuerySimple($sql);
    }

}