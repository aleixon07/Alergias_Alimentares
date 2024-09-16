<?php
    session_start();
    require_once "scripts/connection.php";

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

    $sql2 = "SELECT * FROM home WHERE Section = 2";
    $result2 = $conn->query($sql2);

    if ($result2->num_rows > 0) {

        // Recorrer los resultados y mostrar los datos
        while ($row2 = $result2->fetch_assoc()) {

            $titulo_section_2 = $row2["Titulo"];
            $conteudo_section_2 = $row2["Conteudo"];
            $foto_section_2 = $row2["Foto"];
            $cor_section_2 = $row2["Cor"];
        }
    }

    $sql3 = "SELECT * FROM home WHERE Section = 3";
    $result3 = $conn->query($sql3);

    if ($result3->num_rows > 0) {

        // Recorrer los resultados y mostrar los datos
        while ($row3 = $result3->fetch_assoc()) {

            $titulo_section_3 = $row3["Titulo"];
            $conteudo_section_3 = $row3["Conteudo"];
            $cor_section_3 = $row3["Cor"];
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
    $sql5 = "SELECT * FROM home WHERE Section = 1";
    $result5 = $conn->query($sql5);

    if ($result5->num_rows > 0) {

        // Recorrer los resultados y mostrar los datos
        while ($row5 = $result5->fetch_assoc()) {

            $foto_banner = $row5["Foto"];
        }
    }

    $sql6 = "SELECT * FROM home WHERE Section = 4";
    $result6 = $conn->query($sql6);

    if ($result6->num_rows > 0) {

        // Recorrer los resultados y mostrar los datos
        while ($row6 = $result6->fetch_assoc()) {

            $titulo_section_4 = $row6["Titulo"];
            $conteudo_section_4 = $row6["Conteudo"];
            $cor_section_4 = $row6["Cor"];
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
    <link rel="shortcut icon" href="fotos/outros/favicon_foodhelp.png" type="image/x-icon" />

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link flex href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <link rel="stylesheet" href="css/style-botao-flutuante.css">
    <script src="js/botao-flutuante.js" defer></script>
    <script src="https://cdn.ckeditor.com/4.22.1/full/ckeditor.js"></script>
    <link rel="stylesheet" href="css/style.css">

    <title>FoodHelp</title>
</head>

<body>

    <header class="conteiner">
        <nav class="navbar navbar-expand-md fixed-top py-4 border-bottom border-dark" style="background-color: <?php echo $cor_cabecalho;  ?>;">
            <div class="container-fluid col-8 justify-content-center">
                <div class=''><a href="views/alergia_alimentar.php" class="mx-3 item-nav">Alergias Alimentares</a></div>
                <div class='border-black border-start'><a href="views/receitas.php" class="mx-3 item-nav">Receitas</a></div>
                <div class='border-black border-start'><a href="" class="mx-3 item-nav">Home</a></div>
                <div class='border-black border-start'><a href="views/profissionais.php" class="mx-3 item-nav">Profissionais</a></div>

                <?php if (isset($_SESSION['id_usuario'])) { ?>

                    <div class='border-black border-start'><a type="button" data-bs-toggle="modal" data-bs-target="#modal_perfil" class="mx-3 item-nav">Perfil</a></div>

                <?php } else { ?>
                    <div class='border-black border-start'><a href="views/entrar.php" class="mx-3 item-nav">Entrar</a></div>


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
                                <img src="fotos/administradores/<?php if (empty($foto)) {
                                                                    echo "user.png";
                                                                } else {
                                                                    echo $foto;
                                                                } ?>" class="rounded" width="375px" height="300" alt="foto user">
                            <?php } else { ?>
                                <img src="fotos/usuarios/<?php if (empty($foto)) {
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
                        <a href="scripts/logout.php" class="btn  border border-dark bg-warning-subtle">Sair</a>
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
                    <form action="scripts/edit_user.php" method="POST" enctype='multipart/form-data'>
                        <div class="row">
                            <div class="col-6 ">
                                <?php
                                if ($nivel >= 2) { ?>
                                    <img id='preview' src="fotos/administradores/<?php if (empty($foto)) {
                                                                                        echo "user.png";
                                                                                    } else {
                                                                                        echo $foto;
                                                                                    } ?>" class="rounded" width="375px" height="300" alt="foto user">
                                <?php } else { ?>
                                    <img id='preview' src="fotos/usuarios/<?php if (empty($foto)) {
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
                                <input type="hidden" name="a" id="a" value="1">

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
                <img src="fotos/outros/<?php echo $foto_banner; ?>" style="width: 100%;" alt="banner">
            </div>

            <h1 class="text-center my-5 text-h1">Seja Bem-Vindo!</h1>
        </section>

        <section class="section-2 mt-5" style="background-color: <?php echo $cor_section_2; ?>;"> <!-- 2 -->

            <div class="row g-0">
                <div class="col-5">
                    <img src="fotos/outros/<?php echo $foto_section_2; ?>" class="rounded-top" width="680px" height="450px" alt="foto alergia">
                </div>
                <div class="col-1"></div>
                <div class="col-5 ms-5" style="padding-top: 10px;">
                    <h1 class="text-center mt-4"><?php echo $titulo_section_2 ?></h1>

                    <p class="text-start m-5 px-3" style="font-size: 20px;"><?php echo $conteudo_section_2; ?></p>
                    <div class="text-center">
                        <a href="views/alergia_alimentar.php" style="border-radius: 10px; background-color: <?php echo $cor_cabecalho;  ?>;" class="btn-section-1 p-3">Saiba Mais</a>
                    </div>
                </div>
            </div>
        </section>

        <section class="section-3 pb-4" style="background-color: <?php echo $cor_section_3; ?>;"> <!-- 3 -->
            <div class="row g-0">
                <div class="col-5 ms-5" style="padding-top: 30px;">
                    <h1 class="text-center mt-4"><?php echo $titulo_section_3; ?></h1>
                    <p class="text-start m-5 px-3" style="font-size: 20px;"><?php echo $conteudo_section_3; ?></p>
                </div>

                <div class="col-1"></div>


                <div class="col-5">
                    <div class="container">
                        <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-inner">

                                <?php
                                $sql2 = "SELECT * FROM profissionais WHERE Oculta = 1";
                                $result2 = mysqli_query($conn, $sql2);
                                $firstItem = true;

                                while ($row = mysqli_fetch_assoc($result2)) {

                                    $fotos = $row["Foto"];
                                    $idprof = $row["IdProfissional"];
                                    $nome_profissional = $row["Nome"];
                                    $carouselItemClass = $firstItem ? "carousel-item active" : "carousel-item";

                                ?>

                                    <div class="<?php echo $carouselItemClass; ?>" data-bs-interval="4000">
                                        <h4 class="text-center mt-5" style="margin-bottom: 30px;"><?php echo $nome_profissional; ?></h4>

                                        <div class="mb-5" style="margin-left: 150px;">
                                            <img src="<?php echo "fotos/profissionais/" . $fotos; ?>" width="270px" height="250px" class="d-block rounded-circle" alt="...">
                                        </div>

                                        <div class="mb-3"><a href="views/perfil_profissional.php?i=<?php echo $idprof; ?>" style="border-radius: 10px; margin-left: 230px; background-color: #dedede;" class="btn-section-1 p-3 mb-3 text-dark-emphasis">Ver Perfil</a></div>
                                    </div>


                                <?php
                                    $firstItem = false;
                                }
                                ?>
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="section-4 pb-4 " style="background-color: <?php echo $cor_section_4; ?>;"> <!-- 4 -->
            <div class="row g-0">
                <div class="col-7" style="margin-top: 70px;">
                    <div class="container">
                        <div id="carouselExampleAutoplaying1" class="carousel carousel-dark slide" data-bs-ride="carousel">
                            <div class="carousel-inner">

                                <?php
                                $sql3 = "SELECT * FROM receitas WHERE Oculta = 1";
                                $result3 = mysqli_query($conn, $sql3);
                                $firstItem = true;

                                while ($row3 = mysqli_fetch_assoc($result3)) {

                                    $fotos3 = $row3["Foto"];
                                    $idreceita = $row3["IdReceita"];
                                    $nome3 = $row3["Nome"];
                                    $porcoes = $row3["Porcoes"];
                                    $tempo = $row3["Tempo"];
                                    $alergia = $row3["Tipo_Alergia"];

                                    $carouselItemClass = $firstItem ? "carousel-item active" : "carousel-item";

                                ?>

                                    <div class="<?php echo $carouselItemClass; ?>" data-bs-interval="4000">
                                        <div class="row">
                                            <div class="mb-5 col-4" style="margin-left: 140px;">
                                                <img src="<?php echo "fotos/receitas/" . $fotos3; ?>" width="250px" height="250px" class="d-block rounded-4 shadow-lg" alt="...">
                                            </div>

                                            <div class=" col-5 ps-4">
                                                <h3 class="text-center text-capitalize"><?php echo $nome3; ?></h3>
                                                <p class="mt-4" style="font-size: 18px;"><b>Porções:</b> <?php echo $porcoes; ?></p>
                                                <p class="" style="font-size: 18px;"><b>Tempo de Preparo:</b> <?php echo $tempo; ?></p>
                                                <p class="" style="font-size: 18px;"><b>Tipo de Alergia:</b> <?php echo $alergia; ?></p>

                                                <div class="text-center mt-5 mb-3">
                                                    <a href="views/perfil_receita.php?i=<?php echo $idreceita; ?>" style="border-radius: 10px; background-color: #dedede;" class="btn-section-1 p-3 text-dark-emphasis">Ver Receita</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                <?php
                                    $firstItem = false;
                                }
                                ?>
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying1" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying1" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    </div>
                </div>

                <div class="col-4 ms-5" style="padding-top: 30px;">
                    <h1 class="text-center mt-4"><?php echo $titulo_section_4; ?></h1>
                    <p class="text-start m-5 px-3" style="font-size: 20px;"><?php echo $conteudo_section_4; ?></p>
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
        </footer>
    </main>
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
                    <label for="opcao2">Gerenciador de Home</label>
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
                window.location.href = "adm/";
            });

            botao2.addEventListener("click", function() {
                window.location.href = "adm/dashboard/geren_home.php";
            });
        </script>

    <?php } ?>
    <div>
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

                    window.location.href = "index.php";

                });
            </script>
        <?php } else if ($_GET['e'] == md5(5)) { ?>

            <script>
                Swal.fire({
                    title: "Seja Bem-Vindo!",
                    text: "Muito obrigado por ter se cadastrado",
                    icon: "success",

                    allowOutsideClick: true,
                    allowEscapeKey: true,

                    confirmButtonColor: "#3085d6",
                    confirmButtonText: "OK"
                }).then((result) => {

                    window.location.href = "index.php";

                });
            </script>

        <?php } ?>
    </div>
    <script>
        function previewImagem(event) {
            var input = event.target;
            var imagem = input.files[0];
            var imgPreview = document.getElementById('preview');

            var reader = new FileReader();
            reader.onload = function() {
                imgPreview.src = reader.result;
            };
            reader.readAsDataURL(imagem);
        }
    </script>
</body>

</html>