<?php

session_start();
include "connection.php";

if (isset($_SESSION['id_usuario'])) {

    if (isset($_GET['id'])) {
        $del_id = $_GET['id'];
        $id_adm = $_SESSION['id_usuario'];

        $sql2 = "SELECT * FROM usuario WHERE IdUsuario ='$del_id'";
        $result2 = $conn->query($sql2);
        $row2 = $result2->fetch_assoc();

        $oculta = $row2["Oculta"];
        $caminho_imagem = $row2["Foto"];


        if (isset($caminho_imagem)) {

            $caminhoArquivo = "../fotos/usuarios/$caminho_imagem";

            if (file_exists($caminhoArquivo)) {
                if (unlink($caminhoArquivo)) {
                    echo 'Arquivo de foto excluído com sucesso.';
                } else {
                    echo 'Erro ao excluir o arquivo de foto.';
                }
            } else {
                echo 'O arquivo de foto não existe.';
            }
        }

        if ($id_adm == $del_id) {

            header("Location: ../adm/index.php?e=c9f0f895fb98ab9159f51fd0297e236d");
            exit();
        }

        if (!empty($del_id)) {

            // DELETAR  AVALIACAO
            $sql_avaliacao = "SELECT * FROM avaliacao WHERE IdUsuario = '$del_id'";
            $result_avaliacao = mysqli_query($conn, $sql_avaliacao);

            if (mysqli_num_rows($result_avaliacao) > 0) {

                $sql_delet_avaliacao = "DELETE FROM avaliacao WHERE IdUsuario ='$del_id'";
                $result_delet_avaliacao = mysqli_query($conn, $sql_delet_avaliacao);
            }

            // DELETAR  COMENTARIO
            $sql_comentario = "SELECT * FROM comentario WHERE IdUsuario = '$del_id'";
            $result_comentario = mysqli_query($conn, $sql_comentario);

            if (mysqli_num_rows($result_comentario) > 0) {

                $sql_delet_comentario = "DELETE FROM comentario WHERE IdUsuario ='$del_id'";
                $result_delet_comentario = mysqli_query($conn, $sql_delet_comentario);
            }

            // DELETAR  CURTIDA
            $sql_curtida = "SELECT * FROM curtida WHERE IdUsuario = '$del_id'";
            $result_curtida = mysqli_query($conn, $sql_curtida);

            if (mysqli_num_rows($result_curtida) > 0) {

                $sql_delet_curtida = "DELETE FROM curtida WHERE IdUsuario ='$del_id'";
                $result_delet_curtida = mysqli_query($conn, $sql_delet_curtida);
            }

            // DELETAR  PROFISSIONAIS
            $sql_profissionais = "SELECT * FROM profissionais WHERE IdUsuario = '$del_id'";
            $result_profissionais = mysqli_query($conn, $sql_profissionais);

            if (mysqli_num_rows($result_profissionais) > 0) {

                $sql_delet_profissionais = "DELETE FROM profissionais WHERE IdUsuario ='$del_id'";
                $result_delet_profissionais = mysqli_query($conn, $sql_delet_profissionais);
            }

            // DELETAR  RECEITAS
            $sql_receitas = "SELECT * FROM receitas WHERE IdUsuario = '$del_id'";
            $result_receitas = mysqli_query($conn, $sql_receitas);

            if (mysqli_num_rows($result_receitas) > 0) {

                $sql_delet_receitas = "DELETE FROM receitas WHERE IdUsuario ='$del_id'";
                $result_delet_receitas = mysqli_query($conn, $sql_delet_receitas);
            }

            $sql = "DELETE FROM usuario WHERE IdUsuario ='$del_id'";
            try {
                $result = mysqli_query($conn, $sql);
            } catch (Exception $e) {
                header("Location: ../adm/index.php?error=Erro ao deletar o usuário");
                exit();
            }
            if ($result) {
                header("Location: ../adm/index.php?e=8f14e45fceea167a5a36dedd4bea2543");
                exit();
            }
        }
    } else {
        header("Location: ../adm/index.php?error=Erro ao deletar o usuário");
        exit();
    }
} else {
    header("Location: ../index.php");
    exit();
}
