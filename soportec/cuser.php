<?php
require_once ('config.php');

header("Content-Type: text/html;charset=utf-8");
header( "refresh:10;url=control.html" ); 
 

$cliente = $_POST['clien_t'];
$equipo = $_POST['equip_o'];
$serie = $_POST['seri_e'];
$contacto = $_POST['nombr_e'];
$correo = $_POST['email'];
$telefono = $_POST['telephone'];
$aid = $_POST['ID'];

// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);

// Check connection
if (!$conn) {
      die("Fallo en la conexion a la base de datos, por favor intente de nuevo  <br>" . mysqli_connect_error());
}
 
echo "Conectado, <br> ";


$sql = "INSERT INTO clientes (id,acliente,aequipo,aserie,anombre,aemail,amovil,aid) VALUES ('0','$cliente','$equipo','$serie','$contacto','$correo','$telefono','$aid')";
if (mysqli_query($conn, $sql)) {
	
	
    $last_id = $conn->insert_id;
   
	
      echo "Un nuevo registro ha sido creado con el No.: " .$last_id . "<br>";

	
} else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);

?>