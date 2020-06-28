<!DOCTYPE html>
<html>
<head>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

<link rel="stylesheet" href="perfilestilo.css" type="text/css">
<link rel="stylesheet" href="fontes/font-awesome.min.css">

<script src="https://kit.fontawesome.com/54f9cce8ca.js" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.9/css/all.css" integrity="sha384-5SOiIsAziJl6AWe0HWRKTXlfcSHKmYV4RBF18PPJ173Kzn7jzMyFuTtk8JA7QQG1" crossorigin="anonymous">
<title>Perfil</title>

</head>
<body>

<!----------------------------------------Navbar------------------------------------------>

<header class="header">  
        <nav class="navbar navbar-default fixed-top">
            <div class="container">
                <a class="navbar-brand js-scroll-trigger" href="../index.php">Anota Gols</a>
                <?php
                if (isset($_SESSION['id'], $_SESSION['nome'], $_SESSION['email'])) {
                    ?>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <button type="button" onclick="window.location.href = '/view/minhas-informacoes.php'" id="user" class="btn btn-outline-secondary"><?php echo $_SESSION['nome']; ?></button>
                            <button type="button" class="btn btn-outline-secondary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="sr-only">Toggle Dropdown</span>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right">
                                <form method="get" action="publicas.php?nomeArtilharia=<?= $nomeArtilharia ?>" class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                                    <div class="input-group" id="menuPesquisa">
                                        <input type="text" name="nomeArtilharia" class="form-control bg-light border-0 small" placeholder="Procurar artilharia..." aria-label="Search" aria-describedby="basic-addon2">
                                    </div>
                                    <div role="separator" class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="publicas.php">Artilharias Públicas</a>
                                    <div role="separator" class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="minhas-informacoes.php">Minhas Informações</a>
                                    <a class="dropdown-item" href="pagina-principal.php">Minhas Artilharias</a>
                                    <div role="separator" class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="logout.php">Sair</a>
                                </form>
                            </div>
                        </div>
                    </div>
                <?php } else { ?>
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
                                    <div role="separator" class="dropdown-divider"></div>
                                    <a class="dropdown-item active" href="publicas.php">Artilharias Públicas</a>
                                    <div role="separator" class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="cadastro.php">Cadastre-se</a>
                                </form>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
            </div>
        </nav>
    </header>

<!---------------------------------------------Card's---+------------------------------------------------->

<section class="testimonials"> 
            <div class="container"> 
                <br>
                <br>
            <h1 id="nome">Minhas Artilharias</h1>
            <div class="wrap">
                    <div class="box one">
                        <div class="date">
                        </div>
                        <h1>CESTINHAS</h1>
                        <br>
                        <div class="text-box">
                        <div class="container">
                            <div class="center">
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ExemploModalCentralizado">
                                    Entrar
                                </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="ExemploModalCentralizado" tabindex="-1" role="dialog" aria-labelledby="TituloModalCentralizado" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="TituloModalCentralizado">Criar Artilharia</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                        <form>
                                        <div class="form-group row">
                                            <label for="colFormLabel" class="col-sm-2 col-form-label" id="n">Nome</label>
                                            <div class="col-sm-10">
                                            <input type="email" class="form-control" id="colFormLabel" placeholder="">
                                            </div>
                                        </div>
                                        <div class="form-row align-items-center">
                                            <label for="colFormLabel" class="col-sm-2 col-form-label">Esporte</label>
                                                <div class="col-auto my-1">
                                                <label class="mr-sm-2 sr-only" for="inlineFormCustomSelect">Privacidade</label>
                                                <select class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                                                    <option selected></option>
                                                    <option value="0">1 - Basquete</option>
                                                    <option value="1">2 - Futebol</option>
                                                </select>
                                                </div>
                                            </div>
                                            <br>
                                        <fieldset class="form-group">
                                            <div class="row">
                                            <legend class="col-form-label col-sm-2 pt-0">Privacidade</legend>
                                            <div class="col-sm-10">
                                                <div class="form-check">
                                                <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="opcao1" checked>
                                                <label class="form-check-label" for="gridRadios1">
                                                    Pública
                                                </label>
                                                <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios2" value="opcao2">
                                                <label class="form-check-label" for="gridRadios2">
                                                    Privada
                                                </label>
                                                </div>
                                            </div>
                                            </div>
                                        </fieldset>
                                        </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-primary" data-dismiss="modal">Sair</button>
                                            <button type="button" class="btn btn-primary">Criar</button>
                                        </div>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                <div class="wrap">
                    <div class="box one">
                        <div class="date">
                        </div>
                        <h1>CRIAR RANKING</h1>
                        <br>
                        <div class="text-box">
                        <div class="container">
                            <div class="center">
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ExemploModalCentralizado">
                                    Criar
                                </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="ExemploModalCentralizado" tabindex="-1" role="dialog" aria-labelledby="TituloModalCentralizado" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="TituloModalCentralizado">Criar Artilharia</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                        <form>
                                        <div class="form-group row">
                                            <label for="colFormLabel" class="col-sm-2 col-form-label">Nome</label>
                                            <div class="col-sm-10">
                                            <input type="email" class="form-control" id="colFormLabel" placeholder="">
                                            </div>
                                        </div>
                                        <fieldset class="form-group">
                                            <div class="row">
                                            <legend class="col-form-label col-sm-2 pt-0">Privacidade</legend>
                                            <div class="col-sm-10">
                                                <div class="form-check">
                                                <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="opcao1" checked>
                                                <label class="form-check-label" for="gridRadios1">
                                                    Pública
                                                </label>
                                                <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios2" value="opcao2">
                                                <label class="form-check-label" for="gridRadios2">
                                                    Privada
                                                </label>
                                                </div>
                                            </div>
                                            </div>
                                        </fieldset>
                                        <!--
                                            <div class="form-row align-items-center">
                                            <label for="colFormLabel" class="col-sm-2 col-form-label">Privacidade</label>
                                                <div class="col-auto my-1">
                                                <label class="mr-sm-2 sr-only" for="inlineFormCustomSelect">Privacidade</label>
                                                <select class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                                                    <option selected></option>
                                                    <option value="1">Privada</option>
                                                    <option value="2">Pública</option>
                                                </select>
                                                </div>
                                            </div>
                                            -->
                                        </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-primary" data-dismiss="modal">Sair</button>
                                            <button type="button" class="btn btn-primary">Criar</button>
                                        </div>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
    </section>
<!--------------------------------------teste------------------------------------------------------------->
