<?php

add_filter('use_block_editor_for_post', '__return_false');

register_nav_menu('main', 'Navigation principale, en-tête du site');
register_nav_menu('footer', 'Navigation de pied de page');
register_nav_menu('socials', 'Navigation de réseaux sociaux');

function dw_asset(string $file): string
{
    return get_template_directory_uri() . '/public/' . $file;
}

function dw_get_navigation_links(string $location): array
{
    // Pour $location, retrouver le menu.
    $locations = get_nav_menu_locations();
    $menuId = $locations[$location] ?? null;

    // Au cas où il n'y a pas de menu assignés à $location, renvoyer un tableau de liens vide.
    if (is_null($menuId)) {
        return [];
    }

    // Pour ce menu, récupérer les liens
    $items = wp_get_nav_menu_items($menuId);

    // Formater les liens en objets pour ne garder que "URL" et "label" comme propriétés
    foreach ($items as $key => $item) {
        $items[$key] = new stdClass();
        $items[$key]->url = $item->url;
        $items[$key]->label = $item->title;
    }

    // Retourner le tableau de liens formatés
    return $items;
}

function dw_component(string $component, array $arguments = []): void
{
    $path = get_template_directory() . '/resources/components/' . $component . '.php';

    if (!file_exists($path)) {
        echo 'Component "' . $component . '" is not defined.';
        return;
    }

    extract($arguments);

    include($path);
}


function give_header_class(): string
{
    $page_id = get_the_ID();

    $header_class = '';

    if ($page_id === 7 || $page_id === 15 || $page_id === 33) {
        $header_class .= 'home';
    } elseif ($page_id === 11) {
        $header_class .= 'about';
    } elseif ($page_id === 9) {
        $header_class .= 'contact';
    } else if ($page_id === 13) {
        $header_class .= 'projects';
    }

    return $header_class;
}