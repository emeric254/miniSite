<?php
    include("connect.php");

    if(isset($_POST['nom']) && isset($_POST['desc']))
    {
        $query="INSERT INTO Article (`nom`, `description`) VALUES ('".htmlspecialchars($_POST['nom'])."','".htmlspecialchars(preg_replace("/'/","\'",$_POST['desc']))."');";
        mysql_query($query) or die(mysql_error());

        $idContenu = mysql_insert_id($link);

        if(isset($_POST['lien'])) {
            $query="INSERT INTO Lien (`description`, `idArticle`, `typeLien`) VALUES ('".$_POST['skylien']."','".$idContenu."','1');";
            mysql_query($query) or die(mysql_error());
        }

        if(isset($_POST['type'])) {
            foreach($_POST['type'] as $temp) {
                $query="INSERT INTO representer VALUES ('".$idContenu."','".htmlspecialchars($temp)."');";
                mysql_query($query) or die(mysql_error());
            }
        }
    }

    header('Location:./creer.php');
?>
