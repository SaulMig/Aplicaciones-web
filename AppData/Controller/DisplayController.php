<?php
/**
 * Created by PhpStorm.
 * User: Sullivan
 * Date: 25/10/2019
 * Time: 12:29 PM
 */

namespace AppData\Controller;


class DisplayController
{
    private $monitor;
    public function __construct()
    {
        $this->monitor= new \AppData\Model\Display();

    }
    public function index()
    {
        $datos[0]=$this->monitor->getAll();
        return $datos;
    }

    public function agregar(){
        if($_POST)
        {
            $this->monitor->set('pulgadas',$_POST["pulgadas"]);
            $this->monitor->set('id_modelo',$_POST["id_modelo"]);
            $this->monitor->add();
            $datos[0]=$this->monitor->getAll();
            header("Location:".URL."Display");
            return $datos;
        }
    }

    public function eliminar($id)
    {
        $this->monitor->delete($id[0]);
        $datos1=$this->monitor->getAll();
        $datos[0]=$datos1;
        return $datos;
    }
    public function modificar ($id)
    {
        $datos=$this->monitor->edit($id[0]);
        print_r(json_encode(mysqli_fetch_assoc($datos)));
    }
    public function actualizar($id)
    {
        print_r($_POST);
        if($_POST)
        {
            $this->monitor->set('id_monitor',$_POST["id"]);
            $this->monitor->set('pulgadas',$_POST["pulgadas"]);
            $this->monitor->set('id_modelo',$_POST["id_modelo"]);
            $this->monitor->update();
            header("Location:".URL."Display");
        }
    }

}