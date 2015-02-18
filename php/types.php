<?php
    include("haut.php");
    include ("connect.php");
?>
<?php
    if(isset($_GET["id"]))
    {
        $types=$_GET["id"];
        $nbr=count($types);

        if($nbr>0)
        {
            if($types[0] != "" and $types[0] != " ")
            {
                $req = "select * from TypeContenu where id in (".$types[0];
                $i = 1;

                while($i<$nbr)
                {
                    if($types[$i] != " " and $types[$i] != "")
                        $req.=",".$types[$i];
                    $i++;
                }

                $req.=") order by nom;";
                $link->prepare($req);
                $resultats = $link->query($req);
                $types = array();
                if($resultats->rowCount() > 0)
                {
                ?>
        <h2>
            Résultats pour :
        </h2>
        <div class="alert alert-info" role="alert">
            <h4>
                <?php
                foreach ($resultats as $row)
                {
                    $types[] = $row['id'];
                    ?>
                        <span class="label label-info"><a href="types.php?id[]=<?php print $row['id']; ?>"><?php print $row['nom']; ?></a></span> &nbsp;
                    <?php
                }
                ?>
            </h4>
        </div>
    </div>
</div>
<div class="container">
                    <?php

                    //@TODO optimiser cette requete degeulasse !!!
                    $req = "select id, nom, description from Article where id in (select idArticle from representer where idTypeContenu in (".$types[0];
                    $i=1;
                    $nbr = $resultats->rowCount();
                    while($i<$nbr)
                    {
                        $req.=",".$types[$i];
                        $i++;
                    }
                    $req.=")) order by nom;";
                    $link->prepare($req);
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
                                <strong>Aucun résultat !</strong> vérifiez vos choix et effectuez une nouvelle recherche.
                            </div>
                        <?php
                    }
                }
                else
                {
                    ?>
                        <div class="alert alert-info" role="alert">
                            <strong>Aucun résultat !</strong> vérifiez vos choix et effectuez une nouvelle recherche.
                        </div>
                    <?php
                }
            }
            else
            {
                ?>
    </div>
</div>
<div class="container">
                    <div class="alert alert-danger" role="alert">
                        <strong>Aucun mot clef !</strong> effectuez une nouvelle recherche de façon valide.
                    </div>
                <?php
            }
        }
    }
    else
    {
        ?>
        <h2>
            Tous les types d'articles :
        </h2>
    </div>
</div>
<div class="container">
            <div class="alert alert-info" role="alert">
                <strong>Rechercher par type</strong>, vous êtes sur la page de recherche d'articles par leur(s) type(s).
            </div>
        <?php
        // choix
        $req.="select id, nom, description from TypeContenu order by nom;";
        $link->prepare($req);
        $resultats = $link->query($req);
        if($resultats->rowCount() > 0)
        {
            ?>
            <form role="form-group" method="GET" action="types.php">
                <?php
                    foreach ($resultats as $row)
                    {
                        $req = "select idArticle from representer where idTypeContenu='".$row['id']."';";
                        $link->prepare($req);
                        ?>
                            <div class="panel panel-success">
                                <div class="panel-heading">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="id[]" value="<?php print $row['id']; ?> ">
                                            <h3 class="panel-title">
                                                <span class="label label-info"><?php print $row['nom']; ?></span>
                                                contient
                                                <span class="badge"><?php print $link->query($req)->rowCount(); ?></span>
                                                anime(s).
                                            </h3>
                                        </label>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <p><?php print $row['description']; ?></p>
                                </div>
                            </div>
                        <?php
                    }
                ?>
                <button type="submit" class="btn btn-lg btn-primary btn-block">Rechercher</button>
            </form>
            <?php
        }
        else
        {
            ?>
                <div class="alert alert-info" role="alert">
                    <strong>Aucun type !</strong> La base de données est vide ! O.o"
                </div>
            <?php
        }
    }
?>
</div>

<?php include("bas.php"); ?>
