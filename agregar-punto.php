<?php
    include("conexion.php"); //El include es para llamar a un archivo, en este caso el de conexion
    if(isset($_POST['guardar'])){
        $fecha=$_POST['fecha'];
        $idaten=$_POST['idaten'];//Guardamos los datos
        $puntos=$_POST['puntos'];
        $descripcion=$_POST['descripcion'];
        

        $f= explode('/',$fecha); // Cuando encuentra "/" lo separa en un arreglo
        $fecha_sql= $f[2]."-".$f[1]."-".$f[0]; //Para ingresar la fecha debe estar como AAAA/MM/DD

        //Consulta para insertar
        $sql = "INSERT INTO puntos SET puntos_fecha='$fecha_sql', ateneista_id= '$idaten', puntos_puntaje='$puntos', puntos_descripcion='$descripcion'";
        
        //Ejecutar consulta
        $result=$connect->query($sql);
	    if (!$result) {
	    	die("Error");
        }
        $_SESSION['message']= 'Punto registrado correctamente';
        $_SESSION['message_type']= 'success';

        header("Location: puntos.php");
        
    }
?>