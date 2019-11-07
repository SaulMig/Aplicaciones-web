<?php
/**
 * Created by PhpStorm.
 * User: Sullivan
 * Date: 05/11/2019
 * Time: 10:53 PM
 */

namespace AppData\Controller;


class DisplayClientController
{
    private $monitor;
    public function __construct()
    {
        $this->monitor= new \AppData\Model\DisplayClient();

    }
    public function index()
    {
        $datos[0]=$this->monitor->getAll();
        return $datos;
    }

}