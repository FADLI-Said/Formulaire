<?php

$regex_name = "/^[a-zA-ZÀ-ú]+$/";
$regex_password = "/^[a-zA-Z0-9]{8,30}+$/";
$regex_pseudo = "/^[^<>]+$/";
$regex_date = "/^[0-9--]{10}+$/";

$error = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    var_dump($error);

    if (isset($_POST["pseudo"])) {
        if (empty($_POST["pseudo"])) {
            $error["pseudo"] = "<i class='fa-solid fa-circle-exclamation'></i> Pseudo obligatoire";
        } elseif (!preg_match($regex_pseudo, $_POST["pseudo"])) {
            $error["pseudo"] = "<i class='fa-solid fa-circle-exclamation'></i> Caractère non autorisés";
        }
    }

    if (isset($_POST["nom"])) {
        if (empty($_POST["nom"])) {
            $error["nom"] = "<i class='fa-solid fa-circle-exclamation'></i> Nom obligatoire";
        } elseif (!preg_match($regex_name, $_POST["nom"])) {
            $error["nom"] = "<i class='fa-solid fa-circle-exclamation'></i> Caractère non autorisés";
        }
    }

    if (isset($_POST["prenom"])) {
        if (empty($_POST["prenom"])) {
            $error["prenom"] = "<i class='fa-solid fa-circle-exclamation'></i> Prénom obligatoire";
        } elseif (!preg_match($regex_name, $_POST["prenom"])) {
            $error["prenom"] = "<i class='fa-solid fa-circle-exclamation'></i> Caractère non autorisés";
        }
    }

    if (isset($_POST["email"])) {
        if (empty($_POST["email"])) {
            $error["email"] = "<i class='fa-solid fa-circle-exclamation'></i> Email obligatoire";
        } elseif (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
            $error["email"] = "<i class='fa-solid fa-circle-exclamation'></i> Email non valide";
        }
    }

    if (isset($_POST["password"])) {
        if (empty($_POST["password"])) {
            $error["password"] = "<i class='fa-solid fa-circle-exclamation'></i> Mot de passe obligatoire";
        } elseif (!preg_match($regex_password, $_POST["password"])) {
            if (strlen($_POST["password"]) < 8) {
                $error["password"] = "<i class='fa-solid fa-circle-exclamation'></i> Mot de passe trop court";
            }
            if (strlen($_POST["password"]) > 30) {
                $error["password"] = "<i class='fa-solid fa-circle-exclamation'></i> Mot de passe trop grand";
            }
            if (strlen($_POST["password"]) >= 8 && strlen($_POST["password"]) <= 30) {
                $error["password"] = "<i class='fa-solid fa-circle-exclamation'></i> Caractère non autorisés";
            }
        }
    }

    if (isset($_POST["confirmation"])) {
        if (empty($_POST["confirmation"])) {
            $error["confirmation"] = "<i class='fa-solid fa-circle-exclamation'></i> Mot de passe obligatoire";
        } elseif (!preg_match($regex_password, $_POST["confirmation"])) {
            $error["confirmation"] = "<i class='fa-solid fa-circle-exclamation'></i> Caractère non autorisés";
        } elseif ($_POST["confirmation"] != $_POST["password"]) {
            $error["confirmation"] = "<i class='fa-solid fa-circle-exclamation'></i> Mot de passe et confirmation sont différent";
        }
    }

    if (isset($_POST["birthDate"])) {
        if (empty($_POST["birthDate"])) {
            $error["birthDate"] = "<i class='fa-solid fa-circle-exclamation'></i> Date de naissance obligatoire";
        } elseif (!preg_match($regex_date, $_POST["birthDate"])) {
            $error["birthDate"] = "<i class='fa-solid fa-circle-exclamation'></i> Date impossible";
        }
    }

    if (isset($_POST["genre"])) {
        if (empty($_POST["genre"])) {
            $error["genre"] = "<i class='fa-solid fa-circle-exclamation'></i> Genre obligatoire";
        }
    }

    if (!isset($_POST["condition"])) {
        $error["condition"] = "<i class='fa-solid fa-circle-exclamation'></i> CGU obligatoire";
    }

    var_dump($_POST["birthDate"]);
    var_dump($error);
}



