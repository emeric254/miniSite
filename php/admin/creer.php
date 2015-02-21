<?php
    include("haut.php");
    include("connect.php");
?>
        <fieldset>
            <form action="register.php" method="POST">
                <table>
                    <tr>
                        <th>
                            <label for="nom"> Nom : </label>
                        </th>
                        <td colspan="4">
                            <input type="texte" name="nom" id="nom" value=""/>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            <label for="desc"> Description : </label>
                        </th>
                        <td colspan="4">
                            <textarea name="desc" id="desc"></textarea>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            <label for="lien"> Liens: </label>
                        </th>
                        <td colspan="4">
                            <textarea name="lien" id="lien"></textarea>
                        </td>
                    </tr>
                    <tr>
                        <th colspan="4"><br />
                            <div class="bouton">
                                <input type="submit" value="Créer" class="bouton" id="create">
                            </div>
                        </th>
                    </tr>
                    <tr>
                        <td>
    <?php
    /*
        $r=mysql_query("select * from TypeContenu order by nom;") or die(mysql_error());
        echo '<p> Liste des types : </p>';
        while($a=mysql_fetch_object($r))
            echo '<input type="checkbox" name="type[]" value="'.$a->id.'" >'.$a->nom.'<br/>';
    */
    ?>
                        </td>
                    </tr>
                </table>
            </form>
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
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="id[]" value="<?php print $row['id']; ?> ">
                                    <span class="label label-info"><?php print $row['nom']; ?></span>
                                </label>
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
        ?>
        </fieldset>
    </div>
    <br />
        <div id="creer">
            <fieldset>
                <table>
                    <tr>
                        <td colspan="2">  ID </td>
                        <td colspan="2">  Nom </td>
                    </tr>
    <?php
    /*
    $r=mysql_query("select * from Article") or die(mysql_error());
    while($a=mysql_fetch_object($r)) { echo '
                    <tr>
                        <td colspan="2">'.$a->id.'</td>
                        <td colspan="2">'.$a->nom.'</td>
                    </tr>
    '; }
    */
    ?>
                </table>
            </fieldset>
        </div>
    </div>
<?php include("bas.php"); ?>
