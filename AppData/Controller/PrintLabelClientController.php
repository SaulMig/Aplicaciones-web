<?php
/**
 * Created by PhpStorm.
 * User: Sullivan
 * Date: 05/11/2019
 * Time: 11:14 PM
 */

namespace AppData\Controller;


class PrintLabelClientController
{
    private $objetos;


    public function __construct()
    {
        $this->objetos= new \AppData\Model\PrintLabelClient();

    }

    public function index()
    {

        $datos[0]=$this->objetos->getAll();
        return $datos;
    }
}