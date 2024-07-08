<footer>

    <article class="flex_container">

        <h2 class="hidden">Navigation de pied de page</h2>

        <nav class="flex_container">

            <h3>Navigation</h3>

            <ul class="flex_container">

                <?php foreach (dw_get_navigation_links('footer') as $link): ?>

                    <li>

                        <a class="main_footer_link text" href="<?= $link->url ?>"
                           title="Aller vers la page <?= $link->label ?>"><?= $link->label ?></a>

                    </li>

                <?php endforeach; ?>

            </ul>

        </nav>

        <aside class="flex_container">

            <h3>Mes r&eacute;seaux</h3>

            <ul class="flex_container">

                <?php foreach (dw_get_navigation_links('socials') as $link): ?>

                    <li itemprop="sameAs" itemscope itemtype="https://schema.org/URL">

                        <a itemprop="url" class="text" href="<?= $link->url ?>"
                           title="Aller vers la page <?= $link->label ?>"><?= $link->label ?></a>

                    </li>

                <?php endforeach; ?>

            </ul>

        </aside>

        <div class="flex_container">

            <h3>Contactez&ndash;moi&nbsp;!</h3>

            <div>

                <p class="text">Si vous d&eacute;sirez r&eacute;aliser un projet avec moi, n&rsquo;h&eacute;sitez pas &agrave; me
                    contacter&nbsp;!</p>

                <a class="cta_links light_links_footer" href="<?= home_url() . '/me-contacter/' ?>"
                   title="Aller vers la page me contacter">Contactez&ndash;moi&nbsp;!</a>

            </div>

        </div>

    </article>

    <article class="flex_container">

        <h2 class="hidden">Mentions l&eacute;gales</h2>

        <small class="text">&copy; 2024 <span itemprop="givenName">Marvin</span> <span itemprop="familyName">Pagnoul</span> &ndash; Tous droits r&eacute;serv&eacute;s</small>

        <small><a class="main_footer_link" href="<?= home_url() . '/mentions-legales/' ?>"
                  title="Aller voir les mentions légales">Mentions l&eacute;gales</a></small>

    </article>

</footer>

<div class="progress_bar" id="progress_bar"></div>

</body>
</html>
