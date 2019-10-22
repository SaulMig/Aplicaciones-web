<?php
/**
 * Created by PhpStorm.
 * User: Sullivan
 * Date: 22/10/2019
 * Time: 12:48 AM
 */

namespace AppData\Controller;


class ModeloController
{
    private $modelo;
    private $marca;

    public function __construct()
    {
        $this->modelo= new \AppData\Model\Modelo();
        $this->marca=new \AppData\Model\Marca();

    }

    public function index()
    {

        $datos1=$this->modelo->getAll();
        $datos2=$this->marca->getAll();

        $datos[0]=$datos1;
        $datos[1]=$datos2;


        return $datos;
    }
    public function crear(){
        if(isset($_POST))
        {
            $this->modelo->set('descripcion',$_POST["descripcion"]);
            $this->modelo->set('id_marca',$_POST["marca"]);


            $this->modelo->add();
            $datos[0]=$this->modelo->getAll();
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
    public function modificar($id)
    {
        $datos=$this->modelo->getOne($id[0]);
        return $datos;
    }
    public function actualizar($id)
    {
        if($_POST)
        {
            $this->modelo->set("id_modelo",$id[0]);
            $this->modelo->set('descripcion',$_POST["descripcion"]);
            $this->modelo->set('id_marca',$_POST["marca"]);

            $this->modelo->update();

            $datos1=$this->modelo->getAll();
            $datos[0]=$datos1;
            return $datos;
        }
    }
    public function print_pdf()
    {
        $datos=$this->modelo->getAll();
        return $datos;
    }

}