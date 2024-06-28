<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="author" content="Marvin Pagnoul">
    <meta name="description" content="Le portfolio de Marvin Pagnoul">
    <meta name="keywords" content="Marvin, Pagnoul, Marvin Pagnoul, portfolio">
    <link rel="stylesheet" href="<?= dw_asset('css/reset.css') ?>">
    <link rel="stylesheet" href="<?= dw_asset('css/main.css') ?>">
    <script type="module" src="<?= dw_asset('js/main.js'); ?>"></script>
    <title><?= get_bloginfo('name'); ?> &ndash; <?= get_the_title() ?></title>
</head>
<body>

<h1><?= get_the_title() ?></h1>

<header>

    <nav class="main_nav flex_container">

        <h2 class="hidden">Navigation principale</h2>

        <a class="main_nav_home_link" href="<?= home_url() ?>" title="Aller vers l'accueil">Aller vers l&rsquo;accueil</a>

        <ul class="flex_container main_nav_list">

            <?php foreach (dw_get_navigation_links('main') as $link): ?>

                <li class="main_nav_list_item">

                    <a class="main_footer_link" href="<?= $link->url ?>" title="Aller vers la page <?= $link->label ?>"><?= $link->label ?></a>

                </li>

            <?php endforeach; ?>

        </ul>

    </nav>

</header>