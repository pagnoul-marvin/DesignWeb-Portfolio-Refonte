<?php

/*
Template Name: Legal notices
*/

get_header();

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

        <div class="list_links">

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