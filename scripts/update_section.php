<?php

session_start(); //verifica a sessão

include "connection.php";

if (isset($_SESSION['id_usuario'])) {

    if (isset($_POST["section"])) {

        $section = $_POST["section"];

        if (isset($_POST["titulo"]) && isset($_POST["conteudo"])) {

            if (empty($titulo) || empty($conteudo)) {
                $error = "45";
            }

            if ($error) {
                $error2 = md5($error);
                header("Location: ../adm/dashboard/geren_home.php?e=$error2");
            }

            $titulo = $_POST['titulo'];
            $conteudo = $_POST['conteudo'];

            $sql0 = "UPDATE home SET Titulo ='$titulo', Conteudo ='$conteudo' WHERE  Section = '$section' ";
            $result0 = mysqli_query($conn, $sql0);
        }

        if (isset($_FILES['imagem'])) {
            $imagem = $_FILES['imagem'];
            $nomeimagem = uniqid($imagem["name"]) . ".jpeg";
            $nome_imagem = $imagem["name"];



            $sql1 = "SELECT * FROM home WHERE Section = '$section' ";
            $result1 = $conn->query($sql1);
            $row1 = $result1->fetch_assoc();

            $caminho_imagem = $row1["Foto"];


            if (isset($caminho_imagem) && !empty($nome_imagem)) {

                $caminhoArquivo = "../fotos/outros/$caminho_imagem";

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

            if (!empty($nome_imagem)) {
                $diretorioDestino = "../fotos/outros/";
                $tipo = $imagem["type"];
                $tamanho = $imagem["size"];
                $tmp_name = $imagem["tmp_name"];

                $caminhoDestino = $diretorioDestino . $nomeimagem;
                if (move_uploaded_file($tmp_name, $caminhoDestino)) {
                    echo "Imagem enviada com sucesso!";
                } else {
                    echo "Erro ao enviar a imagem.";
                }

                $sql2 = "UPDATE home SET Foto = '$nomeimagem' WHERE  Section = '$section' ";
                $result2 = mysqli_query($conn, $sql2);
            } else if (empty($nome_imagem)) {

                $sql2 = "UPDATE home SET Foto = '$caminho_imagem' WHERE  Section = '$section' ";
                $result2 = mysqli_query($conn, $sql2);
            } else {

                $sql2 = "UPDATE home SET foto = NUll WHERE  section = '$section' ";
                $result2 = mysqli_query($conn, $sql2);
            }
        }

        if (isset($_POST["favcolor"])) {

            $favColor = $_POST["favcolor"];

            if (preg_match("/^#?([a-fA-F0-9]{6}|[a-fA-F0-9]{3})$/", $favColor)) {

                $sql3 = "UPDATE home SET Cor ='$favColor' WHERE Section = '$section' ";
                $result3 = mysqli_query($conn, $sql3);
            } else {
                // Cor inválida
                echo "Por favor, selecione uma cor válida no formato #RRGGBB ou #RGB.";
            }
        }
        if (isset($_POST["gmail"]) && isset($_POST["localizacao"]) && isset($_POST["atendimento"]) && isset($_POST["numero"])) {

            $gmail = $_POST["gmail"];
            $localizacao = $_POST["localizacao"];
            $numero = $_POST["numero"];
            $atendimento = $_POST["atendimento"];

            $sql_gmail = "UPDATE home SET Conteudo = '$gmail' WHERE  Section = '51' ";
            $result_gmail = mysqli_query($conn, $sql_gmail);

            $sql_localizacao = "UPDATE home SET Conteudo = '$localizacao' WHERE  Section = '52' ";
            $result_localizacao = mysqli_query($conn, $sql_localizacao);

            $sql_atendimento = "UPDATE home SET Conteudo = '$atendimento' WHERE  Section = '53' ";
            $result_atendimento = mysqli_query($conn, $sql_atendimento);

            $sql_numero = "UPDATE home SET Conteudo = '$numero' WHERE  Section = '54' ";
            $result_numero = mysqli_query($conn, $sql_numero);

        }


        if (isset($_POST["alergia"])) {
            header("Location: ../adm/dashboard/geren_alergias.php?e=e4da3b7fbbce2345d7772b0674a318d5"); //se tudo der certo volta para página inicial
            exit();
        }else{
            header("Location: ../adm/dashboard/geren_home.php?e=c4ca4238a0b923820dcc509a6f75849b&section=$section"); //se tudo der certo volta para página inicial
            exit();
        }
    } else {
        header("Location: ../adm/dashboard/geren_home.php?e=necessario id section"); //se tudo não der certo volta para página inicial
        exit();
    }
} else {
    header('Location: ../index.php'); //se o usuário não estiver logado redireciona para a tela do login
    exit();
}
