<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./public/css/styles.css">
    <script defer src="node_modules\@fortawesome\fontawesome-free/css/all.css"></script>
    <script defer src="node_modules\@fortawesome\fontawesome-free/js/all.js"></script>
    <script defer src="node_modules/js/fontawesome.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="./public/js/script.js"></script>
    <title><?= $title ?></title>
</head>
<body>
    <?php if($_SERVER['REQUEST_URI'] != '/sakila/index.php?_sakiladmin$ecret=connexion'){?>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <div class="container">
                    <a class="navbar-brand" href="index.php">Sakila</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                        aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Categories
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item" href="#">Action</a></li>
                                    <li><a class="dropdown-item" href="#">Another action</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                                </ul>
                            </li>
                        </ul>
                        <?php if($_SERVER['REQUEST_URI'] === '/sakila/index.php' || $_SERVER['REQUEST_URI'] === '/sakila/index.php?') { ?>
                            <form class="d-flex align-items-center film-search-box">
                                <input  class="form-control" type="text" autocomplete="off" placeholder="Rechercher" aria-label="Search" />
                                <button class="btn btn-outline-success" type="submit">Search</button>
                                <div class="result"></div>
                            </form>
                        <?php } ?>
                        <?php session_start();?>
                            <?php if(isset($_SESSION['first_name'])){ ?>
                                <div class="ms-5 d-flex">
                                    <div class="bg-success d-flex flex-column me-2 rounded-circle px-3 py-3">
                                        <i class="fas fa-user mx-auto"></i>
                                        <?php echo $_SESSION['first_name'];?> 
                                    </div> 
                                    <ul class="navbar-nav">
                                        <li class="nav-item dropdown my-auto">
                                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                Options
                                            </a>
                                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                                <li><a class="dropdown-item" href="#">Réservation</a></li>
                                                <li><hr class="dropdown-divider"></li>
                                                <li>
                                                    <a class="dropdown-item" href="index.php?_sakiladmin$ecret=deconnexion">
                                                        <i class="fas fa-sign-out-alt"></i>
                                                        &nbsp; Déconnexion
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            <?php } ?>
                    </div>
                </div>
            </nav>     
    <?php } ?>
    <?= $content ?>

</body>
</html>