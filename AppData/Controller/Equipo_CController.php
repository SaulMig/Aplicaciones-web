<?php

namespace AppData\Controller;


class Equipo_CController
{
    private $tipos_pc;
    public function __construct()
    {
        $this->tipos_pc= new \AppData\Model\Equipo_C();

    }
    public function index()
    {
        $datos[0]=$this->tipos_pc->getAll();
        return $datos;
    }
    public function agregar(){
        if($_POST)
        {
            $this->tipos_pc->set('descripcion',$_POST["descripcion"]);
            $this->tipos_pc->add();
            $datos[0]=$this->tipos_pc->getAll();
            header("Location:".URL."Equipo_C");
            return $datos;
        }
    }

    public function eliminar($id)
    {
        $this->tipos_pc->delete($id[0]);
        $datos1=$this->tipos_pc->getAll();
        $datos[0]=$datos1;
        return $datos;
    }

    public function modificar ($id)
    {
        $datos=$this->tipos_pc->edit($id[0]);
        print_r(json_encode(mysqli_fetch_assoc($datos)));
    }
    public function actualizar($id)
    {
        print_r($_POST);
        if($_POST)
        {
            $this->tipos_pc->set('id_tipo_pc',$_POST["id"]);
            $this->tipos_pc->set('descripcion',$_POST["descripcion"]);
            $this->tipos_pc->update();
            header("Location:".URL."Equipo_C");
        }

    }

}