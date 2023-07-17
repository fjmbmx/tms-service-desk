<?php

header("Content-Type: text/html;charset=utf-8");

$id = $_POST['foli_o'];
$p_1 = $_POST['p_1'];
$p_2 = $_POST['p_2'];
$p_31 = $_POST['p_31'];
$p_32= $_POST['p_32'];
$p_33= $_POST['p_33'];
$p_34= $_POST['p_34'];
$p_4 = $_POST['p_4'];
$p_5 = $_POST['p_5'];
$coment = $_POST['coment'];


$titulo = "Encuesta Web";

$email_to = "ingenieria@roboticsol.com";


$headers = "MIME-Version: 1.0\r\n"; 
$headers .= "Content-type: text/html; charset=utf-8  \r\n"; 

//dirección del remitente 
$headers .= "From: Soporte de web <info@soportec.net>\r\n";

	
$email_message = " Encuesta de calidad: \n <br>";
$email_message .= "No de Folio: CRO-" . $id . "\n<br>";
$email_message .= "1. ¿Después de la visita de servicio técnico su equipo funciona de manera correcta?: " . $p_1 . "\n  <br>";
$email_message .= "2. ¿El ingeniero organizó su visita, acceso, así como el ingreso de herramientas y partes siguiendo los procedimientos establecidos por ustedes?: " . $p_2 . "\n  <br>";
$email_message .= "3. ¿El ingeniero le comunicó oportunamente: <br>";
$email_message .= "3.1- Los hallazgos: " . $p_31 . "\n  <br>";
$email_message .= "3.2- Posible causa: " . $p_32 . "\n  <br>";
$email_message .= "3.3- Estatus de refacciones: " . $p_33 . "\n  <br>";
$email_message .= "3.4- Resolución del problema: " . $p_34 . "\n  <br>";
$email_message .= "4. ¿Cómo calificaría el tiempo de respuesta para la atención y solución de esta falla?: " . $p_4 . "\n  <br>";
$email_message .= "5. ¿Cómo calificaría el servicio en general?: " . $p_5 . "\n  <br>";
$email_message .= "6. ¿Tiene algún comentario, queja o sugerencia?: " . $coment . "\n  <br>";

//Enviamos el mensaje a tu_dirección_email 
$bool = mail($email_to,$titulo,$email_message,$headers);
if($bool){
    echo "  <br>  <br> Encuesta enviada <br> <br> ¡Gracias! " ;
}else{
    echo "Encuesta no enviada";
}
//Enviamos el mensaje a tu_dirección_email 
	
?>
