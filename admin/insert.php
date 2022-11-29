<!-- AQUI EMPIEZA LA ACCION DE INSERTAR -->
<?php 
include("../conexion.php");

mysqli_query($conexion, "insert into mainlogin(username,email,password,role) values 
                     ('$_REQUEST[username]','$_REQUEST[email]','$_REQUEST[password]','$_REQUEST[role]')")
  or die("Problemas en el select" . mysqli_error($conexion));

mysqli_close($conexion);
header("location: admin_portada.php");

echo "Registro de comercio exitoso"; 
?>
<!-- AQUI TERMINA LA ACCION DE INSERTAR -->