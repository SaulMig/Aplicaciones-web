<?php
/**
 * Created by PhpStorm.
 * User: Sullivan
 * Date: 08/11/2019
 * Time: 04:32 PM
 */

namespace AppData\Model;


class Multi
{
    private $tabla="multi";
    private $id_multi;
    private $no_copias;
    private $no_impresion;
    private $total;
    private $id_objeto;
    private $id_area;

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
        $sql=" SELECT marca.descripcion as marca, modelo.descripcion as modelo, lugar.descripcion as lugar, multi.no_copias as copias, multi.no_impresion as impresion, multi.total as total, multi.id_multi as m
                from marca, modelo, lugar,multi,objetos
                where multi.id_objeto=objetos.id_objeto
                and multi.id_area=lugar.id_area
                AND modelo.id_marca=marca.id_marca
                and objetos.id_modelo=modelo.id_modelo";
        $datos=$this->conexion->QueryResultado($sql);
        return $datos;
    }
    function add()
    {
        $sql="insert into `multi`(`id_multi`,`no_copias`,`no_impresion`,`total`,`id_objeto`,`id_area`) 
              values ('0','{$this->no_copias}','{$this->no_impresion}','{$this->total}','{$this->id_objeto}','{$this->id_area}')";
        $this->conexion ->QuerySimple($sql);
    }
    function verify()
    {
        $sql="select * from {$this->tabla} where id_objeto='{$this->id_objeto}'";
        $dato=$this->conexion->QueryResultado($sql);
        return $dato;
    }
    function delete($id)
    {
        $sql="delete from {$this->tabla} where id_multi='{$id}'";
        $this->conexion->QuerySimple($sql);
    }
    function edit($id)
    {
        $sql="select id_multi,no_copias,no_impresion,total,id_objeto,id_area from {$this->tabla} where id_multi='{$id}'";
        $datos=$this->conexion->queryResultado($sql);
        return $datos;
    }
    function getOne($id)
    {
        $sql="SELECT * FROM multi where id_multi='{$id}'";
        $datos=$this->conexion->QueryResultado($sql);
        return $datos;
    }
    function update(){
        $sql = "update {$this->tabla} 
                set no_copias='{$this->no_copias }',no_impresion='{$this->no_impresion}',total='{$this->total}',id_objeto='{$this->id_objeto}' ,id_area='{$this->id_area}' 
                where id_multi='{$this->id_multi}'";
        $this->conexion->QuerySimple($sql);
    }
}