<?= get_header();

$args = array(
    'post_type' => 'header', // Slug de votre CPT créé via ACF
    'title' => 'Home',
    'posts_per_page' => 1 // Affiche un seul post
);

// Effectuer la requête WP_Query
$header_query = new WP_Query($args);


if ($header_query->have_posts()) : while ($header_query->have_posts()) :$header_query->the_post(); ?>


    <div class="flex_container">

        <div class="title_and_catchphrase_container">

            <h2 class="main_title">

                <span><?= get_field('home_header_first_title') ?></span>

                <span><?= get_field('home_header_second_title') ?></span>

            </h2>

            <p class="catchphrase"><?= get_field('home_header_catchphrase') ?></p>



        </div>

        <div class="list_links">

            <ul>

                <li><a class="cards_link" href="<?= get_field('home_header_first_link')['url'] ?>" title="Aller vers la page À propos"><?= get_field('home_header_first_link')['title'] ?></a></li>
                <li><a class="cards_link" href="<?= get_field('home_header_second_link')['url'] ?>" title="Aller vers la page Mes projets"><?= get_field('home_header_second_link')['title'] ?></a></li>
                <li><a class="cards_link" href="<?= get_field('home_header_third_link')['url'] ?>" title="Aller vers la page me contacter"><?= get_field('home_header_third_link')['title'] ?></a></li>

            </ul>

        </div>

        <div class="scroll_down">

            <p class="scroll_down_phrase">Scrollez vers le bas</p>

        </div>

    </div>

<?php endwhile; ?>

<?php endif; ?>

    </div>

    <div class="background"></div>

    </header>

    <main>

    </main>

<?= get_footer() ?>