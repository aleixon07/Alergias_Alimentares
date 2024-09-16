<?php

session_start();
include "connection.php";

if (isset($_SESSION['id_usuario'])) {

    $idusuario_session = $_SESSION["id_usuario"];


    if (isset($_POST["idusuario"]) && isset(($_POST["idreceita"]))) {

        $idusuario = $_POST["idusuario"];
        $idreceita = $_POST["idreceita"];
        $comentario = $_POST["comentario"];
        $dataAtual = date("Y-m-d");

        if ($idusuario_session == $idusuario) {

            $sql_comentar = "INSERT INTO comentario (IdUsuario, IdReceita, Data_Postagem, Conteudo) VALUES ('$idusuario','$idreceita', '$dataAtual', '$comentario')";

            $result = mysqli_query($conn, $sql_comentar);

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
