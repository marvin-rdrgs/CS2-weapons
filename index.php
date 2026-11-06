<?php
/*
--------------------------------------------------------------------------------
Auteurs : Marvin rdrgs & Lukas gvt
Date : 06.11.2026
Description : Page d'accueil pour le projet de site web CS2
--------------------------------------------------------------------------------
*/

$data = json_decode(file_get_contents("json/data.json"), true);
$weapon = $data["weapon"];
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="css/style.css">

    <title>CS2 - Weapons</title>
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

    <main>

        <div class="barre-recherche">

            <div class="recherche">
                <input class="search" type="text" id="search" placeholder="Rechercher une arme...">
                <input type="submit" value="⌕" id="searchBtn">
            </div>

            <h2>Toutes les armes CS2</h2>

            <select id="categorie">
                <option value="toutes">Toutes les catégories</option>
                <option value="fusil">Fusils</option>
                <option value="sniper">Snipers</option>
                <option value="pistolet">Pistolets</option>
                <option value="mitraillette">Mitraillettes</option>
                <option value="fusil-a-pompe">Fusils à pompe</option>
                <option value="mitrailleuse">Mitrailleuses</option>
            </select>

        </div>

        <section class="etiquette">

            <?php foreach ($weapon as $w): ?>

                <div class="section-div arme" data-nom="<?= strtolower($w["nom"]) ?>"
                    data-categorie="<?= $w["categorie"] ?>">

                    <a href="armedescription.php?id=<?= $w["id"] ?>">
                        <img src="<?= htmlspecialchars($w["img"]) ?>" class="affiche"
                            alt="<?= htmlspecialchars($w["nom"]) ?>">
                    </a>

                    <h3><?= htmlspecialchars($w["nom"]) ?></h3>

                    <p class="categorie">
                        <?= htmlspecialchars($w["categorie"]) ?>
                    </p>

                    <p class="description">
                        <?= htmlspecialchars($w["description"]) ?>
                    </p>

                </div>

            <?php endforeach; ?>

        </section>

    </main>

    <footer>
        &copy; Marvi Rodrigues
        <br>
        &copy; CFPT informatique
    </footer>

    <script>/*Ce script sert à filtrer les armes*/
        const recherche = document.getElementById("search");
        const categorie = document.getElementById("categorie");
        const armes = document.querySelectorAll(".arme");

        function filtrerArmes() {
            const texte = recherche.value.toLowerCase();
            const filtre = categorie.value;

            armes.forEach(arme => {

                const nom = arme.dataset.nom;
                const cat = arme.dataset.categorie;

                const correspondNom = nom.includes(texte);
                const correspondCategorie = filtre === "toutes" || cat === filtre;

                if (correspondNom && correspondCategorie) {
                    arme.style.display = "";
                } else {
                    arme.style.display = "none";
                }

            });
        }

        recherche.addEventListener("input", filtrerArmes);
        categorie.addEventListener("change", filtrerArmes);
    </script>

</body>

</html>