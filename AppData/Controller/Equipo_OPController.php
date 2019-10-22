<?php
/**
 * Created by PhpStorm.
 * User: Sullivan
 * Date: 22/10/2019
 * Time: 12:34 AM
 */

namespace AppData\Controller;


class Equipo_OPController
{
    private $tipo_objeto;
    public function __construct()
    {
        $this->tipo_objeto= new \AppData\Model\Equipo_OP();

    }
    public function index()
    {
        $datos[0]=$this->tipo_objeto->getAll();
        return $datos;
    }
    public function agregar(){
        if($_POST)
        {
            $this->tipo_objeto->set('descripcion',$_POST["descripcion"]);
            $this->tipo_objeto->add();
            $datos[0]=$this->tipo_objeto->getAll();
            header("Location:".URL."Equipo_OP");
            return $datos;
        }
    }

    public function eliminar($id)
    {
        $this->tipo_objeto->delete($id[0]);
        $datos1=$this->tipo_objeto->getAll();
        $datos[0]=$datos1;
        return $datos;
    }

    public function modificar ($id)
    {
        $datos=$this->tipo_objeto->edit($id[0]);
        print_r(json_encode(mysqli_fetch_assoc($datos)));
    }
    public function actualizar($id)
    {
        print_r($_POST);
        if($_POST)
        {
            $this->tipo_objeto->set('id_tipo_objeto',$_POST["id"]);
            $this->tipo_objeto->set('descripcion',$_POST["descripcion"]);
            $this->tipo_objeto->update();
            header("Location:".URL."Equipo_OP");
        }

    }

}