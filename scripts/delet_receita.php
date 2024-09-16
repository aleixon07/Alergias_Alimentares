<?php

session_start();
include "connection.php";

if(isset($_SESSION['id_usuario'])){

if (isset($_GET['id'])) {
    $del_id = $_GET['id'];

    $sql2= "SELECT * FROM receitas WHERE IdReceita ='$del_id'";
    $result2 = $conn->query($sql2);
    $row2 = $result2->fetch_assoc();

    $oculta = $row2["Oculta"];
    $caminho_imagem = $row2["Foto"];


     if(isset($caminho_imagem)){

        $caminhoArquivo = "../fotos/receitas/$caminho_imagem";
        
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


    if (!empty($del_id)) {
        $sql = "DELETE FROM receitas WHERE IdReceita ='$del_id'";
        try {
            $result = mysqli_query($conn, $sql);
        } catch (Exception $e) {
            header("Location: ../adm/index.php?error=Erro ao deletar o usuário");
            exit();
        }
        if ($result) {
            if($oculta == 1){
                header("Location: ../adm/index.php?e=a684eceee76fc522773286a895bc8436");
                exit();
            }
            if($oculta == 0){
                header("Location: ../adm/index.php?e=7f39f8317fbdb1988ef4c628eba02591");
                exit();
            }
        }
    }
} else {
    header("Location: ../adm/index.php?error=Id_necessario");
    exit();
}
}else{ 
    header("Location: ../index.php");
    exit();
}

?>