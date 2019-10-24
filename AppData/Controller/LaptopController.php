<?php
/**
 * Created by PhpStorm.
 * User: Sullivan
 * Date: 24/10/2019
 * Time: 01:23 PM
 */

namespace AppData\Controller;


class LaptopController
{
    private $equipo;
    public function __construct()
    {
        $this->equipo= new \AppData\Model\Laptop();
    }

    public function index()
    {
        $datos[0]=$this->equipo->getAll();
        return $datos;
    }
    public function agregar(){
        if($_POST)
        {
            $this->equipo->set('service_tag',$_POST["service_tag"]);
            $this->equipo->set('garantia',$_POST["garantia"]);
            $this->equipo->set('id_modelo',$_POST["id_modelo"]);
            $this->equipo->set('id_tipo_pc',$_POST["id_tipo_pc"]);
            $this->equipo->add();
            $datos[0]=$this->equipo->getAll();
            header("Location:".URL."Laptop");
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