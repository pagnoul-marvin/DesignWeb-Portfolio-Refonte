<?=

/*
Template Name: Accueil
*/

get_header();

$args = array(
    'post_type' => 'header',
    'title' => 'Home',
    'posts_per_page' => 1
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

            <ul class="flex_container">

                <li>
                    <span class="cards_link_image"></span>

                    <a class="cards_link" href="<?= get_field('home_header_first_link')['url'] ?>"
                       title="Aller vers la page À propos"><?= get_field('home_header_first_link')['title'] ?></a>
                </li>

                <li>
                    <span class="cards_link_image"></span>

                    <a class="cards_link" href="<?= get_field('home_header_second_link')['url'] ?>"
                       title="Aller vers la page Mes projets"><?= get_field('home_header_second_link')['title'] ?></a>
                </li>

                <li>
                    <span class="cards_link_image"></span>

                    <a class="cards_link" href="<?= get_field('home_header_third_link')['url'] ?>"
                       title="Aller vers la page me contacter"><?= get_field('home_header_third_link')['title'] ?></a>
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

        <section class="section">

            <h2>Mes derniers projets</h2>

            <div class="last_projects_container flex_container">
                <?php

                $last_projects = new WP_Query([
                    'post_type' => 'last-project',
                    'post_status' => 'publish',
                    'posts_per_page' => 3,
                    'orderby' => 'date',
                    'order' => 'ASC',
                ]);

                if ($last_projects->have_posts()): while ($last_projects->have_posts()): $last_projects->the_post(); ?>

                    <article class="last_project">

                        <h3 class="hidden"><?= get_field('last_project_title') ?></h3>

                        <a title="Aller vers la page <?= get_field('last_project_link')['title'] ?>"
                           href="<?= get_field('last_project_link')['url'] ?>"><?= get_field('last_project_link')['title'] ?></a>

                    </article>

                <?php endwhile; endif; ?>

            </div>

        </section>

        <?php

        $cv = new WP_Query([
            'post_type' => 'home-cv',
            'status' => 'publish',
            'posts_per_page' => 1,
        ]);

        if ($cv->have_posts()): while ($cv->have_posts()): $cv->the_post(); ?>

            <section class="spacing home_cv">

                <div class="home_cv_container">

                    <h2><?= get_field('cv_title') ?></h2>

                    <p><?= get_field('cv_catchphrase') ?></p>

                    <div class="cv_links_container flex_container">

                        <a class="cta_links transparent_links_white" title="<?= get_field('cv_first_link')['title'] ?>"
                           href="<?= get_field('cv_first_link')['url'] ?>"><?= get_field('cv_first_link')['title'] ?></a>

                        <a class="cta_links light_links" title="<?= get_field('cv_second_link')['title'] ?>"
                           href="<?= get_field('cv_second_link')['url'] ?>"><?= get_field('cv_second_link')['title'] ?></a>

                    </div>

                </div>

                <div class="cv_background"></div>

            </section>

        <?php endwhile; endif; ?>

    </main>

<?= get_footer() ?>