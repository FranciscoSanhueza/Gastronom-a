<?php


/**
 * Description of SubFamilia
 *esta clase ejecuta comandos de base de datos para la clase subfamilia
 * @author pancho-PC
 */
include 'Conexion.php';
class SubFamilia extends Conexion{
    private $id;
    private $nombre;
    private $familia;
    private $estado;
    
    function __construct() {
        
    }
    
    function getId() {
        return $this->id;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getFamilia() {
        return $this->familia;
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

    function setFamilia($familia) {
        $this->familia = $familia;
    }

    function setEstado($estado) {
        $this->estado = $estado;
    }

    //Lista las subfamilias desde base de datos, inclulle un filtro en caso de desear buscar una en especifico
    public function ListarSubFamilia($filtro) {
        $registros = "";
        //para evitar errores de conexion del tipo PDO
        try {
            $cnn = new Conexion();
            //comprueba si se aplico un filtro o no
            if (is_null($filtro)) {
                $cListar = $cnn->prepare('SELECT * FROM versubfamilia');
            } else {
                $cListar = $cnn->prepare('call verSubfamilia(:cfiltro)');
                $cListar->bindParam(":cfiltro", $filtro);
            }
            
            $cListar->execute();
            $movReg = $cListar->rowCount();
            //copueba si se devolvieron registros, si es asi los retorna
            if ($movReg > 0) {
                $mensaje = "Existen Registros";
                $codigo = 1;
                $registros = $cListar->fetchAll();
            }
            
        } catch (Exception $ex) {
            $mensaje = "Error al intentar traer los datos";
            $codigo = -1;
        } finally {
            return $registros;
        }
    }


}
