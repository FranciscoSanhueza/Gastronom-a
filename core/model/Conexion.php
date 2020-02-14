<?php

/**
 * Description de Conexion
 * Esta clase de encarga de establecer una conexion con la base de datos mysql
 * Utiliza el sistema de conexion PDO para conectarce por eso extiende de la clase PDO
 * @author pancho-PC
 */
class Conexion extends PDO {
    private $host="localhost"; // nombre del dominio, en caso de ser externo ingresar ip y directorio
    private $tipoBD="mysql"; // es el tipo de la base de datos.
    private $nombreBD="gastronomia"; // es el nombre de la base de datos a la que se conecta
    private $username="root"; // el usuario para acceder a la base de datos
    private $pass=""; // la contraseña para acceder a la base de datos
    
    // constructor de la clase que al ser instanciada ejecuta la conexion
    public function __construct() {
        
        try{ // previene los errores de conexion PDO
        // realiza la conexion llamando al cosntructor de la instancia PDO
        // agrega los atrivutos de la clase en el metodo constructor de PD
        parent::__construct($this->tipoBD.':host='.$this->host.';dbname='.$this->nombreBD,$this->username,$this->pass,array(PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES UTF8"));
        
        }catch(PDOException $e){
            // envia mensaje de error para demostrar dicho error
            echo "Error en la conexion ".$e->getMessage();
        }
    }
}
