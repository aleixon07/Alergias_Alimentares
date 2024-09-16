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
                    <h1 class="modal-title fs-4" id="modal_perfil">Olá, <?php echo $nome; ?></h1>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-6 ">
                            <?php
                            if ($nivel >= 2) { ?>
                                <img src="../fotos/administradores/<?php if (empty($foto)) {
                                                                        echo "user.png";
                                                                    } else {
                                                                        echo $foto;
                                                                    } ?>" class="rounded" width="375px" height="300" alt="foto user">
                            <?php } else { ?>
                                <img src="../fotos/usuarios/<?php if (empty($foto)) {
                                                                echo "user.png";
                                                            } else {
                                                                echo $foto;
                                                            } ?>" class="rounded" width="375px" height="300" alt="foto user">
                            <?php }
                            ?>
                        </div>
                        <div class="col">
                            <h3 class="text-center mb-2 mt-3">Perfil</h3>
                            <label style="top: -10px; left: 0; color: <?php echo $cor_section_3; ?>; font-size: 13px;" class="ms-2 mt-1" for="">Nome</label>
                            <input type="text" required disabled class="form-control border border-top-0 border-end-0 border-start-0 border-dark mb-4" value="<?php echo $nome; ?>">
                            <label style="top: -10px; left: 0; color: <?php echo $cor_section_3; ?>; font-size: 13px;" class="ms-2" for="">Email</label>
                            <input type="text" required disabled class="form-control border border-dark border-top-0 border-end-0 border-start-0" value="<?php echo $email; ?>">

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
                    <h1 class="modal-title fs-4" id="modal_edit">Olá, <?php echo $nome; ?></h1>
                </div>
                <div class="modal-body">
                    <form action="../scripts/edit_user.php" method="POST" enctype='multipart/form-data'>
                        <div class="row">
                            <div class="col-6 ">
                                <?php
                                if ($nivel >= 2) { ?>
                                    <img id='preview' src="../fotos/administradores/<?php if (empty($foto)) {
                                                                                        echo "user.png";
                                                                                    } else {
                                                                                        echo $foto;
                                                                                    } ?>" class="rounded" width="375px" height="300" alt="foto user">
                                <?php } else { ?>
                                    <img id='preview' src="../fotos/usuarios/<?php if (empty($foto)) {
                                                                                    echo "user.png";
                                                                                } else {
                                                                                    echo $foto;
                                                                                } ?>" class="rounded" width="375px" height="300" alt="foto user">
                                <?php }
                                ?>
                            </div>
                            <div class="col">
                                <h3 class="text-center mb-3">Perfil</h3>
                                <label style="top: -10px; left: 0; color: <?php echo $cor_section_3; ?>; font-size: 13px;" class="ms-2" for="">Nome</label>
                                <input type="text" required name="nome" class="form-control border border-top-0 border-end-0 border-start-0 border-dark mb-4" value="<?php echo $nome; ?>">
                                <label style="top: -10px; left: 0; color: <?php echo $cor_section_3; ?>; font-size: 13px;" class="ms-2" for="">Email</label>
                                <input type="text" required name="email" class="form-control border border-dark border-top-0 border-end-0 border-start-0 mb-3" value="<?php echo $email; ?>">
                                <label style="top: -10px; left: 0; color: <?php echo $cor_section_3; ?>; font-size: 13px;" class="ms-2" for="">Foto</label>
                                <input type="file" name="imagem" id="imagem" onchange='previewImagem(event)' class="form-control border border-dark border-top-0 border-end-0 border-start-0" value="<?php echo $email; ?>">
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
            <div class="my-5">
                <form action="" class="box bg-dark-subtle py-1 ps-1 pe-5 border-dark border" style="width: 285px; height: auto;">
                    <input type="text" placeholder="Pesquisa..." name="p" class="ms-3">
                    <button type="submit" class="bg-dark-subtle"><i class="bi bi-search"></i></button>
                </form>
            </div>
            <div class="border border-dark border-opacity-50 shadow-lg" style="border-radius: 20px;">
                <h3 class="text-center mt-3" style="color: <?php echo $cor_cabecalho;  ?>;">Envie Sua Receita
                </h3>
                <form action="../scripts/cad-receita.php" method="POST" enctype="multipart/form-data">
                    <div class="row mx-3">
                        <div class="col-8">
                            <div class="my-4">
                                <label for="" class="ms-3">Nome da Receita</label>
                                <input required type="text" name="nome" class="border-bottom border-dark rounded w-100 ps-3" style="background-color: #ebebed;">
                            </div>
                            <div class="my-4">
                                <label for="" class="ms-3">Tipo de Alergia</label>
                                <input required type="text" name="alergia" class="border-bottom border-dark rounded w-100 ps-3" style="background-color: #ebebed;">
                            </div>
                            <div class="my-4">
                                <label for="" class="ms-3">Tempo de Preparo</label>
                                <input required type='time' name='tempo' id='tempo' class="border-bottom border-dark rounded w-100 ps-3" style="background-color: #ebebed;">
                            </div>
                            <div class="my-4">
                                <label for="" class="ms-3">Porções</label>
                                <input required type='text' name='porcoes' id='porcoes' class="border-bottom border-dark rounded w-100 ps-3" style="background-color: #ebebed;">
                            </div>


                        </div>
                        <div class="col">
                            <img src='../fotos/outros/receita.png' class="bg-dark-subtle border border-dark" alt="Foto de fundo" style="border-radius: 25px; width: 330px; height:300px;" id="previe">
                            <input accept="image/*" type="file" class="mt-3 form-control border border-dark" required name="imagem" id="imagem" onchange="previewImage(event)">
                        </div>
                    </div>
                    <div class="mx-4">
                        <label for="" class="ms-3">Ingredientes</label>
                        <textarea required name="ingrediente" id="ingredientes"></textarea>
                        <script>
                            CKEDITOR.replace("ingredientes");
                        </script>

                    </div>
                    <div class="mx-4 mt-3">
                        <label for="" class="ms-3">Modo de Preparo</label>
                        <textarea required name="modo_preparo" id="modo_preparo"></textarea>
                        <script>
                            CKEDITOR.replace("modo_preparo");
                        </script>

                    </div>
                    <div class="mx-3 mb-3 mt-3">

                        <input type="hidden" name="id_usuario" id="id_usuario" value="<?php echo $id; ?>">
                        <input type="hidden" name="a" value="1">

                        <button class="btn w-100 text-light" style="background-color: <?php echo $cor_cabecalho;  ?>;">
                            Enviar
                        </button>
                    </div>

                </form>
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
        <div>


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
                            <label for="opcao2">Receitas</label>
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
                        window.location.href = `../adm/index.php?e=e4da3b7fbbce2345d7772b0674a318d5`;
                    });
                </script>


            <?php } ?>
    </main>

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

                    window.location.href = `envia_inscr.php?i=${num}`;

                })
            };
            AlertCaminho("<?php echo $num; ?>");
        </script>
    <?php } ?>
    </div>
</body>
<script>
    function previewImage(event) {
        var input = event.target;
        var imagem = input.files[0];
        var imgPreview = document.getElementById("previe");

        var reader = new FileReader();
        reader.onload = function() {
            imgPreview.src = reader.result;
        };
        reader.readAsDataURL(imagem);
    }
</script>

</html>