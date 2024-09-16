<?php
session_start();

if (!isset($_SESSION['id_usuario']) && !isset($_SESSION['nivel_usuario'])) {
  header("Location: ../index.php");
  exit();

  $nvl = $_SESSION['nivel_usuario'];

  if ($nvl >= 3 && $nvl < 1) {
  } else {
    header("Location: ../index.php");
    exit();
  }
}
$id = $_SESSION['id_usuario'];

require_once "../scripts/connection.php";

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

if ($nivel == 1) {
  header("Location: ../index.php");
  exit();
}

if (isset($_GET['e']) && !empty($_GET['e'])) {
  $e = $_GET['e'];
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

  <link rel="shortcut icon" href="../fotos/outros/favicon_foodhelp.png" type="image/x-icon" />
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <link flex href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

  <link rel="stylesheet" href="../css/style-sidebar.css">
  <script src="https://cdn.ckeditor.com/4.22.1/full/ckeditor.js"></script>
  <script src="../js/sidebar.js" defer></script>
  <link rel="stylesheet" href="../css/style-form-edit.css">
  <link rel="stylesheet" href="../css/style-form-adm.css">
  <link rel="stylesheet" href="../css/style-botao-flutuante.css">
  <script src="../js/botao-flutuante.js" defer></script>
  <title>FoodHelp</title>
  <style>
    .box {
      border-radius: 15px;
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

    .user-info {
      display: flex;
      align-items: center;
      /* Alinha verticalmente ao centro */
    }

    .user-info img {
      margin-right: 10px;
      /* Espaço entre a imagem e o texto */
    }


    .comentarios {
      width: 100%;
      height: 450px;
      /* Altura fixa da div */
      overflow: auto;
      /* Adiciona uma barra de rolagem quando o conteúdo excede a altura */
    }
  </style>
</head>

<body>
  <header>
    <nav class="sidebar locked">
      <div class="logo_items flex">
        <span class="nav_image">
          <img src="../fotos/outros/logo.png" alt="logo_img" />
        </span>
        <span class="logo_name">FoodHelp</span>
        <i class="bx bx-lock-alt" id="lock-icon" title="Unlock Sidebar"></i>
        <i class="bx bx-x" id="sidebar-close"></i>
      </div>
      <div class="menu_container">
        <div class="menu_items ">
          <!-- div star -->
          <ul class="menu_item p-0">
            <div class="menu_title flex">
              <span class="title">Visitantes</span>
              <span class="line"></span>
            </div>
            <li class="item">
              <a href="index.php?e=c4ca4238a0b923820dcc509a6f75849b" class="link flex">
                <i class='bx bx-user'></i>
                <span>Usuários</span>
              </a>
            </li>
            <li class="item">
              <a href="index.php?e=c81e728d9d4c2f636f067f89cc14862c" class="link flex">
                <i class='bx bx-user'></i>
                <span>Administradores</span>
              </a>
            </li>
          </ul>
          <!-- div end -->

          <!-- div star -->
          <ul class="menu_item p-0">
            <div class="menu_title flex">
              <span class="title">Paineis</span>
              <span class="line"></span>
            </div>
            <li class="item">
              <a href="index.php?e=a87ff679a2f3e71d9181a67b7542122c" class="link flex">
                <i class='bx bx-user-circle'></i>
                <span>Profissionais</span>
              </a>
            </li>
            <li class="item">
              <a href="index.php?e=e4da3b7fbbce2345d7772b0674a318d5" class="link flex">
                <i class='bx bx-notepad'></i>
                <span>Receitas</span>
              </a>
            </li>
            <li class="item">
              <a href="index.php?e=072b030ba126b2f4b2374f342be9ed44" class="link flex">
                <i class='bx bx-envelope'></i>
                <span>Inscrições</span>
              </a>
            </li>
          </ul>
          <!-- div end -->
          <?php if ($nivel == 3) { ?>

            <ul class="menu_item p-0">
              <div class="menu_title flex">
                <span class="title">Páginas</span>
                <span class="line"></span>
              </div>
              <li class="item">
                <a href="dashboard/geren_home.php" class="link flex">
                  <i class='bx bx-home-alt'></i>
                  <span>Home</span>
                </a>
              </li>
              <li class="item">
                <a href="dashboard/geren_alergias.php" class="link flex">
                  <i class='bx bx-home-alt'></i>
                  <span>Alergia</span>
                </a>
              </li>
            </ul>
          <?php } ?>

          <!-- div star -->
          <ul class="menu_item p-0">
            <div class="menu_title flex">
              <span class="title">Opções</span>
              <span class="line"></span>
            </div>
            <li class="item">
              <a href="../index.php" class="link flex">
                <i class='bx bx-subdirectory-left'></i>
                <span>Visitar Home</span>
              </a>
            </li>
            <li class="item">
              <a href="dashboard/form_edit_adm.php?id=<?php echo $id; ?>" class="link flex">
                <i class='bx bx-user'></i>
                <span>Editar Perfil</span>
              </a>
            </li>
            <li class="item">
              <a href="../scripts/logout.php" class="link flex">
                <i class='bx bx-log-out'></i>
                <span>Sair</span>
              </a>
            </li>
          </ul>
          <!-- div end -->

        </div>
        <div class="sidebar_profile flex">
          <span class="nav_image">

            <?php if (isset($foto)) { ?>

              <img src="../fotos/administradores/<?php echo $foto; ?>" alt="user_img" />

            <?php } else { ?>

              <img src="../fotos/outros/user.png" alt="foto_img" />

            <?php } ?>


          </span>
          <div class="data_text">
            <span class="name">
              <?php echo $nome; ?>
            </span>
            <span class="email">
              <?php echo $email; ?>
            </span>
          </div>
        </div>
      </div>
    </nav>
  </header>

  <main class="pt-5">

    <!--<h1 class="title-adm py-3">Painel Administrativo</h1>
    <hr> -->

    <div>
      <?php
      if (!isset($_GET['e']) && empty($_GET['e'])) {

        include('dashboard/list_user.php');
      } else if ($_GET['e'] == md5(1)) {

        include('dashboard/list_user.php');
      } else if ($_GET['e'] == md5(2)) {

        include('dashboard/list_adm.php');
      } else if ($_GET['e'] == md5(25)) {

        include('dashboard/list_adm.php'); ?>

        <script>
          Swal.fire({
            title: "Parabéns!",
            text: "Administrador cadastrado com sucesso",
            icon: "success",

            allowOutsideClick: true,
            allowEscapeKey: true,

            confirmButtonColor: "#3085d6",
            confirmButtonText: "OK"

          }).then((result) => {
            window.location.href = "index.php?e=c81e728d9d4c2f636f067f89cc14862c";

          });
        </script>

      <?php

      } else if ($_GET['e'] == md5(31)) {

        include('dashboard/form_adm.php'); ?>

        <script>
          Swal.fire({
            title: "Atenção!",
            text: "Nome é obrigatório",
            icon: "error",

            allowOutsideClick: true,
            allowEscapeKey: true,

            confirmButtonColor: "#3085d6",
            confirmButtonText: "OK"
          }).then((result) => {

            window.location.href = "index.php?e=eccbc87e4b5ce2fe28308fd9f2a7baf3";

          });
        </script>
      <?php

      } else if ($_GET['e'] == md5(32)) {

        include('dashboard/form_adm.php'); ?>

        <script>
          Swal.fire({
            title: "Atenção!",
            text: "Email é obrigatório",
            icon: "error",

            allowOutsideClick: true,
            allowEscapeKey: true,

            confirmButtonColor: "#3085d6",
            confirmButtonText: "OK"
          }).then((result) => {

            window.location.href = "index.php?e=eccbc87e4b5ce2fe28308fd9f2a7baf3";

          });
        </script>

      <?php

      } else if ($_GET['e'] == md5(33)) {

        include('dashboard/form_adm.php'); ?>

        <script>
          Swal.fire({
            title: "Atenção!",
            text: "Senha é obrigatório",
            icon: "error",

            allowOutsideClick: true,
            allowEscapeKey: true,

            confirmButtonColor: "#3085d6",
            confirmButtonText: "OK"
          }).then((result) => {

            window.location.href = "index.php?e=eccbc87e4b5ce2fe28308fd9f2a7baf3";

          });
        </script>

      <?php

      } else if ($_GET['e'] == md5(3132) || $_GET['e'] == md5(3133) || $_GET['e'] == md5(3233) || $_GET['e'] == md5(313233)) {

        include('dashboard/form_adm.php'); ?>

        <script>
          Swal.fire({
            title: "Atenção!",
            text: "Todos os campos são obrigatório",
            icon: "error",

            allowOutsideClick: true,
            allowEscapeKey: true,

            confirmButtonColor: "#3085d6",
            confirmButtonText: "OK"
          }).then((result) => {

            window.location.href = "index.php?e=eccbc87e4b5ce2fe28308fd9f2a7baf3";

          });
        </script>

      <?php

      } else if ($_GET['e'] == md5(3)) {

        include('dashboard/form_adm.php');
      } else if ($_GET['e'] == md5(4)) {

        include('dashboard/list_prof.php');
      } else if ($_GET['e'] == md5(5)) {

        include('dashboard/list_receita.php');
      } else if ($_GET['e'] == md5(6)) {

        include('dashboard/list_adm.php'); ?>


        <script>
          Swal.fire({
            title: "Concluído!",
            text: "Administrador excluido com sucesso",
            icon: "success",

            allowOutsideClick: true,
            allowEscapeKey: true,

            confirmButtonColor: "#3085d6",
            confirmButtonText: "OK"
          }).then((result) => {

            window.location.href = "index.php?e=c81e728d9d4c2f636f067f89cc14862c";

          });
        </script>

      <?php } else if ($_GET['e'] == md5(7)) {

        include('dashboard/list_user.php'); ?>

        <script>
          Swal.fire({
            title: "Concluído!",
            text: "Usuário excluido com sucesso",
            icon: "success",

            allowOutsideClick: true,
            allowEscapeKey: true,

            confirmButtonColor: "#3085d6",
            confirmButtonText: "OK"
          }).then((result) => {

            window.location.href = "index.php?e=c4ca4238a0b923820dcc509a6f75849b";

          });
        </script>


      <?php } else if ($_GET['e'] == md5(8)) {

        include('dashboard/list_adm.php'); ?>

        <script>
          Swal.fire({
            title: "Atenção!",
            text: "Você não pode se excluir",
            icon: "error",

            allowOutsideClick: true,
            allowEscapeKey: true,

            confirmButtonColor: "#3085d6",
            confirmButtonText: "OK"
          }).then((result) => {

            window.location.href = "index.php?e=c81e728d9d4c2f636f067f89cc14862c";

          });
        </script>

      <?php

      } else if ($_GET['e'] == md5(9)) {

        include('dashboard/list_user.php'); ?>

        <script>
          Swal.fire({
            title: "Concluído!",
            text: "Perfil editado com sucesso",
            icon: "success",

            allowOutsideClick: true,
            allowEscapeKey: true,

            confirmButtonColor: "#3085d6",
            confirmButtonText: "OK"
          }).then((result) => {

            window.location.href = "index.php?e=c4ca4238a0b923820dcc509a6f75849b";

          });
        </script>
      <?php

      } else if ($_GET['e'] == md5(10)) {

        include('dashboard/list_adm.php'); ?>

        <script>
          Swal.fire({
            title: "Concluído!",
            text: "Perfil editado com sucesso",
            icon: "success",

            allowOutsideClick: true,
            allowEscapeKey: true,

            confirmButtonColor: "#3085d6",
            confirmButtonText: "OK"
          }).then((result) => {

            window.location.href = "index.php?e=c81e728d9d4c2f636f067f89cc14862c";

          });
        </script>
      <?php

      } else if ($_GET['e'] == md5(11)) {

        include('dashboard/list_adm.php'); ?>

        <script>
          Swal.fire({
            title: "Atenção!",
            text: "Você não pode excluir alguem superior a você",
            icon: "error",

            allowOutsideClick: true,
            allowEscapeKey: true,

            confirmButtonColor: "#3085d6",
            confirmButtonText: "OK"
          }).then((result) => {

            window.location.href = "index.php?e=c81e728d9d4c2f636f067f89cc14862c";

          });
        </script>

      <?php

      } else if ($_GET['e'] == md5(12)) {

        include('dashboard/form_prof.php');
      } else if ($_GET['e'] == md5(41)) {

        include('dashboard/form_prof.php'); ?>

        <script>
          Swal.fire({
            title: "Atenção!",
            text: "Todos os campos são obrigatórios",
            icon: "error",

            allowOutsideClick: true,
            allowEscapeKey: true,

            confirmButtonColor: "#3085d6",
            confirmButtonText: "OK"
          }).then((result) => {

            window.location.href = "index.php?e=a87ff679a2f3e71d9181a67b7542122c";

          });
        </script>

      <?php

      } else if ($_GET['e'] == md5(42)) {

        include('dashboard/list_prof.php'); ?>

        <script>
          Swal.fire({
            title: "Concluído!",
            text: "Profissional cadastrado com sucesso",
            icon: "success",

            allowOutsideClick: true,
            allowEscapeKey: true,

            confirmButtonColor: "#3085d6",
            confirmButtonText: "OK"
          }).then((result) => {

            window.location.href = "index.php?e=a87ff679a2f3e71d9181a67b7542122c";

          });
        </script>

      <?php

      } else if ($_GET['e'] == md5(43)) {

        include('dashboard/list_prof.php'); ?>

        <script>
          Swal.fire({
            title: "Concluído!",
            text: "Profissional deletado com sucesso",
            icon: "success",

            allowOutsideClick: true,
            allowEscapeKey: true,

            confirmButtonColor: "#3085d6",
            confirmButtonText: "OK"
          }).then((result) => {

            window.location.href = "index.php?e=a87ff679a2f3e71d9181a67b7542122c";

          });
        </script>

      <?php

      } else if ($_GET['e'] == md5(44)) {

        include('dashboard/list_prof.php'); ?>

        <script>
          Swal.fire({
            title: "Concluído!",
            text: "Profissional editado com sucesso",
            icon: "success",

            allowOutsideClick: true,
            allowEscapeKey: true,

            confirmButtonColor: "#3085d6",
            confirmButtonText: "OK"
          }).then((result) => {

            window.location.href = "index.php?e=a87ff679a2f3e71d9181a67b7542122c";

          });
        </script>

      <?php

      } else if ($_GET['e'] == md5(51)) {

        include('dashboard/form_receita.php');
      } else if ($_GET['e'] == md5(52)) {

        include('dashboard/form_receita.php'); ?>

        <script>
          Swal.fire({
            title: "Atenção!",
            text: "Todos os campos são obrigatórios",
            icon: "error",

            allowOutsideClick: true,
            allowEscapeKey: true,

            confirmButtonColor: "#3085d6",
            confirmButtonText: "OK"
          }).then((result) => {

            window.location.href = "index.php?e=2838023a778dfaecdc212708f721b788";

          });
        </script>

      <?php

      } else if ($_GET['e'] == md5(53)) {

        include('dashboard/list_receita.php'); ?>

        <script>
          Swal.fire({
            title: "Concluído!",
            text: "Receita adicionada com sucesso",
            icon: "success",

            allowOutsideClick: true,
            allowEscapeKey: true,

            confirmButtonColor: "#3085d6",
            confirmButtonText: "OK"
          }).then((result) => {

            window.location.href = "index.php?e=e4da3b7fbbce2345d7772b0674a318d5";

          });
        </script>

      <?php

      } else if ($_GET['e'] == md5(54)) {

        include('dashboard/list_receita.php'); ?>

        <script>
          Swal.fire({
            title: "Concluído!",
            text: "Receita editada com sucesso",
            icon: "success",

            allowOutsideClick: true,
            allowEscapeKey: true,

            confirmButtonColor: "#3085d6",
            confirmButtonText: "OK"
          }).then((result) => {

            window.location.href = "index.php?e=e4da3b7fbbce2345d7772b0674a318d5";

          });
        </script>


      <?php

      } else if ($_GET['e'] == md5(60)) {

        include('dashboard/list_inscricoes_prof.php');

        include('dashboard/list_inscricoes_rec.php');
      } else if ($_GET['e'] == md5(61)) {

        include('dashboard/list_inscricoes_prof.php');

        include('dashboard/list_inscricoes_rec.php'); ?>

        <script>
          Swal.fire({
            title: "Concluído!",
            text: "Inscrição deletada com sucesso",
            icon: "success",

            allowOutsideClick: true,
            allowEscapeKey: true,

            confirmButtonColor: "#3085d6",
            confirmButtonText: "OK"
          }).then((result) => {

            window.location.href = "index.php?e=072b030ba126b2f4b2374f342be9ed44";

          });
        </script>

      <?php

      } else if ($_GET['e'] == md5(62)) {

        include('dashboard/list_inscricoes_prof.php');

        include('dashboard/list_inscricoes_rec.php'); ?>

        <script>
          Swal.fire({
            title: "Concluído!",
            text: "Inscrição aprovada com sucesso",
            icon: "success",

            allowOutsideClick: true,
            allowEscapeKey: true,

            confirmButtonColor: "#3085d6",
            confirmButtonText: "OK"
          }).then((result) => {

            window.location.href = "index.php?e=072b030ba126b2f4b2374f342be9ed44";

          });
        </script>

      <?php

      } else if ($_GET['e'] == md5(70)) {

        include('dashboard/list_receita.php'); ?>

        <script>
          Swal.fire({
            title: "Concluído!",
            text: "Comentário deltado com sucesso",
            icon: "success",

            allowOutsideClick: true,
            allowEscapeKey: true,

            confirmButtonColor: "#3085d6",
            confirmButtonText: "OK"
          }).then((result) => {

            window.location.href = "index.php?e=e4da3b7fbbce2345d7772b0674a318d5";

          });
        </script>

      <?php

      } else if ($_GET['e'] == md5(73)) {

        include('dashboard/list_prof.php');

      ?>
        <script>
          Swal.fire({
            title: "Atenção!",
            text: "Esse email já está cadastrado.",
            icon: "error",

            allowOutsideClick: true,
            allowEscapeKey: true,

            confirmButtonColor: "#3085d6",
            confirmButtonText: "OK"
          }).then((result) => {

            window.location.href = "index.php?e=a87ff679a2f3e71d9181a67b7542122c";

          });
        </script>
      <?php } else if ($_GET['e'] == md5(74)) {

        include('dashboard/list_prof.php');

      ?>
        <script>
          Swal.fire({
            title: "Atenção!",
            text: "Esse telefone já está cadastrado.",
            icon: "error",

            allowOutsideClick: true,
            allowEscapeKey: true,

            confirmButtonColor: "#3085d6",
            confirmButtonText: "OK"
          }).then((result) => {

            window.location.href = "index.php?e=a87ff679a2f3e71d9181a67b7542122c";

          });
        </script>
      <?php } else if ($_GET['e'] == md5(75)) {

        include('dashboard/list_inscricoes_prof.php');

        include('dashboard/list_inscricoes_rec.php');
      ?>
        <script>
          Swal.fire({
            title: "Atenção!",
            text: "Esse email já está cadastrado.",
            icon: "error",

            allowOutsideClick: true,
            allowEscapeKey: true,

            confirmButtonColor: "#3085d6",
            confirmButtonText: "OK"
          }).then((result) => {

            window.location.href = "index.php?e=072b030ba126b2f4b2374f342be9ed44";

          });
        </script>
      <?php } else if ($_GET['e'] == md5(76)) {

        include('dashboard/list_prof.php');

      ?>
        <script>
          Swal.fire({
            title: "Atenção!",
            text: "Esse email já está cadastrado.",
            icon: "error",

            allowOutsideClick: true,
            allowEscapeKey: true,

            confirmButtonColor: "#3085d6",
            confirmButtonText: "OK"
          }).then((result) => {

            window.location.href = "index.php?e=a87ff679a2f3e71d9181a67b7542122c";

          });
        </script>
      <?php } else if ($_GET['e'] == md5(77)) {

        include('dashboard/list_inscricoes_prof.php');

        include('dashboard/list_inscricoes_rec.php');
      ?>
        <script>
          Swal.fire({
            title: "Atenção!",
            text: "Esse telefone já está cadastrado.",
            icon: "error",

            allowOutsideClick: true,
            allowEscapeKey: true,

            confirmButtonColor: "#3085d6",
            confirmButtonText: "OK"
          }).then((result) => {

            window.location.href = "index.php?e=072b030ba126b2f4b2374f342be9ed44";

          });
        </script>
      <?php } else if ($_GET['e'] == md5(78)) {

        include('dashboard/list_prof.php');
      ?>
        <script>
          Swal.fire({
            title: "Atenção!",
            text: "Esse telefone já está cadastrado.",
            icon: "error",

            allowOutsideClick: true,
            allowEscapeKey: true,

            confirmButtonColor: "#3085d6",
            confirmButtonText: "OK"
          }).then((result) => {

            window.location.href = "index.php?e=a87ff679a2f3e71d9181a67b7542122c";

          });
        </script>
      <?php } else if ($_GET['e'] == md5(80)) {

        include('dashboard/list_adm.php'); ?>

        <script>
          Swal.fire({
            title: "Atenção!",
            text: "Esse email já está cadastrado.",
            icon: "error",

            allowOutsideClick: true,
            allowEscapeKey: true,

            confirmButtonColor: "#3085d6",
            confirmButtonText: "OK"
          }).then((result) => {

            window.location.href = "index.php?e=c81e728d9d4c2f636f067f89cc14862c";

          });
        </script>
      <?php } else {
        include('dashboard/list_user.php');
      }
      ?>

    </div>

  </main>

  <script>
    function AlertDeletAdm(id) {
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
          window.location.href = `../scripts/delet_adm.php?id=${id}`;
        }
      });
    }

    function AlertDeletUser(id) {
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
          window.location.href = `../scripts/delet_user.php?id=${id}`;
        }
      });
    }

    function AlertDeletProf(id) {
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
          window.location.href = `../scripts/delet_prof.php?id=${id}`;
        }
      });
    }

    function AlertDeletReceita(id) {
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
          window.location.href = `../scripts/delet_receita.php?id=${id}`;
        }
      });
    }

    function DeletComentario(id) {
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
          window.location.href = `../scripts/delet_comentario.php?id=${id}`;
        }
      });
    }
  </script>

</body>

</html>