<?php
    $titrePage = "Accueil";
    include("static/haut.php");
    include("static/navbar.php");
?>
        <div class="alert alert-success" role="alert">
            <strong>Bienvenue!</strong> Naviguez sur le site en faisant votre choix dans la barre de menu ci dessus ;)
        </div>

        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner" role="listbox">
                <?php
                    $nbSlides = 3;

                    $min = 0;
                    $max = 18;

                    $slides = array();

                    if(($max - $min) > $nbSlides)
                    {
                        for ($i=0;$i<$nbSlides;$i++)
                        {
                            $r = mt_rand ($min ,$max);
                            while(in_array($r, $slides))
                            {
                                $r = mt_rand ($min ,$max);
                            }
                            $slides[] = $r;
                        }

                        for ($i=0;$i<($nbSlides - 1);$i++)
                        {
                            ?>
                                <div class="item">
                                    <img data-holder-rendered="true" src="images/accueil/<?php print $slides[$i]; ?>-min.jpg" alt="<?php print $slides[$i]; ?>">
                                </div>
                            <?php
                        }

                        ?>
                            <div class="item active">
                                <img data-holder-rendered="true" src="images/accueil/<?php print $slides[$nbSlides - 1]; ?>-min.jpg" alt="<?php print $slides[$nbSlides - 1]; ?>">
                            </div>
                        <?php
                    }
                    else
                    {
                        ?>
                            <div class="item active">
                                <img data-holder-rendered="true" src="images/accueil/<?php print $min; ?>-min.jpg" alt="<?php print $min; ?>">
                            </div>
                        <?php
                    }
                ?>
            </div>
        </div>
    </div>
</div>
<?php
    include("static/bas.php");
?>
