<?php

session_start();
include "connection.php";

if(isset($_SESSION['id_usuario'])){

if (isset($_GET['id'])) {
    $del_id = $_GET['id'];

    if (!empty($del_id)) {
        $sql = "DELETE FROM comentario WHERE IdComentario ='$del_id'";
        try {
            $result = mysqli_query($conn, $sql);
        } catch (Exception $e) {
            header("Location: ../adm/index.php?error=Erro ao deletar o usuário");
            exit();
        }
        if ($result) {
            header("Location: ../adm/index.php?e=7cbbc409ec990f19c78c75bd1e06f215");
            exit();
        }
    }
} else {
    header("Location: ../adm/index.php?error=Erro ao deletar o usuário");
    exit();
}
}else{ 
    header("Location: ../index.php");
    exit();
}

?>