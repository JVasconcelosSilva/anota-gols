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

<link rel="stylesheet" href="navbarestilo.css" type="text/css">
<link rel="stylesheet" href="fontes/font-awesome.min.css">

<script src="https://kit.fontawesome.com/54f9cce8ca.js" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.9/css/all.css" integrity="sha384-5SOiIsAziJl6AWe0HWRKTXlfcSHKmYV4RBF18PPJ173Kzn7jzMyFuTtk8JA7QQG1" crossorigin="anonymous">
<title>Navbar</title>

</head>
<body>

<!----------------------------------------Navbar------------------------------------------>

    <header class="header">  
        <nav class="navbar navbar-default fixed-top">
            <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <a class="navbar-brand" href="#">Logo vem aqui</a>
            </nav>
                <!--
                <div class="navbar-header" >
                    <a href="#" class="navbar-brand" id="logo"> <img src="Imagens/Anota (1).png" alt=""></a>
                </div>
                -->
                <ul class="nav navbar-icones">
                <div class="btn-group">
                    <button type="button" class="btndrop btn-primary1">Nome</button>
                    <button type="button" class="btnseta btn-primary1 dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="sr-only">Dropdown</span>
                    </button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="../Escolher/escolher.php">Mudar Esporte</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="../Escolher/escolher.php">Meu Perfil</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="../Index/index.php">Sair</a>
                    </div>
                    </div>

<!--
                    <div class="header-buttons text-center">
                        <a id="teste" href="../Escolher/escolher.php" class="btn btn-half">Mudar Esporte</a>
                    </div>
                    <div class="header-buttons text-center">
                        <a id="teste" href="../Escolher/escolher.php" class="btn btn-half">Meu Perfil</a>
                    </div>
                    <div class="header-buttons text-center">
                        <a href="../Index/index.php" class="btn btn-half">Sair</a>
                    </div>
                </ul>
            </div>
            -->
        </nav>
    </header>
</body>