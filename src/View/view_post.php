<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../../assets/css/style.css">
</head>

<body>
    <?= include_once "../../templates/nav.php" ?>

    <h1 class="text-center">Créer un post !</h1>
    <form action="" class="col-lg-6 mx-auto" method="POST" enctype="multipart/form-data" novalidate>
        <div class="mb-3">
            <label for="formFile" class="form-label"><i class="fa-solid fa-image"></i> Photo</label>
            <input class="form-control" type="file" id="formFile" name="photo" accept="image/*" required>
            <p class="text-danger"><?= $error['photo'] ?? '' ?></p>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label"><i class="fa-solid fa-message"></i> Description</label>
            <input type="text" class="form-control" id="description" name="description"
                value="<?= $_POST['description'] ?? '' ?>" required>
            <p class="text-danger"><?= $error['description'] ?? '' ?></p>
        </div>
        <div class="col-12">
            <div class="form-check">
                <input name="condition" class="form-check-input" type="checkbox" id="gridCheck" required>
                <label class="form-check-label" for="gridCheck">
                    Privé
                </label>
            </div>
            <p class="text-danger"><?= $error['condition'] ?? '' ?></p>
        </div>
        <div class="col-12 text-center">
            <button type="submit" class="btn btn-primary">Post</button>
        </div>

    </form>


    <script src="https://kit.fontawesome.com/50a1934b21.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>