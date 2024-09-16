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

if (!isset($_GET["id"])) {
  header("Location: ../index.php?e=a87ff679a2f3e71d9181a67b7542122c");
  exit();
}

if (empty($_GET["id"])) {
  header("Location: ../index.php?e=a87ff679a2f3e71d9181a67b7542122c");
  exit();
}


$id = $_SESSION['id_usuario'];
$edit_id = $_GET["id"];

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
    $nivel = $row["Nivel"];


    $sql1 = "SELECT * FROM profissionais WHERE IdProfissional ='$edit_id'";
    $result1 = $conn->query($sql1);

    if ($result1->num_rows > 0) {

      while ($row2 = $result1->fetch_assoc()) {
        $foto2 = $row2["Foto"];
        $nome2 = $row2["Nome"];
        $email2 = $row2["Email"];
        $profissao2 = $row2["Profissao"];
        $local_atendimento2 = $row2["Local_Atendimento"];
        $horario_atendimento2 = $row2["Horario_Atendimento"];
        $telefone2 = $row2["Telefone"];
        $biografia2 = $row2["Biografia"];
        $precos2 = $row2["Precos"];
      }
    } else {
      header("Location: ../index.php?e=a87ff679a2f3e71d9181a67b7542122c");
      exit();
    }
  }
} else {
  header("Location: ../../index.php");
  exit();
}
if ($nivel == 1) {
  header("Location: ../../index.php");
  exit();
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

  <link rel="stylesheet" href="../../css/style-sidebar.css">
  <script src="../../js/sidebar.js" defer></script>
  <link rel="stylesheet" href="../../css/style-form-adm.css">
  <link rel="stylesheet" href="../../css/style-form-edit.css">
  <script src="https://cdn.ckeditor.com/4.22.1/full/ckeditor.js"></script>
  <title>FoodHelp</title>

</head>

<body>
  <header>
    <nav class="sidebar locked">
      <div class="logo_items flex">
        <span class="nav_image">
          <img src="../../fotos/outros/logo.png" alt="logo_img" />
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
              <a href="../index.php?e=c4ca4238a0b923820dcc509a6f75849b" class="link flex">
                <i class='bx bx-user'></i>
                <span>Usuários</span>
              </a>
            </li>
            <li class="item">
              <a href="../index.php?e=c81e728d9d4c2f636f067f89cc14862c" class="link flex">
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
              <a href="../index.php?e=a87ff679a2f3e71d9181a67b7542122c" class="link flex">
                <i class='bx bx-user-circle'></i>
                <span>Profissionais</span>
              </a>
            </li>
            <li class="item">
              <a href="../index.php?e=e4da3b7fbbce2345d7772b0674a318d5" class="link flex">
                <i class='bx bx-notepad'></i>
                <span>Receitas</span>
              </a>
            </li>
            <li class="item">
              <a href="../index.php?e=072b030ba126b2f4b2374f342be9ed44" class="link flex">
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
                <a href="geren_home.php" class="link flex">
                  <i class='bx bx-home-alt'></i>
                  <span>Home</span>
                </a>
              </li>
              <li class="item">
                <a href="geren_alergias.php" class="link flex">
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
              <a href="../../index.php" class="link flex">
                <i class='bx bx-subdirectory-left'></i>
                <span>Visitar Home</span>
              </a>
            </li>
            <li class="item">
              <a href="../../views/perfil_profissional.php?i=<?php echo $edit_id; ?>" class="link flex">
                <i class='bx bx-subdirectory-left'></i>
                <span>Ver Profissional</span>
              </a>
            </li>
            <li class="item">
              <a href="form_edit_adm.php?id=<?php echo $id; ?>" class="link flex">
                <i class='bx bx-user'></i>
                <span>Editar Perfil</span>
              </a>
            </li>
            <li class="item">
              <a href="../../scripts/logout.php" class="link flex">
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

              <img src="../../fotos/administradores/<?php echo $foto; ?>" alt="logo_" />

            <?php } else { ?>

              <img src="../../fotos/outros/user.png" alt="foto_img" />

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

  <main>

    <div class='section-1 mt-5'>

      <div>
        <h3 class=' title-adm2'>Painel de Profissionais</h3>
        <p class=' title-adm2 pb-3'>Local de listagem e gerenciamento de profissionais.</p>
      </div>

      <div class='caixa__login_edit p-4 border-opacity-50 border border-black'>

        <a href='../index.php?e=a87ff679a2f3e71d9181a67b7542122c' class='x-sair'>X</a>

        <h3 class='text-center text-title pb-4'>Editando Profissional</h3>

        <form class='row' action='../../scripts/edit_prof.php' method='POST' enctype='multipart/form-data'>

          <div class='col-5'>
            <div class='caixa__login-input'>
              <input type='text' name='nome' id='nome' value='<?php echo $nome2; ?>' />
              <label style='color:#16a776; font-size: 13px; top: -20px;'>Nome Completo</label>
            </div>

            <div class='caixa__login-input'>
              <input type='text' name='email' id='email' value='<?php echo $email2; ?>' />
              <label style='color:#16a776; font-size: 13px; top: -20px;'>Email</label>
            </div>
            <div class='caixa__login-input'>
              <input type='text' name='profissao' id='profissao' value='<?php echo $profissao2; ?>' />
              <label style='color:#16a776; font-size: 13px; top: -20px;'>Profissão</label>
            </div>

          </div>

          <div class='col-1'></div>

          <div class='col-5'>
            <?php if (isset($foto2)) { ?>
              <img id="preview" height="200" src="../../fotos/profissionais/<?php echo $foto2; ?>" class="pb-2" style="border-radius: 30px; min-width: 200px; max-width: 300px;">
            <?php } else { ?>
              <img id="preview" height="200" src="../../fotos/outros/user.png" class="pb-2" style="border-radius: 30px; min-width: 200px; max-width: 300px;">
            <?php } ?> <br>
            <input class='form-control border-1 border-dark' accept='image/*' type='file' name='imagem' id='imagem' onchange='previewImagem(event)'>
          </div>

          <div class='mt-3 row'>
            <div class='col-6'>
              <div class='caixa__login-input'>
                <input type='text' name='local_atendimento' id='local_atendimento' value='<?php echo $local_atendimento2; ?>' />
                <label style='color:#16a776; font-size: 13px; top: -20px;'>Local de Atendimento</label>
              </div>

              <div class='caixa__login-input'>
                <input type='text' minlength='8' maxlength='14' name='telefone' id='telefone' value='<?php echo $telefone2; ?>' />
                <label style='color:#16a776; font-size: 13px; top: -20px;'>Número de Telefone</label>
              </div>
            </div>

            <div class='col-6'>
              <div class='caixa__login-input'>
                <input type='text' name='horario_atendimento' id='horario_atendimento' value='<?php echo $horario_atendimento2; ?>' />
                <label style='color:#16a776; font-size: 13px; top: -20px;'>Horário de Atendimento</label>
              </div>

              <div class='caixa__login-input'>
                <input type='text' name='preco' id='preco' value='<?php echo $precos2; ?>' />
                <label style='color:#16a776; font-size: 13px; top: -20px;'>Preços</label>
              </div>
            </div>
          </div>
          <div class='row'>
            <div class='col-12 mb-4'>
              <label style='top: -10px; left: 0; color: #16a776; font-size: 13px;'>Biografia</label>
              <textarea name='biografia' id='biografia'><?php echo $biografia2; ?></textarea>
              <script>
                CKEDITOR.replace('biografia');
              </script>
            </div>
          </div>

          <div class='col-5'></div>

          <input type='hidden' name='id_profissional' id='id_profissional' value='<?php echo $edit_id; ?>'>

          <button type='submit' class='btn border border-black border-opacity-25 ml-3' style='background-color:#80CCB1; width: 120px'>Salvar</button>
        </form>
      </div>

    </div>

  </main>

  <?php

  if (!isset($_GET['e'])) {
  } else if ($_GET['e'] == md5(45)) {

  ?>
    <script>
      swal.fire("Atenção!", "Todos os campos precisão estar preenchidos", "error");
    </script>

  <?php

  }
  ?>
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
    // Obtenha o valor da variável PHP $foto
    var foto = "<?php echo $foto2; ?>";

    // Defina o valor do campo de arquivo usando JavaScript
    document.getElementById('imagem').value = foto;
  </script>
</body>

</html>