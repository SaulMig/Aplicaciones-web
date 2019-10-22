<?php
/**
 * Created by PhpStorm.
 * User: Sullivan
 * Date: 22/10/2019
 * Time: 12:36 AM
 */

namespace AppData\Model;


class Equipo_OP
{
    private $tabla="tipo_objeto";
    private  $id_tipo_objeto;
    private  $descripcion;

    function __construct()
    {
        $this->conexion=new conexion();
    }

    public function set($atributo,$valor)
    {
        $this->$atributo=$valor;
    }

    public function get($atributo)
    {
        return $this->$atributo;
    }
    function getAll()
    {
        $sql="select *from {$this->tabla} ";
        $datos=$this->conexion->queryResultado($sql);
        return $datos;
    }
    function add()
    {
        $sql="insert into `tipo_objeto`(`id_tipo_objeto`,`descripcion`) values ('0','{$this->descripcion}')";
        $this->conexion ->QuerySimple($sql);
    }
    function verify(){
        $sql = "select * from {$this->tabla} where  descripcion='{$this->descripcion}'";
        $dato=$this->conexion->QueryResultado($sql);
        return $dato;
    }
    function delete($id)
    {
        $sql="delete from {$this->tabla} where id_tipo_objeto='{$id}'";
        $this->conexion->QuerySimple($sql);
    }

    function edit($id)
    {
        $sql="select id_tipo_objeto,descripcion from {$this->tabla} where id_tipo_objeto='{$id}'";
        $datos=$this->conexion->queryResultado($sql);
        return $datos;
    }
    function getOne($id)
    {
        $sql="SELECT * FROM tipo_objeto where id_tipo_objeto='{$id}'";
        $datos=$this->conexion->QueryResultado($sql);
        return $datos;
    }
    function update(){
        $sql = "update {$this->tabla} set descripcion='{$this->descripcion}'
               where id_tipo_objeto='{$this->id_tipo_objeto}'";
        $this->conexion->QuerySimple($sql);
    }

}