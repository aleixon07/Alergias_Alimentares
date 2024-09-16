<?php
session_start();
require_once "../scripts/connection.php";

if (isset($_SESSION['id_usuario'])) {

    $id = $_SESSION["id_usuario"];

    $sql = "SELECT * FROM usuario WHERE IdUsuario ='$id'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {

        // Recorrer los resultados y mostrar los datos
        while ($row = $result->fetch_assoc()) {

            $idusuario = $row["IdUsuario"];
            $nome_user = $row["Nome"];
            $email_user = $row["Email"];
            $foto_user = $row["Foto"];
            $nivel_user = $row["Nivel"];
        }
    }
}

if (!isset($_GET["i"]) && empty($_GET["i"])) {
    header("Location: receitas.php");
    exit();
} else {

    $i = $_GET["i"];

    $sql_receitas = "SELECT * FROM receitas WHERE IdReceita = $i AND Oculta = 1";
    $result_receitas = $conn->query($sql_receitas);

    if ($result_receitas->num_rows > 0) {

        while ($row_receitas = $result_receitas->fetch_assoc()) {

            $nome = $row_receitas["Nome"];
            $porcoes = $row_receitas["Porcoes"];
            $tempo = $row_receitas["Tempo"];
            $alergia = $row_receitas["Tipo_Alergia"];
            $ingredientes = $row_receitas["Ingredientes"];
            $modo_preparo = $row_receitas["Modo_Preparo"];
            $foto = $row_receitas["Foto"];
        }
    } else {
        header("Location: receitas.php");
        exit();
    }
}

$sql4 = "SELECT * FROM home WHERE Section = 0";
$result4 = $conn->query($sql4);

if ($result4->num_rows > 0) {

    while ($row4 = $result4->fetch_assoc()) {

        $cor_cabecalho = $row4["Cor"];
    }
}

$sql7 = "SELECT * FROM home WHERE Section = 51";
$result7 = $conn->query($sql7);

if ($result7->num_rows > 0) {

    while ($row7 = $result7->fetch_assoc()) {

        $conteudo_section_51 = $row7["Conteudo"];
    }
}

$sql8 = "SELECT * FROM home WHERE Section = 52";
$result8 = $conn->query($sql8);

if ($result8->num_rows > 0) {

    while ($row8 = $result8->fetch_assoc()) {

        $conteudo_section_52 = $row8["Conteudo"];
    }
}

$sql9 = "SELECT * FROM home WHERE Section = 53";
$result9 = $conn->query($sql9);

if ($result9->num_rows > 0) {

    while ($row9 = $result9->fetch_assoc()) {

        $conteudo_section_53 = $row9["Conteudo"];
    }
}

$sql10 = "SELECT * FROM home WHERE Section = 54";
$result10  = $conn->query($sql10);

if ($result10->num_rows > 0) {

    while ($row10 = $result10->fetch_assoc()) {

        $conteudo_section_54 = $row10["Conteudo"];
    }
}


$sql_like = "SELECT * FROM curtida WHERE IdReceita = '$i'";
$result_like = mysqli_query($conn, $sql_like);
$count_like = $result_like->num_rows;

if (isset($_SESSION['id_usuario'])) {
    $sql_like_user = "SELECT * FROM curtida WHERE IdReceita = '$i' AND IdUsuario = '$id'";
    $result_like_user = mysqli_query($conn, $sql_like_user);
    $count_like_user = $result_like_user->num_rows;
}


$sql_coment = "SELECT * FROM comentario WHERE IdReceita = '$i'";
$result_coment = mysqli_query($conn, $sql_coment);
$count_coment = $result_coment->num_rows;
?>

