<?php
/**
 * Created by PhpStorm.
 * User: Sullivan
 * Date: 15/11/2019
 * Time: 09:35 AM
 */

namespace AppData\Controller;


class Mante_proController
{
    private $Mante_pro;


    public function __construct()
    {
        $this->Mante_pro= new \AppData\Model\Mante_pro();

    }

    public function index()
    {

        $datos[0]=$this->Mante_pro->getAll();
        return $datos;
    }
    public function agregar(){
        if($_POST)
        {
            $this->Mante_pro->set('fecha_mto',$_POST["fecha_mto"]);
            $this->Mante_pro->set('fecha_proximo',$_POST["fecha_proximo"]);
            $this->Mante_pro->set('observacion',$_POST["observacion"]);
            $this->Mante_pro->set('id_prestamo',$_POST["id_prestamo"]);
            $datos[1]=false;
            if(mysqli_num_rows($this->Mante_pro->verify())==0){
                $this->Mante_pro->add();
                header("Location:".URL."Mante_pro");
                $datos[1]=true;
            }

            $datos[0]=$this->Mante_pro->getAll();
            header("Location:".URL."Mante_pro");
            return $datos;
        }
    }
    public function eliminar($id)
    {
        $this->Mante_pro->delete($id[0]);
        $datos1=$this->Mante_pro->getAll();
        $datos[0]=$datos1;
        return $datos;
    }
    public function modificar ($id)
    {
        $datos=$this->Mante_pro->edit($id[0]);
        print_r(json_encode(mysqli_fetch_assoc($datos)));
    }
    public function actualizar($id)
    {
        print_r($_POST);
        if($_POST)
        {
            $this->Mante_pro->set('id_mantenimiento_pro',$_POST["id"]);
            $this->Mante_pro->set('fecha_mto',$_POST["fecha_mto"]);
            $this->Mante_pro->set('fecha_proximo',$_POST["fecha_proximo"]);
            $this->Mante_pro->set('observacion',$_POST["observacion"]);
            $this->Mante_pro->update();
            header("Location:".URL."Mante_pro");
        }

    }
    public function enviar()
    {
        $asunto=["asunto"];
        $destino= $_POST["email"];
        $mensaje =$_POST["mensaje"];

        $contenido="Asunto".$asunto."\nDestino".$destino."\nMensaje".$mensaje;

        mail($destino,"contacto",$contenido);
        header("Location:Mante_pro.html");
    }

}