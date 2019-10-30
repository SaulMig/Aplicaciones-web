<?php
/**
 * Created by PhpStorm.
 * User: Sullivan
 * Date: 29/10/2019
 * Time: 01:28 PM
 */

namespace AppData\Controller;


class DesktopsClientController
{
    private $equipo;
    public function __construct()
    {
        $this->equipo= new \AppData\Model\DesktopsClient();
    }

    public function index()
    {
        $datos[0]=$this->equipo->getAll();
        return $datos;
    }

}