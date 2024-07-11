<?php

/*
Template Name: Contact
*/

require __DIR__.'/database/Database.php';

use Database\Database;

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

                <?php

                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $db = new Database(__DIR__.'/.env.local.ini');
                    $errors = $db->getErrors();
                    $formSubmitted = true;

                    if ($errors):

                        $formSubmitted = false; ?>

                        <div class="form_error">

                            <p class="text">Oups&nbsp;! Il semblerait y avoir des erreurs, merci de v&eacute;rifier.</p>

                        </div>

                    <?php else: ?>

                        <div class="form_feedback">

                            <p class="text">Merci&nbsp;! Votre message a bien &eacute;t&eacute; envoy&eacute;.</p>

                        </div>

                    <?php endif; ?>

               <?php } ?>

                <form action="<?= esc_url(home_url().'/me-contacter/') ?>" method="post" class="flex_container text">

                    <p>Les champs dot&eacute;s d&rsquo;une &laquo;&ast;&raquo; sont requis.</p>

                    <fieldset class="flex_container">

                        <legend>Vos coordonn&eacute;es</legend>

                        <div class="label_input">

                            <label class="label_positioning" for="firstname">Votre pr&eacute;nom&ast;&nbsp;: 255 caract&egrave;res
                                maximum</label>

                            <input type="text" id="firstname" name="firstname" required placeholder="Ex : Jacques">

                            <?php if ($errors['firstname'] ?? null): ?>
                                <p class="field_error text"><?= $errors['firstname'] ?></p>
                            <?php endif; ?>

                        </div>

                        <div class="label_input">

                            <label class="label_positioning" for="lastname">Votre nom&ast;&nbsp;: 255 caract&egrave;res
                                maximum</label>

                            <input type="text" id="lastname" name="lastname" required placeholder="Ex : Dupont">

                            <?php if ($errors['lastname'] ?? null): ?>
                                <p class="field_error text"><?= $errors['lastname'] ?></p>
                            <?php endif; ?>

                        </div>

                        <div class="label_input">

                            <label class="label_positioning" for="email">Votre adresse mail&ast;&nbsp;: Votre adresse
                                mail doit &ecirc;tre
                                valide</label>

                            <input type="email" id="email" name="email" required placeholder="Ex : Jacques">

                            <?php if ($errors['email'] ?? null): ?>
                                <p class="field_error text"><?= $errors['email'] ?></p>
                            <?php endif; ?>

                        </div>

                    </fieldset>

                    <fieldset class="flex_container">

                        <legend>Votre message</legend>

                        <div class="label_input">

                            <label class="label_positioning" for="message">Votre message&ast;&nbsp;:</label>

                            <textarea id="message" name="message" required rows="10"
                                      placeholder="Ex : Je souhaite vous contacter afin de ..."></textarea>

                            <?php if ($errors['message'] ?? null): ?>
                                <p class="field_error text"><?= $errors['message'] ?></p>
                            <?php endif; ?>

                        </div>

                    </fieldset>

                    <div>

                        <input class="cta_links dark_links" type="submit" title="Soumettre le formulaire"
                               value="Soumettre">

                    </div>

                </form>

            </div>

        </section>

    </main>

<?= get_footer() ?>