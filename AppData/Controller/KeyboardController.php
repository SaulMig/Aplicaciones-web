<?php
/**
 * Created by PhpStorm.
 * User: Sullivan
 * Date: 28/10/2019
 * Time: 01:37 PM
 */

namespace AppData\Controller;


class KeyboardController
{
    private $teclado;
    public function __construct()
    {
        $this->teclado= new \AppData\Model\Keyboard();

    }
    public function index()
    {
        $datos[0]=$this->teclado->getAll();
        return $datos;
    }

    public function agregar(){
        if($_POST)
        {
            $this->teclado->set('descripcion',$_POST["descripcion"]);
            $this->teclado->set('id_modelo',$_POST["id_modelo"]);
            $this->teclado->add();
            $datos[0]=$this->teclado->getAll();
            header("Location:".URL."Keyboard");
            return $datos;
        }
    }

    public function eliminar($id)
    {
        $this->teclado->delete($id[0]);
        $datos1=$this->teclado->getAll();
        $datos[0]=$datos1;
        return $datos;
    }
    public function modificar ($id)
    {
        $datos=$this->teclado->edit($id[0]);
        print_r(json_encode(mysqli_fetch_assoc($datos)));
    }
    public function actualizar($id)
    {
        print_r($_POST);
        if($_POST)
        {
            $this->teclado->set('id_teclado',$_POST["id"]);
            $this->teclado->set('descripcion',$_POST["descripcion"]);
            $this->teclado->set('id_modelo',$_POST["id_modelo"]);
            $this->teclado->update();
            header("Location:".URL."Keyboard");
        }
    }
}