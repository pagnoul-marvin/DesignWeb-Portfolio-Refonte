<?php
/*
Template Name: About
*/

get_header();
$args = array(
    'post_type' => 'header',
    'title' => 'About',
    'posts_per_page' => 1
);

// Effectuer la requête WP_Query
$header_query = new WP_Query($args);


if ($header_query->have_posts()) : while ($header_query->have_posts()) :$header_query->the_post(); ?>

    <div class="flex_container">

        <div class="title_and_catchphrase_container">

            <h2 class="main_title"><?= get_field('about_header_title') ?></h2>

            <p class="catchphrase"><?= get_field('about_header_catchphrase') ?></p>

        </div>

        <img src="<?= get_field('about_header_image')['url'] ?>"
             alt="<?= get_field('about_header_image')['alt'] ?>"
             width="<?= get_field('about_header_image')['width'] ?>"
             height="<?= get_field('about_header_image')['height'] ?>">

    </div>


<?php endwhile; endif; ?>

</div>

<div class="background"></div>
<?php dw_component('scroll_down') ?>

</header>

<main>

    <?php

    $skills = new WP_Query([
        'post_type' => 'skill',
        'post_status' => 'publish',
        'posts_per_page' => -1,
        'orderby' => 'date',
        'order' => 'ASC',
    ]);

    $soft_skills = new WP_Query([
        'post_type' => 'soft-skill',
        'post_status' => 'publish',
        'posts_per_page' => 3,
        'orderby' => 'date',
        'order' => 'ASC',
    ]);

    $hobbies = new WP_Query([
        'post_type' => 'hobbie',
        'post_status' => 'publish',
        'posts_per_page' => 3,
        'orderby' => 'date',
        'order' => 'ASC',
    ]);

    $scholar_career = new WP_Query([
        'post_type' => 'scholar-career',
        'post_status' => 'publish',
        'posts_per_page' => 1,
    ]);

    ?>


    <section class="section">

        <h2>Un amas de comp&eacute;tences dures</h2>

        <div class="skills_container flex_container">

            <?php if ($skills->have_posts()): while ($skills->have_posts()): $skills->the_post(); ?>

                <article class="skill">

                    <h3 class="hidden"><?= get_field('skill_title') ?></h3>

                    <img class="skill_image"
                         src="<?= get_field('skill_image')['url'] ?>"
                         alt="<?= get_field('skill_image')['alt'] ?>"
                         width="<?= get_field('skill_image')['width'] ?>"
                         height="<?= get_field('skill_image')['height'] ?>">


                    <p class="skill_description"><?= get_field('skill_description') ?></p>

                </article>

            <?php endwhile; endif; ?>

        </div>

    </section>

    <section class="section spacing">

        <h2>Quelques soft skills</h2>

        <div class="soft_skills_container flex_container">

            <?php if ($soft_skills->have_posts()): while ($soft_skills->have_posts()):$soft_skills->the_post(); ?>

                <article>

                    <h3 class="soft_skill_title"><?= get_field('soft_skill_title') ?></h3>

                    <p class="soft_skill_description"><?= get_field('soft_skill_description') ?></p>

                </article>

            <?php endwhile; endif; ?>

        </div>

    </section>

    <section class="section spacing">

        <h2>Mes hobbies</h2>

        <div class="hobbies_container flex_container">

            <?php if ($hobbies->have_posts()): while ($hobbies->have_posts()):$hobbies->the_post(); ?>

                <article>

                    <h3 class="hobby_title"><?= get_field('hobby_title') ?></h3>

                    <p class="hobby_description"><?= get_field('hobby_description') ?></p>

                </article>

            <?php endwhile; endif; ?>

        </div>

    </section>

    <section class="section spacing">

        <h2>Ma carri&egrave;re scolaire</h2>

        <div class="scholar_career_container flex_container">

            <?php if ($scholar_career->have_posts()): while ($scholar_career->have_posts()): $scholar_career->the_post(); ?>

                <ul class="flex_container">

                    <li class="flex_container">

                        <div class="scholar_formation">

                            <time><?= get_field('first_date') ?></time>

                            <p><?= get_field('first_description') ?></p>

                        </div>

                    </li>

                    <li class="flex_container">

                        <div class="scholar_formation">

                            <time datetime="2022"><?= get_field('second_date') ?></time>

                            <p><?= get_field('second_description') ?></p>

                        </div>

                    </li>

                    <li class="flex_container">

                        <div class="scholar_formation">

                            <time><?= get_field('third_date') ?></time>

                            <p><?= get_field('third_description') ?></p>

                        </div>

                    </li>

                    <li class="flex_container">

                        <div class="scholar_formation">

                            <time><?= get_field('fourth_date') ?></time>

                            <p><?= get_field('fourth_description') ?></p>

                        </div>

                    </li>

                </ul>

            <?php endwhile; endif; ?>

        </div>

    </section>


    <?php dw_component('contact_me') ?>

</main>

<?php get_footer() ?>
