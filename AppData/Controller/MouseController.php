<?php
/**
 * Created by PhpStorm.
 * User: Sullivan
 * Date: 29/10/2019
 * Time: 11:34 AM
 */

namespace AppData\Controller;


class MouseController
{
    private $mouse;
    public function __construct()
    {
        $this->mouse= new \AppData\Model\Mouse();

    }
    public function index()
    {
        $datos[0]=$this->mouse->getAll();
        return $datos;
    }

    public function agregar(){
        if($_POST)
        {
            $this->mouse->set('descripcion',$_POST["descripcion"]);
            $this->mouse->set('id_modelo',$_POST["id_modelo"]);
            $this->mouse->add();
            $datos[0]=$this->mouse->getAll();
            header("Location:".URL."Mouse");
            return $datos;
        }
    }

    public function eliminar($id)
    {
        $this->mouse->delete($id[0]);
        $datos1=$this->mouse->getAll();
        $datos[0]=$datos1;
        return $datos;
    }
    public function modificar ($id)
    {
        $datos=$this->mouse->edit($id[0]);
        print_r(json_encode(mysqli_fetch_assoc($datos)));
    }
    public function actualizar($id)
    {
        print_r($_POST);
        if($_POST)
        {
            $this->mouse->set('id_mouse',$_POST["id"]);
            $this->mouse->set('descripcion',$_POST["descripcion"]);
            $this->mouse->set('id_modelo',$_POST["id_modelo"]);
            $this->mouse->update();
            header("Location:".URL."Mouse");
        }
    }

}