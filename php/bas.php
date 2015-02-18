        <?php
            /* ferme la connection a la base de donnees */
            $link = null;
        ?>
        <footer class="footer" style="position: absolute; bottom: 0; width: 100%; height: 60px; background-color: #f5f5f5;">
            <div class="container">
                <p class="pull-right">
                    <span class="label label-info">
                        <a href="#">Retour en haut</a>
                    </span>
                </p>
                <p class="text-muted">Ce site s'appuie sur <a href="https://github.com/emeric254/miniSite">miniSite</a>. Il est <?php echo date("G:i"); ?> le <?php echo date("d / m / Y"); ?> </p>
            </div>
        </footer>
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="bootstrap/js/bootstrap.min.js"></script>
    </body>
</html>
