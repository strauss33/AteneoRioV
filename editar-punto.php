<?php
    include("conexion.php");
    
    if(isset($_GET['id'])){
        $id= $_GET['id'];
        $consulta= "SELECT puntos_id, puntos_fecha, ateneista_nombre, ateneista_apellido, puntos_puntaje, puntos_descripcion 
        FROM ateneistas , puntos WHERE puntos_id = $id"; //Selecciona todos los datos del ateneista cuyo id es el enviado
        $result= mysqli_query($connect, $consulta); 
        
        if(mysqli_num_rows($result)==1){ //Si al menos hay un ateneista que ha coincidido con este id lo muestro
            $row= mysqli_fetch_array($result);
            $fecha= $row['puntos_fecha'];
            $nombre= $row['ateneista_nombre'];
            $apellido= $row['ateneista_apellido'];
            $puntos= $row['puntos_puntaje'];
            $descripcion= $row['puntos_descripcion'];
        }
        
    }
    
    if(isset($_POST['cargar'])){
        $id = $_GET['id'];
        $idaten=$_POST['idaten'];//Guardamos los datos
        $puntos=$_POST['puntos'];
        $descripcion=$_POST['descripcion'];
        $fecha=$_POST['fecha'];
    
        $f= explode('/',$fecha); // Cuando encuentra "/" lo separa en un arreglo
        $fecha_sql= $f[2]."-".$f[1]."-".$f[0]; //Para ingresar la fecha debe estar como AAAA/MM/DD

        $consult= "UPDATE puntos SET ateneista_id='$idaten', puntos_puntaje='$puntos', puntos_descripcion='$descripcion', puntos_fecha='$fecha_sql' WHERE puntos.puntos_id=$id ";
        $result= mysqli_query($connect,$consult);
        if (!$result) {
	    	die("Error");
        }
        $_SESSION['message']= 'Punto editado correctamente';
        $_SESSION['message_type']='warning';
        header("Location: puntos.php");
    }

?>
<?php include('include/header.php'); ?>
<div class="container p-4">
    <div class="row">
        <div class="col-md-4 mx-auto">     
            <div class="card card-body">
                <form action="editar-punto.php?id=<?php echo $_GET['id']; ?>" method="POST">
                    <div class="form-group">
                            <input type="text" name="fecha" class="form-control"
                            placeholder="fecha DD/MM/AAAA" autofocus >
                        </div>
                        <div class="form-group"><!--Para separar los input -->
                            <select name="idaten" class="form-control" id="" required>
                                <option value="">Ateneista</option>
                                <?php 
                                $aten= "SELECT * FROM ateneistas order by ateneista_id";
                                $resultado= $connect->query($aten);
                                while($ateneistas= mysqli_fetch_row($resultado)){ ?>
                                    <option value="<?php echo $ateneistas[0] ?>"><?php echo $ateneistas[1]?> <?php echo $ateneistas[2]?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="text" name="puntos" class="form-control"
                                placeholder="Puntos" autofocus >
                        </div>
                        <div class="form-group">
                            <input type="text" name="descripcion" class="form-control"
                                placeholder="Descripcion" autofocus >
                        </div>
                        <input type="submit" class="btn btn-success btn-block" name="cargar" value="Cargar" >
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include('include/footer.php'); ?>