<?php
/**
 * Created by PhpStorm.
 * User: Sullivan
 * Date: 23/10/2019
 * Time: 10:01 AM
 */

namespace AppData\Controller;


class Asigna_objetosController
{
    private $objetos;
    private $modelo;
    private $tipo_objeto;

    public function __construct()
    {
        $this->objetos= new \AppData\Model\Asigna_objetos();
        $this->modelo=new  \AppData\Model\Modelo();
        $this->tipo_objeto= new \AppData\Model\Equipo_OP();
    }

    public function index()
    {

        $datos[0]=$this->objetos->getAll();
        $datos2=$this->modelo->getAll();
        $datos3=$this->tipo_objeto->getAll();

        $datos[1]=$datos2;
        $datos[2]=$datos3;

        return $datos;
    }
    public function agregar(){
        if($_POST)
        {
            $this->objetos->set('ip_address',$_POST["ip_address"]);
            $this->objetos->set('id_modelo',$_POST["id_modelo"]);
            $this->objetos->set('id_tipo_objeto',$_POST["id_tipo_objeto"]);
            $this->objetos->add();
            $datos[0]=$this->objetos->getAll();
            header("Location:".URL."Asigna_objetos");
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
            $this->objetos->set('id_objeto',$_POST["id_objeto"]);
            $this->objetos->set('ip_address',$_POST["ip_address"]);
            $this->objetos->set('id_modelo',$_POST["id_modelo"]);
            $this->objetos->set('id_tipo_objeto',$_POST["id_tipo_objeto"]);
            $this->objetos->update();
            header("Location:".URL."Asigna_objetos");
        }

    }


}