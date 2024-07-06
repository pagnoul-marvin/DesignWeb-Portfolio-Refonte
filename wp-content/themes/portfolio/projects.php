<?=

/*
Template Name: Projects
*/

get_header();

$args = array(
    'post_type' => 'header',
    'title' => 'Projects',
    'posts_per_page' => 1
);

// Effectuer la requête WP_Query
$header_query = new WP_Query($args);


if ($header_query->have_posts()) : while ($header_query->have_posts()) :$header_query->the_post(); ?>


    <div class="flex_container">

        <div class="title_and_catchphrase_container">

            <h2 class="main_title">

                <?= get_field('projects_header_title') ?>

            </h2>

            <p class="catchphrase"><?= get_field('projects_header_catchphrase') ?></p>


        </div>

        <div class="list_links">

            <ul class="flex_container">

                <li>

                    <span class="cards_link_image"></span>

                    <a class="cards_link" href="<?= get_field('projects_header_first_link')['url'] ?>"
                       title="Aller vers la page À propos"><?= get_field('projects_header_first_link')['title'] ?></a>

                </li>

                <li>

                    <span class="cards_link_image"></span>

                    <a class="cards_link" href="<?= get_field('projects_header_second_link')['url'] ?>"
                       title="Aller vers la page Mes projets"><?= get_field('projects_header_second_link')['title'] ?></a>

                </li>

                <li>

                    <span class="cards_link_image"></span>

                    <a class="cards_link" href="<?= get_field('projects_header_third_link')['url'] ?>"
                       title="Aller vers la page me contacter"><?= get_field('projects_header_third_link')['title'] ?></a>

                </li>

            </ul>

        </div>

    </div>

<?php endwhile; ?>

<?php endif; ?>

    </div>

    <div class="background"></div>

    </header>

<?php

$projects = new WP_Query([
    'post_type' => 'project',
    'post_status' => 'publish',
    'posts_per_page' => -1,
    'orderby' => 'date',
    'order' => 'ASC'
]);

?>

    <main>

        <?php dw_component('no_js_banner') ?>

        <section class="section">

            <h2>Mes projets</h2>

            <div class="projects_container flex_container">

                <?php if ($projects->have_posts()) : while ($projects->have_posts()) :$projects->the_post(); ?>

                    <article>

                        <h3 class="hidden"><?= get_field('project_title') ?></h3>

                        <div class="project_content flex_container">

                            <img src="<?= get_field('project_image')['url'] ?>"
                                 alt="<?= get_field('project_image')['alt'] ?>"
                                 width="<?= get_field('project_image')['width'] ?>"
                                 height="<?= get_field('project_image')['height'] ?>">

                            <div class="text_and_links flex_container">

                                <p class="text"><?= get_field('project_description') ?></p>

                                <div class="links_container flex_container">

                                    <a class="cta_links dark_links" href="<?= get_field('project_first_link')['url'] ?>"
                                       title="<?= get_field('project_first_link')['title'] ?> de <?= get_the_title() ?>">
                                        <?= get_field('project_first_link')['title'] ?>
                                    </a>

                                    <?php if (get_field('project_first_link')['url'] != home_url() . '/mes-projets/mon-portfolio/'): ?>

                                        <a class="cta_links transparent_links_blue"
                                           href="<?= get_field('project_second_link')['url'] ?>"
                                           title="Se rediriger vers le site de <?= get_the_title() ?>">
                                            <?= get_field('project_second_link')['title'] ?>
                                        </a>

                                    <?php endif; ?>

                                </div>

                            </div>

                        </div>

                    </article>

                <?php endwhile; endif; ?>

            </div>

        </section>

        <?php dw_component('contact_me'); ?>

    </main>

<?php get_footer() ?>