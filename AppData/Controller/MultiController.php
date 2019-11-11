<?php
/**
 * Created by PhpStorm.
 * User: Sullivan
 * Date: 08/11/2019
 * Time: 04:30 PM
 */

namespace AppData\Controller;


class MultiController
{
    private $multi;


    public function __construct()
    {
        $this->multi= new \AppData\Model\Multi();

    }

    public function index()
    {

        $datos[0]=$this->multi->getAll();
        return $datos;
    }
    public function agregar(){
        if($_POST)
        {
            $this->multi->set('no_copias',$_POST["no_copias"]);
            $this->multi->set('no_impresion',$_POST["no_impresion"]);
            $this->multi->set('total',$_POST["total"]);
            $this->multi->set('id_objeto',$_POST["id_objeto"]);
            $this->multi->set('id_area',$_POST["id_area"]);
            $datos[1]=false;
            if(mysqli_num_rows($this->multi->verify())==0){
                $this->multi->add();
                header("Location:".URL."Multi");
                $datos[1]=true;
            }

            $datos[0]=$this->multi->getAll();
            header("Location:".URL."Multi");
            return $datos;
        }
    }
    public function eliminar($id)
    {
        $this->multi->delete($id[0]);
        $datos1=$this->multi->getAll();
        $datos[0]=$datos1;
        return $datos;
    }
    public function modificar ($id)
    {
        $datos=$this->multi->edit($id[0]);
        print_r(json_encode(mysqli_fetch_assoc($datos)));
    }
    public function actualizar($id)
    {
        print_r($_POST);
        if($_POST)
        {
            $this->multi->set('id_multi',$_POST["id"]);
            $this->multi->set('no_copias',$_POST["no_copias"]);
            $this->multi->set('no_impresion',$_POST["no_impresion"]);
            $this->multi->set('total',$_POST["total"]);
            $this->multi->set('id_objeto',$_POST["id_objeto"]);
            $this->multi->set('id_area',$_POST["id_area"]);
            $this->multi->update();
            header("Location:".URL."Multi");
        }

    }


}