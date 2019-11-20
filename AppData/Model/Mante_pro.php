<?php
/**
 * Created by PhpStorm.
 * User: Sullivan
 * Date: 15/11/2019
 * Time: 09:35 AM
 */

namespace AppData\Model;


class Mante_pro
{
    private $tabla="mantenimiento_programado";
    private $id_mantenimiento_pro;
    private $fecha_mto;
    private $fecha_proximo;
    private $observacion;
    private $id_prestamo;

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
        $sql="select  
                prestamos.nombre_eq as equipo, 
                usuario.nickname as usuario, 
                mantenimiento_programado.fecha_mto as fecha1, 
                mantenimiento_programado.fecha_proximo as fecha2,
                equipo.garantia as garantia1,
                equipo.garantia_fin as garantia2,
                mantenimiento_programado.observacion as observacion,
                mantenimiento_programado.id_mantenimiento_pro as m
                from 
                equipo,
                prestamos,
                usuario,
                mantenimiento_programado,
                equipo_completo
                where mantenimiento_programado.id_prestamo=prestamos.id_prestamo
                and prestamos.id_usuario=usuario.id_usuario
                and equipo.id_equipo=equipo_completo.id_equipo
                and prestamos.id_equipo_completo=equipo_completo.id_equipo_completo";
        $datos=$this->conexion->QueryResultado($sql);
        return $datos;
    }
    function add()
    {
        $sql="insert into `mantenimiento_programado`(`id_mantenimiento_pro`,`fecha_mto`,`fecha_proximo`,`observacion`,id_prestamo) 
              values ('0','{$this->fecha_mto}','{$this->fecha_proximo}','{$this->observacion}','{$this->id_prestamo}')";
        $this->conexion ->QuerySimple($sql);
    }
    function verify()
    {
        $sql="select * from {$this->tabla} where id_prestamo='{$this->id_prestamo}'";
        $dato=$this->conexion->QueryResultado($sql);
        return $dato;
    }
    function delete($id)
    {
        $sql="delete from {$this->tabla} where id_mantenimiento_pro='{$id}'";
        $this->conexion->QuerySimple($sql);
    }
    function edit($id)
    {
        $sql="select id_mantenimiento_pro,fecha_mto,fecha_proximo,observacion,id_prestamo 
              from {$this->tabla} 
              where id_mantenimiento_pro='{$id}'";
        $datos=$this->conexion->queryResultado($sql);
        return $datos;
    }
    function getOne($id)
    {
        $sql="SELECT * FROM mantenimiento_programado where id_mantenimiento_pro='{$id}'";
        $datos=$this->conexion->QueryResultado($sql);
        return $datos;
    }
    function update(){
        $sql = "update {$this->tabla} 
                set fecha_mto='{$this->fecha_mto}',
                fecha_proximo='{$this->fecha_proximo}',
                observacion='{$this->observacion}'
                    id_prestamo='{$this->id_prestamo}'
               where id_mantenimiento_pro='{$this->id_mantenimiento_pro}'";
        $this->conexion->QuerySimple($sql);
    }

}