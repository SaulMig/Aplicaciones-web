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
            $this->equipo->set('service_tag',$_POST["service_tag"]);
            $this->equipo->set('garantia',$_POST["garantia"]);
            $this->equipo->set('garantia_fin',$_POST["garantia_fin"]);
            $this->equipo->set('id_modelo',$_POST["id_modelo"]);
            $this->equipo->set('id_tipo_pc',$_POST["id_tipo_pc"]);
            $datos[1]=false;
            if(mysqli_num_rows($this->equipo->verify())==0){
                $this->equipo->add();
                header("Location:".URL."Desktops");
                $datos[1]=true;
            }

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
    public function modificar ($id)
    {
        $datos=$this->equipo->edit($id[0]);
        print_r(json_encode(mysqli_fetch_assoc($datos)));
    }
    public function actualizar($id)
    {
        print_r($_POST);
        if($_POST)
        {
            $this->equipo->set('id_equipo',$_POST["id"]);
            $this->equipo->set('service_tag',$_POST["service_tag"]);
            $this->equipo->set('garantia',$_POST["garantia"]);
            $this->equipo->set('garantia_fin',$_POST["garantia_fin"]);
            $this->equipo->set('id_modelo',$_POST["id_modelo"]);
            $this->equipo->update();
            header("Location:".URL."Desktops");
        }
    }

}