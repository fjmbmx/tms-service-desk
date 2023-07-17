<?php
require_once ('config.php');

header("Content-Type: text/html;charset=utf-8");
 
$contra = $_POST['contr_a'];
$password = "".$contra; 


// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);

// Check connection
if (!$conn) {
      die("Fallo en la conexion a la base de datos, por favor intente de nuevo  <br>" . mysqli_connect_error());
}
 
echo "Conexión exitosa... <br>";
 
	
	$query = "SELECT * FROM callcenter ";
	//$query = "SELECT * FROM callcenter  ";
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
			
	<font size="6" color="#335BA3" align="center" > COMPLAINTS LIST MEXICO PANAMA </font> <br><br> 
	
	<table  border="1px" align="center" >


	

		
    <tr  bgcolor="#C8E3FF">
        <th>RMA</th>
        <th>FOLIO FAB</th>
        <th>FECHA SOL</th>
        <th>FOLIO INT</th>
        <th>MEDIO DE RECEP</th>
        <th>TIPO DE SOL</th>
       	<th style='width: 300px;'>DESC BREVE</th>
		<th>CLIENTE</th>
        <th>TELEFONO</th>
		<th>EQUIPO</th>
		<th>MARCA</th>
		<th>MODELO</th>
		<th>NS</th>
		<th>LOTE</th>
		<th>FECHA INCIDENTE</th>
		<th>URG SOL</th>
		<th>AREA</th>
		<th>RESPONSABLE</th>
		<th>FECHA FIN</th>
		<th>ESTATUS</th>
		
    </tr>


<?php
		
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
		?>
		
		 <tr bgcolor="#F4F3EC" font size ="2" style="font-family:calibri" >
			 
		
			 
			 	 
	    <td>N/A</td>
        <td><?php echo $row["registro"] ?> </td>
       <td><?php 
			echo substr($row["fecha"],0,16);	
		?> </td>
       <td><?php echo $row["id"] ?> </td>
       <td><?php echo $row["contacto"] ?> </td>
        <td>Correctivo</td>
       <td><?php echo $row["solicitud"] ?> </td>
		<td><?php echo $row["cliente"] ?> </td>
        <td><?php echo $row["telefono"] ?> </td>
		<td><?php echo $row["equipo"] ?> </td>
		<td>INTUITIVE</td>
		<td> </td>
		<td><?php echo $row["serie"] ?> </td>
		<td>N/A</td>
		 <td><?php 
			echo substr($row["fecha"],0,16);	
		?> </td>
		<td>Imnediata</td>
		<td><?php echo $row["area"] ?> </td>
		<td>DM, EM</td>
			<td><?php 
			echo substr($row["cierre"],0,16);	
		?> </td>
		<td><?php echo $row["estatus"] ?> </td>	 

	 
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