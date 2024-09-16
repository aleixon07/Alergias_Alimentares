<?php

session_start(); //verifica a sessão

include "connection.php";

if (isset($_SESSION['id_usuario'])) {
    if (isset($_POST['edit_id'])) {

        if (isset($_POST["nome"]) && isset($_POST["email"])) {

            $nome = htmlspecialchars($_POST['nome']);
            $email = htmlspecialchars($_POST['email']);
            $id_edit = $_POST['edit_id'];
            $imagem = $_FILES['imagem'];
            $nomeimagem = uniqid($imagem["name"]) . ".jpeg";
            $nome_imagem = $imagem["name"];
                
            $sql_email = "SELECT * FROM usuario WHERE Email = '$email' AND IdUsuario != '$id_edit'";
            $result_email = mysqli_query($conn, $sql_email);

            if (mysqli_num_rows($result_email) > 0) {

                    header("Location: ../adm/index.php?e=f033ab37c30201f73f142449d037028d"); //80
                    exit();

             }
            

            $sql1 = "SELECT * FROM usuario WHERE IdUsuario = '$id_edit'";
            $result1 = $conn->query($sql1);
            $row1 = $result1->fetch_assoc();

            $caminho_imagem = $row1["Foto"];
            $nivel_usu = $row1["Nivel"];

            if (empty($nome) || empty($email)) {
                $error = "45";
            }

            if (isset($error)){

                $error2 = md5($error);
                
                if ($nivel_usu == 1) {

                    header("Location: ../adm/dashboard/form_edit_user.php?e=$error2&id=$id_edit");
                    exit();
                } else {
                    header("Location: ../adm/dashboard/form_edit_adm.php?e=$error2&id=$id_edit");
                    exit();
                }
            }

            if (isset($caminho_imagem) && !empty($nome_imagem)) {

                if ($nivel_usu == 1) {
                    $caminhoArquivo = "../fotos/usuarios/$caminho_imagem";
                } else {
                    $caminhoArquivo = "../fotos/administradores/$caminho_imagem";
                }

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
                if ($nivel_usu == 1) {
                    $diretorioDestino = "../fotos/usuarios/";
                } else {
                    $diretorioDestino = "../fotos/administradores/";
                }
                $tipo = $imagem["type"];
                $tamanho = $imagem["size"];
                $tmp_name = $imagem["tmp_name"];

                $caminhoDestino = $diretorioDestino . $nomeimagem;
                if (move_uploaded_file($tmp_name, $caminhoDestino)) {
                    echo "Imagem enviada com sucesso!";
                } else {
                    echo "Erro ao enviar a imagem.";
                }

                $sql2 = "UPDATE usuario SET Nome ='$nome', Email ='$email', Foto = '$nomeimagem' WHERE  IdUsuario = '$id_edit' ";
                $result2 = mysqli_query($conn, $sql2);

            } else if (empty($nome_imagem)) {
                
                if(!empty($caminho_imagem)){
                    $sql2 = "UPDATE usuario SET Nome ='$nome', Email ='$email', Foto = '$caminho_imagem' WHERE  IdUsuario = '$id_edit' ";
                    $result2 = mysqli_query($conn, $sql2);
                }else{

                        $sql2 = "UPDATE usuario SET Nome ='$nome', Email ='$email', Foto = NUll WHERE  IdUsuario = '$id_edit' ";
                        $result2 = mysqli_query($conn, $sql2);
                    
                }
                
            } 

            if (isset($_POST["a"]) && !empty($_POST["a"])) {
                $a = $_POST["a"];

                if ($a == 1) {
                    header("Location: ../index.php?e=c4ca4238a0b923820dcc509a6f75849b"); //se tudo der certo volta para página inicial
                    exit();
                } else if ($a == 2) {
                    header("Location: ../views/alergia_alimentar.php?e=c4ca4238a0b923820dcc509a6f75849b"); //se tudo der certo volta para página inicial
                    exit();
                } else if ($a == 3) {
                    header("Location: ../views/profissionais.php?e=c4ca4238a0b923820dcc509a6f75849b"); //se tudo der certo volta para página inicial
                    exit();
                } else if ($a == 4) {
                    header("Location: ../views/receitas.php?e=c4ca4238a0b923820dcc509a6f75849b"); //se tudo der certo volta para página inicial
                    exit();
                } else if ($a == 5) {
                    $b = $_POST["b"];

                    header("Location: ../views/perfil_profissional.php?e=c4ca4238a0b923820dcc509a6f75849b&i=$b"); //se tudo der certo volta para página inicial
                    exit();
                } else if ($a == 6) {
                    $b = $_POST["b"];
                    header("Location: ../views/perfil_receita.php?e=c4ca4238a0b923820dcc509a6f75849b&i=$b"); //se tudo der certo volta para página inicial
                    exit();
                } else {
                    header("Location: ../index.php?e=c4ca4238a0b923820dcc509a6f75849b"); //se tudo der certo volta para página inicial
                    exit();
                }
            } else {
                if ($nivel_usu == 1) {
                    header("Location: ../adm/index.php?e=45c48cce2e2d7fbdea1afc51c7c6ad26"); //se tudo der certo volta para página inicial
                    exit();
                } else {
                    header("Location: ../adm/index.php?e=d3d9446802a44259755d38e6d163e820"); //se tudo der certo volta para página inicial
                    exit();
                }
            }
        } else {
            header("Location: ../adm/dashboard/form_edit_user.php?error=Edit_id faltando"); //de houver erro na consulta redireciona com uma msg por GET
            exit();
        }
    } else {
        header("Location: ../adm/dashboard/form_edit_user.php?error=Edit_id faltando"); //de houver erro na consulta redireciona com uma msg por GET
        exit();
    }
} else {
    header('Location: ../index.php'); //se o usuário não estiver logado redireciona para a tela do login
    exit();
}
