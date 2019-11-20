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
        $sql="select equipo.service_tag as service_tag, modelo.descripcion as modelo,equipo.garantia as garantia,equipo.garantia_fin as garantia_fin,equipo.id_equipo as m
              from equipo,tipos_pc,modelo,marca
              where equipo.id_tipo_pc=tipos_pc.id_tipo_pc
              and equipo.id_modelo=modelo.id_modelo
              and modelo.id_marca=marca.id_marca
              and tipos_pc.id_tipo_pc='1'";
        $datos=$this->conexion->QueryResultado($sql);
        return $datos;
    }
    function add()
    {
        $sql="insert into `equipo`(`id_equipo`,`service_tag`,`garantia`,`id_modelo`,`id_tipo_pc`) 
              values ('0','{$this->service_tag}','{$this->garantia}','{$this->id_modelo}','1')";
        $this->conexion ->QuerySimple($sql);
    }
    function verify()
    {
        $sql="select * from {$this->tabla} where service_tag='{$this->service_tag}'";
        $dato=$this->conexion->QueryResultado($sql);
        return $dato;
    }
    function delete($id)
    {
        $sql="delete from {$this->tabla} where id_equipo='{$id}'";
        $this->conexion->QuerySimple($sql);
    }
    function edit($id)
    {
        $sql="select id_equipo,service_tag,garantia,garantia_fin,id_modelo from {$this->tabla} where id_equipo='{$id}'";
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
        $sql = "update {$this->tabla} 
                set service_tag='{$this->service_tag}',garantia='{$this->garantia}',garantia_fin='{$this->garantia_fin}',id_modelo='{$this->id_modelo}' 
                where id_equipo='{$this->id_equipo}'";
        $this->conexion->QuerySimple($sql);
    }
}