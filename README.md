# blog_writer

a blog created in POO PHP - training project

créez un blog pour un écrivain :
Vous développerez une application de blog simple en PHP et avec une base de données MySQL. Elle doit fournir une interface frontend (lecture des billets) et une interface backend (administration des billets pour l'écriture). On doit y retrouver tous les éléments d'un CRUD :

    Create : création de billets
    Read : lecture de billets
    Update : mise à jour de billets
    Delete : suppression de billets

Chaque billet doit permettre l'ajout de commentaires, qui pourront être modérés dans l'interface d'administration au besoin.
Un commentaire peut être une réponse à un autre commentaire : dans ce cas, il est légèrement décalé vers la droite pour montrer l'arborescence des commentaires. Il ne peut pas y avoir plus de 3 sous-niveaux de commentaires.
Les lecteurs doivent pouvoir "signaler" les commentaires pour que ceux-ci remontent plus facilement dans l'interface d'administration pour être modérés.

L'interface d'administration sera protégée par mot de passe. La rédaction de billets se fera dans une interface WYSIWYG basée sur TinyMCE, pour que Jean n'ait pas besoin de rédiger son histoire en HTML (on comprend qu'il n'ait pas très envie !).

Le code sera construit sur une architecture MVC. Vous développerez autant que possible en orienté objet. Au minimum, le modèle doit être construit sous forme d'objet.