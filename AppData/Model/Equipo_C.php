<?php

namespace AppData\Model;


class Equipo_C
{
    private $tabla="tipos_pc";
    private  $id_tipo_pc;
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
        $sql="insert into `tipos_pc`(`id_tipo_pc`,`descripcion`) values ('0','{$this->descripcion}')";
        $this->conexion ->QuerySimple($sql);
    }
    function verify(){
        $sql = "select * from {$this->tabla} where  descripcion='{$this->descripcion}'";
        $dato=$this->conexion->QueryResultado($sql);
        return $dato;
    }
    function delete($id)
    {
        $sql="delete from {$this->tabla} where id_tipo_pc='{$id}'";
        $this->conexion->QuerySimple($sql);
    }

    function edit($id)
    {
        $sql="select id_tipo_pc,descripcion from {$this->tabla} where id_tipo_pc='{$id}'";
        $datos=$this->conexion->queryResultado($sql);
        return $datos;
    }
    function getOne($id)
    {
        $sql="SELECT * FROM tipos_pc where id_tipo_pc='{$id}'";
        $datos=$this->conexion->QueryResultado($sql);
        return $datos;
    }
    function update(){
        $sql = "update {$this->tabla} set descripcion='{$this->descripcion}'
               where id_tipo_pc='{$this->id_tipo_pc}'";
        $this->conexion->QuerySimple($sql);
    }
}
