<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Familia
 *Esta clase ejecuta comandos de base de datos para la clase familia
 * @author pancho-PC
 */
include 'Conexion.php';
class Familia extends Conexion{
    private $id;
    private $nombre;
    private $estado;
    
    function __construct() {
        
    }

    function getId() {
        return $this->id;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getEstado() {
        return $this->estado;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setEstado($estado) {
        $this->estado = $estado;
    }
    
    public function ingresar() {
        $mensaje = "";
        $codigo = 0;
        //try para evitar errores del tipo sql
        try {
            $cnn = new Conexion();
            $cInsertar = $cnn->prepare('call ing_familia(:nombre)');
            $cInsertar->bindParam(":nombre", $this->nombre);
            $cInsertar->execute();
            $movDatos = $cInsertar->rowCount();
            //compueba si la ejecucion retorno algun tipo de mensaje si es asi lo retorna
            if ($movDatos > 0) {
                $registros = $cInsertar->fetch();
                $mensaje = $registros[0];
                if($mensaje == "Correcto"){
                    $mensaje = "Ingresado Correctamente";
                    $codigo = 1;
                }else{
                    $mensaje= "Error, ya existe una familia con ese nombre";
                    $codigo = -1;
                }
            } else {
                $mensaje = "No se realizo ningún cambio y/o inserción en bd";
                $codigo = -1;
            }
            //se ejecuta en caso de error de conexion
        } catch (PDOException $ex) {
            $mensaje = "Error " . $ex->getMessage();
            $codigo = -1;
            //se ejecuta siempre para realizar la respuesta a traves de json
        } finally {
            header("Content-Type: application/json, charset=utf-8");
            $datos = array();
            $datos[] = array(
                'message' => $mensaje,
                'code' => $codigo
            );
            return json_encode($datos);
        }
    }
    //lista las familias y verifica la acccion en caso de ingresar un filtro
    public function ListarFamilia($filtro) {
        $registros = "";
        try {
            $cnn = new Conexion();
            //cerifica si existe algun filtro
            if (is_null($filtro)) {
                $cListar = $cnn->prepare('SELECT * FROM familia');
            } else {
                $cListar = $cnn->prepare('call 	verfamiliafiltro(:cfiltro)');
                $cListar->bindParam(":cfiltro", $filtro);
            }
            $cListar->execute();
            $movReg = $cListar->rowCount();
            //verifica si se retornaron datos si es asi los retorna
            if ($movReg > 0) {
                $mensaje = "Existen Registros";
                $codigo = 1;
                $registros = $cListar->fetchAll();
            }
              //se ejecuta en caso de error de conexion
        } catch (Exception $ex) {
            $mensaje = "Error al intentar traer los datos";
            $codigo = -1;
        } finally {
            return $registros;
        }
    }
    //metodo para eliminar productos
    public function Eliminar() {
        $mensaje = "";
        $codigo = 0;
        try {
            $cnn = new Conexion();
            $cEliminar = $cnn->prepare("call elim_familia(:id)");
            $cEliminar->bindParam(':id', $this->id);
            $cEliminar->execute();
            $movDatos = $cEliminar->rowCount();
            //verifica si se retornaron datos, si es asi los retorna
            if ($movDatos > 0) {
                $registros = $cEliminar->fetch();
                $mensaje = $registros[0];
                if($mensaje == "Correcto"){
                    $mensaje = "Eliminado correctamente";
                    $codigo = 1;
                }else{
                    $mensaje= "Error, la familia a eliminar no existe";
                    $codigo = -1;
                }
            } else {
                $mensaje = "Ocurrio un error no se efectuaron cambios";
                $codigo = -1;
            }
              //se ejecuta en caso de error de conexion
        } catch (PDOException $ex) {
            $mensaje = "Error de conexion";
            $codigo = -1;
            //se ejecuta siempre para realizar la respuesta a traves de json
        } finally {
            header("Content-Type: application/json, charset=utf-8");
            $datos = array();
            $datos[] = array(
                'message' => $mensaje,
                'code' => $codigo
            );
            return json_encode($datos);
        }
    }
    //metodo para modificar productos
    public function mod_producto() {
        $mensaje = "";
        $codigo = 0;
        try {
            $cnn = new Conexion();
            $cInsertar = $cnn->prepare('call mod_familia(:id,:nombre,:estado)');
             $cInsertar->bindParam(":id", $this->id);
            $cInsertar->bindParam(":nombre", $this->nombre);
             $cInsertar->bindParam(":estado", $this->estado);
            $cInsertar->execute();
            $movDatos = $cInsertar->rowCount();
            //verifica si se retornaron datos, si es asi lo retorna
            if ($movDatos > 0) {
                $registros = $cInsertar->fetch();
                $mensaje = $registros[0];
                if($mensaje == "Correcto"){
                    $mensaje = "Modificado correctamente";
                    $codigo = 1;
                }else{
                    $mensaje= "Error, los datos ingresados para esta familia no son validos";
                    $codigo = -1;
                }
            } else {
                $mensaje = "No se realizo ningún cambio y/o inserción en bd";
                $codigo = -1;
            }
              //se ejecuta en caso de error de conexion
        } catch (PDOException $ex) {
            $mensaje = "Error " . $ex->getMessage();
            $codigo = -1;
            //se ejecuta siempre para realizar la respuesta a traves de json
        } finally {
            header("Content-Type: application/json, charset=utf-8");
            $datos = array();
            $datos[] = array(
                'message' => $mensaje,
                'code' => $codigo
            );
            return json_encode($datos);
        }
    }

}
