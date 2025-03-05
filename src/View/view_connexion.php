<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            height: 100vh;
        }

        form {
            width: 30%;
            height: 100%;
        }

        button {
            width: 100%;
        }
    </style>
</head>

<body class="container">
    <form type="submit" class="m-auto align-content-center" method="POST" novalidate>
        <div class="mb-3">
            <label for="id" class="form-label text-center">Identifiant</label>
            <input type="id" name="id" class="form-control" id="id" aria-describedby="emailHelp"
                value="<?= $_POST['id'] ?? '' ?>" required>
            <p class="text-danger"><?= $error['id'] ?? '' ?></p>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label text-center">Mot de passe</label>
            <input type="password" name="password" class="form-control" id="password"
                value="<?= $_POST['password'] ?? '' ?>" required>
            <p class="text-danger"><?= $error['password'] ?? '' ?></p>
        </div>
        <p class="text-danger"><?= $error['connexion'] ?? '' ?></p>
        <button type="" class="btn btn-primary mb-3">Connexion</button>
        <a href="../Controller/controller_inscription.php">Pas encore de compte ? Inscrivez-vous !</a>
    </form>


    <script src="https://kit.fontawesome.com/50a1934b21.js" crossorigin="anonymous"></script>
</body>

</html>