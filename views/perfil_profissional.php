<?php
session_start();
require_once "../scripts/connection.php";

if (!isset($_GET["i"]) && empty($_GET["i"])) {
    header("Location: profissionais.php");
    exit();
} else {

    $i = $_GET["i"];

    $sql_profissional = "SELECT * FROM profissionais WHERE IdProfissional = $i AND Oculta = 1";
    $result_profissional = $conn->query($sql_profissional);

    if ($result_profissional->num_rows > 0) {

        while ($row_profissional = $result_profissional->fetch_assoc()) {

            $nome = $row_profissional["Nome"];
            $profissao = $row_profissional["Profissao"];
            $local_atendimento = $row_profissional["Local_Atendimento"];
            $horario_atendimento = $row_profissional["Horario_Atendimento"];
            $email = $row_profissional["Email"];
            $telefone = $row_profissional["Telefone"];
            $biografia = $row_profissional["Biografia"];
            $precos = $row_profissional["Precos"];
            $foto = $row_profissional["Foto"];
        }
    } else {
        header("Location: profissionais.php");
        exit();
    }
}

$sql4 = "SELECT * FROM home WHERE Section = 0";
$result4 = $conn->query($sql4);

if ($result4->num_rows > 0) {

    // Recorrer los resultados y mostrar los datos
    while ($row4 = $result4->fetch_assoc()) {

        $cor_cabecalho = $row4["Cor"];
    }
}

$sql7 = "SELECT * FROM home WHERE Section = 51";
$result7 = $conn->query($sql7);

if ($result7->num_rows > 0) {

    // Recorrer los resultados y mostrar los datos
    while ($row7 = $result7->fetch_assoc()) {

        $conteudo_section_51 = $row7["Conteudo"];
    }
}

$sql8 = "SELECT * FROM home WHERE Section = 52";
$result8 = $conn->query($sql8);

if ($result8->num_rows > 0) {

    // Recorrer los resultados y mostrar los datos
    while ($row8 = $result8->fetch_assoc()) {

        $conteudo_section_52 = $row8["Conteudo"];
    }
}

$sql9 = "SELECT * FROM home WHERE Section = 53";
$result9 = $conn->query($sql9);

if ($result9->num_rows > 0) {

    // Recorrer los resultados y mostrar los datos
    while ($row9 = $result9->fetch_assoc()) {

        $conteudo_section_53 = $row9["Conteudo"];
    }
}

$sql10 = "SELECT * FROM home WHERE Section = 54";
$result10  = $conn->query($sql10);

