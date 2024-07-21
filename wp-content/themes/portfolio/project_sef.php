<?=

/*
Template Name: Project SEF
*/

get_header();

$args = array(
    'post_type' => 'header',
    'title' => 'SEF',
    'posts_per_page' => 1
);

// Effectuer la requête WP_Query
$header_query = new WP_Query($args);


if ($header_query->have_posts()) : while ($header_query->have_posts()) :$header_query->the_post(); ?>

    <div class="flex_container" itemscope itemtype="https://schema.org/CreativeWork">

        <div class="title_and_catchphrase_container">

            <h2 class="main_title" itemprop="name">

                <?= get_field('sef_header_title') ?>

            </h2>

            <p class="catchphrase"><?= get_field('sef_header_catchphrase') ?></p>


        </div>

        <div class="list_links flex_container">

            <ul class="flex_container">

                <li>

                    <span class="cards_link_image"></span>

                    <a class="cards_link" href="<?= get_field('sef_header_first_link')['url'] ?>"
                       title="Aller vers la page À propos"><?= get_field('sef_header_first_link')['title'] ?></a>

                </li>

                <li>

                    <span class="cards_link_image"></span>

                    <a class="cards_link" href="<?= get_field('sef_header_second_link')['url'] ?>"
                       title="Aller vers la page Mes projets"><?= get_field('sef_header_second_link')['title'] ?></a>

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

    <?php dw_component('no_js_banner') ?>

    <?php dw_component('go_back_nav') ?>

    <section class="spacing section">

        <h2>Pr&eacute;sentation</h2>

        <?php

        $presentation = new WP_Query([
            'post_type' => 'sef-presentation',
            'posts_per_page' => 1,
            'post_status' => 'publish'
        ]);

        $language = new WP_Query([
            'post_type' => 'sef-language',
            'posts_per_page' => 1,
            'post_status' => 'publish'
        ]);

        $gallery = new WP_Query([
            'post_type' => 'sef-gallery',
            'posts_per_page' => 1,
            'post_status' => 'publish'
        ]);

        ?>

        <?php if ($presentation->have_posts()) : while ($presentation->have_posts()) :$presentation->the_post(); ?>

            <div class="presentation_container">

                <article>

                    <h3 class="hidden"><?= get_field('presentation_title') ?></h3>

                    <div class="presentation_content flex_container">


                        <img src="<?= get_field('presentation_image')['url'] ?>"
                             alt="<?= get_field('presentation_image')['alt'] ?>"
                             width="<?= get_field('presentation_image')['width'] ?>"
                             height="<?= get_field('presentation_image')['height'] ?>">

                        <div class="text_and_links flex_container" itemscope itemtype="https://schema.org/CreativeWork">

                            <p class="text" itemprop="name"><?= get_field('presentation_description') ?></p>

                            <div class="links_container flex_container">

                                <a class="cta_links dark_links"
                                   href="<?= get_field('presentation_first_link')['url'] ?>"
                                   title="<?= get_field('presentation_first_link')['title'] ?>">
                                    <?= get_field('presentation_first_link')['title'] ?>
                                </a>

                                <a class="cta_links transparent_links_blue"
                                   href="<?= get_field('presentation_second_link')['url'] ?>"
                                   title="<?= get_field('presentation_second_link')['title'] ?>">
                                    <?= get_field('presentation_second_link')['title'] ?>
                                </a>

                            </div>

                        </div>

                    </div>

                </article>

            </div>

        <?php endwhile; endif; ?>

    </section>

    <section class="spacing section">

        <h2>Langages utilis&eacute;s</h2>

        <?php if ($language->have_posts()) : while ($language->have_posts()) :$language->the_post(); ?>

            <div class="language_container">

                <article>

                    <h3 class="hidden"><?= get_field('language_title') ?></h3>

                    <div class="language_content flex_container">


                        <img src="<?= get_field('language_image')['url'] ?>"
                             alt="<?= get_field('language_image')['alt'] ?>"
                             width="<?= get_field('language_image')['width'] ?>"
                             height="<?= get_field('language_image')['height'] ?>">

                        <div class="text_and_links flex_container">

                            <p class="text"><?= get_field('language_description') ?></p>

                        </div>

                    </div>

                </article>

            </div>

        <?php endwhile; endif; ?>

    </section>

    <section class="section spacing">

        <h2>Galerie photos</h2>

        <?php if ($gallery->have_posts()) : while ($gallery->have_posts()) :$gallery->the_post(); ?>

            <div class="slider_container">

                <div class="slideshow">

                    <ul class="slideshow_content"><!--
			-->
                        <li><img src="<?= get_field('gallery_first_image')['url'] ?>"
                                 alt="<?= get_field('gallery_first_image')['alt'] ?>"
                                 width="<?= get_field('gallery_first_image')['width'] ?>"
                                 height="<?= get_field('gallery_first_image')['height'] ?>"></li><!--
			-->
                        <li><img src="<?= get_field('gallery_second_image')['url'] ?>"
                                 alt="<?= get_field('gallery_second_image')['alt'] ?>"
                                 width="<?= get_field('gallery_second_image')['width'] ?>"
                                 height="<?= get_field('gallery_second_image')['height'] ?>"></li><!--
			-->
                        <li><img src="<?= get_field('gallery_third_image')['url'] ?>"
                                 alt="<?= get_field('gallery_third_image')['alt'] ?>"
                                 width="<?= get_field('gallery_third_image')['width'] ?>"
                                 height="<?= get_field('gallery_third_image')['height'] ?>"></li>

                    </ul>

                </div>

                <button class="slider_button" id="before" title="Voir la photo précédente"></button>
                <button class="slider_button" id="after" title="Voir la photo suivante"></button>

            </div>

        <?php endwhile; endif; ?>

    </section>

    <?php dw_component('contact_me'); ?>

</main>

<?php get_footer() ?>
