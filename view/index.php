<?php
    /**
     * Created by PhpStorm.
     * User: natacha
     * Date: 24/03/2017
     * Time: 09:20
     */
    
    ?>

<html>
<head>
    <title>Billet pour l'Alaska</title>
    <meta charset="UTF-8">
    
</head>

<body>
    <main>
        <h1>Billet pour l'Alaska</h1>
        
        <!-- partie de gauche avec présentation auteur & form de contact -->
        <section>
            <article> texte présentation auteur</article>
           
            <div>
                <h2>Me contacter</h2>
                <form>
                    <input type="text" placeholder="Prénom" name="prenom">
                    <input type="text" placeholder="Nom" name="nom"><br>
                    <input type="email" placeholder="Votre mail" name="mail"><br>
                    <textarea name="message" placeholder="Votre message" rows="5" cols="50"></textarea><br>
                    <input type="submit" name="envoyer" value="Envoyer">
                </form>
            </div>
        </section>
        
        <!-- partie de droite avec Table des matières comprenant num chap + titre chap + date ajout + 300 car et Lire la suite - en sticky, lien vers les commentaires généraux -->
        <section>
            <h2>Table des matières</h2>
            <div>
                <a href="#">Chapitre 1</a>
                <time datetime="2017-04-04">4 avril 2017</time>
                <p> Eam eam Philos qui omnino nostri habentur nusquam vita communis docti vita vita habentur Scipiones vita Catones virosque est interpretemur bonos Galos ut Philos nusquam ut vitae virtutem virosque bonos reperiuntur nec his qui eos vita docti qui virosque qui qui docti eos omittamus Scipiones eos qui numeremus eos Paulos bonos ex magnificentia metiamur bonos metiamur communis numeremus Paulos Catones nusquam qui sermonisque communis his quidam ex Catones his reperiuntur omittamus qui eos communis eos quidam magnificentia virtutem autem bonos sermonisque docti contenta qui nusquam eos reperiuntur eos autem Galos Catones Philos vita autem quidam vitae virosque nostri eos ut.</p>
                <a href="#">... Lire la suite ...</a>
            </div>
            <div>
                <a href="#">Chapitre 2</a>
                <time datetime="2017-04-04">4 avril 2017</time>
                <p> Eam eam Philos qui omnino nostri habentur nusquam vita communis docti vita vita habentur Scipiones vita Catones virosque est interpretemur bonos Galos ut Philos nusquam ut vitae virtutem virosque bonos reperiuntur nec his qui eos vita docti qui virosque qui qui docti eos omittamus Scipiones eos qui numeremus eos Paulos bonos ex magnificentia metiamur bonos metiamur communis numeremus Paulos Catones nusquam qui sermonisque communis his quidam ex Catones his reperiuntur omittamus qui eos communis eos quidam magnificentia virtutem autem bonos sermonisque docti contenta qui nusquam eos reperiuntur eos autem Galos Catones Philos vita autem quidam vitae virosque nostri eos ut.</p>
                <a href="#">... Lire la suite ...</a>
            </div>
            <div>
                <a href="#">Chapitre 2</a>
                <time datetime="2017-04-04">4 avril 2017</time>
                <p> Eam eam Philos qui omnino nostri habentur nusquam vita communis docti vita vita habentur Scipiones vita Catones virosque est interpretemur bonos Galos ut Philos nusquam ut vitae virtutem virosque bonos reperiuntur nec his qui eos vita docti qui virosque qui qui docti eos omittamus Scipiones eos qui numeremus eos Paulos bonos ex magnificentia metiamur bonos metiamur communis numeremus Paulos Catones nusquam qui sermonisque communis his quidam ex Catones his reperiuntur omittamus qui eos communis eos quidam magnificentia virtutem autem bonos sermonisque docti contenta qui nusquam eos reperiuntur eos autem Galos Catones Philos vita autem quidam vitae virosque nostri eos ut.</p>
                <a href="#">... Lire la suite ...</a>
            </div>
        </section>
        
        <!-- col droite pour icones liens connexion/inscription & réseaux sociaux  -->
        <aside>
            <a href="#">S'inscrire</a>
            <a href="#">Se connecter</a>
            <a href="#">Facebook</a>
            <a href="#">Google+</a>
            <a href="#">Twitter</a>
            <a href="#">Pinterest</a>
        </aside>
        <footer>Copyright Jean Forteroche 2017</footer>
    </main>
</body>
</html>
