<?php
    include("haut.php");
    include("connect.php");

    if(isset($_GET['id']))
    {
        $id = htmlspecialchars($_GET['id']);
        $req = "select id, nom, description from Article where id=".$id.";";
        $link->prepare($req);
        $resultats = $link->query($req);
        if($resultats->rowCount() > 0)
        {
            $row = $resultats->fetch(PDO::FETCH_OBJ);
        ?>
            <h2><?php print $row->nom; ?></h2>
            <h4>
                <?php
                    $req2 = "select id, nom from TypeContenu where id in (select idTypeContenu from representer where idArticle='".$row->id."') order by nom";
                    $link->prepare($req2);
                    $resultats2 = $link->query($req2);
                    foreach  ( $resultats2 as $row2)
                    {
                        ?>
                            <span class="label label-info"><a href="types.php?id[]=<?php print $row2['id']; ?>"><?php print $row2['nom']; ?></a></span> &nbsp;
                        <?php
                    }
                ?>
            </h4>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <!-- image -->
            <div class="col-md-6">
                <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner" role="listbox">
                        <div class="item active">
                            <img data-holder-rendered="true" src="images/Articles/<?php print $row->id; ?>.jpg" alt="<?php print $row->id; ?>">
                        </div>
                    </div>
                </div>
            </div>
            <!-- /image -->
            <!-- synopsis -->
            <div class="col-md-6">
                <div class="panel panel-success">
                    <div class="panel-heading">
                        <h3 class="panel-title">Synopsis</h3>
                    </div>
                    <div class="panel-body">
                        <p><?php print $row->description; ?></p>
                    </div>
                </div>
            </div>
            <!-- /synopsis -->
            <!-- liens -->
            <?php
                $req3 = "select id, description, idArticle, typeLien from Lien where idArticle=".$row->id." ;";
                $link->prepare($req3);
                $resultats3 = $link->query($req3);
                if($resultats3->rowCount() > 0)
                {
                    foreach  ( $resultats3 as $row3)
                    {
                        $req4 = "select id, nom, description from TypeLien where id=".$row3['typeLien'].";";
                        $link->prepare($req4);
                        $resultats4 = $link->query($req4);
                        $row4 = $resultats4->fetch(PDO::FETCH_OBJ);
                        ?>
                            <div class="col-md-6">
                                <div class="panel panel-info">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Lien <?php print $row4->nom; ?></h3>
                                    </div>
                                    <div class="panel-body">
                                        <p><?php print $row3['description']; ?></p>
                                    </div>
                                </div>
                            </div>
                        <?php
                    }
                }
                else
                {
                    ?>
                        <div class="col-md-6">
                            <div class="container">
                                <div class="alert alert-danger" role="alert">
                                    <strong>Aucun lien disponible</strong>, cette anime n'est pas encore disponible, revenez un peu plus tard ;)
                                </div>
                            </div>
                        </div>
                    <?php
                }
                // foreach liens from dji where idArticle = id;
            ?>
            <!-- /liens -->
        </div>
    </div>
    <?php
        }
        else
        {
    ?>
    </div>
</div>
    <div class="container">
        <div class="alert alert-danger" role="alert">
            <strong>ID invalide</strong> Vous êtes sur une page inexistante.
        </div>
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
            <strong>Erreur !</strong> Vous êtes sur une page inexistante.
        </div>
    </div>
<?php
    }
?>
<?php include("bas.php"); ?>
