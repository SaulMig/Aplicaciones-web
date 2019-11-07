<?php
/**
 * Created by PhpStorm.
 * User: Sullivan
 * Date: 05/11/2019
 * Time: 11:42 PM
 */

namespace AppData\Controller;


class TeleController
{
    private $objetos;


    public function __construct()
    {
        $this->objetos= new \AppData\Model\Tele();

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
            $this->objetos->set('id_modelo',$_POST["id_modelo"]);
            $this->objetos->set('id_tipo_objeto',$_POST["id_tipo_objeto"]);
            $this->objetos->set('id_usuario',$_POST["id_usuario"]);
            $this->objetos->add();
            $datos[0]=$this->objetos->getAll();
            header("Location:".URL."Tele");
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
            $this->objetos->set('id_modelo',$_POST["id_modelo"]);
            $this->objetos->set('id_usuario',$_POST["id_usuario"]);
            $this->objetos->update();
            header("Location:".URL."Tele");
        }

    }

}