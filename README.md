# Site ecommerce Symfony de Doriane Vautor, Ines Abdelhak, Ketchuskana Son Essome Moukouri

Réaliser un site ecommerce développé en Symfony pour la vente de sweats, pull et sweats plaids.

## Sommaire

- [Installation](#installation)
- [Utilisation](#utilisation)
- [Fonctionnalités](#fonctionnalités)
- [Repartition des taches](#repartition-des-taches)

## Tester les fonctionnalités depuis Alwaysdata

- Lien: https://abdelhak.alwaysdata.net/

## Installation en local

1. Décompresser le projet et l'ouvrir dans son environnement de code
2. Dans un terminal, la commande "composer install" pour installer les dépendances
3. La commande "symfony serve" pour démarrer le serveur et voir le rendu.

## Utilisation

- Après avoir lancé le serveur, ouvrez votre navigateur et accédez à l'URL http://localhost:port pour voir le site.

- Connexion en tant qu'admin: 
    - Email: d@gmail.com
    - MDP: 123456

## Fonctionnalités

- **Gestion des Connexions et Inscriptions**

    - Login: OK
    - Inscription: OK
    - Page "Mon Compte" avec les données de l'utilisateur: OK
    - Page "Administration" pour l'admin avec:
        - la gestion des utilisateurs (liste et role des utilisateurs): OK
        - la gestion des catégories (liste, modification, supression, ajout): OK
        - la gestions des produits (liste, modification, supression, ajout): OK
        - la gestion des stocks: les stocks ont été ajouté à la table Produit. Il est donc possible d'ajouter ou d'enlever le nombre de produits en stock.

- **HEADER et Footer**

    - Logo avec un retour à la home page: OK
    - Barre de recherche: OK
    - Icone et lien de connexion, inscription, deconnection, administration, panier: OK
    - Nav barre: Lien vers les principales catégories et un retour à l'accueil: OK
    - Lien dans le footer:
        - Lien vers la connexion/inscription: OK
        - Lien vers la page "Mon compte": OK


- **Mise au panier**

    - Ajout de plusieurs produits dans le panier: OK
    - Possibilité d'augmenter la quantité avec mise à jour de la somme totale: OK
    - Possibilité de supprimer le panier ou un seul produit: OK

- **Gestion des Categories et des produits**

    - Accès aux catégories: OK
    - Accès aux produits par catégories: OK
    - Page détails d'un produit:
        - Produit affiché avec leur photo, description, prix, taille: OK
        - Affichage en cas de rupture de stock: OK
        - Possibilité d'ajouter le produit au panier: OK

- **Gestion des commandes**

    - Entrer une adresse de livraison: OK
    - Message de commande faite: OK
    - Retour à la page d'Accueil proposé apres une commande: OK
  
