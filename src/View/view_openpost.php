<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../../assets/css/style.css">
    <style>
        .home {
            width: 50%;
        }

        .home,
        img {
            max-width: 70vh !important;
        }

        #right-menu {
            height: 100vh;

        }

        #right-menu ::-webkit-scrollbar {
            width: 0;
            position: absolute;
            bottom: 0;
        }

        @media(max-width: 992px) {
            .home {
                width: 91.6666666667%;
            }

            #right-menu {
                width: 91.6666666667%;
                margin: 0 auto;
                position: relative !important;
                top: auto !important;
                right: auto !important;
                transform: none !important;
                height: 100vh;
                overflow: scroll;
                margin-bottom: 0.5rem;
            }
        }
    </style>
</head>

<body>
    <?php

    use Dom\Comment;

    include_once "../../templates/nav.php" ?>


    <div class="mx-auto" id="post">
        <div class='border home d-flex justify-content-between mt-2 p-3'>
            <div class='d-flex'>
                <a href='controller_otherprofile.php?profile=<?= $uniquePost['user_id'] ?>' class='text-black text-decoration-none'>
                    <img src='../../assets\img\dog.jpg' alt='Image de profile' class='rounded-circle home-profile'>
                    <h1 class='fs-6 d-flex align-items-center my-0 ms-1'><?= $uniquePost["user_pseudo"] ?>
                </a> · <small class='text-body-secondary'>
                    <?= date('d/m/Y H:i', $uniquePost["post_timestamp"]) ?></small>
                </h1>
            </div>
            <?php if ($_SESSION["user_id"] == $uniquePost["user_id"]) { ?>
            <div class="dropdown">
                <button class='btn align-baseline py-0 fs-3' type="button" data-bs-toggle="dropdown" aria-expanded="false">···</button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="../Controller/controller_supp.php?supp=<?= $uniquePost["post_id"] ?>">Supprimer</a></li>
                </ul>
            </div>
            <?php } ?> 
        </div>

        <img src='../../assets\img\users/<?= $uniquePost["user_id"] ?>/<?= $uniquePost["pic_name"] ?>' alt='' class='col-lg-6 col-11 mx-auto d-block'>

        <div class='border home'>
            <div class='d-flex p-2'>
                <?= Like::countLike($_GET["post"]) ?><i class='fa-regular fa-heart btn p-1'></i>
                <?= Comments::countComment($_GET["post"]) ?><i class='fa-regular fa-comment btn p-1'></i>
            </div>
            <p class='d-flex p-2'><span class="fw-bold"><?= $uniquePost["user_pseudo"] ?></span><i
                    class='fa-solid fa-certificate fa-bounce position-relative text-primary ms-1 fs-4'>
                    <i
                        class='fa-solid fa-check fa-bounce position-absolute top-50 start-50 translate-middle z-1 text-white fs-6'></i>
                </i> : <?= $uniquePost["post_description"] ?></p>
        </div>
    </div>

    <div class="position-fixed top-50 end-0 translate-middle-y list-group col-lg-3 d-flex flex-column justify-content-end border pt-2" id="right-menu">
        <div class="overflow-y-auto">
            <?= $commentaires ?>
            <div id="lastComment"></div>
        </div>
        <form action="#lastComment" class="p-2" method="post">
            <input type="text" aria-label="Commentaire" class="form-control input-group d-flex"
                placeholder="Ajouter un commentaire..." name="comment">

        </form>
        <p class="p-2 text-danger"><?= $error["comment"] ?? '' ?></p>
    </div>


    <script>
        document.querySelectorAll('[id^="liveToastBtn"]').forEach(btn => {
            btn.addEventListener('click', () => {
                const i = btn.id.replace('liveToastBtn', '');
                const toastEl = document.getElementById('liveToast' + i);
                const toastBootstrap = bootstrap.Toast.getOrCreateInstance(toastEl);
                toastBootstrap.show();
            });
        });
    </script>
    <script src="https://kit.fontawesome.com/50a1934b21.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>

</body>

</html>