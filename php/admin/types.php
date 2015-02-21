<?php include ("connect.php"); ?>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link rel="stylesheet" type="text/css" href="creer.css">
    <title>Ajout d'un Type d'Article</title>
</head>
<body>
    <div id="creer">
        <fieldset>
            <form action="registerType.php" method="POST">
                <table>
                    <tr>
                        <th>
                            <label for="nom"> Nom : </label>
                        </th>
                        <td colspan="3">
                            <input type="texte" name="nom" id="nom" value=""/>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            <label for="desc"> Description : </label>
                        </th>
                        <td colspan="3">
                            <textarea name="desc" cols="50" rows="5" id="desc"></textarea>
                        </td>
                    </tr>
                    <tr>
                        <th colspan="3"><br />
                            <div class="bouton">
                                <input type="submit" value="Créer" class="bouton" id="create">
                            </div>
                        </th>
                    </tr>
                </table>
            </form>
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
$r=mysql_query("select * from TypeContenu") or die(mysql_error());
while($a=mysql_fetch_object($r)) {
    echo '      <tr>
                    <td colspan="2">'.$a->id.'</td>
                    <td colspan="2">'.$a->nom.'</td>
                </tr>';
}
?>
            </table>
        </fieldset>
    </div>
</body>
</html>
