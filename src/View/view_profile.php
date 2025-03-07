<?php

// var_dump($_SESSION);
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

        <style>

        </style>
</head>

<body class="mx-auto row position-relative">

    <nav class="navbar navbar-expand-lg bg-body-tertiary p-0">
        <div class="container-fluid p-1">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse position-relative" id="navbarSupportedContent">
                <div class="position-fixed top-50 start-0 translate-middle-y list-group col-lg-2 d-flex flex-column justify-content-lg-between border p-0 container-fluid"
                    id="nav" style="height: 100vh;">
                    <div class="list-group">
                        <button type="button" class="list-group-item list-group-item-action border-white"
                            aria-current="true"><i class="fa-solid fa-house p-1 align-content-center text-center"
                                style="width:2rem; height:2rem"></i>
                            Accueil</button>

                        <button type="button" class="list-group-item list-group-item-action border-white"><i
                                class="fa-solid fa-magnifying-glass p-1 align-content-center text-center"
                                style="width:2rem; height:2rem"></i> Recherche</button>

                        <button type="button" class="list-group-item list-group-item-action border-white"><i
                                class="fa-solid fa-plus border p-1 align-content-center text-center"
                                style="width:2rem; height:2rem"></i> Créer</button>

                        <button type="button" class="list-group-item list-group-item-action border-white">
                            <img src="../../assets\img\dog.jpg" style="width:2rem; height:2rem" alt="Image de profile"
                                class="rounded-circle p-1"> profile</button>
                    </div>
                    <button type="button" class="list-group-item list-group-item-action border-white"><i
                            class="fa-solid fa-right-from-bracket p-1 align-content-center text-center"
                            style="width:2rem; height:2rem"></i> Déconnexion</button>
                </div>
            </div>
        </div>
    </nav>

    <!-- <div class="position-fixed top-50 start-0 translate-middle-y list-group col-lg-2 d-flex flex-column justify-content-between border p-0 container-fluid"
        style="height: 100vh;">
        <div class="list-group">
            <button type="button" class="list-group-item list-group-item-action border-white" aria-current="true"><i
                    class="fa-solid fa-house p-1 align-content-center text-center" style="width:2rem; height:2rem"></i>
                Accueil</button>

            <button type="button" class="list-group-item list-group-item-action border-white"><i
                    class="fa-solid fa-magnifying-glass p-1 align-content-center text-center"
                    style="width:2rem; height:2rem"></i> Recherche</button>

            <button type="button" class="list-group-item list-group-item-action border-white"><i
                    class="fa-solid fa-plus border p-1 align-content-center text-center"
                    style="width:2rem; height:2rem"></i> Créer</button>

            <button type="button" class="list-group-item list-group-item-action border-white">
                <img src="../../assets\img\dog.jpg" style="width:2rem; height:2rem" alt="Image de profile"
                    class="rounded-circle p-1"> profile</button>
        </div>
        <button type="button" class="list-group-item list-group-item-action border-white"><i
                class="fa-solid fa-right-from-bracket p-1 align-content-center text-center"
                style="width:2rem; height:2rem"></i> Déconnexion</button>
    </div> -->

    <div class="container ps-5" style="width:80%">
        <div class="d-flex justify-content-evenly my-3 px-5 align-items-center">
            <div class="p-1 rounded-circle"
                style="background-image: linear-gradient(to left bottom, #833ab4, #d03097, #f94c72, #ff7d53, #fcb045);">
                <div class="p-1 border rounded-circle" style="background-color:white">

                    <img src="../../assets\img\dog.jpg" style="width:10rem; height:10rem" alt="Image de profile"
                        class="rounded-circle">

                </div>
            </div>
            <div>
                <div class="d-flex gap-3 align-self-center">
                    <h1 class="fs-3 my-1"><?= $_SESSION["user_pseudo"] ?>
                        <i class="fa-solid fa-certificate position-relative text-primary fs-3">
                            <i
                                class="fa-solid fa-check position-absolute top-50 start-50 translate-middle z-1 text-white fs-6"></i>
                        </i>
                    </h1>
                    <button class="btn btn-primary align-middle p-1 my-auto" style="height: 2rem;">Suivre <i
                            class="fa-solid fa-heart"></i></button>
                    <button class="btn btn-primary align-middle p-1 my-auto" style="height: 2rem;">Contacter <i
                            class="fa-solid fa-comment"></i></button>
                    <a href="../../src/Controller/controller_deconnexion.php"
                        class="btn btn-primary align-middle p-1 my-auto">Déconnexion</a>
                </div>
                <div class="d-flex gap-4">
                    <p><?= $i ?> Posts</p>
                    <p>6 Followers</p>
                    <p>15 Following</p>
                </div>
                <p>C'est moi wesh !</p>
                <button class="btn btn-primary align-middle p-1 my-auto" style="height: 2rem;">Créer <i
                        class="fa-solid fa-plus"></i></button>
            </div>
        </div>

        <h2 class="text-center mx-auto border-top" style="width:80%">Publications</h2>

        <div class="row mx-auto p-2 mb-2" style="width:80%">
            <?= $images ?>
        </div>




    </div>


    <script src="https://kit.fontawesome.com/50a1934b21.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>