if ($result10->num_rows > 0) {

    // Recorrer los resultados y mostrar los datos
    while ($row10 = $result10->fetch_assoc()) {

        $conteudo_section_54 = $row10["Conteudo"];
    }
}

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

        $sql_avaliacao = "SELECT * FROM avaliacao WHERE IdUsuario = '$id' AND IdProfissional = '$i'";
        $result_avaliacao  = $conn->query($sql_avaliacao);

        if ($result_avaliacao->num_rows > 0) {

            // Recorrer los resultados y mostrar los datos
            while ($row_avaliacao = $result_avaliacao->fetch_assoc()) {

                $num_star = $row_avaliacao["Num_Star"];
            }
        }
    }
}

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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

    <link rel="stylesheet" href="../css/style-botao-flutuante.css">
    <script src="../js/botao-flutuante.js" defer></script>
    <script src="https://cdn.ckeditor.com/4.22.1/full/ckeditor.js"></script>
    <link rel="stylesheet" href="../css/style.css">

    <style>
        .box {
            border-radius: 50px;
            display: flex;
            align-items: center;
        }

        input {
            border: none;
            outline: none;
            background: none;
            font-size: 20px;
        }

        .rating {
            transform: rotateY(180deg);
            display: flex;
            align-items: start;
        }

        .rating input {
            display: none;
        }

        .rating label {
            display: block;
            cursor: pointer;
            width: 50px;
        }

        .rating label:before {
            content: '\f005';
            font-family: fontAwesome;
            position: relative;
            display: block;
            font-size: 50px;
            color: #8a9094;
        }

        .rating label:after {
            content: '\f005';
            font-family: fontAwesome;
            position: absolute;
            display: block;
            font-size: 50px;
            color: #ffff00;
            top: 0;
            opacity: 0;
            transition: .5;
            text-shadow: 0 4px 5px rgba(0, 0, 0, .5);
        }

        .rating label:hover:after,
        .rating label:hover~label:after,
        .rating input:checked~label:after {
            opacity: 1;
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
                                <input type="file" name="imagem" id="imagem" onchange='previewImagem(event)' class="form-control border border-dark border-top-0 border-end-0 border-start-0">
                                <input type="hidden" name="edit_id" id="edit_id" value="<?php echo $id; ?>">
                                <input type="hidden" name="a" id="a" value="5">
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

        <section class="mx-5 px-5 mb-4">
          
            <div class="ms-5 mt-5 row">
                <div class="col-4"><img src="../fotos/profissionais/<?php echo $foto; ?>" alt="foto profissional" class="rounded" width="350px" height="325px"></div>
                <div class="col-8">
                    <h1 class="text-center"><?php echo $nome; ?></h1>

                    <p class="mt-4" style="font-size: 20px;"><strong class="text-capitalize">Email: </strong><?php echo $email; ?> </p>
                    <p class=" text-capitalize" style="font-size: 20px;"><strong>Telefone: </strong><?php echo $telefone; ?> </p>
                    <p class=" text-capitalize" style="font-size: 20px;"><strong>Profissão: </strong><?php echo $profissao; ?> </p>
                    <p class="" style="font-size: 20px;"><strong>Horários de Atendimento: </strong><span class="text-capitalize"><?php echo $horario_atendimento; ?></span> </p>
                    <p class="" style="font-size: 20px;"><strong>Local de Atendimento: </strong><span class="text-capitalize"><?php echo $local_atendimento; ?></span> </p>
                    <p class="" style="font-size: 20px;"><strong>Preços: </strong><span class="text-capitalize"><?php echo $precos; ?></span> </p>

                </div>
                <div class="box">
                    <?php if (!isset($_SESSION["id_usuario"])) { ?>
                        <div class="rating">
                            <input type="radio" name="star" id="star1" <?php if (!empty($num_star) && isset($num_star)) {
                                                                            if ($num_star == 6) {
                                                                                echo "checked";
                                                                            } else {
                                                                            }
                                                                        } ?> onclick="AtivAlertNaoLogado()"><label for="star1"></label>
                            <input type="radio" name="star" id="star2" <?php if (!empty($num_star) && isset($num_star)) {
                                                                            if ($num_star == 5) {
                                                                                echo "checked";
                                                                            } else {
                                                                            }
                                                                        } ?> onclick="AtivAlertNaoLogado()"><label for="star2"></label>
                            <input type="radio" name="star" id="star3" <?php if (!empty($num_star) && isset($num_star)) {
                                                                            if ($num_star == 4) {
                                                                                echo "checked";
                                                                            } else {
                                                                            }
                                                                        } ?> onclick="AtivAlertNaoLogado()"><label for="star3"></label>
                            <input type="radio" name="star" id="star4" <?php if (!empty($num_star) && isset($num_star)) {
                                                                            if ($num_star == 3) {
                                                                                echo "checked";
                                                                            } else {
                                                                            }
                                                                        } ?> onclick="AtivAlertNaoLogado()"><label for="star4"></label>
                            <input type="radio" name="star" id="star5" <?php if (!empty($num_star) && isset($num_star)) {
                                                                            if ($num_star == 2) {
                                                                                echo "checked";
                                                                            } else {
                                                                            }
                                                                        } ?> onclick="AtivAlertNaoLogado()"><label for="star5"></label>
                            <input type="radio" name="star" id="star6" <?php if (!empty($num_star) && isset($num_star)) {
                                                                            if ($num_star == 1) {
                                                                                echo "checked";
                                                                            } else {
                                                                            }
                                                                        } ?> onclick="AtivAlertNaoLogado()"><label for="star6"></label>
                        </div>
                    <?php } else { ?>

                        <div class="rating">
                            <input type="radio" name="star" id="star1" <?php if (!empty($num_star) && isset($num_star)) {
                                                                            if ($num_star == 6) {
                                                                                echo "checked";
                                                                            } else {
                                                                            }
                                                                        } ?> onchange="EnviarAvaliacao(6)"><label for="star1"></label>
                            <input type="radio" name="star" id="star2" <?php if (!empty($num_star) && isset($num_star)) {
                                                                            if ($num_star == 5) {
                                                                                echo "checked";
                                                                            } else {
                                                                            }
                                                                        } ?> onchange="EnviarAvaliacao(5)"><label for="star2"></label>
                            <input type="radio" name="star" id="star3" <?php if (!empty($num_star) && isset($num_star)) {
                                                                            if ($num_star == 4) {
                                                                                echo "checked";
                                                                            } else {
                                                                            }
                                                                        } ?> onchange="EnviarAvaliacao(4)"><label for="star3"></label>
                            <input type="radio" name="star" id="star4" <?php if (!empty($num_star) && isset($num_star)) {
                                                                            if ($num_star == 3) {
                                                                                echo "checked";
                                                                            } else {
                                                                            }
                                                                        } ?> onchange="EnviarAvaliacao(3)"><label for="star4"></label>
                            <input type="radio" name="star" id="star5" <?php if (!empty($num_star) && isset($num_star)) {
                                                                            if ($num_star == 2) {
                                                                                echo "checked";
                                                                            } else {
                                                                            }
                                                                        } ?> onchange="EnviarAvaliacao(2)"><label for="star5"></label>
                            <input type="radio" name="star" id="star6" <?php if (!empty($num_star) && isset($num_star)) {
                                                                            if ($num_star == 1) {
                                                                                echo "checked";
                                                                            } else {
                                                                            }
                                                                        } ?> onchange="EnviarAvaliacao(1)"><label for="star6"></label>
                        </div>

                    <?php   } ?>

                    <div>
                        <h2 class="pt-2 ms-4" style="color: #c7c706;" id="num_avaliacao_geral"></h2>
                    </div>
                </div>
                <div class="px-5 mt-2 mb-3" style="font-size: 20px; text-align: justify; word-spacing: 3px;"><?php echo $biografia; ?></div>


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
        </footer>
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
                        <label for="opcao2">Editar Perfil</label>
                        <button id="opcao2">
                            <i class="bi bi-person-fill"></i>
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
                    window.location.href = `../adm/dashboard/form_edit_prof.php?id=${id}`;
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

                    window.location.href = `perfil_profissional.php?i=${num}`;

                })
            };
            AlertCaminho("<?php echo $num; ?>");
        </script>
    <?php } ?>
