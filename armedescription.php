<!--
    Auteur : Gaivoto Lukas && Rodrigues Marvin
    Description : Projet site CS2, page détails arme
    06.11.2026
-->
<?php
require_once 'util.php';

$data = json_decode(file_get_contents('json/data.json'), true);
$id = (int) ($_GET['id'] ?? 0);

$arme = get_weapon_par_id($data, $id);

if ($arme === null) {
    header('Location: index.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($arme['nom']) ?></title>
    <script src="JS/script.js" defer></script>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <header>
        <img class="logo" src="img/divers/logo.webp" alt="Logo CS2">

        <h1>CS2 - Weapons</h1>

        <nav>
            <ul>
                <li><a class="nav-bar-link" href="index.php">Accueil</a></li>

            </ul>
        </nav>
    </header>
    <main class="details">
        <div class="main-div">
            <h1 class="detail-title">
                <?= htmlspecialchars($arme['nom']) ?>
            </h1>

            <div class="detail-poster">
                <img class="affiche-details" src="<?= htmlspecialchars($arme['img']) ?>"
                    alt="<?= htmlspecialchars($arme['nom']) ?>">

                <section>
                    <p class="detail-description">
                        Catégorie : <?= htmlspecialchars($arme['categorie']) ?>
                    </p>

                    <p class="detail-description">
                        <?= htmlspecialchars($arme['description']) ?>
                    </p>
                </section>
            </div>
        </div>
    </main>

    <footer>
        © Gaivoto Lukas & Marvin Rodrigues 06-11.2026
    </footer>
</body>

</html>