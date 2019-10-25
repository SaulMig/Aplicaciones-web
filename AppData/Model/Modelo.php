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
        $sql="SELECT modelo.descripcion,marca.descripcion as marca, id_modelo as m from modelo,marca where modelo.id_marca=marca.id_marca order by marca";
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
    function edit($id)
    {
        $sql="select id_modelo,descripcion from {$this->tabla} where id_modelo='{$id}'";
        $datos=$this->conexion->queryResultado($sql);
        return $datos;
    }
    function getOne($id)
    {
        $sql="SELECT * FROM modelo where id_modelo='{$id}'";
        $datos=$this->conexion->QueryResultado($sql);
        return $datos;
    }
    function update(){
        $sql = "update {$this->tabla} set descripcion='{$this->descripcion}',id_marca='{$this->id_marca}'
               where id_modelo='{$this->id_modelo}'";
        $this->conexion->QuerySimple($sql);
    }
}