</body>

<script>
    function AtivAlertNaoLogado(){
        Swal.fire({
                title: "Atenção!",
                text: "Você precisa estar logado para avaliar",
                icon: "warning",

                allowOutsideClick: true,
                allowEscapeKey: true,

                confirmButtonColor: "#3085d6",
                confirmButtonText: "OK"
            }).then((result) => {

                location.reload();

            });    }
</script>
<script>
    function atualizarAvaliacaoProfissional(id_profissional) {
        // Crie um objeto FormData para enviar os dados
        var formData = new FormData();
        formData.append('id_profissional', id_profissional);

        // Crie uma instância do objeto XMLHttpRequest
        var xhr = new XMLHttpRequest();

        // Configurar a solicitação AJAX
        xhr.open('POST', '../scripts/num_avaliacao.php', true);

        // Definir a função de callback quando a solicitação for concluída
        xhr.onload = function() {
            if (xhr.status === 200) {
                // Atualize o elemento com o resultado da solicitação
                var resultado = xhr.responseText;
                document.getElementById('num_avaliacao_geral').textContent = resultado;
            } else {
                // Lidar com erros, se houver algum
                console.error('Erro na requisição AJAX');
            }
        };

        // Enviar a solicitação AJAX com os dados
        xhr.send(formData);
    }

    function inicializarAvaliacao() {
        var idProfissional = <?php echo $i; ?>; // Substitua com o ID do profissional desejado
        atualizarAvaliacaoProfissional(idProfissional);

        // Chame a função a cada 5 segundos
        setInterval(function() {
            atualizarAvaliacaoProfissional(idProfissional);
        }, 5000); // 5000 milissegundos = 5 segundos
    }

    // Chame a função inicialmente
    inicializarAvaliacao();
</script>
<script>
    function EnviarAvaliacao(num_stars) {
        var id_user = <?php echo $id; ?>;
        var id_prof = <?php echo $i; ?>;
        var num_star = num_stars;

        // Verificar se o input já está selecionado
        var input = document.getElementById('star' + num_stars);
        if (input.checked) {
            input.checked = false; // Desmarcar o input
            return; // Sair da função sem enviar a avaliação
        }

        // Criar um objeto FormData para enviar os dados
        var formData = new FormData();
        formData.append('id_user', id_user);
        formData.append('id_prof', id_prof);
        formData.append('num_star', num_star);

        // Criar uma instância do objeto XMLHttpRequest
        var xhr = new XMLHttpRequest();

        // Configurar a solicitação AJAX
        xhr.open('POST', '../scripts/avaliar.php', true);

        // Definir a função de callback quando a solicitação for concluída
        xhr.onload = function() {
            if (xhr.status === 200) {
                // Aqui você pode lidar com a resposta do servidor, se necessário
                console.log(xhr.responseText);
            } else {
                // Lidar com erros, se houver algum
                console.error('Erro na requisição AJAX');
            }
        };

        // Enviar a solicitação AJAX com os dados
        xhr.send(formData);
    }
</script>



</html>