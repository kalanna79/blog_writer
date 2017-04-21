<section class="col-xs-12 col-md-12 principal">
    <!-- Titre -->
    <div class="row titre">
        <div class="col-xs-12 col-md-offset-2 col-md-8">
            <div class="wrapper">
                <div class="clip-text"> <h2>Mon profil</h2></div>
            </div>
        </div>
    </div>
    
    <!-- Texte du chapitre -->
    <div class="row">
        
        <div class="col-xs-6 col-md-offset-2 col-md-4">
            <table class="table table-bordered">
                <tr>
                    <th>Prénom</th>
                    <td><?php echo $user->getFirstname();?></td>
                </tr>
                <tr>
                    <th>Nom</th>
                    <td><?php echo $user->getName();?></td>
                </tr>
                <tr>
                    <th>Pseudo</th>
                    <td><?php echo $user->getPseudo();?></td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td><?php echo $user->getEmail();?></td>
                </tr>
                
                
            </table>
        </div>
    </div>
    
</section>