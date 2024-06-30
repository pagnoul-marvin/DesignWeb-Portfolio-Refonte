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

    <?php dw_component('scroll_down') ?>

<?php endwhile; endif; ?>

</div>

<div class="background"></div>

</header>

<main>

    <section class="section">



    </section>

</main>

<?php get_footer() ?>
