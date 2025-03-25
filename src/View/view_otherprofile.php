<?php

// var_dump($_SESSION);

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Afpa-gram</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../../assets/css/style.css">
</head>

<body class="mx-auto row position-relative">

    <?php include_once "../../templates/nav.php" ?>

    <div class="container ps-lg-5 mt-lg-0 mt-4">
        <div class="d-lg-flex justify-content-evenly my-3 px-5 align-items-center">
            <div class="p-lg-1 rounded-circle"
                style="background-image: linear-gradient(to left bottom, #833ab4, #d03097, #f94c72, #ff7d53, #fcb045);">
                <div class="p-lg-1 rounded-circle" style="background-color:white;">

                    <img src="../../assets\img\users/<?= $uniqueUser[0]["user_id"] ?>/avatar/<?= $uniqueUser[0]["user_avatar"] ?>" alt="Image de profile" class="rounded-circle">

                </div>
            </div>
            <div>
                <div class="d-lg-flex gap-3 align-self-center">
                    <h1 class="fs-3 my-1 d-inline"><?= $uniqueUser[0]["user_pseudo"] ?>
                        <i class="fa-solid fa-certificate fa-bounce position-relative text-primary fs-3">
                            <i
                                class="fa-solid fa-check fa-bounce position-absolute top-50 start-50 translate-middle z-1 text-white fs-6"></i>
                        </i>
                    </h1>
                    <div class="d-flex gap-2 mt-lg-0 mt-2">
                        <a class="btn btn-primary align-middle p-1 my-auto" style="height: 2rem;" href="?profile=<?= $uniqueUser[0]["user_id"] ?>&user=<?= $uniqueUser[0]["user_id"] ?>">Suivre <i class="fa-regular fa-heart"></i></a>
                    </div>
                </div>
                <div class="d-flex gap-4 mt-lg-0 mt-2">
                    <p><?= Profile::countPost($_GET["profile"]) ?> Post(s)</p>
                    <p><?= Profile::countFollowers($_GET["profile"]) ?> Follower(s)</p>
                    <p><?= Profile::countFollows($_GET["profile"]) ?> Following(s)</p>
                </div>
                <p>C'est moi wesh !</p>
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