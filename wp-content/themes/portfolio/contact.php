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

        <div class="list_links flex_container">

            <ul class="flex_container">

                <li>

                    <span class="cards_link_image"></span>

                    <a href="<?= get_field('contact_header_first_link')['url'] ?>"
                       title="<?= get_field('contact_header_first_link')['title'] ?>"
                       class="cards_link"><?= get_field('contact_header_first_link')['title'] ?>
                    </a>

                </li>

                <li>

                    <span class="cards_link_image"></span>

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

    </header>

    <main>

        <?php dw_component('no_js_banner') ?>

        <section class="section">

            <h2>Me contacter par mail</h2>

            <div class="form_container">

                <form action="<?= admin_url('admin-post.php') ?>" method="post" class="flex_container text">

                    <p>Les champs dot&eacute;s d&rsquo;une &laquo;&ast;&raquo; sont requis.</p>

                    <fieldset class="flex_container">

                        <legend>Vos coordonn&eacute;es</legend>

                        <div class="label_input">

                            <label class="label_positioning" for="firstname">Votre pr&eacute;nom&ast;&nbsp;: 255 caract&egrave;res
                                maximum</label>

                            <input type="text" id="firstname" required placeholder="Ex : Jacques">

                        </div>

                        <div class="label_input">

                            <label class="label_positioning" for="lastname">Votre nom&ast;&nbsp;: 255 caract&egrave;res
                                maximum</label>

                            <input type="text" id="lastname" required placeholder="Ex : Dupont">

                        </div>

                        <div class="label_input">

                            <label class="label_positioning" for="mail">Votre adresse mail&ast;&nbsp;: Votre adresse
                                mail doit &ecirc;tre
                                valide</label>

                            <input type="email" id="mail" required placeholder="Ex : Jacques">

                        </div>

                    </fieldset>

                    <fieldset class="flex_container">

                        <legend>Votre message</legend>

                        <div class="label_input">

                            <label class="label_positioning" for="message">Votre message&ast;&nbsp;:</label>

                            <textarea id="message" required rows="10"
                                      placeholder="Ex : Je souhaite vous contacter afin de ..."></textarea>

                        </div>

                    </fieldset>

                    <div>

                        <input type="hidden" name="action" value="custom_contact_form">

                        <input class="cta_links dark_links" type="submit" title="Soumettre le formulaire" value="Soumettre">

                    </div>

                </form>

            </div>

        </section>

    </main>

<?= get_footer() ?>