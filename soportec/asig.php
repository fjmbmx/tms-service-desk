<?php
require_once ('config.php');

header("Content-Type: text/html;charset=utf-8");
header( "refresh:10;url=control.html" ); 
 
$contra = $_POST['contr_a'];
$password = "".$contra; 


$asignado = $_POST['asignad_o'];
$correo = $_POST['email'];
$id = $_POST['foli_o'];


$titulo = "Asignacion de Solicitud ";

$email_to = "ingenieria@roboticsol.com". ", ".$correo ;

$headers = "MIME-Version: 1.0\r\n"; 
$headers .= "Content-type: text/html; charset=utf-8 \r\n"; 

//dirección del remitente 

$headers .= "From: soporte de web <info@soportec.net>\r\n";


//////////////////////////////////////////////////////////


// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);
// Check connection
if (!$conn) {
      die("Fallo en la conexion a la base de datos, por favor intente de nuevo  <br>" . mysqli_connect_error());
}
 
echo "Conectado... ";

////////////////////////


$sql = "UPDATE callcenter SET responsable = '$asignado', estatus = 'Proceso' WHERE id = '$id'";


if ($conn->query($sql) === TRUE) {
  echo "Se ha asignado un Responsable a la solicitud: " ."CRS-".$id . "  <br>  Responsable asignado: " .$asignado. "<br>"  ;     
	
	$sql = "SELECT * FROM callcenter WHERE id = '$id' ";  
	$resultado = $conn->query($sql); 
	$row= $resultado->fetch_assoc(); 
	$cliente = $row ['cliente'];
	$solicitud = $row ['solicitud'];
	$contacto = $row ['contacto'];
	$telefono = $row ['telefono'];
	$ecliente = $row ['correo'];
	$equipo = $row ['equipo'];
	$serie = $row ['serie'];
	
	
 }else {
  echo "ERROR";
 }


$email_message = "Con atencion a: " .$asignado . ",\n <br>";
$email_message .= "Se le ha asignado la siguiente solicitud: CRO-" . $id . "\n<br>";
$email_message .= "Cliente: " .$cliente . ",\n <br>";
$email_message .= "Equipo: " .$equipo . ",\n <br>";
$email_message .= "NS: " .$serie . ",\n <br>";
$email_message .= "Reporte: " .$solicitud . ",\n <br>";
$email_message .= "Contacto: " .$contacto . ",\n <br>";
$email_message .= "Telefono: " .$telefono . ",\n <br>";
$email_message .= "Correo: " .$ecliente . ",\n <br>";

$email_message .= "Para informacion adicional y seguimiento por favor comuniquese con: ingenieria@roboticsol.com ";

$bool = true; //mail($email_to,$titulo,$email_message,$headers);
if($bool){
    echo "  <br>  Se ha notificado por correo electrónico a: " .$correo . "<br>  <br> ¡Gracias!" ;
		
	
}else{
    echo "Correo no enviado";
}

mysqli_close($conn);


?>