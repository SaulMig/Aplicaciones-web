<?php
/**
 * Created by PhpStorm.
 * User: Sullivan
 * Date: 05/11/2019
 * Time: 11:20 PM
 */

namespace AppData\Model;


class PrintLabelClient
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

}