<?php

namespace AppData\Config;


use AppData\Model\login;

class Request
{
    private $controlador;
    private $metodo;
    private $argumento;
    public function __construct()
    {
        if (isset($_SESSION["email"]))
        {
            if (isset($_GET['url'])) {
                $ruta = filter_input(INPUT_GET, 'url', FILTER_SANITIZE_URL);
                $ruta = explode("/", $ruta);
                $ruta = array_filter($ruta);
                if ($ruta[0] == "index.php") {
                    //$this->controlador = "user";
                } else {
                    $this->controlador = strtolower(array_shift($ruta));
                }
                $this->metodo = strtolower(array_shift($ruta));
                if (!$this->metodo)
                    $this->metodo = "index";
                $this->argumento = $ruta;
            }else {
               // $this->controlador = "user";
                $this->metodo = "index";
            }
      }
      else
            if (isset($_GET['url'])?stristr($_GET['url'],'login'):false)
            {
                $this->controlador="login";
                if(isset($_POST["email"]))
                    $this->metodo = "verify";
                else if(isset($_POST["numero"]))
                    $this->metodo = "reset";        
                else
                    $this->metodo = "index";
            }
            else if (isset($_GET['url'])?stristr($_GET['url'],'inicio'):false)
            {
                $this->controlador="inicio";
                if(isset($_POST["id"]))
                    $this->metodo = "show";             
                else if(isset($_POST["datos"]))
                    $this->metodo = "datos";    
                else if(isset($_POST["img"]))
                    $this->metodo = "getimg";    
                else
                    $this->metodo = "index";   
             
            }
            else if (isset($_GET['url'])?stristr($_GET['url'],'DesktopsClient'):false)
            {
                $this->controlador="DesktopsClient";

                $this->metodo=stristr($_GET['url'],'consulta')?"consulta":"index";
            }

            else if (isset($_GET['url'])?stristr($_GET['url'],'DisplayClient'):false)
            {
                $this->controlador="DisplayClient";

                $this->metodo=stristr($_GET['url'],'consulta')?"consulta":"index";
            }

            else if (isset($_GET['url'])?stristr($_GET['url'],'KeyboardClient'):false)
            {
                $this->controlador="KeyboardClient";

                $this->metodo=stristr($_GET['url'],'consulta')?"consulta":"index";
            }

            else if (isset($_GET['url'])?stristr($_GET['url'],'LaptopClient'):false)
            {
                $this->controlador="LaptopClient";

                $this->metodo=stristr($_GET['url'],'consulta')?"consulta":"index";
            }
            else if (isset($_GET['url'])?stristr($_GET['url'],'MouseClient'):false)
            {
                $this->controlador="MouseClient";

                $this->metodo=stristr($_GET['url'],'consulta')?"consulta":"index";
            }
            else if (isset($_GET['url'])?stristr($_GET['url'],'PrintLabelClient'):false)
            {
                $this->controlador="PrintLabelClient";

                $this->metodo=stristr($_GET['url'],'consulta')?"consulta":"index";
            }
            else if(isset($_GET['url'])?stristr($_GET['url'],'ScannerClient'):false)
            {
                $this->controlador="ScannerClient";

                $this->metodo=stristr($_GET['url'],'consulta')?"consulta":"index";
            }
            else if(isset($_GET['url'])?stristr($_GET['url'],'TeleClient'):false)
            {
                $this->controlador="TeleClient";

                $this->metodo=stristr($_GET['url'],'consulta')?"consulta":"index";
            }
            else if(isset($_GET['url'])?stristr($_GET['url'],'PrintClient'):false)
            {
                $this->controlador="PrintCient";

                $this->metodo=stristr($_GET['url'],'consulta')?"consulta":"index";
            }
            else if(isset($_GET['url'])?stristr($_GET['url'],'UsuarioClient'):false)
            {
                $this->controlador="UsuarioClient";

                $this->metodo=stristr($_GET['url'],'consulta')?"consulta":"index";
            }

            else
            {
                $this->controlador="inicio";
                $this->metodo = "index";

            }

    }
    public function getControlador()
    {
        return $this->controlador;
    }
    public function getMetodo()
    {
        return $this->metodo;
    }
    public function getArgumento()
    {
        return $this->argumento;
    }
}