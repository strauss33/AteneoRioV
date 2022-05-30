<?php
    include("conexion.php"); //El include es para llamar a un archivo, en este caso el de conexion
    if(isset($_POST['guardar'])){
        $nombre=$_POST['nombre'];//Guardamos los datos
        $apellido=$_POST['apellido'];
        //Consulta para insertar
        $sql = "INSERT INTO ateneistas (ateneista_nombre, ateneista_apellido) VALUES ('$nombre', '$apellido')";
        
        //Ejecutar consulta
        $result=$connect->query($sql);
	    if (!$result) {
	    	die("Error");
        }
        $_SESSION['message']= 'Ateneista guardado correctamente';
        $_SESSION['message_type']= 'success';

        header("Location: ateneistas.php");
        
    }
?>