<?php
require_once ('config.php');
 
$contra = $_POST['contr_a'];
$password = "".$contra; 
// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);
// Check connection
if (!$conn) {
      die("Fallo en la conexion a la base de datos, por favor intente de nuevo  <br>" . mysqli_connect_error());
}
 
echo "Conexion a la base de datos exitosa <br><br>";
 

$sql = "INSERT INTO callcenter (id,area,cliente,equipo,contacto,correo,telefono,solicitud,estatus,responsable,actividades,registro,fecha) VALUES ('0','servicio','cecan','tomo','uvaldo','valdo@valdo.com','5526667944','prueba con datos fijos e email','0','0','0','0','0')";
if (mysqli_query($conn, $sql)) {
      echo "Nuevo registro creado exitosamente  <br><br>";
} else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);
?>

