<?php
/**
 * Created by PhpStorm.
 * User: Sullivan
 * Date: 28/10/2019
 * Time: 01:38 PM
 */

namespace AppData\Model;


class Keyboard
{
    private $tabla="teclado";
    private $id_teclado;
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
        $sql="select teclado.descripcion as descripcion, modelo.descripcion as modelo, teclado.id_teclado as m
                from marca, modelo, teclado
                where teclado.id_modelo=modelo.id_modelo
                and modelo.id_marca=marca.id_marca";
        $datos=$this->conexion->QueryResultado($sql);
        return $datos;
    }
    function add()
    {
        $sql="insert into `teclado`(`id_teclado`,`descripcion`,`id_modelo`) values ('0','{$this->descripcion}','{$this->id_modelo}')";
        $this->conexion ->QuerySimple($sql);
    }
    function delete($id)
    {
        $sql="delete from {$this->tabla} where id_teclado='{$id}'";
        $this->conexion->QuerySimple($sql);
    }
    function edit($id)
    {
        $sql="select id_teclado,descripcion,id_modelo from {$this->tabla} where id_teclado='{$id}'";
        $datos=$this->conexion->queryResultado($sql);
        return $datos;
    }
    function getOne($id)
    {
        $sql="SELECT * FROM teclado where id_teclado='{$id}'";
        $datos=$this->conexion->QueryResultado($sql);
        return $datos;
    }
    function update(){
        $sql = "update {$this->tabla} 
                set descripcion='{$this->descripcion}',id_modelo='{$this->id_modelo}'
               where id_teclado='{$this->id_teclado}'";
        $this->conexion->QuerySimple($sql);
    }
}