<?php

session_start(); //verifica a sessão

include "connection.php";

if (isset($_SESSION['id_usuario'])) {
    if (isset($_POST['id_profissional'])) {

        if (isset($_POST["nome"]) && isset($_POST["email"]) && isset($_POST["profissao"]) && isset($_POST["local_atendimento"]) && isset($_POST["horario_atendimento"]) && isset($_POST["telefone"]) && isset($_POST["preco"]) && isset($_POST["biografia"])) {
            $nome = htmlspecialchars($_POST['nome']);
            $email = htmlspecialchars($_POST['email']);
            $profissao = htmlspecialchars($_POST['profissao']);
            $local_atendimento = htmlspecialchars($_POST["local_atendimento"]);
            $horario_atendimento = htmlspecialchars($_POST["horario_atendimento"]);
            $telefone = htmlspecialchars($_POST["telefone"]);
            $preco = htmlspecialchars($_POST["preco"]);
            $biografia = $_POST["biografia"];
            $id_edit = $_POST['id_profissional'];
            $imagem = $_FILES['imagem'];
            $nomeimagem = uniqid($imagem["name"]) . ".jpeg";
            $nome_imagem = $imagem["name"];
            $error = "";
            $iduser = $_SESSION['id_usuario'];

            if (empty($nome) || empty($email) || empty($profissao) || empty($local_atendimento) || empty($horario_atendimento) || empty($telefone) || empty($preco) || empty($biografia)) {
                $error = "45";
            }
            if ($error) {
                $error2 = md5($error);
                header("Location: ../adm/dashboard/form_edit_prof.php?e=$error2&id=$id_edit");
                exit();
            }

            $sql1 = "SELECT * FROM profissionais WHERE IdProfissional = '$id_edit'";
            $result1 = $conn->query($sql1);
            $row1 = $result1->fetch_assoc();

            $caminho_imagem = $row1["Foto"];

            /*********************************************** VERIFICAR EMAIL E TELEFONE */
            $sql_email = "SELECT * FROM profissionais WHERE Email = '$email' AND IdProfissional != '$id_edit'";
            $result_email = mysqli_query($conn, $sql_email);

            if (mysqli_num_rows($result_email) > 0) {

                if (isset($_POST['aprov'])) {

                    header("Location: ../adm/index.php?e=d09bf41544a3365a46c9077ebb5e35c3"); //75
                    exit();
                } else {

                    header("Location: ../adm/index.php?e=fbd7939d674997cdb4692d34de8633c4"); //76
                    exit();
                }
            }

            $sql_telefone = "SELECT * FROM profissionais WHERE Telefone = '$telefone' AND IdProfissional != '$id_edit'";
            $result_telefone = mysqli_query($conn, $sql_telefone);

            if (mysqli_num_rows($result_telefone) > 0) {

                if (isset($_POST['aprov'])) {

                    header("Location: ../adm/index.php?e=28dd2c7955ce926456240b2ff0100bde"); //77
                    exit();
                } else {

                    header("Location: ../adm/index.php?e=35f4a8d465e6e1edc05f3d8ab658c551"); //78
                    exit();
                }
            }
            /*********************************************** VERIFICAR EMAIL E TELEFONE */


            if (isset($caminho_imagem) && !empty($nome_imagem)) {

                $caminhoArquivo = "../fotos/profissionais/$caminho_imagem";

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
                $diretorioDestino = "../fotos/profissionais/";
                $tipo = $imagem["type"];
                $tamanho = $imagem["size"];
                $tmp_name = $imagem["tmp_name"];

                $caminhoDestino = $diretorioDestino . $nomeimagem;
                if (move_uploaded_file($tmp_name, $caminhoDestino)) {
                    echo "Imagem enviada com sucesso!";
                } else {
                    echo "Erro ao enviar a imagem.";
                }

                $sql2 = "UPDATE profissionais SET 
                        Nome ='$nome', 
                        Email ='$email', 
                        Profissao ='$profissao',
                        Oculta = '1', 
                        Local_Atendimento ='$local_atendimento', 
                        Horario_Atendimento ='$horario_atendimento', 
                        Telefone ='$telefone', 
                        Precos ='$preco', 
                        Biografia ='$biografia', 
                        IdUsuario = $iduser,
                        Foto = '$nomeimagem' ##########
                        WHERE  IdProfissional = '$id_edit' ";
                $result2 = mysqli_query($conn, $sql2);
            } else if (empty($nome_imagem)) {

                $sql2 = "UPDATE profissionais SET 
                        Nome ='$nome', 
                        Email ='$email', 
                        Profissao ='$profissao', 
                        Oculta = '1', 
                        Local_Atendimento ='$local_atendimento', 
                        Horario_Atendimento ='$horario_atendimento', 
                        Telefone ='$telefone', 
                        Precos ='$preco', 
                        Biografia ='$biografia',
                        IdUsuario = $iduser,
                        Foto = '$caminho_imagem' #############
                        WHERE  IdProfissional = '$id_edit' ";
                $result2 = mysqli_query($conn, $sql2);
            }

            if (isset($_POST['aprov'])) {
                header("Location: ../adm/index.php?e=44f683a84163b3523afe57c2e008bc8c"); //se tudo der certo volta para página inicial
                exit();
            } else {
                header("Location: ../adm/index.php?e=f7177163c833dff4b38fc8d2872f1ec6"); //se tudo der certo volta para página inicial
                exit();
            }
        } else {
            header("Location: ../adm/dashboard/form_edit_prof.php"); //de houver erro na consulta redireciona com uma msg por GET
            exit();
        }
    } else {
        header("Location: ../adm/dashboard/form_edit_prof.php?error=Edit_id faltando"); //de houver erro na consulta redireciona com uma msg por GET
        exit();
    }
} else {
    header('Location: ../index.php'); //se o usuário não estiver logado redireciona para a tela do login
    exit();
}
