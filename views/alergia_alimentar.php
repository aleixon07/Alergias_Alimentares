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
$sql4 = "SELECT * FROM home WHERE Section = 0";
$result4 = $conn->query($sql4);

if ($result4->num_rows > 0) {

    // Recorrer los resultados y mostrar los datos
    while ($row4 = $result4->fetch_assoc()) {

        $cor_cabecalho = $row4["Cor"];
    }
}
$sql5 = "SELECT * FROM home WHERE Section = 11";
$result5 = $conn->query($sql5);

if ($result5->num_rows > 0) {

    // Recorrer los resultados y mostrar los datos
    while ($row5 = $result5->fetch_assoc()) {

        $foto_banner = $row5["Foto"];
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
    <link rel="stylesheet" href="../css/style.css">

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
                                <input type="hidden" name="a" id="a" value="2">

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
    <main>
        <section class="section-1 mb-5"> <!-- 1 -->
            <div class="w-100 mt-5">
                <img src="../fotos/outros/<?php echo $foto_banner; ?>" style="width: 100%; height: 600px;" alt="banner">
            </div>
        </section>
        <?php


        $sql6 = "SELECT * FROM alergia_alimentar";
        $result6 = $conn->query($sql6);

        if ($result6->num_rows > 0) {

            while ($row6 = $result6->fetch_assoc()) {

        ?>
                <section class="px-5" style="background-color: <?php echo $row6['Cor']; ?>;">
                    <div class="py-3"><?php echo $row6['Text_Area']; ?></div>
                </section>

        <?php }
        } ?>

        <?php if (isset($_SESSION['id_usuario']) && $nivel >= 2) { ?>
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
                        <label for="opcao2">Gerenciador da Alergia Alimentar</label>
                        <button id="opcao2">
                            <i class='bx bxs-home'></i>
                        </button>
                    </li>
                </ul>
            </div>

            <script>
                var botao1 = document.getElementById("opcao1");
                var botao2 = document.getElementById("opcao2");

                botao1.addEventListener("click", function() {
                    window.location.href = "../adm/";
                });

                botao2.addEventListener("click", function() {
                    window.location.href = "../adm/dashboard/geren_alergias.php";
                });
            </script>

        <?php } ?>
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

                    window.location.href = "alergia_alimentar.php";

                });
            </script>
        <?php } ?>
</body>

</html>