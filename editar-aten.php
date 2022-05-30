<?php
    include("conexion.php");
    
    if(isset($_GET['id'])){
        $id= $_GET['id'];
        $consulta= "SELECT * FROM ateneistas WHERE ateneista_id = $id"; //Selecciona todos los datos del producto cuyo id es el enviado
        $result= mysqli_query($connect, $consulta); 
        
        if(mysqli_num_rows($result)==1){ //Si al menos hay un producto que ha coincidido con este id lo muestro
            $row= mysqli_fetch_array($result);
            $nombre= $row['ateneista_nombre'];
            $apellido= $row['ateneista_apellido'];
        }
        
    }
    
    if(isset($_POST['cargar'])){
        $id = $_GET['id'];
        $nombre= $_POST['nombre'];
        $apellido= $_POST['apellido'];

        $consulta= "UPDATE ateneistas set ateneista_nombre='$nombre', ateneista_apellido='$apellido' WHERE ateneista_id= $id";
        mysqli_query($connect,$consulta);
        $_SESSION['message']= 'Ateneista editado correctamente';
        $_SESSION['message_type']='warning';
        header("Location: ateneistas.php");
    }

?>
<?php include('include/header.php'); ?>
<div class="container p-4">
    <div class="row">
        <div class="col-md-4 mx-auto">
            <div class="card card-body">
                <form action="editar-aten.php?id=<?php echo $_GET['id']; ?>" method="POST">
                    <div class="form-group">
                        <input name="nombre" type="text" class="form-control" value="<?php echo $nombre; ?>" placeholder="Nuevo nombre">
                    </div>
                    <div class="form-group">
                        <input name="apellido" type="text" class="form-control" value="<?php echo $apellido; ?>" placeholder="Nuevo apellido">
                    </div>
                    <button class="btn btn-success" name="cargar">Cargar</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php include('include/footer.php'); ?>