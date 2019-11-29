<?php
/**
 * Created by PhpStorm.
 * User: Sullivan
 * Date: 11/11/2019
 * Time: 04:31 PM
 */

namespace AppData\Controller;


class Equipo_CompletoController
{
    private $Equipo_Completo,$equipo,$teclado,$mouse,$monitor;

    public function __construct()
    {
        $this->Equipo_Completo= new \AppData\Model\Equipo_Completo();

        $this->equipo= new \AppData\Model\Equipo();
        $this->monitor=new \AppData\Model\Display();
        $this->mouse=new \AppData\Model\Mouse();
        $this->teclado=new \AppData\Model\Keyboard();
    }

    public function index()
    {
        $datos1=$this->Equipo_Completo->getAll();

        $datos2=$this->equipo->getAll();
        $datos3=$this->teclado->getAll();
        $datos4=$this->mouse->getAll();
        $datos5=$this->monitor->getAll();


        $datos[0]=$datos1;

        $datos[1]=$datos2;
        $datos[2]=$datos3;
        $datos[3]=$datos4;
        $datos[4]=$datos5;
        return $datos;
    }
    public function crear(){
        if(isset($_POST))
        {
            $this->Equipo_Completo->set('id_equipo',$_POST["id_equipo"]);
            $this->Equipo_Completo->set('id_teclado',$_POST["id_teclado"]);
            $this->Equipo_Completo->set('id_mouse',$_POST["id_mouse"]);
            $this->Equipo_Completo->set('id_monitor',$_POST["id_monitor"]);

            $this->Equipo_Completo->add();
            $datos[0]=$this->Equipo_Completo->getAll();
            return $datos;
        }
    }
    public function eliminar($id)
    {
        $this->Equipo_Completo->delete($id[0]);
        $datos1=$this->Equipo_Completo->getAll();
        $datos[0]=$datos1;
        return $datos;
    }
    public function modificar($id)
    {
        $datos=$this->Equipo_Completo->getOne($id[0]);
        return $datos;
    }
    public function actualizar($id)
    {
        if($_POST)
        {
            $this->Equipo_Completo->set("id_equipo_completo",$id[0]);
            $this->Equipo_Completo->set('id_equipo',$_POST["id_equipo"]);
            $this->Equipo_Completo->set('id_teclado',$_POST["id_teclado"]);
            $this->Equipo_Completo->set('id_mouse',$_POST["id_mouse"]);
            $this->Equipo_Completo->set('id_monitor',$_POST["id_monitor"]);
            $this->Equipo_Completo->update();

            $datos1=$this->Equipo_Completo->getAll();
            $datos[0]=$datos1;
            return $datos;
        }
    }

}