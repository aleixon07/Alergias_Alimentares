<?php

session_start();
include "connection.php";

if (isset($_SESSION['id_usuario'])) {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        if (isset($_POST["nome"]) && isset($_POST["email"]) && isset($_POST["senha"])) {


            $nome = $_POST["nome"];
            $email = $_POST["email"];
            $senha = $_POST["senha"];
            $nivel = "2";
            $error = "";
            $imagem = $_FILES['imagem'];
            $nome_imagem = $imagem["name"];

            $diretorioDestino = "../fotos/administradores/";

            if (isset($nome_imagem)) {
                // Obtém informações sobre o arquivo
                $nomeimagem = uniqid($imagem["name"]) . ".jpeg";
                $tipo = $imagem["type"];
                $tamanho = $imagem["size"];
                $tmp_name = $imagem["tmp_name"];

                // Move o arquivo para o diretório de destino
                $caminhoDestino = $diretorioDestino . $nomeimagem;
                if (move_uploaded_file($tmp_name, $caminhoDestino)) {
                    echo "Imagem enviada com sucesso!";
                } else {
                    echo "Erro ao enviar a imagem.";
                }
            }
            if (empty($nome)) {
                $error .= "31";
            }
            if (empty($email)) {
                $error .= "32";
            }
            if (empty($senha)) {
                $error .= "33";
            }
            if ($error) {
                $error2 = md5($error);
                header("Location: ../adm/index.php?e=$error2");
                exit();
            } else {

                $sql_email = "SELECT * FROM usuario WHERE Email = '$email'";
                $result_email = mysqli_query($conn, $sql_email);
    
                if (mysqli_num_rows($result_email) > 0) {
    
                        header("Location: ../adm/index.php?e=f033ab37c30201f73f142449d037028d"); //80
                        exit();
    
                 }




                if (!empty($nome_imagem)) {
                    $senha2 = md5($senha);
                    $sql = "INSERT INTO usuario (Nome, Senha, Email, Nivel, Foto) VALUES ('$nome', '$senha2','$email', '$nivel', '$nomeimagem')";
                } else {
                    $senha2 = md5($senha);
                    $sql = "INSERT INTO usuario (Nome, Senha, Email, Nivel, Foto) VALUES ('$nome', '$senha2','$email', '$nivel', NULL)";
                }
                if ($conn->query($sql)) {

                    header("Location: ../adm/index.php?e=8e296a067a37563370ded05f5a3bf3ec");
                    exit();
                } else {
                    echo "erro ao cadastar usuasrio = " . $conn->error;
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
