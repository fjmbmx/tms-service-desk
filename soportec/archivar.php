<?php
require_once ('config.php');


header("Content-Type: text/html;charset=utf-8");

header( "refresh:10;url=control.html" ); 

 
$contra = $_POST['contr_a'];
$password = "".$contra; 

$id = $_POST['foli_o'];




//////////////////////////////////////////////////////////


// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);
// Check connection
if (!$conn) {
      die("Fallo en la conexion a la base de datos, por favor intente de nuevo  <br>" . mysqli_connect_error());
}
 
echo "Conectado... ";

////////////////////////


$sql = "UPDATE callcenter SET estatus = 'Cerrado' WHERE id = '$id'";

if ($conn->query($sql) === TRUE) {
  echo "Se ha actualizado la orden: " ."CRS-".$id . "\n <br>" ; 
	
			
 }else {
  echo "ERROR";
 }

mysqli_close($conn);

?>