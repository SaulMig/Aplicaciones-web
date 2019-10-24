<?php
/**
 * Created by PhpStorm.
 * User: Sullivan
 * Date: 23/10/2019
 * Time: 09:50 AM
 */

namespace AppData\Controller;


class DesktopsController
{
    private $equipo;
    public function __construct()
    {
        $this->equipo= new \AppData\Model\Desktops();
    }

    public function index()
    {
        $datos[0]=$this->equipo->getAll();
        return $datos;
    }
    public function agregar(){
        if($_POST)
        {
            $this->equipo->set('descripcion',$_POST["descripcion"]);
            $this->equipo->set('id_marca',$_POST["id_marca"]);
            $this->equipo->add();
            $datos[0]=$this->equipo->getAll();
            header("Location:".URL."Desktops");
            return $datos;
        }
    }
    public function eliminar($id)
    {
        $this->equipo->delete($id[0]);
        $datos1=$this->equipo->getAll();
        $datos[0]=$datos1;
        return $datos;
    }

}