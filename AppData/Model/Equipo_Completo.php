<?php
/**
 * Created by PhpStorm.
 * User: Sullivan
 * Date: 11/11/2019
 * Time: 04:31 PM
 */

namespace AppData\Model;


class Equipo_Completo
{
    private $tabla="equipo_completo";
    private $id_equipo_completo;
    private $service_tag;
    private $teclado;
    private $mouse;
    private $monitor;

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
    function add()
    {
        $sql="insert into {$this->tabla} values('0','{$this->service_tag}','{$this->teclado}','{$this->mouse}', '{$this->monitor}')";
        $this->conexion->QuerySimple($sql);
    }
    function getAll()
    {

        $sql="select Ti.descripcion as equipo,EQ.service_tag as service_tag,
(	SELECT modelo.descripcion 
	FROM modelo, teclado 
	WHERE modelo.id_modelo=teclado.id_modelo 
	AND teclado.id_teclado=T.id_teclado
)as Teclado,
(	SELECT modelo.descripcion 
	FROM modelo , mouse 
	WHERE modelo.id_modelo=mouse.id_modelo 
	AND mouse.id_mouse=Mo.id_mouse
)as Mouse,
(	SELECT modelo.descripcion 
	FROM modelo, monitor 
	WHERE modelo.id_modelo=monitor.id_modelo 
	AND monitor.id_monitor=M.id_monitor
)as Monitor, E.id_equipo_completo as m 
    FROM equipo EQ JOIN equipo_completo E on EQ.id_equipo=E.id_equipo 
    JOIN teclado T on T.id_teclado=E.id_teclado 
    JOIN mouse Mo on Mo.id_mouse=E.id_mouse 
    JOIN monitor M on M.id_monitor=E.id_monitor 
    JOIN  tipos_pc Ti on Ti.id_tipo_pc=EQ.id_tipo_pc
";

        $datos=$this->conexion->QueryResultado($sql);
        return $datos;
    }
    function delete($id)
    {
        $sql = "delete from {$this->tabla} where id_equipo_completo='{$id}'";
        $this->conexion->QuerySimple($sql);
    }
    function getOne($id)
    {
        $sql = "select * from  {$this->tabla} where id_equipo_completo='{$id}'";
        $datos = $this->conexion->QueryResultado($sql);
        return $datos;
    }


    function update()
    {
        $sql="UPDATE {$this->tabla} SET 
        id_equipo='{$this->service_tag}', 
        id_teclado='{$this->teclado}',
        id_mouse='{$this->mouse}',
        id_monitor='{$this->monitor}'
        WHERE id_equipo_completo={$this->id_equipo_completo}";
        $this->conexion->QuerySimple($sql);
    }


}