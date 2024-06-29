<?= get_header();

$args = array(
    'post_type' => 'header', // Slug de votre CPT créé via ACF
    'title' => 'Home',
    'posts_per_page' => 1 // Affiche un seul post
);

// Effectuer la requête WP_Query
$header_query = new WP_Query($args);


if ($header_query->have_posts()) : while ($header_query->have_posts()) :$header_query->the_post(); ?>

        <h2 class="main_title"><?= esc_html(get_field('home_header_first_title')) ?></h2>

    <?php endwhile; ?>

<?php endif; ?>

    </div>
    <div class="background"></div>

    </header>

    <main>

    </main>

    <?= get_footer() ?>