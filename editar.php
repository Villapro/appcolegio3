<?php
include ("header.php");?>
<?php
  include("conexion.php");
  if (isset($_GET['codigo'])){
      $codigo= $_GET['codigo'];
      $query= "SELECT * FROM producto WHERE codigo = $codigo";
      $result = mysqli_query($conexion,$query);
      if(mysqli_num_rows($result)==1){
        $reg= mysqli_fetch_array($result);
        $nombre=$reg['nombre'];
        $foto=$reg['foto'];
      }
      }
  
  if(isset($_POST['update'])){
    $codigo= $_GET['codigo'];
    $nombre=$_POST['nombre'];
    $foto=$_POST['foto'];
    $query="UPDATE producto SET nombre='$nombre',foto='$foto' where codigo = $codigo";
    $result = mysqli_query($conexion,$query);
    header("location: personal/personal_portada.php");
  }
  ?>
  

<div class="form-group">
<form action="editar.php?codigo=<?php echo $_GET['codigo']; ?>" method="post">
      <label for="">Id:</label>
      <input type="number" required readonly class="form-control"  id=""  name="codigo" placeholder="<?php echo $reg['codigo'] ; ?> ">
    </div>
    <div class="form-group">
      <label for="" class="text-primary">Nombre:</label>
      <input type="text" class="form-control" id=""  name="nombre" value="<?php echo $nombre ; ?>"  placeholder="Actualiza la direccion">
    </div>
    <div class="form-group">
        <label for="" class="text-primary">Foto</label>
        <input type="foto" class="form-control" id="" name="foto" value="<?php echo $foto; ?>" placeholder="Actualiza la direccion">
    </div>
   <button type="submit" class="btn btn-primary" name="update">Actualizar</button>
  </form> 
 </div>
