<?php 
//Ejercicio 1
/*
Escribe un script que a partir de un array de ints devuelva un array de strings aplicando las siguientes reglas:
• Devuelve Fizz si el número es divisible por 3 o si incluye un 3 en el número.
• Devuelve Buzz si el número es divisible por 5 o si incluye un 5 en el número.
• Devuelve FizzBuzz si el número es divisible por 3 y por 5.
*/

//$numbers = range(0, 12);
$numbers = [3,5,15];
function devolverArray($n){
	//Array a devolver
	$arr = [];
	foreach ($n as $num) {
		//Convertir número tomado a array para ver si existe número en específico 
		$check = array_map('intval', str_split($num));
		switch ($num) {
			//Devuelve FizzBuzz si el número es divisible por 3 y por 5.
	    	case (($num%3==0) && ($num%5==0)):
	    		array_push($arr, "FizzBuzz");
	    		break;
			//Devuelve Fizz si el número es divisible por 3 o si incluye un 3 en el número.
			case (($num%3==0) || (in_array(3, $check))):
				array_push($arr, "Fizz");
				break;
			//Devuelve Buzz si el número es divisible por 5 o si incluye un 5 en el número.
	    	case (($num%5==0) || (in_array(5, $check))):
	    		array_push($arr, "Buzz");
	    		break;			
		}
	}
	return $arr;	
}

//Validación
$ch = devolverArray($numbers);
foreach ($ch as $key) {
	echo $key.'<br>';
}
