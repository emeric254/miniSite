<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">
            <a href="page.php?id=<?php print $row['id']; ?>">
                <?php print $row['nom']; ?>
            </a>
        </h3>
    </div>
    <div class="panel-body">
        <div class="col-xs-12 col-sm-2 col-md-2 col-lg-1" >
            <a href="page.php?id=<?php print $row['id']; ?>">
                <img data-holder-rendered="true" src="images/Preview/<?php print $row['id']; ?>.jpg" style="width: 64px; height: 64px;" class="img-thumbnail" alt="">
            </a>
        </div>
        <div class="row">
			<p>
				<?php print substr($row['description'],0,200)."..."; ?>
				<span class="label label-success"><a href="page.php?id=<?php print $row['id']; ?>">Suite</a></span>
			</p>
        </div>
        <div class="row col-xs-12">
            <p style="text-align:center;">
                <?php
                    $req2 = "select id, nom from TypeContenu where id in (select idTypeContenu from representer where idArticle='".$row['id']."') order by nom";
                    $link->prepare($req2);
                    $resultats2 = $link->query($req2);
                    foreach  ( $resultats2 as $row2)
                    {
                        ?>
                            <span class="label label-info"><a href="types.php?id[]=<?php print $row2['id']; ?>"><?php print $row2['nom']; ?></a></span> &nbsp;
                        <?php
                    }
                ?>
            </p>
        </div>
    </div>
</div>
