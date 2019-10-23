<?php
namespace AppData\Controller;


class MarcaController
{
    private $marca;
    public function __construct()
    {
        $this->marca= new \AppData\Model\Marca();

    }
    public function index()
    {
        $datos[0]=$this->marca->getAll();
        return $datos;
    }

    public function agregar(){
        if($_POST)
        {
            $this->marca->set('descripcion',$_POST["descripcion"]);
            $this->marca->add();
            $datos[0]=$this->marca->getAll();
            header("Location:".URL."Marca");
            return $datos;
        }
    }

    public function eliminar($id)
    {
        $this->marca->delete($id[0]);
        $datos1=$this->marca->getAll();
        $datos[0]=$datos1;
        return $datos;
    }


    public function modificar ($id)
    {
        $datos=$this->marca->edit($id[0]);
        print_r(json_encode(mysqli_fetch_assoc($datos)));
    }

    public function actualizar($id)
    {
        print_r($_POST);
        if($_POST)
        {
            $this->marca->set('id_marca',$_POST["id"]);
            $this->marca->set('descripcion',$_POST["descripcion"]);
            $this->marca->update();
            header("Location:".URL."Marca");
        }

    }

}