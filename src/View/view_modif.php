<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Afpa-gram</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../../assets/css/style.css">
</head>

<body>
    <?php include_once "../../templates/nav.php" ?>
    <h1 class="text-center">Modification du profil</h1>
    <form action="" method="POST" class="col-lg-6 mx-auto p-2" enctype="multipart/form-data" novalidate>
        <div class="mb-3">
            <label for="formFile" class="form-label"><i class="fa-solid fa-image"></i> Photo</label>
            <input class="form-control" type="file" id="formFile" name="photo" accept="image/*" value="<?= $_SESSION['user_avatar'] ?? '' ?>">
        </div>
        <div class="mb-3">
            <label for="pseudo" class="form-label"><i class="fa-solid fa-user"></i> pseudo</label>
            <input type="text" class="form-control" id="pseudo" name="pseudo"
                value="<?= $_SESSION['user_pseudo'] ?? '' ?>">
        </div>
        <div class="mb-3">
            <label for="description" class="form-label"><i class="fa-solid fa-message"></i> Description</label>
            <input type="text" class="form-control" id="description" name="description"
                value="<?= $_SESSION['user_description'] ?? '' ?>">
        </div>
        <div class="col-12 text-center">
            <button type="submit" class="btn btn-primary">Modifier</button>
        </div>
    </form>






    <script src="https://kit.fontawesome.com/50a1934b21.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>