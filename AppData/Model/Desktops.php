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
        $sql="select equipo.service_tag as service_tag, modelo.descripcion as modelo,equipo.garantia,equipo.id_equipo as m
              from equipo,tipos_pc,modelo,marca
              where equipo.id_tipo_pc=tipos_pc.id_tipo_pc
              and equipo.id_modelo=modelo.id_modelo
              and modelo.id_marca=marca.id_marca
              and tipos_pc.id_tipo_pc='2'";
        $datos=$this->conexion->QueryResultado($sql);
        return $datos;
    }
    function add()
    {
        $sql="insert into `equipo`(`id_equipo`,`service_tag`,`garantia`,`id_modelo`,`id_tipo_pc`) 
              values ('0','{$this->service_tag}','{$this->garantia}','{$this->id_modelo}','2')";
        $this->conexion ->QuerySimple($sql);
    }
    function delete($id)
    {
        $sql="delete from {$this->tabla} where id_equipo='{$id}'";
        $this->conexion->QuerySimple($sql);
    }
    function edit($id)
    {
        $sql="select service_tag,garantia,id_modelo from {$this->tabla} where id_equipo='{$id}'";
        $datos=$this->conexion->queryResultado($sql);
        return $datos;
    }
    function getOne($id)
    {
        $sql="SELECT * FROM equipo where id_equipo='{$id}'";
        $datos=$this->conexion->QueryResultado($sql);
        return $datos;
    }
    function update(){
        $sql="UPDATE {$this->tabla}
              SET service_tag='{$this->service_tag}', garantia='{$this->garantia}', id_modelo ='{$this->id_modelo}' 
              WHERE id_equipo = '{$this->id_equipo}'"; ;
        $this->conexion->QuerySimple($sql);



    }

}