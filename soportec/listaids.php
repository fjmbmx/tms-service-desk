<?php
require_once ('config.php');

header("Content-Type: text/html;charset=utf-8");
  


// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);

// Check connection
if (!$conn) {
      die("Fallo en la conexion a la base de datos, por favor intente de nuevo  <br>" . mysqli_connect_error());
}
 
echo "Conexión exitosa... <br>";
 
	
	$query = "SELECT * FROM clientes ORDER BY anombre DESC";

//	$query = "SELECT * FROM clientes";
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
		
	<font size="6" color="#335BA3" align="center"> Registro de ID's de Clientes </font> <br><br> 
	
	<table width="70%" border="1px" align="center" >


		
    <tr align="center" bgcolor="#C8E3FF">
        <td>Id</td>
        <td>Cliente</td>
        <td>Equipo</td>
        <td>Serie</td>
        <td>Contacto</td>
        <td>Correo</td>
		<td>Teléfono</td>		
    </tr>


<?php
		
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
		?>
		
		 <tr>
	
		<td><?php echo $row["aid"] ?> </td>
		<td><?php echo $row["acliente"] ?> </td>
		<td><?php echo $row["aequipo"] ?> </td>	 
		<td><?php echo $row["aserie"] ?> </td>
		<td><?php echo $row["anombre"] ?> </td>
	    <td><?php echo $row["aemail"] ?> </td>
		<td><?php echo $row["amovil"] ?> </td>
 
       </tr>
		
		 <?php   
    }
   
} else {
    echo "0 results";
}

mysqli_close($conn);

?>
		
</table>

</body>
</html>