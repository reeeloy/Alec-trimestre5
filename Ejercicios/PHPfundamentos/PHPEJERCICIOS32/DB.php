<?php
 $conn = new mysqli("localhost", "root", "", "adsi" ) ;
 if( $conn->connect_errno) {
 echo "Falla al conectarse a Mysql ( ". $conn->connect_errno . ") " .
 $conn->connect_error ;
 exit() ;
 } ;

 if($resultado = $conn->query("select codigo, nombre from ciudades ") ){

 while($registro = $resultado->fetch_assoc() ){

 echo $registro["codigo"] . " " . $registro["nombre"] . "\n" ;

 } ;
};
 $resultado->free();
$conn->close();
?>