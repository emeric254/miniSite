<?php
	include("haut.php");
    // @TODO
    //if !connect
?>
                <h2 class="form-signin-heading">Connectez-vous</h2>
            </div>
        </div>
        <div class="container">
            <form class="form-signin" method="POST" action="login.php">
                <label for="login" class="sr-only">Login</label>
                <input id="login" class="form-control" placeholder="Login" required="" autofocus="" type="login">

                <label for="password" class="sr-only">Mot de passe</label>
                <input id="password" class="form-control" placeholder="Mot de passe" required="" type="password">

                <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
            </form>
        </div>
<?php
	include("haut.php");
    // @TODO
    //else
    /*
?>
                <h2 class="form-signin-heading">Menu Administration</h2>
            </div>
        </div>
        <div class="container">
			* MENU ADMIN * 
        </div>
<?php
	*/
?>
    </body>
</html>
