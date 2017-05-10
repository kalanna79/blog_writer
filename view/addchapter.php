<div class="row principal">
    <section class="col-xs-12 col-md-offset-2 col-md-8 presentation">
        <h3>Ajouter un chapitre</h3>
        <div class="form-group">
        <form class="well-lg form-horizontal" action="<?php aff('self');?>" method="post">
            <div class="form-group">
                <label for="title">Titre</label> <br>
                <input type="text" class="form-control" name="title" required="required">
            </div>
            <div class="form-group">
            <label for="resume">Résumé</label>
            <textarea class="form-control" name="resume" placeholder="Résumé"></textarea>
            </div>
            <div class="form-group">
            <label for="texte">Texte du chapitre</label>
            <textarea class="form-control chapitre" name="texte" rows="20" placeholder="Chapitre entier" required="required"></textarea>
            </div>
            <input type="submit" formnovalidate="formnovalidate" name="ajout" value="Enregistrer">
			<input type="submit" formnovalidate="formnovalidate" name="publication" value="Publier">
        </form>
        </div>
    
    </section>

</div>

</div>