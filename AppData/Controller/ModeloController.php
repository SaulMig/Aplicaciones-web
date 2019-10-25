<?php

namespace AppData\Controller;


class ModeloController
{
    private $modelo;
    public function __construct()
    {
        $this->modelo= new \AppData\Model\Modelo();
    }

    public function index()
    {
        $datos[0]=$this->modelo->getAll();
        return $datos;
    }
    public function agregar(){
        if($_POST)
        {
            $this->modelo->set('descripcion',$_POST["descripcion"]);
            $this->modelo->set('id_marca',$_POST["id_marca"]);
            $this->modelo->add();
            $datos[0]=$this->modelo->getAll();
            header("Location:".URL."Modelo");
            return $datos;
        }
    }
    public function eliminar($id)
    {
        $this->modelo->delete($id[0]);
        $datos1=$this->modelo->getAll();
        $datos[0]=$datos1;
        return $datos;
    }
    public function modificar ($id)
    {
        $datos=$this->modelo->edit($id[0]);
        print_r(json_encode(mysqli_fetch_assoc($datos)));
    }
    public function actualizar($id)
    {
        print_r($_POST);
        if($_POST)
        {
            $this->modelo->set('id_modelo',$_POST["id"]);
            $this->modelo->set('descripcion',$_POST["descripcion"]);
            $this->modelo->set('id_marca',$_POST["id_marca"]);
            $this->modelo->update();
            header("Location:".URL."Modelo");
        }
    }
}