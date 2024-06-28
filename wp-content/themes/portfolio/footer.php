<footer>

    <div>

        <article class="flex_container">

            <h2 class="hidden">Navigation de pied de page</h2>

            <nav>

                <h3>Navigation</h3>

                <ul>

                    <?php foreach (dw_get_navigation_links('footer') as $link): ?>

                        <li>

                            <a class="main_footer_link" href="<?= $link->url ?>"
                               title="Aller vers la page <?= $link->label ?>"><?= $link->label ?></a>

                        </li>

                    <?php endforeach; ?>

                </ul>

            </nav>

            <aside>

                <h3>Mes r&eacute;seaux</h3>

                <ul>

                    <?php foreach (dw_get_navigation_links('socials') as $link): ?>

                        <li>

                            <a href="<?= $link->url ?>"
                               title="Aller vers la page <?= $link->label ?>"><?= $link->label ?></a>

                        </li>

                    <?php endforeach; ?>

                </ul>

            </aside>

            <div>

                <h3>Contactez&ndash;moi&nbsp;!</h3>

                <p>Si vous d&eacute;sirez r&eacute;aliser un projet avec moi, n&rsquo;h&eacute;sitez pas &agrave; me contacter&nbsp;!</p>

                <a href="<?= home_url().'/me-contacter/' ?>" title="Aller vers la page me contacter">Contactez&ndash;moi&nbsp;!</a>

            </div>

        </article>

        <article>

            <h2 class="hidden">Mentions l&eacute;gales</h2>

            <small>&copy; 2024 Marvin Pagnoul &ndash; Tous droits r&eacute;serv&eacute;s</small>

            <small><a class="main_footer_link" href="<?= home_url() . '/mentions-legales/' ?>" title="Aller voir les mentions légales">Mentions l&eacute;gales</a></small>

        </article>
    </div>

</footer>

</body>
</html>
