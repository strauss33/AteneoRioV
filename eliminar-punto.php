<?php 
    include("conexion.php");
    
    if(isset($_GET['id'])){
        $id= $_GET['id'];
        $consulta= "DELETE FROM puntos WHERE puntos_id = $id"; //Elimina el producto cuyo id es el enviado
        $result= mysqli_query($connect, $consulta); 
        
        if(!$result){
            die("Error");

        }

        $_SESSION['message']= 'Punto eliminado correctamente';
        $_SESSION['message_type']= 'danger';
        
        header("Location: puntos.php");
    }

?>