<!DOCTYPE html>
<html lang="pt-br" class="bg-dark">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Alexandre Pires da Fonseca">
    <meta name="description" content="TCC 2023">
    <link rel="shortcut icon" href="../fotos/outros/favicon_foodhelp.png" type="image/x-icon" />

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link flex href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <link rel="stylesheet" href="../css/style-botao-flutuante.css">
    <script src="../js/botao-flutuante.js" defer></script>
    <script src="https://cdn.ckeditor.com/4.22.1/full/ckeditor.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="../css/style.css">
    <style>
        .box {
            border-radius: 50px;
            display: flex;
            align-items: center;
            justify-content: space-between;

        }

        input {
            border: none;
            outline: none;
            background: none;
            font-size: 20px;
        }

        li {
            margin-top: 10px;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .button1,
        .button2 {
            height: 40px;
            display: flex;
            background-color: transparent;
            justify-content: space-between;
            align-items: center;
            border-radius: 8px;
            padding: 8px;
            font-size: 1.1rem;
            color: #000;
            border: none;
            cursor: pointer;
            transition: all .25s ease-in-out;
        }

        .label {
            display: flex;
            align-items: center;
            margin-right: 8px;
        }

        .label svg {
            margin-right: 4px;
        }

        .label path {
            fill: #8a8d9b;
            transition: all .25s ease-in-out;
        }

        .number {
            color: #8a8d9b;
        }

        .button1:hover path {
            fill: red;
        }

        button.like .number {
            color: red
        }

        button.like svg {
            animation: transitionLike 1s ease-in;
        }

        button.like path {
            fill: red;
        }

        @keyframes transitionLike {
            0% {
                transform: scale(1);
            }

            50% {
                transform: scale(1.3);
            }

            100% {
                transform: scale(1);
            }
        }

        .button1,
        .button2 {
            display: inline-block;
            /* Ou use inline-flex */
            margin-right: 20px;
            /* Espaçamento entre os botões */
        }

        .comentarios {
            width: 100%;
            height: 300px;
            /* Altura fixa da div */
            overflow: auto;
            /* Adiciona uma barra de rolagem quando o conteúdo excede a altura */
        }

        .user-info {
            display: flex;
            align-items: center;
            /* Alinha verticalmente ao centro */
        }

        .user-info img {
            margin-right: 10px;
            /* Espaço entre a imagem e o texto */
        }
    </style>

    <title>FoodHelp</title>
</head>

<body>

    <header class="conteiner">
        <nav class="navbar navbar-expand-md fixed-top py-4 border-bottom border-dark" style="background-color: <?php echo $cor_cabecalho;  ?>;">
            <div class="container-fluid col-8 justify-content-center">
                <div class=''><a href="alergia_alimentar.php" class="mx-3 item-nav">Alergias Alimentares</a></div>
                <div class='border-black border-start'><a href="receitas.php" class="mx-3 item-nav">Receitas</a></div>
                <div class='border-black border-start'><a href="../" class="mx-3 item-nav">Home</a></div>
                <div class='border-black border-start'><a href="profissionais.php" class="mx-3 item-nav">Profissionais</a></div>

                <?php if (isset($_SESSION['id_usuario'])) { ?>

                    <div class='border-black border-start'><a type="button" data-bs-toggle="modal" data-bs-target="#modal_perfil" class="mx-3 item-nav">Perfil</a></div>

                <?php } else { ?>
                    <div class='border-black border-start'><a href="entrar.php" class="mx-3 item-nav">Entrar</a></div>


                <?php } ?>

                <!--  <div class='border-dark border border-top-0 border-bottom-0'><a href="adm/dashboard/geren_home3.php" class="mx-3 item-nav">ADM</a></div> -->

            </div>
        </nav>
    </header>
    <!-- modal perfil -->
    <div class="modal fade" id="modal_perfil" tabindex="-1" aria-labelledby="modal_perfil" aria-hidden="true">
        <div class="modal-dialog modal-lg">

            <div class="modal-content border border-dark border-2">
                <div class="modal-header border-bottom border-dark" style="background-color: <?php echo $cor_cabecalho; ?>;">
                    <h1 class="modal-title fs-4" id="modal_perfil">Olá, <?php echo $nome_user; ?></h1>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-6 ">
                            <?php
                            if ($nivel_user >= 2) { ?>
                                <img src="../fotos/administradores/<?php if (empty($foto_user)) {
                                                                        echo "user.png";
                                                                    } else {
                                                                        echo $foto_user;
                                                                    } ?>" class="rounded" width="375px" height="300" alt="foto user">
                            <?php } else { ?>
                                <img src="../fotos/usuarios/<?php if (empty($foto_user)) {
                                                                echo "user.png";
                                                            } else {
                                                                echo $foto_user;
                                                            } ?>" class="rounded" width="375px" height="300" alt="foto user">
                            <?php }
                            ?>
                        </div>
                        <div class="col">
                            <h3 class="text-center mb-2 mt-3">Perfil</h3>
                            <label style="top: -10px; left: 0; color: <?php echo $cor_section_3; ?>; font-size: 13px;" class="ms-2 mt-1" for="">Nome</label>
                            <input type="text" required disabled class="form-control border border-top-0 border-end-0 border-start-0 border-dark mb-4" value="<?php echo $nome_user; ?>">
                            <label style="top: -10px; left: 0; color: <?php echo $cor_section_3; ?>; font-size: 13px;" class="ms-2" for="">Email</label>
                            <input type="text" required disabled class="form-control border border-dark border-top-0 border-end-0 border-start-0" value="<?php echo $email_user; ?>">

                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div>
                        <a href="../scripts/logout.php" class="btn  border border-dark bg-warning-subtle">Sair</a>
                        <a type="button" class="btn  border border-dark bg-danger-subtle" data-bs-dismiss="modal">Fechar</a>
                        <button class="btn border border-dark bg-primary-subtle" data-bs-toggle="modal" data-bs-target="#modal_edit">Editar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- modal edit -->
    <div class="modal fade" id="modal_edit" tabindex="-1" aria-labelledby="modal_edit" aria-hidden="true">
        <div class="modal-dialog modal-lg">

            <div class="modal-content border border-dark border-2">
                <div class="modal-header border-bottom border-dark" style="background-color: <?php echo $cor_cabecalho; ?>;">
                    <h1 class="modal-title fs-4" id="modal_edit">Olá, <?php echo $nome_user; ?></h1>
                </div>
                <div class="modal-body">
                    <form action="../scripts/edit_user.php" method="POST" enctype='multipart/form-data'>
                        <div class="row">
                            <div class="col-6 ">
                                <?php
                                if ($nivel_user >= 2) { ?>
                                    <img id='preview' src="../fotos/administradores/<?php if (empty($foto_user)) {
                                                                                        echo "user.png";
                                                                                    } else {
                                                                                        echo $foto_user;
                                                                                    } ?>" class="rounded" width="375px" height="300" alt="foto user">
                                <?php } else { ?>
                                    <img id='preview' src="../fotos/usuarios/<?php if (empty($foto_user)) {
                                                                                    echo "user.png";
                                                                                } else {
                                                                                    echo $foto_user;
                                                                                } ?>" class="rounded" width="375px" height="300" alt="foto user">
                                <?php }
                                ?>
                            </div>
                            <div class="col">
                                <h3 class="text-center mb-3">Perfil</h3>

                                <label style="top: -10px; left: 0; color: <?php echo $cor_section_3; ?>; font-size: 13px;" class="ms-2" for="">Nome</label>
                                <input type="text" required name="nome" class="form-control border border-top-0 border-end-0 border-start-0 border-dark mb-4" value="<?php echo $nome_user; ?>">

                                <label style="top: -10px; left: 0; color: <?php echo $cor_section_3; ?>; font-size: 13px;" class="ms-2" for="">Email</label>
                                <input type="text" required name="email" class="form-control border border-dark border-top-0 border-end-0 border-start-0 mb-3" value="<?php echo $email_user; ?>">

                                <label style="top: -10px; left: 0; color: <?php echo $cor_section_3; ?>; font-size: 13px;" class="ms-2" for="">Foto</label>
                                <input type="file" name="imagem" id="imagem" onchange='previewImagem(event)' class="form-control border border-dark border-top-0 border-end-0 border-start-0" value="<?php echo $email_user; ?>">

                                <input type="hidden" name="edit_id" id="edit_id" value="<?php echo $id; ?>">
                                <input type="hidden" name="a" id="a" value="6">
                                <input type="hidden" name="b" id="b" value="<?php echo $i; ?>">

                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <div>
                        <a type="button" class="btn  border border-dark bg-danger-subtle" data-bs-dismiss="modal">Fechar</a>
                        <button class="btn border border-dark bg-primary-subtle" data-bs-toggle="modal" data-bs-target="#modal_edit">Editar</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <main class="" style="padding-top: 90px;">

        <section class="mx-5 px-5 mb-4 content">
           
            <div class="ms-5 mt-5">
                <div class="row mb-3">
                    <div class="col-4"><img src="../fotos/receitas/<?php echo $foto; ?>" alt="foto receita" class="rounded" style="width: 100%;" height="250"></div>

                    <div class="col">
                        <h1 class="text-center"><?php echo $nome; ?></h1>
                        <p class="mt-4" style="font-size: 20px;"><strong class="text-capitalize">Porções: </strong><?php echo $porcoes; ?> </p>
                        <p class=" my-4 text-capitalize" style="font-size: 20px;"><strong>Tempo de Preparo: </strong><?php echo $tempo; ?> </p>
                        <p class=" text-capitalize" style="font-size: 20px;"><strong>Tipo de Alergia: </strong><?php echo $alergia; ?> </p>
                    </div>
                </div>
                <div class="">
                    <form id="meuFormulario">
                        <input type="hidden" name="idreceita" value="<?php echo $i; ?>">
                        <input type="hidden" name="idusuario" value="<?php echo $id; ?>">

                    </form>
                    <button id="like" <?php if (isset($_SESSION['id_usuario'])) { ?> onclick="enviarCurtida()" <?php } else { ?> onclick="NaoLogado()" <?php } ?> class="button1 
                    <?php
                    if ($count_like_user > 0) {
                        echo 'like';
                    } else {
                    }
                    ?>">
                        <div class="label">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" width="36" height="36" viewBox="0 0 24 24">
                                <path d="M20.205 4.791a5.938 5.938 0 0 0-4.209-1.754A5.906 5.906 0 0 0 12 4.595a5.904 5.904 0 0 0-3.996-1.558 5.942 5.942 0 0 0-4.213 1.758c-2.353 2.363-2.352 6.059.002 8.412L12 21.414l8.207-8.207c2.354-2.353 2.355-6.049-.002-8.416z"></path>
                            </svg>
                            <div class="number" style="font-size: 20px;" id="number_like"><?php echo $count_like; ?></div>
                        </div>
                    </button>


                    <a id="like" class="button2" href="#coment" style="text-decoration: none;">
                        <div class="label">
                            <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 24 24">
                                <path style="fill: #4287f5;" d="M12 2C6.486 2 2 5.589 2 10c0 2.908 1.897 5.516 5 6.934V22l5.34-4.004C17.697 17.852 22 14.32 22 10c0-4.411-4.486-8-10-8zm-2.5 9a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3z"></path>
                            </svg>
                            <div class="number" style="font-size: 20px;" id="number_coment"><?php echo $count_coment; ?></div>

                        </div>
                    </a>

                </div>
                <div class="row">

                    <div class="rounded mt-4 justify-content-center" style="background-color: <?php echo $cor_cabecalho; ?>;">
                        <h3 class="text-center">Ingredientes</h3>
                    </div>
                    <div class=" mt-3 " style="font-size: 20px; text-align: justify; word-spacing: 3px;"><?php echo $ingredientes; ?></div>
                    <div class="rounded mt-5 justify-content-center" style="background-color: <?php echo $cor_cabecalho; ?>;">
                        <h3 class="text-center">Modo de Preparo</h3>
                    </div>
                    <div class=" mt-3 col-8" style="font-size: 19px;"><?php echo $modo_preparo; ?></div>
                </div>

            </div>
            <div id="coment" class="border border-dark" style="border-radius: 15px;">
                <h4 class="text-center bg-dark-subtle border-bottom border-start border-end  border-dark" style="border-radius: 10px;">Comentários</h4>
                <div class="comentarios">

                </div>
                <form id="meuFormulario2">
                    <input type="hidden" name="idusuario" id="idusuario" value="<?php echo $id; ?>">
                    <input type="hidden" name="idreceita" id="idreceita" value="<?php echo $i; ?>">
                    <div class='border-top border-start bg-dark-subtle border-end border-dark py-1 ps-3 w-100 ' style="border-radius: 10px;">
                        <div id="resposta" style="display: none;">
                            <button style="margin-left: 60px; background-color: transparent;" onclick="fechar(event )" class="me-1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">
                                    <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
                                </svg>
                            </button>
                            <input type="text" style=" width: 92px; font-size: 17px;" value="Em resposta: " disabled>
                            <input type="text" style="font-size: 17px;" value="" id="nome_user_resposta" disabled class="w-75">
                            <input type="hidden" name="idcomentario" id="idcomentario" value="">
                        </div>
                        <div>
                            <img 

                            <?php
                            if(isset($_SESSION["id_usuario"])){
                                if($nivel_user > 1){ 
                                  
                                    if(!empty($foto_user)){
                                        echo "src='../fotos/administradores/$foto_user'"; 

                                    }else{
                                        echo "src='../fotos/outros/user.png'"; 
                                    }

                                }else{

                                    if(!empty($foto_user)){
                                        echo "src='../fotos/usuarios/$foto_user'"; 

                                    }else{
                                        echo "src='../fotos/outros/user.png'"; 
                                    }
                                
                               }
                            }else{
                            }
                            ?>
                            src="../fotos/outros/user.png" 
                            
                            
                            class="rounded-circle me-3" width="35px" height="35px" alt="">

                            <input type="text" id="comentario" name="comentario" class="bg-dark-subtle pt-1" style="border-radius: 10px; width: 92%;" placeholder="Adicione seu comentário aqui...">
                </form>
                <button type="button" class="bg-dark-subtle" <?php if (isset($_SESSION['id_usuario'])) { ?> onclick="enviarComentario(event)" <?php } else { ?> onclick="NaoLogado1()" <?php  } ?>>
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-arrow-return-right" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M1.5 1.5A.5.5 0 0 0 1 2v4.8a2.5 2.5 0 0 0 2.5 2.5h9.793l-3.347 3.346a.5.5 0 0 0 .708.708l4.2-4.2a.5.5 0 0 0 0-.708l-4-4a.5.5 0 0 0-.708.708L13.293 8.3H3.5A1.5 1.5 0 0 1 2 6.8V2a.5.5 0 0 0-.5-.5z" />
                    </svg>
                </button>
            </div>

            </div>
            </div>
        </section>

        <footer class="bg-dark">
            <div class="pt-4">
                <h1 class="text-contato text-center" style="color: <?php echo $cor_cabecalho;  ?>;">Contato</h1>
            </div>
            <div class="mt-4 row ms-4" style="font-family: Inder;">
                <div class="col-3"></div>
                <div class="col-3">
                    <h5><span class="text-light" style="letter-spacing: 2px;">GMAIL: </span><span style="color: <?php echo $cor_cabecalho;  ?>;"><?php echo $conteudo_section_51; ?></span></h5>
                </div>
                <div class="col-4">
                    <h5><span class="text-light" style="letter-spacing: 2px;">LOCALIZAÇÃO: </span><span style="color: <?php echo $cor_cabecalho;  ?>;"><?php echo $conteudo_section_52; ?></span></h5>
                </div>
                <div class="col-4"></div>
            </div>
            <div class="my-5 row  ms-4" style="font-family: Inder;">
                <div class="col-3"></div>
                <div class="col-3">
                    <h5><span class="text-light" style="letter-spacing: 2px;">NÚMERO: </span><span style="color: <?php echo $cor_cabecalho;  ?>;"><?php echo $conteudo_section_54; ?></span></h5>
                </div>
                <div class="col-4">
                    <h5><span class="text-light" style="letter-spacing: 2px;">ATENDIMENTO: </span><span style="color: <?php echo $cor_cabecalho;  ?>;"><?php echo $conteudo_section_53; ?></span></h5>
                </div>
                <div class="col-4"></div>
            </div>
            <h6 class="text-secondary text-center">@2023</h6>
            <input type="hidden" id="resultado">
        </footer>
        <div>

            <script>
                //ENVIAR COMENTARIO
                function enviarComentario(event) {

                    // Seleciona o formulário pelo ID
                    var formulario = document.getElementById('meuFormulario2');

                    // Cria um objeto FormData para coletar os dados do formulário
                    var formData = new FormData(formulario);

                    // Cria uma instância de XMLHttpRequest
                    var xhr = new XMLHttpRequest();

                    // Especifica o método HTTP (POST) e o URL do arquivo PHP que receberá os dados
                    xhr.open('POST', '../scripts/comentar.php', true);

                    // Configura o evento de conclusão da solicitação
                    xhr.onload = function() {
                        if (xhr.status === 200) {
                            // Após o envio bem-sucedido, atualize os comentários sem recarregar a página
                            atualizarComentarios();

                            // Limpe o campo de comentário
                            document.getElementById('comentario').value = "";
                        } else {
                            // A solicitação falhou
                            document.querySelector('.comentarios').innerHTML = 'Erro ao enviar o formulário.';
                        }
                    };

                    // Envia os dados do formulário para o arquivo PHP
                    xhr.send(formData);

                    // Impede o comportamento padrão de envio de formulário (recarregar a página)
                    event.preventDefault();
                }
            </script>


            <script>
                // ATUALIZAR COMENTARIO
                $(document).ready(function() {

                    // Use json_encode para inserir o valor de $_GET["i"] no JavaScript de forma segura
                    var i = <?php echo json_encode($_GET["i"]); ?>;

                    // Função para atualizar a lista de comentários
                    function atualizarComentarios() {

                        $.ajax({
                            url: '../scripts/list_comentario.php', // Substitua pelo caminho do seu arquivo PHP
                            method: 'POST',
                            dataType: 'json',
                            data: {
                                i: i
                            }, // Adicione "i" aos dados da solicitação    
                            success: function(data) {
                                // Limpe a lista de comentários
                                $('.comentarios').empty();

                                // Adicione os comentários à lista
                                data.comentarios.forEach(function(comentario) {
                                    var comentarioHtml = `
                                            <div class='ms-3 mb-2 '>
                                            <div class="user-info">
                                            <img src="${comentario.Foto_user}" class="rounded-circle" width="35px" height="35px" alt="">
                                            <p class="mt-1"><strong style="font-size:14px;">${comentario.Nome_user}</strong><span class="text-body-tertiary ms-2" style="font-size:12px;" >Data de Postagem: ${comentario.Data_Postagem}</span></p>
                                            </div>
                                                <p class="ms-5">${comentario.Conteudo}</p>

                                            </div>
                                        `;
                                    $('.comentarios').append(comentarioHtml);
                                });
                            },
                            error: function() {
                                console.error('Erro ao buscar comentários.');
                            }
                        });
                    }

                    // Chame a função para atualizar os comentários ao carregar a página
                    atualizarComentarios();

                    // Defina um intervalo para atualizar os comentários a cada 5 segundos (5000 ms)
                    setInterval(atualizarComentarios, 3000);
                });
            </script>


            <script>
                // CURTIR

                const button = document.querySelector('#like');
                const number = document.querySelector('#number_like');

                button.addEventListener('click', () => {
                    if (button.classList.contains('like')) {
                        // Se o botão já foi curtido, remova a classe 'like' e diminua o valor.
                        button.classList.remove('like');
                        let likeValue = Number(number.textContent);
                        let newValue = likeValue - 1;
                        number.innerHTML = newValue;
                    } else {
                        // Se o botão não foi curtido, adicione a classe 'like' e incremente o valor.
                        button.classList.add('like');
                        let likeValue = Number(number.textContent);
                        let newValue = likeValue + 1;
                        number.innerHTML = newValue;
                    }
                });
            </script>

            <script>
                // ENVIAR CURTIR
                function enviarCurtida() {
                    // Seleciona o formulário pelo ID
                    var formulario = document.getElementById('meuFormulario');

                    // Cria um objeto FormData para coletar os dados do formulário
                    var formData = new FormData(formulario);

                    // Cria uma instância de XMLHttpRequest
                    var xhr = new XMLHttpRequest();

                    // Especifica o método HTTP (POST) e o URL do arquivo PHP que receberá os dados
                    xhr.open('POST', '../scripts/curtir.php', true);

                    // Configura o evento de conclusão da solicitação
                    xhr.onload = function() {
                        if (xhr.status === 200) {
                            // A solicitação foi bem-sucedida, exibe a resposta no elemento "resultado"
                            document.getElementById('resultado').innerHTML = xhr.responseText;
                        } else {
                            // A solicitação falhou
                            document.getElementById('resultado').innerHTML = 'Erro ao enviar o formulário.';
                        }
                    };

                    // Envia os dados do formulário para o arquivo PHP
                    xhr.send(formData);
                }
            </script>


            <?php if (isset($_SESSION['id_usuario']) && $nivel_user >= 2) { ?>
                <div class="fab">
                    <button class="main">
                    </button>
                    <ul>

                        <li>
                            <label for="opcao1">Área Administrativa</label>
                            <button id="opcao1">
                                <i class='bx bxs-lock-alt'></i>
                            </button>
                        </li>
                        <li>
                            <label for="opcao2">Editar Receita</label>
                            <button id="opcao2">
                                <i class="bi bi-card-text"></i>
                            </button>
                        </li>
                    </ul>
                </div>

                <script>
                    var botao1 = document.getElementById("opcao1");
                    var botao2 = document.getElementById("opcao2");

                    var urlParams = new URLSearchParams(window.location.search);

                    var id = urlParams.get('i');

                    botao1.addEventListener("click", function() {
                        window.location.href = "../adm/";
                    });

                    botao2.addEventListener("click", function() {
                        window.location.href = `../adm/dashboard/form_edit_receita.php?id=${id}`;
                    });
                </script>


            <?php } ?>
    </main>
    <?php
    if (isset($_GET['p']) && !empty($_GET['p'])) {

        $p = $_GET['p'];

        header("Location: profissionais.php?p=$p");
        exit();
    } else {
    }

    ?>
    <?php if (!isset($_GET['e'])) {
    } else if ($_GET['e'] == md5(1)) {

        $num = $_GET['i'];
    ?>
        <script>
            function AlertCaminho(num) {
                Swal.fire({
                    title: "Sucesso!",
                    text: "Perfil editado com sucesso",
                    icon: "success",

                    allowOutsideClick: true,
                    allowEscapeKey: true,

                    confirmButtonColor: "#3085d6",
                    confirmButtonText: "OK"
                }).then((result) => {

                    window.location.href = `perfil_receita.php?i=${num}`;

                })
            };
            AlertCaminho("<?php echo $num; ?>");
        </script>
    <?php } ?>
    </div>
    <script>
        function NaoLogado() {
            Swal.fire({
                title: "Atenção!",
                text: "Você precisa estar logado para curtir",
                icon: "warning",

                allowOutsideClick: true,
                allowEscapeKey: true,

                confirmButtonColor: "#3085d6",
                confirmButtonText: "OK"
            }).then((result) => {

                location.reload();

            });
        }
    </script>
    <script>
        function NaoLogado1() {
            Swal.fire({
                title: "Atenção!",
                text: "Você precisa estar logado para comentar",
                icon: "warning",

                allowOutsideClick: true,
                allowEscapeKey: true,

                confirmButtonColor: "#3085d6",
                confirmButtonText: "OK"
            }).then((result) => {

                window.location.href = `perfil_receita.php?i=${num}`;


            });
        }
    </script>
</body>

</html>