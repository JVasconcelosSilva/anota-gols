<?php
require __DIR__ . '/controller/Artilharia.php';
$nmUsuario = $_POST['nmUsuario'] ?? null;
$nmLogin = $_POST['nmLogin'] ?? null;
$nmSenha = $_POST['nmSenha'] ?? null;
$nmEmail = $_POST['nmEmail'] ?? null;
$options = [
    'cost' => 12,
];
$nmSenha = password_hash($nmSenha, PASSWORD_BCRYPT, $options);

if (!is_null($nmUsuario)) {
    require __DIR__ . '/controller/Usuario.php';
    $query = new Usuario('usuarios');
    $registro = $query->cadastrarUsuario($nmUsuario, $nmLogin, $nmSenha, $nmEmail);
    header('LOCATION: /view/login.php');
}
?>
<!DOCTYPE html>
<html>
    <?php
    include __DIR__ . '/libs/css/bootstrap.php';
    ?>
    <head>

        <meta charset="utf-8">
        <!--<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Anota Gols - Sua Artilharia Online</title>
        <link rel="icon" type="image/icon" href="img/favicon.png">
        <!-- Bootstrap core CSS -->
        <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom fonts for this template -->
        <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

        <!-- Plugin CSS -->
        <link href="vendor/magnific-popup/magnific-popup.css" rel="stylesheet" type="text/css">

        <!-- Custom styles for this template -->
        <link href="css/freelancer.css" rel="stylesheet">
        <link href="css/index.css" rel="stylesheet">

    </head>

    <body>
        <!-- Navigation -->
        <nav class="navbar navbar-expand-lg bg-secondary fixed-top text-uppercase" id="mainNav">
            <div class="container">
                <a class="navbar-brand js-scroll-trigger" href="#topo">Anota Gols</a>
                <button class="navbar-toggler navbar-toggler-right text-uppercase bg-primary text-white rounded" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">

                        <!-- Topbar Search -->
                        <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                            <div class="input-group" style="left: -250px">
                                <input type="text" class="form-control bg-light border-0 small" placeholder="Pesquise aqui..." aria-label="Search" aria-describedby="basic-addon2">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="button" style="height: 38px;">
                                        <i class="fas fa-search fa-sm"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                        <?php
                        session_start();
                        if (isset($_SESSION['id'], $_SESSION['nome'], $_SESSION['email'])) {
                            ?>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <button type="button" onclick="window.location.href = '/view/minhas-informacoes.php'" id="user" class="btn btn-outline-secondary"><?php echo $_SESSION['nome']; ?></button>
                                    <button type="button" class="btn btn-outline-secondary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <span class="sr-only">Toggle Dropdown</span>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <form method="get" action="/view/publicas.php?nomeArtilharia=<?= $nomeArtilharia ?>" class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                                            <div class="input-group" id="menuPesquisa">
                                                <input type="text" name="nomeArtilharia" class="form-control bg-light border-0 small" placeholder="Procurar artilharia..." aria-label="Search" aria-describedby="basic-addon2">
                                            </div>
                                            <div role="separator" class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="view/publicas.php">Artilharias Públicas</a>
                                            <div role="separator" class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="view/minhas-informacoes.php">Minhas Informações</a>
                                            <a class="dropdown-item" href="view/pagina-principal.php">Minhas Artilharias</a>
                                            <div role="separator" class="dropdown-divider"></div>
                                            <a class="dropdown-item js-scroll-trigger" href="#estrelas">Estrelas</a>
                                            <a class="dropdown-item js-scroll-trigger" href="#informacoes">Informações</a>
                                            <div role="separator" class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="view/logout.php">Sair</a>
                                    </div>
                                </div>
                            </div>
                            <?php
                        } else {
                            ?>
                        <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <button type="button" onclick="window.location.href = '/view/login.php'" id="user" class="btn btn-outline-secondary">Entrar</button>
                                    <button type="button" class="btn btn-outline-secondary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <span class="sr-only">Toggle Dropdown</span>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <form method="get" action="/view/publicas.php?nomeArtilharia=<?= $nomeArtilharia ?>" class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                                            <div class="input-group" id="menuPesquisa">
                                                <input type="text" name="nomeArtilharia" class="form-control bg-light border-0 small" placeholder="Procurar artilharia..." aria-label="Search" aria-describedby="basic-addon2">
                                            </div>
                                        </form>
                                            <div role="separator" class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="view/publicas.php">Artilharias Públicas</a>
                                            <div role="separator" class="dropdown-divider"></div>
                                            <a class="dropdown-item js-scroll-trigger" href="#estrelas">Estrelas</a>
                                            <a class="dropdown-item js-scroll-trigger" href="#informacoes">Informações</a>
                                            <div role="separator" class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="view/cadastro.php">Cadastre-se</a>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>

                    </ul>
                </div>
            </div>
        </nav>

        <!-- Header -->
        <header class="masthead bg-primary text-white text-center" id="topo">
            <div class="container">
                <img class="img-fluid mb-5 d-block mx-auto" id="logo" src="img/logo2.png" alt="" style="margin-top: -110px">
                <h1 class="text-uppercase mb-0" style="margin-top: -100px">Anota Gols</h1>
                <hr class="star-light">
                <h2 class="font-weight-light mb-0" style="margin-top: 10px">Sua artilharia Online</h2>
            </div>
        </header>

        <!-- Jogadores -->
        <section class="portfolio" id="estrelas">
            <div class="container" id="algum-fotos">
                <h2 class="text-center text-uppercase text-secondary mb-0" style="margin-top: 0px">Estrelas</h2>
                <hr class="star-dark mb-5">
                <div class="row">
                    <div class="col-md-6 col-lg-4">
                        <img class="img-fluid" src="img/messi.jpg" alt="">
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <img class="img-fluid" src="img/cristiano.jpg" alt="">
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <img class="img-fluid" src="img/neymar.jpg" alt="">
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <img class="img-fluid" src="img/hazzard.jpg" alt="">        
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <img class="img-fluid" src="img/pogba.jpg" alt="">
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <img class="img-fluid" src="img/salah.png" alt="">        
                    </div>

                </div>
            </div>
        </section>
        <?php
        if (!isset($_SESSION['id'], $_SESSION['nome'], $_SESSION['email'])) {
            ?>
            <!-- Inscrições -->
            <section class="bg-primary text-white mb-0" id="cadastro">

                <h2 class="text-center text-uppercase text-white" style="margin-top: 0px">Cadastrar-se</h2>
                <hr class="star-light mb-5">
                <center>  
                    <form method="post" style="margin-top: 50px; width: 350px; ">
                        <input class="form-control" type="text" placeholder="Nome de Usuário" name="nmUsuario" style="margin-bottom: 20px;" required>
                        <input class="form-control" type="text" placeholder="Login" name="nmLogin" style="margin-bottom: 20px;" required>
                        <input class="form-control" type="password" placeholder="Senha" name="nmSenha" style="margin-bottom: 20px;" required>
                        <input class="form-control" type="password" placeholder="Repita sua Senha" name="nmSenha2" style="margin-bottom: 20px;" required>
                        <input class="form-control" type="email" placeholder="Email" name="nmEmail" style="margin-bottom: 20px;" required>
                        <button class="btn btn-light" name="login"><a style="text-decoration: none; color: black">Cadastrar</a></button>
                    </form>
                    <br><p>Já possuí conta? <a href="../view/login.php" style="color: white; text-decoration: none">&nbsp;&nbsp;&nbsp;&nbsp;Logar</a></p>
                </center>
            </section>
        <?php } ?>
        <!-- Footer -->
        <footer class="footer text-center" id="informacoes">

            <div class="container">

                <div class="row">

                    <div class="col-md-4 mb-3 mb-md-0">
                        <div class="card py-4 h-100">
                            <div class="card-body text-center">
                                <i class="fas fa-map-marked-alt text-primary mb-2"></i>
                                <h4 class="text-uppercase m-0" style="color: black ">Anota Gols</h4>
                                <hr class="my-4">
                                <center>
                                    <div class="circle">
                                        <img src="img/logo-anotagols.png">
                                    </div>
                                </center>
                                <div class="small text-black-50" style="color: black">A sua aplicação favorita</div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 mb-3 mb-md-0">
                        <div class="card py-4 h-100">
                            <div class="card-body text-center">
                                <i class="fas fa-map-marked-alt text-primary mb-2"></i>
                                <h4 class="text-uppercase m-0" style="color: black ">Contato</h4>
                                <hr class="my-4">
                                <center>
                                    <div class="circle">
                                        <img src="img/wpp.png">
                                    </div>
                                </center>
                                <div class="small text-black-50" style="color: black">+55 (13) 99999-9999</div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </footer>
    <div class="copyright py-4 text-center text-white">
        <div class="container">
            <small>Copyright &copy; AnotaGols 2019</small>
        </div>
    </div>

    <!-- Scroll to Top Button (Only visible on small and extra-small screen sizes) -->
    <div class="scroll-to-top d-lg-none position-fixed ">
        <a class="js-scroll-trigger d-block text-center text-white rounded" href="#page-top">
            <i class="fa fa-chevron-up"></i>
        </a>
    </div>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="vendor/magnific-popup/jquery.magnific-popup.min.js"></script>

    <!-- Contact Form JavaScript -->
    <script src="js/jqBootstrapValidation.js"></script>
    <script src="js/contact_me.js"></script>

    <!-- Custom scripts for this template -->
    <script src="js/freelancer.min.js"></script>
</div>
</main>
<?php
include __DIR__ . '/libs/css/footer.php';
?>
</body>

</html>
