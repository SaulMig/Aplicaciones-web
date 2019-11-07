<?php
/**
 * Created by PhpStorm.
 * User: Sullivan
 * Date: 05/11/2019
 * Time: 11:42 PM
 */

namespace AppData\Model;


class Tele
{
    private $tabla="objetos";
    private $id_objeto;
    private $ip_address;
    private $id_modelo;
    private $descripcion;
    private $mac_address;
    private $id_usuario;

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
        $sql=" select usuario.email as usuario, objetos.descripcion as descripcion, objetos.ip_address as ip_address, marca.descripcion as marca,modelo.descripcion as modelo, objetos.id_objeto as m
                from objetos,usuario,tipo_objeto,modelo,marca
                where objetos.id_tipo_objeto=tipo_objeto.id_tipo_objeto
                and objetos.id_modelo=modelo.id_modelo
                and objetos.id_usuario=usuario.id_usuario
                and modelo.id_marca=marca.id_marca
                and tipo_objeto.id_tipo_objeto=405 ";
        $datos=$this->conexion->QueryResultado($sql);
        return $datos;
    }
    function add()
    {
        $sql="insert into `objetos`(`id_objeto`,`descripcion`,`ip_address`,`id_modelo`,`id_tipo_objeto`,`id_usuario`) 
              values ('0','{$this->descripcion}','{$this->ip_address}','{$this->id_modelo}','405','{$this->id_usuario}')";
        $this->conexion ->QuerySimple($sql);
    }
    function delete($id)
    {
        $sql="delete from {$this->tabla} where id_objeto='{$id}'";
        $this->conexion->QuerySimple($sql);
    }
    function edit($id)
    {
        $sql="select id_objeto,descripcion,ip_addres,id_modelo,id_usuario from {$this->tabla} where id_objeto='{$id}'";
        $datos=$this->conexion->queryResultado($sql);
        return $datos;
    }
    function getOne($id)
    {
        $sql="SELECT * FROM objetos where id_objeto='{$id}'";
        $datos=$this->conexion->QueryResultado($sql);
        return $datos;
    }
    function update(){
        $sql = "update {$this->tabla}
                set descripcion='{$this->descripcion}',ip_address='{$this->ip_address}',id_modelo='{$this->id_modelo}',id_usuario='{$this->id_usuario}' 
                where id_objeto='{$this->id_objeto}'";
        $this->conexion->QuerySimple($sql);
    }

}