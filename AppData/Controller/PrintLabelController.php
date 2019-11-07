<?php
/**
 * Created by PhpStorm.
 * User: Sullivan
 * Date: 28/10/2019
 * Time: 03:55 PM
 */

namespace AppData\Controller;


class PrintLabelController
{
    private $objetos;


    public function __construct()
    {
        $this->objetos= new \AppData\Model\PrintLabel();

    }

    public function index()
    {

        $datos[0]=$this->objetos->getAll();
        return $datos;
    }
    public function agregar(){
        if($_POST)
        {
            $this->objetos->set('descripcion',$_POST["descripcion"]);
            $this->objetos->set('ip_address',$_POST["ip_address"]);
            $this->objetos->set('mac_address',$_POST["mac_address"]);
            $this->objetos->set('id_modelo',$_POST["id_modelo"]);
            $this->objetos->set('id_tipo_objeto',$_POST["id_tipo_objeto"]);
            $datos[1]=false;
            if(mysqli_num_rows($this->objetos->verify())==0){
                $this->objetos->add();
                header("Location:".URL."PrintLabel");
                $datos[1]=true;
            }

            $datos[0]=$this->objetos->getAll();
            header("Location:".URL."PrintLabel");
            return $datos;
        }
    }
    public function eliminar($id)
    {
        $this->objetos->delete($id[0]);
        $datos1=$this->objetos->getAll();
        $datos[0]=$datos1;
        return $datos;
    }
    public function modificar ($id)
    {
        $datos=$this->objetos->edit($id[0]);
        print_r(json_encode(mysqli_fetch_assoc($datos)));
    }
    public function actualizar($id)
    {
        print_r($_POST);
        if($_POST)
        {
            $this->objetos->set('id_objeto',$_POST["id"]);
            $this->objetos->set('descripcion',$_POST["descripcion"]);
            $this->objetos->set('ip_address',$_POST["ip_address"]);
            $this->objetos->set('mac_address',$_POST["mac_address"]);
            $this->objetos->set('id_modelo',$_POST["id_modelo"]);
            $this->objetos->update();
            header("Location:".URL."PrintLabel");
        }

    }

}