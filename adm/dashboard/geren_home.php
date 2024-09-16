<?php
session_start();
if (!isset($_SESSION['id_usuario']) && !isset($_SESSION['nivel_usuario'])) {
    header("Location: ../../index.php");
    exit();
  
    $nvl = $_SESSION['nivel_usuario'];
  
    if ($nvl >= 3 && $nvl < 1) {
    } else {
      header("Location: ../../index.php");
      exit();
    }
  }
  
$id = $_SESSION['id_usuario'];

require_once "../../scripts/connection.php";

$sql = "SELECT * FROM usuario WHERE IdUsuario ='$id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

    // Recorrer los resultados y mostrar los datos
    while ($row = $result->fetch_assoc()) {

        $idusuario = $row["IdUsuario"];
        $nome = $row["Nome"];
        $email = $row["Email"];
        $foto = $row["Foto"];


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

                $titulo_prof = $row3["Titulo"];
                $conteudo_prof = $row3["Conteudo"];
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
    }
}


?>


<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Alexandre Pires da Fonseca">
    <meta name="description" content="TCC 2023">

    <link rel="shortcut icon" href="../../fotos/outros/favicon_foodhelp.png" type="image/x-icon" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link flex href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <script src="../../js/sidebar.js" defer></script>
    <link rel="stylesheet" href="../../css/style-botao-flutuante.css">
    <script src="../../js/botao-flutuante.js" defer></script>
    <link rel="stylesheet" type="text/css" href="../../styles-text.css">
    <script src="https://cdn.ckeditor.com/4.22.1/full/ckeditor.js"></script>
    <link rel="stylesheet" href="../../css/style.css">
    <title>FoodHelp</title>

</head>

