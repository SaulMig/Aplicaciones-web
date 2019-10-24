<?php
/**
 * Created by PhpStorm.
 * User: Sullivan
 * Date: 24/10/2019
 * Time: 01:30 PM
 */

namespace AppData\Model;


class Laptop
{
    private $tabla="equipo";
    private $id_equipo;
    private $garantia;
    private $service_tag;
    private $id_modelo;
    private $id_tipo_pc;
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
              from equipo,tipos_pc,modelo,marca,equipo_completo,prestamos,usuario
              where equipo.id_tipo_pc=tipos_pc.id_tipo_pc
              and equipo.id_modelo=modelo.id_modelo
              and modelo.id_marca=marca.id_marca
              and equipo_completo.id_equipo=equipo.id_equipo
              AND prestamos.id_equipo_completo=equipo_completo.id_equipo_completo
              and prestamos.id_usuario=usuario.id_usuario
              and tipos_pc.id_tipo_pc=1";
        $datos=$this->conexion->QueryResultado($sql);
        return $datos;
    }
    function add()
    {
        $sql="insert into `equipo`(`id_equipo`,`service_tag`,`garantia`,`id_modelo`,`id_tipo_pc`) 
              values ('0','{$this->service_tag}','{$this->garantia}','{$this->id_modelo}','1')";
        $this->conexion ->QuerySimple($sql);
    }
    function delete($id)
    {
        $sql="delete from {$this->tabla} where id_equipo='{$id}'";
        $this->conexion->QuerySimple($sql);
    }
}