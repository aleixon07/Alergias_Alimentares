<?php

session_start();
include "connection.php";

if (isset($_SESSION['id_usuario'])) {

    $idusuario_session = $_SESSION["id_usuario"];


    if (isset($_POST["id_user"]) && isset(($_POST["id_prof"])) && isset(($_POST["num_star"]))) {

        $idusuario = $_POST["id_user"];
        $idprof = $_POST["id_prof"];
        $num_star = $_POST["num_star"];
        $dataAtual = date("Y-m-d");

        if ($idusuario_session == $idusuario) {

            $sql_busc = "SELECT * FROM avaliacao WHERE IdUsuario = '$idusuario' AND IdProfissional = '$idprof'";
            $result_busc = mysqli_query($conn, $sql_busc);

            if ($result_busc->num_rows > 0) {
                $row = mysqli_fetch_assoc($result_busc);
                $num_star_busc = $row['Num_Star'];

                if ($num_star_busc == $num_star) {
                    $sql = "DELETE FROM avaliacao WHERE IdUsuario = '$idusuario' AND IdProfissional = '$idprof'";
                }else{
                    $sql = "UPDATE avaliacao SET Num_Star = '$num_star' WHERE IdUsuario = '$idusuario' AND IdProfissional = '$idprof'";
                }
                
            } else {
                $sql = "INSERT INTO avaliacao(IdUsuario, IdProfissional, Data_Avaliacao, Num_Star) VALUES ('$idusuario','$idprof','$dataAtual','$num_star')";
            }

            $result = mysqli_query($conn, $sql);

            if ($result) {
                echo "deu certo";
                exit();
            } else {
                echo "deu errado";
                exit();
            }
        } else {
            echo "IDs diferentes";
            exit();
        }
    } else {
        echo "não estou recebendo POST";
        exit();
    }
} else {
    header("Location: ../index.php");
    exit();
}
