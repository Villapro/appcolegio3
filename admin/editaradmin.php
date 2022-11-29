<!-- AQUI EMPIEZA LA ACCION DE UPDATE -->
<?php 

include("../conexion.php");

if (isset($_GET['id'])){
  $id= $_GET['id'];
  $query= "SELECT * FROM mainlogin WHERE id = $id";
  $result = mysqli_query($conexion,$query);
  if(mysqli_num_rows($result)==1){
    $row= mysqli_fetch_array($result);
    $username=$row['username'];
    $email=$row['email'];
    $password=$row['password'];
    $role=$row['role'];
  }
}
if(isset($_POST['update'])){
  $id= $_GET['id'];
  $username=$_POST['username'];
  $email=$_POST['email'];
  $password=$_POST['password'];
  $role=$_POST['role'];
  $query="UPDATE mainlogin SET username='$username',email='$email',password='$password',role='$role'  where id = $id ";
  $result = mysqli_query($conexion,$query);
  header("location: admin_portada.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
<script src="../js/jquery-1.12.4-jquery.min.js"></script>
<script src="../bootstrap/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
<style type="text/css">
	.login-form {
		width: 340px;
    	margin: 20px auto;
	}
    .login-form form {
    	margin-bottom: 15px;
        background: #f7f7f7;
        box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
        padding: 30px;
    }
    .login-form h2 {
        margin: 0 0 15px;
    }
    .form-control, .btn {
        min-height: 38px;
        border-radius: 2px;
    }
    .btn {        
        font-size: 15px;
        font-weight: bold;
    }
</style>
</head>
<body>

<div class="container p-4">
  <div class="row">
    <div class="col-md-4 mx-auto">
      <div class="card card-body">
        <form action="editaradmin.php?id=<?php echo $_GET['id']; ?>" method="post">
          <div class=" form-group">
            Nuevo nombre de usuario<input type="text" name="username" id="" value="<?php echo $username; ?>"class="form-control" placeholder="Actualiza el nombre de usuario ">
            Nuevo correo<input type="text" name="email" id="" value="<?php echo $email; ?>"class="form-control" placeholder="Actualiza el correo">
            Nueva contraseña<input type="text" name="password" id="" value="<?php echo $password; ?>"class="form-control" placeholder="Actualiza la contraseña">
          <div class="form-group">
            Seleccione el rol
           <select class="form-control" name="role">
           <option value="<?php echo $role; ?>" selected="selected"> - seleccione rol - </option>
           <!--<option value="admin">Admin</option>-->
           <option value="admin">Administrador</option>
           <option value="personal">Personal</option>
           <option value="usuarios">Usuario</option>
           </select>
          </div>
          </div>
          <button type="submit" class="btn btn-primary" name="update">Actualizar</button>
        </form>
      </div>
    </div>  
  </div>
</div>
<!-- AQUI TERMINA LA ACCION DE UPDATE -->
  
</body>
</html>

