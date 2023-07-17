<?php
require_once ('config.php');

header("Content-Type: text/html;charset=utf-8");
 
$contra = $_POST['contr_a'];
$password = "".$contra; 

$bfe = $_POST['nombr_e'];



function quitar_tildes($cadena) {
$no_permitidas= array ("á","é","í","ó","ú","Á","É","Í","Ó","Ú","ñ","À","Ã","Ì","Ò","Ù","Ã™","Ã ","Ã¨","Ã¬","Ã²","Ã¹","ç","Ç","Ã¢","ê","Ã®","Ã´","Ã»","Ã‚","ÃŠ","ÃŽ","Ã”","Ã›","ü","Ã¶","Ã–","Ã¯","Ã¤","«","Ò","Ã","Ã„","Ã‹");
$permitidas= array ("a","e","i","o","u","A","E","I","O","U","n","N","A","E","I","O","U","a","e","i","o","u","c","C","a","e","i","o","u","A","E","I","O","U","u","o","O","i","a","e","U","I","A","E");
$texto = str_replace($no_permitidas, $permitidas ,$cadena);
return $texto;
}



// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);

// Check connection
if (!$conn) {
      die("Fallo en la conexion a la base de datos, por favor intente de nuevo  <br>" . mysqli_connect_error());
}
 
echo "Conexión exitosa... <br>";
 
	
	$query = "SELECT * FROM callcenter";
	$result = $conn->query($query);
	$numfilas = $result->num_rows;


?>


<!DOCTYPE html>
<html>
<head>

    <title></title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
</head>
<body align="center" >
	<img src="crs2.jpg" width="800" height="200"> <br>
		
	<font size="6" color="#335BA3" align="center"> Registro de Solicitudes al Centro de Atencion a Clientes </font> <br><br> 
	
	<table  border="1px" align="center" >


		
    <tr  bgcolor="#C8E3FF">
        <th>Id</th>
        <th>Area</th>
        <th>Cliente</th>
        <th>Equipo</th>
        <th>Serie</th>
        <th>Contacto</th>
        <th>Correo</th>
		<th>Telefono</th>
		<th style='width: 300px;'>Solicitud</th>
		<th>Estatus</th>
		<th>Responsable</th>
		<th style='width: 150px;'>Actividades</th>
		<th>Registro Int</th>
		<th>Registro Ext</th>
		<th>Fecha</th>
		<th>Cierre</th>
		
    </tr>


<?php
		
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
		
		//$bfe = "moises neria";
		$fe =$row["responsable"];
		$fe2 = quitar_tildes($fe);
	    $bfe2 = quitar_tildes($bfe);
		if(trim(strtoupper($fe2)) == trim(strtoupper($bfe2)) ) {     
		?>
		<tr>
		<td><?php echo $row["id"] ?> </td>
		<td><?php echo $row["area"] ?> </td>
		<td><?php echo $row["cliente"] ?> </td>
		<td><?php echo $row["equipo"] ?> </td>
		<td><?php echo $row["serie"] ?> </td>
		<td><?php echo $row["contacto"] ?> </td>
	    <td><?php echo $row["correo"] ?> </td>
		<td><?php echo $row["telefono"] ?> </td>
		<td><?php echo $row["solicitud"] ?> </td>
			 
			<td><?php 	 
			$est = $row["estatus"];
		switch ($est) {
    		case "Abierta":
        	echo '<span style=" color:red; background: yellow; ">' . $row["estatus"] . '</span>';
        	break;
    		case "Cerrado":
        	echo '<span style=" background: #C8E3FF; font-weight: bold; ">' . $row["estatus"] . '</span>';
        	break;
			case "Archivo Digital":
        	echo '<span style=" background: #B2FFFF ">' . $row["estatus"] . '</span>';
        	break;
			case "Finalizado":
        	echo '<span style=" background: #39FF14; font-weight: bold; ">' . $row["estatus"] . '</span>';
        	break;
    		default:
        	echo $row["estatus"] ;
			}
			?> </td>		 		 
			 
		<td><?php echo $row["responsable"] ?> </td>
		<td><?php echo $row["actividades"] ?> </td>
		<td><?php echo $row["fint"] ?> </td>
		<td><?php echo $row["registro"] ?> </td>
			 	 
		<td><?php 
			echo substr($row["fecha"],0,16);	
		?> </td>
			 
		<td><?php 
			echo substr($row["cierre"],0,16);	
		?> </td>
			 	 	 
       </tr>
		
		 <?php   }
    }
   
} else {
    echo "0 results";
}

mysqli_close($conn);

?>
		
</table>

</body>
</html>