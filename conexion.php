<?php 
//Ejercicio 2

/*
-- CREAR BD EN MYSQL --
CREATE DATABASE stock;

CREATE USER 'stock'@'localhost' IDENTIFIED BY 'stock';
GRANT ALL PRIVILEGES ON stock.* TO 'stock'@'localhost';
SET PASSWORD FOR 'stock'@'localhost' = PASSWORD('123456');
FLUSH PRIVILEGES;

-- CREAR TABLA EN MYSQL --
CREATE TABLE stock.productos (
id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
nombre VARCHAR(30) NOT NULL
)
*/

class conexionDB {
    
	protected $mysqli;
    const LOCALHOST = '127.0.0.1';
    const USER = 'stock';
    const PASSWORD = '123456';
    const DATABASE = 'stock';
    
    /**
     * Constructor de clase
     */
    public function __construct() {           
        try{
            //Conexión a la BD
            $this->mysqli = new mysqli(self::LOCALHOST, self::USER, self::PASSWORD, self::DATABASE);
        }catch (mysqli_sql_exception $e){
            //Si no se puede realizar la conexión
            http_response_code(500);
            exit;
        }     
    } 
    
    /**
     * obtiene todos los registros de la tabla "productos"
     * @return Array array con los registros obtenidos de la base de datos
     */
    public function getProduct(){
    	$result = $this->mysqli->query('SELECT * FROM productos');          
		$products = $result->fetch_all(MYSQLI_ASSOC);
		$result->close();        
        return json_encode($products,JSON_PRETTY_PRINT);
    }

    /**
     * obtiene un registro de la tabla "productos"
     * @return Array array con el registro obtenido de la base de datos
     */
    public function getProducts($id){      
        $stmt = $this->mysqli->prepare("SELECT * FROM productos WHERE id=? ; ");
        $stmt->bind_param('s', $id);
        $stmt->execute();
        $result = $stmt->get_result();        
        $products = $result->fetch_all(MYSQLI_ASSOC); 
        $stmt->close();
        return json_encode($products,JSON_PRETTY_PRINT);              
    }
    
    /**
     * Añade un nuevo registro en la tabla productos
     * @param String $name nombre de producto
     * @return bool TRUE|FALSE 
     */
    public function insert($name){
        $stmt = $this->mysqli->prepare("INSERT INTO productos(nombre) VALUES (?); ");
        $stmt->bind_param('s', $name);
        $r = $stmt->execute(); 
        $stmt->close();
        return $r;        
    }

    public function savePeople(){
    if($_GET['action']=='peoples'){   
         //Decodifica un string de JSON
         $obj = json_decode( file_get_contents('php://input') );   
         $objArr = (array)$obj;
         if (empty($objArr)){
             $this->response(422,"error","Nothing to add. Check json");                           
         }else if(isset($obj->name)){
             $people = new PeopleDB();     
             $people->insert( $obj->name );
             $this->response(200,"success","new record added");                            
         }else{
             $this->response(422,"error","The property is not defined");
         }
     } else{               
         $this->response(400);
     }  
 }
    
    /**
     * elimina un registro dado el ID
     * @param int $id Identificador unico de registro
     * @return Bool TRUE|FALSE
     */
    public function delete($id) {
        $stmt = $this->mysqli->prepare("DELETE FROM productos WHERE id = ? ; ");
        $stmt->bind_param('s', $id);
        $r = $stmt->execute(); 
        $stmt->close();
        return $r;
    }
    
    /**
     * Actualiza registro dado su ID
     * @param int $id Description
     */
    public function update($id, $name) {
        if($this->checkID($id)){
            $stmt = $this->mysqli->prepare("UPDATE productos SET nombre=? WHERE id = ? ; ");
            $stmt->bind_param('ss', $newName,$id);
            $r = $stmt->execute(); 
            $stmt->close();
            return $r;    
        }
        return false;
    }
    
}
