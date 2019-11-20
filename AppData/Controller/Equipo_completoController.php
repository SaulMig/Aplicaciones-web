<?php
/**
 * Created by PhpStorm.
 * User: Sullivan
 * Date: 11/11/2019
 * Time: 04:31 PM
 */

namespace AppData\Controller;


class Equipo_completoController
{
    private $equipo_c,$equipo,$teclado,$mouse,$monitor;

    public function __construct()
    {
        $this->equipo_c= new \AppData\Model\Equipo_Completo();

        $this->equipo= new \AppData\Model\Equipo();
        $this->monitor=new \AppData\Model\Display();
        $this->mouse=new \AppData\Model\Mouse();
        $this->teclado=new \AppData\Model\Keyboard();
    }

    public function index()
    {
        $datos1=$this->equipo_c->getAll();

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
            $this->equipo_c->set('service_tag',$_POST["service_tag"]);
            $this->equipo_c->set('teclado',$_POST["teclado"]);
            $this->equipo_c->set('mouse',$_POST["mouse"]);
            $this->equipo_c->set('monitor',$_POST["monitor"]);

            $this->equipo_c->add();
            $datos[0]=$this->equipo_c->getAll();
            return $datos;
        }
    }
    public function eliminar($id)
    {
        $this->equipo_c->delete($id[0]);
        $datos1=$this->equipo_c->getAll();
        $datos[0]=$datos1;
        return $datos;
    }
    public function modificar($id)
    {
        $datos=$this->equipo_c->getOne($id[0]);
        return $datos;
    }
    public function actualizar($id)
    {
        if($_POST)
        {
            $this->equipo_c->set("id_quipo_completo",$id[0]);
            $this->equipo_c->set('service_tag',$_POST["service_tag"]);
            $this->equipo_c->set('teclado',$_POST["teclado"]);
            $this->equipo_c->set('mouse',$_POST["mouse"]);
            $this->equipo_c->set('monitor',$_POST["monitor"]);
            $this->equipo_c->update();

            $datos1=$this->equipo_c->getAll();
            $datos[0]=$datos1;
            return $datos;
        }
    }

}