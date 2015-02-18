<?php
    include("haut.php");
    include("connect.php");
?>
        <form method="GET" action="recherche.php">
            <div class="form-group">
                <input placeholder="Recherche" class="form-control" type="text" name="mots"
                    <?php if(isset($_GET["mots"])) print 'value="'.$_GET["mots"].'" '; ?> x-webkit-speech>
                </input>
            </div>
            <button type="submit" class="btn btn-lg btn-primary btn-block">Chercher</button>
        </form>
    </div>
</div>

<!-- Resultat(s) -->
<div class="container">
    <?php
        if(isset($_GET["mots"]))
        {
            $mots=explode(" ",htmlspecialchars($_GET["mots"]));
            $nbr=count($mots);

            if($nbr>0)
            {
                if($mots[0] != "" and $mots[0] != " ")
                {
                    $req="select id, nom from Article where nom like '%".$mots[0]."%'";
                    $i = 1;

                    while($i<$nbr)
                    {
                        if($mots[$i] != " " and $mots[$i] != "")
                            $req.=" and nom like '%".$mots[$i]."%'";
                        $i++;
                    }

                    if($i>1)
                        $req.=" union select id, nom from Article where nom like '%".$mots[0]."%'";

                    $i--;
                    while($i>0)
                    {
                        if($mots[$i] != " " and $mots[$i] != "")
                            $req.=" or nom like '%".$mots[$i]."%'";
                        $i--;
                    }

                    $link->prepare($req." order by nom ;");
                    $resultats = $link->query($req);
                    if($resultats->rowCount() > 0)
                    {
                        ?>
                            <div class="alert alert-info" role="alert">
                                <strong><?php print $resultats->rowCount(); ?> résultat(s) :</strong>.
                            </div>
                        <?php
                        foreach ($resultats as $row)
                        {
                            include("ligneAnime.php");
                        }
                    }
                    else
                    {
                        ?>
                            <div class="alert alert-info" role="alert">
                                <strong>Aucun résultat !</strong> vérifiez vos mots clefs ou effectuez une nouvelle recherche.
                            </div>
                        <?php
                    }
                }
                else
                {
                    ?>
                        <div class="alert alert-danger" role="alert">
                            <strong>Aucun mot clef !</strong> effectuez une recherche de façon valide.
                        </div>
                    <?php
                }
            }
        }
        else
        {
            ?>
                <div class="alert alert-info" role="alert">
                    <strong>Rechercher</strong>, vous êtes sur la page de recherche d'articles.
                </div>
            <?php
        }
    ?>
</div>
<?php include("bas.php"); ?>
