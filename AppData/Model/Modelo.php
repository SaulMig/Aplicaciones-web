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
        $sql="SELECT modelo.descripcion,marca.descripcion as marca, id_modelo as m from modelo,marca where modelo.id_marca=marca.id_marca";
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