<?php
/**
 * Created by PhpStorm.
 * User: Sullivan
 * Date: 22/10/2019
 * Time: 05:14 PM
 */

namespace AppData\Controller;


class AreaController
{
    private $lugar;
    public function __construct()
    {
        $this->lugar= new \AppData\Model\Area();

    }
    public function index()
    {
        $datos[0]=$this->lugar->getAll();
        return $datos;
    }
    public function agregar(){
        if($_POST)
        {
            $this->lugar->set('descripcion',$_POST["descripcion"]);
            $this->lugar->add();
            $datos[0]=$this->lugar->getAll();
            header("Location:".URL."Area");
            return $datos;
        }
    }

    public function eliminar($id)
    {
        $this->lugar->delete($id[0]);
        $datos1=$this->lugar->getAll();
        $datos[0]=$datos1;
        return $datos;
    }

    public function modificar ($id)
    {
        $datos=$this->lugar->edit($id[0]);
        print_r(json_encode(mysqli_fetch_assoc($datos)));
    }
    public function actualizar($id)
    {
        print_r($_POST);
        if($_POST)
        {
            $this->lugar->set('id_area',$_POST["id"]);
            $this->lugar->set('descripcion',$_POST["descripcion"]);
            $this->lugar->update();
            header("Location:".URL."Area");
        }

    }

}