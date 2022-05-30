<?php
    include("conexion.php"); //El include es para llamar a un archivo, en este caso el de conexion
    if(isset($_POST['buscar'])){
        $dato=$_POST['nombre'];//Guardamos los datos
        $sql = "SELECT * FROM puntos p , ateneistas a WHERE p.ateneista_id = a.ateneista_id and ateneista_nombre like '$dato' or ateneista_apellido like '$dato' "; //Consulta para insertar
        $result=$connect->query($sql); //Ejecutar consulta
	    if (!$result) {
	    	die("Error");
        }
    }
    
?>

<?php include('include/header.php'); ?>
<div class="col-md-8"><!-- columna de 8-->
    <table class="table table-bordered">
        <thead>
            <th>Fecha</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Puntos</th>
            <th>Descripcion</th>
        </thead>
        <tbody>
           <?php
            while($row= mysqli_fetch_array($result)){  //Recorrer los productos. $row para hacer una fila ?>
                <tr>
                    <td><?= $row['puntos_fecha'] ?></td>
                    <td><?= $row['ateneista_nombre'] ?></td>
                    <td><?php echo $row['ateneista_apellido'] ?></td>
                    <td><?php echo $row['puntos_puntaje'] ?></td>
                    <td><?php echo $row['puntos_descripcion'] ?></td>
                    <td>
                        <a href="eliminar-punto.php?id=<?php echo $row['puntos_id']?>" class="btn btn-danger"><i class="far fa-trash-alt"></i></a>
                    </td>
                </tr>
            <?php } ?>
            <a href="puntos.php" class="btn btn-success mb-2">Volver</a>
        </tbody>
    </table>
</div>
<?php include("include/footer.php"); ?> 