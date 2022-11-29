<?php include("header.php");?>
<?php
$codigo=(isset($_POST['codigo']))?$_POST['codigo']:"";
$nombre=(isset($_POST['nombre']))?$_POST['nombre']:"";
$foto=(isset($_POST['foto']))?$_POST['foto']:"";
include("conexion.php");
$respuesta =mysqli_query($conexión," UPDATE producto SET `nombre`='$nombre',`foto`='$foto' WHERE codigo=$codigo");
header ("location:personal/personal_portada.php");
?>