?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body class="container">
    <h1 class="text-center">S'inscrire chez Saïd FADLI</h1>
    <form action="" class="row g-3" method="POST" novalidate>

        <div class="col-md-12">
            <label for="pseudo" class="form-label">Pseudo</label>
            <input type="pseudo" class="form-control" id="pseudo" name="pseudo" value="<?= $_POST['pseudo'] ?? '' ?>"
                required>
            <p class="text-danger"><?= $error['pseudo'] ?? '' ?></p>
        </div>

        <div class="col-md-6">
            <label for="nom" class="form-label">Nom</label>
            <input type="text" class="form-control" id="nom" name="nom" value="<?= $_POST['nom'] ?? '' ?>" required>
            <p class="text-danger"><?= $error['nom'] ?? '' ?></p>
        </div>

        <div class="col-md-6">
            <label for="prenom" class="form-label">Prénom</label>
            <input type="text" class="form-control" id="prenom" name="prenom" value="<?= $_POST['prenom'] ?? '' ?>"
                required>
            <p class="text-danger"><?= $error['prenom'] ?? '' ?></p>
        </div>

        <div class="col-md-12">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="<?= $_POST['email'] ?? '' ?>"
                required>
            <p class="text-danger"><?= $error['email'] ?? '' ?></p>
        </div>

        <div class="col-md-6">
            <label for="password" class="form-label">Mot de passe</label>
            <input type="password" class="form-control" id="password" name="password"
                value="<?= $_POST['password'] ?? '' ?>" required>
            <p class="text-danger"><?= $error['password'] ?? '' ?></p>
        </div>

        <div class="col-md-6">
            <label for="confirmation" class="form-label">Comfirmation mot de passe</label>
            <input type="password" class="form-control" id="confirmation" name="confirmation"
                value="<?= $_POST['confirmation'] ?? '' ?>" required>
            <p class="text-danger"><?= $error['confirmation'] ?? '' ?></p>
        </div>

        <div class="col-md-6">
            <label for="birthDate" class="form-label">Date de naissance</label>
            <input type="date" class="form-control" id="birthDate" name="birthDate"
                value="<?= $_POST['birthDate'] ?? '' ?>" required>
            <p class="text-danger"><?= $error['birthDate'] ?? '' ?></p>
        </div>

        <div class="col-md-6">
            <label for="genre" class="form-label">Genre</label>
            <select id="genre" name="genre" class="form-select" required>
                <option value="" selected>Sélectionner...</option>
                <option value="homme" <?= isset($_POST["genre"]) && $_POST['genre'] == "homme" ? 'selected' : '' ?>>Homme
                </option>
                <option value="femme" <?= isset($_POST["genre"]) && $_POST['genre'] == "femme" ? 'selected' : '' ?>>Femme
                </option>
                <option value="autre" <?= isset($_POST["genre"]) && $_POST['genre'] == "autre" ? 'selected' : '' ?>>Autre
                </option>
            </select>
            <p class="text-danger"><?= $error['genre'] ?? '' ?></p>
        </div>

        <div class="col-12">
            <div class="form-check">
                <input name="condition" class="form-check-input" type="checkbox" id="gridCheck" required>
                <label class="form-check-label" for="gridCheck">
                    Condition d'utilisation
                </label>
            </div>
            <p class="text-danger"><?= $error['condition'] ?? '' ?></p>

        </div>

        <div class="col-12">
            <button type="submit" class="btn btn-primary">S'inscrire</button>
        </div>

    </form>

    <script src="https://kit.fontawesome.com/50a1934b21.js" crossorigin="anonymous"></script>
</body>

</html>