<?php

// Pour les armes

function get_weapons(array $data): array
{
    return $data['weapon'] ?? [];
}

function get_weapons_par_categorie(array $data, string $categorie): array
{
    $resultat = [];

    foreach ($data['weapon'] as $weapon) {
        if ($weapon['categorie'] === $categorie) {
            $resultat[] = $weapon;
        }
    }

    return $resultat;
}

function get_weapon_par_id(array $data, int $id): ?array
{
    foreach ($data['weapon'] as $weapon) {
        if ($weapon['id'] === $id) {
            return $weapon;
        }
    }

    return null;
}

function get_weapon_par_nom(array $data, string $nom): ?array
{
    foreach ($data['weapon'] as $weapon) {
        if (strcasecmp($weapon['nom'], $nom) === 0) {
            return $weapon;
        }
    }

    return null;
}

// Pour les catégories

function get_categories(array $data): array
{
    $categories = [];

    foreach ($data['weapon'] as $weapon) {
        if (!in_array($weapon['categorie'], $categories, true)) {
            $categories[] = $weapon['categorie'];
        }
    }

    return $categories;
}

// Autres

function get_recherche(): string
{
    return htmlspecialchars(
        trim($_GET['q'] ?? ''),
        ENT_QUOTES,
        'UTF-8'
    );
}

function get_type(): string
{
    $type = $_GET['type'] ?? 'weapon';

    return in_array($type, ['weapon'], true) ? $type : 'weapon';
}

function get_session_user(): ?string
{
    if (empty($_SESSION['pseudo']) || empty($_SESSION['password'])) {
        return null;
    }

    return htmlspecialchars(
        $_SESSION['pseudo'],
        ENT_QUOTES,
        'UTF-8'
    );
}
?>