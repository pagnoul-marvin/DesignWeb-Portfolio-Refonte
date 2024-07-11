<?php

/*Template Name: Error page */

get_header(); ?>

 <div class="flex_container">

        <div class="title_and_catchphrase_container">

            <h2 class="main_title">

                <?= get_the_title(); ?>

            </h2>

            <p class="catchphrase">Une erreur est survenue, veuillez contacter l&rsquo;administrateur.</p>

        </div>

    </div>

    </div>

    <div class="background"></div>

    </header>

<main>

    <section class="section">

        <h2>Une erreur est survenue</h2>

        <p>Veuillez contacter l&rsquo;administrateur&nbsp;:</p>

        <a href="tel:+32494164075" title="Contacter l'administrateur" class="cta_links dark_links error_link">Contacter l&rsquo;administrateur</a>

    </section>

</main>

<?php get_footer() ?>
