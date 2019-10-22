<?php
/**
 * Created by PhpStorm.
 * User: Sullivan
 * Date: 22/10/2019
 * Time: 12:48 AM
 */

namespace AppData\Model;


class Modelo
{
    private $tabla="modelo";
    private $id_modelo;
    private $descripcion;
    private $id_marca;

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
    function add()
    {
        $sql="insert into {$this->tabla} values('0','{$this->descripcion}','{$this->id_marca}')";
        $this->conexion->QuerySimple($sql);
    }
    function getAll()
    {

        $sql="SELECT modelo.descripcion,marca.descripcion	
                FROM modelo, marca
                where modelo.id_marca=marca.id_marca";

        $datos=$this->conexion->QueryResultado($sql);
        return $datos;
    }
    function delete($id)
    {
        $sql = "delete from {$this->tabla} where id_modelo='{$id}'";
        $this->conexion->QuerySimple($sql);
    }
    function getOne($id)
    {
        $sql = "select * from  {$this->tabla} where id_modelo='{$id}'";
        $datos = $this->conexion->QueryResultado($sql);
        return $datos;
    }


    function update()
    {
        $sql="UPDATE {$this->tabla} SET 
        id_modelo='{$this->id_modelo}', 
        descripcion='{$this->descripcion}',
        id_marca='{$this->id_marca}',
        WHERE id_modelo={$this->id_modelo}";
        $this->conexion->QuerySimple($sql);
    }

}