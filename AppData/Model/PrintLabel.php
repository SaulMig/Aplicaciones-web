<?php
/**
 * Created by PhpStorm.
 * User: Sullivan
 * Date: 28/10/2019
 * Time: 03:55 PM
 */

namespace AppData\Model;


class PrintLabel
{
    private $tabla="objetos";
    private $id_objeto;
    private $ip_address;
    private $id_modelo;
    private $descripcion;
    private $mac_address;

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
        $sql=" select objetos.descripcion as descripcion, marca.descripcion as marca, modelo.descripcion as modelo, objetos.ip_address as ip_address, objetos.mac_address as mac_address, objetos.id_objeto as m
                from objetos,marca,modelo,tipo_objeto
                where objetos.id_tipo_objeto=tipo_objeto.id_tipo_objeto
                and modelo.id_marca=marca.id_marca
                and objetos.id_modelo=modelo.id_modelo
                and objetos.id_tipo_objeto=402";
        $datos=$this->conexion->QueryResultado($sql);
        return $datos;
    }
    function add()
    {
        $sql="insert into `objetos`(`id_objeto`,`descripcion`,`ip_address`,`mac_address`,`id_modelo`,`id_tipo_objeto`) 
              values ('0','{$this->descripcion}','{$this->ip_address}','{$this->mac_address}','{$this->id_modelo}','402')";
        $this->conexion ->QuerySimple($sql);
    }
    function verify()
    {
        $sql="select * from {$this->tabla} where descripcion='{$this->descripcion}'";
        $dato=$this->conexion->QueryResultado($sql);
        return $dato;
    }
    function delete($id)
    {
        $sql="delete from {$this->tabla} where id_objeto='{$id}'";
        $this->conexion->QuerySimple($sql);
    }
    function edit($id)
    {
        $sql="select id_objeto,descripcion,ip_address,mac_address,id_modelo from {$this->tabla} where id_objeto='{$id}'";
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
                set descripcion='{$this->descripcion}',
                ip_address='{$this->ip_address}',
                mac_address='{$this->mac_address}',
                id_modelo='{$this->id_modelo}' 
                where id_objeto='{$this->id_objeto}'";
        $this->conexion->QuerySimple($sql);
    }

}