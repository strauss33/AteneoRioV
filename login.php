<?php include ("include/header.php"); ?>
<?php include("conexion.php"); 

$consulta= "SELECT * FROM ingreso"; //Selecciona todos los datos del producto cuyo id es el enviado
$result= mysqli_query($connect, $consulta); 
    
if(mysqli_num_rows($result)==1){ //Si al menos hay un producto que ha coincidido con este id lo muestro
    $row= mysqli_fetch_array($result);
    $usuariobd= $row['ingreso_usuario'];
    $contrabd= $row['ingreso_contra'];
}
    
if(isset($_POST['cargar'])){
    $usuario= $_POST['usuario'];
    $contra= $_POST['contra'];

    if($usuario == $usuariobd && $contra == $contrabd){
        header("Location: ateneistas.php");
    }else{
        header("Location: login.php");
    }
    
}
?>

<div class="container p-4">
    <div class="row">
        <div class="col-md-4 mx-auto">
            <div class="card card-body">
                <h1>Iniciar Sesion</h1>
                <form action="login.php" method="POST">
                    <div class="form-group">
                        <input name="usuario" type="text" placeholder="Usuario" class="form-control">
                    </div>
                    <div class="form-group">
                        <input name="contra" type="password" placeholder="Clave" class="form-control">
                    </div>
                    <button class="btn btn-success" name="cargar">Ingresar</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php include ("include/footer.php"); ?>