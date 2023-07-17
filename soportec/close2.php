<?php
require_once ('config.php');

header("Content-Type: text/html;charset=utf-8");

//header( "refresh:10;url=cerrar.html" ); 
 
$contra = $_POST['contr_a'];
$password = "".$contra; 

$actividades = $_POST['actividade_s'];
$fint = $_POST['registr_i'];
$registro = $_POST['registr_o'];
$id = $_POST['foli_o'];
$sumadown = $_POST['sumadow_n'];
$rtecno = $_POST['rtecn_o'];
$sr = $_POST['s_r'];
$fevento = $_POST['fevent_o'];




$titulo = "Cierre de folio";

//$email_to = "ingenieria@roboticsol.com";

$headers = "MIME-Version: 1.0\r\n"; 
$headers .= "Content-type: text/html; charset=utf-8  \r\n"; 


//dirección del remitente 

$headers .= "From: Soporte Cyber Robotics <info@soportec.net>\r\n";


//////////////////////////////////////////////////////////


// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);
// Check connection
if (!$conn) {
      die("Fallo en la conexion a la base de datos, por favor intente de nuevo  <br>" . mysqli_connect_error());
}
 
echo "Conectado... ";

////////////////////////

$sql = "UPDATE callcenter SET sumadown = '$sumadown', rtecno = '$rtecno', SR = '$sr', fevento = '$fevento', fint = '$fint', registro = '$registro', estatus = 'Finalizado', actividades ='$actividades' WHERE id = '$id'";



if ($conn->query($sql) === TRUE) {
  echo "Se ha cerrado la orden: " ."CRS-".$id . "\n <br>" ; 
	
	$sql = "SELECT * FROM callcenter WHERE id = '$id' ";  
	$resultado = $conn->query($sql); 
	$row= $resultado->fetch_assoc(); 
	$contacto = $row ['contacto'];
	//$ecliente = "dmiles@roboticsol.com"; 
	$ecliente = $row ['correo'];
	
		
 }else {
  echo "ERROR";
 }

$email_to ="ingenieria@roboticsol.com". ",".$ecliente;



$email_message = "Con atención a: ".$contacto . ", por este medio se le notifica que la solicitud con folio CRO-" .$id . " ha sido cerrada. <br>";

$email_message .= "Su opinión es muy importante para nosotros, y con la intención de brindarle un mejor servicio le solicitamos atentamente nos apoye contestando la siguiente encuesta de calidad: ";

$email_message .="<a href='https://soportec.net/encuesta2.php?a=$id'> ENCUESTA </a>";


$email_message .= "<br><br>Centro de Atención a Clientes de Cyber Robotic Solutions S.A. de C.V.";
	
$bool = mail($email_to,$titulo,$email_message,$headers);
if($bool){
    echo "  <br>  Se ha notificado por correo electronico a: " .$ecliente." e ingenieria@roboticsol.com, <br>  <br> ¡Gracias!" ;
}else{
    echo "Correo no enviado";
}

mysqli_close($conn);

?>