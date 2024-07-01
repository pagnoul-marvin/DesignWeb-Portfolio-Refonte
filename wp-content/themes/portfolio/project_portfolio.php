<?=

/*
Template Name: Project portfolio
*/

get_header();

$args = array(
    'post_type' => 'header',
    'title' => 'Portfolio',
    'posts_per_page' => 1
);

// Effectuer la requête WP_Query
$header_query = new WP_Query($args);


if ($header_query->have_posts()) : while ($header_query->have_posts()) :$header_query->the_post(); ?>

    <div class="flex_container">

        <div class="title_and_catchphrase_container">

            <h2 class="main_title">

                <?= get_field('portfolio_header_title') ?>

            </h2>

            <p class="catchphrase"><?= get_field('portfolio_header_catchphrase') ?></p>


        </div>

    </div>

<?php endwhile; ?>

<?php endif; ?>

</div>

<div class="background"></div>
<?php dw_component('scroll_down') ?>


</header>

<main>

    <?php dw_component('go_back_nav') ?>


    <?php dw_component('contact_me'); ?>

</main>

<?php get_footer() ?>
