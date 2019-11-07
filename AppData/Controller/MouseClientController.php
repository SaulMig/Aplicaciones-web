<?php
/**
 * Created by PhpStorm.
 * User: Sullivan
 * Date: 05/11/2019
 * Time: 11:13 PM
 */

namespace AppData\Controller;


class MouseClientController
{
    private $mouse;
    public function __construct()
    {
        $this->mouse= new \AppData\Model\MouseClient();

    }
    public function index()
    {
        $datos[0]=$this->mouse->getAll();
        return $datos;
    }

}