<?php
session_start();
require_once "../../scripts/connection.php";

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
        }
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

    <header class="conteiner">

    </header>

    <main>
        <h1 class="title-adm py-3">Painel Administrativo</h1>
        <div class="bg-dark-subtle border-dark border border-end-0 border-start-0 text-center py-3 mb-3">
            <h3 class="title-adm2">Gerenciador da pág. Alergia Alimentar</h3>
            <p class="title-adm2">Local destinado para o gerenciamento do conteúdo da página de Alergias Alimentares.</p>
        </div>
        <form action="../../scripts/update_section.php" method="POST" enctype='multipart/form-data'>
            <section class="section-1 mb-5" id="section_1"> <!-- 1 -->
                <div class="w-100 mt-5">
                    <img id="preview2" src="../../fotos/outros/<?php echo $foto_banner; ?>" style="width: 100%;" height="600px" alt="banner">
                </div>
                <input class='form-control border-1 border-dark w-50 mb-2' type="file" name="imagem" id="imagem2" onchange="previewImagem2(event)">
                <div class="text-center">
                    <button type="submit" style="border-radius: 10px;" class="btn-section-1 p-2 bg-secondary-subtle text-black border border-dark ">Salvar</button>
                </div>
                <input type="hidden" id="section" name="section" value="11">
                <input type="hidden" id="alergia" name="alergia" value="1">

            </section>
        </form>
        <div class="mx-5 mb-5">
            <?php

            $sql_alergia = "SELECT * FROM alergia_alimentar";
            $result_alergia = $conn->query($sql_alergia);

            if ($result_alergia->num_rows > 0) {

                while ($row_alergia = $result_alergia->fetch_assoc()) {

            ?>
                    <form action="../../scripts/edit_alergia.php" method="POST" class="mb-5">
                        <section class="border border-dark border-2" id="s<?php echo $row_alergia['IdAlergia_Alimentar'] ?>">
                            <textarea class="" name="editor<?php echo $row_alergia['IdAlergia_Alimentar'] ?>"><?php echo $row_alergia['Text_Area']; ?></textarea>
                            <script>
                                CKEDITOR.replace('editor<?php echo $row_alergia['IdAlergia_Alimentar'] ?>');
                            </script>
                        </section>
                        <div class="ms-3 mt-2 row">
                            <div class="col-4"></div>
                            <div class="col-2 ps-4"><label for="">Escolha a cor de fundo</label></div>
                            <div class="col-1"><input type="color" class="form-control form-control-color border border-dark-subtle" id="favcolor2" name="favcolor" value="<?php echo $row_alergia['Cor']; ?>"></div>
                        </div>
                        <input type="hidden" name="id_section<?php echo $row_alergia['IdAlergia_Alimentar'] ?>" value="<?php echo $row_alergia['IdAlergia_Alimentar'] ?>">
                        <div class="text-center">
                            <button class='btn bg-primary-subtle border border-dark mt-4' type="submit">Editar</button>
                            <a class='btn bg-danger-subtle border border-dark mt-4' onclick="AlertDeletAlergia(<?php echo $row_alergia['IdAlergia_Alimentar'] ?>)">Excluir</a>
                        </div>
                    </form>

            <?php
                }
            }
            ?>

            <form action="../../scripts/cad_alergia.php" method="POST">
                <div class="border border-dark">
                    <h3 class="text-center fw-bold mb-5 ">Adicionar Nova Seção</h3>

                    <section id="section_0">
                        <textarea name="editor0" value="<?php echo $test_area; ?>"></textarea>
                        <script>
                            CKEDITOR.replace('editor0');
                        </script>


                    </section>
                </div>
                <div class="ms-3 mt-2 row">
                    <div class="col-4"></div>
                    <div class="col-2 ps-4"><label for="">Escolha a cor de fundo</label></div>
                    <div class="col-1"><input type="color" class="form-control form-control-color border border-dark-subtle" id="favcolor" name="favcolor" value="#ffffff"></div>
                </div>
                <div class="text-center">
                    <button class='btn border border-dark mt-4' style="background-color: #f7d67c;" type="submit">Salvar</button>
                </div>
            </form>

        </div>


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
                    <label for="opcao2">Visitar Alergia Alimentar</label>
                    <button id="opcao2">
                        <i class='bx bxs-home'></i>
                    </button>
                </li>
            </ul>
        </div>
    </main>
    <script>
        var botao1 = document.getElementById("opcao1");
        var botao2 = document.getElementById("opcao2");

        botao1.addEventListener("click", function() {
            window.location.href = "../index.php";
        });

        botao2.addEventListener("click", function() {
            window.location.href = "../../views/alergia_alimentar.php";
        });
    </script>

    <?php

    if (!isset($_GET['e'])) {
    } else if ($_GET['e'] == md5(1)) {

    ?>
        <script>
            // Função para mostrar o SweetAlert
            Swal.fire({
                title: "Concluído!",
                text: "Secão adicionada com sucesso.",
                icon: "success"

            }).then((result) => {
                // Verifica se o usuário clicou em "OK"
                // Muda a URL após o SweetAlert ser fechado
                window.location.href = "geren_alergias.php";

            });
        </script>

    <?php

    } else if ($_GET['e'] == md5(2) && isset($_GET['s']) && !empty($_GET['s'])) {

        $num = $_GET['s'];
    ?>
        <script>
            function AlertCaminhoSessao(num) {
                Swal.fire({
                    title: "Concluído!",
                    text: "Seção editada com sucesso.",
                    icon: "success"
                }).then((result) => {
          
                    window.location.href = `geren_alergias.php#s${num}`;
                });
            }

            AlertCaminhoSessao("<?php echo $num; ?>");
        </script>


    <?php } else if ($_GET['e'] == md5(2)) {

    ?>
        <script>
            // Função para mostrar o SweetAlert
            Swal.fire({
                title: "Concluído!",
                text: "Secão editada com sucesso.",
                icon: "success"

            }).then((result) => {
                // Verifica se o usuário clicou em "OK"
                // Muda a URL após o SweetAlert ser fechado
                window.location.href = "geren_alergias.php";

            });
        </script>

    <?php } else if ($_GET['e'] == md5(3)) {

    ?>
        <script>
            // Função para mostrar o SweetAlert
            Swal.fire({
                title: "Concluído!",
                text: "Secão excluída com sucesso.",
                icon: "success"

            }).then((result) => {
                // Verifica se o usuário clicou em "OK"
                // Muda a URL após o SweetAlert ser fechado
                window.location.href = "geren_alergias.php";

            });
        </script>

    <?php } else if ($_GET['e'] == md5(5)) {

    ?>
        <script>
            // Função para mostrar o SweetAlert
            Swal.fire({
                title: "Concluído!",
                text: "Banner editado com sucesso.",
                icon: "success"

            }).then((result) => {
                // Verifica se o usuário clicou em "OK"
                // Muda a URL após o SweetAlert ser fechado
                window.location.href = "geren_alergias.php";

            });
        </script>

    <?php } else { ?>

    <?php } ?>


    <script>
        function AlertDeletAlergia(id) {
            Swal.fire({
                title: 'Tem certeza?',
                text: 'Você não será capaz de reverter isso!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sim, excluir!',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = `../../scripts/delet_alergia.php?id=${id}`;
                }
            });
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
</body>

</html>