<?php
/**
 * Created by PhpStorm.
 * User: Sullivan
 * Date: 22/10/2019
 * Time: 01:19 AM
 */

namespace AppData\Model;


class Lugar
{
    private $tabla="lugar";
    private  $id_area;
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
        $sql="insert into `lugar`(`id_area`,`descripcion`) values ('0','{$this->descripcion}')";
        $this->conexion ->QuerySimple($sql);
    }
    function verify(){
        $sql = "select * from {$this->tabla} where  descripcion='{$this->descripcion}' ";
        $dato=$this->conexion->QueryResultado($sql);
        return $dato;
    }
    function delete($id)
    {
        $sql="delete from {$this->tabla} where id_area='{$id}'";
        $this->conexion->QuerySimple($sql);
    }

    function edit($id)
    {
        $sql="select id_area,descripcion from {$this->tabla} where id_area='{$id}'";
        $datos=$this->conexion->queryResultado($sql);
        return $datos;
    }
    function getOne($id)
    {
        $sql="SELECT * FROM lugar where id_area='{$id}'";
        $datos=$this->conexion->QueryResultado($sql);
        return $datos;
    }
    function update(){
        $sql = "update {$this->tabla} set descripcion='{$this->descripcion}' 
               where id_area='{$this->id_area}'";
        $this->conexion->QuerySimple($sql);
    }

}