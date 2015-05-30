        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="/">
                        <?= $titrePage ?>
                    </a>
                </div>
                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li>
                            <a href="">
                                Recherche
                            </a>
                        </li>
                        <li>
                            <a href="">
                                Tous
                            </a>
                        </li>
<?
//if
?>
                        <li>
                            <a href="">
                                Connexion
                            </a>
                        </li>
<?
//else
?>
                        <li>
                            <a href="">
                                Compte
                            </a>
                        </li>
                        <li>
                            <a href="">
                                D&eacute;connexion
                            </a>
                        </li>
<?
//fi
?>
                    </ul>
                </div>
            </div>
        </nav>
