<?php
/**
 * Created by PhpStorm.
 * User: Sullivan
 * Date: 25/10/2019
 * Time: 12:30 PM
 */

namespace AppData\Model;


class Display
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
        $sql="select marca.descripcion, modelo.descripcion,usuario.nickname,monitor.pulgadas, lugar.descripcion
              from marca,modelo,lugar,equipo_completo,prestamos,monitor
              where modelo.id_marca=marca.id_marca
                and equipo_completo.id_monitor=monitor.id_monitor
                and equipo_completo.id_area=lugar.id_area
                and prestamos.id_equipo_completo=equipo_completo.id_equipo_completo
                and monitor.id_modelo=modelo.id_modelo";
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
        $sql = "update {$this->tabla} 
                set descripcion='{$this->descripcion}',id_marca='{$this->id_marca}'
               where id_modelo='{$this->id_modelo}'";
        $this->conexion->QuerySimple($sql);
    }

}