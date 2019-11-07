<?php
/**
 * Created by PhpStorm.
 * User: Sullivan
 * Date: 06/11/2019
 * Time: 08:24 AM
 */

namespace AppData\Controller;


class TeleClientController
{
    private $objetos;


    public function __construct()
    {
        $this->objetos= new \AppData\Model\TeleClient();

    }

    public function index()
    {

        $datos[0]=$this->objetos->getAll();
        return $datos;
    }

}