<?php
/**
 * Created by PhpStorm.
 * User: Sullivan
 * Date: 09/10/2019
 * Time: 03:59 PM
 */

namespace AppData\Controller;


class UsuarioController
{
    private $usuario;
    public function __construct()
    {
        $this->usuario= new \AppData\Model\Usuario();

    }
    public function index()
    {
        $datos[0]=$this->usuario->getAll();
        return $datos;
    }
    public function agregar(){
        if($_POST)
        {
            $this->usuario->set('nickname',$_POST["nickname"]);
            $this->usuario->set('email',$_POST["email"]);
            $this->usuario->add();
            $datos[0]=$this->usuario->getAll();
            header("Location:".URL."Usuario");
            return $datos;
        }
    }

    public function eliminar($id)
    {
        $this->usuario->delete($id[0]);
        $datos1=$this->usuario->getAll();
        $datos[0]=$datos1;
        return $datos;
    }

    public function modificar ($id)
    {
        $datos=$this->usuario->edit($id[0]);
        print_r(json_encode(mysqli_fetch_assoc($datos)));
    }
    public function actualizar($id)
    {
        print_r($_POST);
        if($_POST)
        {
            $this->usuario->set('id_usuario',$_POST["id"]);
            $this->usuario->set('nickname',$_POST["nickname"]);
            $this->usuario->set('email',$_POST["email"]);;
            $this->usuario->update();
            header("Location:".URL."Usuario");
        }

    }

}