<?php
require_once ('config.php');

header("Content-Type: text/html;charset=utf-8");
 
$contra = $_POST['contr_a'];
$password = "".$contra; 
$tempaid = $_POST['ID'];
$aid = strtoupper($tempaid);
$solicitud = $_POST['comments'];

$area= "Servicio";


$titulo = "Contacto CyberApp";


//charset=iso-8859-1

$headers = "MIME-Version: 1.0\r\n"; 
$headers .= "Content-type: text/html; charset=utf-8  \r\n"; 
//dirección del remitente 
$headers .= "From: soporte de web <info@soportec.net>\r\n";


	
// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);

// Check connection
if (!$conn) {
      die("Fallo en la conexion a la base de datos, por favor intente de nuevo  <br>" . mysqli_connect_error());
}
 
else{
	
echo $aid;
echo " Conectado... <br> ";


////////////////////////////////////////RECUPERAR DATOS DE ID BASE///////////////////////////////////////////

  
	
	$sql = "SELECT * FROM clientes WHERE aid = '$aid' ";  
	$resultado = $conn->query($sql); 
	$row= $resultado->fetch_assoc(); 
	$cliente = $row ['acliente'];
	$equipo = $row ['aequipo'];
	$serie = $row ['aserie'];
	$contacto = $row ['anombre'];
	$correo = $row ['aemail'];
	$telefono = $row ['amovil'];
	
 if($contacto){

echo "Accesando a datos de usuario de: ";	
echo $contacto;
echo "<br>";


	
	$sql = "INSERT INTO callcenter (id,area,cliente,equipo,serie,contacto,correo,telefono,solicitud,estatus,responsable,actividades,registro) VALUES ('0','$area','$cliente','$equipo','$serie','$contacto','$correo','$telefono','$solicitud','Abierta','0','0','0')";
	
if (mysqli_query($conn, $sql)) {
	
    $last_id = $conn->insert_id;
   
      echo "Un nuevo registro ha sido creado. El no. de folio de su solicitud es: CRO-" .$last_id . "<br>";
	
$email_message = "Detalles del formulario de contacto: \n <br>";
$email_message .= "No de Folio de la solicitud: CRO-" . $last_id . "\n<br>";
$email_message .= "Cliente: " . $cliente . "\n  <br>";
$email_message .= "Equipo/Producto: " . $equipo . "\n  <br>";
$email_message .= "Serie/Lote: " . $serie . "\n  <br>";
$email_message .= "Contacto: " . $contacto . "\n  <br>";
$email_message .= "E-mail: " . $correo . "\n"  ."<br> ";
$email_message .= "Telefono: " . $telefono . "\n" ."<br>";
$email_message .= "Reporte: " . $solicitud . "\n\n";
	
$email_to = "ingenieria@roboticsol.com,cmontejano@roboticsol.com". ", ".$correo ;
	
	
//Enviamos el mensaje a tu_dirección_email 
$bool = mail($email_to,$titulo,$email_message,$headers);
if($bool){
    echo "  <br>  <br> Su solicitud ha sido procesada, recibirá un correo electrónico a la dirección: " .$correo . "\n <br>  <br> Si no recibe este correo en un tiempo máximo de 30 minutos por favor comuníquese  al teléfono:  01800-277-2255, <br> al móvil: 5519634723, ó envíe un correo con su solicitud a: ingenieria@roboticsol.com <br> <br> ¡Gracias! " ;
}else{
    echo "Mensaje no enviado";
}
//Enviamos el mensaje a tu_dirección_email 
	

/////////////////////////////////////////////////////////////////////////////////////////////////////////////
}
	mysqli_close($conn);

 } 
	else{
	echo "ID incorrecto";
	mysqli_close($conn);
	}
	
} 

mysqli_close($conn);

?>

