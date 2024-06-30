<?php

/*
Template Name: Contact
*/

get_header();
$args = array(
    'post_type' => 'header',
    'title' => 'Contact',
    'posts_per_page' => 1
);

// Effectuer la requête WP_Query
$header_query = new WP_Query($args);


if ($header_query->have_posts()) : while ($header_query->have_posts()) :$header_query->the_post(); ?>


    <div class="flex_container">

        <div class="title_and_catchphrase_container">

            <h2 class="main_title"><?= get_field('contact_header_title') ?></h2>

            <p class="catchphrase"><?= get_field('contact_header_catchphrase') ?></p>

        </div>

        <div class="list_links">

            <ul class="flex_container">

                <li>

                    <a href="<?= get_field('contact_header_first_link')['url'] ?>"
                       title="<?= get_field('contact_header_first_link')['title'] ?>"
                       class="cards_link"><?= get_field('contact_header_first_link')['title'] ?>
                    </a>

                </li>

                <li>

                    <a href="<?= get_field('contact_header_second_link')['url'] ?>"
                       title="<?= get_field('contact_header_second_link')['title'] ?>"
                       class="cards_link"><?= get_field('contact_header_second_link')['title'] ?>
                    </a>

                </li>

            </ul>

        </div>

    </div>

<?php endwhile; endif; ?>

</div>

<div class="background"></div>
<?php dw_component('scroll_down') ?>

</header>

<main>



</main>

<?= get_footer() ?>