<body>

    <main>
        <h1 class="title-adm py-3">Painel Administrativo</h1>
        <div class="bg-dark-subtle border-dark border border-end-0 border-start-0 text-center py-3 ">
            <h3 class="title-adm2">Gerenciador de Home</h3>
            <p class="title-adm2">Local destinado para o gerenciamento do conteúdo da página Home.</p>
        </div>


        <!-- 0 -->
        <section class="section-0 mt-5" id="section_0">
            <header class="conteiner">
                <nav class="navbar navbar-expand-md py-4 border-bottom border-dark" id="Nav" style="background-color: <?php echo $cor_cabecalho; ?>;">
                    <div class="container-fluid col-8 justify-content-center">
                        <div class=''><a href="" class="mx-3 item-nav">Alergias Alimentares</a></div>
                        <div class='border-black border-start'><a href="" class="mx-3 item-nav">Receitas</a></div>
                        <div class='border-black border-start'><a href="" class="mx-3 item-nav">Profissionais</a></div>
                        <div class='border-black border-start'><a href="" class="mx-3 item-nav">Entrar</a></div>
                    </div>
                </nav>
            </header>
            <form action="../../scripts/update_section.php" method="POST">
                <div class="ms-3 mt-2 row">

                    <div class="col-2 ps-4"><label for="">Escolha a cor do cabeçalho</label></div>
                    <div class="col-1"><input type="color" class="form-control form-control-color border border-dark-subtle" id="favcolor" name="favcolor" value="<?php echo $cor_cabecalho; ?>"></div>
                </div>
                <input type="hidden" id="section" name="section" value="0">
                <div class="" style="margin-left: 150px;"><button type="submit" style="border-radius: 10px;" class="btn-section-1 p-2 bg-secondary-subtle text-black border border-dark  border-opacity-25">Salvar</button></div>

            </form>
        </section>

        <hr>

        <!-- 1 -->
        <form action="../../scripts/update_section.php" method="POST" enctype='multipart/form-data'>
            <section class="section-1 mb-5" id="section_1"> <!-- 1 -->
                <div class="w-100 mt-5">
                    <img id="preview2" src="../../fotos/outros/<?php echo $foto_banner; ?>" style="width: 100%;" height="600px" alt="banner">
                </div>
                <input class='form-control border-1 border-dark w-50 mb-2' type="file" name="imagem" id="imagem2" onchange="previewImagem2(event)">
                <div class="text-center mt-4">
                    <button type="submit" style="border-radius: 10px;" class="btn-section-1 p-2 bg-secondary-subtle text-black border border-dark  border-opacity-25">Salvar</button>
                </div>
                <h1 class="text-center my-5 text-h1">Seja Bem-Vindo!</h1>
                <input type="hidden" id="section" name="section" value="1">
            </section>
        </form>

        <!-- 2 -->
        <form action="../../scripts/update_section.php" method="POST" enctype='multipart/form-data'>
            <section class="section-2 mt-5" id="section_2" style="background-color: <?php echo $cor_section_2; ?>;"> <!-- 2 -->

                <div class="row">

                    <div class="col-5">

                        <?php if (isset($foto_section_2)) { ?>
                            <img id="preview" width="680px" height="450px" src="../../fotos/outros/<?php echo $foto_section_2; ?>" class="pb-2 rounded-top">
                        <?php } else { ?>
                            <img id="preview" width="680px" height="450px" src="../../fotos/outros/foto_section.png" class="pb-2 rounded-top">
                        <?php } ?>
                        <br>
                        <input class='form-control border-1 border-dark' type="file" name="imagem" id="imagem" onchange="previewImagem(event)">


                    </div>
                    <div class="col-2"></div>
                    <div class="col-4 ms-5" style="padding-top: 10px;">

                        <div class="form-floating mt-5">
                            <input type="text" name="titulo" class="form-control border-dark border" id="floatingInput" required placeholder="Título" value="<?php echo $titulo_section_2; ?>">
                            <label for="floatingInput" style="font-size: 18px;">Título</label>
                        </div>
                        <div class="form-floating">
                            <textarea class="form-control border-dark border mt-4" name="conteudo" type="text" placeholder="Conteúdo" required id="floatingTextarea2" style="height: 200px"><?php echo $conteudo_section_2; ?></textarea>
                            <label for="floatingTextarea2" style="font-size: 18px;">Conteúdo</label>
                        </div>
                        <input type="hidden" id="section" name="section" value="2">
                    </div>

                </div>

            </section>
            <div class="ms-3 mt-2 row">
                <div class="col-5"></div>
                <div class="col-2 ps-4"><label for="">Escolha a cor de fundo</label></div>
                <div class="col-1"><input type="color" class="form-control form-control-color border border-dark-subtle" id="favcolor2" name="favcolor" value="<?php echo $cor_section_2; ?>"></div>
            </div>
            <div class="text-center mt-2">
                <button type="submit" style="border-radius: 10px;" class="btn-section-1 p-2 bg-secondary-subtle text-black border border-dark  border-opacity-25">Salvar</button>
            </div>

        </form>

        <!-- 3 -->
        <form action="../../scripts/update_section.php" method="POST">
            <section class="section-3 mt-5 pb-4" id="section_3" style="background-color: <?php echo $cor_section_3; ?>;"> <!-- 3 -->

                <div class="row">
                    <div class="col-5 ms-5" style="padding-top: 30px;">

                        <div class="form-floating mt-5">
                            <input type="text" name="titulo" class="form-control border-dark border" id="floatingInput" required placeholder="Título" value="<?php echo $titulo_prof; ?>">
                            <label for="floatingInput" style="font-size: 18px;">Título</label>
                        </div>

                        <div class="form-floating">
                            <textarea class="form-control border-dark border mt-4" name="conteudo" type="text" placeholder="Conteúdo" required id="floatingTextarea2" style="height: 200px"><?php echo $conteudo_prof; ?></textarea>
                            <label for="floatingTextarea2" style="font-size: 18px;">Conteúdo</label>
                        </div>
                        <input type="hidden" id="section" name="section" value="3">
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

                                            <div class="mb-5" style="margin-left: 140px;">
                                                <img src="<?php echo "../../fotos/profissionais/" . $fotos; ?>" width="250px" height="250px" class="d-block rounded-circle" alt="...">
                                            </div>

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
            <div class="ms-3 mt-2 row">
                <div class="col-5"></div>
                <div class="col-2 ps-4"><label for="">Escolha a cor de fundo</label></div>
                <div class="col-1"><input type="color" class="form-control form-control-color border border-dark-subtle" id="favcolor3" name="favcolor" value="<?php echo $cor_section_3; ?>"></div>
            </div>
            <div class="text-center mt-5">
                <button type="submit" style="border-radius: 10px;" class="btn-section-1 p-2 bg-secondary-subtle text-black border border-dark  border-opacity-25">Salvar</button>
            </div>

        </form>

        <!-- 4 -->
        <form action="../../scripts/update_section.php" method="POST" enctype='multipart/form-data' class="mb-5">
            <section class="section-4 pb-4 " id="section_4" style="background-color: <?php echo $cor_section_4; ?>;"> <!-- 4 -->
                <div class="row">
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
                                                    <img src="<?php echo "../../fotos/receitas/" . $fotos3; ?>" width="250px" height="250px" class="d-block rounded-4 shadow-lg" alt="...">
                                                </div>

                                                <div class=" col-5 ps-4">
                                                    <h3 class="text-center text-capitalize"><?php echo $nome3; ?></h3>
                                                    <p class="mt-4" style="font-size: 16px;"><b>Porções:</b> <?php echo $porcoes; ?></p>
                                                    <p class="" style="font-size: 16px;"><b>Tempo de Preparo:</b> <?php echo $tempo; ?></p>
                                                    <p class="" style="font-size: 16px;"><b>Tipo de Alergia:</b> <?php echo $alergia; ?></p>
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
                        <div class="form-floating mt-5">
                            <input type="text" name="titulo" class="form-control border-dark border" id="floatingInput" required placeholder="Título" value="<?php echo $titulo_section_4; ?>">
                            <label for="floatingInput" style="font-size: 18px;">Título</label>
                        </div>

                        <div class="form-floating">
                            <textarea class="form-control border-dark border mt-4" name="conteudo" type="text" placeholder="Conteúdo" required id="floatingTextarea2" style="height: 200px"><?php echo $conteudo_section_4; ?></textarea>
                            <label for="floatingTextarea2" style="font-size: 18px;">Conteúdo</label>
                        </div>
                    </div>
                </div>
                <input type="hidden" id="section" name="section" value="4">
            </section>

            <div class="ms-3 mt-2 row">
                <div class="col-5"></div>
                <div class="col-2 ps-4"><label for="">Escolha a cor de fundo</label></div>
                <div class="col-1"><input type="color" class="form-control form-control-color border border-dark-subtle" id="favcolor4" name="favcolor" value="<?php echo $cor_section_4; ?>"></div>
            </div>

            <div class="text-center mt-5">
                <button type="submit" style="border-radius: 10px;" class="btn-section-1 p-2 bg-secondary-subtle text-black border border-dark  border-opacity-25">Salvar</button>

            </div>
        </form>

        <!-- 5 -->
        <form action="../../scripts/update_section.php" method="POST" class="mb-5">
            <footer class="bg-dark" id="section_5">
                <div class="pt-4">
                    <h1 class="text-contato text-center" style="color: <?php echo $cor_cabecalho;  ?>;">Contato</h1>
                </div>
                <div class="mt-4 row ms-4" style="font-family: Inder;">
                    <div class="col-3"></div>
                    <div class="col-3">
                        <h5><span class="text-light" style="letter-spacing: 2px;">GMAIL:</span>
                            <input type="text" name="gmail" class="form-control border-dark border w-75" id="floatingInput" required placeholder="Gmail" value="<?php echo $conteudo_section_51; ?>">
                        </h5>
                    </div>
                    <div class="col-4">
                        <h5><span class="text-light" style="letter-spacing: 2px;">LOCALIZAÇÃO:</span>
                            <input type="text" name="localizacao" class="form-control border-dark border w-50" id="floatingInput" required placeholder="Localização" value="<?php echo $conteudo_section_52; ?>">
                        </h5>
                    </div>
                    <div class="col-4"></div>
                </div>
                <div class="my-5 row  ms-4" style="font-family: Inder;">
                    <div class="col-3"></div>
                    <div class="col-3">
                        <h5><span class="text-light" style="letter-spacing: 2px;">NÚMERO:</span>
                            <input type="text" name="numero" class="form-control border-dark border w-75" id="floatingInput" required placeholder="Número" value="<?php echo $conteudo_section_54; ?>">

                        </h5>
                    </div>
                    <div class="col-4">
                        <h5><span class="text-light" style="letter-spacing: 2px;">ATENDIMENTO:</span>
                            <input type="text" name="atendimento" class="form-control border-dark border w-50" id="floatingInput" required placeholder="Hórario de Atendimento" value="<?php echo $conteudo_section_53; ?>">
                        </h5>
                        </h5>
                    </div>
                    <div class="col-4"></div>
                </div>
                <h6 class="text-secondary text-center">@2023</h6>
            </footer>
            <input type="hidden" id="section" name="section" value="5">

            <div class="text-center mt-5">
                <button type="submit" style="border-radius: 10px;" class="btn-section-1 p-2 bg-secondary-subtle text-black border border-dark  border-opacity-25">Salvar</button>

            </div>
        </form>

        <!--div do botao flutuante -->
        <div class="fab">
            <button class="main">
            </button>
            <ul>

                <li>
                    <label for="opcao1">Voltar</label>
                    <button id="opcao1">
                        <i class='bx bx-redo bx-rotate-180'></i>
                    </button>
                </li>
                <li>
                    <label for="opcao2">Visitar Home</label>
                    <button id="opcao2">
                        <i class='bx bxs-home'></i>
                    </button>
                </li>
            </ul>
        </div> <!--div do botao flutuante -->

    </main>
    <div>
        <script>
            var botao1 = document.getElementById("opcao1");
            var botao2 = document.getElementById("opcao2");

            botao1.addEventListener("click", function() {
                window.location.href = "../index.php";
            });

            botao2.addEventListener("click", function() {
                window.location.href = "../../index.php?e=d57aae6ea653fef4c22139fb28cff8a6";
            });
        </script>
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
        <script>
            function previewImagem2(event) {
                var input = event.target;
                var imagem = input.files[0];
                var imgPreview = document.getElementById('preview2');

                var reader = new FileReader();
                reader.onload = function() {
                    imgPreview.src = reader.result;
                };
                reader.readAsDataURL(imagem);
            }
        </script>


        <script>
            // Obtenha o valor da variável PHP $foto
            var foto = "<?php echo $foto2; ?>";

            // Defina o valor do campo de arquivo usando JavaScript
            document.getElementById('imagem').value = foto;
        </script>

        <script>
            // Função para alterar a cor de fundo da div com JavaScript
            function changeColor() {
                const colorInput = document.getElementById('favcolor');
                const Nav = document.getElementById('Nav');
                Nav.style.backgroundColor = colorInput.value;
            }

            // Chama a função quando o valor do input for alterado
            document.getElementById('favcolor').addEventListener('change', changeColor);
        </script>

        <script>
            // Função para alterar a cor de fundo da div com JavaScript
            function changeColor2() {
                const colorInput = document.getElementById('favcolor2');
                const Section = document.getElementById('section_2');
                Section.style.backgroundColor = colorInput.value;
            }

            // Chama a função quando o valor do input for alterado
            document.getElementById('favcolor2').addEventListener('change', changeColor2);
        </script>

        <script>
            // Função para alterar a cor de fundo da div com JavaScript
            function changeColor3() {
                const colorInput = document.getElementById('favcolor3');
                const Section = document.getElementById('section_3');
                Section.style.backgroundColor = colorInput.value;
            }

            // Chama a função quando o valor do input for alterado
            document.getElementById('favcolor3').addEventListener('change', changeColor3);
        </script>

        <script>
            // Função para alterar a cor de fundo da div com JavaScript
            function changeColor4() {
                const colorInput = document.getElementById('favcolor4');
                const Section = document.getElementById('section_4');
                Section.style.backgroundColor = colorInput.value;
            }

            // Chama a função quando o valor do input for alterado
            document.getElementById('favcolor4').addEventListener('change', changeColor4);
        </script>
    </div>
