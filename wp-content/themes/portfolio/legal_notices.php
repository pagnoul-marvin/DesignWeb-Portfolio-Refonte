<?php

/*
Template Name: Legal notices
*/

get_header();

$recently_modified_notice = new WP_Query([
    'post_type' => 'legal-notice',
    'post_status' => 'publish',
    'orderby' => 'modified',
    'order' => 'DESC',
    'posts_per_page' => 1
]);

$legal_notices = new WP_Query([
    'post_type' => 'legal-notice',
    'post_status' => 'publish',
    'orderby' => 'date',
    'order' => 'ASC',
    'posts_per_page' => -1
]);

$args = array(
    'post_type' => 'header',
    'title' => 'Legal notices',
    'posts_per_page' => 1
);

// Effectuer la requête WP_Query
$header_query = new WP_Query($args);

if ($header_query->have_posts()) : while ($header_query->have_posts()) :$header_query->the_post(); ?>


    <div class="flex_container">

        <div class="title_and_catchphrase_container">

            <h2 class="main_title">

                <?= get_field('ln_header_first_title') ?>

            </h2>

        </div>

        <div class="list_links flex_container">

            <ul class="flex_container">

                <li>
                    <span class="cards_link_image"></span>

                    <a class="cards_link" href="<?= get_field('ln_header_first_link')['url'] ?>"
                       title="Aller vers la page À propos"><?= get_field('ln_header_first_link')['title'] ?></a>
                </li>

                <li>
                    <span class="cards_link_image"></span>

                    <a class="cards_link" href="<?= get_field('ln_header_second_link')['url'] ?>"
                       title="Aller vers la page Mes projets"><?= get_field('ln_header_second_link')['title'] ?></a>
                </li>

                <li>
                    <span class="cards_link_image"></span>

                    <a class="cards_link" href="<?= get_field('ln_header_third_link')['url'] ?>"
                       title="Aller vers la page me contacter"><?= get_field('ln_header_third_link')['title'] ?></a>
                </li>

            </ul>

        </div>

    </div>

<?php endwhile; ?>

<?php endif; ?>

    </div>

    <div class="background"></div>

    </header>

    <main class="flex_container">

        <?php dw_component('no_js_banner') ?>


        <?php if ($recently_modified_notice->have_posts()) : ?>
            <?php $recently_modified_notice->the_post(); ?>
            <div class="last_time_modified">

                <p class="text">Derni&egrave;re modification des mentions l&eacute;gales&nbsp;: <?= get_the_modified_time('d F Y') ?></p>

            </div>

        <?php endif; ?>

        <?php if ($legal_notices->have_posts()) : while ($legal_notices->have_posts()) :$legal_notices->the_post(); ?>

            <section class="section spacing">

                <h2 class="ln_title"><?= get_field('ln_title') ?></h2>

                <?php if (get_field('ln_description')): ?>

                    <p class="ln_description text"><?= get_field('ln_description') ?></p>

                <?php endif; ?>

                <?php if (get_field('ln_owner_name')): ?>

                    <p class="owner text">Nom&nbsp;: <?= get_field('ln_owner_name') ?></p>
                    <p class="owner text">Adresse&nbsp;: <?= get_field('ln_owner_address') ?></p>
                    <p class="owner text">Adresse mail&nbsp;: <?= get_field('ln_owner_mail') ?></p>
                    <p class="owner text">T&eacute;l&eacute;phone&nbsp;: <?= get_field('ln_owner_tel') ?></p>

                <?php endif; ?>

            </section>

        <?php endwhile; endif; ?>

    </main>

<?php get_footer() ?>