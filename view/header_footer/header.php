<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
<!--    lien bootstrap 5-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
<!--    lien du css local-->
    <link rel="stylesheet" href="/view/assets/CSS/style.css">
<!--    lien de mon potifavicon-->
    <link rel="icon" type="image/x-icon" sizes="16x16" href="/favicon.ico">
<!--    titre de la page passé en variable-->
    <title><?= $titre ?></title>
</head>
<body class="bg-secondary">
<header class="sticky-top">
<!--    navbar-->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand text-light" href="/index.php" title="lien vers l'accueil de Velvet Record"><i class="fas fa-home"></i> Accueil</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li>
                        <a class="nav-link text-light" href="/view/liste_disques.php" title="Accès à la liste des diques"><i class="fas fa-compact-disc"></i> liste des disques</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
<!--les container et d-flex-->
<div class="container-fluid">
    <div class="d-md-flex justify-content-center">


