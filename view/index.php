<?php
    /**
     * Created by PhpStorm.
     * User: natacha
     * Date: 03/04/2017
     * Time: 09:17
     */
     ?>

<div class="row principal">
    <section class="col-md-6 presentation">
        
        
        <article>
            
            <img src="../img/rafting-1377057_640.jpg" width="100%" class="valign">
            
            <div class="colonne bio">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque ullamcorper sem erat, in lobortis enim viverra et. Nunc sit amet lacus consequat, congue lacus ornare, lacinia lorem. Suspendisse sit amet ligula imperdiet, commodo eros ac, molestie tortor. Praesent id velit rutrum libero mollis maximus eu ut quam. Quisque dignissim massa metus, vel maximus sem consectetur non. Nunc at enim leo. Sed dapibus ligula leo, id iaculis arcu mollis eget.
                
                Praesent dictum nibh ac ultricies eleifend. Sed eget pulvinar lacus. Suspendisse dictum dictum lacus bibendum imperdiet. Sed ut nisi dignissim enim tincidunt aliquet sed sed velit. Aenean vitae lobortis nulla, non elementum nibh. Vestibulum a fermentum urna. Integer sed sodales metus. Nulla tincidunt arcu a ex ultricies, at ultrices velit sollicitudin. Proin tempus pretium orci sit amet iaculis. Duis eget pellentesque sem. In eu faucibus nunc. Sed posuere, nunc et imperdiet eleifend, enim sapien malesuada enim, in sodales purus libero sit amet turpis.
            </div>
        
        </article>
    
    
    </section>
    <!-- partie de droite avec Table des matières comprenant num chap + titre chap + date ajout + 300 car et Lire la suite -->
    <section class="col-xs-12 col-md-6 table_mat">
        <h3>Table des matières</h3>
        <hr>
        
        
        
        <div class="row">
            <?php $i = 0;?>
            <?php foreach($chapters as  $key => $chap): ?>
                <?php if($i==0) echo '<div class="row">';?>
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-3 showButton chap-box-icon" id="<?php echo $key; ?>">
									<span class="chap"><a href="../controller/chapter.php?id=<?php echo $chap['id'];
									?>">Chap <?php
                                                echo
                                                $key; ?></a></span><br>
                    <div>
                        <abbr>
                            <time datetime="2017-04-04">31/03/2017 </time>
                            <i class="glyphicon glyphicon-chevron-down text-muted"></i>
                        </abbr>
                    </div>
                </div>
        </div>
                
                
                
                
                <div class="row" >
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 details-chap" id="details-<?php
                    echo $key; ?>" style="display: none; z-index: 2; position: relative; height: 10vh;">
                    <div class="panel panel-primary">
                        <div class="panel-body">
                            <div class="row">
                                <div>
                                    <p><?php echo $chap['texte']; ?></p>
                                
                                </div>
                            </div>
                        </div>
                    
                    </div>
                </div>
                
                <?php $i++ ;?>
                <?php if ($i == 4):?>
                    </div>
                    <?php $i = 0;?>
                <?php endif;?>
            <?php endforeach;?>
            <?php if (($i < 4) && ($i != 0)) echo '</div>'; ?>
    </section>
</div>

</main>
