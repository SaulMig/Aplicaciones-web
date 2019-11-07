<?php
/**
 * Created by PhpStorm.
 * User: Sullivan
 * Date: 05/11/2019
 * Time: 11:13 PM
 */

namespace AppData\Controller;


class LaptopClientController
{
    private $equipo;
    public function __construct()
    {
        $this->equipo= new \AppData\Model\LaptopClient();
    }

    public function index()
    {
        $datos[0]=$this->equipo->getAll();
        return $datos;
    }

}