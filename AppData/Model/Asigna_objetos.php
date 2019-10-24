<?php
/**
 * Created by PhpStorm.
 * User: Sullivan
 * Date: 23/10/2019
 * Time: 10:01 AM
 */

namespace AppData\Model;


class Asigna_objetos
{
    private $tabla="objetos";
    private $id_objeto;
    private $ip_address;
    private $id_modelo;
    private $id_tipo_objeto;

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
        $sql="SELECT tipo_objeto.descripcion as Equipo, marca.descripcion as marca, modelo.descripcion as modelo, objetos.ip_address,objetos.id_objeto as m
              from tipo_objeto, objetos, modelo, marca
              where objetos.id_tipo_objeto=tipo_objeto.id_tipo_objeto
              and objetos.id_modelo=modelo.id_modelo
              and modelo.id_marca=marca.id_marca";
        $datos=$this->conexion->QueryResultado($sql);
        return $datos;
    }
    function add()
    {
        $sql="insert into `objetos`(`id_objeto`,`ip_addres`,`id_modelo`,`id_tipo_objeto`) values ('0','{$this->ip_address}','{$this->id_modelo}','{$this->id_tipo_objeto}')";
        $this->conexion ->QuerySimple($sql);
    }
    function delete($id)
    {
        $sql="delete from {$this->tabla} where id_objeto='{$id}'";
        $this->conexion->QuerySimple($sql);
    }

}