<div class="row principal">
    <section class="col-xs-12 col-md-offset-2 col-md-8 presentation">
        <h3>Modifier un chapitre</h3>
        <div class="form-group">
            <form class="well-lg form-horizontal" action="<?php aff('self');?>" method="post">
                <div class="form-group">
                    <label for="title">Titre</label> <br>
                    <input type="text" class="form-control" name="title" required="required" value="<?php echo $chapter->getTitle();?>">
                </div>
                <div class="form-group">
                    <label for="resume">Résumé</label>
                    <textarea class="form-control" name="resume" placeholder="Résumé" value="<?php echo $chapter->getResume();?>"></textarea>
                </div>
                <div class="form-group">
                    <label for="texte">Texte du chapitre</label>
                    <textarea class="form-control chapitre" name="texte" rows="20" placeholder="Chapitre entier" required="required"><?php echo $chapter->getTexte();?></textarea>
                </div>
                <input type="submit" formnovalidate="formnovalidate" name="modif" value="Modifier">
				<input type="submit" formnovalidate="formnovalidate" name="publi" value="Modifier et Publier">
                
            </form>
        </div>
    
    </section>

</div>

</div>