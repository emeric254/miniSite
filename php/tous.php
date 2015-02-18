<?php
    include("haut.php");
    include ("connect.php");
?>
        <h2>
            Tous les Articles :
        </h2>
    </div>
</div>
<div class="container">
    <?php
        $req = "select id, nom, description from Article order by nom";
        $link->prepare($req);
        $resultats = $link->query($req);
        if($resultats->rowCount() > 0)
        {
            foreach ($resultats as $row)
            {
                include("ligneArticle.php");
            }
        }
        else
        {
            ?>
                <div class="alert alert-info" role="alert">
                    <strong>Aucun article !</strong> La base de données est vide ! O.o"
                </div>
            <?php
        }
    ?>
</div>
<?php include("bas.php"); ?>
