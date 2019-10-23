<?php

namespace AppData\Model;


class Usuario
{
    private $tabla="usuario";
    private  $id_usuario;
    private  $nickname;
    private  $email;


    function __construct()
    {
        $this->conexion=new conexion();
    }

    public function set($atributo,$valor)
    {
        $this->$atributo=$valor;
    }

    public function get($atributo)
    {
        return $this->$atributo;
    }
    function getAll()
    {
        $sql="select *from {$this->tabla} ";
        $datos=$this->conexion->queryResultado($sql);
        return $datos;
    }
    function add()
    {
        $sql="insert into `usuario`(`id_usuario`,`nickname`,`email`) values ('0','{$this->nickname}','{$this->email}')";
        $this->conexion ->QuerySimple($sql);
    }
    function verify(){
        $sql = "select * from {$this->tabla} where  nickname='{$this->nickname}',email='{$this->email}' ";
        $dato=$this->conexion->QueryResultado($sql);
        return $dato;
    }
    function delete($id)
    {
        $sql="delete from {$this->tabla} where id_usuario='{$id}'";
        $this->conexion->QuerySimple($sql);
    }
    function edit($id)
    {
        $sql="select id_usuario,nickname,email from {$this->tabla} where id_usuario='{$id}'";
        $datos=$this->conexion->queryResultado($sql);
        return $datos;
    }
    function getOne($id)
    {
        $sql="SELECT * FROM usuario where id_usuario='{$id}'";
        $datos=$this->conexion->QueryResultado($sql);
        return $datos;
    }
    function update(){
        $sql = "update {$this->tabla} set nickname='{$this->nickname}', email='{$this->email}'
               where id_usuario='{$this->id_usuario}'";
        $this->conexion->QuerySimple($sql);
    }
}