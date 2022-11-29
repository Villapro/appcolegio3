<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="initial-scale=1.0, maximum-scale=2.0">
<title>Multiusuarios PHP MySQL: Niveles de Usuarios</title>
		
<link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
<script src="../js/jquery-1.12.4-jquery.min.js"></script>
<script src="../bootstrap/js/bootstrap.min.js"></script>
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
<?php include("../header.php");?>
	
	<div class="wrapper">
	
	<div class="container">
			
		<div class="col-lg-12">
		 
			<center>
				<h1>Pagina personal</h1>
				
				<h3>
				<?php
				
				session_start();

				if(!isset($_SESSION['personal_login']))	
				{
					header("location: ../index.php");
				}

				if(isset($_SESSION['admin_login']))	
				{
					header("location: ../admin/admin_portada.php");
				}

				if(isset($_SESSION['usuarios_login']))	
				{
					header("location: ../usuarios/usuarios_portada.php");
				}
				
				if(isset($_SESSION['personal_login']))
				{
				?>
					Bienvenido,
				<?php
					echo $_SESSION['personal_login'];
				}
				?>
				</h3>

				<div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Panel de usuarios
                        </div>
			</center>
			<a href="../cerrar_sesion.php"><button class="btn btn-danger text-left"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Cerrar Sesion</button></a>
            <hr>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th width="1%">Codigo</th>
                                            <th width="9%">Nombre</th>
											<th width="9%">Foto</th>
											<th width="9%">Aciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>

									<?php
									$conexion = mysqli_connect("localhost", "root", "", "registro") or
									die("Problemas con la conexión");
									if ($_POST){
									  $codigo=$_POST['codigo'];
									  $accion=$_POST['accion'];
								  switch ($accion) {
								   case "Borrar": 
									$registros = mysqli_query($conexion, "delete from producto where codigo=$codigo");
									break;
									default:
									echo "No existe";
								   }
								   }
									require_once '../DBconect.php';
									$select_stmt=$db->prepare("SELECT codigo,nombre,foto FROM producto");
									$select_stmt->execute();
									
									while($row=$select_stmt->fetch(PDO::FETCH_ASSOC))
									{
									?>
									 <tr>
                                            <td><?php echo $row["codigo"]; ?></td>
                                            <td><?php echo $row["nombre"]; ?></td>
											<td> <center>
											<img src="../img/<?php  echo $row['foto']?>" alt="" width="100px" height="100px"></center></td>
			
											
											<td> <form action="../editar.php" method="post"> <input type="hidden" name="codigo" value="<?php echo $row['codigo'] ;?>">
        <a href="../editar.php?codigo=<?php echo $row['codigo']; ?>" class="btn btn-success"> <img src="../img/editar1.png" alt="" width="18px" height="18px">Editar</a>
      </form>
      
      <a class="btn btn-danger" href="borrar.php?codigo=<?php echo $row['codigo']; ?>" ><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
    </td>   </tr>
									<?php 
									}
									?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
		
	</div>
			
	
		
	</div>
			
	</div>
										
	</body>
</html>