<?php
/**
 * Created by PhpStorm.
 * User: Sullivan
 * Date: 29/10/2019
 * Time: 11:37 AM
 */

namespace AppData\Model;


class Mouse
{
    private $tabla="mouse";
    private $id_mouse;
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
        $sql="select mouse.descripcion as descripcion, modelo.descripcion as modelo, mouse.id_mouse as m
                from marca, modelo, mouse
                where mouse.id_modelo=modelo.id_modelo
                and modelo.id_marca=marca.id_marca";
        $datos=$this->conexion->QueryResultado($sql);
        return $datos;
    }
    function add()
    {
        $sql="insert into `mouse`(`id_mouse`,`descripcion`,`id_modelo`) values ('0','{$this->descripcion}','{$this->id_modelo}')";
        $this->conexion ->QuerySimple($sql);
    }
    function delete($id)
    {
        $sql="delete from {$this->tabla} where id_mouse='{$id}'";
        $this->conexion->QuerySimple($sql);
    }
    function edit($id)
    {
        $sql="select id_mouse,descripcion,id_modelo from {$this->tabla} where id_mouse='{$id}'";
        $datos=$this->conexion->queryResultado($sql);
        return $datos;
    }
    function getOne($id)
    {
        $sql="SELECT * FROM mouse where id_mouse='{$id}'";
        $datos=$this->conexion->QueryResultado($sql);
        return $datos;
    }
    function update(){
        $sql = "update {$this->tabla} 
                set descripcion='{$this->descripcion}',id_modelo='{$this->id_modelo}'
               where id_mouse='{$this->id_mouse}'";
        $this->conexion->QuerySimple($sql);
    }

}