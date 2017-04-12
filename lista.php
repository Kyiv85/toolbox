<?php 
//Ejercicio 2

/*
Diseñar una API REST para manejo de Stock, que incluya lista, alta y baja de stock para un producto (no es necesaria la API para administrar productos).

-- CREAR BD EN MYSQL --
CREATE DATABASE stock;

-- CREAR TABLA EN MYSQL --
CREATE TABLE stock.productos (
id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
nombre VARCHAR(30) NOT NULL,
precio FLOAT NOT NULL
)
*/

require_once "conexion.php";
class ProductsAPI {  
	public function API($con){
		//Contenido JSON
		header('Content-Type: application/JSON');
		//Obtener método    
		$method = $_SERVER['REQUEST_METHOD'];
		//Obtener recurso
		$resource = $_SERVER['REQUEST_URI'];
 
		//Dependiendo del método de la petición ejecutaremos la acción correspondiente.
		switch ($method) {
			//Consultar stock
			case 'GET':
				echo $con->getProduct();
				break;     
			case 'POST'://inserta
				$con->insert();
				break;      
			case 'DELETE'://elimina
				$con->delete();;
				break;
		}
	}
}

//Enviar respuesta.
$conex = new conexionDB();
$pAPI = new ProductsAPI();
$pAPI->API($conex);

?>

