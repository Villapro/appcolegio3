<!-- AQUI EMPIEZA LA ACCION DE BORRAR -->
<?php
  include("../conexion.php");
  $registros = mysqli_query($conexion, "select codigo from producto
                        where codigo='$_GET[codigo]'") or die("Problemas en el select:" . mysqli_error($conexion));

    mysqli_query($conexion, "delete from producto where admin='$_GET[admin]'") or
      die("Problemas en el select:" . mysqli_error($conexion));
    $_SESSION['message']='Registro eliminado correctamente';
    $_SESSION['message_type']='danger';
    header("location: admin_portada.php");
  
  mysqli_close($conexion);
  ?>
<!-- AQUI TERMINA LA ACCION DE BORRAR -->