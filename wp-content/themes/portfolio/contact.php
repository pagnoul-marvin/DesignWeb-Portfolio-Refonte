<?php

/*
Template Name: Contact
*/

use DW\ContactForm;

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

                $errors = ContactForm::errors();
                $values = ContactForm::values();
                $feedback = ContactForm::feedback();

                if ($errors):?>

                    <div class="form__error">

                        <p>Oups&nbsp;! Il semblerait y avoir des erreurs, merci de v&eacute;rifier.</p>

                    </div>

                <?php else: ?>

                    <?php if ($feedback): ?>

                        <div class="form__feedback">

                            <p>Merci&nbsp;! Votre message a bien &eacute;t&eacute; envoy&eacute;.</p>

                        </div>

                    <?php endif; ?>

                <?php endif; ?>

                <form action="<?= esc_url(admin_url('admin-post.php')) ?>" method="post" class="flex_container text">

                    <p>Les champs dot&eacute;s d&rsquo;une &laquo;&ast;&raquo; sont requis.</p>

                    <fieldset class="flex_container">

                        <legend>Vos coordonn&eacute;es</legend>

                        <div class="label_input">

                            <label class="label_positioning" for="firstname">Votre pr&eacute;nom&ast;&nbsp;: 255 caract&egrave;res
                                maximum</label>

                            <input type="text" id="firstname" required placeholder="Ex : Jacques" value="<?= $values['firstname'] ?? '' ?>">

                            <?php if ($errors['firstname'] ?? null): ?>
                                <p class="field__error"><?= $errors['firstname'] ?></p>
                            <?php endif; ?>

                        </div>

                        <div class="label_input">

                            <label class="label_positioning" for="lastname">Votre nom&ast;&nbsp;: 255 caract&egrave;res
                                maximum</label>

                            <input type="text" id="lastname" required placeholder="Ex : Dupont" value="<?= $values['lastname'] ?? '' ?>">

                            <?php if ($errors['lastname'] ?? null): ?>
                                <p class="field__error"><?= $errors['lastname'] ?></p>
                            <?php endif; ?>

                        </div>

                        <div class="label_input">

                            <label class="label_positioning" for="mail">Votre adresse mail&ast;&nbsp;: Votre adresse
                                mail doit &ecirc;tre
                                valide</label>

                            <input type="email" id="mail" required placeholder="Ex : Jacques" value="<?= $values['email'] ?? '' ?>">

                            <?php if ($errors['email'] ?? null): ?>
                                <p class="field__error"><?= $errors['email'] ?></p>
                            <?php endif; ?>

                        </div>

                    </fieldset>

                    <fieldset class="flex_container">

                        <legend>Votre message</legend>

                        <div class="label_input">

                            <label class="label_positioning" for="message">Votre message&ast;&nbsp;:</label>

                            <textarea id="message" required rows="10"
                                      placeholder="Ex : Je souhaite vous contacter afin de ..."><?= $values['message'] ?? '' ?></textarea>

                            <?php if ($errors['message'] ?? null): ?>
                                <p class="field__error"><?= $errors['message'] ?></p>
                            <?php endif; ?>

                        </div>

                    </fieldset>

                    <div>

                        <input type="hidden" name="action" value="custom_contact_form">

                        <input class="cta_links dark_links" type="submit" title="Soumettre le formulaire"
                               value="Soumettre">

                    </div>

                </form>

            </div>

        </section>

    </main>

<?= get_footer() ?>