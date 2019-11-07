<?php
/**
 * Created by PhpStorm.
 * User: Sullivan
 * Date: 05/11/2019
 * Time: 11:15 PM
 */

namespace AppData\Controller;


class UsuarioClientController
{
    private $usuario;
    public function __construct()
    {
        $this->usuario= new \AppData\Model\UsuarioClient();

    }
    public function index()
    {
        $datos[0]=$this->usuario->getAll();
        return $datos;
    }

}