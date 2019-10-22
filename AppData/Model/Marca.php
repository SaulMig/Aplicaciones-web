<?php
/**
 * Created by PhpStorm.
 * User: Sullivan
 * Date: 09/10/2019
 * Time: 02:40 PM
 */

namespace AppData\Model;


class Marca
{
    private $tabla="marca";
    private  $id_marca;
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

    function add()
    {
        $sql="INSERT INTO {$this->tabla}  VALUES (0,'{$this->descripcion}')";
        $this->conexion ->QuerySimple($sql);
    }

    function getAll()
    {
        $sql="select *from {$this->tabla} ";
        $datos=$this->conexion->queryResultado($sql);
        return $datos;
    }


    function verify(){
        $sql = "select * from {$this->tabla} where  descripcion='{$this->descripcion}' ";
        $dato=$this->conexion->QueryResultado($sql);
        return $dato;
    }
    function delete($id)
    {
        $sql="delete from {$this->tabla} where id_marca='{$id}'";
        $this->conexion->QuerySimple($sql);
    }

    function edit($id)
    {
        $sql="select id_marca,descripcion from {$this->tabla} where id_marca='{$id}'";
        $datos=$this->conexion->queryResultado($sql);
        return $datos;
    }
    function getOne($id)
    {
        $sql="SELECT * FROM marca where id_marca='{$id}'";
        $datos=$this->conexion->QueryResultado($sql);
        return $datos;
    }
    function update(){
        $stm=$this->conexion->proc2($this->Nombre,$this->descripcion,$this->lugar,$this->fecha,$this->Fecha_fin,$this->Horario,$this->img,$this->id_evento);
    }

}