<?php

    session_start();

    require_once "../scripts/connection.php";

    if (isset($_SESSION['id_usuario'])) {
        header("location: ../index.php");
        exit();
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <title>FoodHelp</title>
    <style>
        html {
            overflow-x: hidden;
        }

        @import url('https://fonts.googleapis.com/css?family=Open+Sans:300,400,700&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .content {

            border-radius: 15px;
            width: 960px;
            height: 50%;
            justify-content: space-between;
            align-items: center;
            position: relative;

        }

        .content::before {
            content: "";
            position: absolute;
            background-color: <?php echo $cor_cabecalho; ?>;
            width: 40%;
            height: 100%;
            border-top-left-radius: 15px;
            border-bottom-left-radius: 15px;
            left: 0;
        }

        .title {
            font-size: 28px;
            font-weight: bold;
            text-transform: capitalize;
        }

        .title-primary {
            color: #fff;
        }

        .title-second {
            color: <?php echo $cor_cabecalho; ?>;
        }

        .description {
            font-size: 16px;
            font-weight: 500;
            line-height: 30px;
        }

        .description-primary {
            color: #fff;
        }

        .description-second {
            color: #7f8c8d;
        }

        .btn {
            border-radius: 15px;
            text-transform: uppercase;
            color: #fff;
            font-size: 10px;
            padding: 10px 50px;
            cursor: pointer;
            font-weight: bold;
            width: 150px;
            align-self: center;
            border: none;
            margin-top: 1rem;
        }

        .btn-primarya {
            background-color:  <?php echo $cor_section_3; ?> ;
            border: 1px solid <?php echo $cor_cabecalho; ?>;
        }

        .btn-second {
            background-color: <?php echo $cor_section_3; ?>;
            border: 1px solid <?php echo $cor_section_3; ?>;
        }

        .first-content {
            display: flex;
        }

        .first-content .second-column {
            z-index: 11;
        }

        .first-column {
            text-align: center;
            width: 40%;
            z-index: 10;
        }

        .second-column {
            width: 60%;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .form {
            display: flex;
            flex-direction: column;
            width: 55%;
        }

        .form input {
            height: 45px;
            width: 100%;
            border: none;
            background-color: #ecf0f1;
        }

        input:-webkit-autofill {
            -webkit-box-shadow: 0 0 0px 1000px #ecf0f1 inset !important;
            -webkit-text-fill-color: #000 !important;
        }

        .label-input {
            background-color: #ecf0f1;
            display: flex;
            align-items: center;
            margin: 8px;
        }

        .icon-modify {
            color: #7f8c8d;
            padding: 0 5px;
        }

        /* second content*/

        .second-content {
            position: absolute;
            display: flex;
        }

        .second-content .first-column {
            order: 2;
            z-index: -1;
        }

        .second-content .second-column {
            order: 1;
            z-index: -1;
        }

        .sign-in-js .first-content .first-column {
            z-index: -1;
        }

        .sign-in-js .second-content .second-column {
            z-index: 11;
        }

        .sign-in-js .second-content .first-column {
            z-index: 13;
        }

        .sign-in-js .content::before {
            left: 60%;
            border-top-left-radius: 0;
            border-bottom-left-radius: 0;
            border-top-right-radius: 15px;
            border-bottom-right-radius: 15px;
            animation: slidein 0.5s;

            z-index: 12;
        }

        .sign-up-js .content::before {
            animation: slideout 0.5s;

            z-index: 12;
        }

        .sign-up-js .second-content .first-column,
        .sign-up-js .second-content .second-column {
            z-index: -1;
        }

        .sign-up-js .first-content .second-column {
            z-index: 11;
        }

        .sign-up-js .first-content .first-column {
            z-index: 13;
        }


        .sign-in-js .first-content .second-column {

            z-index: -1;
            position: relative;
            animation: deslocamentoEsq 0.5s;
        }

        .sign-up-js .second-content .second-column {
            position: relative;
            z-index: -1;
            animation: deslocamentoDir 0.5s;
        }


        @keyframes deslocamentoEsq {

            from {
                left: 0;
                opacity: 1;
                z-index: 12;
            }

            25% {
                left: -80px;
                opacity: .5;
            }

            50% {
                left: -100px;
                opacity: .2;
            }

            to {
                left: -110px;
                opacity: 0;
                z-index: -1;
            }
        }

        @keyframes deslocamentoEsq {

            from {
                left: 0;
                opacity: 1;
                z-index: 12;
            }

            25% {
                left: -80px;
                opacity: .5;
            }

            50% {
                left: -100px;
                opacity: .2;
            }

            to {
                left: -110px;
                opacity: 0;
                z-index: -1;
            }
        }


        @keyframes deslocamentoDir {

            from {
                left: 0;
                z-index: 12;
            }

            25% {
                left: 80px;
            }

            50% {
                left: 100px;
            }

            to {
                left: 110px;
                z-index: -1;
            }
        }


        /*ANIMAÇÃO CSS*/

        @keyframes slidein {

            from {
                left: 0;
                width: 40%;
            }

            25% {
                left: 5%;
                width: 50%;
            }

            50% {
                left: 25%;
                width: 60%;
            }

            75% {
                left: 45%;
                width: 50%;
            }

            to {
                left: 60%;
                width: 40%;
            }
        }

        @keyframes slideout {

            from {
                left: 60%;
                width: 40%;
            }

            25% {
                left: 45%;
                width: 50%;
            }

            50% {
                left: 25%;
                width: 60%;
            }

            75% {
                left: 5%;
                width: 50%;
            }

            to {
                left: 0;
                width: 40%;
            }
        }

        .caixa__login {
            border-radius: 10px;
        }

        .caixa__login .caixa__login-input {
            position: relative;
        }

        .caixa__login .caixa__login-input input {
            font-size: 16px;
            color: #db0101;
            border: none;
            border-bottom: 1px solid #000000;
            outline: none;
        }

        .caixa__login .caixa__login-input label {

            padding: 10px 0;
            font-size: 16px;
            color: #000000;
            pointer-events: none;
            transition: 0.5s;
        }

        .caixa__login .caixa__login-input input:valid~label,
        .caixa__login .caixa__login-input input:focus~label {
            top: -20px;
            left: 0;
            color: <?php echo $cor_section_3; ?>;
            font-size: 12px;
        }
        input {
            border: none;
            outline: none;
            background: none;
            padding-left: 10px;
        }
    </style>
</head>

<body style="background-image: linear-gradient(to left, #adadad, #d4cfcf, #adadad );">

    <header class="conteiner">
        <nav class="navbar navbar-expand-md fixed-top py-4 border-bottom border-dark" style="background-color: <?php echo $cor_cabecalho;  ?>;">
            <div class="container-fluid col-8 justify-content-center">
            <div class=''><a href="alergia_alimentar.php" class="mx-3 item-nav">Alergias Alimentares</a></div>
                <div class='border-black border-start'><a href="receitas.php" class="mx-3 item-nav">Receitas</a></div>
                <div class='border-black border-start'><a href="../" class="mx-3 item-nav">Home</a></div>
                <div class='border-black border-start'><a href="profissionais.php" class="mx-3 item-nav">Profissionais</a></div>
                <div class='border-black border-start'><a href="entrar.php" class="mx-3 item-nav">Entrar</a></div>

            </div>
        </nav>
    </header>
    <main>
        <div class="container">
            <div class="content first-content" style="background-color: #fff;">
                <div class="first-column">
                    <h2 class="title title-primary">Seja Bem-Vindo!</h2>
                    <p class="description description-primary">Caso não possua um conta clique</p>
                    <p class="description description-primary">no botão abaixo</p>
                    <button id="signin" class="btn btn-primarya">CADASTRAR</button>
                </div>
                <div class="second-column">
                    <h2 class="title title-second">Login</h2>

                    <!-- formulario cadastro -->
                    <form class="form" action="../scripts/login.php" method="POST">

                        <label class="label-input" for="typeEmailX">
                            <i class="far fa-envelope icon-modify"></i>
                            <input type="email" name="email" id="email" placeholder="Email">
                        </label>

                        <label class="label-input" for="typePasswordX">
                            <i class="fas fa-lock icon-modify"></i>
                            <input type="password" name="senha" id="senha" placeholder="Senha">
                        </label>

                        <!-- <a class="password" href="#">forgot your password?</a> -->
                        <button type="submit" class="btn btn-second">Entrar</button>
                    </form><!-- formulario cadastro -->

                </div><!-- second column -->
            </div><!-- first content -->


            <div class="content second-content">
                <div class="first-column">
                    <h2 class="title title-primary">Seja Bem-Vindo!</h2>
                    <p class="description description-primary">Caso já possua um conta clique</p>
                    <p class="description description-primary">no botão abaixo</p>
                    <button id="signup" class="btn btn-primarya">LOGAR</button>
                </div>
                <div class="second-column">
                    <h2 class="title title-second">Criando Sua Conta</h2>

                    <!-- formulario cadastro -->
                    <form class="form" action="../scripts/cadastra.php" method="POST">
                        <label class="label-input" for="">
                            <i class="far fa-user icon-modify"></i>
                            <input type="text" name="nome" id="nome" placeholder="Nome">
                        </label>

                        <label class="label-input" for="">
                            <i class="far fa-envelope icon-modify"></i>
                            <input type="email" name="email" id="email" placeholder="Email">
                        </label>

                        <label class="label-input" for="">
                            <i class="fas fa-lock icon-modify"></i>
                            <input type="password" name="senha" id="senha" placeholder="Senha">
                        </label>


                        <button type="submit" class="btn btn-second">CADASTRAR</button>
                    </form><!-- formulario cadastro -->

                </div><!-- second column -->
            </div><!-- second-content -->
        </div>
        <script src="../js/app.js"></script>
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
            title: "Ops!",
            text: "Não foram encontrados usuários com essas informações",
            icon: "error",

            allowOutsideClick: true,
            allowEscapeKey: true,

            confirmButtonColor: "#3085d6",
            confirmButtonText: "OK"
          }).then((result) => {

            window.location.href = "entrar.php";

          });
        </script>


    <?php

    } else if ($_GET['e'] == md5(2)) { ?>

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

            window.location.href = "entrar.php";

          });
        </script>

    <?php

    } else if ($_GET['e'] == md5(3)) { ?>

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

            window.location.href = "entrar.php";

          });
        </script>

    <?php

    } else if ($_GET['e'] == md5(23) || $_GET['e'] == md5(24) || $_GET['e'] == md5(34) || $_GET['e'] == md5(234)) { ?>

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

            window.location.href = "entrar.php";

          });
        </script>

    <?php

    } else if ($_GET['e'] == md5(6)) { ?>

        <script>
          Swal.fire({
            title: "Atenção!",
            text: "Esse email já existe!",
            icon: "error",

            allowOutsideClick: true,
            allowEscapeKey: true,

            confirmButtonColor: "#3085d6",
            confirmButtonText: "OK"
          }).then((result) => {

            window.location.href = "entrar.php";

          });
        </script>

    <?php

    }  ?>
</body>

</html>