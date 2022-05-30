<?php include("conexion.php"); ?>
<?php include ("include/header.php"); ?>

<div class="container p-4"> 

    <div class="row"> <!-- fila-->
        <div class="col-md-4"> <!--columna de 4-->
            <?php if(isset($_SESSION['message'])){?> <!--Preguntar si existe un mensaje -->
                <div class="alert alert-<?= $_SESSION['message_type']; ?> alert-dismissible fade show" role="alert">
                    <?= $_SESSION['message']?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php session_unset();} ?>

            <div class="card card-body">
                <h5>Agregar puntos</h5>
                <form action="agregar-punto.php" method="POST">
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
                    <input type="submit" class="btn btn-success btn-block" name="guardar" value="Guardar" >
                </form>
            </div>    
        </div>
    

        <div class="col-md-8"><!-- columna de 8-->
            <form class="form-inline" action="buscar-ateneista.php" method="POST">
                <div class="form-group mx-sm mb-3">
                    <input type="text" name="nombre" class="form-control" placeholder="Buscar nombre" autofocus>
                    <input type="submit" class="btn btn-success mb-2" name="buscar" value="Buscar">
                </div>
            </form>
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
                        $mostrarpunto="SELECT puntos_id, puntos_fecha, puntos_puntaje, puntos_descripcion, ateneista_nombre, ateneista_apellido FROM puntos p, ateneistas a
                        WHERE p.ateneista_id = a.ateneista_id ";
                        $resultado_punto= mysqli_query($connect,$mostrarpunto);//Ejecuto la consulta
                        
                        while($row= mysqli_fetch_array($resultado_punto)){  //Recorrer los productos. $row para hacer una fila ?>
                            <tr>
                                <td><?php echo $row['puntos_fecha'] ?></td>
                                <td><?php echo $row['ateneista_nombre'] ?></td>
                                <td><?php echo $row['ateneista_apellido'] ?></td>
                                <td><?php echo $row['puntos_puntaje'] ?></td>
                                <td><?php echo $row['puntos_descripcion'] ?></td>
                                <td>
                                  <a href="editar-punto.php?id=<?php echo $row['puntos_id']?>" class="btn btn-warning"><i class="fas fa-marker"></i></a>
                                  <a href="eliminar-punto.php?id=<?php echo $row['puntos_id']?>" class="btn btn-danger"><i class="far fa-trash-alt"></i></a>
                                </td>
                            </tr>
                        <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php include ("include/footer.php"); ?>