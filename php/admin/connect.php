<?php
	
	// debut de l'implémentation de la partie admin securisée
	
    // @TODO
	session_start();
    
    // @TODO
    $host = "server";
    $database = "database";
    $login = "login";
    $pass = "password";
    
    try
    {
        $link = new PDO("mysql:host=".$host.";dbname=".$database, $login, $pass);
        $link->exec("SET CHARACTER SET utf8");
        /*
            $link = new PDO("mysql:host=".$host.";dbname=".$database, $login, $pass, array(PDO::ATTR_PERSISTENT => true));
        */
    }
    catch (PDOException $e)
    {
        ?>
            <div class="alert alert-danger" role="alert">
                <strong>Erreur !</strong> impossible de se connecter à la base de donnees ...
            </div>
        </div>
    </div>
</body>
</html>
        <?php
        die();
    }
?>
