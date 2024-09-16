<?php

session_start();
include "connection.php";

if(isset($_SESSION['id_usuario'])){

if (isset($_GET['id'])) {
    $del_id = $_GET['id'];

    if (!empty($del_id)) {
        $sql = "DELETE FROM alergia_alimentar WHERE IdAlergia_Alimentar ='$del_id'";
        try {
            $result = mysqli_query($conn, $sql);
        } catch (Exception $e) {
            header("Location: ../adm/index.php?error=Erro ao deletar o usuário");
            exit();
        }
        if ($result) {
            header("Location: ../adm/dashboard/geren_alergias.php?e=eccbc87e4b5ce2fe28308fd9f2a7baf3");
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