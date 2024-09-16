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
            $nome = $row["Nome"];
            $email = $row["Email"];
            $foto = $row["Foto"];
            $nivel = $row["Nivel"];
        }
    }
}
$sql4 = "SELECT * FROM home WHERE section = 0";
$result4 = $conn->query($sql4);

if ($result4->num_rows > 0) {

    // Recorrer los resultados y mostrar los datos
    while ($row4 = $result4->fetch_assoc()) {

        $cor_cabecalho = $row4["Cor"];
    }
}

$sql7 = "SELECT * FROM home WHERE section = 51";
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

$sql9 = "SELECT * FROM home WHERE section = 53";
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <link rel="stylesheet" href="../css/style-botao-flutuante.css">
    <script src="../js/botao-flutuante.js" defer></script>
    <script src="https://cdn.ckeditor.com/4.22.1/full/ckeditor.js"></script>
    <link rel="stylesheet" href="../css/style.css">
    <title>FoodHelp</title>
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
    </style>
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


            </div>
        </nav>
    </header>
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
                                <input type="hidden" name="a" id="a" value="4">

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
    <main class="" style="margin-top: 70px;">

        <section class="text-center title-adm2 bg-secondary-subtle border border-1 border-dark">
            <h1 class="my-4">Painel de Receitas</h1>
            <p class="title-adm2 px-5">Nesta seção, há uma lista de receitas para alergias alimentares. Aqui você pode acessar informações relevantes, como ingredientes e modos de preparo.</p>
        </section>

        <section class="mx-5 px-5">

            <div class="my-5">
                <form action="" class="box bg-dark-subtle py-1 ps-1 pe-5 border-dark border" style="width: 285px; height: auto;">
                    <input type="text" placeholder="Pesquisa..." name="p" class="ms-3">
                    <button type="submit" class="bg-dark-subtle"><i class="bi bi-search"></i></button>
                    <select class="form-select ms-4 bg-dark-subtle border border-dark" name='t' aria-label="">
                        <option value="0" selected>Escolha...</option>
                        <option value="1">5 min</option>
                        <option value="2">15 min</option>
                        <option value="3">30 min</option>
                        <option value="4">60 min</option>
                        <option value="5">+ 60 min</option>
                    </select>
                </form>
                <?php if (isset($_SESSION['id_usuario'])) { ?>
                    <div class="text-end"><a href="envie_receita.php" class="text-dark px-2 py-1 rounded border border-dark" style="text-decoration: none; font-size: 18px; background-color: <?php echo $cor_cabecalho; ?>; letter-spacing: 2px;">Envie sua Receita + </a></div>
                <?php
                } else {
                ?>
                    <div class="text-end"><button onclick="NaoLogado()" class="text-dark px-2 py-1 rounded border border-dark" style="text-decoration: none; font-size: 18px; background-color: <?php echo $cor_cabecalho; ?>; letter-spacing: 2px;">Envie sua Receita + </button></div>
                <?php
                }
                ?>

            </div>
            <?php
            if (isset($_GET['p']) && isset($_GET['t'])) {

                if (empty($_GET['p'])) {
                    $p = '';
                } else {
                    $p = $_GET['p'];
                }


                $x = $_GET['t'];



                if ($x == 0) {
                    $t = '00:00:00';
                    $sql_receita = "SELECT * FROM receitas WHERE Oculta = 1 AND LOWER(Nome) LIKE LOWER('%$p%') AND Tempo >= '00:00:00'";
                    $result_receita = $conn->query($sql_receita);

                    if ($result_receita->num_rows > 0) {
                        $count = $result_receita->num_rows;

                        echo "<h3>Resultados encontrados: <span style='color: $cor_cabecalho;'>$count</span></h3>";
                        while ($row_receita = $result_receita->fetch_assoc()) { ?>

                            <div class="row mb-5 mt-5">
                                <div class="col-3 ps-5">
                                    <img src="../fotos/receitas/<?php echo $row_receita['Foto']; ?>" alt="Foto de profissional" width="250" height="250" class="rounded shadow-lg">
                                </div>
                                <div class="col-6 ps-5 mt-3" style="font-size: 18px;">
                                    <p class="text-capitalize"><strong>Nome: </strong><?php echo $row_receita['Nome']; ?> </p>
                                    <p class="text-capitalize"><strong>Porções: </strong><?php echo $row_receita['Porcoes']; ?> </p>
                                    <p class="text-capitalize"><strong>Tempo de Preparo: </strong><?php echo $row_receita['Tempo']; ?> </p>
                                    <p class="text-capitalize"><strong>Tipo de Alergia: </strong><?php echo $row_receita['Tipo_Alergia']; ?> </p>
                                    <a href="perfil_receita.php?i=<?php echo $row_receita['IdReceita']; ?>" class="text-dark rounded p-2 ms-5 border-dark-emphasis border" style="text-decoration: none; background-color:<?php echo $cor_cabecalho; ?>;">Ver Receita</a>
                                </div>
                            </div>
                        <?php }
                    } else {
                        echo "<h1 class='text-center my-5' style='color: $cor_cabecalho;' >Não foram encontrado resultados</h1>";
                    }
                } else if ($x == 1) {
                    $t = '00:05:00';
                    $sql_receita = "SELECT * FROM receitas WHERE Oculta = 1 AND LOWER(Nome) LIKE LOWER('%$p%') AND Tempo <= '00:05:00' ORDER BY receitas.Tempo DESC";
                    $result_receita = $conn->query($sql_receita);

                    if ($result_receita->num_rows > 0) {
                        $count = $result_receita->num_rows;

                        echo "<h3>Resultados encontrados: <span style='color: $cor_cabecalho;'>$count</span></h3>";
                        while ($row_receita = $result_receita->fetch_assoc()) {

                        ?>

                            <div class="row mb-5 mt-5">
                                <div class="col-3 ps-5">
                                    <img src="../fotos/receitas/<?php echo $row_receita['Foto']; ?>" alt="Foto de profissional" width="250" height="250" class="rounded shadow-lg">
                                </div>
                                <div class="col-6 ps-5 mt-3" style="font-size: 18px;">
                                    <p class="text-capitalize"><strong>Nome: </strong><?php echo $row_receita['Nome']; ?> </p>
                                    <p class="text-capitalize"><strong>Porções: </strong><?php echo $row_receita['Porcoes']; ?> </p>
                                    <p class="text-capitalize"><strong>Tempo de Preparo: </strong><?php echo $row_receita['Tempo']; ?> </p>
                                    <p class="text-capitalize"><strong>Tipo de Alergia: </strong><?php echo $row_receita['Tipo_Alergia']; ?> </p>
                                    <a href="perfil_receita.php?i=<?php echo $row_receita['IdReceita']; ?>" class="text-dark rounded p-2 ms-5 border-dark-emphasis border" style="text-decoration: none; background-color:<?php echo $cor_cabecalho; ?>;">Ver Receita</a>
                                </div>
                            </div>
                        <?php }
                    }
                } else if ($x == 2) {
                    $t = "00:15:00";
                    $sql_receita = "SELECT * FROM receitas WHERE Oculta = 1 AND LOWER(Nome) LIKE LOWER('%$p%') AND Tempo <= '00:15:00' ORDER BY receitas.Tempo DESC";
                    $result_receita = $conn->query($sql_receita);

                    if ($result_receita->num_rows > 0) {
                        $count = $result_receita->num_rows;

                        echo "<h3>Resultados encontrados: <span style='color: $cor_cabecalho;'>$count</span></h3>";
                        while ($row_receita = $result_receita->fetch_assoc()) {

                        ?>

                            <div class="row mb-5 mt-5">
                                <div class="col-3 ps-5">
                                    <img src="../fotos/receitas/<?php echo $row_receita['Foto']; ?>" alt="Foto de profissional" width="250" height="250" class="rounded shadow-lg">
                                </div>
                                <div class="col-6 ps-5 mt-3" style="font-size: 18px;">
                                    <p class="text-capitalize"><strong>Nome: </strong><?php echo $row_receita['Nome']; ?> </p>
                                    <p class="text-capitalize"><strong>Porções: </strong><?php echo $row_receita['Porcoes']; ?> </p>
                                    <p class="text-capitalize"><strong>Tempo de Preparo: </strong><?php echo $row_receita['Tempo']; ?> </p>
                                    <p class="text-capitalize"><strong>Tipo de Alergia: </strong><?php echo $row_receita['Tipo_Alergia']; ?> </p>
                                    <a href="perfil_receita.php?i=<?php echo $row_receita['IdReceita']; ?>" class="text-dark rounded p-2 ms-5 border-dark-emphasis border" style="text-decoration: none; background-color:<?php echo $cor_cabecalho; ?>;">Ver Receita</a>
                                </div>
                            </div>
                        <?php }
                    }
                } else if ($x == 3) {

                    $t = "00:30:00";
                    $sql_receita = "SELECT * FROM receitas WHERE Oculta = 1 AND LOWER(Nome) LIKE LOWER('%$p%') AND Tempo <= '00:30:00' ORDER BY receitas.Tempo DESC";
                    $result_receita = $conn->query($sql_receita);

                    if ($result_receita->num_rows > 0) {
                        $count = $result_receita->num_rows;

                        echo "<h3>Resultados encontrados: <span style='color: $cor_cabecalho;'>$count</span></h3>";
                        while ($row_receita = $result_receita->fetch_assoc()) {

                        ?>

                            <div class="row mb-5 mt-5">
                                <div class="col-3 ps-5">
                                    <img src="../fotos/receitas/<?php echo $row_receita['Foto']; ?>" alt="Foto de profissional" width="250" height="250" class="rounded shadow-lg">
                                </div>
                                <div class="col-6 ps-5 mt-3" style="font-size: 18px;">
                                    <p class="text-capitalize"><strong>Nome: </strong><?php echo $row_receita['Nome']; ?> </p>
                                    <p class="text-capitalize"><strong>Porções: </strong><?php echo $row_receita['Porcoes']; ?> </p>
                                    <p class="text-capitalize"><strong>Tempo de Preparo: </strong><?php echo $row_receita['Tempo']; ?> </p>
                                    <p class="text-capitalize"><strong>Tipo de Alergia: </strong><?php echo $row_receita['Tipo_Alergia']; ?> </p>
                                    <a href="perfil_receita.php?i=<?php echo $row_receita['IdReceita']; ?>" class="text-dark rounded p-2 ms-5 border-dark-emphasis border" style="text-decoration: none; background-color:<?php echo $cor_cabecalho; ?>;">Ver Receita</a>
                                </div>
                            </div>
                        <?php }
                    }
                } else if ($x == 4) {
                    $t = "01:00:00";
                    $sql_receita = "SELECT * FROM receitas WHERE Oculta = 1 AND LOWER(Nome) LIKE LOWER('%$p%') AND Tempo <= '01:00:00' ORDER BY receitas.Tempo DESC";
                    $result_receita = $conn->query($sql_receita);

                    if ($result_receita->num_rows > 0) {
                        $count = $result_receita->num_rows;

                        echo "<h3>Resultados encontrados: <span style='color: $cor_cabecalho;'>$count</span></h3>";
                        while ($row_receita = $result_receita->fetch_assoc()) {

                        ?>

                            <div class="row mb-5 mt-5">
                                <div class="col-3 ps-5">
                                    <img src="../fotos/receitas/<?php echo $row_receita['Foto']; ?>" alt="Foto de profissional" width="250" height="250" class="rounded shadow-lg">
                                </div>
                                <div class="col-6 ps-5 mt-3" style="font-size: 18px;">
                                    <p class="text-capitalize"><strong>Nome: </strong><?php echo $row_receita['Nome']; ?> </p>
                                    <p class="text-capitalize"><strong>Porções: </strong><?php echo $row_receita['Porcoes']; ?> </p>
                                    <p class="text-capitalize"><strong>Tempo de Preparo: </strong><?php echo $row_receita['Tempo']; ?> </p>
                                    <p class="text-capitalize"><strong>Tipo de Alergia: </strong><?php echo $row_receita['Tipo_Alergia']; ?> </p>
                                    <a href="perfil_receita.php?i=<?php echo $row_receita['IdReceita']; ?>" class="text-dark rounded p-2 ms-5 border-dark-emphasis border" style="text-decoration: none; background-color:<?php echo $cor_cabecalho; ?>;">Ver Receita</a>
                                </div>
                            </div>
                        <?php }
                    }
                } else if ($x == 5) {
                    $t = "01:00:00";
                    $sql_receita = "SELECT * FROM receitas WHERE Oculta = 1 AND LOWER(Nome) LIKE LOWER('%$p%') AND Tempo > '01:00:00' ORDER BY receitas.Tempo DESC";
                    $result_receita = $conn->query($sql_receita);

                    if ($result_receita->num_rows > 0) {
                        $count = $result_receita->num_rows;

                        echo "<h3>Resultados encontrados: <span style='color: $cor_cabecalho;'>$count</span></h3>";
                        while ($row_receita = $result_receita->fetch_assoc()) {

                        ?>

                            <div class="row mb-5 mt-5">
                                <div class="col-3 ps-5">
                                    <img src="../fotos/receitas/<?php echo $row_receita['Foto']; ?>" alt="Foto de profissional" width="250" height="250" class="rounded shadow-lg">
                                </div>
                                <div class="col-6 ps-5 mt-3" style="font-size: 18px;">
                                    <p class="text-capitalize"><strong>Nome: </strong><?php echo $row_receita['Nome']; ?> </p>
                                    <p class="text-capitalize"><strong>Porções: </strong><?php echo $row_receita['Porcoes']; ?> </p>
                                    <p class="text-capitalize"><strong>Tempo de Preparo: </strong><?php echo $row_receita['Tempo']; ?> </p>
                                    <p class="text-capitalize"><strong>Tipo de Alergia: </strong><?php echo $row_receita['Tipo_Alergia']; ?> </p>
                                    <a href="perfil_receita.php?i=<?php echo $row_receita['IdReceita']; ?>" class="text-dark rounded p-2 ms-5 border-dark-emphasis border" style="text-decoration: none; background-color:<?php echo $cor_cabecalho; ?>;">Ver Receita</a>
                                </div>
                            </div>
                        <?php }
                    }
                } else {
                    echo "<h1 class='text-center my-5' style='color: $cor_cabecalho;' >Não foram encontrado resultados</h1>";
                }
            } else {
                $sql_receita = "SELECT * FROM receitas WHERE Oculta = 1";
                $result_receita = $conn->query($sql_receita);

                if ($result_receita->num_rows > 0) {
                    $count = $result_receita->num_rows;
                    echo "<h3>Resultados encontrados: <span style='color: $cor_cabecalho;'>$count</span></h3>";
                    while ($row_receita = $result_receita->fetch_assoc()) {

                        ?>

                        <div class="row mb-5 mt-5">
                            <div class="col-3 ps-5">
                                <img src="../fotos/receitas/<?php echo $row_receita['Foto']; ?>" alt="Foto de profissional" width="250" height="250" class="rounded shadow-lg">
                            </div>
                            <div class="col-6 ps-5 mt-3" style="font-size: 18px;">
                                <p class="text-capitalize"><strong>Nome: </strong><?php echo $row_receita['Nome']; ?> </p>
                                <p class="text-capitalize"><strong>Porções: </strong><?php echo $row_receita['Porcoes']; ?> </p>
                                <p class="text-capitalize"><strong>Tempo de Preparo: </strong><?php echo $row_receita['Tempo']; ?> </p>
                                <p class="text-capitalize"><strong>Tipo de Alergia: </strong><?php echo $row_receita['Tipo_Alergia']; ?> </p>
                                <a href="perfil_receita.php?i=<?php echo $row_receita['IdReceita']; ?>" class="text-dark rounded p-2 ms-5 border-dark-emphasis border" style="text-decoration: none; background-color:<?php echo $cor_cabecalho; ?>;">Ver Receita</a>
                            </div>
                        </div>
            <?php }
                }
            } ?>
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
    </main>
    <?php if (!isset($_GET['e'])) {
    } else if ($_GET['e'] == md5(1)) {
    ?>
        <script>
            Swal.fire({
                title: "Sucesso!",
                text: "Perfil editado com sucesso",
                icon: "success",

                allowOutsideClick: true,
                allowEscapeKey: true,

                confirmButtonColor: "#3085d6",
                confirmButtonText: "OK"
            }).then((result) => {

                window.location.href = "receitas.php";

            });
        </script>
    <?php } else if ($_GET['e'] == md5(10)) {

    ?>
        <script>
            Swal.fire({
                title: "Sucesso!",
                text: "Sua receita foi enviada com sucesso.",
                icon: "success",

                allowOutsideClick: true,
                allowEscapeKey: true,

                confirmButtonColor: "#3085d6",
                confirmButtonText: "OK"
            }).then((result) => {

                window.location.href = "receitas.php";

            });
        </script>
    <?php } ?>
</body>

<script>
    function NaoLogado() {
        Swal.fire({
            title: "Atenção!",
            text: "Você precisa estar logado para realizar sua inscrição",
            icon: "warning",

            allowOutsideClick: true,
            allowEscapeKey: true,

            confirmButtonColor: "#3085d6",
            confirmButtonText: "OK"
        }).then((result) => {

            window.location.href = "receitas.php";

        });
    }
</script>

</html>