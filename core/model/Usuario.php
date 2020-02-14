<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Usuario
 * controla los usuarios con acceso a la plataforma
 * @author pancho-PC
 */
include 'Conexion.php';
session_start();
class Usuario extends Conexion {

    private $run;
    private $nombre;
    private $apellido;
    private $cargo;
    private $correo;
    private $clave;
    private $estado;

    function __construct() {
        
    }

    function getClave() {
        return $this->clave;
    }

    function getEstado() {
        return $this->estado;
    }

    function setClave($clave) {
        $this->clave = $clave;
    }

    function setEstado($estado) {
        $this->estado = $estado;
    }

    function getRun() {
        return $this->run;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getApellido() {
        return $this->apellido;
    }

    function getCargo() {
        return $this->cargo;
    }

    function getCorreo() {
        return $this->correo;
    }

    function setRun($run) {
        $this->run = $run;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setApellido($apellido) {
        $this->apellido = $apellido;
    }

    function setCargo($cargo) {
        $this->cargo = $cargo;
    }

    function setCorreo($correo) {
        $this->correo = $correo;
    }

    public function verificarLogin() {
        $mensaje="";
        $codigo=0;
        try{
            $cnn=new Conexion();
            $cVerificar=$cnn->prepare('call Login(:user, :clave)');
            $cVerificar->bindParam(":user",$this->run);
            $cVerificar->bindParam(":clave",$this->clave);
            $cVerificar->execute();
            $registros=$cVerificar->fetchAll();
            $codigo=$registros[0];
            if($codigo[1]== 1 ){
                $_SESSION['login']=1;
                $_SESSION['nombre']=$this->run;
                $mensaje="Login Correcto";
                $codigo = 1;
            }else{
                session_destroy();
                $mensaje="Usuario y/o Password incorrectos";
                $codigo = -1;
            }
        } catch (PDOException $ex) {
                $mensaje="Error SQL ".$ex->getMessage();
                $codigo=-1;
        } finally {
            header("Content-Type: application/json, charset=utf-8");
            $datos=array();
            $datos[]=array(
               'message'=>$mensaje,
                'code'=>$codigo
            );
            return json_encode($datos);
        }
    }

}
