<?php
    include("connect.php");
    // @TODO
    //if !connect

    if(isset($_POST['nom']) && isset($_POST['desc']))
    {
        $query="INSERT INTO TypeContenu (`nom`, `description`) VALUES ('".htmlspecialchars($_POST['nom'])."','".htmlspecialchars($_POST['desc'])."');";
        $link->prepare($query);
        $link->execute($query);
    }

    header('Location:./types.php');
?>
