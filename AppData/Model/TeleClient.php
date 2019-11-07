<?php
/**
 * Created by PhpStorm.
 * User: Sullivan
 * Date: 06/11/2019
 * Time: 08:24 AM
 */

namespace AppData\Model;


class TeleClient
{
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

}