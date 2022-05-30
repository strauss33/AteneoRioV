<?php include("conexion.php"); ?>
<?php include ("include/header.php"); ?>

<div class="container p-4"> 

    <div class="row"> <!-- fila-->
        <div class="col-md-8"><!-- columna de 8-->
            <table class="table table-bordered">
                <thead>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Puntos</th>
                </thead>
                <tbody>
                    <?php
                        $mostrarpunto="SELECT SUM(puntos_puntaje) AS total_puntos, ateneista_nombre, ateneista_apellido FROM puntos p, ateneistas a 
                        WHERE p.ateneista_id = a.ateneista_id GROUP BY ateneista_nombre, ateneista_apellido";
                        $resultado_punto= mysqli_query($connect,$mostrarpunto);//Ejecuto la consulta
                        
                        while($row= mysqli_fetch_array($resultado_punto)){  //Recorrer los productos. $row para hacer una fila ?>
                            <tr>
                                <td><?php echo $row['ateneista_nombre'] ?></td>
                                <td><?php echo $row['ateneista_apellido'] ?></td>
                                <td><?php echo $row['total_puntos'] ?></td>
                            </tr>
                        <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php include ("include/footer.php"); ?>