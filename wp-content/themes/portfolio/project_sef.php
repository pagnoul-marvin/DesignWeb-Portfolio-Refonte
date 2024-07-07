<?=

/*
Template Name: Project SEF
*/

get_header();

$args = array(
    'post_type' => 'header',
    'title' => 'SEF',
    'posts_per_page' => 1
);

// Effectuer la requête WP_Query
$header_query = new WP_Query($args);


if ($header_query->have_posts()) : while ($header_query->have_posts()) :$header_query->the_post(); ?>

    <div class="flex_container">

        <div class="title_and_catchphrase_container">

            <h2 class="main_title">

                <?= get_field('sef_header_title') ?>

            </h2>

            <p class="catchphrase"><?= get_field('sef_header_catchphrase') ?></p>


        </div>

        <div class="list_links flex_container">

            <ul class="flex_container">

                <li>

                    <span class="cards_link_image"></span>

                    <a class="cards_link" href="<?= get_field('sef_header_first_link')['url'] ?>"
                       title="Aller vers la page À propos"><?= get_field('sef_header_first_link')['title'] ?></a>

                </li>

                <li>

                    <span class="cards_link_image"></span>

                    <a class="cards_link" href="<?= get_field('sef_header_second_link')['url'] ?>"
                       title="Aller vers la page Mes projets"><?= get_field('sef_header_second_link')['title'] ?></a>

                </li>

            </ul>

        </div>

    </div>

<?php endwhile; ?>

<?php endif; ?>

</div>

<div class="background"></div>

</header>

<main>

    <?php dw_component('no_js_banner') ?>

    <?php dw_component('go_back_nav') ?>

    <?php dw_component('contact_me'); ?>

</main>

<?php get_footer() ?>
