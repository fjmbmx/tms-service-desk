<?php
require_once ('config.php');

header("Content-Type: text/html;charset=utf-8");
header( "refresh:20;url=https://www.roboticsol.com/soporte" ); 

 

$cliente = $_POST['clien_t'];
$equipo = $_POST['equip_o'];
$serie = $_POST['seri_e'];
$contacto = $_POST['nombr_e'];
$correo = $_POST['email'];
$telefono = $_POST['telephone'];
$solicitud = $_POST['comments'];

$area_s = $_POST['destin_o'];

switch ($area_s) {
    case "dmiles":
        $area = "Producto";
        break;
    case "ingenieria":
        $area= "Servicio";
        break;
    case "jcvera":
        $area = "Quejas";
        break;
    default:
        $area = "SD";
}


$titulo = "Contacto Web";

$email_to ="cmontejano@roboticsol.com".",".$_POST['destin_o']."@roboticsol.com".",".$_POST['email'];

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
 
echo "Conectado, <br> ";


$sql = "INSERT INTO callcenter (id,area,cliente,equipo,serie,contacto,correo,telefono,solicitud,estatus,responsable,actividades, fint, sumadown, registro, SR, fevento, rtecno) VALUES ('0','$area','$cliente','$equipo','$serie','$contacto','$correo','$telefono','$solicitud','Abierta','0','0','0','0','0','0','0','0')";
if (mysqli_query($conn, $sql)) {
	
	
    $last_id = $conn->insert_id;
   
	
      echo "Un nuevo registro ha sido creado. El no. de folio de su solicitud es: CRO-" .$last_id . "<br>";
	
$email_message = "Detalles del formulario de contacto: \n <br>";
$email_message .= "No de Folio de la solicitud: CRO-" . $last_id . "\n<br>";
$email_message .= "Cliente: " . $_POST['clien_t'] . "\n  <br>";
$email_message .= "Equipo/Producto: " . $_POST['equip_o'] . "\n  <br>";
$email_message .= "Serie/Lote: " . $_POST['seri_e'] . "\n  <br>";
$email_message .= "Contacto: " . $_POST['nombr_e'] . "\n  <br>";
$email_message .= "E-mail: " . $_POST['email'] . "\n"  ."<br> ";
$email_message .= "Telefono: " . $_POST['telephone'] . "\n" ."<br>";
$email_message .= "Reporte: " . $_POST['comments'] . "\n\n";


//Enviamos el mensaje a tu_dirección_email 
$bool = mail($email_to,$titulo,$email_message,$headers);
if($bool){
    echo "  <br>  <br> Su solicitud ha sido procesada, recibirá un correo electrónico a la dirección: " .$correo . "\n <br>  <br> Si no recibe este correo en un tiempo máximo de 30 minutos por favor comuníquese  al teléfono:  01800-277-2255, <br> al móvil: 5519634723, ó envíe un correo con su solicitud a: ingenieria@roboticsol.com <br> <br> ¡Gracias! <br> " ;
	
	
	
}else{
    echo "Mensaje no enviado";
}
//Enviamos el mensaje a tu_dirección_email 
	
} else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);

?>

<!DOCTYPE html>
<html>
</br>

<form method="get" action="https://tawk.to/chat/61686d2e86aee40a57369dd1/1fhvukvrs">
 <button type="submit">Abrir Chat en Linea
</form>

</body>
</html>