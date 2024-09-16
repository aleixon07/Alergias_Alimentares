<?php

session_start();
include "connection.php";

if (isset($_SESSION['id_usuario'])) {

    $idusuario_session = $_SESSION["id_usuario"];

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        if (isset($_POST["editor0"]) && isset($_POST["favcolor"])) {

            $text = $_POST["editor0"];
            $favColor = $_POST["favcolor"];

            if (preg_match("/^#?([a-fA-F0-9]{6}|[a-fA-F0-9]{3})$/", $favColor)) {

                $sql = "INSERT INTO alergia_alimentar (Text_Area, Cor, IdUsuario) VALUES ('$text', '$favColor', '$idusuario_session')";

                if ($conn->query($sql)) {

                    header("Location: ../adm/dashboard/geren_alergias.php?e=c4ca4238a0b923820dcc509a6f75849b");
                    exit();
                }
            }
        } else {
            header("Location: ../adm/index.php");
            exit();
        }
    } else {
        header("Location: ../adm/index.php");
        exit();
    }
} else {
    header("Location: ../index.php");
    exit();
}
