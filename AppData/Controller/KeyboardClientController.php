<?php
/**
 * Created by PhpStorm.
 * User: Sullivan
 * Date: 05/11/2019
 * Time: 11:12 PM
 */

namespace AppData\Controller;


class KeyboardClientController
{
    private $teclado;
    public function __construct()
    {
        $this->teclado= new \AppData\Model\KeyboardClient();

    }
    public function index()
    {
        $datos[0]=$this->teclado->getAll();
        return $datos;
    }

}