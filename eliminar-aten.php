<?php 
    include("conexion.php");
    
    if(isset($_GET['id'])){
        $id= $_GET['id'];
        $consulta= "DELETE FROM ateneistas WHERE ateneista_id = $id"; //Elimina el producto cuyo id es el enviado
        $result= mysqli_query($connect, $consulta); 
        
        if(!$result){
            $_SESSION['message']= 'Error al eliminar, este ateneista contiene puntos asignados';
            $_SESSION['message_type']= 'danger';

        }else{
            $_SESSION['message']= 'Ateneista eliminado correctamente';
            $_SESSION['message_type']= 'danger';
        }
        header("Location: ateneistas.php");
    }

?>