</body>
<?php

if (!isset($_GET['e'])) {
} else if ($_GET['e'] == md5(1) && $_GET['section'] == 0) {

?>
    <script>
        // Função para mostrar o SweetAlert
        Swal.fire({
            title: "Concluído!",
            text: "Home editado com sucesso",
            icon: "success",
            // Opções para permitir o fechamento clicando fora do SweetAlert e pela tecla "Esc"
            allowOutsideClick: true,
            allowEscapeKey: true,
            // Configuração do botão "OK"
            confirmButtonColor: "#3085d6",
            confirmButtonText: "OK"
        }).then((result) => {
            // Verifica se o usuário clicou em "OK"
            // Muda a URL após o SweetAlert ser fechado
            window.location.href = "geren_home.php#section_0";

        });
    </script>

<?php

} else if ($_GET['e'] == md5(1) && $_GET['section'] == 1) {

?>
    <script>
        // Função para mostrar o SweetAlert
        Swal.fire({
            title: "Concluído!",
            text: "Home editado com sucesso",
            icon: "success",
            // Opções para permitir o fechamento clicando fora do SweetAlert e pela tecla "Esc"
            allowOutsideClick: true,
            allowEscapeKey: true,
            // Configuração do botão "OK"
            confirmButtonColor: "#3085d6",
            confirmButtonText: "OK"
        }).then((result) => {
            // Verifica se o usuário clicou em "OK"
            // Muda a URL após o SweetAlert ser fechado
            window.location.href = "geren_home.php#section_1";

        });
    </script>

<?php

} else if ($_GET['e'] == md5(1) && $_GET['section'] == 2) {

?>
    <script>
        // Função para mostrar o SweetAlert
        Swal.fire({
            title: "Concluído!",
            text: "Home editado com sucesso",
            icon: "success",
            // Opções para permitir o fechamento clicando fora do SweetAlert e pela tecla "Esc"
            allowOutsideClick: true,
            allowEscapeKey: true,
            // Configuração do botão "OK"
            confirmButtonColor: "#3085d6",
            confirmButtonText: "OK"
        }).then((result) => {
            // Verifica se o usuário clicou em "OK"
            // Muda a URL após o SweetAlert ser fechado
            window.location.href = "geren_home.php#section_2";

        });
    </script>

<?php

} else if ($_GET['e'] == md5(1) && $_GET['section'] == 3) {

?>
    <script>
        // Função para mostrar o SweetAlert
        Swal.fire({
            title: "Concluído!",
            text: "Home editado com sucesso",
            icon: "success",
            // Opções para permitir o fechamento clicando fora do SweetAlert e pela tecla "Esc"
            allowOutsideClick: true,
            allowEscapeKey: true,
            // Configuração do botão "OK"
            confirmButtonColor: "#3085d6",
            confirmButtonText: "OK"
        }).then((result) => {
            // Verifica se o usuário clicou em "OK"
            // Muda a URL após o SweetAlert ser fechado
            window.location.href = "geren_home.php#section_3";

        });
    </script>

<?php

} else if ($_GET['e'] == md5(1) && $_GET['section'] == 4) {

?>
    <script>
        // Função para mostrar o SweetAlert
        Swal.fire({
            title: "Concluído!",
            text: "Home editado com sucesso",
            icon: "success",
            // Opções para permitir o fechamento clicando fora do SweetAlert e pela tecla "Esc"
            allowOutsideClick: true,
            allowEscapeKey: true,
            // Configuração do botão "OK"
            confirmButtonColor: "#3085d6",
            confirmButtonText: "OK"
        }).then((result) => {
            // Verifica se o usuário clicou em "OK"
            // Muda a URL após o SweetAlert ser fechado
            window.location.href = "geren_home.php#section_4";

        });
    </script>

<?php

} else if ($_GET['e'] == md5(1) && $_GET['section'] == 5) {

?>
    <script>
        // Função para mostrar o SweetAlert
        Swal.fire({
            title: "Concluído!",
            text: "Home editado com sucesso",
            icon: "success",
            // Opções para permitir o fechamento clicando fora do SweetAlert e pela tecla "Esc"
            allowOutsideClick: true,
            allowEscapeKey: true,
            // Configuração do botão "OK"
            confirmButtonColor: "#3085d6",
            confirmButtonText: "OK"
        }).then((result) => {
            // Verifica se o usuário clicou em "OK"
            // Muda a URL após o SweetAlert ser fechado
            window.location.href = "geren_home.php#section_5";

        });
    </script>

<?php

} else if ($_GET['e'] == md5(1) && $_GET['section'] == 0) {

?>
    <script>
        // Função para mostrar o SweetAlert
        Swal.fire({
            title: "Concluído!",
            text: "Home editado com sucesso",
            icon: "success",
            // Opções para permitir o fechamento clicando fora do SweetAlert e pela tecla "Esc"
            allowOutsideClick: true,
            allowEscapeKey: true,
            // Configuração do botão "OK"
            confirmButtonColor: "#3085d6",
            confirmButtonText: "OK"
        }).then((result) => {
            // Verifica se o usuário clicou em "OK"
            // Muda a URL após o SweetAlert ser fechado
            window.location.href = "geren_home.php#section_1";

        });
    </script>

<?php

} else if ($_GET['e'] == md5(1)) {

?>
    <script>
        // Função para mostrar o SweetAlert
        Swal.fire({
            title: "Concluído!",
            text: "Home editado com sucesso",
            icon: "success",
            // Opções para permitir o fechamento clicando fora do SweetAlert e pela tecla "Esc"
            allowOutsideClick: true,
            allowEscapeKey: true,
            // Configuração do botão "OK"
            confirmButtonColor: "#3085d6",
            confirmButtonText: "OK"
        }).then((result) => {
            // Verifica se o usuário clicou em "OK"
            // Muda a URL após o SweetAlert ser fechado
            window.location.href = "geren_home.php";

        });
    </script>

<?php

}
?>

</html>