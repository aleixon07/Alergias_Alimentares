<?php

session_start();
include "connection.php";

if(isset($_SESSION['id_usuario'])){

    $idusuario_session = $_SESSION["id_usuario"];


    if(isset($_POST["idusuario"]) && isset(($_POST["idreceita"]))){

    $idusuario = $_POST["idusuario"];
    $idreceita = $_POST["idreceita"];
    
    if($idusuario_session == $idusuario){

        $sql_busc = "SELECT * FROM curtida WHERE IdUsuario = '$idusuario' AND IdReceita = '$idreceita'";
        $result_busc = mysqli_query($conn, $sql_busc);

        if ($result_busc->num_rows > 0) {

            $sql = "DELETE FROM curtida WHERE IdUsuario = '$idusuario' AND IdReceita = '$idreceita'";
        }else{
            $sql= "INSERT INTO curtida (IdUsuario, IdReceita) VALUES ('$idusuario','$idreceita')";
        }

        $result= mysqli_query($conn, $sql);

        if($result){
            echo "deu certo";
            exit();

        }else{
            echo "deu errado";
            exit();
        }

    }else{
        echo "IDs diferentes";
        exit();
    }

    }else{
        echo "não estou recebendo POST";
        exit();
    }
}else{ 
    header("Location: ../index.php");
    exit();
}
